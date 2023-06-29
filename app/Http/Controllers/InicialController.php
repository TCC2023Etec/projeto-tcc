<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Favorito;
use App\Models\Like;
use App\Models\Postagem;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class InicialController extends Controller
{
    public function index()
    {
        $postagens = Postagem::where('situacao', 'aprovado')->orderBy('created_at', 'desc')->get();
        $postagens->append('usuario_logado_curtiu', 'usuario_logado_favoritos');

        $postagens->load('usuario', 'comentarios', 'comentarios.usuario');

        $postagemDestaque = Postagem::orderBy('created_at')->limit(5)->get();

        $usuario = null;
        if (Auth::check()) {
            $user = Auth::user();
            $usuario = User::find($user->id);
            $usuario->load('curso');
        }

        return inertia('Home', ['postagens' => $postagens, 'source' => 'index', 'usuario' => $usuario, 'postagemDestaque', $postagemDestaque]);
    }

    public function postagensFavoritas() 
    {
        $user = Auth::user();
        $usuario = User::find($user->id);
        $usuario->load('curso');

        $favoritos = Favorito::where('user_id', $user->id)
        ->with('postagem', 'postagem.usuario')
        ->orderBy('created_at', 'desc')
        ->get();
        
        $postagens = $favoritos->map(function ($favorito) {
            return $favorito->postagem;
        });

        return inertia('Home', ['postagens' => $postagens, 'source' => 'favoritos', 'usuario' => $usuario]);
    }

    public function postagensCurtidas() 
    {
        $user = Auth::user();
        $usuario = User::find($user->id);
        $usuario->load('curso');

        $likes = Like::where('user_id', $user->id)
        ->where('likable_type', 'App\Models\Postagem')
        // ->with('postagem', 'postagem.usuario')
        ->orderBy('created_at', 'desc')
        ->get();
        
        $postagens = $likes->map(function ($likes) {
            return $likes->postagem;
        });
        // dd($likes);

        return inertia('Home', ['postagens' => $likes, 'source' => 'curtidos', 'usuario' => $usuario]);
    }

    public function minhasPostagens()
    {
        $usuario = User::find(Auth::user()->id);
        $usuario->load('curso');

        $postagens = Postagem::where('user_id', $usuario->id)->get();
        $postagens->append('usuario_logado_curtiu');
        $postagens->load('usuario', 'usuario.curso');

        return inertia('Home', ['postagens' => $postagens, 'source' => 'minhasPostagens', 'usuario' => $usuario]);
    }

    public function aguardando_validacao()
    {
        return inertia('Validacao/AguardandoAprova');
    }

    public function requisicao_recusada()
    {
        return inertia('Validacao/UsuarioReprovado');
    }
}
