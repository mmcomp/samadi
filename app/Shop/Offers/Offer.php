<?php

namespace App\Shop\Offers;

use Illuminate\Database\Eloquent\Model;
use App\Shop\Offers\OfferCategory;

class Offer extends Model
{
    public $timestamps = false;
    protected $table = 'offers';
    protected $fillable = [
        'name',
        'description',
        'percent',
        'start_date',
        'end_date',
    ];

    public function categories() {
        return $this->hasMany(OfferCategory::class, 'offers_id');
    }
}
