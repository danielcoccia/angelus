<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ModelUsuario;
use App\Models\ModelPessoa;
use Illuminate\Support\Facades\Hash;
use App\Notifications\ResetPassword;
use Illuminate\Notifications\Notifiable;


class UsuarioController extends Controller
{

    use Notifiable;

    // Enviar email traduziado
    public function sendPasswordResetNotification($token)
    {
    $this->notify(new ResetPassword($token));
    }


    private $objUsuario;

    public function __construct(){
        $this->objUsuario = new ModelUsuario();

    }

    public function getUsuarios(){

        $result= DB::select("select
                        u.id,
                        u.id_pessoa,
                        p.cpf,
                        p.nome,
                        u.ativo,
                        u.bloqueado,
                        u.data_ativacao
                        from usuario u
                        left join pessoa p on u.id_pessoa = p.id
                    ");

        return $result;
    }


    public function index()
    {
        //$result= $this->objUsuario->all();
        $result = $this->getUsuarios();
        return view('usuario/gerenciar-usuario', compact('result'));
    }

    public function create()
    {
        $pessoa = new ModelPessoa();
        $result = $pessoa->all();

        return view('usuario/incluir-usuario', compact('result'));
    }

    public function store(Request $request)
    {

        $keys_request = array_keys($request->input());

        $senha_inicial = $this->gerarSenhaInicial($request->input('idPessoa'));

        $this->inserirUsuario($request, $senha_inicial);

        $this->excluirUsuarioPerfis($request->input('idPessoa'));

        $this->inserirperfilUsuario($keys_request,$request->input('idPessoa'));

        $this->inserirUsuarioDeposito($keys_request,$request->input('idPessoa'));

        $result = $this->getUsuarios();
        return view('usuario/gerenciar-usuario', compact('result'));
    }

    public function show($id)
    {
        //
    }

    public function edit($idUsuario)
    {

        $resultPerfil = DB::select("select id, nome from tipo_perfil");

        $resultDeposito = $this->getDeposito();

        $resultUsuario = DB::table('usuario')->where('id', $idUsuario)->get();

        $result = DB::table('pessoa')->where('id', $resultUsuario[0]->id_pessoa)->get();

        $resultPerfisUsuario = DB::select("select * from usuario_perfil where id_usuario =".$idUsuario);

        $resultPerfisUsuarioArray = array();
        foreach ($resultPerfisUsuario as $resultPerfisUsuarios) {
            $resultPerfisUsuarioArray[] = $resultPerfisUsuarios->id_tp_perfil;
        }

        $resultDepositoUsuario = DB::select("select * from usuario_deposito where id_usuario =".$idUsuario);

        $resultDepositoUsuarioArray = array();
        foreach ($resultDepositoUsuario as $resultDepositoUsuarios) {
            $resultDepositoUsuarioArray[] = $resultDepositoUsuarios->id_deposito;
        }


        return view('/usuario/alterar-configurar-usuario', compact('result', 'resultPerfil','resultDeposito','resultUsuario', 'resultPerfisUsuarioArray', 'resultDepositoUsuarioArray'));
    }

    public function update(Request $request, $id)
    {
        $ativo = isset($request->ativo) ? 1 : 0;
        $bloqueado = isset($request->bloqueado) ? 1 : 0;
        // echo $id;
        // exit();
        DB::table('usuario')
        ->where('id', $id)
        ->update([
            'ativo' => $ativo,
            'bloqueado' => $bloqueado,
        ]);


        $keys_request = array_keys($request->input());

        $this->excluirUsuarioPerfis($request->input('idPessoa'));

        $this->inserirPerfilUsuario($keys_request,$request->input('idPessoa'));

        $this->inserirUsuarioDeposito($keys_request,$request->input('idPessoa'));

        $result = $this->getUsuarios();

        return view('usuario/gerenciar-usuario', compact('result'));

    }

    public function destroy($id)
    {
        DB::delete('delete from usuario_perfil where id_usuario =?' , [$id]);
        DB::delete('delete from usuario_deposito where id_usuario =?' , [$id]);
        $deleted = DB::delete('delete from usuario where id =?' , [$id]);

        $result = $this->getUsuarios();
        return view('usuario/gerenciar-usuario', compact('result'));
    }

    public function getDeposito(){
        $sql = "select
                d.id,
                d.nome||'-'||e.nome nome
                from deposito d
                join tipo_estoque e on d.id_tp_estoque = e.id";

        return DB::select($sql);
    }

    public function configurarUsuario($id)
    {

        $resultPerfil = DB::select("select id, nome from tipo_perfil");

        $resultDeposito = $this->getDeposito();

        $result =DB::table('pessoa')->where('id', $id)->get();

        return view('/usuario/configurar-usuario', compact('result', 'resultPerfil','resultDeposito'));
    }

    public function inserirUsuario($request , $senha_inicial)
    {
        $ativo = isset($request->ativo) ? 1 : 0;
        $bloqueado = isset($request->bloqueado) ? 1 : 0;

        DB::table('usuario')->insert([
            'id_pessoa' => $request->input('idPessoa'),
            'ativo' => $ativo,
            'data_criacao' => date("y/m/d"),
            'data_ativacao' => date("y/m/d"),
            'bloqueado' => $bloqueado,
            'hash_senha' => $senha_inicial,
        ]);
    }

    public function excluirUsuarioPerfis($idPessoa)
    {
        $idUsuario = DB::select("select id from usuario where id_pessoa =".$idPessoa);

        DB::delete('delete from usuario_deposito where id_usuario =?' , [$idUsuario[0]->id]);
        DB::delete('delete from usuario_perfil where id_usuario =?' , [$idUsuario[0]->id]);
    }

    public function inserirPerfilUsuario($perfil,$idPessoa)
    {
        $idUsuario = DB::select("select id from usuario where id_pessoa =".$idPessoa);
        $resultPerfil = DB::select("select id, nome from tipo_perfil");

         foreach ($perfil as $perfils) {
            foreach ($resultPerfil as $resultPerfils) {

                if($resultPerfils->nome ==  str_replace("_", " ",$perfils) ){

                    //echo $resultPerfils->id;

                    DB::table('usuario_perfil')->insert([
                            'id_usuario' =>  $idUsuario[0]->id,
                            'id_tp_perfil' => $resultPerfils->id,

                    ]);
                }
            }
        }
    }

    // public function inserirTipoEstque($tpEstoque,$idPessoa)
    // {
    //     $idUsuario = DB::select("select id from usuario where id_pessoa =".$idPessoa);
    //     $resultEstoque = DB::select("select id, nome from tipo_estoque");

    //      foreach ($tpEstoque as $tpEstoques) {
    //         foreach ($resultEstoque as $resultEstoques) {

    //             if($resultEstoques->nome ==  str_replace("_", " ",$tpEstoques) ){

    //                 DB::table('usuario_tipo_estoque')->insert([
    //                         'id_usuario' => $idUsuario[0]->id,
    //                         'id_tp_estoque' => $resultEstoques->id,

    //                 ]);
    //             }
    //         }
    //     }
    // }

    public function inserirUsuarioDeposito($deposito,$idPessoa){


        $idUsuario = DB::select("select id from usuario where id_pessoa =".$idPessoa);
        $resultDeposito = $this->getDeposito();
        //dd($resultDeposito);
         foreach ($deposito as $depositos) {
            foreach ($resultDeposito as $resultDepositos) {

                if($resultDepositos->nome ==  str_replace("_", " ",$depositos) ){

                    DB::table('usuario_deposito')->insert([
                            'id_usuario' => $idUsuario[0]->id,
                            'id_deposito' => $resultDepositos->id,

                    ]);
                }
            }
        }
    }

    public function gerarSenhaInicial($id_pessoa){

       $resultPessoa = DB::select("select SUBSTRING(cpf , 1,3) id from pessoa where id =$id_pessoa");

       return Hash::make('angelus'.$resultPessoa[0]->id);
    }

    public function alteraSenha(){
       return view('login.alterar-senha');
    }

    public function gravaSenha(Request $request){
        //dd($request);
       $id_usuario = (session()->get('usuario.id_usuario'));
       $senhaAtual = $request->input('senhaAtual');
       $resultSenhaAtualHash = DB::select("select hash_senha from usuario where id = $id_usuario");


        if ( Hash::check($senhaAtual, $resultSenhaAtualHash[0]->hash_senha))
        {
            $senha_nova = Hash::make($request->input('senhaNova'));

            DB::table('usuario')
            ->where('id', $id_usuario)
            ->update([
                'hash_senha' => $senha_nova,
            ]);

             //return view('login.alterar-senha')->with('mensagem', 'Senha Alterada com sucesso!');
             return redirect()
                    ->back()
                    ->with('mensagem', 'Senha Alterada com sucesso!') ;
        }
        return redirect()
                    ->back()
                    ->with('mensagemErro', 'Senha atual incorreta!') ;
       //return view('login.alterar-senha')->withErrors(['Senha atual incorreta']);
    }

    public function gerarSenha($id_pessoa){

        $senha = $this->gerarSenhaInicial($id_pessoa);

        DB::table('usuario')
            ->where('id_pessoa', $id_pessoa)
            ->update([
                'hash_senha' => $senha,
            ]);
            return redirect()
                    ->back()
                    ->with('mensagem', 'Senha gerada com sucesso!') ;
    }


}

