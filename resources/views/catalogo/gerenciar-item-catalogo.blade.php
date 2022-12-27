@extends('layouts.master')

@section('title') Gerenciar item @endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="/item-catalogo-incluir">
                        <input class="btn btn-success" type="button" value="Incluir Item Catalogo">
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
                                                <th>ID</th>
                                                <th>NOME</th>
                                                <th>CATEGORIA</th>
                                                <th>VALOR MÍNIMO</th>
                                                <th>VALOR MÉDIO</th>
                                                <th>VALOR MÁXIMO</th>
                                                <th>VALOR MARCA</th>
                                                <th>VALOR ETIQUETA</th>
                                                <th>ITEM COMPOSIÇÃO</th>
                                                <th>ATIVO</th>
                                                <th>AÇÕES</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                          @foreach($result as $results)
                                             <tr>
                                                <td>{{$results->id}}</td>
                                                <td>{{$results->nome}}</td>
                                                <td>{{$results->nome_categoria}}</td>
                                                <td>{{number_format($results->valor_minimo,2,',','.')}}</td>
                                                <td>{{number_format($results->valor_medio,2,',','.')}}</td>
                                                <td>{{number_format($results->valor_maximo,2,',','.')}}</td>
                                                <td>{{number_format($results->valor_marca,2,',','.')}}</td>
                                                <td>{{number_format($results->valor_etiqueta,2,',','.')}}</td>
                                                <td>{{$results->composicao ? 'sim' : 'não' }}</td>
                                                <td>{{$results->ativo ? 'sim' : 'não' }}</td>
                                                <td>
                                                    <a href="/item-catalogo/alterar/{{$results->id}}">
                                                        <input class="btn btn-warning btn-sm" type="button" value="Alterar">
                                                    </a>
                                                    <a href="/item-catalogo/excluir/{{$results->id}}">
                                                        <input class="btn btn-danger btn-sm" type="button" value="Excluir">
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

