<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Komentar extends Model
{
    protected $table = 'komentars';
    protected $primaryKey = 'id_komentar';


    
    protected $fillable = [
        'id_user', 'komentar', 'commentable_id', 'commentable_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); 
    }

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
}
