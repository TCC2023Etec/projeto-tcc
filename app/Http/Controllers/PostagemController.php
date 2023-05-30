<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePostagem;
use App\Models\Favorito;
use App\Models\Like;
use App\Models\Postagem;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $post->aprovado_por = Auth::user()->id;
        }

        if(auth()->user()->tipo == 'moderador') {
            $post->situacao = 'aprovado';
            $post->aprovado_por = Auth::user()->id;
        }

        $post->usuario()->associate(Auth::user());
        
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

    public function like(Postagem $postagem)
    {
        $user = Auth::user();
        if(!$user) {
            return;
        }

        $like = Like::where('user_id', $user->id)
        ->where('likable_id', $postagem->id)
        ->where('likable_type', 'App\Models\Postagem')
        ->first();

        if($like) {
            $like->delete();
            return;
        } else {
            $postagem->likes()->create([
                'user_id' => $user->id
            ]);
        }
    }

    public function favorito(Postagem $postagem)
    {
        $user = Auth::user();
        $usuario = User::find($user->id);

        $favorito = $usuario->favoritos()->where('postagem_id', $postagem->id)->first();

        if($favorito) {
            // $usuario->favoritos()->detach($postagem);
            $favorito->delete();
            return;
        } else {
            $usuario->favoritos()->save($postagem);
        }
    }

    public function verifica_curtida()
    {
        $usuario = Auth::user();

        if(!$usuario){
            return false;
        }

        $postagens = Postagem::where('user_id', $usuario->id);

        $curtidaPostagem = Like::where('user_id', $usuario->id)
            ->where('likable_type', 'App\Models\Postagem')
            ->where('likable_id', $postagens->id)
            ->get();
    }
}
