<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelCatMaterial;
use Illuminate\Support\Facades\DB;

class CatMaterialController extends Controller
{

    private $objTpMat;

    public function __construct(){
        $this->objTpMat = new ModelCatMaterial();
    }

    public function index()
    {
        $result= $this->objTpMat->all();
        return view('/cadastro-geral/cad-cat-material',['result'=>$result]);
    }

    public function create(Request $request)
    {
       // $tpMat = new ModelCatMaterial();

       //  $tpMat->id = 5;
       //  $tpMat->nome = Input::get('nome');;

        // $mensagem = "Produto inserido com sucesso";
        // return view('/produtos/cad-tipo-material')->with('mensagem', $mensagem);
    }

    public function store(Request $request)
    {
        $tipoMat = $request->input('tipoMat');
        DB::insert('insert into tipo_categoria_material (nome) values (?)', [$tipoMat]);
        $result= $this->objTpMat->all();

        return redirect()
        ->route('cadcat.index')
        ->with('message', 'sucesso ao criar a categoria');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $resultCatMaterial = DB::select("select id,nome from tipo_categoria_material where id = $id ");

        return view('/cadastro-geral/alterar-cat-material', compact("resultCatMaterial"));
    }

    public function update(Request $request, $id)
    {
         DB::table('tipo_categoria_material')
        ->where('id', $id)
        ->update([
            'nome' => $request->input('categoria'),
        ]);

        return redirect()
        ->action('CatMaterialController@index')
        ->with('message', 'a categoria foi alterada com sucesso');

    }

    public function destroy($id)
    {

        $deleted = DB::delete('delete from tipo_categoria_material where id =?' , [$id]);
        $result= $this->objTpMat->all();

        return redirect()
        ->action('CatMaterialController@index')
        ->with('message', 'sucesso ao excluir a categoria');
    }
}

