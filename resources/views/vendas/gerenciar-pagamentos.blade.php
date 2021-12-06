@extends('layouts.master')

@section('title') Form Elements @endsection

@section('headerCss')
    <link href="{{ URL::asset('/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" class="card-title" style="text-align: center; background: #088CFF; color: white;">Registrar Pagamento</h4>
                    <hr>
                    <!-- <p class="card-title-desc">Here are examples of <code class="highlighter-rouge">.form-control</code> applied to each textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code class="highlighter-rouge">type</code>.</p>-->
                               
                                    <div class="container"> 
                                        <div class="row align-items-center">
                                        </table> 
                                        <table class="table table-bordered">
                                            <thead class="table-success">
                                                <tr>
                                                    <th class="text-center">ID VENDA</th>
                                                    <th class="text-center">DATA DA VENDA</th>
                                                    <th class="text-center">CPF DO CLIENTE</th>
                                                    <th class="text-center">NOME DO CLIENTE</th>                                                    
                                                </tr>                                                
                                            </thead>
                                            <tbody>
                                                @foreach($vendas as $v)
                                                <tr>
                                                    <td class="text-center">{{$v->idv}}</td>
                                                    <td class="text-center">{{$v->data}}</td>
                                                    <td class="text-center">{{$v->cpf}}</td>
                                                    <td class="text-center">{{$v->nomepes}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                           
                                        </div>
                                    </div>
                            
                            <hr>
                            
                            <div class="container">
                                <div class="row">                                   
                                    <div class="col col-lg-6">
                                    <h6 class="font-weight-bold" style="color: blue;">LISTA DE COMPRAS</h6>                                  
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr style="background-color: #FFDAB9; text-align:center; ">
                                                <td style=text-align:right>QUANTIDADE</td>                                               
                                                <td style=font-size:18px;>{{$total_itens}}</td> 
                                                <td style=text-align:right>VALOR TOTAL</td>                                               
                                                <td style=font-size:18px;>{{number_format($total_preco,2,',','.')}}</td>                                          
                                                </tr>
                                            </thead>
                                        </table> 
                                        <table class="table table-bordered">
                                            <thead class="table-success" style= "text-align:center;">
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">PRODUTO</th>
                                                    <th scope="col">DESCONTO</th>
                                                    <th scope="col">VALOR</th>                                                    
                                                </tr>                                                
                                            </thead>
                                            <tbody>
                                            @foreach($itens_compra as $ic)
                                                <tr>
                                                    <td>{{$ic->id_item_material}}</td>
                                                    <td>{{$ic->nomemat}}</td>
                                                    <td></td>
                                                    <td>{{number_format($ic->valor_venda,2,',','.')}}</td>                                             
                                                </tr>
                                            @endforeach                            
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col col-lg-6">
                                    <h6 class="font-weight-bold" style="color: blue;">REGISTRAR PAGAMENTOS</h6>
                                    <form class="form-horizontal mt-4" method="POST" action="/gerenciar-pagamentos/inserir">
                                    @csrf
                                    <div class="input-group mb-3"> 
                                        <div class="col-lg-3">
                                        @foreach($vendas as $v)                                            
                                        ID VENDA<input type="numeric" class="form-control" value="{{$v->idv}}" id="id" name="id">
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">                                        
                                            <button style="background-color: #EEE9E9;" class="btn btn-outline-secondary" type="button">Forma de pagamento</button>
                                        </div>
                                    
                                     
                                        <select class="form-control" id="forma" name="forma" required="required">
                                            <option>Escolher...</option>
                                            @foreach($tipos_pagamento as $tp)
                                            <option value="{{$tp->id}}">"{{$tp->nome}}"</option>
                                            @endforeach
                                        </select>                                    
                                    </div>
                                        <div class="input-group mb-3">
                                            <input type="numeric" class="form-control" id="valor" name="valor" placeholder="Valor">
                                        <div class="input-group-append">
                                            <button type="submit" style="background-color: #CAFF70;" class="btn btn-outline-secondary"  id="button-addon2">>>Confirmar</button>
                                    </form>
                                        </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <table class="table table-bordered">
                                            <h6 class="font-weight-bold" style="color: blue;">PAGAMENTOS REALIZADOS</h6>
                                                <thead class="table-success" style='text-align:center;vertical-align:middle'>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">ESPECIFICAÇÃO</th>
                                                        <th scope="col">VALOR</th>
                                                        <th scope="col">AÇÕES</th>                                                        
                                                    </tr>                                                
                                                </thead>
                                                <tbody style='text-align:center;vertical-align:middle'>
                                                
                                                
                                                
                                                @foreach($pagamentos as $pg)

                                                <form action="/gerenciar-pagamentos/excluir/{{$pg->pid}}" method="POST">
                                                @csrf
                                                @method('DELETE')                                                
                                                    <tr> 
                                                        <td>{{$pg->pid}}</td>
                                                        <td>{{$pg->nome}}</td>
                                                        <td>{{number_format($pg->valor,2,',','.')}}</td>
                                                        <td>                                                       
                                                        <button type="submit" class="btn btn-danger btn-custom"><i class="far fa-trash-alt"></i></a> 
                                                        </td>
                                                    </tr>
                                                     
                                                </form> @endforeach                  
                                                </tbody>
                                            </table>
                                            
                                        </div>                                        
                                        <div class="input-group mb-3">
                                            <table class="table table-bordered">
                                                <h6 class="font-weight-bold" style="color: blue;">CÁCULOS DA VENDA</h6>
                                                <tbody style='text-align:center;vertical-align:middle; font-size:15px;'>
                                                    <tr>
                                                    <td style="text-align:left;">Descontos:</td><td style="text-align:left;">R$</td></tr>
                                                    <tr style="text-align:left;"><td>Pagamentos:</td><td style="text-align:left;">{{number_format($total_pago,2,',','.')}}</td></tr>
                                                    <tr style="background-color: #FFDAB9; text-align:left;"><td>Troco:</td><td style="text-align:left;">
                                                    @if($total_pago <= $total_preco)
                                                    {{0,00}}        
                                                    @elseif ($total_pago > $total_preco)
                                                    {{number_format($troco,2,',','.')}}
                                                    @endif</td>
                                                    </tr>
                                                    <tr style="background-color: #FFFF00; text-align:right;font-weight:bold;"><td>Total da venda:</td><td style="text-align:left;font-size:18px;">{{$total_preco}}</td></tr>                            
                                                </tbody>
                                            </table>
                                        </div>      
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 mt-3" style="text-align: right;">
                                        <a href="/gerenciar-vendas"  type="button" class="btn btn-danger">Cancelar</a>
                                        <button type="submit" class="btn btn-info">Exportar</button>
                                        
                                        <a href="/gerenciar-pagamentos/" value="" type="button" class="btn btn-danger">Concluir</a>
                                     
                                    </div>
                                </div>
                            </div>
                    </div>                                                    
            </div>
        </div>
    </div>
@endsection

@section('footerScript')
            <script src="{{ URL::asset('/js/pages/mascaras.init.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/busca-cep.init.js')}}"></script>            
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
            <script src="{{ URL::asset('/libs/select2/select2.min.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/form-advanced.init.js')}}"></script>
@endsection
