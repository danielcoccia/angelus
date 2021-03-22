<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelGenero;
use Illuminate\Support\Facades\DB;

class GeneroController extends Controller
{

    private $objGenero;
    
    public function __construct(){
        $this->objGenero = new ModelGenero();        
    }

    public function index()
    {

        $result= $this->objGenero->all();        
        return view('/cadastro-geral/cad-genero',['result'=>$result]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $genero = $request->input('genero');
        $siglaGenero = $request->input('siglaGenero');        
        
        DB::insert('insert into tipo_genero (nome,sigla) values (?,?)', [$genero,$siglaGenero]);
        
        $result= $this->objGenero->all();
        return view('/cadastro-geral/cad-genero',['result'=>$result]);
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
       $deleted = DB::delete('delete from tipo_genero where id =?' , [$id]);
       $result= $this->objGenero->all();
       return view('/cadastro-geral/cad-genero',['result'=>$result]);
    }
}
