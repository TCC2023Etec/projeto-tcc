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

    protected $fillable = ['titulo', 'descricao', 'imagem', 'conteudo'];

    protected $table = 'postagens';

    // Relações
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
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
