<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\ModelCatMaterial;

class MarcaController extends Controller
{
    private $objCategoria;

    public function __construct(){
        $this->objCategoria = new modelCatMaterial();
    }

    public function getMarcaCat()
    {
        $sql="select
                m.id,
                m.nome marca,
                c.nome categoria
                from marca m
                join tipo_categoria_material c on m.id_categoria_material = c.id
                where m.ativo is true";

        return DB::select($sql);
    }

    public function index()
    {
        $resultCategoria = $this->objCategoria->all();
        $result = $this->getMarcaCat();
        return view('/cadastro-geral/gerenciar-marca', compact('result','resultCategoria'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        DB::table('marca')->insert([
            'nome' => $request->input('marca'),
            'id_categoria_material' => $request->input('categoria'),
            'ativo' => 1
        ]);

        return redirect()->action('MarcaController@index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $resultCategoria = $this->objCategoria->all();
        $resultMarca = DB::select("select id, nome, id_categoria_material, ativo from marca where id = $id");

        return view('/cadastro-geral/alterar-marca', compact("resultCategoria", "resultMarca"));
    }

    public function update(Request $request, $id)
    {
         DB::table('marca')
        ->where('id', $id)
        ->update([
            'nome' => $request->input('marca'),
            'id_categoria_material' => $request->input('categoria')
        ]);
        return redirect()->action('MarcaController@index');

    }

    public function destroy($id)
    {
        DB::delete('delete from marca where id = ?' , [$id]);
        return redirect()->action('MarcaController@index');
    }
}
