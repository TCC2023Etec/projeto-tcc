<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserType
{
    public function handle(Request $request, Closure $next, ...$types)
    {
        $user = $request->user();
        $userType = $user ? $user->tipo : null;
    
        // verifica se a rota atual é a página inicial
        if ($request->routeIs('inicial.index')) {
            return $next($request);
        }
    
        if (!in_array($userType, $types)) {
            return redirect()->route('inicial.index');
        }
    
        return $next($request);
    }
}
