@extends('layouts.master')

@section('title') Relatório de vendas @endsection

@section('content')


<div class="col-12" style="background:#ffffff;">
    <div class="container">
        <div class="row" style="text-align: left;">
            <div class="col-12" style="background:#ffffff;">
                <form action="/relatorio-vendas" class="form-horizontal mt-4" method="GET" >
                    @csrf
                <div class="col">
                    <label for="nome">Início</label>
                    <input type="date" name="data_inicio" value="{{$data_inicio}}">
                    <label for="date">Final</label>
                    <input type="date" name="data_fim"  value="{{$data_fim}}">

                    <input class="btn btn-info" type="submit" value="Pesquisar">

                    <a href="/relatorio-vendas">
                    <input class="btn btn-warning" type="button" value="Limpar">
                    </a>
                </form>
                <a href="/gerenciar-vendas">
                    <input class="btn btn-danger" type="button" value="Cancelar">
                </a>
                <a>
                    <a href="">
                    <input class="btn btn-success" onclick="cont();" type="button" value="Imprimir">
                </a>

                <script>
                    function cont(){
                    var conteudo = document.getElementById('print').innerHTML;
                    tela_impressao = window.open('about:blank');
                    tela_impressao.document.write(conteudo);
                    tela_impressao.window.print();
                    tela_impressao.window.close();
                    }
                </script>

               </div>
            </div>
        </div>
    </div>

    <hr>
    <div id='print' class='conteudo'>
        <h4 class="card-title" class="card-title" style="font-size:15px; text-align: center; background: #088CFF; color: white;">RELATÓRIO DE VENDAS POR PERÍODO</h4>
        <h4 style="font-size: 12px; text-align: center; color:black;">O período do relatório é: {{ \Carbon\Carbon::parse("$data_inicio")->format('d/m/Y')}} até {{ \Carbon\Carbon::parse("$data_fim")->format('d/m/Y')}}</h4>
        <br>
        <div class="container" style="background:#ffffff;">
            <div class="row">
                    <table class="table table-sm table-striped table-bordered">
                        <thead style='font-size:12px; background:#ffffff; text-align:center;vertical-align:middle'>
                            <tr>
                                <th colspan="1">Cod venda</th>
                                <th colspan="1">Dt Venda</th>
                                <th colspan="1">Cliente</th>
                                <th colspan="1">Desconto</th>
                                <th colspan="1">Vlr Venda</th>
                            </tr>
                        </thead>
                        <tbody style='font-size:10px; text-align:center;vertical-align:middle'>
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
                                <th style="text-align:right;font-size:15px;font-weight: bold;">TOTAL</th>
                                <td style="text-align:center;font-size:15px;font-weight: bold;">{{number_format($total_vendas,2,',','.')}}</td>
                            </tr>
                        </tfoot>
                    </table>

            </div>
        </div>
    <hr>
        <div class="container" style="background:#ffffff;">
            <div class="row">
                <table class="table table-sm table-striped">
                    <h6 class="font-weight-bold" style="color: blue;">CÁLCULOS DO PERÍODO</h6>
                    <tbody style='text-align:center;vertical-align:middle; font-size:12px;'>
                        <tr>
                            <td></td><td style="text-align:right; font-weight: bold;">DESCONTOS -></td><td></td><td style="text-align:center;"></td></tr>
                        <tr style="text-align:right;"><td></td><td style="font-weight: bold;">DISCRIMINAÇÃO DOS PAGAMENTOS  -></td><td style="text-align:right; font-weight: bold;"></td></tr>
                        <tr><td></td><td  style=" text-align:right;"><i class="fa-solid fa-money-bill-1-wave"></i></td><td  style=" text-align:left;">Em Dinheiro:</td><td style="font-weight: bold;">{{number_format($total_din,2,',','.')}}</td></tr>
                        <tr><td></td><td style=" text-align:right;"><i class="fab fa-cc-mastercard"></i></td><td style=" text-align:left;">No Débito:</td><td style="font-weight: bold;">{{number_format($total_deb,2,',','.')}}</td></tr>
                        <tr><td></td><td style=" text-align:right;"><i class="fab fa-cc-visa"></i></td><td style=" text-align:left;">No Crédito:</td><td style="font-weight: bold;">{{number_format($total_cre,2,',','.')}}</td></tr>
                        <tr><td></td><td style=" text-align:right;"><i class="fa-solid fa-money-check"></i></td><td style=" text-align:left;">Em Cheque:</td><td style="font-weight: bold;">{{number_format($total_che,2,',','.')}}</td></tr>
                        <tr><td></td><td style=" text-align:right;"><i class="fa-brands fa-pix"></i></td><td style=" text-align:left;">Em Pix:</td><td style="font-weight: bold;">{{number_format($total_pix,2,',','.')}}</td></tr>
                        <tr style="text-align:right;font-size:15px;font-weight:bold;">
                        <td></td><td>TOTAL VENDIDO NO PERÍODO -></td><td></td>
                        <td style="text-align:right;font-size:15px;">{{number_format($total_pag,2,',','.')}}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="row">
                <div class="col-12">
                    <h6 class="font-weight-bold" style="font-size:12px; color: blue;  margin-left: 10px; text-align: right;">O relatório foi extraído em <span class="badge badge-secondary">{{ \Carbon\Carbon::today()->locale('pt')->isoFormat('dddd, Do MMMM YYYY, HH:mm:ss')}}</span> </h6>
                </div>

            </div>
            <br><br><br><br>
            <div class="row">
                <div class="col-12" style="font-size: 12px; text-align:center; line-height:0%">
                    <h4 style="font-size: 15px; text-align: center; color:black;">{{session()->get('usuario.nome')}}</h4>Responsável pela informação
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('footerScript')
            <script src="{{ URL::asset('/js/pages/mascaras.init.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/busca-cep.init.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
            <script src="{{ URL::asset('/libs/select2/select2.min.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/form-advanced.init.js')}}"></script>
@endsection



