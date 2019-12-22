<?php

namespace App\Shop\Offers;

use App\Shop\Offers\Offer;
use App\Shop\Categories\Category;
use Illuminate\Database\Eloquent\Model;

class OfferCategory extends Model
{
    public $timestamps = false;
    protected $table = 'offer_category';
    protected $fillable = [
        'offers_id',
        'categories_id',
    ];
    
    public function offer()
    {
        return $this->hasOne(Offer::class, 'id', 'offers_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'categories_id');
    }
}
