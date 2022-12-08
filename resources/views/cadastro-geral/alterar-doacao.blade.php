<form class="form-horizontal mt-4" method="POST" action="cad-sit-doacao/atualizar/{{$resultDoacao[0]->id}}">
@csrf
@method('PUT')
    <div class="form-group">
        <div class="row">
            <label for="doacao" class="col-sm-2 col-form-label">Doacao</label>
            <div class="col-sm-4">
                <input class="form-control" value="{{$resultDoacao[0]->nome}}" type="text" id="doacao" name="doacao" required oninvalid="this.setCustomValidity('Campo requerido')">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 mt-3" style="text-align: right;">
            <button type="submit" class="btn btn-success">Alterar</button>
        </div>
    </div>
</form>
