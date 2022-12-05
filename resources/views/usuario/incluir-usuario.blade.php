@extends('layouts.master')

@section('title') Incluir usuário @endsection

@section('content')
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <!-- <form class="form-horizontal mt-4" method="POST" action="/pesquisar-entidade">
                                        @csrf
                                    <div class="row">
									   	<div class="col-md-4">
									    	<label for="cnpj" class="form-label">Cnpj</label>
									    	<input type="text" class="form-control" id="cnpj" name="cnpj">
									  	</div>
									  	<div class="col-md-4">
									    	<label for="nome_fantasia" class="form-label">Nome Fansasia</label>
									    	<input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia">
									  	</div>
									</div>
									<div class="col-12 mt-3">
									    <button type="submit" class="btn btn-primary">Pesquisar</button>

                                        <a href="/usuario-incluir">
                                            <input class="btn btn-primary" type="button" value="Incluir Novo">
                                        </a>
								  	</div>
                                </form>      -->
                        <h4 class="card-title">Selecionar Pessoa</h4>
                    <hr>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body"> <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>ID</th>
                                                <th>NAME</th>
                                                <th>CPF</th>
                                                <th>IDENTIDADE</th>
                                                <th>EMAIL</th>
                                                <th>AÇÃO</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                          @foreach($result as $results)
                                             <tr>
                                                <td>{{$results->id}}</td>
                                                <td>{{$results->nome}}</td>
                                                <td>{{$results->cpf}}</td>
                                                <td>{{$results->identidade}}</td>
                                                <td>{{$results->email}}</td>
                                                 <td style="text-align: center;">
                                                    <a href="cadastrar-usuarios/configurar/{{$results->id}}">
                                                        <input class="btn btn-info" type="button" value="Selecionar">
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
