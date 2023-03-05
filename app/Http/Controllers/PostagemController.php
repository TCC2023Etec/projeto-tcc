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
        dd($request);

        $postagem = new Postagem;

        $postagem->titulo = $request->titulo;
        $postagem->descricao = $request->descricao;

        //image upload
        if($request -> hasfile('imagem') && $request -> file('imagem') -> isValid()) {
            
            $requestImage = $request->imagem;

            $extension = $requestImage -> extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->store('postagens');

            $postagem -> image = $imageName;
        }

        // $postagem = Postagem::create([
        //     'titulo'    => $request->titulo,
        //     'descricao' => $request->descricao,
        //     'imagem'    => $imagem
        // ]);

        return redirect()->route('inicial.index')->with('mensagem', 'Postagem enviada para análise!');
    }
}
