<?php

namespace App\Http\Controllers\Admin\Transactions;

use App\Shop\Transactions\Transaction;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function income()
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

        $list = Transaction::with('product')->where('type', 'charge')->where('owner_id', $abbas->id)->get();

        if (request()->has('q')) {
            $list = Transaction::where('description', 'like', '%' . request()->input('q') . '%')->with('product')->where('type', 'charge')->where('owner_id', $abbas->id)->get();
        }

        return view('admin.transactions.list', [
            'transactions' => $list,
            "abbas"=>$abbas, 
            "isCustomer"=>$isCustomer,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cash()
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

        $list = Transaction::with('product')->where('type', 'cash')->where('owner_id', $abbas->id)->get();

        if (request()->has('q')) {
            $list = Transaction::where('description', 'like', '%' . request()->input('q') . '%')->with('product')->where('type', 'cash')->where('owner_id', $abbas->id)->get();
        }

        return view('admin.transactions.cash', [
            'transactions' => $list,
            "abbas"=>$abbas, 
            "isCustomer"=>$isCustomer,
        ]);
    }
}
