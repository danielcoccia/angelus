@extends('layouts.master')

@section('title')Inventário @endsection

@section('content')

<div class="col12" style="background:#ffffff;">
    <h4 class="card-title" class="card-title" style="font-size:20px; text-align: center; background: #088CFF; color: white;">INVENTÁRIO DE MATERIAL</h4>
    <div class="container">
        <div class="row" style="text-align: left;">
            <div class="col">
            <form action="/inventarios" class="form-horizontal mt-4" method="GET">
                @csrf

                <label for="nome">Data Cadastro</label>
                <input type="date" name='data' value="{{$data}}">
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
            <div class="col">
            <br>
                <input class="btn btn-info" type="submit" value="Pesquisar">
            </div>
            <div class="col">
            <br>
                <a href="/inventarios">
                <input class="btn btn-danger" type="button" value="Limpar">
                </a>
            </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="container" style="background:#ffffff;">
        <div class="row">
        <h6 class="font-weight-bold" style="color: blue;  margin-left: 10px;">RELAÇÃO DOS MATERIAIS EM ESTOQUE - Extraido em <span class="badge badge-secondary">{{"hoje"}}</span> </h6>
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
