@extends('layouts.master')

@section('title') Gerenciar Pagamento @endsection

@section('headerCss')
    <link href="{{ URL::asset('/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" class="card-title" style="font-size:20px; text-align: center; background: #088CFF; color: white;">Registrar Pagamento</h5>
                <hr>
                <div class="container">
                    <div class="row align-items-center">
                    </table>
                    <table class="table-sm col-12 table-bordered">
                        <thead class="table-success">
                            <tr>
                                <th  scope="col" class="col-1 text-center">ID VENDA</th>
                                <th  scope="col" class="col-2 text-center">DATA DA VENDA</th>
                                <th  scope="col" class="col-2 text-center">CPF DO CLIENTE</th>
                                <th  scope="col" class="text-center">NOME DO CLIENTE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vendas as $v)
                            <tr>
                                <th scope="col" class="col-1 text-center">{{$v->idv}}</th>
                                <td scope="col" class="col-2 text-center">{{ date( 'd/m/Y' , strtotime ($v->data))}}</td>
                                <td scope="col" class="col-2 text-center">{{$v->cpf}}</td>
                                <td scope="col" class="text-center">{{$v->nomepes}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col col-7">
                        <h6 class="font-weight-bold" style="color: blue;">LISTA DE COMPRAS</h6>
                            <table class="table-sm table-bordered">
                                <thead class="thead-light">
                                    <tr style="background-color: #f1f1f1; text-align:center; ">
                                    <td style=text-align:right>QUANTIDADE:</td>
                                    <td style=font-size:18px;>{{$total_itens}}</td>
                                    <td style=text-align:right>TOTAL ORIGINAL:</td>
                                    <td style=font-size:18px;>{{number_format($total_original,2,',','.')}}</td>
                                    </tr>
                                </thead>
                            </table>
                            <table class="table-sm col-12 table-bordered">
                                <thead class="table-success" style= "text-align:center; background-color:#f1f1f1;">
                                    <tr>
                                        <th scope="col" class="col-1" style= "text-align:center;">CÓDIGO</th>
                                        <th scope="col" class="col-2" style= "text-align:center;">PRODUTOS</th>
                                        <th scope="col" class="col-1" style= "text-align:center;">DESCONTOS</th>
                                        <th scope="col" class="col-1" style= "text-align:center;">VALOR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($itens_compra as $ic)
                                    <tr>
                                        <td style= "text-align:center;">{{$ic->id_item_material}}</td>
                                        <td>{{$ic->nomemat}}</td>
                                        <td style= "text-align:center;">{{number_format($ic->desconto,2,',','.')}}</td>
                                        <td style= "text-align:center;">{{number_format($ic->valor_venda,2,',','.')}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col col-5">
                        <h6 class="font-weight-bold" style="color: blue;">REGISTRAR PAGAMENTOS</h6>
                        <div>
                            <a href="#" class="btn btn-outline-warning btn-md btn-block" data-toggle="modal" data-target="#ModalCreate" ><span style="color: #f1f1f1"></span>Calcular troco</a>
                        </div>
                        @foreach($vendas as $v)
                        <form class="form-horizontal mt-4" method="POST" action="/gerenciar-pagamentos/{{$v->idv}}">
                        @csrf
                        @endforeach
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="background-color: #ffb40a; font-size:18px;" type="text">Forma de pagamento</button>
                            </div>
                            <select class="form-control" id="forma" name="forma" required="required" style="font-size:18px;">
                                <option>Escolher...</option>
                                @foreach($tipos_pagamento as $tp)
                                <option value="{{$tp->id}}">"{{$tp->nome}}"</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <input type="numeric" style="font-size:18px;" step="any" min="0" class="form-control" id="valor" name="valor" value="0.00" onchange="this.value = this.value.replace(/,/g, '.')">
                                <div class="input-group-append">
                                <button type="submit"  style="background-color: #ffb40a; font-size:18px;" class="btn btn-outline-secundary" id="button-addon2">>>Confirmar Valor</button>
                        </form>
                                </div>
                        </div>
                            <div class="input-group mb-3">
                                <table class="table-sm col-12 table-bordered">
                                <h6 class="font-weight-bold" style="color: blue;">PAGAMENTOS REALIZADOS</h6>
                                    <thead class="table-success" style="text-align:center;vertical-align:middle; background: #f1f1f1";>
                                        <tr>
                                            <th scope="col">CÓDIGO</th>
                                            <th scope="col">ESPECIFICAÇÃO</th>
                                            <th scope="col">VALOR</th>
                                            <th scope="col">AÇÕES</th>
                                        </tr>
                                    </thead>
                                    <tbody style='text-align:center;vertical-align:middle'>
                                    @foreach($pagamentos as $pg)
                                    <form action="/gerenciar-pagamentos/{{$pg->pid}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <tr>
                                            <td>{{$pg->pid}}</td>
                                            <td>{{$pg->nome}}</td>
                                            <td>{{number_format($pg->valor,2,',','.')}}</td>
                                            <td>
                                            <button type="submit" class="btn btn-danger btn-sm" font-size= 50px><i class="far fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    </form> @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <table class="table table-bordered">
                                    <tbody style="color:#000; text-align:center;vertical-align:middle; font-size:15px;">
                                        <tr>

                                        <td style="text-align:left;">Total em descontos:</td><td style="text-align:left;">R$ {{number_format($desconto,2,',','.')}}</td></tr>

                                        <tr style="text-align:left;"><td>Total em pagamentos:</td><td style="text-align:left;">R$ {{number_format($total_pago,2,',','.')}}</td></tr>
                                        </tr>
                                        @if ($total_preco > $total_pago)
                                        <tr style="background-color: #ffcbd3; text-align:right;font-weight:bold;">
                                        @elseif ($total_preco = $total_pago)
                                        <tr style="background-color:#a8ecbf; text-align:right;font-weight:bold;">
                                            @endif

                                        <td>Total da venda:</td><td style="text-align:left;font-size:19px;">
                                        {{number_format($total_preco,2,',','.')}}</td></tr>
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
                        @foreach($vendas as $vd)
                            <a href="/gerenciar-vendas"  type="button" class="btn btn-danger">Cancelar</a>
                            <a href="/demonstrativo/{{$vd->idv}}"  type="button" class="btn btn-info">Exportar</a>
                            <a href="/gerenciar-vendas/finalizar/{{$vd->idv}}" type="button" class="btn btn-success">Concluir Pagamento</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('calculos.modalcalc')

@endsection

@section('footerScript')
            <script src="{{ URL::asset('/js/pages/mascaras.init.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/busca-cep.init.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
            <script src="{{ URL::asset('/libs/select2/select2.min.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/form-advanced.init.js')}}"></script>
@endsection
