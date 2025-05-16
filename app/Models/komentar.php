<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class komentar extends Model
{
    use HasFactory;
    protected $table ='komentars';
    protected $fillable = [
        'id_komentar',
        'id_wisata',
        'id_user',
        'komentar',
    ];
}
