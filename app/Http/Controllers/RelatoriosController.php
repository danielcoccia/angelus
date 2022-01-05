<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ModelVendas;

class RelatoriosController extends Controller
{


    public function index(Request $request)
    {

        //AQUI TODAS AS REGRAS DE FILTROS DE PESQUISA

    $relatorio = ModelVendas::join('venda_item_material', 'venda.id', '=', 'venda_item_material.id_venda')
                            ->join('item_material', 'venda_item_material.id_item_material', '=', 'item_material.id')
                            ->join('item_catalogo_material', 'item_material.id_item_catalogo_material', '=', 'item_catalogo_material.id')
                            ->join('pessoa', 'venda.id_pessoa', '=', 'pessoa.id')
                            ->join('pagamento', 'venda.id', '=', 'pagamento.id_venda')
                            ->join('tipo_pagamento', 'pagamento.id_tipo_pagamento', '=', 'tipo_pagamento.id')
                            ->select( 'tipo_pagamento.nome as nomepg', 'item_catalogo_material.nome as nomemat','venda.data','venda.id as idv', 'venda.valor as valor_venda', 'pessoa.nome as nomep', 'pagamento.id as pid', 'pagamento.valor as valor_p')
                            ->where('venda.id_tp_situacao_venda', '=', '3')
                            ->distinct('idv');

    $data_inicio = $request->data_inicio;
    $data_fim = $request->data_fim;

    if ($request->data_inicio){

    $relatorio->where('venda.data','>' , $request->data_inicio);

    }

    if ($request->data_fim){

        $relatorio->where('venda.data','<' , $request->data_fim);

        }

    $relatorio = $relatorio->get();

    $total_vendas = $relatorio->sum("valor_venda");

    $total_pag = $relatorio->sum("valor_p");

    return view('relatorios/relatorio-vendas1', compact('total_pag', 'total_vendas', 'data_fim', 'data_inicio', 'relatorio', 'result','resultCategorias', 'resultSitVenda', 'resultItens', 'itens_compra'));

    }



    public function show($id){
        $total_preco = DB::table ('venda')
        ->leftjoin('venda_item_material', 'venda.id', '=', 'venda_item_material.id_venda')
        ->leftjoin('item_material', 'venda_item_material.id_item_material', '=', 'item_material.id')
        ->where ('id_venda', '=', $id)
        ->sum('item_material.valor_venda');

    return view('relatorios/relatorio-vendas', compact('total_preco', 'total_pago'));

    }


}
