<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wisata extends Model
{
    use HasFactory;
    protected $table ='wisatas';
    protected $primaryKey = 'id_wisata';
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

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function wisata() {
        return $this->belongsTo(Wisata::class, 'id_wisata');
    }

    public function komentars()
{
    return $this->morphMany(Komentar::class, 'commentable');
}


}
