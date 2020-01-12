<?php

namespace App\Http\Controllers\Admin\Customers;

use App\Shop\Customers\Customer;
use App\Shop\Customers\Repositories\CustomerRepository;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Shop\Customers\Requests\CreateCustomerRequest;
use App\Shop\Customers\Requests\UpdateCustomerRequest;
use App\Shop\Customers\Transformations\CustomerTransformable;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    use CustomerTransformable;

    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepo;

    /**
     * CustomerController constructor.
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepo = $customerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->customerRepo->listCustomers('created_at', 'desc');
        $list = Customer::orderBy('created_at', 'desc')->orderBy('status', 'desc')->get(); 

        if (request()->has('q') && (request()->input('q') != '' || request()->input('from') != '' || request()->input('to') != '')) {
            // $list = $this->customerRepo->searchCustomer(request()->input('q'));
            $q = request()->input('q');
            $from = request()->input('from');
            $to = request()->input('to');
            $list = Customer::where(function ($query) use ($q, $from, $to) {
                if($q!='') {
                    $query->Where('name', 'like', '%' . $q . '%');
                    $query->orWhere('sir_name', 'like', '%' . $q . '%');
                    $query->orWhere('id', $q);
                }
                if($from!='') {
                    $from = date("Y-m-d", strtotime($from));
                    $query->where('created_at', '>=', $from);
                }
                if($to!='') {
                    $to = date("Y-m-d", strtotime($to));
                    $query->where('created_at', '<=', $to);
                }
            })->orderBy('created_at', 'desc')->orderBy('status', 'desc')->get();
        }

        $customers = $list->map(function (Customer $customer) {
            return $this->transformCustomer($customer);
        })->all();

        return view('admin.customers.list', [
            'customers' => $this->customerRepo->paginateArrayResults($customers)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCustomerRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCustomerRequest $request)
    {
        $customer = $this->customerRepo->createCustomer($request->except('_token', '_method', 'image_path'));
        if ($request->hasFile('image_path')) {
            $customer->image_path = $request->file('image_path')->store('customers', ['disk' => 'public']);
            $customer->save();
        }

        return redirect()->route('admin.customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $customer = $this->customerRepo->findCustomerById($id);
        
        return view('admin.customers.show', [
            'customer' => $customer,
            'addresses' => $customer->addresses
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.customers.edit', ['customer' => $this->customerRepo->findCustomerById($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCustomerRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, $id)
    {
        $customer = $this->customerRepo->findCustomerById($id);

        $update = new CustomerRepository($customer);
        $data = $request->except('_method', '_token', 'password');

        if ($request->has('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('customers', ['disk' => 'public']);
        }

        $update->updateCustomer($data);

        $request->session()->flash('message', 'Update successful');
        return redirect()->route('admin.customers.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $customer = $this->customerRepo->findCustomerById($id);

        $customerRepo = new CustomerRepository($customer);
        $customerRepo->deleteCustomer();

        return redirect()->route('admin.customers.index')->with('message', 'Delete successful');
    }
}
