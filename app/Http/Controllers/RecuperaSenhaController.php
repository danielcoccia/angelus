<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Session;

class RecuperaSenhaController extends Controller
{
    public function index(){

        return view('/email/remessa-email');
    }

    public function validar(Request $request){

        $email = $request->input('email');

        $result=DB::select("
                        select
                        u.id id_usuario,
                        p.id id_pessoa,
                        p.cpf,
                        p.nome,
                        u.hash_senha,
                        string_agg(distinct u_p.id_tp_perfil::text, ',') perfis,
                        string_agg(distinct u_d.id_deposito::text, ',') depositos
                        from usuario u
                        left join pessoa p on u.id_pessoa = p.id
                        left join usuario_perfil u_p on u.id = u_p.id_usuario
                        left join usuario_deposito u_d on u.id = u_d.id_usuario
                        where u.ativo is true and p.email ='$email'
                        group by u.id, p.id
                        ");

        // dd($result);

        if (count($result)>0){

            return view('/email/remessa-email')
            ->withErrors(['O email foi enviado']);

        }else{

            return '';


        }


    }

}
