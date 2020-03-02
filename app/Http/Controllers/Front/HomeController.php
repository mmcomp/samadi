<?php

namespace App\Http\Controllers\Front;

use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Shop\Carts\Repositories\Interfaces\CartRepositoryInterface;
use App\Shop\Products\Product;
use App\Shop\Categories\Category;
use App\Shop\Categories\CategoryProduct;
use App\Shop\News\News;
use App\Shop\Offers\Offer;
use App\Shop\Offers\OfferCatagory;
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
    public function __construct(CategoryRepositoryInterface $categoryRepository, ProductRepositoryInterface $productRepository, CartRepositoryInterface $cartRepository)
    {
        $this->categoryRepo = $categoryRepository;
        $this->productRepo = $productRepository;
        $this->cartRepo = $cartRepository;
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

        $productCount = Product::where('status', 1)->count();
        // dd($productCount);

        // Categories
        $allCats = Category::all();
        //\Categories
        // Offers
        $todayOffers = Offer::where("start_date", "<=", date("Y-m-d"))->where("end_date", ">=", date("Y-m-d"))->with('categories')->get();
        $categoriesOffers = [];
        $allOffers = [];
        foreach($todayOffers as $todayOffer) {
            if($todayOffer->categories) {
                foreach($todayOffer->categories as $offerCategory) {
                    if(!isset($categoriesOffers[$offerCategory->categories_id])) {
                        $categoriesOffers[$offerCategory->categories_id] = [];
                    }
                    $categoriesOffers[$offerCategory->categories_id] [] = $todayOffer;
                }
            }else {
                $allOffers[] = $todayOffer;
            }
        }
        // dump($allOffers);
        // dd($categoriesOffers);
        //\Offers
        $search = "";
        $filter = [];
        $isSearch = false;
        $searchLimit = 100;
        if ($request->isMethod('post')) {
            $search = $request->input('search');
            $filter = $request->input('filter');
            $isSearch = true;
        }else {
            if($request->input('cat')) {
                $filter[] = $request->input('cat');
            }
        }
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
            if(!$free && $nofree) {
                $query->where('price', '>', 0);
            }else if($free && !$nofree) {
                $query->where('price', 0);
            }
        })->where('status', 1)->orderBy('created_at', 'desc')->orderBy('like_count', 'desc');
        // dd($isSearch);
        if($isSearch) {
            $searchResults = $searchResults->paginate($searchLimit);
        }else {
            $searchResults = $searchResults->limit($searchLimit)->get();
        }
        foreach($searchResults as $i=>$newProduct) {
            $searchResults[$i]->offers = [];
            foreach($newProduct->categories as $productCategory) {
                $thisProductOffers = $searchResults[$i]->offers;
                if(isset($categoriesOffers[$productCategory->id])) {
                    foreach($categoriesOffers[$productCategory->id] as $cOffer) {
                        $found = false;
                        foreach($searchResults[$i]->offers as $pOffer) {
                            if($pOffer->id==$cOffer->id) {
                                $found = true;
                            }
                        }
                        if(!$found) {
                            $thisProductOffers[] = $cOffer;
                        }
                    }
                }
                $searchResults[$i]->offers = $thisProductOffers;
            }
        }
        // Products
        $newProducts = $this->productRepo->newProducts(5);
        $topSaleProducts = $this->productRepo->topSaleProducts(5);
        // $topWorkProducts = $this->productRepo->topWorkProducts(5);
        $topLikeProducts = $this->productRepo->topLikeProducts(10);
        foreach($newProducts as $i=>$newProduct) {
            $newProducts[$i]->offers = [];
            foreach($newProduct->categories as $productCategory) {
                $thisProductOffers = $newProducts[$i]->offers;
                if(isset($categoriesOffers[$productCategory->id])) {
                    foreach($categoriesOffers[$productCategory->id] as $cOffer) {
                        $found = false;
                        foreach($newProducts[$i]->offers as $pOffer) {
                            if($pOffer->id==$cOffer->id) {
                                $found = true;
                            }
                        }
                        if(!$found) {
                            $thisProductOffers[] = $cOffer;
                        }
                    }
                }
                $newProducts[$i]->offers = $thisProductOffers;
            }
        }
        foreach($topSaleProducts as $i=>$newProduct) {
            $topSaleProducts[$i]->offers = [];
            foreach($newProduct->categories as $productCategory) {
                $thisProductOffers = $topSaleProducts[$i]->offers;
                if(isset($categoriesOffers[$productCategory->id])) {
                    foreach($categoriesOffers[$productCategory->id] as $cOffer) {
                        $found = false;
                        foreach($topSaleProducts[$i]->offers as $pOffer) {
                            if($pOffer->id==$cOffer->id) {
                                $found = true;
                            }
                        }
                        if(!$found) {
                            $thisProductOffers[] = $cOffer;
                        }
                    }
                }
                $topSaleProducts[$i]->offers = $thisProductOffers;
            }
        }
        // foreach($topWorkProducts as $i=>$newProduct) {
        //     $topWorkProducts[$i]->offers = [];
        //     foreach($newProduct->categories as $productCategory) {
        //         $thisProductOffers = $topWorkProducts[$i]->offers;
        //         if(isset($categoriesOffers[$productCategory->id])) {
        //             foreach($categoriesOffers[$productCategory->id] as $cOffer) {
        //                 $found = false;
        //                 foreach($topWorkProducts[$i]->offers as $pOffer) {
        //                     if($pOffer->id==$cOffer->id) {
        //                         $found = true;
        //                     }
        //                 }
        //                 if(!$found) {
        //                     $thisProductOffers[] = $cOffer;
        //                 }
        //             }
        //         }
        //         $topWorkProducts[$i]->offers = $thisProductOffers;
        //     }
        // }
        foreach($topLikeProducts as $i=>$newProduct) {
            $topLikeProducts[$i]->offers = [];
            foreach($newProduct->categories as $productCategory) {
                $thisProductOffers = $topLikeProducts[$i]->offers;
                if(isset($categoriesOffers[$productCategory->id])) {
                    foreach($categoriesOffers[$productCategory->id] as $cOffer) {
                        $found = false;
                        foreach($topLikeProducts[$i]->offers as $pOffer) {
                            if($pOffer->id==$cOffer->id) {
                                $found = true;
                            }
                        }
                        if(!$found) {
                            $thisProductOffers[] = $cOffer;
                        }
                    }
                }
                $topLikeProducts[$i]->offers = $thisProductOffers;
            }
        }
        // dd($newProducts[0]->offers);
        // $topSaleProducts = $newProducts;
        // $topWorkProducts = $newProducts;
        //\Products
        // News
        $topNews = News::orderBy('updated_at', 'desc')->limit(5)->get();
        //\News

        $locale = $request->session()->get('locale');
        if($locale==null) {
            $locale = 'fa';
        }
        App::setlocale($locale);
        $cartItems = $this->cartRepo->getCartItemsTransformed();
        return view('front.index', [
            "locale"=>$locale,
            "newProducts"=>$newProducts,
            "topSaleProducts"=>$topSaleProducts,
            "topLikeProducts"=>$topLikeProducts,
            "topNews"=>$topNews,
            "isSearch"=>$isSearch,
            "searchResults"=>$searchResults,
            "allCats"=>$allCats,
            "search"=>$search,
            "filter"=>$filter,
            "cartItems"=>$cartItems,
            "slides"=>$this->slides,
            "offers"=>$todayOffers,
            "productCount"=>$productCount,
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
        $locale = $request->session()->get('locale');
        if($locale==null) {
            $locale = 'fa';
        }
        App::setlocale($locale);
        return view('front.about', ["slides"=>$this->slides, "locale"=>$locale]);
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
