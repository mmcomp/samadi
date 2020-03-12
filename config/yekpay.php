<?php

return [
    'name' => 'yekpay',
    'description' => 'YekPay - Safe, Secured and Easy to pay online!',
    'account_id' => env('YEK_PAY_MERCHANT', 'ME7YHSG8MWNAFSJY8MEPBPADE62YGGH3'),
    'api_url' => env('YEK_PAY_BASEURL', 'https://gate.yekpay.com/api/')
];