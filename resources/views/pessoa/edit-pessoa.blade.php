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

                    <h4 class="card-title" style="color: rgb(255, 0, 0);">Cadastro de Pessoa</h4>
                    <hr>
                    <form class="form-horizontal mt-4" method="POST" action="/pessoa-atualizar/{{$result[0]->id}}">
                     @method('PUT')
                     @csrf
                        <input type="hidden" name="id" value="{{$result[0]->id}}">
                        <div class="form-group row">

                            <div class="col">Nome
                                <input class="form-control" type="text" id="nome" name="nome" value="{{$result[0]->nome}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2">Identidade
                                <input class="form-control" type="text" value="{{$result[0]->identidade}}" id="identidade" name="identidade">
                            </div>
                            <div class="col-2">CPF
                                <input class="form-control" type="text" placeholder="Ex.: 000.000.000-00" value="{{$result[0]->cpf}}" id="cpf" name="cpf">
                            </div>
                            <div class="col-2">Data nascimento
                                <input class="form-control" type="date" value="{{$result[0]->data_nascimento}}" id="dt_nascimento" name="dt_nascimento">
                            </div>
                            <div class="col-2">Gênero
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
                            <div class="col">Celular
                                <input class="form-control" type="text" value="{{$result[0]->celular}}" id="celular" name="celular">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">Email
                                <input class="form-control" type="email" value="{{$result[0]->email}}" id="emial" name="email">
                            </div>
                            <div class="col">Entidade
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
                        <h4 class="card-title" style="color: rgb(255, 0, 0);">Endereço</h4><hr>
                        <div class="row mt-10">
                            <div class="col-md-4">
                                <label for="cep" class="form-label">Cep</label>
                                <input type="text" class="form-control cep-mask" value="{{$result[0]->cep}}"  id="cep" name="cep">

                            </div>
                        </div>

                        <div class="row">
                             <div class="col-md-4">Estado

                                <input type="text" class="form-control" id="estado" value="{{$result[0]->uf}}" name="estado">
                            </div>
                             <div class="col-md-4">Cidade

                                <input type="text" class="form-control" id="cidade" value="{{$result[0]->localidade}}" name="cidade">
                            </div>
                            <div class="col-md-4">Bairro

                                <input type="text" class="form-control" id="bairro" value="{{$result[0]->bairro}}" name="bairro" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Logradouro

                                <input type="text" class="form-control" id="logradouro" value="{{$result[0]->logradouro}}" name="logradouro">
                            </div>
                            <div class="col-md-4">Número

                                <input type="text" class="form-control" id="numero" value="{{$result[0]->numero}}" name="numero">
                            </div>
                            <div class="col-md-4">Complemento

                                <input type="text" class="form-control" id="complemento" value="{{$result[0]->complemento}}"name="complemento">
                            </div>
                            <input type="hidden"  id="ibge" name="ibge" value="{{$result[0]->ibge}}">
                            <input type="hidden"  id="gia" name="gia" value="{{$result[0]->gia}}">
                        </div>

                        <div class="col-12 mt-3" style="text-align: right;">
                            <button type="submit" class="btn btn-success">Atualizar</button>
                            <a href="/gerenciar-pessoa">
                                <input class="btn btn-danger" type="button" value="Cancelar">
                            </a>
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

