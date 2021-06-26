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
                    <h4 class="card-title" class="card-title" style="text-align: center; background: #088CFF; color: white;">Registrar Vendas</h4>
                    <hr>
                    <!-- <p class="card-title-desc">Here are examples of <code class="highlighter-rouge">.form-control</code> applied to each textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code class="highlighter-rouge">type</code>.</p>-->
                    <form class="form-horizontal mt-4" method="POST" action="/cad-venda/inserir">
                    <div class="container"> 
                        <div class="row align-items-center">
                            <div class="col-sm">
                                <a href="/selecionar-pessoa">
                                <input class="btn btn-warning" type="button" value="Selecionar Pessoa">
                                </a>
                            </div>
                            <div class="col-sm">
                                <a href="/cad-pessoa">
                                <input class="btn btn-primary" type="button" value="Cadastrar Pessoa">
                                </a>
                            </div>
                            <div class="col-sm">                                      
                                <input class="form-control" type="text" placeholder="Vendedor:">               
                            </div>
                    </div>
                    <br>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-sm">                                      
                                <input class="form-control" type="text" placeholder="ID Venda" readonly>       
                            </div>
                            <div class="col-sm">                                      
                                <input class="form-control" type="text" placeholder="Data Venda" readonly>     
                            </div>
                            <div class="col-sm">                                      
                                <input class="form-control" type="text" placeholder="CPF" readonly>          
                            </div>
                                <div class="col-sm">                                      
                                <input class="form-control" type="text" placeholder="Nome Cliente" readonly>  
                            </div>
                            <div class="col-12 mt-3" style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                            <button type="button" class="btn btn-primary">Limpar</button>
                        </div>
                    </div>
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
@endsection
