@extends('layouts.master')

@section('title') Editar Cadastro inicial @endsection

@section('headerCss')
    <link href="{{ URL::asset('/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:blue">ALTERAR CADASTRO INICIAL</h4>
                <div class="form-group row">

                    <div class="col-2">Código:
                    <input class="form-control text-center" type="text" id="" name="id_item" required="required" value="{{number_format($itemmat[0]->id,' 0','','')}}" placeholder="ID"readonly style="background:#f3f3f3; color:rgb(0, 0, 0);font-weight:bold;">
                    </div>

                    <div class="col-6">Nome:
                    <input class="form-control text-center" type="text" id="" name="nome" required="required" value="{{($itemmat[0]->nome)}}" placeholder="ID"readonly style="background:#f3f3f3; color:rgb(0, 0, 0);font-weight:bold;">
                    </div>

                    <div class="col-2">Data cadastro:
                    <input class="form-control text-center" type="text" id="" name="data_cadastro" required="required" value="{{date( 'd/m/Y' , strtotime($itemmat[0]->data_cadastro))}}" placeholder="nome" readonly style="background:#f3f3f3; color:rgb(0, 0, 0);font-weight:bold;">
                    </div>

                    <div class="col-2">Valor venda:
                        <input class="form-control text-center" type="text" id="" name="valor_venda" required="required" value="{{number_format($itemmat[0]->valor_venda,' 2',',','')}}" placeholder="ID"readonly style="background:#f3f3f3; color:rgb(0, 0, 0);font-weight:bold;">
                        </div>

                </div>
            </div>
        </div>

    <div class="col-12">
        <form class="form-horizontal mt-4" method="POST" action="/gerenciar-cadastro-inicial/alterar/{{$itemmat[0]->id}}">
        @method('PUT')
        <div class="card">
            <div class="card-body">
                @csrf
                <div class="row align-items-end" style="background:#fff;">
                    {{--<div class="col-4">
                        <div class="form-group row">
                            <label for="nome_item" class="col-sm-5 content-md-center col-form-label">Categoria:</label>
                            <div class="col-12">
                                <select class="form-control select2" id="" name="categoria" required="required">
                                    @foreach($result as $results)
                                    <option value="{{$results->id_cat}}">{{$results->n5}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>--}}
                    <div class="col">
                        <div class="form-group row">
                            <label for="nome_item" class="col-sm-5 content-md-center col-form-label">Nome Material:</label>
                            <div class="col-12">
                                <select class="form-control select2" id="" name="item_mat" default-value="teste"  required="required">
                                    <option value=>{{($itemmat[0]->nome)}}</option>
                                    @foreach($nomeitem as $nomeitems)
                                    <option value="{{$nomeitems->id_nome}}">{{$nomeitems->n1}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-end" style="background:#fff;">
                    <div class="col-2">
                        <div class="form-group row">
                            <div class="col">Valor da venda:
                            <input class="form-control" type="numeric" id="" name="valor" required="requiered" value="{{number_format($itemmat[0]->valor_venda,'2','.','')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group row">
                            <div class="col">Tamanho:
                                <select class="form-control" id="" name="tamanho" >
                                    <option value="">Selecione</option>
                                    @foreach($result as $results)
                                    <option value="{{$results->id_tam}}">{{$results->n3}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group row">
                            <div class="col">Marca:
                                <select class="form-control" id="" name="marca" >
                                    <option value="">Selecione</option>
                                    @foreach($result as $results)
                                    <option value="{{$results->id_marca}}">{{$results->n2}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <div class="col">Cor:
                                <select class="form-control" id="" name="cor" >
                                    <option value="">Selecione</option>
                                    @foreach($result as $results)
                                    <option value="{{$results->id_cor}}">{{$results->n4}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <div class="col">Tipo material:
                                <select class="form-control" id="" name="tp_mat" >
                                    <option value="">Selecione</option>
                                    @foreach($tipo as $tipos)
                                    <option value="{{$tipos->id}}">{{$tipos->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-end" style="background:#fff;">
                    <div class="col">
                        <div class="form-group row">
                            <div class="col">Genero:
                                <select class="form-control" id="" name="genero" >
                                    <option value="">Selecione</option>
                                   @foreach($genero as $generos)
                                    <option value="{{$generos->id}}">{{$generos->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <div class="col">Fase etária:
                                <select class="form-control" id="" name="etaria" >
                                    <option value="">Selecione</option>
                                   @foreach($etaria as $etarias)
                                    <option value="{{$etarias->id}}">{{$etarias->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <div class="col">Data validade:
                            <input class="form-control" type="date" id="" name="dt_validade" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">Comprado?
                            <div class="col">
                                <input type="checkbox" id="checkAdq" name="checkAdq" switch="bool"/>
                                <label for="checkAdq" data-off-label="Não" data-on-label="Sim" ></label>
                            </div>
                         </div>
                    </div>
                </div>
                <div class="row" style="background:#fff;">
                    <div class="col">
                            <a href="/gerenciar-cadastro-inicial"><input class="btn btn-danger btn-md btn-block" style="font-weight:bold; margin-left: 15px;" type="button" value="Cancelar"></a>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <input class="btn btn-info btn-md btn-block" style="font-weight:bold; margin-left: 15px;" type="submit" value="Confirmar">
                        </div>
                    </div>
                </div>
            </div>
        </div></form>
    </div>

@endsection

@section('footerScript')
            <script src="{{ URL::asset('/js/pages/mascaras.init.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/busca-cep.init.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
            <script src="{{ URL::asset('/libs/select2/select2.min.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/form-advanced.init.js')}}"></script>
@endsection

