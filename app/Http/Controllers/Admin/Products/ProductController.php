<?php

namespace App\Http\Controllers\Admin\Products;

use App\Shop\Attributes\Repositories\AttributeRepositoryInterface;
use App\Shop\AttributeValues\Repositories\AttributeValueRepositoryInterface;
use App\Shop\Brands\Repositories\BrandRepositoryInterface;
use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Shop\ProductAttributes\ProductAttribute;
use App\Shop\Products\Exceptions\ProductInvalidArgumentException;
use App\Shop\Products\Exceptions\ProductNotFoundException;
use App\Shop\Products\Product;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Shop\Products\Repositories\ProductRepository;
use App\Shop\Products\Requests\CreateProductRequest;
use App\Shop\Products\Requests\UpdateProductRequest;
use App\Shop\Categories\Category;
use App\Shop\Categories\CategoryProduct;
use App\Shop\Customers\CustomerBookmark;
use App\Shop\Orders\Order;
use App\Shop\Orders\OrderProduct;
use App\Http\Controllers\Controller;
use App\Shop\Products\Transformations\ProductTransformable;
use App\Shop\Tools\UploadableTrait;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    use ProductTransformable, UploadableTrait;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepo;

    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepo;

    /**
     * @var AttributeRepositoryInterface
     */
    private $attributeRepo;

    /**
     * @var AttributeValueRepositoryInterface
     */
    private $attributeValueRepository;

    /**
     * @var ProductAttribute
     */
    private $productAttribute;

    /**
     * @var BrandRepositoryInterface
     */
    private $brandRepo;

    /**
     * ProductController constructor.
     *
     * @param ProductRepositoryInterface $productRepository
     * @param CategoryRepositoryInterface $categoryRepository
     * @param AttributeRepositoryInterface $attributeRepository
     * @param AttributeValueRepositoryInterface $attributeValueRepository
     * @param ProductAttribute $productAttribute
     * @param BrandRepositoryInterface $brandRepository
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository,
        AttributeRepositoryInterface $attributeRepository,
        AttributeValueRepositoryInterface $attributeValueRepository,
        ProductAttribute $productAttribute,
        BrandRepositoryInterface $brandRepository
    ) {
        $this->productRepo = $productRepository;
        $this->categoryRepo = $categoryRepository;
        $this->attributeRepo = $attributeRepository;
        $this->attributeValueRepository = $attributeValueRepository;
        $this->productAttribute = $productAttribute;
        $this->brandRepo = $brandRepository;

        // $this->middleware(['permission:create-product, guard:employee'], ['only' => ['create', 'store']]);
        // $this->middleware(['permission:update-product, guard:employee'], ['only' => ['edit', 'update']]);
        // $this->middleware(['permission:delete-product, guard:employee'], ['only' => ['destroy']]);
        // $this->middleware(['permission:view-product, guard:employee'], ['only' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Auth::user();
        $isCustomer = false;
        if($admin) {
            $roles = $admin->roles()->get();
            $isCustomer = true;
            foreach($roles as $role) {
                if($role->name!='customer') {
                    $isCustomer = false;
                }
            }
        }
        if($isCustomer==false) {
            $list = Product::where('id', '>', 0)->with('customer')->orderBy('created_at', 'desc')->orderBy('status', 'desc')->get();//$this->productRepo->listProducts('id');
        }else {
            $list = Product::where('customer_id', $admin->id)->orderBy('created_at', 'desc')->orderBy('status', 'desc')->get();
        }


        if (request()->has('q') && (request()->input('q') != '' || request()->input('from') != '' || request()->input('to') != '') && $isCustomer==false) {
            // $list = Product::where('name_fa', 'like', '%' . request()->input('q') . '%')->with('customer')->get();//$this->productRepo->searchProduct(request()->input('q'));
            $q = request()->input('q');
            $from = request()->input('from');
            $to = request()->input('to');

            $list = Product::where(function ($query) use ($q, $from, $to) {
                if($q!='') {
                    $query->where('name_fa', 'like', '%' . $q . '%');
                    $query->orWhere('name_en', 'like', '%' . $q . '%');
                    $query->orWhere('name_ar', 'like', '%' . $q . '%');
                    $query->orWhere('name_tr', 'like', '%' . $q . '%');
                    $query->orWhere('description_fa', 'like', '%' . $q . '%');
                    $query->orWhere('description_en', 'like', '%' . $q . '%');
                    $query->orWhere('description_ar', 'like', '%' . $q . '%');
                    $query->orWhere('description_tr', 'like', '%' . $q . '%');
                    $query->orWhere('id', $q);
                    $query->orWhere('sku', $q);
                }
                if($from!='') {
                    $from = date("Y-m-d", strtotime($from));
                    $query->where('created_at', '>=', $from);
                }
                if($to!='') {
                    $to = date("Y-m-d", strtotime($to));
                    $query->where('created_at', '<=', $to);
                }
            })->with('customer')->orderBy('created_at', 'desc')->orderBy('status', 'desc')->get();
        }else if(request()->has('q') && (request()->input('q') != '' || request()->input('from') != '' || request()->input('to') != '')) {
            // $q = request()->input('q');
            // $list = Product::where('customer_id', $admin->id)->where(function ($query) use ($q) {
            //     $query->where('name_fa', 'like', '%' . $q . '%');
            //     $query->orWhere('name_en', 'like', '%' . $q . '%');
            //     $query->orWhere('name_ar', 'like', '%' . $q . '%');
            //     $query->orWhere('name_tr', 'like', '%' . $q . '%');
            //     $query->orWhere('description_fa', 'like', '%' . $q . '%');
            //     $query->orWhere('description_en', 'like', '%' . $q . '%');
            //     $query->orWhere('description_ar', 'like', '%' . $q . '%');
            //     $query->orWhere('description_tr', 'like', '%' . $q . '%');
            //     $query->orWhere('id', $q);
            // })->orderBy('id')->get();
            $q = request()->input('q');
            $from = request()->input('from');
            $to = request()->input('to');

            $list = Product::where(function ($query) use ($q, $from, $to) {
                if($q!='') {
                    $query->where('name_fa', 'like', '%' . $q . '%');
                    $query->orWhere('name_en', 'like', '%' . $q . '%');
                    $query->orWhere('name_ar', 'like', '%' . $q . '%');
                    $query->orWhere('name_tr', 'like', '%' . $q . '%');
                    $query->orWhere('description_fa', 'like', '%' . $q . '%');
                    $query->orWhere('description_en', 'like', '%' . $q . '%');
                    $query->orWhere('description_ar', 'like', '%' . $q . '%');
                    $query->orWhere('description_tr', 'like', '%' . $q . '%');
                    $query->orWhere('id', $q);
                    $query->orWhere('sku', $q);
                }
                if($from!='') {
                    $from = date("Y-m-d", strtotime($from));
                    $query->where('created_at', '>=', $from);
                }
                if($to!='') {
                    $to = date("Y-m-d", strtotime($to));
                    $query->where('created_at', '<=', $to);
                }
            })->where('customer_id', $admin->id)->orderBy('created_at', 'desc')->orderBy('status', 'desc')->get();
        }

        $products = $list->map(function (Product $item) {
            return $this->transformProduct($item);
        })->all();

        return view('admin.products.list', [
            'products' => $this->productRepo->paginateArrayResults($products, 25),
            'abbas' => $admin,
            'isCustomer' => $isCustomer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepo->listCategories('id', 'asc');//->where('parent_id', 1);
        $admin = Auth::user();
        $isCustomer = false;
        if($admin) {
            $roles = $admin->roles()->get();
            $isCustomer = true;
            foreach($roles as $role) {
                if($role->name!='customer') {
                    $isCustomer = false;
                }
            }
        }
        return view('admin.products.create', [
            'categories' => $categories,
            'brands' => $this->brandRepo->listBrands(['*'], 'id', 'asc'),
            'default_weight' => env('SHOP_WEIGHT'),
            'weight_units' => Product::MASS_UNIT,
            'product' => new Product,
            'abbas' => $admin,
            'isCustomer' => $isCustomer
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateProductRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $data = $request->except('_token', '_method');
        $data['slug'] = str_slug($request->input('name_en'));

        if ($request->hasFile('cover') && $request->file('cover') instanceof UploadedFile) {
            $data['cover'] = $this->productRepo->saveCoverImage($request->file('cover'));
        }
        if ($request->hasFile('file_path') && $request->file('file_path') instanceof UploadedFile) {
            $data['file_path'] = $this->productRepo->saveFilePath($request->file('file_path'));
        }
        $admin = Auth::user();
        $isCustomer = false;
        if($admin) {
            $roles = $admin->roles()->get();
            $isCustomer = true;
            foreach($roles as $role) {
                if($role->name!='customer') {
                    $isCustomer = false;
                }
            }
        }
        if($isCustomer) {
            $data['customer_id'] = $admin->id;
            $admin->files_count++;
            $admin->save();
            if(!isset($data['name_en']) || $data['name_en']==null || $data['name_en']=='') {
                $data['name_en'] = $data['name_fa'];
            }
            if(!isset($data['name_ar']) || $data['name_ar']==null || $data['name_ar']=='') {
                $data['name_ar'] = $data['name_fa'];
            }
            if(!isset($data['name_tr']) || $data['name_tr']==null || $data['name_tr']=='') {
                $data['name_tr'] = $data['name_fa'];
            }
            if(!isset($data['description_en']) || $data['description_en']==null || $data['description_en']=='') {
                $data['description_en'] = $data['description_fa'];
            }
            if(!isset($data['description_ar']) || $data['description_ar']==null || $data['description_ar']=='') {
                $data['description_ar'] = $data['description_fa'];
            }
            if(!isset($data['description_tr']) || $data['description_tr']==null || $data['description_tr']=='') {
                $data['description_tr'] = $data['description_fa'];
            }
            $data['sale_price'] = $data['price'];
        }
        $product = $this->productRepo->createProduct($data);

        $productRepo = new ProductRepository($product);

        if ($request->hasFile('image')) {
            $productRepo->saveProductImages(collect($request->file('image')));
        }

        if ($request->has('categories')) {
            $productRepo->syncCategories($request->input('categories'));
        } else {
            $productRepo->detachCategories();
        }

        return redirect()->route('admin.products.edit', $product->id)->with('message', 'Create successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $product = $this->productRepo->findProductById($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $admin = Auth::user();
        $isCustomer = false;
        if($admin) {
            $roles = $admin->roles()->get();
            $isCustomer = true;
            foreach($roles as $role) {
                if($role->name!='customer') {
                    $isCustomer = false;
                }
            }
        }
        $product = $this->productRepo->findProductById($id);
        $productAttributes = $product->attributes()->get();

        $qty = $productAttributes->map(function ($item) {
            return $item->quantity;
        })->sum();

        if (request()->has('delete') && request()->has('pa')) {
            $pa = $productAttributes->where('id', request()->input('pa'))->first();
            $pa->attributesValues()->detach();
            $pa->delete();

            request()->session()->flash('message', 'Delete successful');
            return redirect()->route('admin.products.edit', [$product->id, 'combination' => 1]);
        }

        $categories = $this->categoryRepo->listCategories('id', 'asc');
            // ->where('parent_id', 1);
        return view('admin.products.edit', [
            'product' => $product,
            'images' => $product->images()->get(['src']),
            'categories' => $categories,
            'selectedIds' => $product->categories()->pluck('category_id')->all(),
            'attributes' => $this->attributeRepo->listAttributes(),
            'productAttributes' => $productAttributes,
            'qty' => $qty,
            'brands' => $this->brandRepo->listBrands(['*'], 'id', 'asc'),
            'weight' => $product->weight,
            'default_weight' => $product->mass_unit,
            'weight_units' => Product::MASS_UNIT,
            'abbas' => $admin,
            'isCustomer' => $isCustomer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProductRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     * @throws \App\Shop\Products\Exceptions\ProductUpdateErrorException
     */
    public function update(UpdateProductRequest $request, int $id)
    {
        $product = $this->productRepo->findProductById($id);
        $productRepo = new ProductRepository($product);

        if ($request->has('attributeValue')) {
            $this->saveProductCombinations($request, $product);
            return redirect()->route('admin.products.edit', [$id, 'combination' => 1])
                ->with('message', 'Attribute combination created successful');
        }

        $data = $request->except(
            'categories',
            '_token',
            '_method',
            'default',
            'image',
            'productAttributeQuantity',
            'productAttributePrice',
            'attributeValue',
            'combination'
        );

        $data['slug'] = str_slug($request->input('name_en'));

        if ($request->hasFile('cover')) {
            $data['cover'] = $productRepo->saveCoverImage($request->file('cover'));
        }

        if ($request->hasFile('file_path') && $request->file('file_path') instanceof UploadedFile) {
            $data['file_path'] = $productRepo->saveFilePath($request->file('file_path'));
        }

        if ($request->hasFile('image')) {
            $productRepo->saveProductImages(collect($request->file('image')));
        }

        if ($request->has('categories')) {
            $productRepo->syncCategories($request->input('categories'));
        } else {
            $productRepo->detachCategories();
        }

        if(!isset($data['sale_price'])) {
            $data['sale_price'] = $data['price'];
        }

        $productRepo->updateProduct($data);

        return redirect()->route('admin.products.edit', $id)
            ->with('message', 'Update successful');
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
        $product = $this->productRepo->findProductById($id);
        $product->categories()->sync([]);
        $productAttr = $product->attributes();

        $productAttr->each(function ($pa) {
            DB::table('attribute_value_product_attribute')->where('product_attribute_id', $pa->id)->delete();
        });

        $productAttr->where('product_id', $product->id)->delete();

        $productRepo = new ProductRepository($product);
        $productRepo->removeProduct();

        return redirect()->route('admin.products.index')->with('message', 'Delete successful');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeImage(Request $request)
    {
        $this->productRepo->deleteFile($request->only('product', 'image'), 'uploads');
        return redirect()->back()->with('message', 'Image delete successful');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeThumbnail(Request $request)
    {
        $this->productRepo->deleteThumb($request->input('src'));
        return redirect()->back()->with('message', 'Image delete successful');
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return boolean
     */
    private function saveProductCombinations(Request $request, Product $product): bool
    {
        $fields = $request->only(
            'productAttributeQuantity',
            'productAttributePrice',
            'sale_price',
            'default'
        );

        if ($errors = $this->validateFields($fields)) {
            return redirect()->route('admin.products.edit', [$product->id, 'combination' => 1])
                ->withErrors($errors);
        }

        $quantity = $fields['productAttributeQuantity'];
        $price = $fields['productAttributePrice'];

        $sale_price = null;
        if (isset($fields['sale_price'])) {
            $sale_price = $fields['sale_price'];
        }

        $attributeValues = $request->input('attributeValue');
        $productRepo = new ProductRepository($product);

        $hasDefault = $productRepo->listProductAttributes()->where('default', 1)->count();

        $default = 0;
        if ($request->has('default')) {
            $default = $fields['default'];
        }

        if ($default == 1 && $hasDefault > 0) {
            $default = 0;
        }

        $productAttribute = $productRepo->saveProductAttributes(
            new ProductAttribute(compact('quantity', 'price', 'sale_price', 'default'))
        );

        // save the combinations
        return collect($attributeValues)->each(function ($attributeValueId) use ($productRepo, $productAttribute) {
            $attribute = $this->attributeValueRepository->find($attributeValueId);
            return $productRepo->saveCombination($productAttribute, $attribute);
        })->count();
    }

    /**
     * @param array $data
     *
     * @return
     */
    private function validateFields(array $data)
    {
        $validator = Validator::make($data, [
            'productAttributeQuantity' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator;
        }
    }

    /**
     * Display a listing of the bookmarks.
     *
     * @return \Illuminate\Http\Response
     */
    public function bookmarks()
    {
        $admin = Auth::user();
        $isCustomer = false;
        if($admin) {
            $roles = $admin->roles()->get();
            $isCustomer = true;
            foreach($roles as $role) {
                if($role->name!='customer') {
                    $isCustomer = false;
                }
            }
        }
        if($isCustomer==false) {
            return redirect('/admin/products');
        }

        $productIds = CustomerBookmark::where('customer_id', $admin->id)->pluck('product_id');
        $list = Product::whereIn('id', $productIds)->orderBy('id')->get();

        if(request()->has('q') && request()->input('q') != '') {
            // dump($productIds);
            $q = request()->input('q');
            // dump($q);
            $list = Product::whereIn('id', $productIds)->where(function ($query) use ($q) {
                $query->where('name_fa', 'like', '%' . $q . '%');
                $query->orWhere('name_en', 'like', '%' . $q . '%');
                $query->orWhere('name_ar', 'like', '%' . $q . '%');
                $query->orWhere('name_tr', 'like', '%' . $q . '%');
                $query->orWhere('description_fa', 'like', '%' . $q . '%');
                $query->orWhere('description_en', 'like', '%' . $q . '%');
                $query->orWhere('description_ar', 'like', '%' . $q . '%');
                $query->orWhere('description_tr', 'like', '%' . $q . '%');
            })->orderBy('id')->get();
            // dd($list);
        }

        $products = $list->map(function (Product $item) {
            return $this->transformProduct($item);
        })->all();

        return view('admin.products.bookmark', [
            'products' => $this->productRepo->paginateArrayResults($products, 25),
            'abbas' => $admin,
            'isCustomer' => $isCustomer
        ]);
    }

    /**
     * Display a listing of the selled .
     *
     * @return \Illuminate\Http\Response
     */
    public function selled()
    {
        $admin = Auth::user();
        $isCustomer = false;
        if($admin) {
            $roles = $admin->roles()->get();
            $isCustomer = true;
            foreach($roles as $role) {
                if($role->name!='customer') {
                    $isCustomer = false;
                }
            }
        }
        // if($isCustomer==false) {
        //     return redirect('/admin/products');
        // }
        if($isCustomer) {
            $productIds = Product::where('customer_id', $admin->id)->pluck('id');
        }else {
            $productIds = Product::where('id', '>', 0)->pluck('id');
        }
        $productIds = OrderProduct::whereIn('product_id', $productIds)->pluck('product_id');
        $list = Product::whereIn('id', $productIds)->get();

        if(request()->has('q') && (request()->input('q') != '' || request()->input('from') != '' || request()->input('to') != '')) {
            $q = request()->input('q');
            $from = request()->input('from');
            $to = request()->input('to');
            if($from!='' || $to!='') {
                $orders = Order::where(function($query) use ($from, $to) {
                    if($from!='') {
                        $from = date("Y-m-d", strtotime($from));
                        $query->where('created_at', '>=', $from);
                    }
                    if($to!='') {
                        $to = date("Y-m-d", strtotime($to));
                        $query->where('created_at', '<=', $to);
                    }
                })->pluck('id');
                if($isCustomer) {
                    $productIds = Product::where('customer_id', $admin->id)->pluck('id');
                }else {
                    $productIds = Product::where('id', '>', 0)->pluck('id');
                }
                $productIds = OrderProduct::whereIn('product_id', $productIds)->whereIn('order_id', $orders)->pluck('product_id');
            }
            $list = Product::whereIn('id', $productIds)->where(function ($query) use ($q) {
                if($q!='') {
                    $query->where('name_fa', 'like', '%' . $q . '%');
                    $query->orWhere('name_en', 'like', '%' . $q . '%');
                    $query->orWhere('name_ar', 'like', '%' . $q . '%');
                    $query->orWhere('name_tr', 'like', '%' . $q . '%');
                    $query->orWhere('description_fa', 'like', '%' . $q . '%');
                    $query->orWhere('description_en', 'like', '%' . $q . '%');
                    $query->orWhere('description_ar', 'like', '%' . $q . '%');
                    $query->orWhere('description_tr', 'like', '%' . $q . '%');
                }
            })->orderBy('id')->get();
        }

        $products = $list->map(function (Product $item) {
            return $this->transformProduct($item);
        })->all();

        return view('admin.products.selled', [
            'products' => $this->productRepo->paginateArrayResults($products, 25),
            'abbas' => $admin,
            'isCustomer' => $isCustomer
        ]);
    }
}
