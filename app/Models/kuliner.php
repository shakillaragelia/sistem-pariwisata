<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kuliner extends Model
{
    use HasFactory;
    protected $table ='kuliners';
    protected $primaryKey = 'id_kuliner';
    protected $fillable = [
        'id_kuliner', 
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

    public function komentars()
{
    return $this->morphMany(\App\Models\Komentar::class, 'commentable');
}


}
