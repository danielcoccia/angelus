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
   
}
