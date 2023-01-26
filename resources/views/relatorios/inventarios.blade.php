@extends('layouts.master')

@section('title')Inventário @endsection

@section('content')

<div class="col12" style="background:#ffffff;">
    <div class="container">
        <div class="row" style="text-align: left;">
            <div class="col">
            <form action="/inventarios" class="form-horizontal mt-4" method="GET">
                @csrf

                <label for="nome">Data</label>
                <input type="date" name='data' value="{{$data}}">
            </div>
            <div class="col">
                <br>
                <input class="btn btn-info" type="submit" value="Pesquisar">
            </div>
            <div class="col">
                <br>
                <a href="/inventarios">
                <input class="btn btn-warning" type="button" value="Limpar">
                </a>
            </div>
            <div class="col">
                <br>
                <a href="/gerenciar-vendas">
                    <input class="btn btn-danger" type="button" value="Cancelar">
                </a>
            </div>
            <div class="col">
                <br>
                <a href="">
                    <input class="btn btn-success" onclick="cont();" type="button" value="Imprimir">
                </a>
            </div>

            </form>
        </div>
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
    <hr>
    <div id='print' class='conteudo'>
    <div class="container" style="background:#ffffff;">
        <h4 class="card-title" class="card-title" style="font-size:20px; text-align: center; background: #088CFF; color: white;">INVENTÁRIO DE MATERIAL</h4>
        <div class="row">
        <h6 class="font-weight-bold" style="color: blue;  margin-left: 10px;">RELAÇÃO DOS MATERIAIS EM ESTOQUE - no dia <span class="badge badge-secondary">{{ \Carbon\Carbon::parse($data)->format('d/m/Y')}}</span> </h6>
            <table class="table table-sm table-striped">
                <thead style="text-align:center; background: #daffe0;">
                    <tr style="text-align:center; font-weight: bold; font-size:15px">
                    <td>NR</td>
                    <td>NOME</td>
                    <td>VALOR UNITÁRIO</td>
                    <td>QUANTIDADE</td>
                    <td>SUBTOTAL</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resultItens as $rit )
                    <tr style="text-align:center;">
                        <td>{{$nr_ordem++}}</td>
                        <td style="text-align:center;">{{$rit->nome}}</td>
                        <td>{{number_format($rit->valor_venda,2,',','.')}}</td>
                        <td>{{$rit->qtd}}</td>
                        <td>{{number_format($rit->qtd * $rit->valor_venda,2,',','.')}}</td>
                        </tr>
                        @endforeach
                </tbody>

                <tfoot style="background: #daffe0;">
                        <tr style="text-align:center; font-weight: bold; font-size:15px">
                        <td></td>
                        <td></td>
                        <td>TOTAIS</td>
                        <td>{{$total_itens}}</td>
                        <td>{{number_format($total_soma,2,',','.')}}</td>
                    </tr>
                </tfoot>
            </table>
            <h6 class="col-12  font-weight-bold" style="color: blue; margin-left: 10px; text-align:right;">O relatório foi impresso em <span class="badge badge-secondary">{{ \Carbon\Carbon::today()->locale('pt')->isoFormat('DD MMMM YYYY')}}</span> </h6>
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


