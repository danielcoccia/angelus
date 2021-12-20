<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ModelPagamentos;
use App\Models\ModelVendas;
use phpDocumentor\Reflection\Types\Float_;

class GerenciarpagamentoController extends Controller
{

    private $objPagamentos;

    public function __construct(){
        $this->objPagamentos = new ModelPagamentos();
    }

    
    private function getListaPagamentosAll(){
        $lista = DB::select("
        Select
        p.id,
        p.id_venda,
        p.valor
        from pagamento p
        left join venda v on (v.id = p.id_venda)
        ");
        return $lista;
    }
    
    

    public function show($id){ 

    ///Recupera os dados da  venda e cliente
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

    $troco = $total_pago - $total_preco; 

      
    ///Recupera os dados da  venda e cliente
    $itens_compra = DB::select ("
    Select
    distinct (v.id),
    vim.id_item_material,
    im.id as idm,
    ic.nome as nomemat,
    im.valor_venda
    from venda v
    left join pagamento p on (v.id = p.id_venda)
    left join venda_item_material vim on (vim.id_venda = v.id)
    left join item_material im on (im.id = vim.id_item_material)
    left join item_catalogo_material ic on (ic.id = im.id_item_catalogo_material)
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
    
          

    return view ('vendas/gerenciar-pagamentos', compact('pagamentos','vendas','total_itens', 'total_preco', 'itens_compra',
     'tipos_pagamento', 'total_pago', 'troco'));
    }


    public function inserir(Request $request, $id){

        DB::table('pagamento')->insert([            
            'id_venda' => $request->input('idv'),
            'valor' => $request->input ('valor'),
            'id_tipo_pagamento' => $request->input('forma')
        ]);
       
        
        return redirect()->back();
    }


    public function destroy($id){

    DB::delete('delete from pagamento where id = ?', [$id]); 
      
     return redirect()->back();
        
      //dd("deletando o $id");
    } 

      
    
}
    