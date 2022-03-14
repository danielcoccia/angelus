<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\ModelVendas;
use App\Models\ModelPagamentos;
use App\Models\ModelItemMaterial;

class GerenciarInventariosController extends Controller
{

    public function index(Request $request){

        $nr_ordem = 1;


    $resultCategorias = DB::select ('select id, nome from tipo_categoria_material');

    $resultItens = ModelItemMaterial::leftjoin('item_catalogo_material', 'item_material.id_item_catalogo_material','=','item_catalogo_material.id')
                                    ->select('item_catalogo_material.nome', 'item_material.valor_venda', DB::raw( 'count(*) as total_itens'), DB::raw('sum(valor_venda) as vlr_venda'))
                                    ->where('item_material.id_tipo_situacao', '=',1)
                                    ->orderBy('item_catalogo_material.nome')
                                    ->groupBy('item_catalogo_material.nome','item_material.valor_venda');


    $data = $request->data;

    if ($request->data){

    $resultItens->where('item_material.data_cadastro','<=' , $request->data);

    }

    $resultItens = $resultItens->get();

    //$total_itens = DB::table('item_material')->where('total_itens');

    //$vlr_venda = DB::table('item_material')->where('vlr_venda');


    return view('relatorios/inventarios', compact('nr_ordem', 'data', 'resultCategorias', 'resultItens'));
    }

}
