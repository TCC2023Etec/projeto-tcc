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
        $user1 = User::factory()->create();

        $texto = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut lorem id metus sodales condimentum at eu dui. Vivamus consequat ligula congue nunc porta ultricies. Integer mollis metus eu neque blandit malesuada. Maecenas porta maximus elit. Sed hendrerit sapien nec pellentesque efficitur. Sed et vulputate nisi. Donec sit amet odio elit. Sed ultrices fermentum lorem et sagittis.

        Nulla sagittis blandit tellus, vel consectetur lorem maximus in. Etiam ultrices congue arcu, nec auctor nunc efficitur luctus. Integer pharetra, ligula ac egestas tristique, odio magna consequat elit, sed tempor lorem libero ut ante. Duis porttitor vehicula quam, vel commodo nisi. Cras nec orci id ex luctus porttitor. Duis sit amet magna mauris. Mauris eros justo, eleifend fermentum suscipit eget, pulvinar vitae elit. Phasellus posuere eros quis erat tincidunt sollicitudin. In hendrerit eleifend condimentum. Nunc ut erat vitae est accumsan viverra non in ex.
        
        Suspendisse auctor nulla ac est fringilla, pulvinar consequat metus euismod. Etiam fermentum semper sapien quis congue. In ut ultricies augue. Cras arcu ligula, semper id sem vel, ornare auctor risus. Nam iaculis sodales ante quis porttitor. Vivamus a semper nunc. In tincidunt libero non sem ultrices, rhoncus sagittis enim consequat. Phasellus sollicitudin tincidunt nunc non pretium. Cras lacinia eu lectus nec viverra. Nulla egestas, justo ac aliquam lobortis, sem sapien cursus augue, et tempor augue mi id velit. Integer eget velit eget urna tempor vestibulum eu ac ipsum.';

        Postagem::create([
            'titulo' => 'Postagem Teste',
            'descricao' => 'Postagem feita pelo seed',
            'conteudo' => 'Postagem feita através do seed para manter os testes de migration',
            'imagem' => 'imagem.png',
            'user_id' => $user->id,
            'situacao' => 'aprovado',
            'aprovado_por' => 3
        ]);

        Postagem::create([
            'titulo' => 'Etec Patrocina corrida de alunos',
            'descricao' => 'Corrida de Alunos',
            'conteudo' => 'Na manhã do dia 12/12 foi realizado uma corrida entre as turmas do ensino médio da Etec de Araçatuba. Além de patrocinar o incentivo à corrida, a escola também está arrecadando alimentos para doação à instituições de caridade',
            'imagem' => 'imagem2.png',
            'user_id' => $user1->id,
            'situacao' => 'aprovado',
            'aprovado_por' => 3
        ]);

        Postagem::create([
            'titulo' => 'Postagem Teste',
            'descricao' => 'Postagem feita pelo seed',
            'conteudo' => $texto,
            'imagem' => 'imagem3.png',
            'user_id' => $user1->id,
            'situacao' => 'aprovado',
            'aprovado_por' => 3
        ]);
    }
}
