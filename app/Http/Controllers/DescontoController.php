<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class DescontoController extends Controller
{
    public function index(){

        $result = DB::table('descontos')
                    ->leftjoin('tipo_categoria_material', 'descontos.id_tp_categoria', 'tipo_categoria_material.id')
                    ->leftjoin('usuario', 'descontos.id_usuario', 'usuario.id')
                    ->leftjoin('pessoa', 'usuario.id_pessoa', 'pessoa.id')
                    ->select('descontos.id', 'tipo_categoria_material.nome AS nome1', 'data_inicio', 'data_fim', 'porcentagem', 'pessoa.nome AS nome2', 'descontos.ativo', 'descontos.data_registro')
                    ->get();


        return view ('/descontos/gerenciar-desconto', compact('result'));

    }

    public function create(){

        $categoria = DB::select("select id, nome from tipo_categoria_material");

        $percent = array(0.01, 0.02, 0.03, 0.04, 0.05, 0.06, 0.07, 0.08, 0.09, 0.1, 0.11, 0.12, 0.13, 0.14, 0.15, 0.16, 0.17, 0.18, 0.19, 0.2, 0.21, 0.22, 0.23, 0.24, 0.25, 0.26, 0.27, 0.28, 0.29, 0.3, 0.31, 0.32, 0.33, 0.34, 0.35, 0.36, 0.37, 0.38, 0.39, 0.4, 0.41, 0.42, 0.43, 0.44, 0.45, 0.46, 0.47, 0.48, 0.49, 0.5, 0.51, 0.52, 0.53, 0.54, 0.55, 0.56, 0.57, 0.58, 0.59, 0.6, 0.61, 0.62, 0.63, 0.64, 0.65, 0.66, 0.67, 0.68, 0.69, 0.7, 0.71, 0.72, 0.73, 0.74, 0.75, 0.76, 0.77, 0.78, 0.79, 0.8, 0.81, 0.82, 0.83, 0.84, 0.85, 0.86, 0.87, 0.88, 0.89, 0.9, 0.91, 0.92, 0.93, 0.94, 0.95, 0.96, 0.97, 0.98, 0.99, 1);

        //$perc = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100);

        return view ('/descontos/criar-desconto', compact('categoria', 'percent'));

    }


    public function store(Request $request){

        $inativo = isset($request->inativo) ? 1 : 0;

        DB::table('descontos')->insert([
            'id_tp_categoria' => $request->input('cat_item'),
            'data_inicio' => $request->input('data_inicio'),
            'data_fim' => $request->input('data_fim'),
            'porcentagem' => $request->input('porcentagem'),
            'id_usuario' => $request->input('id_usuario'),
            'data_registro' => $request->input('data_registro'),
            'ativo' => $inativo,
        ]);

        return redirect()->action('DescontoController@index')
        ->with('message', 'A configuração do desconto foi criada com sucesso!');

    }

    public function edit($id){


        $categoria = DB::table('tipo_categoria_material')->get();

        $percent = array(0.01, 0.02, 0.03, 0.04, 0.05, 0.06, 0.07, 0.08, 0.09, 0.1, 0.11, 0.12, 0.13, 0.14, 0.15, 0.16, 0.17, 0.18, 0.19, 0.2, 0.21, 0.22, 0.23, 0.24, 0.25, 0.26, 0.27, 0.28, 0.29, 0.3, 0.31, 0.32, 0.33, 0.34, 0.35, 0.36, 0.37, 0.38, 0.39, 0.4, 0.41, 0.42, 0.43, 0.44, 0.45, 0.46, 0.47, 0.48, 0.49, 0.5, 0.51, 0.52, 0.53, 0.54, 0.55, 0.56, 0.57, 0.58, 0.59, 0.6, 0.61, 0.62, 0.63, 0.64, 0.65, 0.66, 0.67, 0.68, 0.69, 0.7, 0.71, 0.72, 0.73, 0.74, 0.75, 0.76, 0.77, 0.78, 0.79, 0.8, 0.81, 0.82, 0.83, 0.84, 0.85, 0.86, 0.87, 0.88, 0.89, 0.9, 0.91, 0.92, 0.93, 0.94, 0.95, 0.96, 0.97, 0.98, 0.99, 1);

        //$perc = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100);


        $result = DB::table('descontos')
                    ->leftjoin('tipo_categoria_material', 'descontos.id_tp_categoria', 'tipo_categoria_material.id')
                    ->leftjoin('usuario', 'descontos.id_usuario', 'usuario.id')
                    ->leftjoin('pessoa', 'usuario.id_pessoa', 'pessoa.id')
                    ->select('descontos.id', 'tipo_categoria_material.id AS idcat', 'tipo_categoria_material.nome AS nome1', 'data_inicio', 'data_fim', 'porcentagem', 'pessoa.nome AS nome2', 'descontos.ativo', 'descontos.data_registro')
                    ->where('descontos.id', $id)
                    ->get();

        return view ('/descontos/desconto-alterar', compact('result', 'categoria', 'percent'));

    }

    public function update(Request $request, $id){


        DB::table('descontos')
        ->where('id', $id)
        ->update([
            'id_tp_categoria' => $request->input('cat_item'),
            'data_inicio' => $request->input('data_inicio'),
            'data_fim' => $request->input('data_fim'),
            'porcentagem' => $request->input('porcentagem'),
            'id_usuario' => $request->input('id_usuario'),
            'data_registro' => $request->input('data_registro'),
        ]);

        return redirect()->action('DescontoController@index')
        ->with('message', 'A configuração do desconto foi alterada com sucesso!');
    }


    public function destroy($id){

        $desconto = DB::table('descontos')
                    ->where('id',$id)
                    ->value('porcentagem');

        $categoria = DB::table('descontos')
                    ->where('id',$id)
                    ->value('id_tp_categoria');


        DB::table('item_material')
        ->leftjoin('item_catalogo_material', 'item_material.id_item_catalogo_material', 'item_catalogo_material.id')
        ->leftJoin('tipo_categoria_material', 'item_catalogo_material.id_categoria_material', 'tipo_categoria_material.id')
        ->leftJoin('descontos', 'tipo_categoria_material.id', 'descontos.id_tp_categoria')
        ->where('descontos.id',$id)
        ->where('item_catalogo_material.id_categoria_material', $categoria)
        ->where ('descontos.porcentagem', $desconto)
        ->where ('item_material.id_tipo_situacao','<', 2)
        ->update([
        'item_material.valor_venda_promocional' => 0,
        ]);

        DB::table('descontos')
        ->where('id', $id)
        ->delete();

        return redirect()->action('DescontoController@index')
        ->with('danger', 'A configuração do desconto foi excluida com sucesso!');


    }

    public function active(Request $request, $id){

        ////for($i = 0.01; $i < 1; $i+=0.01){
        //    echo $i.', ';
        //}
        //dd($request->session()->all());
       //$registered = Session::registered()->get();

        $desconto = DB::table('descontos')
                    ->where('id',$id)
                    ->value('porcentagem');

        $categoria = DB::table('descontos')
                    ->where('id',$id)
                    ->value('id_tp_categoria');

        $data_inicio = DB::table('descontos')
                    ->where('id',$id)
                    ->value('data_inicio');

        $data_fim = DB::table('descontos')
                    ->where('id',$id)
                    ->value('data_fim');

        $usuario = $request->session()->get('usuario.id_usuario');

        $data_atual = (\Carbon\carbon::now()->toDateTimeString());


        if ($data_inicio == null && $data_fim == null){

            DB::table('item_material')
            ->leftjoin('item_catalogo_material', 'item_material.id_item_catalogo_material', 'item_catalogo_material.id')
            ->leftJoin('tipo_categoria_material', 'item_catalogo_material.id_categoria_material', 'tipo_categoria_material.id')
            ->leftJoin('descontos', 'tipo_categoria_material.id', 'descontos.id_tp_categoria')
            ->where('descontos.id',$id)
            ->where('item_catalogo_material.id_categoria_material', $categoria)
            ->where ('descontos.porcentagem', $desconto)
            ->where ('item_material.id_tipo_situacao','<', 2)
            ->update([
            'item_material.valor_venda_promocional' => $desconto,
            ]);

            $teste = DB::table('descontos')
                ->where('descontos.id',$id)
                ->update([
                    'ativo' => 'true',
                    'id_usuario' => $usuario,
                    'data_registro' => $data_atual
                    ]);


            return redirect()->action('DescontoController@index')
                ->with('message', 'A configuração do desconto foi ativada!');


        }
        elseif ($data_inicio > 0 && $data_fim == null){

              DB::table('item_material')
              ->leftjoin('item_catalogo_material', 'item_material.id_item_catalogo_material', 'item_catalogo_material.id')
              ->leftJoin('tipo_categoria_material', 'item_catalogo_material.id_categoria_material', 'tipo_categoria_material.id')
              ->leftJoin('descontos', 'tipo_categoria_material.id', 'descontos.id_tp_categoria')
              ->where('descontos.id',$id)
              ->where('item_catalogo_material.id_categoria_material', $categoria)
              ->where('descontos.porcentagem', $desconto)
              ->where('item_material.data_cadastro','>', $data_inicio)
              ->where('item_material.id_tipo_situacao','<', 2)
              ->update([
                'valor_venda_promocional' => $desconto
             ]);

             DB::table('descontos')
             ->where('descontos.id',$id)
             ->update([
                        'ativo' => 'true',
                        'id_usuario' => $usuario,
                        'data_registro' => $data_atual
                 ]);


              return redirect()->action('DescontoController@index')
                  ->with('message', 'A configuração do desconto foi ativada!');
        }
        elseif ($data_inicio == null && $data_fim > 0){

            DB::table('item_material')
            ->leftjoin('item_catalogo_material', 'item_material.id_item_catalogo_material', 'item_catalogo_material.id')
            ->leftJoin('tipo_categoria_material', 'item_catalogo_material.id_categoria_material', 'tipo_categoria_material.id')
            ->leftJoin('descontos', 'tipo_categoria_material.id', 'descontos.id_tp_categoria')
            ->where('descontos.id',$id)
            ->where('item_catalogo_material.id_categoria_material', $categoria)
            ->where('descontos.porcentagem', $desconto)
            ->where('item_material.data_cadastro','<', $data_fim)
            ->where('item_material.id_tipo_situacao','<', 2)
            ->update([
              'valor_venda_promocional' => $desconto
           ]);

           DB::table('descontos')
           ->where('descontos.id',$id)
           ->update([
                'ativo' => 'true',
                'id_usuario' => $usuario,
                'data_registro' => $data_atual
               ]);


            return redirect()->action('DescontoController@index')
                ->with('message', 'A configuração do desconto foi ativada!');
      }
        elseif ($data_inicio > 0 && $data_fim > 0){


            DB::table('item_material')
            ->leftjoin('item_catalogo_material', 'item_material.id_item_catalogo_material', 'item_catalogo_material.id')
            ->leftJoin('tipo_categoria_material', 'item_catalogo_material.id_categoria_material', 'tipo_categoria_material.id')
            ->leftJoin('descontos', 'tipo_categoria_material.id', 'descontos.id_tp_categoria')
            ->where('descontos.id',$id)
            ->where('item_catalogo_material.id_categoria_material', $categoria)
            ->where('descontos.porcentagem', $desconto)
            ->where('item_material.data_cadastro', '>', $data_inicio)
            ->where('item_material.data_cadastro', '<', $data_fim)
            ->where('item_material.id_tipo_situacao','<', 2)
            ->update([
                'valor_venda_promocional' => $desconto
            ]);

            DB::table('descontos')
            ->where('descontos.id',$id)
            ->update([
                'ativo' => 'true',
                'id_usuario' => $usuario,
                'data_registro' => $data_atual
                ]);

            return redirect()->action('DescontoController@index')
                  ->with('message', 'A configuração do desconto foi ativada!');

        }

    }

    public function inactive(Request $request, $id){

        $desconto = DB::table('descontos')
                    ->where('id',$id)
                    ->value('porcentagem');

        $categoria = DB::table('descontos')
                    ->where('id',$id)
                    ->value('id_tp_categoria');

        $data_inicio = DB::table('descontos')
                    ->where('id',$id)
                    ->value('data_inicio');

        $data_fim = DB::table('descontos')
                    ->where('id',$id)
                    ->value('data_fim');

        $usuario = $request->session()->get('usuario.id_usuario');

        $data_atual = (\Carbon\carbon::now()->toDateTimeString());


        if ($data_inicio == null && $data_fim == null){

            DB::table('item_material')
            ->leftjoin('item_catalogo_material', 'item_material.id_item_catalogo_material', 'item_catalogo_material.id')
            ->leftJoin('tipo_categoria_material', 'item_catalogo_material.id_categoria_material', 'tipo_categoria_material.id')
            ->leftJoin('descontos', 'tipo_categoria_material.id', 'descontos.id_tp_categoria')
            ->where('descontos.id',$id)
            ->where('item_catalogo_material.id_categoria_material', $categoria)
            ->where ('descontos.porcentagem', $desconto)
            ->where ('item_material.id_tipo_situacao','<', 2)
            ->update([
            'valor_venda_promocional' => 0
            ]);

            DB::table('descontos')
                ->where('descontos.id',$id)
                ->update([
                    'ativo' => 'false',
                    'id_usuario' => $usuario,
                    'data_registro' => $data_atual
                    ]);


            return redirect()->action('DescontoController@index')
                ->with('warning', 'A configuração do desconto foi inativada!');

        }
        elseif ($data_inicio > 0 && $data_fim == null){

              DB::table('item_material')
              ->leftjoin('item_catalogo_material', 'item_material.id_item_catalogo_material', 'item_catalogo_material.id')
              ->leftJoin('tipo_categoria_material', 'item_catalogo_material.id_categoria_material', 'tipo_categoria_material.id')
              ->leftJoin('descontos', 'tipo_categoria_material.id', 'descontos.id_tp_categoria')
              ->where('descontos.id',$id)
              ->where('item_catalogo_material.id_categoria_material', $categoria)
              ->where('descontos.porcentagem', $desconto)
              ->where('item_material.data_cadastro','>', $data_inicio)
              ->where('item_material.id_tipo_situacao','<', 2)
              ->update([
                'valor_venda_promocional' => 0
             ]);

             DB::table('descontos')
             ->where('descontos.id',$id)
             ->update([
                'ativo' => 'false',
                'id_usuario' => $usuario,
                'data_registro' => $data_atual
                 ]);



              return redirect()->action('DescontoController@index')
                  ->with('warning', 'A configuração do desconto foi inativada!');
        }
        elseif ($data_inicio == null && $data_fim > 0){

            DB::table('item_material')
            ->leftjoin('item_catalogo_material', 'item_material.id_item_catalogo_material', 'item_catalogo_material.id')
            ->leftJoin('tipo_categoria_material', 'item_catalogo_material.id_categoria_material', 'tipo_categoria_material.id')
            ->leftJoin('descontos', 'tipo_categoria_material.id', 'descontos.id_tp_categoria')
            ->where('descontos.id',$id)
            ->where('item_catalogo_material.id_categoria_material', $categoria)
            ->where('descontos.porcentagem', $desconto)
            ->where('item_material.data_cadastro','<', $data_fim)
            ->where('item_material.id_tipo_situacao','<', 2)
            ->update([
              'valor_venda_promocional' => 0
           ]);

           DB::table('descontos')
           ->where('descontos.id',$id)
           ->update([
                'ativo' => 'false',
                'id_usuario' => $usuario,
                'data_registro' => $data_atual
               ]);



            return redirect()->action('DescontoController@index')
                ->with('warning', 'A configuração do desconto foi inativada!');
      }
        elseif ($data_inicio > 0 && $data_fim > 0){


            DB::table('item_material')
            ->leftjoin('item_catalogo_material', 'item_material.id_item_catalogo_material', 'item_catalogo_material.id')
            ->leftJoin('tipo_categoria_material', 'item_catalogo_material.id_categoria_material', 'tipo_categoria_material.id')
            ->leftJoin('descontos', 'tipo_categoria_material.id', 'descontos.id_tp_categoria')
            ->where('descontos.id',$id)
            ->where('item_catalogo_material.id_categoria_material', $categoria)
            ->where('descontos.porcentagem', $desconto)
            ->where('item_material.data_cadastro', '>', $data_inicio)
            ->where('item_material.data_cadastro', '<', $data_fim)
            ->where('item_material.id_tipo_situacao','<', 2)
            ->update([
                'valor_venda_promocional' => 0
            ]);

            DB::table('descontos')
            ->where('descontos.id',$id)
            ->update([
                'ativo' => 'false',
                'id_usuario' => $usuario,
                'data_registro' => $data_atual
                ]);


            return redirect()->action('DescontoController@index')
                  ->with('warning', 'A configuração do desconto foi inativada!');

        }
    }
}
