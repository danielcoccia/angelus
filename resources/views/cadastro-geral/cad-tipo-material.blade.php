@extends('layouts.master')

@section('title')Tipo material @endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Cadastro de Tipo Material</h4>
                    <hr>
                    <form class="form-horizontal mt-4" method="POST" action="/cad-tipo-material/inserir">
                    @csrf
                        <div class="form-group">
                            {{--<div class="row">
                                <label for="categoria" class="col-sm-2 col-form-label">Categoria</label>
                                <div class="col-4">
                                        <select class="form-control select2" id="categoria" name="categoria" required oninvalid="this.setCustomValidity('Campo requerido')">
                                                <option>Selecione </option>
                                            @Foreach ($resultCategoria as $resultCategorias)
                                                <option value="{{$resultCategorias->id}}">{{$resultCategorias->nome}} </option>
                                            @endForeach
                                        </select>
                                </div>
                            </div>--}}
                            <div class="row mt-3">
                                <label for="tp_mat" class="col-sm-2 col-form-label">Tipo Material</label>
                                <div class="col-4">
                                    <input class="form-control" type="text" id="" name="tp_mat" required oninvalid="this.setCustomValidity('Campo requerido')">
                                </div>
                                <div class="col-5">
                                <label for="sigla" class="col-sm-2 col-form-label">Ativo</label>
                                    <input class="" type="checkbox" id="" name="ativo_tp_mat" checked="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mt-3" style="text-align: right;">
                                <button type="submit" class="btn btn-success">CADASTRAR</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <h4 class="card-title">Lista de Tipos de Material</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tipo Material</th>
                                                <th>Categoria</th>
                                                <th>Ativo?</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @Foreach ($result as $results)
                                            <tr>
                                                <td>{{$results->id}}</td>
                                                <td>{{$results->tp_mat}}</td>
                                                <td>{{$results->categoria}}</td>
                                                <td>{{$results->ativo}}</td>
                                                <td>
                                                    <button type="button" value="{{$results->id}}" id="btnAlterarTipo" class="btn btn-warning waves-effect waves-light classBtnAlterar" data-toggle="modal" data-target=".bs-example-modal-lg">Alterar</button>
                                                    <a href="/cad-tipo-material/excluir/{{$results->id}}">
                                                        <input class="btn btn-danger" type="button" value="Excluir">
                                                    </a>
                                                </td>
                                            </tr>
                                            @endForeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('cadastro-geral/popUp-alterar')
@endsection

@section('footerScript')
            <!-- Required datatable js -->
            <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

            <!-- Datatable init js -->
            <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/gerenciar-marca.init.js')}}"></script>
@endsection
