@extends('layouts.master')

@section('title')Gerenciar Localizador @endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Cadastro de Localizador</h4>
                    <hr>
                    <form class="form-horizontal mt-4" method="POST" action="/localizador/inserir">
                    @csrf
                        <div class="form-group">
                            <div class="row">
                                <label for="deposito" class="col-sm-2 col-form-label">Deposito</label>
                                <div class="col-4">
                                        <select class="form-control select2" id="deposito" name="deposito" required oninvalid="this.setCustomValidity('Campo requerido')">
                                                <option>Selecione </option>
                                            @Foreach ($resultDeposito as $resultDepositos)
                                                <option value="{{$resultDepositos->id}}">{{$resultDepositos->nome}} </option>
                                            @endForeach
                                        </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label for="prateleira" class="col-sm-2 col-form-label">Prateleira*</label>
                                <div class="col-4">
                                    <input class="form-control" type="text" id="prateleira" name="prateleira" required oninvalid="this.setCustomValidity('Campo requerido')">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="nivel" class="col-sm-2 col-form-label">Nível*</label>
                                <div class="col-4">
                                    <input class="form-control" type="text" id="nivel" name="nivel" required oninvalid="this.setCustomValidity('Campo requerido')">
                                </div>
                            </div>

                            <!-- <div class="row mt-3">
                                <label for="sigla" class="col-sm-2 col-form-label">Ativo</label>
                                <div class="col-4">
                                    <input class="" type="checkbox" id="ativo_marca" name="ativo_marca" checked="">
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="col-6 mt-3" style="text-align: right;">
                                <button type="submit" class="btn btn-primary">CADASTRAR</button>
                            </div>
                        </div>
                    </form>
                    <br><br><hr>
                    <h4 class="card-title">Lista de Localizadores</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Deposito</th>
                                                <th>Prateleira</th>
                                                <th>Nivel</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @Foreach ($resultLocalizador as $results)
                                            <tr>
                                                <td>{{$results->id}}</td>
                                                <td>{{$results->deposito}}</td>
                                                <td>{{$results->prateleira}}</td>
                                                <td>{{$results->nivel}}</td>
                                                <td>
                                                    <!-- <input class="btn btn-warning" type="reset" value="Alterar"> -->
                                                    <button type="button" value="{{$results->id}}" id="btnAlterarLocalizador" class="btn btn-warning waves-effect waves-light classBtnAlterar" data-toggle="modal" data-target=".bs-example-modal-lg">Alterar</button>
                                                    <a href="/localizador/excluir/{{$results->id}}">
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
            <script src="{{ URL::asset('/js/pages/gerenciar-localizador.init.js')}}"></script>

@endsection
