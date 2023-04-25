<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likes';

    protected $fillable = ['user_id'];

    public function likable()
    {
        return $this->morphTo();
    }

    // public function postagem()
    // {
    //     return $this->belongsTo(Postagem::class, 'postagem_id');
    // }
}
