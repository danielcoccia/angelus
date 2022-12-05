<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class BarcodeController extends Controller

{
   public function show($id)
    {
     //$itens = DB::table ('item_material')->get();
     $itens = DB::select ("
     select
     m.id,
     m.valor_venda,
     c.nome
     from item_material m
     left join item_catalogo_material c on (c.id = m.id_item_catalogo_material)
     where m.id = $id");
     //return view ('item_material', ['item_material' => $itens]);
     return view ('item_material', compact('itens'));
    }


    public function index(Request $request)
    {

/*
     $result = DB::select ("
     select
     m.id,
     m.valor_venda,
     c.nome
     from item_material m
     left join item_catalogo_material c on (c.id = m.id_item_catalogo_material)
     ");
*/
     $result = DB::table('item_material AS im')
     ->select('im.id', 'icm.nome AS n1', 'im.valor_venda')
     ->leftjoin('item_catalogo_material AS icm', 'icm.id' , '=', 'im.id_item_catalogo_material');

        $id = $request->id;

        if ($request->id){
        $result->where('im.id', '=', "$request->id");
        }
        $nome = $request->nome;
        if ($request->nome){
        $result->where('n1', '=', "$request->nome");
        }
        $valor_venda = $request->valor_venda;
        if ($request->comprvalor_vendaado){
        $result->where('im.valor_venda', '=', "$request->valor_venda");
        }
        //dd($doado);
        $result = $result;




     return view ('barcode', ['result' => $result]);

    }

}
