<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerificarSituacaoUsuario
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if ($user && $user->situacao !== 'aprovado') {
            return redirect()->route('aguardando-validacao');
        }

        return $next($request);
    }
}
