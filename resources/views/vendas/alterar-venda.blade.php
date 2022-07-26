<form class="form-horizontal mt-4" method="POST" action="gerenciar-vendas/atualizar/{{$resultVenda[0]->id}}">  
@csrf
@method('PUT')
    <div class="form-group">
        <div class="row">
            <label for="venda" class="col-sm-2 col-form-label">Venda</label>
            <div class="col-sm-4">
                <input class="form-control" type="numeric" value="{{$resultVenda[0]->valor}}" name="valor" id="" required oninvalid="this.setCustomValidity('Campo requerido')">
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-6 mt-3" style="text-align: right;">
            <button type="submit" class="btn btn-primary">Alterar</button>                        
        </div>    
    </div>
</form>
