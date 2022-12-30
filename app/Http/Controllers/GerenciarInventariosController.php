<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\ModelItemMaterial;
use DateTimeImmutable;
use PhpParser\Node\Stmt\Foreach_;
use Symfony\Component\VarDumper\Cloner\Data;
use Illuminate\Support\Carbon;


class GerenciarInventariosController extends Controller{

    public function index(Request $request){

    //$request->session()->put('data', "2022-03-10");

    $nr_ordem = 1;

    $vendas = DB::select ('select id_item_material from venda_item_material');

    $resultCategorias = DB::select ('select id, nome from tipo_categoria_material');


    $data = $request->data;


    $resultItens = DB::table('item_material')
                                    ->select('item_material.id', 'venda.data', 'item_material.data_cadastro', 'item_catalogo_material.nome', 'item_material.valor_venda', DB::raw('count(*) as qtd'), DB::raw('sum(valor_venda) as total'), DB::raw('count(*) as qtd'))
                                    ->leftjoin('item_catalogo_material', 'item_material.id_item_catalogo_material','=','item_catalogo_material.id')
                                    ->leftjoin('venda_item_material','item_material.id','venda_item_material.id_item_material')
                                    ->leftjoin('venda','venda_item_material.id_venda', 'venda.id')
                                    ->groupBy('item_material.id','venda.data', 'item_material.data_cadastro', 'item_catalogo_material.nome', 'item_material.valor_venda');




    if ($request->data){
        $resultItens->where('item_material.data_cadastro','<=', $request->data)
        ->Where('venda.data','>=', $request->data)
        ->orWhere('venda.data','<=', $request->data)
        ->whereNull('venda.data')
        ;


                   //->where('(','venda.data','>=', $request->data)
                   //->whereOr('venda.data is null',')');
    }

    $resultItens = $resultItens->get();

    //dd($resultItens);

    $total_itens = $resultItens->sum('qtd');

    $total_soma = $resultItens->sum('total');



    return view('relatorios/inventarios', compact('nr_ordem', 'data', 'resultCategorias', 'resultItens', 'total_itens', 'total_soma'));

    }

}
