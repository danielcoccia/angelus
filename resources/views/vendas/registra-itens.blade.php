@extends('layouts.master')

@section('title') Registrar itens @endsection

@section('headerCss')
    <link href="{{ URL::asset('/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" class="card-title" style="text-align: center; background: #088CFF; color: white;">Lista de Compras {{$result[0]->id}} </h4>
                    <hr>
                            <hr>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <button id="btnbuscaitem" type="button" class="btn btn-warning">Buscar item catálogo</button>

                                        <button type="button" class="btn btn-info">Buscar item Cód barras</button>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="container" >
                                <div class="row">
                                    <div class="col col-lg-4" id="DivConfirmaItem">
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
                                    </div>
                                    <div class="col col-lg-2">
                                        <button type="button" id="btnAddLista" class="btn btn-success">Adicionar a lista de compras</button>
                                    </div>
                                    <div id="divListaCompras">
                                        <div class="col col-lg-6">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr style="background-color: #FFFFE0">
                                                    <td >Qtd</td>
                                                    <td >Qtd</td>
                                                    <td >Valor total</td>
                                                    <td >Valor total</td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                <h6 style="color: blue;">LISTA DE COMPRAS</h6>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Produto</th>
                                                        <th scope="col">Desconto</th>
                                                        <th scope="col">Valor</th>
                                                        <th scope="col">Ações</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{--<tr>@foreach
                                                        <td scope="row">{{}}</td>
                                                        <td>{{}}</td>
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
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 mt-3" style="text-align: right;">
                                        <button type="button" class="btn btn-danger">Cancelar venda</button>
                                        <button type="submit" class="btn btn-success">Salvar</button>
                                        <button type="button" class="btn btn-info">Salvar e concluir</button>

                                    </div>
                                </div>
                            </div>
                    </div>
            </div>
        </div>
    </div>
    @include('vendas/popUp-buscaritem')

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
