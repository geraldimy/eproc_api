<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RPK extends Model
{
    protected $table = 'rpk';
    protected $fillable = [
        'id,user_id', 'nama_rpk', 'pemilik', 'email', 'divre', 'entitas', 'npwp', 'kota', 'kecamatan', 'kelurahan', 'alamat', 'kode_pos', 'telp', 'latitude', 'longitude', 'created_at', 'updated_at',  
    ];
}