@extends('layouts.master')

@section('title') Relatório de entradas @endsection

@section('content')


<div class="col12" style="background:#ffffff;">

    <div class="container">
        <div class="row align-items-center">

            <div class="col-12">
            <form action="/relatorio-entrada" class="form-horizontal mt-4" method="GET">
                @csrf
                <label for="nome">Início</label>
                <input type="date" name='data_inicio' value="{{$data_inicio}}" default="$today = Carbon::today();">
            </div>
            <div class="col">
                <label for="nome">Final</label>
                <input type="date" name='data_fim' value="{{$data_fim}}" default="$today = Carbon::today();">
            </div>
            <div class="col">
                    <input class="btn btn-info" type="submit" value="Pesquisar">
            </div>
            <div class="col">
                    <a href="/relatorio-entrada">
                    <input class="btn btn-warning" type="button" value="Limpar">
                    </a>
            </div>
            <div class="col">
                <a href="/gerenciar-vendas">
                    <input class="btn btn-danger" type="button" value="Cancelar">
                </a>
            </div>
            <div class="col">
                <a href="">
                    <input class="btn btn-success" onclick="cont();" type="button" value="Imprimir">
                </a>
            </div>
            </form>

        </div>
    </div>
</div>
{{--<div class="container">
    <div class="row">
        <div class="col-sm">
            <label for="nome">Categoria</label>
            <select class="form-control" id="cat" name="categoria" placeholder="categoria" >
            @Foreach($resultCategorias as $resultCategoria)
            <option value="{{$resultCategoria->id}}">{{$resultCategoria->nome}}</option>
            @endForeach
            </select>
        </div>
        <div class="col-sm">
            <label for="nome">Material</label>
            <select class="form-control" id="cat" name="produtos" placeholder="Produtos">
            @Foreach($resultItens as $resultItem)
            <option value="{{$resultItem->id}}">{{$resultItem->nome}}</option>
            @endForeach
            </select>
        </div>
    </div>
</div>--}}
<script>
    function cont(){
       var conteudo = document.getElementById('print').innerHTML;
       tela_impressao = window.open('about:blank');
       tela_impressao.document.write(conteudo);
       tela_impressao.window.print();
       tela_impressao.window.close();
    }
</script>
<br>
<div id='print' class='conteudo'>
<div class="container" style="background:#ffffff;">
<h4 class="card-title" class="card-title" style="font-size:20px; text-align: center; background: #088CFF; color: white;">RELATÓRIO DE ENTRADAS POR PERÍODO</h4>
    <div class="row align-items-center">
        <table class="table table-sm table-striped">
            <thead style="text-align:center;">
                <tr style="text-align:center; font-weight: bold; font-size:15px; background: #daffe0;">
                <td>NR</td>
                <td>NOME</td>
                <td>CATEGORIA</td>
                <td>MARCA</td>
                <td>VALOR</td>
                <td style="text-align:center;">DATA ENTRADA</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($entradamat as $entmat )
                <tr style="text-align:center;">
                    <td>{{$nr_ordem++}}</td>
                    <td style="text-align:center;">{{$entmat->nome}}</td>
                    <td style="text-align:center;">{{$entmat->nomecat}}</td>
                    <td>{{$entmat->nomemar}}</td>
                    <td>{{number_format($entmat->valor_venda,2,',','.')}}</td>
                    <td style="text-align:center;">{{ date( 'd/m/Y' , strtotime($entmat->data_cadastro))}}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                    <tr style="text-align:center; font-weight: bold; font-size:15px">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

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
