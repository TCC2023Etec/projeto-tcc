<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserType
{
    public function handle(Request $request, Closure $next)
    {
        // verifica se a rota atual é a página inicial
        if ($request->routeIs('inicial.index')) {
            return $next($request);
        }

        if ($request->user() && $request->user()->tipo === 'aluno') {
            return redirect()->route('inicial.index');
        }

        return $next($request);
    }
}
