<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Eloquent;


class Product extends Model
{
    protected $table = 'product';
    protected $fillable = [
       'id','category', 'product_name', 'short_desc', 'long_desc', 'image', 'color', 'price', 'unit', 'status', 'created_at', 'updated_at', 
    ];
  

    public function kategori() {
        return $this->belongsTo('App\Category', 'category' , 'id'); 
    }
}
