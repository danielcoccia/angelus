<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ModelItemCatalogo;
use App\Models\ModelCatMaterial;
use App\Models\ModelPagamentos;


class GerenciarpagamentoController extends Controller
{

    private $objPagamentos;

    public function __construct(){
        $this->objItemCatalogo = new ModelItemCatalogo();
        $this->objTipoMaterial = new ModelCatMaterial();
        $this->objPagamentos = new ModelPagamentos();
    }

    private function getListaPagamentosAll(){
        $lista = DB::select("
            Select
                p.id,
                p.id_venda,
                p.valor,
                p.id_tipo_pagamento
            from pagamento p
            left join venda v on (v.id = p.id_venda)
            left join tipo_pagamento t on (p.id_tipo_pagamento = t.id)
        ");
        return $lista;
    }

    public function index()
    {     
        $result= $this->getListaPagamentosAll();
        return view('vendas/gerenciar-pagamentos',['result'=>$result]);
    }

    public function show($id)
    {
          
    //$itens = DB::table ('item_material')->get();
    $vendas = DB::select ("
        Select
        p.id,
        p.id_venda,
        p.valor,
        p.id_tipo_pagamento
        from pagamento p
        left join venda v on (v.id = p.id_venda)
        left join tipo_pagamento t on (p.id_tipo_pagamento = t.id)
    where p.id = $id");
     //return view ('item_material', ['item_material' => $itens]);
     return view ('vendas/gerenciar-pagamentos', compact('vendas'));
    }

    public function destroy($id)
    {
        DB::delete('delete from pagamento where id = ?' , [$id]);
        $result= $this->getListaPagamentosAll();;
        return view('vendas/gerenciar-pagamentos', ['result'=>$result]);
    }

}
    