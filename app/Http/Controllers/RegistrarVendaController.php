<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelVendas;
use App\Models\ModelPessoa;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PessoaController;

class RegistrarVendaController extends Controller
{
    public function __construct(){
        $this->objVendas = new ModelVendas();
        $this->objPessoas = new ModelPessoa();
    }

    private function getListaPessoaAll(){
        $lista = DB::select("
        Select
            p.id,
            p.nome,
            p.cpf,
            p.identidade,
            u.id
        from pessoa p
        left join usuario u on (p.id = u.id_pessoa)
        ");
        return $lista;
    }

    private function getListaItens(){
        $lista = DB::select("
            select 
                im.id, 
                ic.nome nome, 
                im.data_cadastro data_cadastro, 
                m.nome marca, 
                t.nome tamanho, 
                c.nome cor,
                tm.nome tipo_material,
                im.valor_venda,
                im.valor_venda_promocional,
                im.liberacao_venda
            from item_material im
            left join item_catalogo_material ic on (im.id_item_catalogo_material = ic.id)
            left join marca m on (im.id_marca = m.id)
            left join tamanho t on (im.id_tamanho = t.id)
            left join cor c on (im.id_cor = c.id)
            left join tipo_material tm on (im.id_tipo_material = tm.id)
        ");
        return $lista;
    }

    public function index(Request $request)
    {     
        $result= $this->getListaPessoaAll();
        $resultPessoa = DB::select ("select id, nome||'-'||cpf as cpf from pessoa");
        
        return view('vendas/registrar-venda', compact("result", "resultPessoa"));
    }

    public function Buscaritem()
    {     
       $resultItem = $this->getListaItens();
        
        return view('vendas/buscar-item', compact("resultItem"));
    }

       
    public function search(Request $request )
    {
        $id = $request->input('id');
        $nome = $request->input('nome');
        $cpf = $request->input('cpf');
        
        $result =DB::table('pessoa')
                                    ->where('id', 'like' ,'%'.$id.'%')
                                    ->where('nome', 'like' ,'%'.$nome.'%')
                                    ->where('cpf', 'like' , '%'.$cpf.'%')
                                    ->get();

        return view('registrar-venda/pessoa',['result'=>$result]);
    }

    public function show()
    {
        $sql ="Select 
                    id, 
                    nome,
                    cpf 
                    from pessoa";

        $pessoa = DB::select($sql);

        return view('vendas/registrar-venda', compact('pessoa'));
    }

    public function getItem($id)
    {
       

       $item = DB::select("
            select 
                im.id, 
                ic.nome nome, 
                im.data_cadastro data_cadastro, 
                m.nome marca, 
                t.nome tamanho, 
                c.nome cor,
                tm.nome tipo_material,
                im.valor_venda,
                im.valor_venda_promocional,
                im.liberacao_venda
            from item_material im
            left join item_catalogo_material ic on (im.id_item_catalogo_material = ic.id)
            left join marca m on (im.id_marca = m.id)
            left join tamanho t on (im.id_tamanho = t.id)
            left join cor c on (im.id_cor = c.id)
            left join tipo_material tm on (im.id_tipo_material = tm.id)
            where im.id = $id
        ");

        return view('vendas/area-confirmacao', compact('item'));
    }

    public function setVenda($id_pessoa, $data_venda, $id_usuario){

        DB::table('venda')->insert([            
            'data' => $data_venda,
            'id_pessoa' => $id_pessoa,
            'id_usuario' => $id_usuario,
            'id_tp_situacao_venda' => '1',
        ]);

        $result = DB::select("
            select
                max(id) id
            from venda
            where id_pessoa=".$id_pessoa." and id_usuario=".$id_usuario);

        return $result[0]->id;
     }

     public function setItemLista($id_item, $id_venda){

        DB::table('venda_item_material')->insert([            
            'id_venda' => $id_venda,
            'id_item_material' => $id_item,
        ]);

        $listaItemVenda = $this->getListaVenda($id_venda);

        return view('vendas/lista-compras', compact('listaItemVenda'));
     }

     public function getListaVenda($id_venda){

         $result = DB::select("
            select 
            vi.id_venda,
            id_item_material id,
            ic.nome nome, 
            im.valor_venda_promocional
            from venda_item_material vi
            left join item_material im on vi.id_item_material = im.id
            left join item_catalogo_material ic on im.id_item_catalogo_material = ic.id
            where id_venda =$id_venda");

        return $result;
     }
}
