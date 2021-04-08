<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\ModelTipoEstoque;


class DepositoController extends Controller
{    
    private $objTipoEstoque;

    public function __construct(){
            $this->objTipoEstoque = new modelTipoEstoque();
    }

    public function getDeposito(){
        $sql = "select  
                d.id,
                d.nome,
                d.sigla,
                e.nome estoque,
                d.ativo
                from deposito d
                join tipo_estoque e on d.id_tp_estoque = e.id";
        
        return DB::select($sql);
    }

    public function getTipoEstoque(){
        $sql = "select
                id,
                nome
                from tipo_estoque";
                
        
        return DB::select($sql);
    }

    public function index()
    {
        

        $restulTipoEstoque = $this->getTipoEstoque();
        $result = $this->getDeposito();
        return view('cadastro-geral/gerenciar-deposito', compact('restulTipoEstoque', 'result'));
    }
 
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        DB::table('deposito')->insert([
            'nome' => $request->input('nomeDeposito'),
            'sigla' => $request->input('siglaDeposito'),
            'id_tp_estoque' => $request->input('tpEstoque'),
            'ativo' => 1
        ]);

        return redirect()->action('DepositoController@index');
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
        DB::delete('delete from deposito where id = ?' , [$id]);
        return redirect()->action('DepositoController@index');
    }
}
