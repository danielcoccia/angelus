@extends('layouts.master')

@section('title')Gerenciar fase etária @endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Cadastro de Fase Etária</h4>
                    <hr>
                    <form class="form-horizontal mt-4" method="POST" action="/fase-etaria/inserir">
                    @csrf
                        <div class="form-group">
                            <div class="row">
                                <label for="categoria" class="col-sm-2 col-form-label">Categoria</label>
                                <div class="col-4">
                                        <select class="form-control select2" id="categoria" name="categoria" required oninvalid="this.setCustomValidity('Campo requerido')">
                                                <option value="null">Selecione </option>
                                            @Foreach ($resultCategoria as $resultCategorias)
                                                <option value="{{$resultCategorias->id}}">{{$resultCategorias->nome}} </option>
                                            @endForeach
                                        </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label for="faseEtaria" class="col-sm-2 col-form-label">Fase Etária</label>
                                <div class="col-4">
                                    <input class="form-control" type="text" id="faseEtaria" name="faseEtaria" required oninvalid="this.setCustomValidity('Campo requerido')">
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
                    <h4 class="card-title">Lista de Fases Etárias</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Fase</th>
                                                <th>Categoria</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @Foreach ($result as $results)
                                            <tr>
                                                <td>{{$results->id}}</td>
                                                <td>{{$results->fase}}</td>
                                                <td>{{$results->categoria}}</td>
                                                <td>
                                                    <button type="button" value="{{$results->id}}" id="btnAlterarFaseEtaria" class="btn btn-warning waves-effect waves-light classBtnAlterar" data-toggle="modal" data-target=".bs-example-modal-lg">Alterar</button>
                                                    <a href="/fase-etaria/excluir/{{$results->id}}">
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
            <script src="{{ URL::asset('/js/pages/gerenciar-fase-etaria.init.js')}}"></script>

@endsection
