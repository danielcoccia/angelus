<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\ModelCatMaterial;

class TamanhoController extends Controller
{
    private $objCategoria;

    public function __construct(){
        $this->objCategoria = new modelCatMaterial();
    }

    public function getTamanhoCat()
    {
        $sql="select  
                    t.id,
                    t.nome tamanho,
                    c.nome categoria
               from tamanho t
               join tipo_categoria_material c on t.id_categoria_material = c.id 
               where t.ativo is true";

        return DB::select($sql);
    }

    public function index()
    {   
        $resultCategoria = $this->objCategoria->all();        
        $result = $this->getTamanhoCat();
        return view('/cadastro-geral/gerenciar-tamanho', compact('result','resultCategoria') );
    }
   
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        DB::table('tamanho')->insert([            
            'nome' => $request->input('tamanho'),
            'id_categoria_material' => $request->input('categoria'),
            'ativo' => 1
        ]);

        return redirect()->action('TamanhoController@index');
    }
   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $resultCategoria = $this->objCategoria->all(); 
        $resultTamanho = DB::select(" select id, nome, id_categoria_material, ativo from Tamanho where id = $id ");

        return view('/cadastro-geral/alterar-tamanho', compact('resultCategoria', 'resultTamanho'));
   }

    public function update(Request $request, $id)
    {
         DB::table('tamanho')
        ->where('id', $id)
        ->update([
            'nome' => $request->input('tamanho'),
            'id_categoria_material' => $request->input('categoria')
        ]);

        return redirect()->action('TamanhoController@index');
    }
   
    public function destroy($id)
    {
        DB::delete('delete from tamanho where id = ?' , [$id]);
        return redirect()->action('TamanhoController@index');
    }
}
