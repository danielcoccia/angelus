

@extends('layouts.master')

@section('title') Finalizar venda @endsection

@section('content')

<div>
    @foreach($alerta as $alr)
    <h3 style="color:rgb(243, 45, 45)">A venda {{$alr->id}} precisa ser finalizada ou a soma dos pagamentos é menor que o valor da venda.;</h3>
    <a href="/gerenciar-pagamentos/{{$alr->id}}"  type="button" class="btn btn-danger">Retornar</a>
    @endforeach

</div>

@endsection
