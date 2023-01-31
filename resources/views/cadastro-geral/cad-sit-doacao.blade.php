@extends('layouts.master')

@section('title')Situação doação  @endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Cadastro Situação da Doação</h4>
                    <hr>
                    <form class="form-horizontal mt-4" method="POST" action="/cad-sit-doacao/inserir">
                        @csrf
                        <div class="form-group row">
                            <label for="doacao" class="col-sm-2 col-form-label">Nova Situação</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" value="" id="doacao" name="doacao" required oninvalid="this.setCustomValidity('Campo requerido')">
                            </div>
                        </div>

                        <div class="col-6 mt-3" style="text-align: right;">
                            <button type="submit" class="btn btn-success">CADASTRAR</button>
                        </div>
                    </form>

                    <br><hr>
                    <h4 class="card-title">Lista de Situção da Doação</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Situação</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                           <tbody>
                                             @foreach($result as $results)
                                             <tr>
                                                <td>{{$results->id}}</td>
                                                <td>{{$results->nome}}</td>
                                                 <td>
                                                     <button type="button" value="{{$results->id}}" id="btnAlterarUniMed" class="btn btn-warning waves-effect waves-light classBtnAlterar" data-toggle="modal" data-target=".bs-example-modal-lg">Alterar</button>
                                                    <a href="/cad-sit-doacao/excluir/{{$results->id}}">
                                                        <input class="btn btn-danger" type="button" value="Excluir">
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
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
            <script src="{{ URL::asset('/js/pages/gerenciar-doacao.init.js')}}"></script>

@endsection
