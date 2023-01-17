

@extends('layouts.master')

@section('title') Editar Venda @endsection

@section('headerCss')
    <link href="{{ URL::asset('/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" class="card-title" style="text-align: center; background: #088CFF; color: white;">Editar Vendas</h4>
                    <hr>
                    <div class="container">
                        <div id="divVenda"></div>
                        <div class="row align-items-center">
                            <div class="col-2">
                                @foreach($venda as $vendas)
                                <label for="id_venda">ID VENDA</label>
                                <input class="form-control" style="font-weight:bold; background:#f3f3f3; color:#000;" type="text" name="id_venda" id="id_venda" value={{$vendas->id}} placeholder="ID Venda" readonly>
                            </div>
                            <div class="col-2">
                            <label for="data_venda">DATA VENDA</label>
                                <input class="form-control" style="font-weight:bold; background: #f3f3f3; color: rgb(0, 0, 0);" value={{date( 'd/m/Y' , strtotime ($vendas->data))}} type="text" name="data_venda" id="data_venda" placeholder="Data Venda" readonly>
                            </div>
                            <div class="col-2">
                                <label for="cpf">CPF CLIENTE</label>
                                <input class="form-control" style="font-weight:bold; background: #f3f3f3; color: rgb(0, 0, 0);" value={{$vendas->cpf}} name="cpf" id="cpf" type="text" placeholder="cpf" readonly>
                            </div>
                            <div class="col-5">
                                <label for="nome_usuário">CLIENTE</label>
                                <input class="form-control" style="font-weight:bold; background: #f3f3f3; color: rgb(0, 0, 0);" value={{$vendas->nomepes}} name="nome_usuario" id="nome_usuario" type="text" placeholder="Vendedor" readonly>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <hr>
                <div id="divAddItem">
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
                                    <div class="col-4" id="DivConfirmaItem">
                                    </div>
                                        <div class="col-8" id="divListaCompras">
                                            <button type="button" id="btnAddLista" class="btn btn-outline-warning" onclick="setInterval('Atualizar()',1000)">Incluir na lista de compras</button>
                                            <table class="table table-bordered" style="display: none;">
                                                <thead class="thead-light">
                                                    <tr style="background-color: #FFFFE0">
                                                    <td >Qtd</td>
                                                    <td >Valor Unit.</td>
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
                                            <br><br>
                                            <h6 style="font-weight:bold; color: blue;">LISTA DE COMPRAS</h6>
                                            <table class="table-sm col-12 table-bordered">
                                                <thead class="thead-light" style="background: #f3f3f3;">

                                                    <tr style="text-align: center;">
                                                        <th scope="col" class="col-2">ID</th>
                                                        <th scope="col" class="col-6">PRODUTO</th>
                                                        <!-- <th scope="col">Desconto</th> -->
                                                        <th scope="col" class="col-1">QTD</th>
                                                        <th scope="col" class="col-2">VALOR</th>
                                                        <th scope="col" class="col-1">AÇÕES</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $tot = floatval("0"); $qtde = 0 ?>
                                                    @foreach($item as $itens)
                                                    <tr>
                                                        <td>{{$itens->id_item_material}}</td>
                                                        <td>{{$itens->nome}}</td>
                                                        <!-- <td>0</td> -->
                                                        <td>{{1}}</td>
                                                        <?php $tot += floatval($itens->valor_venda); $qtde++; ?>
                                                        <td>{{number_format($itens->valor_venda,2,'.','.')}}</td>
                                                        <td>
                                                            <button type="button" value="{{$itens->id_item_material}}"  class="btn btn-danger btn-custom btnRemoveItem" onclick="setInterval('Atualizar()',1000)"><i class="far fa-trash-alt"></i></button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfooter>
                                                    <td colspan="2">TOTAL:</td>
                                                    <td>{{$qtde}}</td>
                                                    <td><span id="vlrTotalVenda">{{number_format($tot,2,'.','.')}}</span></td>
                                                    <td>&nbsp;</td>
                                                </tfooter>
                                            </table>
                                        </div>
                                </div>
                                <br/>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 mt-3" style="text-align: right;">
                                            @foreach ($venda as $vd )
                                            <a href="/gerenciar-vendas" id="" type="button" class="btn btn-danger">Cancelar</a>
                                            <a href="/registrar-venda-fimedicao/{{$vd->id}}" id="" type="button" class="btn btn-success" style="color: #000">Salvar e concluir</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <br>

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
                    <img src="/images/loading02.gif" width="50px" ><span>&nbsp;Carregando...</span>
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
