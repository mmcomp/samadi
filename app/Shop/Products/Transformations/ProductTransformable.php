<?php

namespace App\Shop\Products\Transformations;

use App\Shop\Products\Product;
use Illuminate\Support\Facades\Storage;

trait ProductTransformable
{
    /**
     * Transform the product
     *
     * @param Product $product
     * @return Product
     */
    protected function transformProduct(Product $product)
    {
        $prod = new Product;
        $prod->id = (int) $product->id;
        $prod->name_fa = $product->name_fa;
        $prod->name_en = $product->name_en;
        $prod->name_ar = $product->name_ar;
        $prod->name_tr = $product->name_tr;
        $prod->sku = $product->sku;
        $prod->slug = $product->slug;
        $prod->description_fa = $product->description_fa;
        $prod->description_en = $product->description_en;
        $prod->description_ar = $product->description_ar;
        $prod->description_tr = $product->description_tr;
        $prod->cover = asset("storage/$product->cover");
        $prod->quantity = $product->quantity;
        $prod->price = $product->price;
        $prod->status = $product->status;
        $prod->weight = (float) $product->weight;
        $prod->mass_unit = $product->mass_unit;
        $prod->sale_price = $product->sale_price;
        $prod->brand_id = (int) $product->brand_id;
        $prod->file_path = $product->file_path;
        $prod->customer_id = (int) $product->customer_id;
        $prod->like_count = (int) $product->like_count;
        $prod->customer = $product->customer;
        return $prod;
    }
}
