<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
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
        
        return auth()->user()->tipo == 'administrador'
            ? Response::allow()
            : Response::deny('Você não tem a permissão de ver os usuários');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model)
    {
        return auth()->user()->tipo == 'administrador'
            ? Response::allow()
            : Response::deny('Você não tem a permissão de ver o usuário');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->tipo == 'administrador'
            ? Response::allow()
            : Response::deny('Você não tem a permissão de criar um usuário');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model)
    {
        return $user->tipo == 'administrador'
            ? Response::allow()
            : Response::deny('Você não tem a permissão de atualizar um usuário');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model)
    {
        return $user->tipo == 'administrador'
            ? Response::allow()
            : Response::deny('Você não tem a permissão de excluir um usuário');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function validar(User $user, User $model)
    {
        return $user->tipo == 'administrador'
            ? Response::allow()
            : Response::deny('Você não tem a permissão de validar ou reprovar um usuário');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
