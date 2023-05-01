<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\ModelUsuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Session;

class LoginController extends Controller
{

    public function index()
    {
        return view('login/login');
    }

    public function valida(Request $request)
    {

        $cpf = $request->input('cpf');
        $senha = $request->input('senha');

        //dd($cpf);

        // $result=DB::table('usuario')->
        //             join('pessoa', 'usuario.id_pessoa', '=', 'pessoa.id')->
        //            where('pessoa.email',$email)->
        //            where('ativo',true)->
        //            get();

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
                        where u.ativo is true and p.cpf ='$cpf'
                        group by u.id, p.id
                        ");

        // dd($result);


        //$senha = Hash::make($request->senha);
        //return ($request->senha . ' - ' . $senha);


        if (count($result)>0){

            $hash_senha = $result[0]->hash_senha;

            if (Hash::check($senha, $hash_senha))
            {
               session()->put('usuario', [
                             'id_usuario'=> $result[0]->id_usuario,
                             'id_pessoa' => $result[0]->id_pessoa,
                             'nome'=> $result[0]->nome,
                             'cpf' => $result[0]->cpf,
                             'perfis' => $result[0]->perfis,
                             'depositos' => $result[0]->depositos
                    ]);



               return view('dashboard/index');
               //$this->validaUserLogado();
            }

        }
        return view('login/login')->withErrors(['Credenciais inválidas']);



    }

    public function validaUserLogado(){

        if (!Session::has('usuario'))
        {
            echo "nao";
            //return view('login/login');
        }
        echo 'sim';
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
