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
        // $route = $request->getPathInfo();
        $route_group = $request->route()->getName();
        $perfis = session()->get('usuario.perfis');
        $perfil_adm = str_contains($perfis, '1');
        $perfil_ger = str_contains($perfis, '2');
        $perfil_aux = str_contains($perfis, '3');
        $perfil_vol = !($perfil_adm || $perfil_ger || $perfil_aux);

        switch($route_group) {
            case 'usuario':
                if(!$perfil_adm) {
                    return redirect('/UNAUTHORIZED');
                }
            case 'entidade':
            case 'deposito':
            case 'localizador':
            case 'pagamentos':
            case 'valor-avariado':
            case 'sit-doacao':
            case 'vendas':
                if($perfil_vol){
                    return redirect('/UNAUTHORIZED');
                }
            case 'estoque':
                if(!$perfil_adm && !$perfil_ger){
                    return redirect('/UNAUTHORIZED');
                }
        }

        return $next($request);
    }
}
