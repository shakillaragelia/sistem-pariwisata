<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class senbud extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_senbud',
        'nama',
        'slug',
        'kategori',
        'deskripsi',
        'gambar',
    ];
}
