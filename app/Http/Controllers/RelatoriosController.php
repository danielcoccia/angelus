<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ModelVendas;
use App\Models\ModelPagamentos;

class RelatoriosController extends Controller
{


    public function index(Request $request)
    {

        //AQUI TODAS AS REGRAS DE FILTROS DE PESQUISA

    $rela = ModelVendas::join('pessoa', 'venda.id_pessoa', '=', 'pessoa.id')
                        ->select('venda.data','venda.id as idv', 'venda.valor as valor_venda', 'pessoa.nome as nomep')
                        ->where('venda.id_tp_situacao_venda', '=', '3');

    $relb = ModelPagamentos::join('venda','venda.id', '=', 'pagamento.id_venda')
                        ->join('tipo_pagamento', 'pagamento.id_tipo_pagamento', '=', 'tipo_pagamento.id')
                        ->select('venda.data', 'pagamento.id as pid', 'tipo_pagamento.id as tpid', 'tipo_pagamento.nome as nomepg', 'pagamento.valor as valor_p', 'pagamento.id_venda', 'pagamento.valor')
                        ->orderBy('pid')
                        ->where('venda.id_tp_situacao_venda', '=', '3');

        //dd($relb);


    $data_inicio = $request->data_inicio;
    $data_fim = $request->data_fim;

    if ($request->data_inicio){

    $rela->where('venda.data','>' , $request->data_inicio);
    $relb->where('venda.data','>' , $request->data_inicio);

    }

    if ($request->data_fim){

        $rela->where('venda.data','<' , $request->data_fim);
        $relb->where('venda.data','<' , $request->data_fim);
    }

    $rela = $rela->get();
    $relb = $relb->get();

    $total_vendas = $rela->sum("valor_venda");

    $total_pag = $relb->sum("valor_p");

    $total_din = $relb->where('tpid', '1')->sum('valor_p');
    $total_deb = $relb->where('tpid', '2')->sum('valor_p');
    $total_cre = $relb->where('tpid', '3')->sum('valor_p');
    $total_che = $relb->where('tpid', '4')->sum('valor_p');
    $total_pix = $relb->where('tpid', '5')->sum('valor_p');


    return view('relatorios/relatorio-vendas', compact('total_pag', 'total_vendas', 'data_fim', 'data_inicio', 'rela', 'relb', 'total_din', 'total_deb', 'total_cre', 'total_che', 'total_pix'));

    }



    public function show($id){
        $total_preco = DB::table ('venda')
        ->leftjoin('venda_item_material', 'venda.id', '=', 'venda_item_material.id_venda')
        ->leftjoin('item_material', 'venda_item_material.id_item_material', '=', 'item_material.id')
        ->where ('id_venda', '=', $id)
        ->sum('item_material.valor_venda');

    return view('relatorios/relatorio-vendas', compact('total_preco'));

    }


}
