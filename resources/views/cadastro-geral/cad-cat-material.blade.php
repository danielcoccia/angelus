@extends('layouts.master')

@section('title')Cadastro categoria  @endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Cadastro Categoria </h4>
                    <hr>
                    <form class="form-horizontal mt-4" method="POST" action="/cad-cat-material/inserir">
                        @csrf
                        <div class="form-group row">
                            <label for="tipoMat" class="col-sm-2 col-form-label">Categoria</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" value="" name="tipoMat" id="tipoMat" required oninvalid="this.setCustomValidity('Campo requerido')">
                            </div>
                        </div>
                        <div class="col-6 mt-3" style="text-align: right;">
                            <button type="submit" class="btn btn-success">CADASTRAR</button>
                        </div>
                    </form>
                    <br>
                    <h4 class="card-title">Lista de Categorias</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="text-align:center; border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>TIPO</th>
                                                <th>AÇÃO</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($result as $results)
                                            <tr>
                                                <td>{{$results->id}}</td>
                                                <td>{{$results->nome}}</td>
                                                <td>
                                                    <button type="button" value="{{$results->id}}" id="btnAlterarGenero" class="btn btn-warning waves-effect waves-light classBtnAlterar" data-toggle="modal" data-target=".bs-example-modal-lg">Alterar</button>
                                                    <a href="/cad-cat-material/excluir/{{$results->id}}">
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
    @include('cadastro-geral/popUp-alterar')
@endsection

@section('footerScript')
            <!-- Required datatable js -->
            <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

            <!-- Datatable init js -->
            <script src="{{ URL::asset('/js/pages/cad-tipo-material.init.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>

            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="jquery.bsAlerts.js"></script>



@endsection
