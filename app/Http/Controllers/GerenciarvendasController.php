<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ModelItemCatalogo;
use App\Models\ModelCatMaterial;
use App\Models\ModelVendas;
use Illuminate\Support\Facades\Http;

class GerenciarVendasController extends Controller
{
    
    private $objItemCatalogo;
    private $objTipoMaterial;
    private $objVendas;

    public function __construct(){
        $this->objItemCatalogo = new ModelItemCatalogo();
        $this->objTipoMaterial = new ModelCatMaterial();
         $this->objVendas = new ModelVendas();
    }

    private function getListaVendasAll(){
        $lista = DB::select("
            Select
                v.id,
                v.data,
                v.id_pessoa,
<<<<<<< HEAD
                v.id_usuario,
                p.nome,
=======
                p.nome,
                p.cpf,
                v.id_usuario,
>>>>>>> master
                v.valor,
                v.id_tp_situacao_venda
            from venda v
            left join pessoa p on (v.id_pessoa = p.id)
            left join usuario u on (v.id_usuario = u.id)
        ");
        return $lista;
    }

    public function index()
    {     
        $result= $this->getListaVendasAll();
        return view('vendas/gerenciar-vendas',['result'=>$result]);
    }

 
    public function create()
    {           
        $resultVendas = $this->objVendas->all();
<<<<<<< HEAD
        return view('vendas/registrar-venda', compact('resultVendas'));   
=======
        return view('vendas/venda-incluir', compact('resultVendas'));   
>>>>>>> master
    }


    public function store(Request $request)
    {
        //$ativo = isset($request->ativo) ? 1 : 0;
        //$composicao = isset($request->composicao) ? 1 : 0;

        DB::table('venda')->insert([            
            
            'data' => $request->input('data_venda'),
            'id_pessoa' => $request->input('cliente'),
            'id_usuario' => $request->input('vendedor'),
            'valor' => $request->input('valor_venda'),
            'id_tp_situacao_venda' => $request->input('sit_venda'),            
        ]);


        $result= $result= $this->getListaVendasAll();


    }

    
    public function show($id)
    {
          
    //$itens = DB::table ('item_material')->get();
    $vendas = DB::select ("
        v.id,         
        v.data,                
        p.nome,
        p.cpf,
        v.id_usuario,
        v.valor,
        v.id_tp_situacao_venda
    from venda v
    left join pessoa p on (v.id_pessoa = p.id)
    left join usuario u on (v.id_usuario = u.id)
    where v.id = $id");
     //return view ('item_material', ['item_material' => $itens]);
<<<<<<< HEAD
     return view ('vendas/registrar-venda', compact('vendas'));
=======
     return view ('vendas/venda-incluir', compact('vendas'));
>>>>>>> master
    }

  
    public function edit($id)
    {
<<<<<<< HEAD
        $resultVenda = $this->objVendas->all();
        $result =DB::table('venda')->where('id',$id)->get();
        return view('vendas/gerenciar-vendas', compact('resultVenda', 'result'));

        $resultVenda = DB::select("select id_pessoa, id_usuario from venda where id = $id ");

        return view('/vendas/gerenciar-vendas/alterar', compact("resultVendas"));

=======
        $resultCategoria = $this->objTipoMaterial->all();
        $result =DB::table('item_catalogo_material')->where('id',$id)->get();
        return view('item/editar-item-catalogo', compact('resultCategoria', 'result'));
>>>>>>> master
    }

   
    public function update(Request $request, $id)
    {     
<<<<<<< HEAD
        DB::table('venda')
        ->where('id', $id)
        ->update([
            'valor' => $request->input('valor'),
           // 'id_usuario' => $request->input('vendedor'),
        ]);

        return redirect()->action('GerenciarvendasController@update');
=======
        $ativo = isset($request->ativo) ? 1 : 0;
        $composicao = isset($request->composicao) ? 1 : 0;
        
        DB::table('item_catalogo_material')
            ->where('id', $id)
            ->update([
                'nome' => $request->input('nome_item'),
                'id_categoria_material' => $request->input('categoria_item'),
                'valor_minimo' => $request->input('val_minimo'),
                'valor_medio' => $request->input('val_medio'),
                'valor_maximo' => $request->input('val_maximo'),
                'valor_marca' => $request->input('val_marca'),
                'valor_etiqueta' => $request->input('val_etiqueta'),
                'composicao' => $composicao,
                'ativo' => $ativo,
            ]);

        $result= $result= $this->getListaItemMatAll();;
        return view('item/gerenciar-item-catalogo', ['result'=>$result]);

>>>>>>> master
    }
   
    public function destroy($id)
    {
<<<<<<< HEAD
        DB::delete('delete from venda where id = ?' , [$id]);
        $result= $this->getListaVendasAll();;
        return view('vendas/gerenciar-vendas', ['result'=>$result]);
=======
        DB::delete('delete from item_catalogo_material where id = ?' , [$id]);
        $result= $result= $this->getListaItemMatAll();;
        return view('item/gerenciar-item-catalogo', ['result'=>$result]);
>>>>>>> master
    }
}
