<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Postagem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['titulo', 'descricao', 'imagem', 'conteudo', 'aprovado_por'];

    protected $table = 'postagens';

    protected $appends = [
        'like'
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
