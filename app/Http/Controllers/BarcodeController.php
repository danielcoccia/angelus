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


    public function index ()
    {

        $result = DB::select ("
        select
        m.id,
        m.valor_venda,
        m.data_cadastro,
        c.nome
        from item_material m
        left join item_catalogo_material c on (c.id = m.id_item_catalogo_material)
        ");


       // dd($result);


        return view('/barcode', compact('result'));
     //return view ('barcode', ['result' => $result]);

    }

}
