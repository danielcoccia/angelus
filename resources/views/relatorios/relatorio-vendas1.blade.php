@extends('layouts.master')

@section('title') Relatório Nr 1 @endsection

@section('content')



    <div class="col12" style="background:#ffffff;">
        <h4 class="card-title" class="card-title" style="font-size:20px; text-align: center; background: #088CFF; color: white;">RELATÓRIO DE VENDAS POR PERÍODO - Nr 1</h4>
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
            <h6 class="font-weight-bold" style="color: blue;">VENDAS REALIZADAS NO PERÍODO</h6>
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
            @foreach($rela as $ra)
                <tr>
                    <td>{{$ra->idv}}</td>
                    <td>{{ date( 'd/m/Y' , strtotime($ra->data))}}</td>
                    <td>{{$ra->nomep}}</td>
                    <td>Porcentagem</td>
                    <td>{{number_format($ra->valor_venda,2,',','.')}}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot style='background:#ffffff;'>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th style="text-align:right;font-size:18px;font-weight: bold;">TOTAL</th>
                    <td style="text-align:center;font-size:18px;font-weight: bold;">{{number_format($total_vendas,2,',','.')}}</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <hr>
    <div class="row">
        <table class="table table-sm table-striped">
        <h6 class="font-weight-bold" style="color: blue;">PAGAMENTOS REALIZADOS NO PERÍODO</h6>
            <thead style='background:#ffffff;text-align:center;vertical-align:middle'>
                <tr>
                    <th scope="col">CÓDIGO DO PAGAMENTO</th>
                    <th scope="col">ESPECIFICAÇÃO</th>
                    <th scope="col">VALOR</th>
                </tr>
            </thead>
            <tbody style='text-align:center;vertical-align:middle;'>
            @foreach($relb as $rb)
                <tr>
                    <td>{{$rb->pid}}</td>
                    <td>{{$rb->nomepg}}</td>
                    <td>{{number_format($rb->valor_p,2,',','.')}}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot style='background:#ffffff;'>
                <tr>
                    <th></th>
                    <th style="text-align:right;font-size:18px;">TOTAL</th>
                    <td style="text-align:center;font-size:18px;font-weight: bold;">{{number_format($total_pag,2,',','.')}}</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="row">
        <table class="table table-sm table-striped">
            <h6 class="font-weight-bold" style="color: blue;">CÁLCULOS DO PERÍODO</h6>
            <tbody style='text-align:center;vertical-align:middle; font-size:15px;'>
                <tr>
                    <td></td><td style="text-align:right; font-weight: bold;">DESCONTOS -></td><td></td><td style="text-align:center;"></td></tr>
                <tr style="text-align:right;"><td></td><td style="font-weight: bold;">DISCRIMINAÇÃO DOS PAGAMENTOS  -></td><td style="text-align:right; font-weight: bold;"></td></tr>
                <tr style=" text-align:left;"><td></td><td></td><td>Em Dinheiro:</td><td style="font-weight: bold;">{{number_format($total_din,2,',','.')}}</td></tr>
                <tr style=" text-align:left;"><td></td><td></td><td>No Débito:</td><td style="font-weight: bold;">{{number_format($total_deb,2,',','.')}}</td></tr>
                <tr style=" text-align:left;"><td></td><td></td><td>No Crédito:</td><td style="font-weight: bold;">{{number_format($total_cre,2,',','.')}}</td></tr>
                <tr style=" text-align:left;"><td></td><td></td><td>Em Cheque:</td><td style="font-weight: bold;">{{number_format($total_che,2,',','.')}}</td></tr>
                <tr style=" text-align:left;"><td></td><td></td><td>Em Pix:</td><td style="font-weight: bold;">{{number_format($total_pix,2,',','.')}}</td></tr>
                <tr style="text-align:right;font-size:18px;font-weight:bold;">
                <td></td><td>TOTAL VENDIDO NO PERÍODO -></td><td></td>
                <td style="text-align:right;font-size:18px;">{{number_format($total_pag,2,',','.')}}</td>
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
