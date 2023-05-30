<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;

    protected $table = 'favoritos';

    protected $fillable = ['user_id', 'postagem_id'];

    protected $with = [
        'usuario',
        'postagem'
    ];

    // public function postagem()
    // {
    //     return $this->belongsTo(Postagem::class, 'postagem_id');
    // }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function postagem()
    {
        return $this->belongsTo(Postagem::class);
    }
}
