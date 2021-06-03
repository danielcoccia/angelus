@extends('layouts.master')

@section('title') Data Tables @endsection

@section('content')
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
                            <label for="tipoMat" class="col-sm-2 col-form-label">Nova Categoria</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" value="" name="tipoMat" id="tipoMat" required oninvalid="this.setCustomValidity('Campo requerido')">
                            </div>
                        </div>
                        <div class="col-6 mt-3" style="text-align: right;">
                            <button type="submit" class="btn btn-primary">CADASTRAR</button>
                        </div>
                    </form>
                <a href="/gerenciar-cadastro-inicial/incluir">
                        <input class="btn btn-primary" type="button" value="Incluir Cadastro Inicial Item">
                </a>
                <br><br><hr>
                <h4 class="card-title">Lista de Categorias</h4>
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
                                            <th>Liberacao Venda</th>
                                            <th>Ação</th>
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
                                            <td>{{$results->liberacao_venda}}</td>
                                            <td>
                                                <input class="btn btn-warning" type="reset" value="Alterar">
                                                <a href="/gerenciar-cadastro-inicial/excluir/{{$results->id}}">
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
@endsection

@section('footerScript')
 <!-- Required datatable js -->
            <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>
           
            <!-- Datatable init js -->
            <script src="{{ URL::asset('/js/pages/cad-tipo-material.init.js')}}"></script>            
            <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>
@endsection

