<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['descricao'];

    protected $table = 'comentarios';

    /**
     * Essa função formata o modelo da data salva
     */
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('d-m-Y');
    }
}
