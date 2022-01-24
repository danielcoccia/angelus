@extends('layouts.master')

@section('title') Form Elements @endsection

@section('headerCss')
    <link href="{{ URL::asset('/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="container">
    <div class="row">
        <h4 class="card-title">Alterar Cadastro inicial</h4>
    </div>
    <hr>
        <div class="form-group row">
            <label for="nome_item" class="col-sm-5 content-md-center col-form-label">ID Cadastro Inicial</label>
            <div class="col">
            <input class="form-control" type="text" id="" name="id_item" required="required" value="{{$teste[0]->id}}" placeholder="ID"readonly style="background:rgb(202, 200, 200);">
            </div>
        </div>
</div>
<div class="col">
    <div class="form-group row">
        <label for="val_minimo" class="col-sm-5 col-form-label">Nome</label>
        <div class="col">
        <input class="form-control" type="text" id="" name="nome_mat" required="required" value="{{$result[0]->nome}}" placeholder="nome" readonly style="background:rgb(202, 200, 200);">
        </div>
    </div>
</div>
</div>
    <div class="row align-items-end" style="background:#fff;">
        <div class="col">
            <form class="form-horizontal mt-4" method="POST" action="/editar-cadastro-inicial/{{$teste[0]->id}}">
            @method('PUT')
            @csrf
    <div class="row align-items-end" style="background:#fff;">
        <div class="col">
            <div class="form-group row">
                <label for="nome_item" class="col-sm-5 content-md-center col-form-label">Marca</label>
                <div class="col">
                <input class="form-control" type="text" id="" name="id_marca" required="required" value="{{$result[0]->marca}}">
                </div>
            </div>
        </div>
        <div class="col">
            <div class="form-group row">
                <label for="val_minimo" class="col-sm-5 col-form-label">Tamanho</label>
                <div class="col">
                <input class="form-control" type="text" id="" name="tamanho" required="required" value="{{$result[0]->tamanho}}">
                </div>
            </div>
        </div>
    </div>
    <div class="row align-items-end" style="background:#fff;">
        <div class="col">
            <div class="form-group row">
                <label for="nome_item" class="col-sm-5 content-md-center col-form-label">Cor</label>
                <div class="col">
                <input class="form-control" type="text" id="" name="cor" required="required" value="{{$result[0]->cor}}">
                </div>
            </div>
        </div>
        <div class="col">
            <div class="form-group row">
                <label for="val_minimo" class="col-sm-5 col-form-label">Tipo de material</label>
                <div class="col">
                <input class="form-control" type="text" id="" name="tp_material" required="required" value="{{$result[0]->tipo_material}}">
                </div>
            </div>
        </div>
    </div>
    <div class="row align-items-end" style="background:#fff;">
        <div class="col">
            <div class="form-group row">
                <label for="nome_item" class="col-sm-5 content-md-center col-form-label">Valor da venda</label>
                <div class="col">
                <input class="form-control" type="text" id="" name="v_venda" required="required" value="{{$teste[0]->valor_venda}}">
                </div>
            </div>
        </div>
    <div class="col">
            <div class="form-group row">
                <label for="val_minimo" class="col-sm-5 col-form-label">Valor venda promocional</label>
                <div class="col">
                <input class="form-control" type="text" id="" name="v_venda_p" required="required" value="{{$teste[0]->valor_venda_promocional}}">
                </div>
            </div>
        </div>
    </div>
            <div class="form-group row">
            <label for="ativo" class="col-sm-2 col-form-label">Ativo</label>
            <div class="col-sm-10">
                <input  type="checkbox" id="ativo" name="ativo" {{$edititem[0]->ativo ? 'checked' : '' }}>
            </div>
        </div>
        <div class="col-12 mt-3" style="text-align: right;">
            <input class="btn btn-success" type="submit" value="Alterar">
        </div>
    </form>
</div>
@endsection

@section('footerScript')
            <script src="{{ URL::asset('/js/pages/mascaras.init.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/busca-cep.init.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
            <script src="{{ URL::asset('/libs/select2/select2.min.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/form-advanced.init.js')}}"></script>
@endsection

