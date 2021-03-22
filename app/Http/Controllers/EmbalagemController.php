<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelEmbalagem;
use Illuminate\Support\Facades\DB;

class EmbalagemController extends Controller
{
    private $objEmbalagem;    

    public function __construct(){
        $this->objEmbalagem = new ModelEmbalagem();        
    }
    
    public function index()
    {
        
        $result= $this->objEmbalagem->all();        
        return view('/cadastro-geral/cad-embalagem',['result'=>$result]);
    }

   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $nome = $request->input('nome');
        $sigla = $request->input('sigla');        
        DB::insert('insert into tipo_embalagem (nome,sigla) values (?,?)', [$nome,$sigla]);
        $result= $this->objEmbalagem->all();
        return view('/cadastro-geral/cad-embalagem',['result'=>$result]);
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
        $deleted = DB::delete('delete from tipo_embalagem where id =?' , [$id]);
        $result= $this->objEmbalagem->all();
        return view('/cadastro-geral/cad-embalagem',['result'=>$result]);
    }
}
