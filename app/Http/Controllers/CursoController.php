<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    public function index()
    {
        $buscaCurso = request('search');
        $msg = '';

        if($buscaCurso) {
            $cursos = Curso::where('nome', 'like', '%' . $buscaCurso . '%')->get();

            // Se não retornar nenhum resultado
            if ($cursos->count() == 0) {
                $msg = "Não encontramos resultado para a pesquisa: " . $buscaCurso;
            } else {
                $msg = "Buscando por: " . $buscaCurso;
            }
            
        } else {
            $cursos = Curso::all();

            $msg = $buscaCurso;
        }

        return inertia('Cursos/Index', ['cursos' => $cursos, 'msg' => $msg]);
    }

    public function create()
    {
        return inertia('Cursos/Create');
    }

    public function show(Curso $curso)
    {
        return inertia('Cursos/Show', ['curso' => $curso]);
    }

    public function edit(Curso $curso)
    {
        return inertia('Cursos/Edit', ['curso' => $curso]);
    }

    public function store(Request $request) 
    {
        $curso = new Curso();

        $curso->nome = $request->nome;
        $curso->duracao = $request->duracao;
        $curso->save();

        return redirect()->route('cursos.index')->with('mensagem','Curso cadastrado com sucesso!');
        // return response()->json([
        //     'mensagem' => "Curso cadastrado" 
        // ]);
    }

    public function update(Request $request, Curso $curso)
    {
        $data = $request->all();

        $curso->update($data);

        return redirect()->route('cursos.index')->with('mensagem','Curso atualizado com sucesso!');
        // return response()->json([
        //     'mensagem' => "Curso atualizado" 
        // ]);
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();

        return redirect()->route('cursos.index')->with('mensagem','Curso excluído com sucesso!');
        // return response()->json([
        //     'mensagem' => "Curso deletado" 
        // ]);
    }
}
