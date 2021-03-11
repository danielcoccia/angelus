<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ModelUsuario;
use App\Models\ModelPessoa;

class UsuarioController extends Controller
{

    private $objUsuario;
    
    public function __construct(){
        $this->objUsuario = new ModelUsuario();
        
    }

    public function index()
    {   
        $result= $this->objUsuario->all();
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

        $this->inserirUsuario($request);

        $this->excluirUsuarioPerfis($request->input('idPessoa'));

        $this->inserirperfilUsuario($keys_request,$request->input('idPessoa'));
        
        $this->inserirTipoEstque($keys_request,$request->input('idPessoa'));

        $result= $this->objUsuario->all();
        return view('usuario/gerenciar-usuario', compact('result'));
    }
    
    public function show($id)
    {
        //
    }
    
    public function edit($idUsuario)
    {
        
        $resultPerfil = DB::select("select id, nome from tipo_perfil");

        $resultEstoque = DB::select("select id, nome from tipo_estoque");
        
        $resultUsuario = DB::table('usuario')->where('id', $idUsuario)->get();

        $result = DB::table('pessoa')->where('id', $resultUsuario[0]->id_pessoa)->get();

        $resultPerfisUsuario = DB::select("select * from usuario_perfil where id_usuario =".$idUsuario);

        $resultPerfisUsuarioArray = array();;
        foreach ($resultPerfisUsuario as $resultPerfisUsuarios) {
            $resultPerfisUsuarioArray[] = $resultPerfisUsuarios->id_tp_perfil;
        }

        $resultTpEstoqueUsuario = DB::select("select * from usuario_tipo_estoque where id_usuario =".$idUsuario);

        $resultTpEstoqueUsuarioArray = array();
        foreach ($resultTpEstoqueUsuario as $resultTpEstoqueUsuarios) {
            $resultTpEstoqueUsuarioArray[] = $resultTpEstoqueUsuarios->id_tp_estoque;
        }


        return view('/usuario/alterar-configurar-usuario', compact('result', 'resultPerfil','resultEstoque','resultUsuario', 'resultPerfisUsuarioArray', 'resultTpEstoqueUsuarioArray'));
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

        $this->inserirperfilUsuario($keys_request,$request->input('idPessoa'));
        
        $this->inserirTipoEstque($keys_request,$request->input('idPessoa'));

        $result= $this->objUsuario->all();
        return view('usuario/gerenciar-usuario', compact('result'));

    }
    
    public function destroy($id)
    {   
        DB::delete('delete from usuario_perfil where id_usuario =?' , [$id]);
        DB::delete('delete from usuario_tipo_estoque where id_usuario =?' , [$id]);
        $deleted = DB::delete('delete from usuario where id =?' , [$id]);
        
        $result= $this->objUsuario->all();
        return view('usuario/gerenciar-usuario', compact('result'));
    }

    public function configurarUsuario($id)
    {        

        $resultPerfil = DB::select("select id, nome from tipo_perfil");

        $resultEstoque = DB::select("select id, nome from tipo_estoque");

        $result =DB::table('pessoa')->where('id', $id)->get();

        return view('/usuario/configurar-usuario', compact('result', 'resultPerfil','resultEstoque'));
    }

    public function inserirUsuario($request)
    {
        $ativo = isset($request->ativo) ? 1 : 0;
        $bloqueado = isset($request->bloqueado) ? 1 : 0;
        
        DB::table('usuario')->insert([            
            'id_pessoa' => $request->input('idPessoa'),            
            'ativo' => $ativo,
            'data_criacao' => date("d/m/y"),
            'data_ativacao' => date("d/m/y"),            
            'bloqueado' => $bloqueado,
        ]);
    }

    public function excluirUsuarioPerfis($idPessoa)
    {
        $idUsuario = DB::select("select id from usuario where id_pessoa =".$idPessoa);

        DB::delete('delete from usuario_tipo_estoque where id_usuario =?' , [$idUsuario[0]->id]);
        DB::delete('delete from usuario_perfil where id_usuario =?' , [$idUsuario[0]->id]);
    }

    public function inserirperfilUsuario($perfil,$idPessoa)
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

    public function inserirTipoEstque($tpEstoque,$idPessoa)
    {
        $idUsuario = DB::select("select id from usuario where id_pessoa =".$idPessoa);
        $resultEstoque = DB::select("select id, nome from tipo_estoque");

         foreach ($tpEstoque as $tpEstoques) {
            foreach ($resultEstoque as $resultEstoques) {                

                if($resultEstoques->nome ==  str_replace("_", " ",$tpEstoques) ){

                    DB::table('usuario_tipo_estoque')->insert([            
                            'id_usuario' => $idUsuario[0]->id,
                            'id_tp_estoque' => $resultEstoques->id,
                            
                    ]);
                }        
            }
        }
    }


}
