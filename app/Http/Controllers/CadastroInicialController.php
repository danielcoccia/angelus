<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\ModelCadastroInicial;
use App\Models\ModelItemCatalogo;
use App\Models\ModelCatMaterial;
use App\Models\ModelItemMaterial;
use App\Models\ModelCor;
use App\Models\ModelTamanho;
use App\Models\ModelMarca;

class CadastroInicialController extends Controller
{

   private $objItemMaterial;

    public function __construct(){
        $this->objItemMaterial = new ModelCadastroInicial();
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
            order by im.data_cadastro desc
        ");
        return $lista;
    }


    public function index(Request $request)
    {

        $resultCat = DB::select ('select id, nome from tipo_categoria_material');

        //$result = $this->getListaItens();
        $result = DB::table('item_material AS im')
                            ->select('im.data_cadastro','im.id', 'icm.nome AS n1','tcm.nome AS n5', 'im.valor_venda','m.nome AS n2', 't.nome AS n3', 'c.nome AS n4', 'im.valor_venda', 'im.adquirido', 'tcm.id AS id_cat', 'im.id_tipo_situacao')
                            ->leftjoin('item_catalogo_material AS icm', 'icm.id' , '=', 'im.id_item_catalogo_material')
                            ->leftjoin('tipo_categoria_material AS tcm', 'icm.id_categoria_material' , '=', 'tcm.id')
                            ->leftjoin('marca AS m', 'm.id' , '=', 'im.id_marca')
                            ->leftjoin('tamanho AS t', 't.id' , '=', 'im.id_tamanho')
                            ->leftjoin('cor AS c', 'c.id', '=', 'im.id_cor');
        //$resultCategoria = DB::select ('select id, nome from tipo_categoria_material');
        //$resultSitMat = DB::select ('select id, nome from tipo_situacao_item_material');


        $data_inicio = $request->data_inicio;
        $data_fim = $request->data_fim;

        if ($request->data_inicio){

            $result->where('im.data_cadastro','>=' , $request->data_inicio);
        }
        if ($request->data_fim){
            $result->where('im.data_cadastro','<=' , $request->data_fim);
        }

        $material = $request->material;

        if ($request->material){
            $result->where('icm.nome', 'like', "%$request->material%");
        }
        $doado = $request->doado;
        if ($request->doado){
            $result->where('im.adquirido', '=', "$request->doado");
        }
        $categoria = $request->categoria;
        if ($request->categoria){
            $result->where('tcm.id', '=', "$request->categoria");
        }
        $comprado = $request->comprado;
        if ($request->comprado){
            $result->where('im.adquirido', '=', "$request->comprado");
        }
        $result = $result->orderBy('im.id', 'DESC')->paginate(10);


        return view('cadastroinicial/gerenciar-cadastro-inicial', compact('result','categoria', 'data_inicio', 'data_fim', 'material', 'resultCat'));


    }


    public function create()
    {
        $sql ="Select
                    it.id,
                    it.nome,
                    c.nome categoria
                    from item_catalogo_material it
                    join tipo_categoria_material c on it.id_categoria_material = c.id
                ";

        $resultItem = DB::select($sql);

        return view('cadastroinicial/incluir-cadastro-inicial-item', compact('resultItem'));
    }

    public function show($id)
    {
        //
    }




    public function formEditar (Request $request, $id)
    {

        $itemmat = DB::table('item_material AS im')
                        ->select('im.id', 'icm.nome AS nome', 'im.data_cadastro', 'im.valor_venda', 'im.id_tipo_situacao')
                        ->leftjoin('item_catalogo_material AS icm', 'im.id_item_catalogo_material', 'icm.id')
                        ->where('im.id',$id)
                        ->get();


        $nomeitem = DB::table('item_catalogo_material AS icm')
                        ->select('icm.id AS id_nome','icm.nome AS n1')
                        ->get();


        $result = DB::table('tipo_categoria_material AS tcm')
                        ->distinct('tcm.id')
                        ->select('tcm.id AS id_cat', 't.id AS id_tam', 'm.id AS id_marca', 'tcm.id AS id_cat', 'c.id AS id_cor', 'm.nome AS n2', 't.nome AS n3','tcm.nome AS n5', 'c.nome AS n4')
                        ->leftjoin('marca AS m', 'tcm.id', '=', 'm.id_categoria_material')
                        ->leftjoin('tamanho AS t', 'tcm.id' , '=', 't.id_categoria_material')
                        ->leftjoin('cor AS c', 'tcm.id', '=', 'c.id_categoria_material')
                        ->get();

        $tipo = DB::table('tipo_material AS tp')
                        ->select('tp.id AS id', 'tp.nome')
                        ->get();

        $genero = DB::table('tipo_genero AS g')
                        ->select('g.id AS id', 'g.nome')
                        ->get();

        $etaria = DB::table('fase_etaria AS fe')
                        ->select('fe.id AS id', 'fe.nome')
                        ->get();

        //dd($request);

        return view ('cadastroinicial/editar-cadastro-inicial', compact('result', 'itemmat', 'nomeitem', 'tipo','genero', 'etaria' ));
    }

    public function update (Request $request, $id)
    {
        $ativo = isset($request->checkAdq) ? 1 : 0;

         DB::table('item_material')
            ->where('id', $id)
            ->update([
                'id_item_catalogo_material' => $request->input('item_mat'),
                'valor_venda' => $request->input('valor'),
                'id_tamanho' => $request->input('tamanho'),
                'id_marca' => $request->input('marca'),
                'id_cor' => $request->input('cor'),
                'id_tipo_material' => $request->input('tp_mat'),
                'id_tp_genero' => $request->input('genero'),
                'id_fase_etaria' => $request->input('etaria'),
                'data_validade' => $request->input('dt_validade'),
                'adquirido' => $ativo,
        ]);

        return redirect()->action('CadastroInicialController@index');

    }

    public function destroy($id)
    {
         DB::delete('delete from item_material where id = ?' , [$id]);

        return redirect()->action('CadastroInicialController@index');
    }

    public function getCategoria ($id){

        $sql = "Select
                    c.id,
                    c.nome
                    from item_catalogo_material it
                    join tipo_categoria_material c on it.id_categoria_material = c.id
                where it.id = $id";

        $result = DB::select($sql);
        $html;
        $idCat =$result[0]->id;

        foreach ($result as $valors ) {
            //$html = '<label id="categoria" class="col-sm-2 col-form-label">'.$valors->nome.'</label>';
            $html= '<input type="hidden" id="id_categoria"  value="'.$valors->id.'">';
        }

        $sql2 = "Select id, nome from marca where id_categoria_material = $idCat";
        $result2 = DB::select($sql2);

        $sql3 = "Select id, nome from tamanho where id_categoria_material = $idCat";
        $result3 = DB::select($sql3);

        $sql4 = "Select id, nome from cor where id_categoria_material = $idCat";
        $result4 = DB::select($sql4);

        $sql5 = "Select id, nome from tipo_material where id_categoria_material = $idCat";
        $result5 = DB::select($sql5);

        $sql6 = "Select id, nome from fase_etaria where id_categoria_material = $idCat";
        $result6 = DB::select($sql6);

        $sql7 = "Select id, nome from tipo_genero";
        $result7 = DB::select($sql7);

        $html.='<div class="table-responsive">';
        $html.='<table class="table table-bordered table-striped mb-0">';
        $html.='<tr><td>Marca</td> <td>'.getCombo($result2,'marca', 0).'</td></tr>';
        $html.='<tr><td>Tamanho</td> <td>'.getCombo($result3,'tamanho', 0).'</td></tr>';
        $html.='<tr><td>Cor</td> <td>'.getCombo($result4,'cor', 0).'</td></tr>';
        $html.='<tr><td>Tipo Material</td> <td>'.getCombo($result5,'tp_mat', 0).'</td></tr>';
        $html.='<tr><td>Fase Etária</td> <td>'.getCombo($result6,'fase_etaria', 0).'</td></tr>';
        $html.='<tr><td>Gênero</td> <td>'.getCombo($result7,'genero', 0).'</td></tr>';
        $html.='</table>';
        $html.='</div>';

        return $html;
    }

    public function getFormCadastro($id){

        $sql8 = "select d.id, d.nome||' / '||e.nome nome
                from deposito d left join
                tipo_estoque e on e.id = d.id_tp_estoque";
        $result8 = DB::select($sql8);

        $sql9 = "Select id, nome from tipo_embalagem";
        $result9 = DB::select($sql9);

        $sql10 = "Select id, nome from tipo_unidade_medida";
        $result10 = DB::select($sql10);

        $html='<div class="table-responsive">';
        $html.='<table class="table table-bordered table-striped mb-0">';
        $html.='<tr><td>Deposito *</td> <td>'.getCombo($result8,'deposito', 1).'</td></tr>';
        $html.='<tr><td>Embalagem </td> <td>'.getCombo($result9,'embalagem', 0).'</td></tr>';
        $html.='<tr><td>Qtd Embalagem</td> <td><input type="text" name="qtdEmb" id="qtdEmb"></td></tr>';
        $html.='<tr><td>Unidade Medida </td> <td>'.getCombo($result10,'und_med', 0).'</td></tr>';
        $html.='<tr><td>Comprado</td><td><input type="checkbox" id="checkAdq" name="checkAdq" switch="bool" /><label for="checkAdq" data-on-label="Sim" data-off-label="Não"></label></td>';
        $html.='</table>';
        $html.='</div>';

        return $html;
    }

    public function getValor($id){

        $sql= "Select valor_minimo, valor_medio, valor_maximo, valor_marca, valor_etiqueta from item_catalogo_material where  id = $id";
        $result = DB::select($sql);

        $html='<div class="table-responsive">';
        $html.='<table class="table table-bordered table-striped mb-0">';
        $html.='<tr><td>Lista valores <br><input type="checkbox" id="checkVal" name="checkVal" switch="bool"  checked class="valCheck" /><label for="checkVal" data-on-label="Sim" data-off-label="Não"></label></td>';
        $html.='<td>Avariado<br><input type="checkbox" id="checkAvariado" name="checkAvariado" switch="bool" class="valCheck" /><label for="checkAvariado" data-on-label="Sim" data-off-label="Não"></label></td></tr>';
        $html.='<tr><td>Valor de Venda</td>
                <td>
                    <div id="DivValorInput">
                        <input type="radio" id="valor_minimo" name="valor_venda" value="'.$result[0]->valor_minimo.'">
                        <label for="valor_minimo">Mínimo R$'.$result[0]->valor_minimo.'</label><br>
                        <input type="radio" id="valor_medio" name="valor_venda" value="'.$result[0]->valor_medio.'">
                        <label for="valor_medio">Médio R$'.$result[0]->valor_medio.'</label><br>
                        <input type="radio" id="valor_maximo" name="valor_venda" value="'.$result[0]->valor_maximo.'">
                        <label for="valor_medio">Máximo R$'.$result[0]->valor_maximo.'</label><br>
                        <input type="radio" id="valor_marca" name="valor_venda" value="'.$result[0]->valor_marca.'">
                        <label for="valor_marca">Marca R$'.$result[0]->valor_marca.'</label><br>
                        <input type="radio" id="valor_etiqueta" name="valor_venda" value="'.$result[0]->valor_etiqueta.'">
                        <label for="valor_etiqueta">Etiqueta R$'.$result[0]->valor_etiqueta.'</label><br>
                    </div>
                </td></tr>';
        $html.='</table>';
        $html.='</div>';

        return $html;
    }

    public function getValorVariado($id){

        if($_REQUEST['listaValor'] == 'true' && $_REQUEST['avariado'] =='false' ){

            $sql= "Select valor_minimo, valor_medio, valor_maximo, valor_marca, valor_etiqueta from item_catalogo_material where  id = $id";
            $result = DB::select($sql);

            $html ='<input type="radio" id="valor_minimo" name="valor_venda" value="'.$result[0]->valor_minimo.'">
                    <label for="valor_minimo">Mínimo'.$result[0]->valor_minimo.'</label><br>
                    <input type="radio" id="valor_medio" name="valor_venda" value="'.$result[0]->valor_medio.'">
                    <label for="valor_medio">Médio R$'.$result[0]->valor_medio.'</label><br>
                    <input type="radio" id="valor_maximo" name="valor_venda" value="'.$result[0]->valor_maximo.'">
                    <label for="valor_maximo">Máximo R$'.$result[0]->valor_maximo.'</label><br>
                    <input type="radio" id="valor_marca" name="valor_venda" value="'.$result[0]->valor_marca.'">
                    <label for="valor_marca">Marca R$'.$result[0]->valor_marca.'</label><br>
                    <input type="radio" id="valor_etiqueta" name="valor_venda" value="'.$result[0]->valor_etiqueta.'">
                    <label for="valor_etiqueta">Etiqueta R$'.$result[0]->valor_etiqueta.'</label><br>';


                    //dd($html);

        }else if($_REQUEST['avariado'] =='true'){

            $sql= "Select valor id, valor nome from valor_avariado";
            $result = DB::select($sql);

            $html= getCombo($result,'valor_venda', 1);
        }else{
            $html='<input type="text" id="valor_venda" name="valor_venda" required>';
        }
        return $html;
    }

    public function getFormCadastroFinal($id){

        $sql= "Select id, prateleira nome from localizador";
        $result = DB::select($sql);

        $html='<div class="table-responsive">';
        $html.='<table class="table table-bordered table-striped mb-0">';
        $html.='<tr><td>Quantidade *</td><td><input type="text" id="qtdItens" name="qtdItens" required /></td>';
        $html.='<tr><td>Data validade</td><td><input class="form-control" type="date" value="" id="dt_validade" name="dt_validade"></td>';
        $html.='<tr><td>Localizador</td> <td>'.getCombo($result,'localizador', 0) .'</td></tr>';
        $html.='</table>
                <label class="text-muted">Observação</label>
                <textarea id="textarea" name="observacao" class="form-control" maxlength="225" rows="3" placeholder=""></textarea>
                <div class="col-12 mt-3" style="text-align: right;">
                <div class="row">
                <div class="col">
                <a href="/gerenciar-cadastro-inicial/incluir"><input class="btn btn-danger btn-block" type="button" value="Cancelar">
                </a>
                </div>
                <div class="col">
                <button type="submit" class="btn btn-success btn-block">Confirmar</button>
                </div>
                </div>
                </div>';
        $html.='</div>';

        return $html;
    }

    public function getComposicao ($id){

        $sql = "select
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
                where ic.id_item_catalogo =$id";

                $result = DB::select($sql);

                return view('catalogo/dialog-composicao-item', compact('result'));
    }

    public function store(Request $request)
    {

            $Adquirido = isset($request->checkAdq) ? 1 : 0;
            $Avariado = isset($request->checkAvariado) ? 1 : 0;

            for ($i=0; $i < $request->input('qtdItens'); $i++){

            //???????????? Liberacao_venda, id_tipo_situacao, valor_aquisicao,valor_venda_promocional, ?id_usuario?
            DB::table('item_material')->insert([
            'id_item_catalogo_material' => $request->input('item_material'),
            'observacao' => $request->input('observacao'),
            'data_cadastro' => date("m-d-Y"),
            'id_usuario_cadastro'=> session()->get('usuario.id_usuario'),
            'id_tipo_embalagem' => $request->input('embalagem'),
            'id_tipo_unidade_medida' => $request->input('und_med'),
            'quantidade_embalagem' => $request->input('qtdEmb'),
            'adquirido' => $Adquirido,
            'valor_venda' => $request->input('valor_venda'),
            'id_marca' => $request->input('marca'),
            'id_tamanho' => $request->input('tamanho'),
            'id_cor' => $request->input('cor'),
            'id_tipo_material' => $request->input('tp_mat'),
            'id_fase_etaria' => $request->input('fase_etaria'),
            'id_tp_genero' => $request->input('genero'),
            'id_deposito' => $request->input('deposito'),
            'avariado' => $Avariado,
            'data_validade' => $request->input('dt_validade'),
            'liberacao_venda' => 0,
            'id_tipo_situacao' => '1',
        ]);
        }

        //dd($request);

        return redirect()->action('CadastroInicialController@index');
    }

}
