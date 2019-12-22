<?php

namespace App\Shop\Transactions;

use App\Shop\Products\Product;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = [
        'type',
        'amount',
        'customer_id',
        'order_id',
        'product_id',
        'owner_id',
        'description',
        'bank_reference',
        'bank_data',
    ];
        
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
