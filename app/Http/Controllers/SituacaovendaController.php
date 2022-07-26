<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelSitVenda;
use Illuminate\Support\Facades\DB;

class SituacaovendaController extends Controller
{
 private $objtpSitVenda;    

    public function __construct(){
        $this->objtpSitVenda = new ModelSitVenda();        
    }

    public function index()
    {   

        $result= $this->objtpSitVenda->all();        
        return view('/vendas/cad-sit-venda',['result'=>$result]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $sit_venda = $request->input('sit_venda');        
        DB::insert('insert into tipo_situacao_venda (nome) values (?)', [$sit_venda]);
        $result= $this->objSitVenda->all();
        return view('/vendas/cad-sit-venda',['result'=>$result]);
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $resultSitVenda = DB::select("select id, nome from tipo_situacao_venda where id=$id");

        return view('/vendas/cad-sit-venda', compact("resultSitVenda"));
    }

   
    public function update(Request $request, $id)
    {
        DB::table('tipo_situacao_venda')
        ->where('id', $id)
        ->update([
            'nome' => $request->input('sit_venda'),
        ]);

        return redirect()->action('SituacaovendaController@index');    }

    
    public function destroy($id)
    {
        $deleted = DB::delete('delete from tipo_situacao_venda where id =?' , [$id]);
        $result= $this->objtpSitVenda->all();
        return view('/vendas/cad-sit-venda',['result'=>$result]);
    }
}
