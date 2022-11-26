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
                    <h4 class="card-title" class="card-title" style="text-align: center; background: #088CFF; color: white;">Editar Vendas</h4>
                    <hr>
                    </table>
                    <table class="table table-bordered">
                        <thead class="table-success">
                            <tr>
                                <th class="text-center">ID VENDA</th>
                                <th class="text-center">DATA DA VENDA</th>
                                <th class="text-center">CPF DO CLIENTE</th>
                                <th class="text-center">NOME DO CLIENTE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($venda as $vendas)
                            <tr>
                                <td class="text-center">{{$vendas->id}}</td>
                                <td class="text-center">{{date( 'd/m/Y' , strtotime ($vendas->data))}}</td>
                                <td class="text-center">{{$vendas->cpf}}</td>
                                <td class="text-center">{{$vendas->nomepes}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                <div id="divAddItem">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <button id="btnbuscaitem" type="button" class="btn btn-warning">Buscar item catálogo</button>
                                <button id="btncodigobarra" type="button" class="btn btn-info">Buscar item Cód barras</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="container" id="divVendaItens">
                        <div class="row">
                            <div class="col col-lg-4" id="DivConfirmaItem">
                            </div>
                            <div class="col col-lg-2">
                                <button type="button" id="btnAddLista" class="btn btn-success">Incluir na lista de compras</button>
                            </div>


                            <div>
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
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                    <h6 style="color: blue;">LISTA DE COMPRAS</h6>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Produto</th>
                                            <!-- <th scope="col">Desconto</th> -->
                                            <th scope="col">Qtd.</th>
                                            <th scope="col">Valor</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $tot = floatval("0"); $qtde = 0 ?>
                                        @foreach($item as $itens)
                                        <tr>
                                            <td scope="row">{{$itens->id_item_material}}</td>
                                            <td>{{$itens->nome}}</td>
                                            <!-- <td>0</td> -->
                                            <td>{{1}}</td>
                                            @if (floatval(number_format($itens->valor_venda_promocional,2,'.','.'))>0)
                                            <?php $tot += floatval($itens->valor_venda_promocional); $qtde++; ?>
                                            <td>{{number_format($itens->valor_venda_promocional,2,'.','.')}}</td>
                                            @else
                                            <?php $tot += floatval($itens->valor_venda); $qtde++; ?>
                                            <td>R$ {{number_format($itens->valor_venda,2,'.','.')}}</td>
                                            @endif
                                            <td>
                                                <button type="button" value="{{$itens->id_item_material}}"  class="btn btn-danger btn-custom btnRemoveItem"><i class="far fa-trash-alt"></i></button>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfooter>
                                        <td colspan="2">TOTAL:</td>
                                        <td>{{$qtde}}</td>
                                        <td>R$ <span id="vlrTotalVenda">{{number_format($tot,2,'.','.')}}</span></td>
                                        <td>&nbsp;</td>
                                    </tfooter>
                                </table>
                            </div>
                                <br/>
                                <div class="container" id="divVendaBotoes">
                                    <div class="row">
                                        <div class="col-12 mt-3" style="text-align: right;">
                                            <button id="btnCancVenda" type="button" class="btn btn-danger">Cancelar venda</button>
                                            <!-- <button type="submit" class="btn btn-success">Salvar</button> -->
                                            <a href="/gerenciar-vendas" id="btnConcVenda" type="button" class="btn btn-info">Salvar e concluir</a>

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
