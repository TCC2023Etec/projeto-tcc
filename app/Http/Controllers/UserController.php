<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;

class UserController extends Controller
{
    public function create()
    {
        $this->authorize('create', User::class);
        
        $cursos = Curso::all();

        return inertia('Usuarios/Create', ['cursos' => $cursos]);
    }

    public function index()
    {
        $this->authorize('viewAny', User::class);

        $buscaUsuario = request('search');
        $msg = '';

        if($buscaUsuario) {
            $usuarios = User::where('name', 'like', '%' . $buscaUsuario . '%')
            ->orWhere('tipo', 'like', "%{$buscaUsuario}%")->get();

            $usuarios->load('curso');

            // Se não retornar nenhum resultado
            if ($usuarios->count() == 0) {
                $msg = "Não encontramos resultado para a pesquisa: " . $buscaUsuario;
            } else {
                $msg = "Buscando por: " . $buscaUsuario;
            }
            
        } else {
            $usuarios = User::all();

            $usuarios->load('curso');
        }

        return inertia('Usuarios/Index', ['usuarios' => $usuarios, 'msg' => $msg]);
    }

    public function edit(User $usuario)
    {
        $this->authorize('update', $usuario);

        $cursos = Curso::all();

        return inertia('Usuarios/Edit', ['usuario' => $usuario, 'cursos' => $cursos]);
    }

    public function show()
    {

    }

    public function store(Request $request)
    {
        $this->authorize('create', User::class);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'tipo' => 'required|in:aluno,professor,administrador,moderador',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tipo' => $request->tipo,
            'curso' => $request->curso,
            'situacao' => 'aprovado'
        ]);

        //image upload
        if($request -> hasfile('imagem') && $request -> file('imagem') -> isValid()) {
            
            $requestImage = $request->imagem;

            $extension = $requestImage -> extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->imagem->move(public_path('storage/users'), $imageName);

            $user->imagem = $imageName;
        }

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
        $this->authorize('update', $user);

        $data = $request->all();

        $user->update($data);

        return redirect()->route('user.index')->with('mensagem', 'Usuário atualizado com sucesso!');
    }

    public function destroy()
    {

    }

    public function lista_aprova_usuario ()
    {
        $this->authorize('viewAny', User::class);

        $usuarios = User::where('situacao', null)->get();

        $numUsuarios = $usuarios->count();

        $usuarios->load('curso');

        return inertia('Usuarios/Validacao', ['usuarios' => $usuarios, 'numUsuarios' => $numUsuarios]);
    }

    public function usuario_aprovado(User $usuario)
    {
        $this->authorize('validar', $usuario);

        $usuario->aprovado();

        return redirect()->back()->with('mensagem', 'Usuário aprovado com sucesso!');
    }

    public function usuario_negado(User $usuario)
    {
        $this->authorize('validar', $usuario);

        $usuario->reprovado();

        return redirect()->back()->with('mensagem', 'Usuário reprovado com sucesso!');
    }
}
