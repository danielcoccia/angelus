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
                                <form class="form-horizontal mt-4" method="POST" action="route{{('/registrar-venda')}}">
                                @csrf
                                    <div class="container">
                                        <div class="row align-items-center">
                                            <div class="col-sm">
                                                <input class="form-control" type="text" placeholder="ID Venda" readonly>
                                            </div>
                                            <div class="col-sm">
                                                <input class="form-control" value="{{date('d-m-Y')}}" type="text" placeholder="Data Venda" readonly>
                                            </div>
                                            <div class="col-sm">
                                                <input class="form-control" value="{{session()->get('usuario.nome')}}" type="text" placeholder="Vendedor">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                    <br>
                                <form class="form-horizontal mt-4" method="POST" action="route{{('/registrar-venda')}}">
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-sm-3">
                                        <select class="form-control select2" id="cpf" name="cpf" required="required">
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
                                    <div class="col">
                                        <button type="button" id="btnAddLista" class="btn btn-success">Inluir na lista de compras</button>
                                        <div id="divListaCompras">
                                            <div class="col">
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
                                                <table class="table-sm col-12 table-bordered">
                                                    <thead class="thead-light">
                                                    <h6 style="color: blue;">LISTA DE COMPRAS</h6>
                                                        <tr>
                                                            <th scope="col" class="col-2">ID</th>
                                                            <th scope="col">Produto</th>
                                                            {{--<th scope="col" class="col-1>Desconto</th>--}}
                                                            <th scope="col" class="col-1">QTD</th>
                                                            <th scope="col" class="col-2">Valor</th>
                                                            <th scope="col" class="col-1">Ações</th>
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
