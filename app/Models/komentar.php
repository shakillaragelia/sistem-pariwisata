<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class komentar extends Model
{
    use HasFactory;
    protected $table ='komentars';
    protected $primaryKey = 'id_komentar';
    protected $fillable = [
        'id_komentar',
        'id_wisata',
        'id_user',
        'komentar',
    ];
    
    public function wisata()
{
    return $this->belongsTo(Wisata::class, 'id_wisata');
}

public function user()
{
    return $this->belongsTo(User::class, 'id_user');
}

public function commentable()
{
    return $this->morphTo();
}



}
