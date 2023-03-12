<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'senha'];

    protected $table = 'administradores';


    /**
     * Essa função formata o modelo da data salva
     */
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('d-m-Y');
    }
}
