@extends('layouts.master')

@section('title') Editar entidade @endsection

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

                                    <h4 class="card-title">Cadastro de Entidade</h4>
                                    <hr>
                                    <!-- <p class="card-title-desc">Here are examples of <code class="highlighter-rouge">.form-control</code> applied to each textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code class="highlighter-rouge">type</code>.</p>-->
                                    <form class="form-horizontal mt-4" method="POST" action="/entidade-atualizar/{{$result[0]->id}}">
                                    @method('PUT')
                                    @csrf
                                        <div class="form-group row">
                                            <label for="cnpj" class="col-sm-2 col-form-label">cnpj</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="{{$result[0]->cnpj}}" id="cnpj" name="cnpj">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="nome_fantasia" class="col-sm-2 col-form-label">Nome Fantasia</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="{{$result[0]->nome_fantasia}}" id="nome_fantasia" name="nome_fantasia">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="rz_social" class="col-sm-2 col-form-label">Razao Social </label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="{{$result[0]->razao_social}}" id="rz_social" name="rz_social">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="insc_estadual" class="col-sm-2 col-form-label">Inscricao Estadual</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="{{$result[0]->inscricao_estadual}}" id="insc_estadual" name="insc_estadual">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email_entidaede" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="email" value="{{$result[0]->email_contato}}" id="email_entidaede" name="email_entidaede">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="nome_contato" class="col-sm-2 col-form-label">Nome Contato</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="{{$result[0]->nome_contato}}" id="nome_contato" name="nome_contato">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="telefone_contato" class="col-sm-2 col-form-label">Telefone Contato</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="" id="telefone_contato" name="telefone_contato">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="site" class="col-sm-2 col-form-label">Site</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="{{$result[0]->site}}" id="site" name="site">
                                            </div>
                                        </div>

                                        <h4>Edereço</h4><hr class="mt-10">
                                        <div class="row mt-10">
                                            <div class="col-md-4">
                                                <label for="cep" class="form-label">Cep</label>
                                                <input type="text" class="form-control cep-mask" value="{{$result[0]->cep}}"  id="cep" name="cep">

                                            </div>
                                        </div>

                                        <div class="row">
                                             <div class="col-md-4">
                                                <label for="estado" class="form-label">Estado</label>
                                                <input type="text" class="form-control" value="{{$result[0]->uf}}" id="estado" name="estado">
                                            </div>
                                             <div class="col-md-4">
                                                <label for="cidade" class="form-label">Cidade</label>
                                                <input type="text" class="form-control" id="cidade" value="{{$result[0]->localidade}}" name="cidade">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="bairro" class="form-label">Bairro</label>
                                                <input type="text" class="form-control" id="bairro" value="{{$result[0]->bairro}}" name="bairro">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="logradouro" class="form-label">Logradouro</label>
                                                <input type="text" class="form-control" id="logradouro" value="{{$result[0]->logradouro}}" name="logradouro">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="numero" class="form-label">numero</label>
                                                <input type="text" class="form-control" id="numero" value="{{$result[0]->numero}}" name="numero">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="complemento" class="form-label">complemento</label>
                                                <input type="text" class="form-control" id="complemento" value="{{$result[0]->complemento}}" name="complemento">
                                            </div>
                                            <input type="hidden"  id="ibge" name="ibge" value="{{$result[0]->ibge}}">
                                            <input type="hidden"  id="gia" name="gia" value="{{$result[0]->gia}}">
                                        </div>



                                        <div class="col-12 mt-3" style="text-align: right;">
                                            <button type="submit" class="btn btn-primary">Atualizar</button>
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

