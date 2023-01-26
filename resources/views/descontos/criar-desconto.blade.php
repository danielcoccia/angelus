@extends('layouts.master')

@section('title') Incluir Desconto @endsection

@section('headerCss')
    <link href="{{ URL::asset('/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="color: rgb(255, 0, 0)">Cadastro de Desconto</h4>
                    <hr>
                    <!-- <p class="card-title-desc">Here are examples of <code class="highlighter-rouge">.form-control</code> applied to each textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code class="highlighter-rouge">type</code>.</p>-->
                    <form class="form-horizontal mt-4" method="POST" action="/incluir-desconto">
                    @csrf

                        <div class="form-group row">
                           <div class="col">Categoria
                                <select class="form-control select2" id="" name="cat_item" required="required">
                                    <option value="">Selecione</option>
                                    @foreach($categoria as $categorias)
                                    <option value="{{$categorias->id}}">{{$categorias->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">Porcentagem
                                <select class="form-control select2" type="numeric" id="porcentagem" name="porcentagem">
                                @foreach ($percent as $percents)
                                    <option value="{{$percents}}">{{$percents}} Por cento</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-3">Data Cadastro - De

                                <input type="date" name='data_inicio' value="">
                            </div>

                            <div class="col-3">Data Cadastro - Até

                                <input type="date" name='data_fim' value="">
                            </div>

                        </div>
                        <div class="form-group row">

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ativo" id="" value="" >
                                <label class="form-check-label" for="">Ativo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inativo" id="" value="" checked>
                                <label class="form-check-label" for="">Inativo</label>
                            </div>
                            <div class="col-4">Usuário
                                <input class="form-control" value="{{session()->get('usuario.id_usuario')}}" name="id_usuario" id="id_usuario" type="hidden">
                                <input class="form-control" value="{{session()->get('usuario.nome')}}" name="nome_usuario" id="nome_usuario" type="text" placeholder="Vendedor" readonly>
                            </div>
                            <div class="col-4">Data registro
                                <input class="form-control" name="data_registro" id="" type="text"
                                value="{{ \Carbon\carbon::now()->toDateTimeString() . PHP_EOL}}">
                            </div>
                        </div>
                        <div class="col-12 mt-3" style="text-align: right;">
                            <a href="/criar-desconto">
                                    <input class="btn btn-danger" type="button" value="Limpar">
                            </a>

                            <button type="submit" class="btn btn-success">Confirmar</button>
                        </div>
                    </form>
                </div>
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

            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="jquery.bsAlerts.js"></script>

@endsection

