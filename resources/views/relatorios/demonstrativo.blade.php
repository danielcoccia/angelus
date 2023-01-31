@extends('layouts.master')

@section('title')Demonstrativo @endsection

@section('content')


<div class="container">
    <a href="/gerenciar-vendas">
        <input class="btn btn-danger" type="button" value="Cancelar">
    </a>
    <a>
        <a href="">
        <input class="btn btn-success" onclick="cont();" type="button" value="Imprimir">
    </a>
    <hr>
    <script>
        function cont(){
           var conteudo = document.getElementById('print').innerHTML;
           tela_impressao = window.open('about:blank');
           tela_impressao.document.write(conteudo);
           tela_impressao.window.print();
           tela_impressao.window.close();
        }
    </script>
    <div id='print' class='conteudo'>
    <div class="row">

        <h5 style="color: blue;">DESCRIÇÃO DE COMPRAS DO BAZAR DA COMUNHÃO ESPÍRITA</h5>

            <table class= "table table-sm table-striped">
                <thead >
                    <tr >
                        <th class="text-center">CÓDIGO VENDA</th>
                        <th class="text-center">DATA DA VENDA</th>
                        <th class="text-center">CPF DO CLIENTE</th>
                        <th class="text-center">NOME DO CLIENTE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vendas as $v)
                    <tr >
                        <td class="text-center">{{$v->idv}}</td>
                        <td class="text-center">{{$v->data}}</td>
                        <td class="text-center">{{$v->cpf}}</td>
                        <td class="text-center">{{$v->nomepes}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

    </div>

<hr>



    <div class="row">

        <h6 class="font-weight-bold" style="color: blue;">LISTA DE COMPRAS</h6>
            <table class="table table-sm">
                <thead style="text-align:center;">
                    <tr style="text-align:center;">
                    <td style=text-align:right>QUANTIDADE DE ITENS:</td>
                    <td style=font-size:18px;>{{$total_itens}}</td>
                    <td style=text-align:right>VALOR TOTAL ORIGINAL:</td>
                    <td style=font-size:18px;>{{number_format($total_preco,2,',','.')}}</td>
                    </tr>
                </thead>
            </table>

    </div>


    <div class="row">

            <table class="table table-sm table-striped table-bordered">
                <thead style='text-align:center;vertical-align:middle'>
                    <tr>
                        <th scope="col">CÓDIGO</th>
                        <th scope="col">PRODUTO</th>
                        <th scope="col">MARCA</th>
                        <th scope="col">COR</th>
                        <th scope="col">GÊNERO</th>
                        <th scope="col">DESCONTO</th>
                        <th scope="col">VALOR</th>
                    </tr>
                </thead>
                <tbody style='text-align:center;vertical-align:middle'>
                @foreach($itens_compra as $ic)
                    <tr>
                        <td>{{$ic->id_item_material}}</td>
                        <td>{{$ic->nomemat}}</td>
                        <td>{{$ic->marca}}</td>
                        <td>{{$ic->cor}}</td>
                        <td>{{$ic->genero}}</td>
                        <td>{{number_format($ic->desconto,2,',','.')}}</td>
                        <td>{{number_format($ic->valor_venda,2,',','.')}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>


        <div class="row">
            <table class="table table-sm table-striped">
            <h6 class="font-weight-bold" style="color: blue;">PAGAMENTOS REALIZADOS</h6>
                <thead style='text-align:center;vertical-align:middle'>
                    <tr>
                        <th scope="col">CÓDIGO</th>
                        <th scope="col">ESPECIFICAÇÃO</th>
                        <th scope="col">VALOR</th>
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
                    </tr>
                </form>
                @endforeach
                </tbody>
            </table>
        </div>

            <div class="row">
                <table class="table table-sm table-striped">
                    <h6 class="font-weight-bold" style="color: blue;">CÁLCULOS DA VENDA</h6>
                    <tbody style='text-align:center;vertical-align:middle; font-size:15px;'>
                        <tr>
                            <td style="text-align:right;">Total original:</td>
                            <td class="col-1" style="text-align:left;">{{number_format($total_preco,2,',','.')}}</td>
                        </tr>
                        <tr>
                            <td style="text-align:right;">Total descontos:</td>
                            <td class="col-1" style="text-align:left;">{{number_format($total_desc,2,',','.')}}</td>
                        </tr>
                        <tr style="text-align:right;">
                            <td>Total pago:</td>
                            <td class="col-1" style="text-align:left;">{{number_format($total_pago,2,',','.')}}</td>
                        </tr>
                        <tr style="text-align:right;font-weight:bold;">
                            <td style="text-align:right;">Total devido:</td>
                            <td class="col-1" style="text-align:left;font-size:18px;">{{number_format($valor_final,2,',','.')}}</td>
                        </tr>

                    </tbody>
                </table>
            </div>


</div>
</div>

@section('footerScript')
            <script src="{{ URL::asset('/js/pages/mascaras.init.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/busca-cep.init.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
            <script src="{{ URL::asset('/libs/select2/select2.min.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/form-advanced.init.js')}}"></script>
@endsection


@endsection
