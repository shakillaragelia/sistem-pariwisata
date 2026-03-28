<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kritiksaran extends Model
{
    use HasFactory;
    protected $table ='kritiksarans';
    protected $primaryKey = 'id_kritiksaran';
    protected $fillable = [
    'id_user',
    'nama_pengirim',
    'subjek',
    'konten',
    'email_pengirim',
    'balasan',
    'dibalas_at',
];

    public function user()
{
    return $this->belongsTo(User::class, 'id_user');
}

    
}
