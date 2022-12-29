<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ModelGenero;
use App\Models\ModelPessoa;
use App\Models\ModelEntidade;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;

class PessoaController extends Controller
{

    private $objGenero;
    private $objPessoa;

    public function __construct(){
        $this->objGenero = new ModelGenero();
        $this->objPessoa = new ModelPessoa();
    }

    public function index()
    {
        $result= $this->objPessoa->all();
        return view('pessoa/gerenciar-pessoa',['result'=>$result]);
    }

    public function create()
    {
        //$response = Http::get('https://viacep.com.br/ws/01001000/json/');
        //$data = $response->json();
        // $entidade = new ModelEntidade();
        // $resultEntidade = $entidade->all();

        $resultEntidade = DB::select("select id, nome_fantasia||' - '||cnpj nome  from entidade");

        $result= $this->objGenero->all();
        return view('/pessoa/cad-pessoa',['result'=>$result, 'resultEntidade'=> $resultEntidade]);
    }

    public function store(Request $request)
    {
       $cpf = $request->cpf;
       $email = $request->email;

       $cpfban = DB::table('pessoa')
                    ->select(DB::raw('case when count(cpf) > 0 then 1 else 0 end'))
                    ->where('cpf', '=', $cpf)
                    ->value([0]);

        //dd($cpfban);

        $emailban = DB::table('pessoa')
                    ->select(DB::raw('case when count(email) > 0 then 1 else 0 end'))
                    ->where('email', '=', $email)
                    ->value([0]);



        if ($cpfban == 1){

            return redirect()
            ->action('PessoaController@create')
            ->with('danger', 'Esse CPF está duplicado no cadastro do sistema!');

        } elseif ($emailban == 1) {

            return redirect()
            ->action('PessoaController@create')
            ->with('danger', 'Esse Email está duplicado no cadastro do sistema!');

        } else{

        DB::table('pessoa')->insert([
            'nome' => $request->input('nome'),
            'identidade' => $request->input('identidade'),
            'cpf' => preg_replace("/[^0-9]/", "", $request->input('cpf')),
            'email' => $request->input('email'),
            'id_genero' => $request->input('genero'),
            'data_nascimento' => $request->input('dt_nascimento'),
            'id_entidade' => $request->input('entidade'),
            'celular' => preg_replace("/[^0-9]/", "", $request->input('celular')),
            'cep' => str_replace('-','',$request->input('cep')),
            'uf' =>  $request->input('estado'),
            'localidade' => $request->input('cidade'),
            'bairro' => $request->input('bairro'),
            'logradouro' => $request->input('logradouro'),
            'numero' => $request->input('numero'),
            'complemento' => $request->input('complemento'),
            'ibge' => $request->input('ibge'),
            'gia' => $request->input('gia')
        ]);


        $result= $this->objPessoa->all();

        return redirect()
        ->action('PessoaController@index')
        ->with('message', 'A pessoa foi cadastrada!');
        }

    }

    public function show(Request $request)
    {
        $nome = $request->input('nome');
        $identidade = $request->input('identidade');
        $cpf = $request->input('cpf');

        $result =DB::table('pessoa')
                                    ->where('nome', 'like' ,'%'.$nome.'%')
                                    ->where('identidade', 'like' , '%'.$identidade.'%')
                                    ->where('cpf', 'like' , '%'.$cpf.'%')
                                    ->get();

        return view('pessoa/gerenciar-pessoa',['result'=>$result]);
    }

    public function edit($id)
    {
        $result =DB::table('pessoa')->where('id',$id)->get();
        $resultGenero= $this->objGenero->all();
        $resultEntidade = DB::select("select id, nome_fantasia||' - '||cnpj nome  from entidade");

        return view('/pessoa/edit-pessoa',compact('result','resultGenero','resultEntidade'));
    }

    public function update(Request $request, $id)
    {
        DB::table('pessoa')
        ->where('id', $id)
        ->update([
            'nome' => $request->input('nome'),
            'identidade' => $request->input('identidade'),
            'cpf' => $request->input('cpf'),
            'email' =>$request->input('email'),
            'id_genero' => $request->input('genero'),
            'data_nascimento' => $request->input('dt_nascimento'),
            'id_entidade' => $request->input('entidade'),
            'celular' => $request->input('celular'),
            'cep' => str_replace('-','',$request->input('cep')),
            'uf' => $request->input('estado'),
            'localidade' => $request->input('cidade'),
            'bairro' => $request->input('bairro'),
            'logradouro' => $request->input('logradouro'),
            'numero' => $request->input('numero'),
            'complemento' => $request->input('complemento'),
            'ibge' => $request->input('ibge'),
            'gia' => $request->input('gia')
        ]);

        $result= $this->objPessoa->all();
        return view('/pessoa/gerenciar-pessoa',['result'=>$result]);
    }

    public function destroy($id)
    {
        $deleted = DB::delete('delete from pessoa where id =?' , [$id]);
        $result= $this->objPessoa->all();
        return view('/pessoa/gerenciar-pessoa',['result'=>$result]);
    }


}
