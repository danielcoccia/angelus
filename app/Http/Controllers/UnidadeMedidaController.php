<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelUnidadeMedida;
use Illuminate\Support\Facades\DB;


class UnidadeMedidaController extends Controller
{
    
    private $objUnidade;

    public function __construct(){        
        $this->objUnidade = new ModelUnidadeMedida();
    }

    public function index()
    {
        $result = $this->objUnidade->all();
        return view('/cadastro-geral/gerenciar-unidade-medida', compact('result'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {           
        DB::table('tipo_unidade_medida')->insert([            
            'nome' => $request->input('unidade_med'),
            'sigla' => $request->input('sigla'),            
        ]);

        $result = $this->objUnidade->all();
        return view('/cadastro-geral/gerenciar-unidade-medida', compact('result'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $resultUniMed = DB::select("select id, nome, sigla from tipo_unidade_medida where id = $id");

        return view('/cadastro-geral/alterar-unidade-medida', compact('resultUniMed')); 
    }
    
    public function update(Request $request, $id)
    {
         DB::table('tipo_unidade_medida')
        ->where('id', $id)
        ->update([
            'nome' => $request->input('unidade_med'),
            'sigla' => $request->input('sigla')
        ]);

        return redirect()->action('UnidadeMedidaController@index');
    }
  
    public function destroy($id)
    {
       $deleted = DB::delete('delete from tipo_unidade_medida where id= ?', [$id] );
       $result = $this->objUnidade->all();
       return view('/cadastro-geral/gerenciar-unidade-medida', compact('result'));
    }
}
