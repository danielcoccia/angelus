<?php

namespace App\Http\Middleware;

use Closure;

class ValidaUsuario
{
    public function handle($request, Closure $next)
    {
        if(!session()->get('usuario')){
           return redirect('/');
        }
            return $next($request);
    }
}
