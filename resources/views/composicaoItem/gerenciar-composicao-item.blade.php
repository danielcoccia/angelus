@extends('layouts.master')

@section('title')Gerenciar Composição @endsection

@section('content')

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
<!--                                     <a href="/item-composicao-incluir">
                                            <input class="btn btn-primary" type="button" value="Incluir Composição de Item do Catalogo">
                                    </a> -->
                    <br><br><hr>
                        <h4 class="card-title">Lista de Itens de Composição</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">


                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nome</th>
                                                <th>Categoria</th>
                                                <th>Valor Mínimo</th>
                                                <th>Valor Medio</th>
                                                <th>Valor Máximo</th>
                                                <th>Item Composição</th>
                                                <th>Ativo</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                          @foreach($result as $results)
                                             <tr>
                                                <td>{{$results->id}}</td>
                                                <td>{{$results->nome}}</td>
                                                <td>{{$results->nome_categoria}}</td>
                                                <td>{{$results->valor_minimo}}</td>
                                                <td>{{$results->valor_medio}}</td>
                                                <td>{{$results->valor_maximo}}</td>
                                                <td>{{$results->composicao ? 'sim' : 'não' }}</td>
                                                <td>{{$results->ativo ? 'sim' : 'não' }}</td>
                                                <td>
<!--                                                     <a href="/item-catalogo/alterar/{{$results->id}}">
                                                        <input class="btn btn-warning" type="button" value="Alterar">
                                                    </a>
                                                    <a href="/item-catalogo/excluir/{{$results->id}}">
                                                        <input class="btn btn-danger" type="button" value="Excluir">
                                                    </a> -->
                                                    <a href="/item-composicao/incluir/{{$results->id}}">
                                                        <input class="btn btn-primary" type="button" value="incluir">
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

