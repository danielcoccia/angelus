<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ModelPagamentos;
use App\Models\ModelVendas;
use phpDocumentor\Reflection\Types\Float_;

class GerenciardemonstrativoController extends Controller{


    public function index($id){

        ///Soma o total de itens da lista
        $total_preco = DB::table ('venda')
        ->leftjoin('venda_item_material', 'venda.id', '=', 'venda_item_material.id_venda')
        ->leftjoin('item_material', 'venda_item_material.id_item_material', '=', 'item_material.id')
        ->where ('id_venda', '=', $id)
        ->sum('item_material.valor_venda');


        ///Conta o número de itens da lista
        $total_itens = DB::table ('venda_item_material')
        ->get('venda_item_material.id_venda','=', $id)
        ->where('id_venda', '=', $id)
        ->count('id_venda');

        $itens_compra = DB::select ("
        Select
        distinct (v.id) idv,
        im.valor_venda * im.valor_venda_promocional as desconto,
        vim.id_item_material,
        im.id as idm,
        ic.nome as nomemat,
        mr.nome as marca,
        c.nome as cor,
        tg.nome as genero,
        im.valor_venda
        from venda v
        left join pagamento p on (v.id = p.id_venda)
        left join venda_item_material vim on (vim.id_venda = v.id)
        left join item_material im on (im.id = vim.id_item_material)
        left join item_catalogo_material ic on (ic.id = im.id_item_catalogo_material)
        left join marca mr on (im.id_marca = mr.id)
        left join cor c on (c.id = im.id_cor)
        left join tipo_genero tg on (tg.id = im.id_tp_genero)
        where v.id=$id
        ");

        $vendas = DB::select ("
        Select
        distinct (v.id) idv,
        pe.cpf,
        pe.nome as nomepes,
        v.data
        from venda v
        left join pagamento p on (v.id = p.id_venda)
        left join pessoa pe on (pe.id = v.id_pessoa)
        left join venda_item_material vim on (vim.id_venda = v.id)
        where v.id=$id
        ");

        ///Pagamentos vinculados em uma venda
        $pagamentos= DB::select ("
        Select
        v.id as idv,
        p.id as pid,
        p.id_tipo_pagamento,
        p.valor,
        tp.nome
        from pagamento p
        left join venda v on (v.id = p.id_venda)
        left join tipo_pagamento tp on (p.id_tipo_pagamento = tp.id)
        where v.id=$id
        ");

        ///Soma TOTAL dos pagamentos
        $total_pago = DB::table ('pagamento')
        ->where ('id_venda', '=', $id)
        ->sum('valor');

         ///Cálculo do total de desconto
         $desconto = DB::table ('item_material')
         ->leftjoin('venda_item_material', 'item_material.id', 'venda_item_material.id_item_material')
         ->leftjoin('venda', 'venda_item_material.id_venda', 'venda.id')
         ->where ('venda_item_material.id_venda', '=', $id)
         ->sum(DB::raw('item_material.valor_venda * item_material.valor_venda_promocional'));

         ///Cálculo do total do preço da venda com desconto se houver
        $total_desc = $desconto;

        ///Cálculo de possível troco
        $troco = $total_pago - $total_preco - $desconto;

        ////Valor da venda com descontos
        $valor_final = $total_preco - $desconto;


        return view ('relatorios/demonstrativo', compact('vendas', 'total_itens', 'total_preco', 'total_pago', 'troco',
         'itens_compra', 'pagamentos', 'total_desc', 'valor_final'));

    }

    public function imprimir($id){

        $print = Product::all();

    return \PDF::loadView('site.certificate.certificate', compact('print'))
                // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
                ->download('nome-arquivo-pdf-gerado.pdf');
    }

}
