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

        if(auth()->user()->tipo == 'administrador') {
            $post->situacao = 'aprovado';
        }

        if(auth()->user()->tipo == 'moderador') {
            $post->situacao = 'aprovado';
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

    public function show_administrador(Postagem $postagem)
    {
        return inertia('Administrador/ShowPostagem', ['postagem' => $postagem]);
    }

    public function historico_postagem()
    {
        $postagens = Postagem::where('situacao', 'aprovado')->orWhere('situacao', 'reprovado')->get();

        $postagens->load('usuario', 'aprovador');

        return inertia('Postagem/Historico', ['postagens' => $postagens]);
    }

    public function lista_aprova_postagem ()
    {
        $postagens = Postagem::where('situacao', null)->get();

        $numPostagens = $postagens->count();

        $postagens->load('usuario');

        return inertia('Postagem/Validacao', ['postagens' => $postagens, 'numPostagens' => $numPostagens]);
    }

    public function postagem_aprovada(Postagem $postagem)
    {
        $this->authorize('validar', $postagem);

        $postagem->aprovado();

        // $postagem->update(['aprovado_por' => Auth::user()->id]);
        $postagem->aprovado_por = auth()->user()->id;
        $postagem->save();

        return redirect()->back()->with('mensagem', 'Postagem aprovada com sucesso!');
    }

    public function postagem_negada(Postagem $postagem)
    {
        $postagem->reprovado();

        $postagem->aprovado_por = auth()->user()->id;
        $postagem->save();

        return redirect()->back()->with('mensagem', 'Postagem reprovada com sucesso!');
    }

    // public function like(Postagem $postagem)
    // {
    //     $user = Auth::user();

    //     $like = new Like();
    //     $like->user()->associate($user);
    //     $like->save();
    // }

    // public function unlike(Postagem $postagem)
    // {
    //     $user = Auth::user();

    //     $like = $postagem->like()->where('user_id', $user->id)->first();

    //     if ($postagem->like()->where('user_id', $user->id)->exists()) {
    //         return;
    //     }

    //     $like->delete();
    // }
}
