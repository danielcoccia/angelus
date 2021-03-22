@extends('layouts.master')

@section('title') Form Elements @endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Cadastro Tipo Estoque</h4>
                    <hr>
                    <form class="form-horizontal mt-4" method="POST" action="/cad-tipo-estoque/inserir">
                    @csrf
                        <div class="form-group row">
                            <label for="tp_estoque" class="col-sm-2 col-form-label">Novo Tipo Estoque</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="" id="tp_estoque" name="tp_estoque">
                            </div>
                        </div>

                        <div class="col-12 mt-3" style="text-align: right;">
                            <button type="submit" class="btn btn-primary">CADASTRAR</button>
                            <button type="button" class="btn btn-primary">LIMPAR</button>                                        
                        </div>
                    </form>
                    <br><br><hr>
                    <h4 class="card-title">Lista de Embalagens</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Tipo</th>                                                
                                                <th>Ação</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                             @foreach($result as $results)
                                             <tr>
                                                <td>{{$results->id}}</td>
                                                <td>{{$results->nome}}</td>                                                
                                                 <td>
                                                    <input class="btn btn-warning" type="reset" value="Alterar">
                                                    <a href="/cad-tipo-estoque/excluir/{{$results->id}}">
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
            <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>

@endsection