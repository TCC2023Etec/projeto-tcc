<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePostagem;
use App\Models\Postagem;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\PostDec;

class PostagemController extends Controller
{
    public function create_postagem()
    {
        return inertia('Postagem/Create');
    }

    public function store(StoreUpdatePostagem $request)
    {
        $post = new Postagem;

        $post->titulo = $request->titulo;
        $post->descricao = $request->descricao;
        $post->conteudo = $request->conteudo;

        //image upload
        if($request -> hasfile('imagem') && $request -> file('imagem') -> isValid()) {
            
            $requestImage = $request->imagem;

            $extension = $requestImage -> extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->imagem->move(public_path('storage/postagem'), $imageName);

            $post->imagem = $imageName;
        }

        $post->usuario()->associate($request->user());
        // $movimentoFinanceiro->administrador()->associate($request->user());
        
        $post->save();

        return redirect()->route('inicial.index')->with('mensagem', 'Postagem enviada para análise!');
    }

    public function show (Postagem $postagem)
    {
        return inertia('Postagem/Show', ['postagem' => $postagem]);
    }
}
