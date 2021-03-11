<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ModelEntidade;
use Illuminate\Support\Facades\Http;


class EntidadeController extends Controller
{
    private $objEntidade;

    public function __construct(){
        $this->objEntidade = new ModelEntidade();        
    }

    public function index()
    {
        
        $result= $this->objEntidade->all();
        return view('/entidade/gerenciar-entidade',['result'=>$result]);
    }

    public function create()
    {        
        return view('/entidade/cad-entidade');
    }
   
    public function store(Request $request)
    {
        $cnpj = preg_replace("/[^0-9]/", "", $request->input('cnpj'));
        $nome_fantasia = $request->input('nome_fantasia');
        $rz_social = $request->input('rz_social');
        $insc_estadual = $request->input('insc_estadual');
        $email_entidaede = $request->input('email_entidaede');        
        $nome_contato = $request->input('nome_contato');
        $telefone_contato = $request->input('telefone_contato');
        $site = $request->input('site');
        $cep = str_replace('-','',$request->input('cep'));
        $estado = $request->input('estado');
        $cidade = $request->input('cidade');
        $bairro = $request->input('bairro');
        $logradouro = $request->input('logradouro');
        $numero = $request->input('numero');
        $complemento = $request->input('complemento');
        $ibge = $request->input('ibge');
        $gia = $request->input('gia');

        DB::table('entidade')->insert([            
            'cnpj' => $cnpj,
            'nome_fantasia' => $nome_fantasia,
            'razao_social' => $rz_social,
            'inscricao_estadual' => $insc_estadual,
            'email_contato' => $email_entidaede,
            'nome_contato' => $nome_contato,
            // 'telefone_contato' => $telefone_contato,
            'site' => $site,
            'cep' => $cep,
            'uf' => $estado,
            'localidade' => $cidade,
            'bairro' => $bairro,
            'logradouro' => $logradouro,
            'numero' => $numero,
            'complemento' => $complemento,
            'ibge' => $ibge,
            'gia' =>$gia
        ]);

        $result= $this->objEntidade->all();
        return view('/entidade/gerenciar-entidade',['result'=>$result]);
    }

    public function show(Request $request)
    {
        $cnpj = $request->input('cnpj');
        $nome_fantasia = $request->input('nome_fantasia');    
        
        $result =DB::table('entidade')
                            ->where('cnpj', 'like' ,'%'.$cnpj.'%')
                            ->where('nome_fantasia', 'like' , '%'.$nome_fantasia.'%')
                            ->get();
        
        return view('/entidade/gerenciar-entidade',['result'=>$result]);
    }
    
    public function edit($id)
    {
        $result =DB::table('entidade')->where('id',$id)->get();
        return view('/entidade/edit-entidade',compact('result'));
    }

    public function update(Request $request, $id)
    {
        DB::table('entidade')
        ->where('id', $id)
        ->update([
            'cnpj' => $request->input('cnpj'),
            'nome_fantasia' => $request->input('nome_fantasia'),
            'razao_social' => $request->input('rz_social'),
            'inscricao_estadual' => $request->input('insc_estadual'),
            'email_contato' => $request->input('email_entidaede'),
            'nome_contato' => $request->input('nome_contato'),
            // 'telefone_contato' $request->input('telefone_contato'),
            'site' => $request->input('site'),
            'cep' => str_replace('-','',$request->input('cep')),
            'uf' => $request->input('estado'),
            'localidade' => $request->input('cidade'),
            'bairro' => $request->input('bairro'),
            'logradouro' => $request->input('logradouro'),
            'numero' => $request->input('numero'),
            'complemento' => $request->input('complemento'),
            'ibge' => $request->input('ibge'),
            'gia' => $request->input('gia')
        ]);

        $result= $this->objEntidade->all();
        return view('/entidade/gerenciar-entidade',['result'=>$result]);
    }
   
    public function destroy($id)
    {
        $deleted = DB::delete('delete from entidade where id =?' , [$id]);
        $result= $this->objEntidade->all();
        return view('/entidade/gerenciar-entidade',['result'=>$result]);
    }
}
