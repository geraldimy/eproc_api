<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use Eloquent;


class Product extends Eloquent
{
    protected $table = 'product';
    protected $fillable = [
        'category', 'product_name', 'short_desc', 'long_desc', 'image', 'color', 'price', 'unit', 'status',  
    ];

    public function kategori() {
        return $this->belongsTo('App\Category','category','id'); 
    }
}
