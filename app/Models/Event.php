<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $primaryKey = 'id_event';
    protected $fillable = [
        'gambar',
        'judul',
        'slug',
        'deskripsi',
    ];

    protected $casts = [
        'gambar' => 'array',
    ];
}