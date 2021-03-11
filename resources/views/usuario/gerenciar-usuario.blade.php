@extends('layouts.master')

@section('title') Data Tables @endsection

@section('content')
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <a href="/usuario-incluir">
                                            <input class="btn btn-primary" type="button" value="Incluir Usuário">
                                    </a>
                    <br><br><hr>
                        <h4 class="card-title">Lista de Usuário</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Ativo</th>
                                                <th>Bloqueado</th>
                                                <th>Data Ativação</th>         
                                                <th>Ação</th>

                                                                                                
                                            </tr>
                                        </thead>

                                        <tbody>
                                          @foreach($result as $results)
                                             <tr>
                                                <td>{{$results->id}}</td>
                                                <td>{{$results->ativo ? 'sim' : 'não' }}</td>
                                                <td>{{$results->bloqueado ? 'sim' : 'não' }}</td>
                                                <td>{{$results->data_ativacao}}</td>
                                                <td>
                                                    <a href="/usuario/alterar/{{$results->id}}">
                                                        <input class="btn btn-warning" type="button" value="Alterar">
                                                    </a>
                                                    <a href="/usuario/excluir/{{$results->id}}">
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