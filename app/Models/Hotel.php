<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Rating;

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'hotels';
    protected $primaryKey = 'id_hotel';
    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'lokasi',
        'gambar',
        'bintang',
        'latitude',
        'longitude',
        'telepon',
        'harga_mulai',
        'harga_max',
    ];

    protected $casts = [
        'gambar' => 'array',
    ];

    public function ratings()
{
    return $this->morphMany(Rating::class, 'rateable');
}

public function averageRating()
{
    return round($this->ratings()->avg('rating'), 1);
}

}