<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visit extends Model
{
    use HasFactory;
    
    protected $table ='visits';
    protected $primaryKey = 'id_visit';
    
    protected $fillable = [
        'id_user',
        'id_session',
        'ip_address',
        'tanggal',
        'online',
        'time',
    ];
}
