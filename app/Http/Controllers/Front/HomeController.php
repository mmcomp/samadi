<?php

namespace App\Http\Controllers\Front;

use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Shop\Products\Product;
use App\Shop\Categories\Category;
use App\Shop\Categories\CategoryProduct;
use App\Shop\News\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Shop\Customers\Customer;
use App\Shop\Slides\Slide;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class HomeController
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepo;
    private $productRepo;
    private $newsRepo;
    private $slides = [];

    /**
     * HomeController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository, ProductRepositoryInterface $productRepository)
    {
        $this->categoryRepo = $categoryRepository;
        $this->productRepo = $productRepository;
        $this->slides = Slide::all();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $isSearch = false;
        $searchResults = null;
        $search = "";
        $filter = null;
        if ($request->isMethod('post')) {
            $isSearch = true;
            $search = $request->input('search');
            $filter = $request->input('filter');
            $catRes = [];
            $free = false;
            $nofree = false;
            if($filter) {
                $cats = [];
                foreach($filter as $cat) {
                    if($cat=='free') {
                        $free = true;
                    }else if($cat=='nofree') {
                        $nofree = true;
                    }else {
                        $cats[] = (int)$cat;
                    }
                }
                if(count($cats)>0) {
                    $catRes = CategoryProduct::whereIn('category_id', $cats)->pluck('product_id');
                }
            }
            $searchResults = Product::where(function ($query) use ($search) {
                $query->where('name_fa', 'like', '%' . $search . '%');
                $query->orWhere('name_en', 'like', '%' . $search . '%');
                $query->orWhere('name_ar', 'like', '%' . $search . '%');
                $query->orWhere('name_tr', 'like', '%' . $search . '%');
            })->where(function ($query) use ($catRes, $free, $nofree) {
                if(count($catRes)>0) {
                    $query->whereIn('id', $catRes);
                }
            })->orderBy('created_at', 'desc')->orderBy('like_count', 'desc')->get();
        }
        // Categories
        $allCats = Category::all();
        //\Categories
        // Products
        $newProducts = $this->productRepo->newProducts(5);
        $topSaleProducts = $this->productRepo->topSaleProducts(5);
        $topWorkProducts = $this->productRepo->topWorkProducts(5);
        $topSaleProducts = $newProducts;
        $topWorkProducts = $newProducts;
        //\Products
        // News
        $topNews = News::orderBy('updated_at', 'desc')->limit(5)->get();
        //\News
        $locale = $request->session()->get('locale');
        if($locale==null) {
            $locale = 'fa';
        }
        App::setlocale($locale);
        return view('front.index', [
            "locale"=>$locale,
            "newProducts"=>$newProducts,
            "topSaleProducts"=>$topSaleProducts,
            "topWorkProducts"=>$topWorkProducts,
            "topNews"=>$topNews,
            "isSearch"=>$isSearch,
            "searchResults"=>$searchResults,
            "allCats"=>$allCats,
            "search"=>$search,
            "filter"=>$filter,
            "slides"=>$this->slides,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function splash(Request $request)
    {
        return view('layouts.front.splash1');
    }
    
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about(Request $request)
    {
        return view('front.about', ["slides"=>$this->slides]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact(Request $request)
    {
        return view('front.contact', ["slides"=>$this->slides]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function privacy(Request $request)
    {
        return view('front.privacy', ["slides"=>$this->slides]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function smsVeify(Request $request, $id, $code)
    {
        $customer = Customer::where('id', $id)->where('code', $code)->first();
        if($customer) {
            $customer->verified = 1;
            $customer->save();
        }
        return view('auth.admin.sms', ["customer"=>$customer, "slides"=>$this->slides]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function emailVeify(Request $request, $id)
    {
        $customer = Customer::where('id', $id)->first();
        if($customer) {
            $customer->email_verified = 1;
            $customer->save();
        }
        return view('auth.admin.email', ["customer"=>$customer, "slides"=>$this->slides]);
    }
    public function mail()
    {
    $link = 'http://google.com';
    Mail::to('m.mirsamie@gmail.com')->send(new SendMailable($link));
    
    return 'Email was sent';
    }
}
