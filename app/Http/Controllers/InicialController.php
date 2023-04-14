<?php

namespace App\Http\Controllers;

use App\Models\Curso;
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

        $postagens->load('usuario', 'usuario.curso');

        $user = Auth::user();

        $cursos = $user->cursos;

        return inertia('Home', ['postagens' => $postagens, 'cursos' => $cursos]);
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
