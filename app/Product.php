<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = [
        'category', 'product_name', 'short_desc', 'long_desc', 'image', 'color', 'price', 'unit', 'status',  
    ];
}
