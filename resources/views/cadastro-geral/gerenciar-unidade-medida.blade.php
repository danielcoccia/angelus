@extends('layouts.master')

@section('title')Gerenciar unidade medida @endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Cadastro de Unidade de Medida</h4>
                    <hr>
                    <form class="form-horizontal mt-4" method="POST" action="/unidade-medida/inserir">
                    @csrf
                        <div class="form-group">
                            <div class="row">
                                <label for="unidade_med" class="col-sm-2 col-form-label">Nova Unidade</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" id="unidade_med" name="unidade_med" required oninvalid="this.setCustomValidity('Campo requerido')">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label for="sigla" class="col-sm-2 col-form-label">Sigla</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" id="sigla" name="sigla" required oninvalid="this.setCustomValidity('Campo requerido')">
                                </div>
                            </div>
                        </div>

                        <div class="col-6 mt-3" style="text-align: right;">
                            <button type="submit" class="btn btn-success">CADASTRAR</button>
                        </div>
                    </form>
                    <br><br><hr>
                    <h4 class="card-title">Lista de Unidade de Medida</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Unidade de Medida</th>
                                                <th>Silga</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @Foreach ($result as $results)
                                            <tr>
                                                <td>{{$results->id}}</td>
                                                <td>{{$results->nome}}</td>
                                                <td>{{$results->sigla}}</td>
                                                <td>
                                                    <button type="button" value="{{$results->id}}" id="btnAlterarUniMed" class="btn btn-warning waves-effect waves-light classBtnAlterar" data-toggle="modal" data-target=".bs-example-modal-lg">Alterar</button>
                                                    <a href="/unidade-medida/excluir/{{$results->id}}">
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
            <script src="{{ URL::asset('/js/pages/gerenciar-unidade-medida.init.js')}}"></script>

@endsection
