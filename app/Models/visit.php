<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class visit extends Model
{
    use HasFactory;
    protected $table ='visits';
    protected $fillable = [
        'id_visit',
        'id_user',
        'id_session',
        'ip_address',
        'date',
        'online',
        'time',
    ];
}
