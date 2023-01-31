@extends('layouts.master')

@section('title') Cadastrar entidade @endsection

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

                                    <h4 class="card-title" style="color: rgb(255, 0, 0);">Cadastro de Entidade</h4>
                                    <hr>
                                    <!-- <p class="card-title-desc">Here are examples of <code class="highlighter-rouge">.form-control</code> applied to each textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code class="highlighter-rouge">type</code>.</p>-->
                                    <form class="form-horizontal mt-4" method="POST" action="/cad-entidade/inserir">
                                    @csrf
                                        <div class="form-group row">
                                            <div class="col-4">CNPJ
                                                <input class="form-control mascara_cnpj" type="text" id="cnpj" name="cnpj" required="required" placeholder="Ex.: 00.000.000/0000-00">
                                            </div>
                                            <div class="col-8">Nome Fantasia
                                                <input class="form-control" type="text" value="" id="nome_fantasia" name="nome_fantasia" required="required">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-8">Razão Social
                                                <input class="form-control" type="text" value="" id="rz_social" name="rz_social" required="required">
                                            </div>
                                            <div class="col-4">Inscrição Estadual
                                                <input class="form-control" type="text" value="" id="insc_estadual" name="insc_estadual">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col">Email
                                                <input class="form-control" type="email" value="" id="email_entidaede" name="email_entidaede">
                                            </div>
                                            <div class="col-7">Nome Contato
                                                <input class="form-control" type="text" value="" id="nome_contato" name="nome_contato">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-4">Telefone Contato
                                                <input class="form-control mascara_celular" type="text" value="" id="telefone_contato" name="telefone_contato" placeholder="Ex.: 61 99999-9999">
                                            </div>
                                            <div class="col-8">Site
                                                <input class="form-control" type="text" value="" id="site" name="site">
                                            </div>
                                        </div>

                                        <h4 class="card-title" style="color: rgb(255, 0, 0);">Endereço</h4><hr>
                                        <div class="row">
                                            <div class="col-2">CEP
                                                <input type="text" class="form-control cep-mask"  id="cep" name="cep" required="required" placeholder="Ex.:00000-000">
                                            </div>
                                             <div class="col-1">Estado
                                                <input type="text" class="form-control" id="estado" name="estado">
                                            </div>
                                             <div class="col">Cidade
                                                <input type="text" class="form-control" id="cidade" name="cidade">
                                            </div>
                                            <div class="col">Bairro
                                                <input type="text" class="form-control" id="bairro" name="bairro">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">Logradouro
                                                <input type="text" class="form-control" id="logradouro" name="logradouro">
                                            </div>
                                            <div class="col-2">Numero
                                                <input type="text" class="form-control" id="numero" name="numero">
                                            </div>
                                            <div class="col">Complemento
                                                <input type="text" class="form-control" id="complemento" name="complemento">
                                            </div>
                                            <input type="hidden"  id="ibge" name="ibge" value="">
                                            <input type="hidden"  id="gia" name="gia" value="">
                                        </div>



                                        <div class="col-12 mt-3" style="text-align: right;">
                                            <button type="submit" class="btn btn-success">Confirmar</button>
                                            <a href="/cad-entidade">
                                                <input class="btn btn-danger" type="button" value="Limpar">
                                            </a>
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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
            <script src="{{ URL::asset('/js/pages/busca-cep.init.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
@endsection

