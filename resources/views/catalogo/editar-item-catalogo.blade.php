@extends('layouts.master')

@section('title') Editar item @endsection

@section('headerCss')
    <link href="{{ URL::asset('/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title" style="color:rgb(255, 5, 5);">Altera Item</h4>
                    <hr>
                    <form class="form-horizontal mt-4" method="POST" action="/item-catalogo-atualizar/{{$result[0]->id}}">
                    @method('PUT')
                    @csrf
                        <div class="form-group row">
                            <div class="col">Nome Item*
                                <input class="form-control" type="text" id="nome_item" name="nome_item" required="required" value="{{$result[0]->nome}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">Categoria*
                                <select class="form-control select2" id="categoria_item" name="categoria_item" required="required">
                                    <option value="">Selecione</option>
                                    @foreach($resultCategoria as $resultCategorias)
                                        @if($result[0]->id_categoria_material  == $resultCategorias->id)
                                            <option value="{{$resultCategorias->id}}" selected="selected">{{$resultCategorias->nome}}</option>
                                        @else
                                            <option value="{{$resultCategorias->id}}">{{$resultCategorias->nome}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="val_minimo" class="col-sm-2 col-form-label">Valor Minimo*</label>
                            <div class="col">
                                <input class="form-control" type="text" id="val_minimo" name="val_minimo" required="required" value="{{$result[0]->valor_minimo}}">
                            </div>
                            <label for="val_medio" class="col-sm-2 col-form-label">Valor Médio*</label>
                            <div class="col">
                                <input class="form-control" type="text" id="val_medio" name="val_medio" required="required" value="{{$result[0]->valor_medio}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="val_maximo" class="col-sm-2 col-form-label">Valor Máximo*</label>
                            <div class="col">
                                <input class="form-control" type="text" id="val_maximo" name="val_maximo" required="required" value="{{$result[0]->valor_maximo}}">
                            </div>
                            <label for="val_marca" class="col-sm-2 col-form-label">Valor Marca*</label>
                            <div class="col">
                                <input class="form-control" type="text" id="val_marca" name="val_marca" required="required" value="{{$result[0]->valor_marca}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="val_etiqueta" class="col-sm-2 col-form-label">Valor Etiqueta*</label>
                            <div class="col">
                                <input class="form-control" type="text" id="val_eitqueta" name="val_etiqueta" required="required" value="{{$result[0]->valor_etiqueta}}">
                            </div>
                            <label for="composicao" class="col-sm-2 col-form-label" >Item Composição</label>
                            <div class="col">
                                <input  type="checkbox"  id="composicao" name="composicao" {{ $result[0]->composicao ? 'checked' : '' }}>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ativo" class="col-sm-2 col-form-label">Ativo</label>
                            <div class="col-sm-10">
                                <input  type="checkbox" id="ativo" name="ativo" {{$result[0]->ativo ? 'checked' : '' }}>
                            </div>
                        </div>
                        <div class="col-12 mt-3" style="text-align: right;">
                        <a href="/gerenciar-item-catalogo"><input class="btn btn-danger btn-md" style="font-weight:bold; margin-left: 15px;" type="button" value="Cancelar"></a>

                            <input class="btn btn-success" type="submit" value="Alterar">
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection

@section('footerScript')
            <script src="{{ URL::asset('/js/pages/mascaras.init.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/busca-cep.init.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
            <script src="{{ URL::asset('/libs/select2/select2.min.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/form-advanced.init.js')}}"></script>
@endsection

