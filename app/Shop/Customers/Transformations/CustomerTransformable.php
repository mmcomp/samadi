<?php

namespace App\Shop\Customers\Transformations;

use App\Shop\Customers\Customer;

trait CustomerTransformable
{
    protected function transformCustomer(Customer $customer)
    {
        $prop = new Customer;
        $prop->id = (int) $customer->id;
        $prop->name = $customer->name;
        $prop->sir_name = $customer->sir_name;
        $prop->image_path = $customer->image_path;
        $prop->name = $customer->name;
        $prop->email = $customer->email;
        $prop->status = (int) $customer->status;
        $prop->commission_percent = (int) $customer->commission_percent;
        $prop->sales_count = (int) $customer->sales_count;
        $prop->files_count = (int) $customer->files_count;
        $prop->likes_count = (int) $customer->likes_count;
        $prop->created_at = $customer->created_at;
        return $prop;
    }
}
