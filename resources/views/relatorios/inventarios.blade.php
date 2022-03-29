@extends('layouts.master')

@section('title')Inventário @endsection

@section('content')

<div class="col12" style="background:#ffffff;">
    <h4 class="card-title" class="card-title" style="font-size:20px; text-align: center; background: #088CFF; color: white;">INVENTÁRIO DE MATERIAL</h4>
    <div class="container">
        <div class="row">
            <div class="col-sm">
            <form action="/inventarios" class="form-horizontal mt-4" method="GET">
                @csrf
                <label for="nome">Data Cadastro</label>
                <input type="date" name='data' value="{{$data}}" default="$today = Carbon::today();">
            </div>
        </div>
    </div>
        <br>
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
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm">
                <input class="btn btn-info" type="submit" value="Pesquisar">
            </div>
            <div class="col-sm">
                <a href="/inventarios">
                <input class="btn btn-danger" type="button" value="Limpar">
                </a>
            </div>
            </form>
        </div>
    <hr>
    <div class="container">
        <div class="row">
        <h6 class="font-weight-bold" style="color: blue;">RELAÇÃO DOS MATERIAIS EM ESTOQUE</h6>
            <table class="table table-sm">
                <thead style="text-align:center;">
                    <tr style="text-align:center; font-weight: bold; font-size:15px">
                    <td>NR</td>
                    <td>NOME</td>
                    <td>VALOR</td>
                    <td>QUANTIDADE</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resultItens as $rit )
                    <tr style="text-align:center;">
                        <td>{{$nr_ordem++}}</td>
                        <td style="text-align:left;">{{$rit->nome}}</td>
                        <td>{{number_format($rit->valor_venda,2,',','.')}}</td>
                        <td>{{$rit->qtd}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                        <tr style="text-align:center; font-weight: bold; font-size:15px">
                        <td></td>
                        <td>TOTAIS</td>
                        <td>{{$total_soma}}</td>
                        <td>{{$total_itens}}</td>
                    </tr>
                </tfoot>
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
