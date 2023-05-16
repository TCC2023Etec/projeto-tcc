<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Postagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function store(Request $request, Postagem $postagem) 
    {
        $request->validate([
            'descricao' => 'required|string|max:255'
        ]);

        $comentario = new Comentario();

        $comentario->descricao = $request->descricao;

        $comentario->usuario()->associate(Auth::user());
        $comentario->postagem()->associate($postagem);

        $comentario->save();
    }

    public function update(Comentario $comentario, Request $request)
    {
        $request->validate([
            'descricao' => 'required|string|max:255'
        ]);

        $comentario->update([$request]);
    }

    public function destroy(Comentario $comentario)
    {
        $comentario->delete();
    }
}
