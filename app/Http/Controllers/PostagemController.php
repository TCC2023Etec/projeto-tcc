<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePostagem;
use App\Models\Postagem;
use Illuminate\Http\Request;

class PostagemController extends Controller
{
    public function create_postagem()
    {
        return inertia('CadastroPostagem/Create');
    }

    public function store(StoreUpdatePostagem $request)
    {
        // dd($request);
        Postagem::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'imagem' => $request->imagem ? $request->imagem : null,
        ]);

        return redirect()->route('inicial.index')->with('mensagem', 'Postagem enviada para análise!');
    }
}
