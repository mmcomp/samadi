<?php

namespace App\Shop\News;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class News extends Model
{
  protected $fillable = [
    'title',
    'image_path',
];
}
