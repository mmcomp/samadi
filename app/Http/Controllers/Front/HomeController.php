<?php

namespace App\Http\Controllers\Front;

use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Shop\News\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepo;
    private $productRepo;
    private $newsRepo;

    /**
     * HomeController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository, ProductRepositoryInterface $productRepository)
    {
        $this->categoryRepo = $categoryRepository;
        $this->productRepo = $productRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Products
        $newProducts = $this->productRepo->newProducts();
        $topSaleProducts = $this->productRepo->topSaleProducts();
        $topWorkProducts = $this->productRepo->topWorkProducts();
        //\Products
        // News
        $topNews = News::orderBy('updated_at', 'desc')->limit(10)->get();
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
        return view('front.about');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact(Request $request)
    {
        return view('front.contact');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function privacy(Request $request)
    {
        return view('front.privacy');
    }
}
