@extends('layouts.master')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-sm">
        <form action="/relatorio-vendas" class="form-horizontal mt-4" method="GET" >
            @csrf
            <label for="nome">Início</label>
            <input type="date" name="data_inicio" >
        </div>
        <div class="col-sm">
            <label for="date">Final</label>
            <input type="date" name="data_fim">
        </div>

    </div>
    <br>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <input class="form-control" type="text" name="cliente" id="cliente" placeholder="Nome do cliente"/>
        </div>
        <div class="col-sm-3">
            <input class="form-control" type="text" name="vendedor" id="vendedor" placeholder="Nome do vendedor"/>
        </div>
        <div class="col-sm-2">
            <select class="form-control" id="cat" name="categoria" placeholder="categoria">
            @Foreach($resultCategorias as $resultCategoria)
            <option value="{{$resultCategoria->id}}">{{$resultCategoria->nome}}</option>
            @endForeach
            </select>
        </div>
        <div class="col-sm-2">
            <select class="form-control" id="cat" name="produtos" placeholder="Produtos">
            @Foreach($resultItens as $resultItem)
            <option value="{{$resultItem->id}}">{{$resultItem->nomemat}}</option>
            @endForeach
            </select>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row align-items-center">
        <div class="col-sm">
            <input class="btn btn-info" type="submit" value="Pesquisar">
        </div>
        <div class="col-sm">
            <a href="/gerenciar-vendas">
            <input class="btn btn-danger" type="button" value="Limpar">
            </a>
        </div>
        </form>
    </div>
<hr>
<div class="container">
    <div class="row">
    <h6 class="font-weight-bold" style="color: blue;">TOTAL DE VENDAS NO PERÍODO</h6>
        <table class="table table-sm">
            <thead style="text-align:center;">
                <tr style="text-align:center;">
                <td style=text-align:right>QUANTIDADE DE ITENS:</td>
                <td style=font-size:18px;></td>
                <td style=text-align:right>VALOR TOTAL:</td>
                <td style=font-size:18px;></td>
                </tr>
            </thead>
        </table>
    </div>
</div>
    <div class="row">
        <table class="table table-sm table-striped table-bordered">
            <thead style='text-align:center;vertical-align:middle'>
                <tr>

                    <th scope="col">PRODUTO</th>
                    <th scope="col">DESCONTO</th>
                    <th scope="col">VALOR</th>
                </tr>
            </thead>
            <tbody style='text-align:center;vertical-align:middle'>
            @foreach($relatorio as $rel)
                <tr>
                    <td>{{$rel->nomemat}}</td>
                    <td>Valor</td>
                    <td>{{number_format($rel->valor_venda,2,',','.')}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <table class="table table-sm table-striped">
        <h6 class="font-weight-bold" style="color: blue;">SOMA DOS PAGAMENTOS REALIZADOS</h6>
            <thead style='text-align:center;vertical-align:middle'>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ESPECIFICAÇÃO</th>
                    <th scope="col">VALOR</th>
                </tr>
            </thead>
            <tbody style='text-align:center;vertical-align:middle'>
            @foreach($itens_compra as $pg)

            <form action="/gerenciar-pagamentos/{{$pg->pid}}" method="POST">
            @csrf
            @method('DELETE')
                <tr>
                    <td>{{$pg->pid}}</td>
                    <td>{{$pg->id_tipo_pagamento}}</td>
                    <td>{{number_format($pg->valor,2,',','.')}}</td>
                </tr>
            </form>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <table class="table table-sm table-striped">
            <h6 class="font-weight-bold" style="color: blue;">CÁLCULOS DAS VENDAS</h6>
            <tbody style='text-align:center;vertical-align:middle; font-size:15px;'>
                <tr>
                <td style="text-align:left;">Descontos:</td><td style="text-align:left;"></td></tr>
                <tr style="text-align:left;"><td>Pagamentos:</td><td style="text-align:left;"></td></tr>
                <tr style=" text-align:left;"><td>Troco:</td><td style="text-align:left;">
                </td>
                </tr>
                <tr style="text-align:right;font-weight:bold;">
                <td>Total da venda:</td>
                <td style="text-align:left;font-size:18px;"></td>
                </tr>
            </tbody>
        </table>
    </div>



@section('footerScript')
            <script src="{{ URL::asset('/js/pages/mascaras.init.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/busca-cep.init.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
            <script src="{{ URL::asset('/libs/select2/select2.min.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/form-advanced.init.js')}}"></script>
@endsection


@endsection
