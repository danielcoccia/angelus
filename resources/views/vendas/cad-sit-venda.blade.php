<form class="form-horizontal mt-4" method="POST" action="cad-sit-venda/atualizar/{{$resultSitVenda[0]->id}}">  
@csrf
@method('PUT')
    <div class="form-group">
        <div class="row">
            <label for="sit_venda" class="col-sm-2 col-form-label">Situação Venda</label>
            <div class="col-sm-4">
                <input class="form-control" value="{{$resultSitVenda[0]->nome}}" type="text" id="sit_venda" name="sit_venda" required oninvalid="this.setCustomValidity('Campo requerido')" >
            </div>
        </div>
        <div class="row">
            <div class="col-6 mt-3" style="text-align: right;">
                <button type="submit" class="btn btn-primary">Alterar</button>                        
            </div>    
        </div>
    </div>
</form>
