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
        return view('/cadastro-geral/cad-pagamento', ['result'=>$result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $pagamento = $request->input('pagamento');        
        DB::insert('insert into tipo_pagamento (nome) values (?)', [$pagamento]);
        $result= $this->objTpPagamento->all();
        return view('/cadastro-geral/cad-pagamento',['result'=>$result]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $deleted = DB::delete('delete from tipo_pagamento where id= ?', [$id] );
       $result= $this->objTpPagamento->all();
       return view('/cadastro-geral/cad-pagamento',['result'=>$result]);
    }
}
