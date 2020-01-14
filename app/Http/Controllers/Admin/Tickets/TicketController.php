<?php

namespace App\Http\Controllers\Admin\Tickets;

use App\Shop\Tickets\Ticket;
use App\Shop\Tickets\TicketHistory;
use App\Shop\Tickets\TicketFile;
use App\Shop\Employees\Employee;
use App\Http\Controllers\Controller;

class TicketController extends Controller
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
            $list = Ticket::where('deleted', 0)->orderBy('created_at', 'desc')->get();
        }else {
            $abbas = auth()->guard('web')->user();
            $list = Ticket::where('deleted', 0)->where('customers_id', $abbas->id)->orderBy('created_at', 'desc')->get();
        }

        

        if (request()->has('q') && (request()->input('q') != '' || request()->input('from') != '' || request()->input('to') != '')) {
            // $list = Ticket::where('subject', 'like', '%' . request()->input('q') . '%')->where('deleted', 0)->get();
            $q = request()->input('q') ?? '';
            $from = request()->input('from');
            $to = request()->input('to');
            $list = Ticket::where(function($query) use ($q, $from, $to, $isCustomer, $abbas) {
                if($q!='') {
                    $query->where('subject', 'like', '%' . $q . '%');
                }
                if($from!='') {
                    $from = date("Y-m-d", strtotime($from));
                    $query->where('created_at', '>=', $from);
                }
                if($to!='') {
                    $to = date("Y-m-d", strtotime($to));
                    $query->where('created_at', '<=', $to);
                }
                if($isCustomer) {
                    $query->where('customers_id', $abbas->id);
                }
            })->orderBy('created_at', 'desc')->get();
        }

        return view('admin.tickets.list', [
            'tickets' => $list,
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
     * Show history and the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function history($id)
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

        $ticket = Ticket::find($id);
        $histories = TicketHistory::where('ticket_id', $id)->orderBy('created_at', 'asc')->get();
        
        foreach($histories as $i=>$history) {
            $histories[$i]->employee = null;
            if($history->employee_id>0) {
                $histories[$i]->employee = Employee::find($history->employee_id);
            }
            $histories[$i]->attachment = TicketFile::where('ticket_history_id', $history->id)->first();
        }

        return view('admin.tickets.history', [
            "abbas"=>$abbas, 
            "isCustomer"=>$isCustomer,
            "histories"=>$histories,
            "ticket"=>$ticket,
        ]);
    }

    /**
     * Store a newly history created resource in storage.
     *
     * @param  CreateCustomerRequest $request
     * @return \Illuminate\Http\Response
     */
    public function addHistory()
    {
        $isCustomer = true;
        if(auth()->guard('employee')->check()) {
            $isCustomer = false;
            $abbas = auth()->guard('employee')->user();
        }else {
            $abbas = auth()->guard('web')->user();
        }

        $data = request()->except('_token', '_method', 'file_path');
        if(!$isCustomer) {
            $data['employee_id'] = $abbas->id;
        }

        $ticketHistory = TicketHistory::create($data);
        if(request()->file('file_path')) {
            $file_path = '/storage/' . request()->file('file_path')->store('tickets', ['disk' => 'public']);
            TicketFile::create([
                "ticket_history_id"=>$ticketHistory->id,
                "file_path"=>$file_path,
            ]);
        }

        if($isCustomer) {
            try{
                $client = new \SoapClient('http://sw5p80.pdr.co.ir/?wsdl', array('encoding'=>'UTF-8'));
                $parameters['uUsername'] = "samadi";
                $parameters['uPassword'] = "2235948";
                $parameters['uNumber'] = "50001900500019";
                $parameters['uCellphones'] = env('TICKET_MOBILE');
                $parameters['uMessage'] = 'Ticket Resent' . "\n" . 'ID : ' . request()->input('ticket_id');
                $parameters['uFarsi'] = false;
                $parameters['uTopic'] = false;
                $parameters['uFlash'] = false;
                $parameters['uUDH'] = '';
                $res = $client->doSendSMS($parameters);
                // if(strpos($res->doSendSMSResult,'Send OK') === 0){
                //   echo 'OK : '.$res->doSendSMSResult;
                // }else{
                //   echo 'ER : '.$res->doSendSMSResult;
                // }
            }catch(Exception $e) {
                // echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }

        return redirect()->route('admin.tickets.history', ["id"=>request()->input('ticket_id')]);
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

        $isCustomer = true;
        if(auth()->guard('employee')->check()) {
            $isCustomer = false;
            $abbas = auth()->guard('employee')->user();
        }else {
            $abbas = auth()->guard('web')->user();
        }

        $data = request()->except('_token', '_method', 'file_path');
        if(!$isCustomer) {
            $data['employee_id'] = $abbas->id;
        }else {
            $data['customers_id'] = $abbas->id;
        }

        $ticket = Ticket::create($data);

        $data['ticket_id'] = $ticket->id;
        $data['answer'] = $ticket->content;
        $ticketHistory = TicketHistory::create($data);
        if(request()->file('file_path')) {
            $file_path = '/storage/' . request()->file('file_path')->store('tickets', ['disk' => 'public']);
            TicketFile::create([
                "ticket_history_id"=>$ticketHistory->id,
                "file_path"=>$file_path,
            ]);
        }

        try{
            $client = new \SoapClient('http://sw5p80.pdr.co.ir/?wsdl', array('encoding'=>'UTF-8'));
            $parameters['uUsername'] = "samadi";
            $parameters['uPassword'] = "2235948";
            $parameters['uNumber'] = "50001900500019";
            $parameters['uCellphones'] = env('TICKET_MOBILE');
            $parameters['uMessage'] = 'Ticket Registered' . "\n" . 'ID : ' . $ticket->id;
            $parameters['uFarsi'] = false;
            $parameters['uTopic'] = false;
            $parameters['uFlash'] = false;
            $parameters['uUDH'] = '';
            $res = $client->doSendSMS($parameters);
            // if(strpos($res->doSendSMSResult,'Send OK') === 0){
            //   echo 'OK : '.$res->doSendSMSResult;
            // }else{
            //   echo 'ER : '.$res->doSendSMSResult;
            // }
        }catch(Exception $e) {
            // echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

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
