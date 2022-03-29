<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelTipoEstoque;
use Illuminate\Support\Facades\DB;

class TipoEstoqueController extends Controller
{

    private $objtpEstoque;

    public function __construct(){
        $this->objtpEstoque = new ModelTipoEstoque();
    }

    public function index()
    {

        $result= $this->objtpEstoque->all();
        return view('/config-depositos/cad-tipo-estoque',['result'=>$result]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $tp_estoque = $request->input('tp_estoque');
        DB::insert('insert into tipo_estoque (nome) values (?)', [$tp_estoque]);
        $result= $this->objtpEstoque->all();
        return view('/config-depositos/cad-tipo-estoque',['result'=>$result]);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $resultTpEstoque = DB::select("select id, nome from tipo_estoque where id=$id");

        return view('/config-depositos/alterar-tp-estoque', compact("resultTpEstoque"));
    }


    public function update(Request $request, $id)
    {
        DB::table('tipo_estoque')
        ->where('id', $id)
        ->update([
            'nome' => $request->input('tp_estoque'),
        ]);

        return redirect()->action('TipoEstoqueController@index');    }


    public function destroy($id)
    {
        $deleted = DB::delete('delete from tipo_estoque where id =?' , [$id]);
        $result= $this->objtpEstoque->all();
        return view('/config-depositos/cad-tipo-estoque',['result'=>$result]);
    }
}
