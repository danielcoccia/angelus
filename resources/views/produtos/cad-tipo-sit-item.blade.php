@extends('layouts.master')

@section('title') Form Elements @endsection

@section('content')
 <!-- start page title -->
                    <div class="row">
 <!--                @component('common-components.breadcrumb')
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

                                    <h4 class="card-title">Situação do Item</h4>
                                    <hr>
                                    <!-- <p class="card-title-desc">Here are examples of <code class="highlighter-rouge">.form-control</code> applied to each textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code class="highlighter-rouge">type</code>.</p>-->

                                    <div class="form-group row">
                                        <label for="genero" class="col-sm-2 col-form-label">Nova Situação do item</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" value="" id="genero">
                                        </div>
                                    </div>                                   
                                  

                                    <div class="col-12 mt-3" style="text-align: right;">
                                        <button type="submit" class="btn btn-primary">CADASTRAR</button>
                                        <button type="button" class="btn btn-primary">LIMPAR</button>                                        
                                    </div>
                                    
                                    <br><br><hr>
                    <h4 class="card-title">Lista de Situação do Item</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Situação</th>                                                
                                                <th>Ação</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Situação 1</td>           
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Situação 2</td>              
                                                <td>
                                                    <input class="btn btn-warning" type="reset" value="Alterar">
                                                    <input class="btn btn-danger" type="submit" value="Excluir">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Situação 3</td>             
                                                <td>
                                                    <input class="btn btn-warning" type="reset" value="Alterar">
                                                    <input class="btn btn-danger" type="submit" value="Excluir">
                                                </td>
                                            </tr>                       
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

@endsection