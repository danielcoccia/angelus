@extends('layouts.master')

@section('title') Relatório de Vendas Nr 1 @endsection

@section('content')



    <div class="col12" style="background:#ffffff;">
        <h4 class="card-title" class="card-title" style="text-align: center; background: #088CFF; color: white;">Relatório de Vendas Nr 1</h4>
        <form action="/relatorio-vendas1" class="form-horizontal mt-4" method="GET" >
            @csrf
        <div class="col">
            <label for="nome">Início</label>
            <input type="date" name="data_inicio" value="{{$data_inicio}}">

            <label for="date">Final</label>
            <input type="date" name="data_fim"  value="{{$data_fim}}">

            <input class="btn btn-info" type="submit" value="Pesquisar">

            <a href="/relatorio-vendas1">
            <input class="btn btn-danger" type="button" value="Limpar">
            </a>
        </form>
        </div>
        <br>
    </div>

<hr>
    <div class="row">
        <table class="table table-sm table-striped table-bordered">
            <thead style='background:#ffffff; text-align:center;vertical-align:middle'>
                <tr>

                    <th scope="col">CÓDIGO DA VENDA</th>
                    <th scope="col">DATA DA VENDA</th>
                    <th scope="col">NOME DO CLIENTE</th>
                    <th scope="col">DESCONTO NA COMPRA</th>
                    <th scope="col">VALOR DA VENDA</th>
                </tr>
            </thead>
            <tbody style='text-align:center;vertical-align:middle'>
            @foreach($relatorio as $rel)
                <tr>
                    <td>{{$rel->idv}}</td>
                    <td>{{ date( 'd/m/Y' , strtotime($rel->data))}}</td>
                    <td>{{$rel->nomep}}</td>
                    <td>Porcentagem</td>
                    <td>{{number_format($rel->valor_venda,2,',','.')}}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot style='background:#ffffff;'>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th style="text-align:right;">TOTAL</th>
                    <td style="text-align:center;">{{number_format($total_vendas,2,',','.')}}</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <hr>
    <div class="row">
        <table class="table table-sm table-striped">
        <h6 class="font-weight-bold" style="color: blue;">SOMA DOS PAGAMENTOS REALIZADOS</h6>
            <thead style='background:#ffffff;text-align:center;vertical-align:middle'>
                <tr>
                    <th scope="col">CÓDIGO DO PAGAMENTO</th>
                    <th scope="col">ESPECIFICAÇÃO</th>
                    <th scope="col">VALOR</th>
                </tr>
            </thead>
            <tbody style='text-align:center;vertical-align:middle'>
            @foreach($relatorio as $rel)
                <tr>
                    <td>{{$rel->pid}}</td>
                    <td>{{$rel->nomepg}}</td>
                    <td>{{number_format($rel->valor_p,2,',','.')}}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot style='background:#ffffff;'>
                <tr>
                    <th></th>
                    <th style="text-align:right;">TOTAL</th>
                    <td style="text-align:center;">{{number_format($total_pag,2,',','.')}}</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="row">
        <table class="table table-sm table-striped">
            <h6 class="font-weight-bold" style="color: blue;">CÁLCULOS DO PERÍODO</h6>
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
