<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class event extends Model
{
    use HasFactory;
    protected $table ='events';
    protected $primaryKey = 'id_event';
    protected $fillable = [
        'id_event',
        'gambar',
        'judul',
        'slug',
        'deskripsi',
    ];
}
