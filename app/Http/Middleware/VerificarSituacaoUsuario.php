<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerificarSituacaoUsuario
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if ($user && $user->situacao == null) {
            return redirect()->route('aguardando-validacao');
        }

        if ($user && $user->situacao == 'reprovado') {
            return redirect()->route('requisicao.recusada');
        }

        return $next($request);
    }
}
