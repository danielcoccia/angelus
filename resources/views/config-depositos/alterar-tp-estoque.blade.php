<form class="form-horizontal mt-4" method="POST" action="cad-tipo-estoque/atualizar/{{$resultTpEstoque[0]->id}}">  
@csrf
@method('PUT')
    <div class="form-group">
        <div class="row">
            <label for="tp_estoque" class="col-sm-2 col-form-label">Tipo Estoque</label>
            <div class="col-sm-4">
                <input class="form-control" value="{{$resultTpEstoque[0]->nome}}" type="text" id="tp_estoque" name="tp_estoque" required oninvalid="this.setCustomValidity('Campo requerido')" >
            </div>
        </div>
        <div class="row">
            <div class="col-6 mt-3" style="text-align: right;">
                <button type="submit" class="btn btn-primary">Alterar</button>                        
            </div>    
        </div>
    </div>
</form>
