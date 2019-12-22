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

        $list = Transaction::where('deleted', 0)->with('product')->get();

        if (request()->has('q')) {
            $list = Transaction::where('description', 'like', '%' . request()->input('q') . '%')->with('product')->where('deleted', 0)->get();
        }

        return view('admin.transactions.list', [
            'transactions' => $list,
            "abbas"=>$abbas, 
            "isCustomer"=>$isCustomer,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        return view('admin.tickets.create', [
            "abbas"=>$abbas, 
            "isCustomer"=>$isCustomer,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCustomerRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->except('_token', '_method');
        // $data['register_id'] = Auth::getUser();
        $ticket = Ticket::create($data);

        return redirect()->route('admin.tickets.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

        return view('admin.tickets.edit', [
            'ticket' => Ticket::find($id),
            "abbas"=>$abbas, 
            "isCustomer"=>$isCustomer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCustomerRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $data = request()->except('_token', '_method');

        $ticket = Ticket::where('id', $id)->update($data);

        request()->session()->flash('message', 'Update successful');
        return redirect()->route('admin.tickets.edit', $id);
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
        Ticket::where('id', $id)->update(['deleted'=>1]);

        return redirect()->route('admin.tickets.index')->with('message', 'Delete successful');
    }
}
