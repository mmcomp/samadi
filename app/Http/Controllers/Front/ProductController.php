<?php

namespace App\Http\Controllers\Front;

use App\Shop\Products\Product;
use App\Shop\Orders\Order;
use App\Shop\Orders\OrderProduct;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Shop\Carts\Repositories\Interfaces\CartRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Shop\Products\Transformations\ProductTransformable;
use App\Shop\Customers\Customer;
use App\Shop\Customers\CustomerBookmark;
use App\Shop\Categories\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Shop\Slides\Slide;

class ProductController extends Controller
{
    use ProductTransformable;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepo;
    private $cartRepo;
    private $slides = [];

    /**
     * ProductController constructor.
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository, CartRepositoryInterface $cartRepository)
    {
        $this->productRepo = $productRepository;
        $this->cartRepo = $cartRepository;
        $this->slides = Slide::all();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search()
    {
        if (request()->has('q') && request()->input('q') != '') {
            $list = $this->productRepo->searchProduct(request()->input('q'));
        } else {
            $list = $this->productRepo->listProducts();
        }

        $products = $list->where('status', 1)->map(function (Product $item) {
            return $this->transformProduct($item);
        });

        return view('front.products.product-search', [
            'products' => $this->productRepo->paginateArrayResults($products->all(), 10),
            "slides"=>$this->slides,
        ]);
    }

    /**
     * Get the product
     *
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, string $slug)
    {
        $product = $this->productRepo->findProductBySlug(['slug' => $slug]);
        $images = $product->images()->get();
        $category = $product->categories()->first();
        $productAttributes = $product->attributes;
        $locale = $request->session()->get('locale');
        if($locale==null) {
            $locale = 'fa';
        }
        App::setlocale($locale);
        $slides = $this->slides;
        return view('front.products.product', compact(
            'product',
            'images',
            'productAttributes',
            'category',
            'combos',
            'locale',
            "slides"
        ));
    }

    /**
     * Get a product
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showId(Request $request, int $id)
    {
        $customerBookmark = null;
        if (auth()->guard('web')->check()) {
            $customer = auth()->guard('web')->user();
            $customerBookmark = CustomerBookmark::where('customer_id', $customer->id)->where('product_id', $id)->first();
        }

        $product = $this->productRepo->findProductById($id);
        $images = $product->images()->get();
        $categories = $product->categories()->get();
        $category = $product->categories()->first();
        $owner = $product->customer()->first();
        $productAttributes = $product->attributes;
        $orders = OrderProduct::where('product_id', $product->id)->pluck('order_id')->toArray();
        $otherProductsIds = OrderProduct::whereIn('order_id', $orders)->where('product_id', '!=', $product->id)->groupBy('product_id')->pluck('product_id')->toArray();
        $otherProducts = Product::whereIn('id', $otherProductsIds)->get();
        $newProducts = Product::orderBy('created_at', 'desc')->limit(4)->with('categories')->get();
        $similarProductIds = CategoryProduct::whereIn('category_id', $categories->pluck('id'))->pluck('product_id');
        $similarProducts = Product::whereIn('id', $similarProductIds)->get();
        // dd($newProducts);
        $locale = $request->session()->get('locale');
        if($locale==null) {
            $locale = 'fa';
        }
        App::setlocale($locale);
        // dd($images);
        $slides = $this->slides;
        $cartItems = $this->cartRepo->getCartItemsTransformed();
        return view('front.products.product', compact(
            'product',
            'images',
            'productAttributes',
            'category',
            'categories',
            'combos',
            'locale',
            'owner',
            'otherProducts',
            'newProducts',
            'slides',
            'customerBookmark',
            'similarProducts',
            'cartItems'
        ));
    }

    /**
     * Like a product
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function like(Request $request)
    {
        $id = (int)$request->input('product', 0);
        $product = Product::find($id);
        if(!$product){
            return redirect()->route('home');
        }
        $product->like_count++;
        $product->save();
        if($product->customer_id && $product->customer_id>0) {
            $customer = Customer::find($product->customer_id);
            $customer->likes_count++;
            $customer->save();
        }
        return redirect()->route('front.get.productid', ['id'=>$id]);
    }

    /**
     * Toggle bookmark of a product
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function bookmark(Request $request)
    {
        $id = (int)$request->input('product', 0);
        $product = Product::find($id);
        if(!$product){
            return redirect()->route('home');
        }
        if (auth()->guard('web')->check()) {
            $customer = auth()->guard('web')->user();
            $customerBookmark = CustomerBookmark::where('customer_id', $customer->id)->where('product_id', $id)->first();
            if($customerBookmark) {
                $customerBookmark->delete();
            }else {
                $customerBookmark = new CustomerBookmark;
                $customerBookmark->customer_id = $customer->id;
                $customerBookmark->product_id = $id;
                $customerBookmark->save();
            }
            return redirect()->route('front.get.productid', ['id'=>$id]);
        }
        return redirect()->route('admin.login');
    }
}
