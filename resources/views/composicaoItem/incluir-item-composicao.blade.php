@extends('layouts.master')

@section('title') @endsection
@section('headerCss')
    <link href="{{ URL::asset('/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row"> 
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Item<i class="mdi mdi-account-badge"></i></h4>
                    <hr>
                    <div class="card-body"> 
                        <p>Id do item:<strong> {{$resultItemComposicao[0]->id}}</strong></p>
                        <p>Nome:<strong> {{$resultItemComposicao[0]->nome}}</strong></p>
                        <p>Nome Categoria:<strong> {{$resultItemComposicao[0]->nome_categoria}}</strong></p>
                        <p>Nome Valor Mínimo:<strong> {{$resultItemComposicao[0]->valor_minimo}}</strong></p>
                        <p>Nome Valor Médip:<strong> {{$resultItemComposicao[0]->valor_medio}}</strong></p>
                        <p>Nome Valor Máximo:<strong> {{$resultItemComposicao[0]->valor_maximo}}</strong></p>
                    </div>
                    <div class="table-responsive">
                    <hr>
                    <h4 class="card-title">Composição do Item<i class="mdi mdi-account-badge"></i></h4>
                    
                        <table id="" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <!-- <th>Id</th> -->
                                                <th>Item</th>
                                                <th>Embalagem</th>
                                                <th>Uniade de Medida</th>
                                                <th>Quantidade</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                          @foreach($resultListaItensComposto as $resultListaItensCompostos)
                                             <tr>
                                                <!-- <td>{{$resultListaItensCompostos->id_item}}</td> -->
                                                <td>{{$resultListaItensCompostos->nome_item}}</td>
                                                <td>{{$resultListaItensCompostos->embalagem}}</td>
                                                <td>{{$resultListaItensCompostos->unidade_medida}}</td>
                                                <td>{{$resultListaItensCompostos->quantidade}}</td>                                                
                                                <td>                                                    
                                                    <a href="/item-composicao/excluir/{{$resultListaItensCompostos->id}}/{{$resultItemComposicao[0]->id}}">
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

        <div class="col-lg-6">
            <div class="card" >
                
                    <div class="card-body" >
                        <div class="row"> 
                            <div class="col-sm">
                              <h4 class="card-title">Cadastrar Composição de Item<i class="ion mdi mdi-account-network " ></i></h4> 
                            </div>                            
                        </div>

                        <hr>
                        <form class="form-horizontal mt-4" method="POST" action="/item-composicao/inserir"> 
                        @csrf
                        <input type="hidden" name="idItem" value="{{$resultItemComposicao[0]->id}}">
                        <div>
                            <div class="table-responsive">                                
                                <table class="table table-bordered table-striped mb-0">                                     
                                    <tr>
                                        <td>
                                            Intens
                                        </td>
                                        <td>
                                            <select class="form-control select2" name="itemComposto" id="itemComposto">
                                                <option  value="" >Selecione</option>
                                            @foreach($resultItem as $resultItens)
                                                <option  value="{{$resultItens->id}}" >{{$resultItens->nome}}</option>
                                            @endforeach 
                                            </select>                                            
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Embalagem
                                        </td>
                                        <td>
                                            <select class="form-control select2" name="embalagem" id="embalagem">
                                                <option  value="" >Selecione</option>
                                            @foreach($resultEmbalagem as $resultEmbalagens)
                                                <option  value="{{$resultEmbalagens->id}}" >{{$resultEmbalagens->nome}}</option>
                                            @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Unidade Medida
                                        </td>
                                        <td>
                                            <select class="form-control select2" name="unidade_medida" id="unidade_medida">
                                                <option  value="" >Selecione</option>
                                            @foreach($resultUniMed as $resultUniMeds)
                                                <option  value="{{$resultUniMeds->id}}" >{{$resultUniMeds->nome}} - {{$resultUniMeds->sigla}} </option>
                                            @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Quantidade
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="qtd" id="qtd">
                                        </td>
                                    </tr>
                                    
                                </table>
                            </div>

                                   <!--  <h4 class="card-title">Configurar Estoque <i class="mdi mdi-view-sequential" ></i> </h4>
                                    <hr>     -->
                                <div class="table-responsive">                            
                                <table class="table table-bordered table-striped mb-0">                               
                                </table>
                            </div>                        
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
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
            <script src="{{ URL::asset('/libs/select2/select2.min.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/form-advanced.init.js')}}"></script>

@endsection