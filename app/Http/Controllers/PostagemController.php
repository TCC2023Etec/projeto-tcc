<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostagemController extends Controller
{
    public function create_postagem()
    {
        return inertia('CadastroPostagem/Create');
    }

    public function store(Request $request)
    {
        //
    }
}
