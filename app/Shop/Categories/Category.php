<?php

namespace App\Shop\Categories;

use App\Shop\Products\Product;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use NodeTrait;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_fa',
        'name_en',
        'name_ar',
        'name_tr',
        'slug',
        'description_fa',
        'description_en',
        'description_ar',
        'description_tr',
        'cover',
        'status',
        'parent_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
