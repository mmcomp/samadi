<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Shop\Customers\Customer;

class BankController extends Controller
{
    public function yekPay($amount, $orderNumber, $customer_id, $description = "") {
        $customer = Customer::find($customer_id);
        $result = new StdClass;
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
            "firstName"=>$customer->name,
            "lastName"=>$customer->sir_name,
            "email"=>$customer->email,
            "mobile"=>$customer->mobile,
            "address"=>$customer->address,
            "postalCode"=>$customer->postal_code,
            "country"=>($customer->country)?$customer->country->name:"unknown",
            "city"=>$customer->city,
            "description"=>$description,
        ];
        dump($myBody);
        $res = $client->request('POST', $url,  ['form_params'=>$myBody, 'connect_timeout' => 3.14]);
        $result = json_decode($res->getBody());
        dump($result);
        return $result;
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
