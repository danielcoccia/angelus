@extends('layouts.master')

@section('title') Gerenciar Descontos @endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="/criar-desconto">
                        <input class="btn btn-success" type="button" value="Incluir Desconto">
                </a>
                    <br><br><hr>
                        <h4 class="card-title">Lista de Descontos</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="text-align:center; border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>CATEGORIA</th>
                                                <th>DATA INÍCIO</th>
                                                <th>DATA FIM</th>
                                                <th>PORCENTAGEM</th>
                                                <th>ATIVO?</th>
                                                <th>USUÁRIO</th>
                                                <th>DATA REGISTRO</th>
                                                <th>AÇÕES</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                          @foreach($result as $results)
                                             <tr>
                                                <td>{{$results->id}}</td>
                                                <td>{{$results->nome1}}</td>
                                                <td>{{$results->data_inicio}}</td>
                                                <td>{{$results->data_fim}}</td>
                                                <td>{{$results->porcentagem}} por cento</td>
                                                <td>{{$results->ativo ? 'Sim' : 'Não' }}</td>
                                                <td>{{$results->nome2}}</td>
                                                <td>{{$results->data_registro}}</td>
                                                <td class="col-2">
                                                    <a href="/desconto-alterar/{{$results->id}}" style="">
                                                        <button class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></button>
                                                    </a>

                                                    <a href="/desconto/excluir/{{$results->id}}" style="" >
                                                        <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                                                    </a>
                                                    @if ($results->ativo == '1')
                                                    <a href="/desconto/inativar/{{$results->id}}" style="">
                                                        <button class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Inativar"><i class="fas fa-lock-open"></i></button>
                                                    </a>

                                                    @elseif ($results->ativo == '0')
                                                    <a href="/desconto/ativar/{{$results->id}}" style="">
                                                        <button class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top" title="Ativar"><i class="fas fa-lock"></i></button>
                                                    </a>
                                                    @endif
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

            </div>
        </div>
    </div>
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

