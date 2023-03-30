<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();

        // return inertia('Curso/Index', ['cursos' => $cursos]);
        return response($cursos);
    }

    public function create()
    {
        // return inertia('Curso/Create');
        return inertia('Cursos/Create');
    }

    public function show(Curso $curso)
    {
        // return inertia('Curso/Show', ['curso' => $curso]);
        return response($curso);
    }

    public function edit(Curso $curso)
    {
        // return inertia('Curso/Edit', ['curso' => $curso]);
        return response()->json([
            'mensagem' => 'Tela edit'
        ]);
    }

    public function store(Request $request) 
    {
        $curso = new Curso();

        $curso->nome = $request->nome;
        $curso->duracao = $request->duracao;
        $curso->save();

        // return redirect()->route('cursos.show', $curso->id)->with('Curso cadastrado com sucesso!');
        return response()->json([
            'mensagem' => "Curso cadastrado" 
        ]);
    }

    public function update(Request $request, Curso $curso)
    {
        $data = $request->all();

        $curso->update($data);

        // return redirect()->route('cursos.show', $curso->id)->with('Curso atualizado com sucesso!');
        return response()->json([
            'mensagem' => "Curso atualizado" 
        ]);
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();

        // return redirect()->route('cursos.index')->with('Curso excluído com sucesso!');
        return response()->json([
            'mensagem' => "Curso deletado" 
        ]);
    }
}
