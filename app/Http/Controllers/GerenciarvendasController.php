<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ModelItemCatalogo;
use App\Models\ModelCatMaterial;
use App\Models\ModelVendas;


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
            v.id_usuario,
            p.nome as nome_cliente,
            pu.nome as nome_usuario,
            v.valor,
            t.nome as sit_venda
        from venda v
        left join pessoa p on (v.id_pessoa = p.id)
        left join usuario u on (v.id_usuario = u.id)
        left join pessoa pu on (u.id_pessoa = pu.id)
        left join tipo_situacao_venda t on (t.id = v.id_tp_situacao_venda)
        ");
        return $lista;
    }

    public function index()
    {     
        $result= $this->getListaVendasAll();
        $resultCategoria = DB::select ('select id, nome from tipo_categoria_material');
        $resultSitVenda = DB::select ('select id, nome from tipo_situacao_venda');
        return view('vendas/gerenciar-vendas', compact("result", "resultCategoria", "resultSitVenda"));

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
     

     return view ('vendas/gerenciar-venda', compact('vendas'));


    }


    public function edit($id)
    {

        $resultVenda = $this->objVendas->all();

        $result =DB::table('venda')->where('id',$id)->get();
        return view('vendas/gerenciar-vendas', compact('resultVenda', 'result'));

        $resultVenda = DB::select("select id_pessoa, id_usuario from venda where id = $id ");

        return view('/vendas/gerenciar-vendas/alterar', compact("resultVendas"));


    }

    
    public function destroy($id)
    {

        DB::delete('delete from venda where id = ?' , [$id]);
        $result= $this->getListaVendasAll();;
        return view('vendas/gerenciar-vendas', ['result'=>$result]);

    }

    public function update ($id){

        //number_format($total_preco,2,',','.');

        $total_preco = DB::table ('venda')
        ->leftjoin('venda_item_material', 'venda.id', '=', 'venda_item_material.id_venda')
        ->leftjoin('item_material', 'venda_item_material.id_item_material', '=', 'item_material.id')
        ->where ('id_venda', '=', $id)
        ->sum('item_material.valor_venda');
        
        $valor =  DB::table ('venda')
        ->where ('id', '=', $id)
        ->sum('valor');

           
        $tp_sit =  DB::table ('venda')
        ->where ('id', '=', $id)
        ->sum('id_tp_situacao_venda');      

        
        if ($tp_sit[0]== 1){
            
            dd ("Favor finalizar a venda $id");
        }

        elseif ($tp_sit[0] == 2) {
            
            DB::table ('venda')
            ->where('id', $id)
            ->update(['valor' => $total_preco,'id_tp_situacao_venda' => 3]);
        }

        elseif ($tp_sit[0] == 3) {
            
            dd( "A venda $id já está paga.");
        }
             
        return redirect('/gerenciar-vendas');
    }
            
    

}
