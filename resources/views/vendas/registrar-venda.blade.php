@extends('layouts.master')

@section('title') Registrar venda @endsection

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
                                <form class="form-horizontal mt-4" method="POST" action="route{{('/registrar-venda')}}">
                                @csrf
                                    <div class="container">
                                        <div id="divVenda"></div>
                                        <div class="row align-items-center">
                                            <div class="col-sm">
                                                <label for="id_venda">ID Venda</label>
                                                <input class="form-control" type="text" name="id_venda" id="id_venda" value="" placeholder="ID Venda" readonly>
                                            </div>
                                            <div class="col-sm">
                                            <label for="data_venda">Data</label>
                                                <input class="form-control" value="{{ \Carbon\carbon::now()->toDateTimeString() . PHP_EOL}}" type="text" name="data_venda" id="data_venda" placeholder="Data Venda" readonly>
                                            </div>
                                            <div class="col-sm">
                                                <label for="nome_usuário">Usuário</label>
                                                <input class="form-control" value="{{session()->get('usuario.id_usuario')}}" name="id_usuario" id="id_usuario" type="hidden" >
                                                <input class="form-control" value="{{session()->get('usuario.nome')}}" name="nome_usuario" id="nome_usuario" type="text" placeholder="Vendedor" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                    <br>

                                <form class="form-horizontal mt-4" method="POST" action="route{{('/registrar-venda')}}">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-5">

                                        <select  class="form-control select2" id="cpf" name="cpf" required="required">
                                            <option value="">CPF</option>
                                            @Foreach($resultPessoa as $resultPessoas)
                                            <option value="{{$resultPessoas->id}}">{{$resultPessoas->cpf}}</option>
                                            @endForeach
                                            </select>
                                        </div>
                                </form>
                                        <a href="/cad-pessoa">
                                        <input class="btn btn-primary" type="button" value="Cadastrar Pessoa">
                                        </a>
                                    </div>
                                </div>

                            <hr>
                            <div id="divAddItem" style="display: none;">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <button id="btnbuscaitem" type="button" class="btn btn-dark">Buscar item catálogo</button>

                                            <button id="btncodigobarra" type="button" class="btn btn-info">Buscar item Cód barras</button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="container" id="divVendaItens">
                                    <div class="row">
                                        <div class="col col-lg-4" id="DivConfirmaItem">
                                            <!--
                                            <input class="form-control" type="text" placeholder="ID" readonly>
                                            <input class="form-control" type="text" placeholder="Nome item" readonly>
                                            <input class="form-control" type="text" placeholder="Categoria" readonly>
                                            <input class="form-control" type="text" placeholder="Marca" readonly>
                                            <input class="form-control" type="text" placeholder="Tamanho" readonly>
                                            <input class="form-control" type="text" placeholder="Cor" readonly>
                                            <input class="form-control" type="text" placeholder="Tipo de material" readonly>
                                            <input class="form-control" type="text" placeholder="Fase etária" readonly>
                                            <input class="form-control" type="text" placeholder="Gênero" readonly>
                                            <input class="form-control" type="text" placeholder="Tipo de embalagem" readonly>
                                            <input class="form-control" type="text" placeholder="Qtd embalagem" readonly>
                                            <input class="form-control" type="text" placeholder="Unidade de medida" readonly>
                                            <input class="form-control" type="text" placeholder="Valor da venda" readonly>
                                            -->
                                        </div>
                                        <div class="col">
                                            <button type="button" id="btnAddLista" class="btn btn-outline-warning">Incluir na lista de compras</button>
                                            <div id="divListaCompras" class="col">

                                                        <table class="table table-bordered" style="display: none;">
                                                            <thead class="thead-light">
                                                                <tr style="background-color: #FFFFE0">
                                                                <td >Qtd</td>
                                                                <td >Valor unit.</td>
                                                                <td >Valor total</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <input class="form-control" value="1" type="text" name="qtd_item" id="qtd_item" placeholder="Qtd" readonly>
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="" type="text" name="vlr_unit" id="vlr_unit" placeholder="Vlr. Unit." readonly>
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="" type="text" name="vlr_total" id="vlr_total" placeholder="Vlr. Total" readonly>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table class="table-sm col-12 table-bordered" style= "text-align:center;">
                                                            <thead class="thead-light">
                                                            <br>
                                                            <h6 style="color: blue;">LISTA DE COMPRAS</h6>
                                                                <tr style="background: #f3f3f3;">
                                                                    <th scope="col" class="col-2">ID</th>
                                                                    <th scope="col">PRODUTO</th>
                                                                    <!-- <th scope="col">Desconto</th> -->
                                                                    <th scope="col" class="col-1">QTD</th>
                                                                    <th scope="col" class="col-2">VALOR</th>
                                                                    <th scope="col" class="col-1">AÇÕES</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {{--<tr>@foreach
                                                                    <td scope="row">{{}}</td>
                                                                    <td>{{}}</td>
                                                                    <!-- <td>{{}}</td> -->
                                                                    <td>{{}}</td>
                                                                    <td>{{}}</td>
                                                                    <td>
                                                                        <a href="#" class="btn btn-danger btn-custom">
                                                                        <i class="far fa-trash-alt"></i>
                                                                        </a>
                                                                    </td>
                                                                    @endforeach
                                                                </tr> --}}
                                                            </tbody>
                                                            <tfooter>
                                                                <td colspan="2">TOTAL:</td>
                                                                <td>&nbsp;</td>
                                                                <td>R$0.00</td>
                                                                <td>&nbsp;</td>
                                                            </tfooter>

                                                        </table>

                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="container" id="divVendaBotoes">
                                    <div class="row">
                                        <div class="col-12 mt-3" style="text-align: right;">
                                            <button id="btnCancVenda" type="button" class="btn btn-danger">Cancelar venda</button>
                                            <!-- <button type="submit" class="btn btn-success">Salvar</button> -->
                                            <a href="/gerenciar-vendas" id="btnConcVenda" type="button" class="btn btn-success">Salvar e concluir</a>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <br>
                    </div>
            </div>
        </div>
    </div>
    @include('vendas/popUp-buscaritem')

    <!--
    **********************************************************************************************************************************
    * MODAL
    **********************************************************************************************************************************
    -->
    <div class="modal fade" id="divModal" data-backdrop="static" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="/images/loading02.gif" width="50px"><span>&nbsp;Carregando...</span>
                </div>
                <div class="modal-footer">
                    &nbsp;
                </div>
            </div>
        </div>
    </div>


@endsection

@section('footerScript')

            <script src="{{ URL::asset('/libs/select2/select2.min.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/form-advanced.init.js')}}"></script>
            <!-- Required datatable js -->
            <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

            <!-- Datatable init js -->
            <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/registrar-venda.init.js')}}"></script>

            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

@endsection
