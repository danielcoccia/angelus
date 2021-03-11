@extends('layouts.master')

@section('title') Form Elements @endsection

@section('headerCss')
    <link href="{{ URL::asset('/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<!-- start page title -->
                    <div class="row">
<!--                 @component('common-components.breadcrumb')
                     @slot('title') Cadastro de Usuario  @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') Forms  @endslot
                     @slot('li3') Form Elements @endslot
                @endcomponent -->
                
                   
                    </div>
                    <!-- end page title -->                    

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Altera Item</h4>
                                    <hr>
                                    <!-- <p class="card-title-desc">Here are examples of <code class="highlighter-rouge">.form-control</code> applied to each textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code class="highlighter-rouge">type</code>.</p>-->
                                    <form class="form-horizontal mt-4" method="POST" action="/item-catalogo-atualizar/{{$result[0]->id}}"> 
                                    @method('PUT')
                                    @csrf
                                        <div class="form-group row">
                                            <label for="nome_item" class="col-sm-2 col-form-label">Nome Item*</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="nome_item" name="nome_item" required="required" value="{{$result[0]->nome}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="categoria_item" class="col-sm-2 col-form-label">Categoria*</label>
                                            <div class="col-sm-10">
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
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="val_minimo" name="val_minimo" required="required" value="{{$result[0]->valor_minimo}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="val_medio" class="col-sm-2 col-form-label">Valor Médio*</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="val_medio" name="val_medio" required="required" value="{{$result[0]->valor_medio}}">                                                
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="val_maximo" class="col-sm-2 col-form-label">Valor Máximo*</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="val_maximo" name="val_maximo" required="required" value="{{$result[0]->valor_maximo}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="composicao" class="col-sm-2 col-form-label" >Item Composição</label>
                                            <div class="col-sm-10">
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
                                            <button type="submit" class="btn btn-primary">Alterar</button>                                            
                                        </div>
                                    </form>           
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
@endsection

@section('footerScript')
            <script src="{{ URL::asset('/js/pages/mascaras.init.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/busca-cep.init.js')}}"></script>            
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
            <script src="{{ URL::asset('/libs/select2/select2.min.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/form-advanced.init.js')}}"></script>
@endsection

