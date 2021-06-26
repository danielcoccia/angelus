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
                                <form class="form-horizontal mt-4" method="POST" action="/gerenciar-pagamentos/inserir">
                                    <div class="container"> 
                                        <div class="row align-items-center">
                                            <div class="col-sm">
                                                <a href="/gerenciar-pagamentos">
                                                <input class="btn btn-warning" type="button" value="Selecionar Venda">
                                                </a>                                            
                                            </div>
                                            <div class="col-sm">                                      
                                                <input class="form-control" type="text" placeholder="Vendedor:">               
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="container">
                                        <div class="row align-items-center">
                                            <div class="col-sm">                                      
                                                <input class="form-control" type="text" placeholder="ID Venda" readonly>       
                                            </div>
                                            <div class="col-sm">                                      
                                                <input class="form-control" type="text" placeholder="Data Venda" readonly>     
                                            </div>
                                            <div class="col-sm">                                      
                                                <input class="form-control" type="text" placeholder="CPF" readonly>          
                                            </div>
                                            <div class="col-sm">                                      
                                                <input class="form-control" type="text" placeholder="Nome Cliente" readonly>  
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <hr>
                            
                            <div class="container">
                                <div class="row">                                    
                                    <div class="col col-lg-6">
                                    <h6 class="font-weight-bold" style="color: blue;">LISTA DE COMPRAS</h6>                                  
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr style="background-color: #FFFFE0">
                                                <td >Qtd</td>                                               
                                                <td >05</td> 
                                                <td>Valor total</td>                                               
                                                <td >105,00</td>                                           
                                                </tr>
                                            </thead>
                                        </table> 
                                        <table class="table table-bordered">
                                            <thead class="thead-light">                                                                                           
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Produto</th>
                                                    <th scope="col">Desconto</th>
                                                    <th scope="col">Valor</th>                                                    
                                                </tr>                                                
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row"></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>                                                    
                                                </tr>                            
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col col-lg-6">
                                    <h6 class="font-weight-bold" style="color: blue;">VALOR PAGO</h6>
                                    <div class="input-group mb-3">                                                                        
                                        <div class="input-group-prepend">                                        
                                            <button style="background-color: #EEE9E9;" class="btn btn-outline-secondary" type="button">Forma de pagamento</button>
                                        </div> 
                                        <select class="custom-select" id="inputGroupSelect03" aria-label="Exemplo de select com botão addon">
                                            <option selected>Escolher...</option>
                                            <option value="1">Cartão Débito</option>
                                            <option value="2">Cartão Crédito</option>
                                            <option value="3">Dinheiro</option>
                                            <option value="4">Cheque</option>
                                            <option value="5">Pix</option>
                                        </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Valor" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <div class="input-group-append">
                                            <button style="background-color: #CAFF70;" class="btn btn-outline-secondary" type="button" id="button-addon2">>>Confirmar</button>
                                        </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <table class="table table-bordered">
                                                <thead class="thead-light" style='text-align:center;vertical-align:middle'>
                                                <h6 class="font-weight-bold" style="color: blue;">PAGAMENTOS</h6>                                                
                                                    <tr>
                                                        <th scope="col">ESPECIFICAÇÃO</th>
                                                        <th scope="col">VALOR</th>
                                                        <th scope="col">AÇÕES</th>                                                        
                                                    </tr>                                                
                                                </thead>
                                                <tbody style='text-align:center;vertical-align:middle'>
                                                    <tr>
                                                        <td scope="row"></td>
                                                        <td></td>
                                                        <td>
                                                        <a href="#" class="btn btn-danger btn-custom">
                                                           <i class="far fa-trash-alt"></i>
                                                        </a> 
                                                        </td>                                                       
                                                    </tr>                            
                                                </tbody>
                                            </table>
                                        </div>                                        
                                        <div class="input-group mb-3">
                                            <table class="table table-bordered">
                                                <h6 class="font-weight-bold" style="color: blue;">TOTAIS</h6>
                                                
                                                <tbody style='text-align:center;vertical-align:middle'>
                                                    <tr>
                                                    <td style="text-align:left;">Descontos:</td><td style="text-align:left;">R$</td></tr>
                                                    <tr style="text-align:left;"><td>Pagamentos:</td><td style="text-align:left;">R$</td></tr>
                                                    <tr style="background-color: #FFDAB9; text-align:left;"><td>Troco:</td><td style="text-align:left;">R$</td></tr>
                                                    <tr style="background-color: #F0F8FF; text-align:right;"><td>Total a pagar:</td><td style="text-align:left;">R$</td></tr>                            
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
                                        <button type="button" class="btn btn-danger">Cancelar</button>
                                        <button type="submit" class="btn btn-info">Exportar</button>
                                        <button type="button" class="btn btn-success">Finalizar</button>                                        
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
