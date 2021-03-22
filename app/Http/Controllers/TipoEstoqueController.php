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
        return view('/cadastro-geral/cad-tipo-estoque',['result'=>$result]);
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
        return view('/cadastro-geral/cad-tipo-estoque',['result'=>$result]);
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
        $deleted = DB::delete('delete from tipo_estoque where id =?' , [$id]);
        $result= $this->objtpEstoque->all();
        return view('/cadastro-geral/cad-tipo-estoque',['result'=>$result]);
    }
}
