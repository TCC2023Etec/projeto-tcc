<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePostagem;
use App\Models\Postagem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\PostDec;

class PostagemController extends Controller
{
    public function create_postagem()
    {
        return inertia('Postagem/Create');
    }

    public function store(StoreUpdatePostagem $request)
    {
        $postagem = new Postagem;

        $postagem->titulo = $request->titulo;
        $postagem->descricao = $request->descricao;
        $postagem->conteudo = $request->conteudo;

        //image upload
        if($request -> hasfile('imagem') && $request -> file('imagem') -> isValid()) {
            
            $requestImage = $request->imagem;

            $extension = $requestImage -> extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            // $requestImage->store('postagens');

            $request->imagem->move(public_path('img'), $imageName);

            $postagem->imagem = $imageName;


            // $nome_imagem = Str::of($request->email . date('dmYhis'))->slug('-') . '.' . $request->imagem->getClientOriginalExtension();

            // $imagem = $request->imagem->storeAs('postagem', $nome_imagem, 'public');
            // // $data['imagem'] = $imagem;
            // $postagem->imagem = $imagem;
        }

        // $data['titulo'] = $request->titulo;
        // $data['descricao'] = $request->descricao;
        // $data['conteudo'] = $request->conteudo;

        // $postagem = new Postagem($data);
        $postagem->save();

        // dd($postagem);

        return redirect()->route('inicial.index')->with('mensagem', 'Postagem enviada para análise!');
    }

    public function show (Postagem $postagem)
    {
        return inertia('Postagem/Show', ['postagem' => $postagem]);
    }
}
