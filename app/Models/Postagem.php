<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao', 'imagem'];

    protected $table = 'postagens';

    // Relações
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Essa função formata o modelo da data salva
     */
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('d-m-Y');
    }
}
