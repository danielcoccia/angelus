<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\ModelCatMaterial;

class FaseEtariaController extends Controller
{
    private $objCategoria;

    public function __construct(){
        $this->objCategoria = new modelCatMaterial();
    }

    public function getFaseEtariaCat(){
        $sql ="select
                    f.id,
                    f.nome fase,
                    c.nome categoria
                from fase_etaria f
                join tipo_categoria_material c on f.id_categoria_material = c.id
                where f.ativo is true";

        return DB::select($sql);
    }

    public function index()
    {
        $resultCategoria = $this->objCategoria->all();
        $result = $this->getFaseEtariaCat();

        return view('cadastro-geral/gerenciar-fase-etaria', compact('result','resultCategoria'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        DB::table('fase_etaria')->insert([
            'nome' => $request->input('faseEtaria'),
            'id_categoria_material' => $request->input('categoria'),
            'ativo' => 1
        ]);

        return redirect()->action('FaseEtariaController@index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $resultCategoria = $this->objCategoria->all();

        $resultFaseEtaria = DB::select(" select id, nome, id_categoria_material, ativo from fase_etaria where id = $id ");
        
        return view('cadastro-geral/alterar-fase-etaria' , compact("resultCategoria", "resultFaseEtaria"));
    }

    public function update(Request $request, $id)
    {
        DB::table('fase_etaria')
        ->where('id', $id)
        ->update([
            'nome' => $request->input('faseEtaria'),
            'id_categoria_material' => $request->input('categoria')
        ]);

        return redirect()->action('FaseEtariaController@index');
    }

    public function destroy($id)
    {
        DB::delete('delete from fase_etaria where id = ?' , [$id]);
        return redirect()->action('FaseEtariaController@index');
    }
}
