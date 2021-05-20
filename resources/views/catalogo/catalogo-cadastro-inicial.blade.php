@extends('layouts.master')

@section('title') Data Tables @endsection

@section('content')

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <a href="/gerenciar-cadastro-inicial/incluir">
                                            <input class="btn btn-primary" type="button" value="Incluir Cadastro Inicial Item">
                                    </a>
                    <br><br><hr>
                        <h4 class="card-title">Lista de Itens</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nome</th>
                                                <th>Data</th>
                                                <th>Marca</th>
                                                <th>Tamanho</th>
                                                <th>Cor</th>
                                                <th>Tipo Material</th>
                                                <th>Valor Venda</th>
                                                <th>Valor Promocional</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                          @foreach($result as $results)
                                             <tr>
                                                <td>{{$results->id}}</td>
                                                <td>{{$results->nome}}</td>
                                                <td>{{$results->data_cadastro}}</td>
                                                <td>{{$results->marca}}</td>
                                                <td>{{$results->tamanho}}</td>
                                                <td>{{$results->cor}}</td>
                                                <td>{{$results->tipo_material}}</td>
                                                <td>{{$results->valor_venda}}</td>
                                                <td>{{$results->valor_venda_promocional}}</td>
                                                
                                                <td>
                                                    <a href="/item-catalogo/alterar/{{$results->id}}">
                                                        <input class="btn btn-warning" type="button" value="Alterar">
                                                    </a>
                                                    <a href="/item-catalogo/excluir/{{$results->id}}">
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

