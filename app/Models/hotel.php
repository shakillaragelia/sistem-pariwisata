<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class hotel extends Model
{
    use HasFactory;
    protected $table ='hotels';
    protected $primaryKey = 'id_hotel';
    protected $fillable = [
        'id_hotel',
        'nama',
        'slug',
        'deskripsi',
        'lokasi',
        'gambar',
        'bintang',
        'latitude',
        'longitude',

    ];
}
