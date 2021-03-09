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
        return view('produtos/gerenciar-unidade-medida', compact('result'));
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
        return view('produtos/gerenciar-unidade-medida', compact('result'));
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
       $deleted = DB::delete('delete from tipo_unidade_medida where id= ?', [$id] );
       $result = $this->objUnidade->all();
       return view('produtos/gerenciar-unidade-medida', compact('result'));
    }
}
