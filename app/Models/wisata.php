<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class wisata extends Model
{
    use HasFactory;

    protected $table = 'wisata';
    protected $fillable = [
        'id_wisata',
        'nama',
        'slug',
        'id_kategori',
        'deskripsi',
        'harga',
        'lokasi',
        'gambar',

    ];
}
