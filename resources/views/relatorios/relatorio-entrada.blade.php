@extends('layouts.master')

@section('title') Relatório de entradas @endsection

@section('content')


<div class="col12" style="background:#ffffff;">
    <h4 class="card-title" class="card-title" style="font-size:20px; text-align: center; background: #088CFF; color: white;">RELATÓRIO DE ENTRADAS POR PERÍODO</h4>
    <div class="container">
        <div class="row align-items-center">

            <div class="col">
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
                    <input class="btn btn-danger" type="button" value="Limpar">
                    </a>
            </form>
            </div>
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
<br>
<div class="container" style="background:#ffffff;">
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

@section('footerScript')
            <script src="{{ URL::asset('/js/pages/mascaras.init.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/busca-cep.init.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
            <script src="{{ URL::asset('/libs/select2/select2.min.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/form-advanced.init.js')}}"></script>
@endsection


@endsection
