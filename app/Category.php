<?php

namespace App;
use Eloquent;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Category extends Eloquent
{
    protected $table = 'category';
    protected $fillable = [
        'id', 'category_name', 
    ];


    public function product()
    {
        return $this->belongsTo('App\Product', 'id', 'category'  );
    }

}
