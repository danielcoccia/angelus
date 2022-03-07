
@extends('layouts.master')
<<<<<<< HEAD

@section('title') Gerenciar Pagamento @endsection

@section('content')

<div>

    <h3 style="color:rgb(243, 45, 45)">"O valor selecionado ultrapassa a soma do valor dos itens"</h3>
    <br>
    @foreach($vendas as $vd)
    <a href="/gerenciar-pagamentos/{{$vd->id}}"  type="button" class="btn btn-danger">Retornar</a>
    @endforeach

=======
@section('content')
<div>
<h1>O valor foi rejeitado pois ultrapassa o valor da compra.</h1>
</div>
<div>
    <a href="/gerenciar-vendas" type="button" class="btn btn-danger">Retornar</a>
>>>>>>> master
</div>

@endsection
