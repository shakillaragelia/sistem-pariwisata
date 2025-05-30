<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class senbud extends Model
{
    use HasFactory;
    protected $table ='senbuds';
    protected $primaryKey = 'id_senbud';
    protected $fillable = [
        'id_senbud',
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
