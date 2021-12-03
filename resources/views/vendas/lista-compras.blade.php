<div class="col col-lg-6">                                  
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr style="background-color: #FFFFE0">
            <td >Qtd</td>                                               
            <td >Qtd</td> 
            <td >Valor total</td>                                               
            <td >Valor total</td>                                           
            </tr>
        </thead>
    </table> 
    <table class="table table-bordered">
        <thead class="thead-light">
        <h6 style="color: blue;">LISTA DE COMPRAS</h6>                                                
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Produto</th>
                <th scope="col">Desconto</th>
                <th scope="col">Valor</th>
                <th scope="col">Ações</th>
            </tr>                                                
        </thead>
        <tbody>
            @foreach($listaItemVenda as $listaItemVendas)
            <tr>
                <td scope="row">{{$listaItemVendas->id}}</td>
                <td>{{$listaItemVendas->nome}}</td>
                <td>0</td>
                <td>{{$listaItemVendas->valor_venda_promocional}}</td>
                <td> 
                    <a href="#" class="btn btn-danger btn-custom">
                       <i class="far fa-trash-alt"></i>
                    </a>                                                        
                </td>
                
            </tr>
            @endforeach          
        </tbody>
    </table>
</div>   