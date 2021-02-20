<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EntidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('/entidade/cad-entidade');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cnpj = $request->input('cnpj');
        $nome_fantasia = $request->input('nome_fantasia');
        $rz_social = $request->input('rz_social');
        $insc_estadual = $request->input('insc_estadual');
        $email_entidaede = $request->input('email_entidaede');        
        $nome_contato = $request->input('nome_contato');
        $telefone_contato = $request->input('telefone_contato');
        $site = $request->input('site');
        $cep = str_replace('-','',$request->input('cep'));
        $estado = $request->input('estado');
        $cidade = $request->input('cidade');
        $bairro = $request->input('bairro');
        $logradouro = $request->input('logradouro');
        $numero = $request->input('numero');
        $complemento = $request->input('complemento');
        $ibge = $request->input('ibge');
        $gia = $request->input('gia');

        DB::table('entidade')->insert([            
            'cnpj' => $cnpj,
            'nome_fantasia' => $nome_fantasia,
            'razao_social' => $rz_social,
            'inscricao_estadual' => $insc_estadual,
            'email_contato' => $email_entidaede,
            'nome_contato' => $nome_contato,
            // 'telefone_contato' => $telefone_contato,
            'site' => $site,
            'cep' => $cep,
            'uf' => $estado,
            'localidade' => $cidade,
            'bairro' => $bairro,
            'logradouro' => $logradouro,
            'numero' => $numero,
            'complemento' => $complemento,
            'ibge' => $ibge,
            'gia' =>$gia
        ]);

        return view('/entidade/cad-entidade');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
