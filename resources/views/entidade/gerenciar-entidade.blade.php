@extends('layouts.master')

@section('title') Data Tables @endsection

@section('content')
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                            <br>

                                        @csrf
                                    <a href="/cad-entidade">
                                        <input class="btn btn-primary" type="button" value="Incluir Entidade">
                                    </a>


                                <hr>
                        <h4 class="card-title">Entidades cadastradas</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">


                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="text-align:center; border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>CNPJ</th>
                                                <th>Nome Fantasia</th>
                                                <th>Email</th>
                                                <th>Contato</th>
                                                <th>Ação</th>


                                            </tr>
                                        </thead>

                                        <tbody>
                                          @foreach($result as $results)
                                             <tr>
                                                <td>{{$results->id}}</td>
                                                <td>{{$results->cnpj}}</td>
                                                <td>{{$results->nome_fantasia}}</td>
                                                <td>{{$results->email_contato}}</td>
                                                <td>{{$results->nome_contato}}</td>
                                                 <td>
                                                    <a href="/entidade/alterar/{{$results->id}}">
                                                        <input class="btn btn-warning" type="button" value="Alterar">
                                                    </a>
                                                    <a href="/entidade/excluir/{{$results->id}}">
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
                        <!-- end col -->
                    </div>
                        <!-- end col -->
                    </div>

                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
@endsection

@section('footerScript')
            <!-- Required datatable js -->
           <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

            <!-- Datatable init js -->
            <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>
            <script src="{{ URL::asset('/libs/select2/select2.min.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/form-advanced.init.js')}}"></script>

@endsection
