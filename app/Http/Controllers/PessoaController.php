<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ModelGenero;
use App\Models\ModelPessoa;
use App\Models\ModelEntidade;
use Illuminate\Support\Facades\Http;

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
        return view('/pessoa/pesquisar-pessoa',['result'=>$result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nome = $request->input('nome');
        $identidade = $request->input('identidade');
        $cpf = preg_replace("/[^0-9]/", "", $request->input('cpf'));
        $email = $request->input('email');
        $genero = $request->input('genero');
        $dt_nascimento = $request->input('dt_nascimento');
        $entidade = $request->input('entidade');
        $celular = preg_replace("/[^0-9]/", "", $request->input('celular'));
        $cep = str_replace('-','',$request->input('cep'));
        $estado = $request->input('estado');
        $cidade = $request->input('cidade');
        $bairro = $request->input('bairro');
        $logradouro = $request->input('logradouro');
        $numero = $request->input('numero');
        $complemento = $request->input('complemento');
        $ibge = $request->input('ibge');
        $gia = $request->input('gia');      
        
        DB::table('pessoa')->insert([            
            'nome' => $nome,
            'identidade' => $identidade,
            'cpf' => $cpf,
            'email' => $email,
            'id_genero' => $genero,
            'data_nascimento' => $dt_nascimento,
            'id_entidade' => $entidade,
            'celular' => $celular,
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

        $result= $this->objPessoa->all();
        return view('/pessoa/pesquisar-pessoa',['result'=>$result]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request )
    {
        $nome = $request->input('nome');
        $identidade = $request->input('identidade');
        $cpf = $request->input('cpf');
        
        $result =DB::table('pessoa')
                                    ->where('nome', 'like' ,'%'.$nome.'%')
                                    ->where('identidade', 'like' , '%'.$identidade.'%')
                                    ->where('cpf', 'like' , '%'.$cpf.'%')
                                    ->get();

        return view('/pessoa/pesquisar-pessoa',['result'=>$result]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result =DB::table('pessoa')->where('id',$id)->get();
        $resultGenero= $this->objGenero->all();

        $resultEntidade = DB::select("select id, nome_fantasia||' - '||cnpj nome  from entidade");

        return view('/pessoa/edit-pessoa',compact('result','resultGenero','resultEntidade'));
        //$result= $this->objPessoa->find($id);
        //return view('/usuario/edit-pessoa')->with(compact('result', 'result'));
        
        //return view('/usuario/edit-pessoa')->with('result',$result);
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
        $nome = $request->input('nome');
        $identidade = $request->input('identidade');
        $cpf = $request->input('cpf');
        $email = $request->input('email');
        $genero = $request->input('genero');
        $dt_nascimento = $request->input('dt_nascimento');
        $entidade = $request->input('entidade');
        $celular = $request->input('celular');
        $cep = str_replace('-','',$request->input('cep'));
        $estado = $request->input('estado');
        $cidade = $request->input('cidade');
        $bairro = $request->input('bairro');
        $logradouro = $request->input('logradouro');
        $numero = $request->input('numero');
        $complemento = $request->input('complemento');
        $ibge = $request->input('ibge');
        $gia = $request->input('gia');

        DB::table('pessoa')
        ->where('id', $id)
        ->update([
            'nome' => $nome,
            'identidade' => $identidade,
            'cpf' => $cpf,
            'email' => $email,
            'id_genero' => $genero,
            'data_nascimento' => $dt_nascimento,
            'id_entidade' => $entidade,
            'celular' => $celular,
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
            
        
        $result= $this->objPessoa->all();
        return view('/pessoa/pesquisar-pessoa',['result'=>$result]);
    }

 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = DB::delete('delete from pessoa where id =?' , [$id]);
        $result= $this->objPessoa->all();
        return view('/pessoa/pesquisar-pessoa',['result'=>$result]);
    }
}
