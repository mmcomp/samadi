<?php

namespace App\Http\Controllers\Admin\News;

use App\Shop\News\News;
use App\Http\Controllers\Controller;

class NewsController extends Controller
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

        $list = News::where('deleted', 0)->orderBy('created_at', 'desc')->get();

        if (request()->has('q') && (request()->input('q') != '' || request()->input('from') != '' || request()->input('to') != '')) {
            // $list = News::where('title', 'like', '%' . request()->input('q') . '%')->where('deleted', 0)->get();
            $q = request()->input('q') ?? '';
            $from = request()->input('from');
            $to = request()->input('to');
            $list = News::where(function($query) use ($q, $from, $to, $isCustomer, $abbas) {
                if($q!='') {
                    $query->where('title', 'like', '%' . $q . '%');
                }
                if($from!='') {
                    $from = date("Y-m-d", strtotime($from));
                    $query->where('created_at', '>=', $from);
                }
                if($to!='') {
                    $to = date("Y-m-d", strtotime($to));
                    $query->where('created_at', '<=', $to);
                }
            })->where('deleted', 0)->orderBy('created_at', 'desc')->get();
        }

        return view('admin.news.list', [
            'news' => $list,
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

        return view('admin.news.create', [
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
        $data = request()->except('_token', '_method', 'image_path');
        if (request()->hasFile('image_path')) {
            $data['image_path'] = request()->file('image_path')->store('news', ['disk' => 'public']);
        }

        $news = News::create($data);

        return redirect()->route('admin.news.index');
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

        return view('admin.news.edit', [
            'news' => News::find($id),
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
        $data = request()->except('_token', '_method', 'image_path');
        if (request()->hasFile('image_path')) {
            $data['image_path'] = request()->file('image_path')->store('news', ['disk' => 'public']);
        }

        $news = News::where('id', $id)->update($data);

        request()->session()->flash('message', 'Update successful');
        return redirect()->route('admin.news.edit', $id);
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
        News::where('id', $id)->update(['deleted'=>1]);

        return redirect()->route('admin.news.index')->with('message', 'Delete successful');
    }
}
