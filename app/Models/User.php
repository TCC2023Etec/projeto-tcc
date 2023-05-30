<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tipo',
        'situacao',
        'imagem',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Essa função formata o modelo da data salva
     */
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('d-m-Y');
    }

    /**
     * Relações
     */

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    public function posts()
    {
        return $this->hasMany(Postagem::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function favoritos()
    {
        return $this->hasMany(Favorito::class);
    }

    public function aprovado()
    {
        $this->situacao = 'aprovado';
        $this->save();
    }

    public function reprovado()
    {
        $this->situacao = 'reprovado';
        $this->save();
    }
}
