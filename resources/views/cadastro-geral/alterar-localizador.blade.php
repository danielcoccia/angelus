<form class="form-horizontal mt-4" method="POST" action="localizador/atualizar/{{$resultLocalizador[0]->id}}">  
@csrf
@method('PUT')
    <div class="form-group">
        <div class="row">                                
            <label for="deposito" class="col-sm-2 col-form-label">Deposito</label>
            <div class="col-4">                                    
                    <select class="form-control select2" id="deposito" name="deposito" required oninvalid="this.setCustomValidity('Campo requerido')">
                            <option>Selecione </option>
                        @Foreach ($resultDeposito as $resultDepositos)
                            @if($resultLocalizador[0]->id_deposito == $resultDepositos->id)
                                <option value="{{$resultDepositos->id}}" selected="s" >{{$resultDepositos->nome}} </option>
                            @else
                                <option value="{{$resultDepositos->id}}">{{$resultDepositos->nome}} </option>
                            @endif
                        @endForeach
                    </select>                                    
            </div>
        </div>

        <div class="row mt-3">
            <label for="prateleira" class="col-sm-2 col-form-label">Prateleira*</label>
            <div class="col-4">
                <input class="form-control" type="text" id="prateleira" name="prateleira" value="{{$resultLocalizador[0]->prateleira}}" required oninvalid="this.setCustomValidity('Campo requerido')">
            </div>
        </div>
        <div class="row mt-3">
            <label for="nivel" class="col-sm-2 col-form-label">Nível*</label>
            <div class="col-4">
                <input class="form-control" type="text" id="nivel" name="nivel" value="{{$resultLocalizador[0]->nivel}}" required oninvalid="this.setCustomValidity('Campo requerido')">
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
