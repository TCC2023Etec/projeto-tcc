<?php

namespace App\Http\Controllers;

use App\Models\Postagem;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class InicialController extends Controller
{
    public function index()
    {
        $postagens = Postagem::where('situacao', 'aprovado')->get();

        $postagens->load('usuario');

        return inertia('Home', ['postagens' => $postagens]);
    }

    public function aguardando_validacao()
    {
        return inertia('AguardandoAprova');
    }
}
