<?php

namespace App\Shop\Attributes;

use App\Shop\AttributeValues\AttributeValue;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = [
        'name_fa',
        'name_en',
        'name_ar',
        'name_tr',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }
}
