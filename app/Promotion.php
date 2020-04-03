<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promo';
    protected $fillable = [
         'promo_name', 'promo_desc', 'image', 'promo_start_date', 'promo_end_date',  
    ];
}
