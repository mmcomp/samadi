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

        $list = Transaction::with('product')->where('type', 'charge')->where('owner_id', $abbas->id)->orderBy('created_at', 'desc')->get();

        if (request()->has('q') && (request()->input('q') != '' || request()->input('from') != '' || request()->input('to') != '')) {
            // $list = Transaction::where('description', 'like', '%' . request()->input('q') . '%')->with('product')->where('type', 'charge')->where('owner_id', $abbas->id)->get();
            $q = request()->input('q');
            $from = request()->input('from');
            $to = request()->input('to');
            $list = Transaction::where(function ($query) use ($q, $from, $to) {
                if($q!='') {
                    $query->Where('description', 'like', '%' . $q . '%');
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
            })->where('type', 'charge')->where('owner_id', $abbas->id)->with('product')->orderBy('created_at', 'desc')->get();
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

        $list = Transaction::with('product')->where('type', 'cash')->where('owner_id', $abbas->id)->orderBy('created_at', 'desc')->get();

        // if (request()->has('q')) {
        //     $list = Transaction::where('description', 'like', '%' . request()->input('q') . '%')->with('product')->where('type', 'cash')->where('owner_id', $abbas->id)->get();
        // }
        if (request()->has('q') && (request()->input('q') != '' || request()->input('from') != '' || request()->input('to') != '')) {
            // $list = Transaction::where('description', 'like', '%' . request()->input('q') . '%')->with('product')->where('type', 'charge')->where('owner_id', $abbas->id)->get();
            $q = request()->input('q');
            $from = request()->input('from');
            $to = request()->input('to');
            $list = Transaction::where(function ($query) use ($q, $from, $to) {
                if($q!='') {
                    $query->Where('description', 'like', '%' . $q . '%');
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
            })->where('type', 'cash')->where('owner_id', $abbas->id)->with('product')->orderBy('created_at', 'desc')->get();
        }

        return view('admin.transactions.cash', [
            'transactions' => $list,
            "abbas"=>$abbas, 
            "isCustomer"=>$isCustomer,
        ]);
    }

    public function add()
    {
        if (!auth()->guard('employee')->check() && !auth()->guard('web')->check()) {
            return redirect('/admin/login');
        }

        $isCustomer = true;
        if(auth()->guard('employee')->check()) {
            $isCustomer = false;
            return redirect('/admin');
        }else {
            $abbas = auth()->guard('web')->user();
        }

        return view('admin.transactions.add', [
            "abbas"=>$abbas, 
            "isCustomer"=>$isCustomer,
        ]);
    }
}
