<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\ModelItemMaterial;
use PhpParser\Node\Stmt\Foreach_;
use Symfony\Component\VarDumper\Cloner\Data;

class GerenciarInventariosController extends Controller{

    public function index(Request $request){

    $request->session()->put('data', "2022-03-10");

    $nr_ordem = 1;

    $resultCategorias = DB::select ('select id, nome from tipo_categoria_material');

    $resultItens = ModelItemMaterial::leftjoin('item_catalogo_material', 'item_material.id_item_catalogo_material','=','item_catalogo_material.id')
                                    ->select('item_catalogo_material.nome', 'item_material.valor_venda', DB::raw('count(*) as qtd'), DB::raw('sum(valor_venda) as total'))
                                    ->where('item_material.id_tipo_situacao', '=', 1)
                                    ->orderBy('item_catalogo_material.nome')
                                    ->groupBy('item_catalogo_material.nome', 'item_material.valor_venda');


    $data = $request->data;

    if ($request->data){
            $resultItens->where('item_material.data_cadastro','<=' , $request->data);
    }

    $resultItens = $resultItens->get();

    $total_itens = $resultItens->sum('qtd');

    $total_soma = $resultItens->sum('total');

    //$total_soma = $resultItens->


    //dd($total_soma);


    return view('relatorios/inventarios', compact('nr_ordem', 'data', 'resultCategorias', 'resultItens', 'total_itens', 'total_soma'));

    }

}
