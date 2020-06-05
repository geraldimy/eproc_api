<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promo';
    protected $fillable = [
       'id','promo_title', 'promo_desc', 'image', 'promo_start_date', 'promo_end_date', 'created_at', 'updated_at',
    ];
}
