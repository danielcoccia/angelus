@extends('layouts.master')

@section('title') Form Elements @endsection

@section('content')

{{$result}}

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
                                        <input type="hidden" name="id" value="">
                                        <div class="form-group row">
                                            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="nome" name="nome" value="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="identidade" class="col-sm-2 col-form-label">Identidade</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="" id="identidade" name="identidade">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="cpf" class="col-sm-2 col-form-label">Cpf</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="" id="cpf" name="cpf">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="email" value="" id="emial" name="email">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="genero" class="col-sm-2 col-form-label">Genero</label>
                                            <div class="col-sm-10">
                                                <select class="form-control"  id="genero" name="genero">
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
                                                <input class="form-control" type="text" value="" id="entidade" name="entidade">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="celular" class="col-sm-2 col-form-label">celular</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="" id="celular" name="celular">
                                            </div>
                                        </div>

                                        <h4>Edereço</h4><hr class="mt-10">
                                        <div class="row mt-10">
                                            <div class="col-md-4">
                                                <label for="cep" class="form-label">Cep</label>
                                                <input type="text" class="form-control cep-mask"  id="cep" name="cep">                                            

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
            <script src="{{ URL::asset('/js/pages/busca-cep.init.js')}}"></script>            
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
@endsection

