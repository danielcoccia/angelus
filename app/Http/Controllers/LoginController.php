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

        $email = $request->input('email');
        $senha = $request->input('senha');
        
        // $result=DB::table('usuario')->
        //             join('pessoa', 'usuario.id_pessoa', '=', 'pessoa.id')->
        //            where('pessoa.email',$email)->
        //            where('ativo',true)->
        //            get();  

        $result=DB::select("select 
                        u.id id_usuario,
                        p.id id_pessoa,
                        p.cpf,
                        p.nome,
                        u.hash_senha
                        from usuario u 
                        left join pessoa p on u.id_pessoa = p.id
                        where u.ativo is true and p.email ='$email'
                    ");         

       //dd($result);
        if (count($result)>0){

            $hash_senha = $result[0]->hash_senha;

            if (Hash::check($senha, $hash_senha))
            {
               session()->put('usuario', [
                             'id_usuario'=> $result[0]->id_usuario,
                             'id_pessoa' => $result[0]->id_pessoa,
                             'nome'=> $result[0]->nome,
                             'cpf' => $result[0]->cpf
                    ]);
               return view('dashboard/index');
               //$this->validaUserLogado();
            }
            
        }
        return view('login/login')->withErrors(['Credenciais inválidas']);

        
        // $hash_senha = $result[0]->hash_senha;

        // if (Hash::check('brasil123', $hash_senha))
        // {
        //     echo 'ok';
        // }

        

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
