<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ModelItemCatalogo;
use App\Models\ModelTipoMaterial;
use Illuminate\Support\Facades\Http;




class ItemCatalogoController extends Controller
{
    
    private $objItemCatalogo;
    private $objTipoMaterial;

    public function __construct(){
        $this->objItemCatalogo = new ModelItemCatalogo();
        $this->objTipoMaterial = new ModelTipoMaterial();
    }

    public function index()
    {     
        $result= $this->objItemCatalogo->all();
        return view('item/gerenciar-item-catalogo',['result'=>$result]);
    }

 
    public function create()
    {           
        $resultCategoria = $this->objTipoMaterial->all();
        return view('item/incluir-item-catalogo', compact('resultCategoria'));   
    }


    public function store(Request $request)
    {
        $ativo = isset($request->ativo) ? 1 : 0;
        $item_composicao = isset($request->item_composicao) ? 1 : 0;

        DB::table('item_catalogo_material')->insert([
            'id' => '1',
            'nome' => $request->input('nome_item'),
            'id_categoria_material' => $request->input('categoria_item'),
            'valor_minimo' => $request->input('val_minimo'),
            'valor_medio' => $request->input('val_medio'),
            'valor_maximo' => $request->input('val_maximo'),
            'composicao' => $item_composicao,
            'ativo' => $ativo,
        ]);

        $result= $this->objItemCatalogo->all();
        return view('item/gerenciar-item-catalogo',['result'=>$result]);
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
        //
    }
}
