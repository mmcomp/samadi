<?php

namespace App\Shop\Categories;

use Illuminate\Database\Eloquent\Model;
use App\Shop\Category;

class CategoryProduct extends Model
{
    protected $table = 'category_product';

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
