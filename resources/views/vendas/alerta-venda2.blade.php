

@extends('layouts.master')

@section('title') Finalizar venda @endsection

@section('content')

<div>
    @foreach($alerta as $alr)
    <h3 style="color:rgb(243, 45, 45)">A venda {{$alr->id}} já está paga e finalizada.;</h3>
    <a href="/gerenciar-pagamentos/{{$alr->id}}"  type="button" class="btn btn-danger">Retornar</a>
    @endforeach

</div>

@endsection
