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

    //$request->session()->put('data', "2022-03-10");

    $nr_ordem = 1;

    //$today = Carbon::today();

    $vendas = DB::select ('select id_item_material from venda_item_material');

    $resultCategorias = DB::select ('select id, nome from tipo_categoria_material');

    $data = $request->data;

    $resultItens = ModelItemMaterial::leftjoin('item_catalogo_material', 'item_material.id_item_catalogo_material','=','item_catalogo_material.id')
                                    ->leftjoin('venda_item_material', 'venda_item_material.id_item_material','item_material.id')
                                    ->leftjoin('venda', 'venda.id','venda_item_material.id_venda' )
                                    ->select('item_catalogo_material.nome', 'item_material.valor_venda', DB::raw('count(*) as qtd'), DB::raw('sum(valor_venda) as total'))

                                    ->orderBy('item_catalogo_material.nome')
                                    ->groupBy('item_catalogo_material.nome', 'item_material.valor_venda');
//dd($resultItens);


    if ($request->data){
            $resultItens->where('item_material.data_cadastro','<=' , $request->data);
                        //->where('venda.data','<=', $request->data)
                        //->where('venda.data','<>', $request->data);
    }

    $resultItens = $resultItens->get();

    //dd($resultItens);

    $total_itens = $resultItens->sum('qtd');

    $total_soma = $resultItens->sum('total');



    return view('relatorios/inventarios', compact('nr_ordem', 'data', 'resultCategorias', 'resultItens', 'total_itens', 'total_soma'));

    }

}
