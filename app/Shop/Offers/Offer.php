<?php

namespace App\Shop\Offers;

use Illuminate\Database\Eloquent\Model;

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
}
