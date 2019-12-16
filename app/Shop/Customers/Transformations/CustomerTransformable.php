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

        return $prop;
    }
}
