@extends('layouts.master')

@section('title')Gerenciar pessoas  @endsection

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="/cad-pessoa">
                <input class="btn btn-success" type="button" value=" + Incluir Pessoa" style="font-size:15px;">
                </a>
                <a href="/registrar-venda">
                    <input class="btn btn-primary" type="button" value="Registrar Venda" style="font-size:15px;">
                </a>
                <br><br><hr>
                <h4 class="card-title">Lista de Pessoas</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th class="col-1">CÓDIGO</th>
                                                <th class="col">NOME</th>
                                                <th class="col">CPF</th>
                                                <th class="col">IDENTIDADE</th>
                                                <th class="col">EMAIL</th>
                                                <th class="col">AÇÕES</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                          @foreach($result as $results)
                                             <tr>
                                                <td class="col-sm-1">{{$results->id}}</td>
                                                <td class="col-4">{{$results->nome}}</td>
                                                <td class="col-1">{{$results->cpf}}</td>
                                                <td class="col-1">{{$results->identidade}}</td>
                                                <td class="col-2">{{$results->email}}</td>
                                                <td class="col-2">
                                                <a href="/pessoa/alterar/{{$results->id}}">
                                                    <input class="btn btn-warning btn-sm" type="button" value="Alterar">
                                                </a>
                                                <a href="/pessoa/excluir/{{$results->id}}">
                                                    <input class="btn btn-danger btn-sm" type="button" value="Excluir">
                                                </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end col -->
                </div>
        </div>
    </div><!-- end col -->
</div><!-- end row -->

@endsection

@section('footerScript')
            {{-- Required datatable js--}}
           <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

            <!-- Datatable init js -->
             <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>

@endsection
