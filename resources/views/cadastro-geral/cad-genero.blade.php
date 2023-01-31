@extends('layouts.master')

@section('title')Cadastro de gênero  @endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Cadastro Genero</h4>
                    <hr>
                    <form class="form-horizontal mt-4" method="POST" action="/cad-genero/inserir">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <label for="genero" class="col-sm-2 col-form-label">Novo Genero</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="" id="genero" name="genero" required oninvalid="this.setCustomValidity('Campo requerido')">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label for="siglaGenero" class="col-sm-2 col-form-label">Sigla</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" maxlength="1" value="" id="siglaGenero" name="siglaGenero" required oninvalid="this.setCustomValidity('Campo requerido')">
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mt-3" style="text-align: right;">
                        <button type="submit" class="btn btn-success">CADASTRAR</button>
                    </div>
                    <br>
                    <h4 class="card-title">Lista de Generos</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nome</th>
                                                <th>Sigla</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($result as $results)
                                             <tr>
                                                <td>{{$results->id}}</td>
                                                <td>{{$results->nome}}</td>
                                                <td>{{$results->sigla}}</td>
                                                 <td>
                                                    <button type="button" value="{{$results->id}}" id="btnAlterarGenero" class="btn btn-warning waves-effect waves-light classBtnAlterar" data-toggle="modal" data-target=".bs-example-modal-lg">Alterar</button>
                                                    <a href="/cad-genero/excluir/{{$results->id}}">
                                                        <input class="btn btn-danger" type="button" value="Excluir">
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
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
    @include('/cadastro-geral/popUp-alterar')
@endsection

@section('footerScript')
            <!-- Required datatable js -->
            <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

            <!-- Datatable init js -->
            <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/gerenciar-genero.init.js')}}"></script>
@endsection
