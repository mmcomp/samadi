<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Shop\Addresses\Repositories\Interfaces\AddressRepositoryInterface;
use App\Shop\Addresses\Transformations\AddressTransformable;
use App\Shop\Couriers\Courier;
use App\Shop\Couriers\Repositories\CourierRepository;
use App\Shop\Couriers\Repositories\Interfaces\CourierRepositoryInterface;
use App\Shop\Customers\Customer;
use App\Shop\Customers\Repositories\CustomerRepository;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Shop\Orders\Order;
use App\Shop\Orders\Repositories\Interfaces\OrderRepositoryInterface;
use App\Shop\Orders\Repositories\OrderRepository;
use App\Shop\OrderStatuses\OrderStatus;
use App\Shop\OrderStatuses\Repositories\Interfaces\OrderStatusRepositoryInterface;
use App\Shop\OrderStatuses\Repositories\OrderStatusRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    use AddressTransformable;

    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepo;

    /**
     * @var CourierRepositoryInterface
     */
    private $courierRepo;

    /**
     * @var AddressRepositoryInterface
     */
    private $addressRepo;

    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepo;

    /**
     * @var OrderStatusRepositoryInterface
     */
    private $orderStatusRepo;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        CourierRepositoryInterface $courierRepository,
        AddressRepositoryInterface $addressRepository,
        CustomerRepositoryInterface $customerRepository,
        OrderStatusRepositoryInterface $orderStatusRepository
    ) {
        $this->orderRepo = $orderRepository;
        $this->courierRepo = $courierRepository;
        $this->addressRepo = $addressRepository;
        $this->customerRepo = $customerRepository;
        $this->orderStatusRepo = $orderStatusRepository;

        $this->middleware(['permission:update-order, guard:employee'], ['only' => ['edit', 'update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Auth::user();
        $isCustomer = false;
        if($admin) {
            $roles = $admin->roles()->get();
            $isCustomer = true;
            foreach($roles as $role) {
                if($role->name!='customer') {
                    $isCustomer = false;
                }
            }
        }
        if($isCustomer) {
            $list = Order::where('customer_id', $admin->id)->where('order_status_id', 0)->with('products')->orderBy('created_at', 'desc')->get();
        }else {
            $list = $this->orderRepo->listOrders('created_at', 'desc');
        }

        if (request()->has('q') && (request()->input('q') != '' || request()->input('from') != '' || request()->input('to') != '')) {
            if($isCustomer) {
                $q = request()->input('q') ?? '';
                $from = request()->input('from');
                $to = request()->input('to');
                $list = Order::where('customer_id', $admin->id)->where('order_status_id', 0)->where(function($query) use ($q, $from, $to) {
                    if($q!='') {
                        $query->where('reference', 'like', '%' . $q . '%');
                        $query->orWhere('tracking_number', 'like', '%' . $q . '%');    
                    }
                    if($from!='') {
                        $from = date("Y-m-d", strtotime($from));
                        $query->where('created_at', '>=', $from);
                    }
                    if($to!='') {
                        $to = date("Y-m-d", strtotime($to));
                        $query->where('created_at', '<=', $to);
                    }
                })->orderBy('created_at', 'desc')->get();
            }else{
                // $list = $this->orderRepo->searchOrder(request()->input('q') ?? '');
                $q = request()->input('q') ?? '';
                $from = request()->input('from');
                $to = request()->input('to');
                $list = Order::where(function($query) use ($q, $from, $to) {
                    if($q!='') {
                        $query->where('reference', 'like', '%' . $q . '%');
                        $query->orWhere('tracking_number', 'like', '%' . $q . '%');    
                    }
                    if($from!='') {
                        $from = date("Y-m-d", strtotime($from));
                        $query->where('created_at', '>=', $from);
                    }
                    if($to!='') {
                        $to = date("Y-m-d", strtotime($to));
                        $query->where('created_at', '<=', $to);
                    }
                })->where('order_status_id', 0)->orderBy('created_at', 'desc')->get();
            }
        }

        $orders = $this->orderRepo->paginateArrayResults($this->transFormOrder($list), 10);

        return view('admin.orders.list', [
            'orders' => $orders,
            'abbas' => $admin,
            'isCustomer' => $isCustomer
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $orderId
     * @return \Illuminate\Http\Response
     */
    public function show($orderId)
    {
        $order = $this->orderRepo->findOrderById($orderId);
        $order->courier = $this->courierRepo->findCourierById($order->courier_id);
        $order->address = $this->addressRepo->findAddressById($order->address_id);

        $orderRepo = new OrderRepository($order);

        $items = $orderRepo->listOrderedProducts();

        return view('admin.orders.show', [
            'order' => $order,
            'items' => $items,
            'customer' => $this->customerRepo->findCustomerById($order->customer_id),
            'currentStatus' => $this->orderStatusRepo->findOrderStatusById($order->order_status_id),
            'payment' => $order->payment,
            'user' => auth()->guard('employee')->user()
        ]);
    }

    /**
     * @param $orderId
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($orderId)
    {
        $order = $this->orderRepo->findOrderById($orderId);
        $order->courier = $this->courierRepo->findCourierById($order->courier_id);
        $order->address = $this->addressRepo->findAddressById($order->address_id);

        $orderRepo = new OrderRepository($order);

        $items = $orderRepo->listOrderedProducts();

        return view('admin.orders.edit', [
            'statuses' => $this->orderStatusRepo->listOrderStatuses(),
            'order' => $order,
            'items' => $items,
            'customer' => $this->customerRepo->findCustomerById($order->customer_id),
            'currentStatus' => $this->orderStatusRepo->findOrderStatusById($order->order_status_id),
            'payment' => $order->payment,
            'user' => auth()->guard('employee')->user()
        ]);
    }

    /**
     * @param Request $request
     * @param $orderId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $orderId)
    {
        $order = $this->orderRepo->findOrderById($orderId);
        $orderRepo = new OrderRepository($order);

        if ($request->has('total_paid') && $request->input('total_paid') != null) {
            $orderData = $request->except('_method', '_token');
        } else {
            $orderData = $request->except('_method', '_token', 'total_paid');
        }

        $orderRepo->updateOrder($orderData);

        return redirect()->route('admin.orders.edit', $orderId);
    }

    /**
     * Generate order invoice
     *
     * @param int $id
     * @return mixed
     */
    public function generateInvoice(int $id)
    {
        $order = $this->orderRepo->findOrderById($id);

        $data = [
            'order' => $order,
            'products' => $order->products,
            'customer' => $order->customer,
            'courier' => $order->courier,
            'address' => $this->transformAddress($order->address),
            'status' => $order->orderStatus,
            'payment' => $order->paymentMethod
        ];

        $pdf = app()->make('dompdf.wrapper');
        $pdf->loadView('invoices.orders', $data)->stream();
        return $pdf->stream();
    }

    /**
     * @param Collection $list
     * @return array
     */
    private function transFormOrder(Collection $list)
    {
        $courierRepo = new CourierRepository(new Courier());
        $customerRepo = new CustomerRepository(new Customer());
        $orderStatusRepo = new OrderStatusRepository(new OrderStatus());

        return $list->transform(function (Order $order) use ($courierRepo, $customerRepo, $orderStatusRepo) {
            $order->courier = null; //$courierRepo->findCourierById($order->courier_id);
            $order->customer = $customerRepo->findCustomerById($order->customer_id);
            $order->status = null; //$orderStatusRepo->findOrderStatusById($order->order_status_id);
            return $order;
        })->all();
    }
}
