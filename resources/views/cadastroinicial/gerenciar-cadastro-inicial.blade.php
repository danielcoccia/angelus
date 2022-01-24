@extends('layouts.master')

@section('title') Data Tables @endsection

@section('content')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="text-align: center; background: #088CFF; color: white;">Cadastro inicial</h4>
                    <hr>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-sm">
                                <form>
                                <label for="" class="form-label">Data inicial</label>
                                <input type="date" id="festa" name="Data" min="" max="">

                            </div>
                            <div class="col-sm">

                                <label for="" class="form-label">Data Final</label>
                                <input type="date" id="festa" name="Data" min="" max="">

                            </div>
                            <div class="col-sm">
                                <select class="form-control"><option>Selecione a Categoria</option>
                                @Foreach($resultCategoria as $resultCategorias)
                                <option value="{{$resultCategorias->id}}">{{$resultCategorias->nome}}</option>
                                @endForeach
                                </select>
                            </div>
                            <div class="col-sm">
                                <select class="form-control"><option>Selecione a Situação</option>
                                @Foreach($resultSitMat as $resultSitMats)
                                <option value="{{$resultSitMats->id}}">{{$resultSitMats->nome}}</option>
                                @endForeach
                                </select>
                            </div>
                            <div class="col-1">
                                Doado<br><input type="checkbox" id="switch3" switch="bool" checked/>
                                <label for="switch3" data-on-label="Sim" data-off-label="Não"></label>
                            </div>
                        </div>
                    </div>
                                <br>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <input class="form-control" type="text" placeholder="Nome do material">
                            </div>

                            <div class="col-1">
                                <input class="btn btn-danger" type="reset" value="Limpar"></a>
                            </div>
                            <div class="col-md-2 text-center">
                                <a href=""><input class="btn btn-primary" type="button" value="Pesquisar"></a>
                            </div>
                            </form>
                            <div class="col-2">
                                <a href="/gerenciar-cadastro-inicial/incluir"><input class="btn btn-success" type="button" value="Novo Cadastro +"></a>
                            </div>
                            <div class="col-3">
                                <a href="/barcode">
                                <input class="btn btn-info" type="button" value="Cód Barras da pesquisa">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
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
                                                <a href="/editar-cadastro-inicial/{{$results->id}}">
                                                <input class="btn btn-warning" type="button" value="Alterar">
                                                </a>
                                                <a href="/gerenciar-cadastro-inicial/excluir/{{$results->id}}">
                                                    <input class="btn btn-danger" type="button" value="Excluir">
                                                </a>
                                                <a href="/item_material/{{$results->id}}">
                                                    <input class="btn btn-info" type="button" value="Cód Barras">
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

