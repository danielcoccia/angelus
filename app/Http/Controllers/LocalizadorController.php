<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
//use App\Models\ModelLocalizador;

class LocalizadorController extends Controller
{
    public function getLocalizador()
    {
        $sql="select
                l.id,
                d.nome deposito,
                l.prateleira,
                l.nivel
                from localizador l
                join deposito d on l.id_deposito = d.id
                where d.ativo is true and l.ativo is true";

        return DB::select($sql);
    }

    public function index()
    {
        $resultLocalizador = $this->getLocalizador();
        $resultDeposito = DB::select("select id, nome from deposito");

        return view('config-depositos/gerenciar-localizador', compact("resultDeposito", "resultLocalizador"));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        DB::table('localizador')->insert([
            'id_deposito' => $request->input('deposito'),
            'prateleira' => $request->input('prateleira'),
            'nivel' => $request->input('nivel'),
            'ativo' => 1
        ]);

        return redirect()->action('LocalizadorController@index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $resultDeposito = DB::select("select id, nome from deposito");

        $sql="select
                l.id,
                l.id_deposito,
                l.prateleira,
                l.nivel
                from localizador l
                join deposito d on l.id_deposito = d.id
                where d.ativo is true and l.ativo is true and l.id =$id";

        $resultLocalizador = DB::select($sql);

        return view('config-depositos/alterar-localizador', compact("resultDeposito", "resultLocalizador"));
    }

    public function update(Request $request, $id)
    {
        DB::table('localizador')
        ->where('id', $id)
        ->update([
            'id_deposito' => $request->input('deposito'),
            'prateleira' => $request->input('prateleira'),
            'nivel' => $request->input('nivel')
        ]);

        return redirect()->action('LocalizadorController@index');
    }

    public function destroy($id)
    {

        DB::delete('delete from localizador where id =?' , [$id]);
        return redirect()->action('LocalizadorController@index');
    }
}
