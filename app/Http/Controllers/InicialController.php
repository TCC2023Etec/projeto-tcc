<?php

namespace App\Http\Controllers;

use App\Models\Postagem;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InicialController extends Controller
{
    public function index()
    {
        $postagens = Postagem::all();

        return inertia('Inicial/Home', ['postagens' => $postagens]);
    }

    
}
