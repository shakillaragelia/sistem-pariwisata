<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kritiksaran extends Model
{
    use HasFactory;
    protected $table ='kritiksarans';
    protected $fillable = [
        'id_kritiksaran', 
        'id_user',
        'subjek',
        'konten',
    ];
}
