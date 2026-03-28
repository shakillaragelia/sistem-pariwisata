<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Komentar;

class Wisata extends Model
{
    use HasFactory;
    protected $table ='wisatas';
    protected $primaryKey = 'id_wisata';
    protected $fillable = [
    'id_kategori',
    'nama',
    'slug',
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

    protected $casts = [
        'gambar' => 'array',
        'toilet' => 'boolean',
        'parkir' => 'boolean',
        'tempat_ibadah' => 'boolean',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi komentar polymorphic
    public function komentar()
    {
        return $this->morphMany(Komentar::class, 'commentable');
    }
}
