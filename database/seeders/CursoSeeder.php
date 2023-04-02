<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Curso::create([
            'nome' => 'Técnico em Administração',
            'duracao' => 3 
        ]);

        Curso::create([
            'nome' => 'Técnico em Informática',
            'duracao' => 3 
        ]);

        Curso::create([
            'nome' => 'Técnico em Contabildiade',
            'duracao' => 2
        ]);

        Curso::create([
            'nome' => 'Técnico em Desenvolvimento de Sistema',
            'duracao' => 3 
        ]);
    }
}
