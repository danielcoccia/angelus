<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModelCatMaterial;

class TipoMaterialController extends Controller
{
    private $objCategoria;

    function __construct()
    {
        $this->objCategoria = new modelCatMaterial();
    }

    public function getTipoMat()
    {
        $sql="select
                t.id,
                t.nome tp_mat,
                tc.nome categoria,
                t.ativo
                from tipo_material t
                left join tipo_categoria_material tc on (t.id_categoria_material = tc.id)
                where t.ativo is true";

        return DB::select($sql);

    }

    public function index()
    {
        $resultCategoria = $this->objCategoria->all();

        $result = $this->getTipoMat();



        return view('/cadastro-geral/cad-tipo-material', compact('result', 'resultCategoria'));

    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        DB::table('tipo_material')->insert([
            'nome' => $request->input('tp_mat'),
           // 'id_categoria_material' => $request->input('categoria'),
            'ativo' => 1
        ]);

        return redirect()->action('TipoMaterialController@index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
       // $resultCategoria = $this->objCategoria->all();
        $resultTpMat = DB::select("select id, nome, id_categoria_material, ativo from marca where id = $id");

        return view('/cadastro-geral/cad-tipo-material/alterar', compact("resultTpMat"));
    }

    public function update(Request $request, $id)
    {
         DB::table('tipo_material')
        ->where('id', $id)
        ->update([
            'nome' => $request->input('tp_mat'),
            //'id_categoria_material' => $request->input('categoria')
        ]);
        return redirect()->action('TipoMaterialController@index');

    }

    public function destroy($id)
    {
        DB::delete('delete from tipo_material where id = ?' , [$id]);
        return redirect()->action('TipoMaterialController@index');
    }
}
