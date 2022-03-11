
@extends('layouts.master')

@section('title') Gerenciar Pagamento @endsection

@section('content')

<div>

    <h3 style="color:rgb(243, 45, 45)">"O valor selecionado ultrapassa a soma do valor dos itens"</h3>
    <br>
    @foreach($vendas as $vd)
    <a href="/gerenciar-pagamentos/{{$vd->id}}"  type="button" class="btn btn-danger">Retornar</a>
    @endforeach

</div>

@endsection
