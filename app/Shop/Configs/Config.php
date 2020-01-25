<?php

namespace App\Shop\Configs;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'config';
    protected $fillable = [
        'key',
        'value',
        'deleted',
    ];

    static public function getKeyValue($key) {
        $value = Config::where('key', $key)->first();
        if($value) {
            $value = $value->value;
        }
        return $value;
    }

    static public function setKeyValue($key, $value=null) {
        $keyVal = Config::where('key', $key)->first();
        if(!$keyVal) {
            $keyVal = new Config;
            $keyVal->key = $key;
            $keyVal->deleted = 0;
        }
        $keyVal->value = $value;
        $keyVal->save();
        return $value;
    }
}
