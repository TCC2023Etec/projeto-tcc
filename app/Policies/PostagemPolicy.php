<?php

namespace App\Policies;

use App\Models\Postagem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostagemPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        if ($user->tipo == 'administrador') {
            return true;
        }
    
        return null;
    }

    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Postagem $postagem)
    {
        return $user->tipo == 'administrador' || $user->tipo == 'professor'
                ? Response::allow()
                : Response::deny('Você não tem a permissão de criar um usuário');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Postagem $postagem)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Postagem $postagem)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function validar(User $user, Postagem $postagem)
    {
        return $user->tipo == 'professor' || $user->tipo == 'moderador'
                ? Response::allow()
                : Response::deny('Você não tem a permissão de aprovar/reprovar uma postagem');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Postagem $postagem)
    {
        //
    }
}
