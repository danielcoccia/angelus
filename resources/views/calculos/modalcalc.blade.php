
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mt-0" id="title-calcular" style="color:#000;">Calcular o troco</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div>
                    <h5 class="modal-title mt-0" id="title-calcular" style="color:rgb(255, 0, 0); text-align:center;">Primeiro registre o pagamento em dinheiro</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                                <div class="row align-items-center">
                                    <div class="col" style ="text-align:right; font-size: 15px; color:#000;">Valor Total da venda R$</div>
                                    <div class="col"><input style = "width: 100px; color:#000; background-color:rgb(245, 248, 33); font-size: 16px; text-align:center; font-weight:bold;" type="numeric" value="{{number_format($total_preco,2,',','.')}}" id="" disabled=""/></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col" style ="text-align:right; font-size: 15px; color:#000;">A pagar em dinheiro R$</div>
                                    <div class="col"><input style = "width: 100px; color:#000; background-color:rgb(245, 248, 33); font-size: 16px; text-align:center; font-weight:bold;" type="numeric" value="{{number_format($total_especie,2,',','.')}}" id="campo2" disabled=""/></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col" style ="text-align:right; font-size: 15px; color:#000; ">Recebido em espécie R$</div>
                                    <div class="col"><input style = "width: 100px; color:#000; background-color:rgb(255, 255, 255); font-size: 16px; text-align:center; font-weight:bold;" type="numeric" value="0.00" id="campo1" /></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col" style ="text-align:right; font-size: 15px; color:#000; ">Valor a devolver R$</div>
                                    <div class="col"><input style = "width: 100px; color:#000; background-color:rgb(253, 182, 182); font-size: 16px; text-align:center; font-weight:bold;" type="numeric" id="total" value="0.00" disabled=""/></div>
                                <script>
                                    function calcular (){
                                        var num1 = parseFloat(document.getElementById("campo1").value);
			                            var num2 = parseFloat(document.getElementById("campo2").value);
			                            document.getElementById("total").value = (num1.toFixed(2)) - (num2.toFixed(2));


                                    }

                                    $('#id_do_form').each (function(){
                                        this.reset();
                                        });

                                </script>
                                </div>


                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="font-size: 15px;" data-dismiss="modal">Fechar</button>
                    <input type=button class="btn btn-success" style="font-size: 20px;" value="calcular" onClick="calcular();">
                </div>
            </div>
        </div>
    </div>

{{--enctype="multipart/form-data"

<table class="table table-bordered .table-responsive-{lg}" id="datatable"  style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                          <tbody>
                                <tr>
                                    <td>Valor Total da venda R$</td>
                                    <td>{{number_format($total_preco,2,',','.')}}</td>
                                </tr>
                                <tr>
                                    <td>A pagar em dinheiro R$</td>
                                    <td><input type="numeric" value="{{number_format($total_especie,2,',','.')}}" id="campo2" disabled=""/></td>
                                </tr>
                                <tr>
                                <td >Valor recebido em dinheiro R$</td>
                                    <td style="background: rgb(163, 221, 187);"><input type="numeric" id="campo1" /></td>
                                </tr>
                                <tr>
                                <td>Valor a devolver R$</td>
                                    <td><input type="numeric" id="total" /></td>
                                <script>
                                    function calcular (){
                                        var num1 = parseFloat(document.getElementById("campo1").value);
			                            var num2 = parseFloat(document.getElementById("campo2").value);
			                            document.getElementById("total").value = num1 - num2;

                                    }

                                    $('#id_do_form').each (function(){
                                        this.reset();
                                        });

                                </script>
                                </tr>

                            </tbody>
                    </table>

--}}
