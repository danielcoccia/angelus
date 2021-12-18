<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demonstrativo</title>
</head>
<body>
Descrição de compras no Bazar da Comunhão Espírita
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

                    <form action="/gerenciar-pagamentos/{{$pg->pid}}" method="POST">
                    @csrf
                    @method('DELETE')                                                
                        <tr> 
                            <td>{{$pg->pid}}</td>
                            <td>{{$pg->nome}}</td>
                            <td>{{number_format($pg->valor,2,',','.')}}</td>
                            <td>                                                       
                            <button type="submit" class="btn btn-danger btn-sm" font-size= 50px><i class="far fa-trash-alt"></i></a> 
                            </td>
                        </tr>
                            
                    </form> @endforeach                  
                    </tbody>
                </table>
                
            </div>                                        
            <div class="input-group mb-3">
                <table class="table table-bordered">
                    <h6 class="font-weight-bold" style="color: blue;">CÁLCULOS DA VENDA</h6>
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
                        <tr style="background-color: #FFFF00; text-align:right;font-weight:bold;"><td>Total da venda:</td><td style="text-align:left;font-size:18px;">{{number_format($total_preco,2,',','.')}}</td></tr>                            
                    </tbody>
                </table>
            </div>      
        </div>
    </div>
</div>

@section('footerScript')
            <script src="{{ URL::asset('/js/pages/mascaras.init.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/busca-cep.init.js')}}"></script>            
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
            <script src="{{ URL::asset('/libs/select2/select2.min.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/form-advanced.init.js')}}"></script>
@endsection
 
</body>
</html>