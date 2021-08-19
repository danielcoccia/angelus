<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelVendas;

class RegistrarVendaController extends Controller
{

    public function __construct(){
        $this->objVendas = new ModelVendas();
    }

    public function create()
    {           
        $resultVendas = $this->objVendas->all();

        return view('vendas/registrar-venda');   
    }

    public function store (Request $request){
        //dd($request->all());
        
    }

    public function search (Array $data, $totalPage)
    {
        $historics = $this-> where (function ($query) use ($data){
            if (isset ($data['id']))
                $query -> where ('id', $data ['id'] );
            if (isset ($data['data']))
                $query -> where ('data', $data ['data'] );
            if (isset ($data['type']))
                $query -> where ('type', $data ['type'] );
        })
        -> where ('user_id', auth()->user()->id )
        ->paginate ($totalPage);
        
        dd($request->all());
        
        //return $historics;
    }
}
