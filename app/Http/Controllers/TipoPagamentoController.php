<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelTipoPagamento;
use Illuminate\Support\Facades\DB;

class TipoPagamentoController extends Controller
{

    private $objTpPagamento;

    public function __construct(){
        $this->objTpPagamento = new ModelTipoPagamento();
    }

    public function index()
    {
        $result= $this->objTpPagamento->all();
        return view('/conf-pagamento/cad-pagamento', ['result'=>$result]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
         $pagamento = $request->input('pagamento');
        DB::insert('insert into tipo_pagamento (nome) values (?)', [$pagamento]);
        $result= $this->objTpPagamento->all();
        return view('/conf-pagamento/cad-pagamento',['result'=>$result]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $resultPagamento = DB::select("select id, nome from tipo_pagamento where id =$id");

        return view('/conf-pagamento/alterar-pagamento' , compact('resultPagamento'));
    }

    public function update(Request $request, $id)
    {
        DB::table('tipo_pagamento')
        ->where('id', $id)
        ->update([
            'nome' => $request->input('pagamento'),
        ]);

        return redirect()->action('TipoPagamentoController@index');
    }


    public function destroy($id)
    {
       $deleted = DB::delete('delete from tipo_pagamento where id= ?', [$id] );
       $result= $this->objTpPagamento->all();
       return view('/conf-pagamento/cad-pagamento',['result'=>$result]);
    }
}
