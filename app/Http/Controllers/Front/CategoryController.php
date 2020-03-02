<?php

namespace App\Http\Controllers\Front;

use App\Shop\Categories\Repositories\CategoryRepository;
use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;

use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Shop\Carts\Repositories\Interfaces\CartRepositoryInterface;
use App\Shop\Categories\Category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Front\HomeController;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepo;

    /**
     * CategoryController constructor.
     *
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepo = $categoryRepository;
    }

    /**
     * Find the category via the slug
     *
     * @param string $slug
     * @return \App\Shop\Categories\Category
     */
    public function getCategory(string $slug)
    {
        return redirect('/home?cat=' . $slug);
        // dd($slug);
        $locale = request()->session()->get('locale');
        if($locale==null) {
            $locale = 'fa';
        }
        App::setlocale($locale);

        $category = $this->categoryRepo->findCategoryById($slug);

        $repo = new CategoryRepository($category);

        $products = $repo->findProducts()->where('status', 1)->all();

        return view('front.categories.category', [
            'category' => $category,
            'products' => $repo->paginateArrayResults($products, 20),
            'locale' => $locale
        ]);
    }
}
