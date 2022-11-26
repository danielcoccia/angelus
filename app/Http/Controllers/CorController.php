<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\ModelCatMaterial;

class CorController extends Controller
{
    private $objCategoria;

    public function __construct(){
        $this->objCategoria = new modelCatMaterial();
    }

    public function getCorCat(){

        $sql ="select
                co.id,
                co.nome cor,
                m.nome categoria
                from cor co
                join tipo_categoria_material m on co.id_categoria_material = m.id
                where co.ativo is true";

        return DB::select($sql);

    }

    public function index()
    {
        $resultCategoria = $this->objCategoria->all();
        $result = $this->getCorCat();


        return view('/cadastro-geral/gerenciar-cor', compact('result', 'resultCategoria'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        DB::table('cor')->insert([
            'nome' => $request->input('cor'),
            'id_categoria_material' => $request->input('categoria'),
            'ativo' => 1
        ]);

        return redirect()->action('CorController@index');
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $resultCategoria = $this->objCategoria->all();
        $resultCor = DB::select(" select id, nome, id_categoria_material, ativo from cor where id = $id ");

        return view('cadastro-geral/alterar-cor' , compact("resultCategoria", "resultCor"));
    }

    public function update(Request $request, $id)
    {
        DB::table('cor')
        ->where('id', $id)
        ->update([
            'nome' => $request->input('cor'),
            'id_categoria_material' => $request->input('categoria')
        ]);

        return redirect()->action('CorController@index');
    }

    public function destroy($id)
    {
        DB::delete('delete from cor where id = ?' , [$id]);
        return redirect()->action('CorController@index');
    }
}
