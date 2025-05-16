<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wisata extends Model
{
    use HasFactory;
    protected $table ='wisatas';
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

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
