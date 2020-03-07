<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


class BankController extends Controller
{
    public function test(Request $request) {
        $baseUrl = env("YEK_PAY_BASEURL");
        $url = $baseUrl . "payment/request";

        $client = new \GuzzleHttp\Client();
        $myBody = [
            "merchantId"=>env("YEK_PAY_MERCHANT"),
            "amount"=>1,
            "fromCurrencyCode"=>978,
            "toCurrencyCode"=>978,
            "orderNumber"=>1,
            "callback"=>"http://google.com",
            "firstName"=>"Mehrdad",
            "lastName"=>"Mirsamie",
            "email"=>"m.mirsamie@gmail.com",
            "mobile"=>"+989155193104",
            "address"=>"Iran, Mashhad",
            "postalCode"=>"9197985855",
            "country"=>"Iran",
            "city"=>"Mashhad",
            "description"=>"",
        ];
        $res = $client->request('POST', $url,  ['form_params'=>$myBody, 'connect_timeout' => 3.14]);
        $body = json_decode($res->getBody());
        // Implicitly cast the body to a string and echo it
        // echo $body;
        dd($body);
        return 'salam';
    }
}
