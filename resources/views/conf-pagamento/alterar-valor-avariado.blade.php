<form class="form-horizontal mt-4" method="POST" action="alterar-valor-avariado/atualizar/{{$result[0]->id}}">
@csrf
@method('PUT')
     <div class="form-group">
        <div class="row">
            <label for="avariado" class="col-sm-2 col-form-label">Valor Avariado</label>
            <div class="col-sm-4">
                <input class="form-control" value="{{$result[0]->valor}}" type="numeric" id="" name="valor" required oninvalid="this.setCustomValidity('Campo requerido')">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6 mt-3" style="text-align: right;">
            <button type="submit" class="btn btn-success">Alterar</button>
        </div>
    </div>
</form>
