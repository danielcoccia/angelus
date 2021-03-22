<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelSitDoacao;
use Illuminate\Support\Facades\DB;

class SitDoacaoController extends Controller
{
    
    private $objSitDoacao;

    public function __construct(){
        $this->objSitDoacao = new ModelSitDoacao();        
    } 
    public function index()
    {
        $result= $this->objSitDoacao->all();
        return view('/cadastro-geral/cad-sit-doacao', ['result'=>$result]);
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
        $doacao = $request->input('doacao');        
        DB::insert('insert into tipo_situacao_doacao (nome) values (?)', [$doacao]);
        $result= $this->objSitDoacao->all();
        return view('/cadastro-geral/cad-sit-doacao',['result'=>$result]);
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
        //
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
        $deleted = DB::delete('delete from tipo_situacao_doacao where id =?' , [$id]);
        $result= $this->objSitDoacao->all();
        return view('/cadastro-geral/cad-sit-doacao',['result'=>$result]);

    }
}
