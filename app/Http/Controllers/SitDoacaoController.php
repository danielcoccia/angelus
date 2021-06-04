<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelSitDoacao;
use Illuminate\Support\Facades\DB;

class SitDoacaoController extends Controller
{
    
    private $objSitDoacao;

    public function __construct(){
        $this->objSitDoacao = new ModelSitDoacao();        
    } 
    public function index()
    {
        $result= $this->objSitDoacao->all();
        return view('/cadastro-geral/cad-sit-doacao', ['result'=>$result]);
    }

    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $doacao = $request->input('doacao');        
        DB::insert('insert into tipo_situacao_doacao (nome) values (?)', [$doacao]);
        $result= $this->objSitDoacao->all();
        return view('/cadastro-geral/cad-sit-doacao',['result'=>$result]);
    }
    

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        
        $resultDoacao = DB::select("select id, nome from tipo_situacao_doacao where id = $id");

        return view('/cadastro-geral/alterar-doacao', compact('resultDoacao'));
    }

    public function update(Request $request, $id)
    {
         DB::table('tipo_situacao_doacao')
        ->where('id', $id)
        ->update([
            'nome' => $request->input('doacao'),
        ]);

        return redirect()->action('SitDoacaoController@index');
    }

    public function destroy($id)
    {
        $deleted = DB::delete('delete from tipo_situacao_doacao where id =?' , [$id]);
        $result= $this->objSitDoacao->all();
        return view('/cadastro-geral/cad-sit-doacao',['result'=>$result]);

    }
}
