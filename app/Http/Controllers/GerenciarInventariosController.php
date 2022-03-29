<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\ModelVendas;
use App\Models\ModelPagamentos;
use App\Models\ModelItemMaterial;
use Symfony\Component\VarDumper\Cloner\Data;

class GerenciarInventariosController extends Controller{

    public function index(Request $request){

    $request->session()->put('data', "2022-03-10");

    $nr_ordem = 1;

    $resultCategorias = DB::select ('select id, nome from tipo_categoria_material');

//    print_r($request->session()->all());

    //dd($request->data);



    $resultItens = ModelItemMaterial::leftjoin('item_catalogo_material', 'item_material.id_item_catalogo_material','=','item_catalogo_material.id')
                                    ->select('item_catalogo_material.nome', 'item_material.valor_venda', DB::raw( 'count(item_material.id) as qtd', 'nome'), DB::raw('sum(valor_venda) as soma'), DB::raw('sum(valor_venda) as soma, valor_venda'))
                                    ->where('item_material.id_tipo_situacao', '=', 1)
                                    ->orderBy('item_catalogo_material.nome')
                                    ->groupBy('item_catalogo_material.nome', 'item_material.valor_venda');

    $total_itens = ModelItemMaterial::select('data_cadastro', 'item_material')
                                     //->where('item_material.data_cadastro','<=' , $request->data)
                                      ->where('item_material.id_tipo_situacao', '=', 1)
                                      ->count('item_material.id');

    $total_soma = ModelItemMaterial::select('data_cadastro', 'item_material')
                                     //->where('item_material.data_cadastro','<=' , $request->data)
                                      ->where('item_material.id_tipo_situacao', '=', 1)
                                      ->sum('item_material.valor_venda');



    $data = $request->data;

    if ($request->data){
            $resultItens->where('item_material.data_cadastro','<=' , $request->data);

    }

    $resultItens = $resultItens->get();


    return view('relatorios/inventarios', compact('nr_ordem', 'data', 'resultCategorias', 'resultItens', 'total_itens', 'total_soma'));

    }

}
