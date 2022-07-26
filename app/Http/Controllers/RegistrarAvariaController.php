<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ModelValorAvariado;


class RegistrarAvariaController extends Controller{

    private $objValorAvariado;

    public function __construct(){
        $this->objValorAvariado = new ModelValorAvariado();
    }

    public function index()
    {
        $result = $this->objValorAvariado->all();

        return view('/conf-pagamento/cad-valor-avariado', ['result'=>$result]);
    }

    public function create()
    {
        //
    }

    public function insert(Request $request)
    {
        $result = $request->input('valor');
        DB::insert('insert into valor_avariado (valor) values (?)', [$result]);
        $result = $this->objValorAvariado->all();
        return view('/conf-pagamento/cad-valor-avariado',['resultavariado'=>$result]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $result = DB::select("select id, valor from valor_avariado where id =$id");

        return view('/conf-pagamento/alterar-valor-avariado', compact('result'));
    }

    public function update(Request $request, $id)
    {
        DB::table('valor_avariado')
        ->where('id', $id)
        ->update([
            'valor' => $request->input('valor'),
        ]);

        return redirect()->action('RegistrarAvariaController@index');
    }


    public function destroy($id)
    {
       $deleted = DB::delete('delete from valor_avariado where id= ?', [$id] );
       $resultavariado= $this->objValorAvariado->all();

       return view('/conf-pagamento/cad-valor-avariado',['resultavariado'=>$resultavariado]);
    }
}
