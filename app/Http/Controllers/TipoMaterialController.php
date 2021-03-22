<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelTipoMaterial;
use Illuminate\Support\Facades\DB;

class TipoMaterialController extends Controller
{

    private $objTpMat;    

    public function __construct(){
        $this->objTpMat = new ModelTipoMaterial();        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result= $this->objTpMat->all();
        return view('/cadastro-geral/cad-tipo-material',['result'=>$result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       // $tpMat = new ModelTipoMaterial();
        
       //  $tpMat->id = 5;
       //  $tpMat->nome = Input::get('nome');;

        // $mensagem = "Produto inserido com sucesso";
        // return view('/produtos/cad-tipo-material')->with('mensagem', $mensagem);       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoMat = $request->input('tipoMat');        
        DB::insert('insert into tipo_categoria_material (nome) values (?)', [$tipoMat]);
        $result= $this->objTpMat->all();
        return view('/cadastro-geral/cad-tipo-material',['result'=>$result]);
         
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
        $deleted = DB::delete('delete from tipo_categoria_material where id =?' , [$id]);
        $result= $this->objTpMat->all();
        return view('/cadastro-geral/cad-tipo-material',['result'=>$result]);
    }
}
