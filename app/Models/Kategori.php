<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori'; // Sesuaikan jika nama tabel berbeda

    protected $fillable = [
        'nama',
        'slug',
        'gambar',
    ];
}

