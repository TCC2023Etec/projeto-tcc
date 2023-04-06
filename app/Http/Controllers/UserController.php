<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        $cursos = Curso::all();

        return inertia('Usuarios/Create', ['cursos' => $cursos]);
    }

    public function index()
    {
        $usuarios = User::all();

        $usuarios->load('curso');

        return inertia('Usuarios/Index', ['usuarios' => $usuarios]);
    }

    public function edit(User $usuario)
    {
        $cursos = Curso::all();

        return inertia('Usuarios/Edit', ['usuario' => $usuario, 'cursos' => $cursos]);
    }

    public function show()
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'tipo' => 'required|in:aluno,professor,administrador',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tipo' => $request->tipo,
            'curso' => $request->curso
        ]);

        if($request->curso) {
            $curso = Curso::find($request->curso);

            $user->curso()->associate($curso);
        }        

        $user->save();

        event(new Registered($user));

        return redirect()->route('admin.index')->with('mensagem', 'Usuário cadastrado com sucesso!');
    }
    
    public function update(User $user, Request $request)
    {
        $data = $request->all();

        $user->update($data);

        return redirect()->route('user.index')->with('mensagem', 'Usuário atualizado com sucesso!');
    }

    public function destroy()
    {

    }
}
