<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Shop\Customers\Customer;
use App\Shop\Carts\Repositories\Interfaces\CartRepositoryInterface;
use App\Shop\Checkout\CheckoutRepository;
use Ramsey\Uuid\Uuid;
use App\Shop\Transactions\Transaction;
use App\Shop\Orders\Order;

class BankController extends Controller
{
    private $cartRepo;

    public function __construct( CartRepositoryInterface $cartRepository ) {
        $this->cartRepo = $cartRepository;
    }

    public function yekPay($amount, $orderNumber, $customer_id, $description = "") {
        $customer = Customer::find($customer_id);
        $result = new \stdClass;
        $result->Code = -1000;
        $result->Authority = 0;
        $result->Description = "Customer not Found!";
        if($customer==null) {
            return null;
        }

        $baseUrl = env("YEK_PAY_BASEURL");
        $url = $baseUrl . "payment/request";

        $client = new \GuzzleHttp\Client();
        $myBody = [
            "merchantId"=>env("YEK_PAY_MERCHANT"),
            "amount"=>$amount,
            "fromCurrencyCode"=>978,
            "toCurrencyCode"=>978,
            "orderNumber"=>$orderNumber,
            "callback"=>"https://pivezhanjewellery.com/bank/yekpay/",
            "firstName"=>($customer->name)?$customer->name:"unknown",
            "lastName"=>($customer->sir_name)?$customer->sir_name:"unknown",
            "email"=>($customer->email)?$customer->email:"info@pivezhanjewellery.com",
            "mobile"=>($customer->mobile)?$customer->mobile:"unknown",
            "address"=>($customer->address)?$customer->address:"unknown",
            "postalCode"=>($customer->postal_code)?$customer->postal_code:"unknown",
            "country"=>($customer->country)?$customer->country->name:"unknown",
            "city"=>($customer->city)?$customer->city:"unknown",
            "description"=>$description,
        ];
        dump($myBody);
        $res = $client->request('POST', $url,  ['form_params'=>$myBody, 'connect_timeout' => 3.14]);
        $result = json_decode($res->getBody());
        dump($result);
        return $result;
    }

    public function payBackYekPay(Request $request) {
        $reqs = $request->all();
        $success = 0;
        if(isset($reqs['authority'])) {
            foreach($reqs as $key=>$value) {
                if(strpos("success", $key)!==false) {
                    $success = $value;
                }
            }
        }
        // dd($request->all());
        if($success!="0") {
            $order = Order::where("invoice", $reqs['authority'])->where('order_status_id', 1)->first();
            dd($order);
            if($order==null) {
                // Order Not Found
                return redirect('/admin');
            }
            $order->order_status_id = 0;
            $order->save();
            return redirect('/admin/orders');
        }
        // Yek Pay unsuccessful
        return redirect('/admin');
    }

    public function pay(Request $request) {
        $customer = null;
        if (auth()->guard('web')->check()) {
            $customer = auth()->guard('web')->user();
        }else {
            return redirect('/admin');
        }
        // $customer =  Customer::find(auth()->id());
        // dump($customer);
        $cart = $this->cartRepo->getCartItems()->all();
        if($this->cartRepo->getTotal(2, 0)<=0) {
            // Total less or equal by zero
            return redirect('/checkout');
        }
        $checkoutRepo = new CheckoutRepository;
        $orderNumber = Uuid::uuid4()->toString();
        $order = $checkoutRepo->buildCheckoutItems([
            'reference' => $orderNumber,
            'courier_id' => 0, // @deprecated
            'customer_id' => $customer->id,
            'address_id' => 0,
            'order_status_id' => 1,
            'payment' => strtolower(config('yekpay.name')),
            'discounts' => 0,
            'total_products' => $this->cartRepo->getSubTotal(),
            'total' => $this->cartRepo->getTotal(2, 0),
            'total_shipping' => 0,
            'total_paid' => 0,
            'tax' =>0
        ]);
        // dump($order);
        // xS5zueZZNfD4tB
        $yekResult = $this->yekPay($order->total, $order->reference, $order->customer_id);
        dump($yekResult);
        if($yekResult->Code==100) {
            $order->invoice = $yekResult->Authority;
            $order->save();
            dd($order);
            // return 'https://gate.yekpay.com/api/payment/start/' . $yekResult->Authority;
            return redirect('https://gate.yekpay.com/api/payment/start/' . $yekResult->Authority);
        }else {
            dd('error');
            return redirect('/checkout');
        }
    }

    public function test(Request $request) {
        $result = $this->yekPay(100, 3, 3);
        dd($result);
        // $baseUrl = env("YEK_PAY_BASEURL");
        // $url = $baseUrl . "payment/request";

        // $client = new \GuzzleHttp\Client();
        // $myBody = [
        //     "merchantId"=>env("YEK_PAY_MERCHANT"),
        //     "amount"=>100,
        //     "fromCurrencyCode"=>978,
        //     "toCurrencyCode"=>978,
        //     "orderNumber"=>2,
        //     "callback"=>"http://google.com",
        //     "firstName"=>"Mehrdad",
        //     "lastName"=>"Mirsamie",
        //     "email"=>"m.mirsamie@gmail.com",
        //     "mobile"=>"+989155193104",
        //     "address"=>"Iran, Mashhad",
        //     "postalCode"=>"9197985855",
        //     "country"=>"Iran",
        //     "city"=>"Mashhad",
        //     "description"=>"",
        // ];
        // $res = $client->request('POST', $url,  ['form_params'=>$myBody, 'connect_timeout' => 3.14]);
        // $body = json_decode($res->getBody());
        // Implicitly cast the body to a string and echo it
        // echo $body;
        dd($body);
        return 'salam';
    }
}
