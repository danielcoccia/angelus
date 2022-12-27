@extends('layouts.master')

@section('title') Incluir item no catálogo @endsection

@section('headerCss')
    <link href="{{ URL::asset('/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="color: rgb(255, 0, 0)">Cadastro de Item</h4>
                    <hr>
                    <!-- <p class="card-title-desc">Here are examples of <code class="highlighter-rouge">.form-control</code> applied to each textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code class="highlighter-rouge">type</code>.</p>-->
                    <form class="form-horizontal mt-4" method="POST" action="/cad-item-material/inserir">
                    @csrf
                        <div class="form-group row">
                            <label for="nome_item" class="col-sm-2 col-form-label">Nome Item*</label>
                            <div class="col-sm-10">
                                <input class="form-control" required="required" type="text" id="nome_item" name="nome_item">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categoria_item" class="col-sm-2 col-form-label">Categoria*</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" id="categoria_item" name="categoria_item" required="required">
                                    <option value="">Selecione</option>
                                    @foreach($resultCategoria as $resultCategorias)
                                    <option value="{{$resultCategorias->id}}">{{$resultCategorias->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="val_minimo" class="col-sm-2 col-form-label">Valor Minimo*</label>
                            <div class="col">
                                <input class="form-control" value="0.00" type="numeric" id="val_minimo" name="val_minimo" required="required" onchange="this.value = this.value.replace(/,/g, '.')">
                            </div>
                                <label for="val_medio" class="col-sm-2 col-form-label">Valor Médio*</label>
                            <div class="col">
                                <input class="form-control"  value="0.00" type="numeric" id="val_medio" name="val_medio" required="required" onchange="this.value = this.value.replace(/,/g, '.')">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="val_maximo" class="col-sm-2 col-form-label">Valor Máximo*</label>
                            <div class="col">
                                <input class="form-control"  type="numeric" value="0.00" id="val_maximo" name="val_maximo" required="required" onchange="this.value = this.value.replace(/,/g, '.')">
                            </div>
                            <label for="val_marca" class="col-sm-2 col-form-label">Valor Marca*</label>
                            <div class="col">
                                <input class="form-control"  type="numeric" value="0.00" id="val_marca" name="val_marca" required="required" onchange="this.value = this.value.replace(/,/g, '.')">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="val_etiqueta" class="col-sm-2 col-form-label">Valor Etiqueta*</label>
                            <div class="col">
                                <input class="form-control"  type="numeric" value="0.00" id="val_etiqueta" name="val_etiqueta" required="required" onchange="this.value = this.value.replace(/,/g, '.')">
                            </div>
                            <label for="composicao" class="col-sm-2 col-form-label">Item Composição</label>
                            <div class="col">
                                <input  type="checkbox"  id="composicao" name="composicao">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ativo" class="col-sm-2 col-form-label">Ativo</label>
                            <div class="col-sm-10">
                                <input  type="checkbox" id="ativo" name="ativo" checked="checked">
                            </div>
                        </div>

                        <div class="col-12 mt-3" style="text-align: right;">
                            <button type="submit" class="btn btn-success">Confirmar</button>
                            <button type="button" class="btn btn-danger">Limpar</button>
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

