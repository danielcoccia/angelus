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
        $resultGenero = DB::select("select id, nome, sigla from tipo_genero where id=$id");

        return view('/cadastro-geral/alterar-genero', compact("resultGenero"));
    }


    public function update(Request $request, $id)
    {
        DB::table('tipo_genero')
        ->where('id', $id)
        ->update([
            'nome' => $request->input('genero'),
            'sigla' => $request->input('siglaGenero'),
        ]);

        return redirect()->action('GeneroController@index');
    }

    public function destroy($id)
    {
       $deleted = DB::delete('delete from tipo_genero where id =?' , [$id]);
       $result= $this->objGenero->all();
       return view('/cadastro-geral/cad-genero',['result'=>$result]);
    }
}
