<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ModelVendas;
use App\Models\ModelPagamentos;
use App\Models\ModelItemMaterial;

class RelatoriosController extends Controller
{


    public function index(Request $request)
    {

        //AQUI TODAS AS REGRAS DE FILTROS DE PESQUISA

        $rela = ModelVendas::select('venda.data','venda.id as idv', 'pessoa.nome as nomep', DB::raw('sum(item_material.valor_venda * item_material.valor_venda_promocional) as desconto'), DB::raw('sum(item_material.valor_venda) as vlr_original'), DB::raw('sum(item_material.valor_venda) - sum(item_material.valor_venda * item_material.valor_venda_promocional) as vlr_final'))
                                ->join('venda_item_material', 'venda.id', 'venda_item_material.id_venda')
                                ->join('item_material', 'venda_item_material.id_item_material', 'item_material.id')
                                ->join('pessoa', 'venda.id_pessoa', '=', 'pessoa.id')
                                ->where('venda.id_tp_situacao_venda', '3')
                                ->groupby('venda.data','venda.id', 'pessoa.nome');


        $relb = ModelPagamentos::join('venda','venda.id', 'pagamento.id_venda')
                            ->join('tipo_pagamento', 'pagamento.id_tipo_pagamento', 'tipo_pagamento.id')
                            ->select('venda.data', 'pagamento.id as pid', 'tipo_pagamento.id as tpid', 'tipo_pagamento.nome as nomepg', 'pagamento.valor as valor_p', 'pagamento.id_venda', 'pagamento.valor')
                            ->where('venda.id_tp_situacao_venda', '3');



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

        //dd($rela);
        $total1 = $rela->sum('vlr_final');
        $total_desconto = $rela->sum('desconto');


        $total_din = $relb->where('tpid', '1')->sum('valor_p');
        $total_deb = $relb->where('tpid', '2')->sum('valor_p');
        $total_cre = $relb->where('tpid', '3')->sum('valor_p');
        $total_che = $relb->where('tpid', '4')->sum('valor_p');
        $total_pix = $relb->where('tpid', '5')->sum('valor_p');

        $total_pag = $relb->sum("valor_p");


        return view('relatorios/relatorio-vendas', compact('total_pag', 'data_fim', 'data_inicio', 'rela', 'relb', 'total_din', 'total_deb', 'total_cre', 'total_che', 'total_pix', 'total1', 'total_desconto'));

    }

    public function show($id){
        $total_preco = DB::table ('venda')
        ->leftjoin('venda_item_material', 'venda.id', '=', 'venda_item_material.id_venda')
        ->leftjoin('item_material', 'venda_item_material.id_item_material', '=', 'item_material.id')
        ->where ('id_venda', '=', $id)
        ->sum('item_material.valor_venda');

    return view('relatorios/relatorio-vendas', compact('total_preco'));

    }

    public function entrada(Request $request) {

        $nr_ordem = 1;

        $entradamat = ModelItemMaterial::leftjoin('item_catalogo_material', 'item_material.id_item_catalogo_material', '=', 'item_catalogo_material.id')
                        ->leftjoin('tipo_categoria_material', 'tipo_categoria_material.id','item_catalogo_material.id_categoria_material')
                        ->leftjoin('marca', 'marca.id','item_material.id_marca')
                        ->select(DB::raw('count(*) as total'))
                        ->select('item_catalogo_material.nome','tipo_categoria_material.nome AS nomecat', 'marca.nome AS nomemar','data_cadastro', 'valor_venda', 'id_marca', 'id_tamanho', 'id_cor');
                        //->where('venda.id_tipo_situacao', '=', '');

        $data_inicio = $request->data_inicio;
        $data_fim = $request->data_fim;

        if ($request->data_inicio){

        $entradamat->where('item_material.data_cadastro','>' , $request->data_inicio);

        }

        if ($request->data_fim){

            $entradamat->where('item_material.data_cadastro','<' , $request->data_fim);
        }

        $entradamat = $entradamat->get();


        return view('relatorios/relatorio-entrada', compact('entradamat', 'nr_ordem', 'data_inicio', 'data_fim'));

    }


}
