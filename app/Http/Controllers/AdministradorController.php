<?php

namespace App\Http\Controllers;

use App\Models\Postagem;
use App\Models\User;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function index()
    {
        // Retornar os usuários que ainda não tiveram sua "situação" modificada
        $usuarios = User::where('situacao', null);

        $countUsuarios = $usuarios->count();

        if ($countUsuarios > 0) {
            $numUsuarios = $countUsuarios;
        } else if ($countUsuarios == 0) {
            $numUsuarios = '';
        }

        // Retorna as postagens que ainda não tiveram sua "situação" modificada
        $postagens = Postagem::where('situacao', null);

        $countPostagens = $postagens->count();

        if ($countPostagens > 0) {
            $numPostagens = $countPostagens;
        } else if ($countPostagens == 0) {
            $numPostagens = '';
        }

        return inertia('Administrador/Index', ['numUsuarios' => $numUsuarios, 'numPostagens' => $numPostagens]);
    }
}
