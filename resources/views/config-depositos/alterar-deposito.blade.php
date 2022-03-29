<form class="form-horizontal mt-4" method="POST" action="deposito/atualizar/{{$resultDeposito[0]->id}}">  
@csrf
@method('PUT')
    <div class="form-group">
        
        <div class="row mt-3">
            <label for="nomeDeposito" class="col-sm-2 col-form-label">Nome Deposito</label>
            <div class="col-4">
                <input class="form-control" type="text" id="nomeDeposito" name="nomeDeposito" value="{{$resultDeposito[0]->nome}}" required oninvalid="this.setCustomValidity('Campo requerido')">
            </div>
        </div>

        <div class="row mt-3">
            <label for="siglaDeposito" class="col-sm-2 col-form-label">Sigla Deposito</label>
            <div class="col-4">
                <input class="form-control" type="text" id="siglaDeposito" name="siglaDeposito" value="{{$resultDeposito[0]->sigla}}" required oninvalid="this.setCustomValidity('Campo requerido')">
            </div>
        </div>

        <div class="row mt-3">                                
            <label for="tpEstoque" class="col-sm-2 col-form-label">Tipo Estoque</label>
            <div class="col-4">                                    
                    <select class="form-control select2" id="tpEstoque" name="tpEstoque" required oninvalid="this.setCustomValidity('Campo requerido')">                        
                        @Foreach ($resultTpEstoque as $resultTpEstoques)

                            @if($resultDeposito[0]->id_tp_estoque == $resultTpEstoques->id)                                
                                <option value="{{$resultTpEstoques->id}}" selected="s">{{$resultTpEstoques->nome}} </option>
                            @else
                                <option value="{{$resultTpEstoques->id}}">{{$resultTpEstoques->nome}} </option>
                            @endif
                        @endForeach
                    </select>
            </div>
        </div>  

        <!-- <div class="row mt-3">
            <label for="sigla" class="col-sm-2 col-form-label">Ativo</label>
            <div class="col-4">
                <input class="" type="checkbox" id="ativo_marca" name="ativo_marca" checked="">                                
            </div>
        </div> -->
    </div>
    
    <div class="row">
        <div class="col-6 mt-3" style="text-align: right;">
            <button type="submit" class="btn btn-primary">Alterar</button>                        
        </div>    
    </div>
</form>
