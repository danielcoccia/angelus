@extends('layouts.master')

@section('title') Gerenciar usuários @endsection

@section('content')
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <a href="/usuario-incluir">
                                            <input class="btn btn-success" type="button" value="Incluir Usuário">
                                    </a>
                    <br><hr>
                        <h4 class="card-title">Lista de Usuário</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">


                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>NOME</th>
                                                <th>CPF</th>
                                                <th>ATIVO</th>
                                                <th>BLOQUEADO</th>
                                                <th>DATA ATIVAÇÃO</th>
                                                <th>AÇÃO</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                          @foreach($result as $results)
                                             <tr>
                                                <td>{{$results->nome}}</td>
                                                <td>{{$results->cpf}}</td>
                                                <td>{{$results->ativo ? 'sim' : 'não' }}</td>
                                                <td>{{$results->bloqueado ? 'sim' : 'não' }}</td>
                                                <td>{{$results->data_ativacao}}</td>
                                                <td>
                                                    <a href="/usuario/alterar/{{$results->id}}">
                                                        <input class="btn btn-warning btn-sm" type="button" value="Alterar">
                                                    </a>
                                                    <a href="/usuario/excluir/{{$results->id}}">
                                                        <input class="btn btn-danger btn-sm" type="button" value="Excluir">
                                                    </a>
                                                     <a href="/usuario/gerar-Senha/{{$results->id_pessoa}}">
                                                        <input class="btn btn-primary btn-sm" type="button" value="Gerar Senha">
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach

                                            @if(session('mensagem'))
                                                <div class="alert alert-success">
                                                    <p>{{session('mensagem')}}</p>
                                                </div>
                                            @endif

                                            @if(session('mensagemErro'))
                                                <div class="alert alert-success">
                                                    <p>{{session('mensagemErro')}}</p>
                                                </div>
                                            @endif
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
