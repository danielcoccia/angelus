<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\ModelComposicaoItem;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ComposicaoItemController extends Controller
{
    private $objComposicaoItem;    

    public function __construct(){
        $this->objComposicaoItem = new ModelComposicaoItem();        
    }

    public function index()
    {
        $result= $this->objComposicaoItem->all(); 
        return view('composicaoItem/gerenciar-composicao-item', compact('result'));
    }
    
    public function create()
    {
        //
    }
   
    public function store(Request $request)
    {
        //
    }
   
    public function show($id)
    {
        //
    }
   
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
