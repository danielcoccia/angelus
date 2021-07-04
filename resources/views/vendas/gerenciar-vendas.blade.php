@extends('layouts.master')

@section('title') Data Tables @endsection

@section('content')

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">                
                                    <h4 class="card-title" class="card-title" style="text-align: center; background: #088CFF; color: white;">Gerenciar Vendas</h4>
                                    <hr>
                                    <div class="container">
                                        <div class="row align-items-center">
                                            <div class="col-sm">
                                                <form>
                                                <label for="nome">Início</label>
                                                <input type="date" id="{{ request('data_inicio') }}" name="data_inicio" min="" max="">
                                                </form>
                                            </div>
                                            <div class="col-sm">
                                                <form>
                                                <label for="festa">Final</label>
                                                <input type="date" id="{{ request('data_fim') }}" name="data_fim" min="" max="">
                                                </form>
                                            </div>
                                            <div class="col-sm">
                                                <input class="form-control" type="text" placeholder="Nome do cliente">
                                            </div>
                                            <div class="col-sm">
                                                <select class="custom-select">
                                                    <label for="categoria" class="col-sm-4 col-form-label">Categoria
                                                    </label>
                                                <select class="form-control select2" id="categoria" name="categoria" required="required">                                                
                                                    <option value=""></option>
                                                </select>
                                            </div>                                                
                                        </div>
                                    </div>
                                    <br>
                                    <div class="container">
                                        <div class="row align-items-center">
                                            <div class="col-sm">
                                                <select class="custom-select">
                                                    <option selected>Situação da Venda</option>
                                                    <option value="1">Um</option>
                                                    <option value="2">Dois</option>
                                                    <option value="3">Três</option>
                                                </select>
                                            </div>         
                                            <div class="col-sm">
                                                <a href="/gerenciar-vendas">
                                                <input class="btn btn-danger" type="button" value="Limpar">
                                                </a>
                                            </div>
                                            <div class="col-sm">
                                                <a href="/gerenciar-vendas">
                                                    <input class="btn btn-info" type="button" value="Pesquisar">
                                                </a>
                                            </div>
                                            <div class="col-sm">
                                                <a href="/registrar-venda">
                                                <input class="btn btn-success" type="button" value="Nova venda +">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>                                    
                    <div class="row">
                        <div class="col-12">
                            <div class="card"><h4 class="card-title" class="card-title">Dados das vendas</h4>
                                <div class="card-body">                                    
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead style='text-align:center;vertical-align:middle'> 
                                            <tr>
                                                <th>ID Venda</th>
                                                <th>Data Venda</th>
                                                <th>Cliente</th>
                                                <th>Vendedor</th>
                                                <th>Valor Venda</th>
                                                <th>Situação</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody style='text-align:center;vertical-align:middle'>
                                          @foreach($result as $results)
                                            <tr>
                                                <td>{{$results->id}}</td>
                                                <td>{{$results->data}}</td>
                                                <td>{{$results->nome_cliente}}</td>
                                                <td>{{$results->nome_usuario}}</td>
                                                <td>{{$results->valor}}</td>
                                                <td>{{$results->sit_venda}}</td>
                                                <td>                                               
                                                    <a href="/gerenciar-vendas/edit/{{$results->id}}">
                                                        <input class="btn btn-warning" type="button" value="Alterar">
                                                    </a>
                                                    <a>
                                                        <input class="btn btn-danger" type="button" value="Excluir">
                                                    </a>
                                                    <a>
                                                        <a href="/gerenciar-pagamentos/{id}/{{$results->id}}">  
                                                        <input class="btn btn-success" type="button" value="Pagar">
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
                        <!-- end col -->

               
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