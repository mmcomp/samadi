<?php

namespace App\Http\Controllers\Front;

use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepo;
    private $productRepo;

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
        // $cat1 = $this->categoryRepo->findCategoryById(2);
        // $cat2 = $this->categoryRepo->findCategoryById(3);
        $newProducts = $this->productRepo->newProducts();
        // dd($newProducts);
        $locale = $request->session()->get('locale');
        if($locale==null) {
            $locale = 'fa';
        }
        App::setlocale($locale);
        return view('front.index', [
            "locale"=>$locale,
            "newProducts"=>$newProducts,
        ]);//compact('cat1', 'cat2', 'locale'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function splash(Request $request)
    {
        return view('layouts.front.splash');
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
