<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kuliner extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_kuliner', 
        'nama',
        'slug',
        'deskripsi',
        'gambar',
    ];
}
