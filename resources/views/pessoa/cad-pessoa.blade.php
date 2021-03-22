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

                                    <h4 class="card-title">Cadastro de Pessoa</h4>
                                    <hr>
                                    <!-- <p class="card-title-desc">Here are examples of <code class="highlighter-rouge">.form-control</code> applied to each textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code class="highlighter-rouge">type</code>.</p>-->
                                    <form class="form-horizontal mt-4" method="POST" action="/cad-pessoa/inserir"> 
                                    @csrf
                                        <div class="form-group row">
                                            <label for="nome" class="col-sm-2 col-form-label">Nome*</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" required="required" type="text" id="nome" name="nome">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="identidade" class="col-sm-2 col-form-label">Identidade*</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" maxlength="11" required="required" type="text" value="" id="identidade" name="identidade">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="cpf" class="col-sm-2 col-form-label">Cpf*</label>
                                            <div class="col-sm-10">
                                                <input class="form-control mascara_cpf" required="required" placeholder="Ex.: 000.000.000-00" type="text" value="" id="cpf" name="cpf">
                                                <!-- <input type="text" class="form-control " placeholder="Ex.: 000.000.000-00"> -->
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email*</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="email" value="" id="emial" name="email">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="genero" class="col-sm-2 col-form-label">Genero*</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" required="required"  id="genero" name="genero">
                                                    <option value="">Selecione</option>
                                                    @foreach($result as $results)
                                                    <option value="{{$results->id}}">{{$results->nome}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="dt_nascimento" class="col-sm-2 col-form-label">Data Nascimento</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="date" value="" id="dt_nascimento" name="dt_nascimento">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="entidade" class="col-sm-2 col-form-label">Entidade</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" id="entidade" name="entidade">
                                                    <option value="">Selecione</option>
                                                    @foreach($resultEntidade as $resultEntidades)
                                                    <option value="{{$resultEntidades->id}}">{{$resultEntidades->nome}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="celular" class="col-sm-2 col-form-label">celular</label>
                                            <div class="col-sm-10">
                                                <input class="form-control mascara_celular" placeholder="Ex.: (99) 99999-9999" type="text" value="" id="celular" name="celular">
                                            </div>
                                        </div>

                                        <h4>Edereço</h4><hr class="mt-10">
                                        <div class="row mt-10">
                                            <div class="col-md-4">
                                                <label for="cep" class="form-label">Cep</label>
                                                <input type="text" class="form-control cep-mask" required="required" id="cep" name="cep" placeholder="Ex.:00000-000">
                                            </div>                                            
                                        </div>

                                        <div class="row">
                                             <div class="col-md-4">
                                                <label for="estado" class="form-label">Estado</label>
                                                <input type="text" class="form-control" id="estado" name="estado">
                                            </div>
                                             <div class="col-md-4">
                                                <label for="cidade" class="form-label">Cidade</label>
                                                <input type="text" class="form-control" id="cidade" name="cidade">
                                            </div>  
                                            <div class="col-md-4">
                                                <label for="bairro" class="form-label">Bairro</label>
                                                <input type="text" class="form-control" id="bairro" name="bairro">
                                            </div>                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="logradouro" class="form-label">Logradouro</label>
                                                <input type="text" class="form-control" id="logradouro" name="logradouro">
                                            </div>                                                                             
                                            <div class="col-md-4">
                                                <label for="numero" class="form-label">numero</label>
                                                <input type="text" class="form-control" id="numero" name="numero">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="complemento" class="form-label">complemento</label>
                                                <input type="text" class="form-control" id="complemento" name="complemento">
                                            </div>
                                            <input type="hidden"  id="ibge" name="ibge" value="">
                                            <input type="hidden"  id="gia" name="gia" value="">
                                        </div>

                                        

                                        <div class="col-12 mt-3" style="text-align: right;">
                                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                                            <button type="button" class="btn btn-primary">Limpar</button>
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

