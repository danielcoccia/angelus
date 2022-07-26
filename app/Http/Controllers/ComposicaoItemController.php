<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\ModelComposicaoItem;
use App\Models\ModelEmbalagem;
use App\Models\ModelUnidadeMedida;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ComposicaoItemController extends Controller
{
    private $objComposicaoItem;    

    public function __construct(){
        $this->objComposicaoItem = new ModelComposicaoItem();        
    }

    private function getListaItemMatComposicaoAll(){
        $lista = DB::select("
            select 
                i.id,
                i.nome,
                c.nome nome_categoria,
                i.valor_minimo,
                i.valor_medio,
                i.valor_maximo,
                i.composicao,
                i.ativo
            from item_catalogo_material i
            left join tipo_categoria_material c on i.id_categoria_material =c.id 
            where i.composicao is true
        ");
        return $lista;
    }

    public function index()
    {
        $result= $this->getListaItemMatComposicaoAll(); 
        return view('composicaoItem/gerenciar-composicao-item', compact('result'));
    }
    
    public function create($id)
    {
        
        $resultItemComposicao = DB::select("
            select 
                i.id,
                i.nome,
                c.nome nome_categoria,
                i.valor_minimo,
                i.valor_medio,
                i.valor_maximo,
                i.composicao,
                i.ativo
            from item_catalogo_material i
            left join tipo_categoria_material c on i.id_categoria_material =c.id 
            where i.id = $id
        ");


        $resultListaItensComposto = DB::select("
            select 
                c.id id_item,
                c.nome nome_item,
                emb.sigla embalagem,
                um.sigla unidade_medida,
                ic.quantidade,
                ic.id
            from composicao_item_catalogo ic
            left join item_catalogo_material c on ic.id_item_catalogo_composto =c.id 
            left join tipo_embalagem emb on ic.id_tipo_embalagem = emb.id
            left join tipo_unidade_medida um on ic.id_tipo_unidade_medida = um.id
            where ic.id_item_catalogo = $id 
        ");

        $resultItem = DB::select("
            select id, nome
                from item_catalogo_material 
                where composicao is false");

        $objEmbalagem = new ModelEmbalagem();
        $resultEmbalagem = $objEmbalagem->all();

        $objUniMed = new ModelUnidadeMedida();
        $resultUniMed = $objUniMed->all();
        //$objembalagem = new ModelEmbalagem();
        //$resultEmbalagem = $objembalagem->all();

        return view('composicaoItem/incluir-item-composicao', compact('resultItemComposicao','resultListaItensComposto','resultItem','resultEmbalagem','resultUniMed'));
    }
   
    public function store(Request $request)
    {

        try {            
            DB::table('composicao_item_catalogo')->insert([            
                'id_item_catalogo' => $request->input('idItem'),            
                'id_item_catalogo_composto' => $request->input('itemComposto'),
                'id_tipo_embalagem' => $request->input('embalagem'),
                'id_tipo_unidade_medida' =>$request->input('unidade_medida'),
                'quantidade' => $request->input('qtd'),
            ]);
        } catch (QueryException $e) {
            flash()->error('Mensagem para o usuário');
            return redirect()->back();
        }

        

        return $this->create($request->input('idItem'));
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

    public function destroy($id, $idComposicao)
    {
        $deleted = DB::delete('delete from composicao_item_catalogo where id =?' , [$id]);
        return $this->create($idComposicao);
    }
}
