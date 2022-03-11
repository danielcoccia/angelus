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

    //dd($nr_ordem);

    $resultCategorias = DB::select ('select id, nome from tipo_categoria_material');

    $resultItens = ModelItemMaterial::join('item_catalogo_material', 'item_catalogo_material.id', '=', 'item_material.id_item_catalogo_material')
                    ->select(DB::raw('count(*) as total_itens, nome, valor_venda'))
                    ->groupBy('nome','valor_venda')
                    ->orderBy('item_catalogo_material.nome');

    $vlr_estoque = ModelItemMaterial::join('item_catalogo_material', 'item_catalogo_material.id', '=', 'item_material.id_item_catalogo_material')
                    ->sum('valor_venda');

    $qtd_estoque = ModelItemMaterial::join('item_catalogo_material', 'item_catalogo_material.id', '=', 'item_material.id_item_catalogo_material')
                    ->count(DB::raw('item_material.id'));

    $data = $request->data;

    if ($request->data){

    $resultItens->where('item_material.data_cadastro','<=' , $request->data);

    }

    $resultItens = $resultItens->get();


    //dd($data);

    return view('relatorios/inventarios', compact('qtd_estoque','vlr_estoque', 'nr_ordem', 'data', 'rela', 'resultCategorias', 'resultItens', 'total_preco'));
    }

}
