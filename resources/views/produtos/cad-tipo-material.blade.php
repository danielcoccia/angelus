@extends('layouts.master')

@section('title') Form Elements @endsection

@section('content')



 <!-- start page title -->
                    <div class="row">
<!--                 @component('common-components.breadcrumb')
                     @slot('title') Cadastro de Usuario  @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') Forms  @endslot
                     @slot('li3') Form Elements @endslot
                @endcomponent
 -->                
                   
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Cadastro Tipo Material</h4>
                                    <hr>
                                    <!-- <p class="card-title-desc">Here are examples of <code class="highlighter-rouge">.form-control</code> applied to each textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code class="highlighter-rouge">type</code>.</p>-->
                                    <!-- <form action="cad-tipo-material/inserir" method="POST"> -->
                                    <form class="form-horizontal mt-4" method="POST" action="/cad-tipo-material/inserir">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="tipoMat" class="col-sm-2 col-form-label">Novo Tipo</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" value="" name="tipoMat" id="tipoMat">
                                        </div>
                                    </div>                                   
                                  

                                    <div class="col-12 mt-3" style="text-align: right;">
                                        <button type="submit" class="btn btn-primary">CADASTRAR</button>
                                        <!-- <button type="button" id='limpar' class="btn btn-primary">LIMPAR</button>                                         -->
                                    </div>
                                </form>

                        <br><br><hr>
                        <h4 class="card-title">Lista de Tipo</h4>
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
                                                    <a href="/cad-tipo-material/excluir/{{$results->id}}">
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
            <script src="{{ URL::asset('/js/pages/cad-tipo-material.init.js')}}"></script>            
            <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>

@endsection