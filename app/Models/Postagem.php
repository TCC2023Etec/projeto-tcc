<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Postagem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['titulo', 'descricao', 'imagem', 'conteudo', 'aprovado_por'];

    protected $table = 'postagens';

    protected $appends = [
        'like',
    ];

    // Relações
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function aprovador()
    {
        return $this->belongsTo(User::class, 'aprovado_por');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likable');
    }

    public function favoritos()
    {
        // return $this->belongsToMany(User::class, 'favoritos', 'postagem_id', 'user_id');
        return $this->belongsToMany(Favorito::class);
    }

    public function getUsuarioLogadoCurtiuAttribute()
    {
        $usuario = Auth::user();
        if (!$usuario){
            return false;
        }

        if (! $this->relationLoaded('likes')) {
            $this->load('likes');
        }

        return $this->likes->where('usuario.id', $usuario->id)->isNotEmpty();
    }

    public function getUsuarioLogadoFavoritosAttribute()
    {
        $usuario = Auth::user();
        if (!$usuario) {
            return false;
        }

        $favoritos = Favorito::where('postagem_id', $this->id, 'user_id', $usuario->id);

        if ($favoritos) {
            return true;
        } else {
            return false;
        }
    }

    // Getters
    public function getLikeAttribute()
    {
        return $this->likes->count();
    }

    /**
     * Essa função formata o modelo da data salva
     */
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('d-m-Y');
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
