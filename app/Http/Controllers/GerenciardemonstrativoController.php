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

        return view ('relatorios/demonstrativo', compact('vendas'));
        
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


    }

    
}
