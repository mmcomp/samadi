<?php

namespace App\Http\Controllers\Admin\Offers;

use App\Shop\Offers\Offer;
use App\Shop\Offers\OfferCategory;
use App\Shop\Categories\Category;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Offer::where('deleted', 0)->get();

        if (request()->has('q')) {
            $list = Offer::where('name', 'like', '%' . request()->input('q') . '%')->where('deleted', 0)->get();
        }

        return view('admin.offers.list', [
            'offers' => $list,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category()
    {
        $list = OfferCategory::where('id', '>', 0)->with('offer')->with('category')->get();

        return view('admin.offers.category', [
            'offerCategories' => $list,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoryCreate()
    {
        $offers = Offer::where('deleted', 0)->get();
        $categories = Category::all();
        return view('admin.offers.category_create', [
            "offers"=>$offers,
            "categories"=>$categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCustomerRequest $request
     * @return \Illuminate\Http\Response
     */
    public function categoryStore()
    {
        $data = request()->except('_token', '_method');
        $offerCategory = OfferCategory::where('offers_id', $data['offers_id'])->where('categories_id', $data['categories_id'])->first();
        if($offerCategory==null) {
            $offerCategory = OfferCategory::create($data);
        }
        return redirect()->route('admin.offers.category');
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
        $offer = Offer::create($data);

        return redirect()->route('admin.offers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.offers.edit', ['offer' => Offer::find($id)]);
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

        $offer = Offer::where('id', $id)->update($data);

        request()->session()->flash('message', 'Update successful');
        return redirect()->route('admin.offers.edit', $id);
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
        Offer::where('id', $id)->update(['deleted'=>1]);

        return redirect()->route('admin.offers.index')->with('message', 'Delete successful');
    }
}
