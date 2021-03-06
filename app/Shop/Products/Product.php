<?php

namespace App\Shop\Products;

use App\Shop\Brands\Brand;
use App\Shop\Categories\Category;
use App\Shop\Customers\Customer;
use App\Shop\ProductAttributes\ProductAttribute;
use App\Shop\ProductImages\ProductImage;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Nicolaslopezj\Searchable\SearchableTrait;
use App\Shop\Offers\Offer;
use App\Shop\Offers\OfferCategory;
use App\Shop\Categories\CategoryProduct;

class Product extends Model implements Buyable
{
    use SearchableTrait;

    public const MASS_UNIT = [
        'OUNCES' => 'oz',
        'GRAMS' => 'gms',
        'POUNDS' => 'lbs'
    ];

    public const DISTANCE_UNIT = [
        'CENTIMETER' => 'cm',
        'METER' => 'mtr',
        'INCH' => 'in',
        'MILIMETER' => 'mm',
        'FOOT' => 'ft',
        'YARD' => 'yd'
    ];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'products.name_fa' => 10,
            'products.name_en' => 10,
            'products.name_ar' => 10,
            'products.name_tr' => 10,
            'products.description_fa' => 5,
            'products.description_en' => 5,
            'products.description_ar' => 5,
            'products.description_tr' => 5
        ]
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sku',
        'name_fa',
        'name_en',
        'name_ar',
        'name_tr',
        'description_fa',
        'description_en',
        'description_ar',
        'description_tr',
        'cover',
        'quantity',
        'price',
        'brand_id',
        'status',
        'weight',
        'mass_unit',
        'status',
        'sale_price',
        'length',
        'width',
        'height',
        'distance_unit',
        'slug',
        'file_path',
        'customer_id',
        'like_count',
        'created_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Get the identifier of the Buyable item.
     *
     * @param null $options
     * @return int|string
     */
    public function getBuyableIdentifier($options = null)
    {
        return $this->id;
    }

    /**
     * Get the description or title of the Buyable item.
     *
     * @param null $options
     * @return string
     */
    public function getBuyableDescription($options = null)
    {
        return $this->name;
    }

    /**
     * Get the price of the Buyable item.
     *
     * @param null $options
     * @return float
     */
    public function getBuyablePrice($options = null)
    {
        return $this->price;
    }

    /**
     * Get the sale price of the item.
     *
     * @return float
     */
    public function getSalePriceAttribute($value)
    {
        $categories = CategoryProduct::where("product_id", $this->id)->pluck('category_id')->toArray();
        $offerCategories = [];
        if(count($categories)>0) {
            $offerCategories = OfferCategory::whereIn('categories_id', $categories)->pluck('categories_id')->toArray();
        }
        $todayOffers = Offer::where("start_date", "<=", date("Y-m-d"))->where("end_date", ">=", date("Y-m-d"))->with('categories')->get();
        $allOffers = [];
        $theOffer = null;
        foreach($todayOffers as $todayOffer) {
            if($todayOffer->categories) {
                foreach($todayOffer->categories as $offerCategory) {
                    if(count($offerCategories)>0 && in_array($offerCategory->categories_id, $offerCategories)) {
                        $allOffers[] [] = $todayOffer;
                        if($theOffer==null || $theOffer->percent<$todayOffer->percent) {
                            $theOffer = $todayOffer;
                        }
                    }
                }
            }else {
                $allOffers[] = $todayOffer;
                if($theOffer==null || $theOffer->percent<$todayOffer->percent) {
                    $theOffer = $todayOffer;
                }
            }
        }
        if($theOffer) {
            $sale_price = ceil($this->price * (100 - $theOffer->percent) / 100);
            if($value==null || $sale_price<$value){
                $value = $sale_price;
            }
        }
        if($value>=$this->price) {
            $value = null;
        }
        return $value;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * @param string $term
     * @return Collection
     */
    public function searchProduct(string $term) : Collection
    {
        return self::search($term)->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
