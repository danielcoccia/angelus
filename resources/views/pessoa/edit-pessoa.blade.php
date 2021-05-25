@extends('layouts.master')

@section('title') Form Elements @endsection

@section('headerCss')
    <link href="{{ URL::asset('/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Cadastro de Pessoa</h4>
                    <hr>                                    
                    <form class="form-horizontal mt-4" method="POST" action="/pessoa-atualizar/{{$result[0]->id}}">
                     @method('PUT')
                     @csrf
                        <input type="hidden" name="id" value="{{$result[0]->id}}">
                        <div class="form-group row">
                            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="nome" name="nome" value="{{$result[0]->nome}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="identidade" class="col-sm-2 col-form-label">Identidade</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$result[0]->identidade}}" id="identidade" name="identidade">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cpf" class="col-sm-2 col-form-label">Cpf</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$result[0]->cpf}}" id="cpf" name="cpf">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" value="{{$result[0]->email}}" id="emial" name="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="genero" class="col-sm-2 col-form-label">Genero</label>
                            <div class="col-sm-10">
                                <select class="form-control select2"  id="genero" name="genero">                                                    
                                    @foreach($resultGenero as $resultGeneros)                                                    
                                        @if($result[0]->id_genero == $resultGeneros->id)
                                            <option value="{{$resultGeneros->id}}" selected="s">{{$resultGeneros->nome}}</option>                                                    
                                        @else
                                            <option value="{{$resultGeneros->id}}">{{$resultGeneros->nome}}</option>
                                        @endif
                                    @endforeach 
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dt_nascimento" class="col-sm-2 col-form-label">Data Nascimento</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" value="{{$result[0]->data_nascimento}}" id="dt_nascimento" name="dt_nascimento">
                            </div>
                        </div>
                                                
                        <div class="form-group row">
                            <label for="entidade" class="col-sm-2 col-form-label">Entidade</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" id="entidade" name="entidade">
                                    <option value="">Selecione</option>
                                    @foreach($resultEntidade as $resultEntidades)                                    
                                    @if($result[0]->id_entidade == $resultEntidades->id)                                    
                                        <option value="{{$resultEntidades->id}}" selected="s">{{$resultEntidades->nome}}</option>
                                    @else
                                        <option value="{{$resultEntidades->id}}">{{$resultEntidades->nome}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="celular" class="col-sm-2 col-form-label">celular</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$result[0]->celular}}" id="celular" name="celular">
                            </div>
                        </div>

                        <h4>Edereço</h4><hr class="mt-10">
                        <div class="row mt-10">
                            <div class="col-md-4">
                                <label for="cep" class="form-label">Cep</label>
                                <input type="text" class="form-control cep-mask" value="{{$result[0]->cep}}"  id="cep" name="cep">                                            

                            </div>                                            
                        </div>

                        <div class="row">
                             <div class="col-md-4">
                                <label for="estado" class="form-label">Estado</label>
                                <input type="text" class="form-control" id="estado" value="{{$result[0]->uf}}" name="estado">
                            </div>
                             <div class="col-md-4">
                                <label for="cidade" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="cidade" value="{{$result[0]->localidade}}" name="cidade">
                            </div>  
                            <div class="col-md-4">
                                <label for="bairro" class="form-label">Bairro</label>
                                <input type="text" class="form-control" id="bairro" value="{{$result[0]->bairro}}" name="bairro" >
                            </div>                                        
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="logradouro" class="form-label">Logradouro</label>
                                <input type="text" class="form-control" id="logradouro" value="{{$result[0]->logradouro}}" name="logradouro">
                            </div>                                                                             
                            <div class="col-md-4">
                                <label for="numero" class="form-label">numero</label>
                                <input type="text" class="form-control" id="numero" value="{{$result[0]->numero}}" name="numero">
                            </div>
                            <div class="col-md-4">
                                <label for="complemento" class="form-label">complemento</label>
                                <input type="text" class="form-control" id="complemento" value="{{$result[0]->complemento}}"name="complemento">
                            </div>
                            <input type="hidden"  id="ibge" name="ibge" value="{{$result[0]->ibge}}">
                            <input type="hidden"  id="gia" name="gia" value="{{$result[0]->gia}}">
                        </div>

                        <div class="col-12 mt-3" style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                            <button type="button" class="btn btn-primary">Limpar</button>
                        </div>
                    </form>           
            </div>
        </div>
    </div>
@endsection

@section('footerScript')
            <script src="{{ URL::asset('/js/pages/busca-cep.init.js')}}"></script>            
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
            <script src="{{ URL::asset('/libs/select2/select2.min.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/form-advanced.init.js')}}"></script>
@endsection

