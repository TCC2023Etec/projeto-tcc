<?php

namespace App\Http\Controllers;

use App\Models\Postagem;
use Illuminate\Http\Request;

class PostagemController extends Controller
{
    public function create_postagem()
    {
        return inertia('CadastroPostagem/Create');
    }

    public function store(Request $request)
    {
        dd($request);
        $postagem = Postagem::create($request);

        return redirect()->route('inicial.index');
    }
}
