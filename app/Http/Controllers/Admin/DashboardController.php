<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Shop\Countries\Country;

class DashboardController extends Controller
{
    public function index()
    {
        if (!auth()->guard('employee')->check() && !auth()->guard('web')->check()) {
            return redirect('/admin/login');
        }

        $isCustomer = true;
        if(auth()->guard('employee')->check()) {
            $isCustomer = false;
            $abbas = auth()->guard('employee')->user();
        }else {
            $abbas = auth()->guard('web')->user();
        }

        $coutries = Country::all();

        $error = '';
        if(request()->method()=='POST') {
            $reqs = request()->except('password', 'repassword', '_token', 'image_path');
            foreach($reqs as $key=>$value) {
                $abbas->$key = $value;
            }
            if(request()->input('password')) {
                if(request()->input('password')==request()->input('repassword')) {
                    $abbas->password = bcrypt(request()->input('password'));
                }else {
                    $error = 'Password and Confirm Password Do not Match!';
                }
            }
            if(request()->file('image_path')) {
                $abbas->image_path = request()->file('image_path')->store('customers', ['disk' => 'public']);
            }
            $abbas->save();
        }

        return view('admin.dashboard', [
            "abbas"=>$abbas, 
            "isCustomer"=>$isCustomer,
            "countries"=>$coutries,
            "error"=>$error,
        ]);
    }
}
