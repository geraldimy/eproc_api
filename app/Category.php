<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = [ 'id', 'category_name', 'description',  'created_at', 'updated_at',
    ];




}
