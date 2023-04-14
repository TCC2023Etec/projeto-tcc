<?php

namespace Database\Seeders;

use App\Models\Postagem;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostagemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    

    public function run(): void
    {
        $user = User::factory()->create();

        Postagem::create([
            'titulo' => 'Postagem Teste',
            'descricao' => 'Postagem feita pelo seed',
            'conteudo' => 'Postagem feita através do seed para manter os testes de migration',
            'imagem' => 'imagem.png',
            'user_id' => $user->id,
            'situacao' => 'aprovado'
        ]);

    }
}
