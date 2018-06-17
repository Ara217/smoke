<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name', 'brand', 'price', 'image', 'count', 'description', 'image', 'main_image'
    ];
}
