@extends('layouts.master')

@section('title') Incluir Cadastro Inicial @endsection

@section('headerCss')
    <link href="{{ URL::asset('/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Cadastro Inicial de Item</h4>
                <hr>
                <form class="form-horizontal mt-4" method="POST" action="/cad-inicial-material/inserir">
                @csrf
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="item_material" class="col-sm-4 col-form-label">Item Material*</label>
                            <select class="form-control select2" id="item_material" name="item_material" required="required">
                                <option value="">Selecione</option>
                                @foreach($resultItem as $resultItens)
                                <option value="{{$resultItens->id}}">{{$resultItens->id}} / {{$resultItens->categoria}} / {{$resultItens->nome}}</option>
                                @endforeach
                            </select>
                            <div id="btnComposicao" class="col-12 mt-3" style="text-align: right;"></div>
                            <hr>
                            <div id="DivFormComplemento"></div>
                            <hr>
                            <div id="DivValor"></div>

                        </div>

                        <div class="col-sm-6">
                           <div id="DivCategoria"></div>
                           <hr>
                            <div id="DivFormFinal"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label id="labelMArca" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <div id="divComboMarca"></div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Composição de Itens</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="divComposicao">
            </div>
        </div>
    </div>
</div>
@endsection

@section('footerScript')
            <script src="{{ URL::asset('/js/pages/mascaras.init.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
            <script src="{{ URL::asset('/libs/select2/select2.min.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/form-advanced.init.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/cadastro-inicial.init.js')}}"></script>
@endsection

