<div>
    <table class="table table-bordered" style="display: none;">
        <thead class="thead-light">
            <tr style="background-color: #FFFFE0">
            <td >Qtd</td>
            <td >Valor Unit.</td>
            <td >Valor total</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input class="form-control" value="1" type="text" name="qtd_item" id="qtd_item" placeholder="Qtd" readonly>
                </td>
                <td>
                    <input class="form-control" value="" type="text" name="vlr_unit" id="vlr_unit" placeholder="Vlr. Unit." readonly>
                </td>
                <td>
                    <input class="form-control" value="" type="text" name="vlr_total" id="vlr_total" placeholder="Vlr. Total" readonly>
                </td>
            </tr>
        </tbody>

    </table>
    <table class="table-sm col-12 table-bordered">
        <thead class="thead-light">
        <h6 style="color: blue;">LISTA DE COMPRAS</h6>
        <br>
            <tr style="background: #f3f3f3;">
                <th scope="col" class="col-2">ID</th>
                <th scope="col" class="col-6">PRODUTO</th>
                <!-- <th scope="col">Desconto</th> -->
                <th scope="col" class="col-1">QTD</th>
                <th scope="col" class="col-2">VALOR</th>
                <th scope="col" class="col-1">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <?php $tot = floatval("0"); $qtde = 0 ?>
            @foreach($listaItemVenda as $listaItemVendas)
            <tr>
                <td scope="row">{{$listaItemVendas->id}}</td>
                <td>{{$listaItemVendas->nome}}</td>
                <!-- <td>0</td> -->
                <td>{{$listaItemVendas->qtd}}</td>
                <?php $tot += floatval($listaItemVendas->valor_venda); $qtde++; ?>
                <td>R$ {{$listaItemVendas->valor_venda}}</td>
                <td>
                    <button type="button" value="{{$listaItemVendas->id}}"  class="btn btn-danger btn-custom btnRemoveItem"><i class="far fa-trash-alt"></i></button>
                </td>

            </tr>
            @endforeach
        </tbody>
        <tfooter>
            <td colspan="2">TOTAL:</td>
            <td>{{$qtde}}</td>
            <td>R$ <span id="vlrTotalVenda">{{number_format($tot,2,'.','.')}}</span></td>
            <td>&nbsp;</td>
        </tfooter>
    </table>
</div>
