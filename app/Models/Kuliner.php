<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kuliner extends Model
{
    use HasFactory;
    protected $table ='kuliners';
    protected $primaryKey = 'id_kuliner';
    protected $fillable = [
        'nama',
        'slug',
        'id_kategori',
        'deskripsi',
        'gambar',
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
