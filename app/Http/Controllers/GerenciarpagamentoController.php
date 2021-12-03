<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ModelPagamentos;


class GerenciarpagamentoController extends Controller
{

    private $objPagamentos;

    public function __construct(){
        $this->objPagamentos = new ModelPagamentos();
    }

     

    public function show($id)
    { 
    ///Pagamentos vinculados em uma venda
    $pagamentos= DB::select (" 
    Select
    v.id as idv,
    p.id as pid,
    p.id_tipo_pagamento,
    p.valor,
    tp.nome
    from venda v
    left join pagamento p on (v.id = p.id_venda)
    left join tipo_pagamento tp on (p.id_tipo_pagamento = tp.id)  
    where v.id=$id");       

    ///Conta o número de itens da lista
    $total_itens = DB::table ('venda_item_material')
    ->get('venda_item_material.id_venda','=', $id)
    ->where('id_venda', '=', $id)
    ->count('id_venda');

    ///Soma o total de itens da lista
    $total_preco = DB::table ('venda')
    ->leftjoin('venda_item_material', 'venda.id', '=', 'venda_item_material.id_venda')
    ->leftjoin('item_material', 'venda_item_material.id_item_material', '=', 'item_material.id')
    ->where ('id_venda', '=', $id)
    ->sum('item_material.valor_venda');
    
    ///Tipos de pagamento para exibir na lista de seleção
    $tipos_pagamento = DB::select ('select id, nome from tipo_pagamento');

    ///Soma TOTAL dos pagamentos
    $total_pago = DB::table ('pagamento')
    ->where ('id_venda', '=', $id)
    ->sum('valor');

    ///Cálculo de possível troco
    $troco = DB::table ('pagamento')
    ->where ('id_venda', '=', $id);
    

    ///Recupera os dados da  venda e cliente
    $vendas = DB::select ("
        Select
        v.id as idv,
        pe.cpf,
        pe.nome as nomepes,
        v.data,
        vim.id_item_material,
        im.id as idm,
        ic.nome as nomemat,
        im.valor_venda
        from venda v
        left join pagamento p on (v.id = p.id_venda)
        left join tipo_pagamento t on (p.id_tipo_pagamento = t.id)
        left join pessoa pe on (pe.id = v.id_pessoa)
        left join venda_item_material vim on (vim.id_venda = v.id)
        left join item_material im on (im.id = vim.id_item_material)
        left join item_catalogo_material ic on (ic.id = im.id_item_catalogo_material)
        where v.id=$id
    ");

     return view ('vendas/gerenciar-pagamentos', compact('vendas','total_itens', 'total_preco', 'tipos_pagamento', 'pagamentos', 'total_pago', 'troco'));
    }


    public function inserir($id, Request $request){

        DB::table('pagamento')->insert([            
            'id_venda' => $request->input('id'),
            'valor' => $request->input('valor'),
            'id_tipo_pagamento' => $request->input('forma')
        ]);
        
        return redirect()->action('GerenciarpagamentoController@show');
                
        //return redirect('form')->withInput();

        //return redirect('/gerenciar-pagamentos');
    }


    public function destroy($id){

        DB::delete('delete from pagamento where id = ?' , [$id]);
                
        return redirect()->action('GerenciarpagamentoController@show');
    } 

}
    