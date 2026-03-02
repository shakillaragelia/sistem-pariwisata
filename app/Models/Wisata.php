<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Komentar;

class Wisata extends Model
{
    use HasFactory;

    protected $table = 'wisatas';
    protected $primaryKey = 'id_wisata';

    protected $fillable = [
        'nama',
        'slug',
        'id_kategori',
        'deskripsi',
        'harga',
        'lokasi',
        'gambar',
        'latitude',
        'longitude',
        'toilet',
        'parkir',
        'tempat_ibadah',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function komentar()
    {
        return $this->morphMany(Komentar::class, 'commentable');
    }
}
