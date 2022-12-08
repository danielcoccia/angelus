<form class="form-horizontal mt-4" method="POST" action="cad-embalagem/atualizar/{{$resultEmbalagem[0]->id}}">
@csrf
@method('PUT')
    <div class="form-group">
        <div class="row">
            <label for="nome" class="col-sm-2 col-form-label">Embalagem</label>
            <div class="col-sm-4">
                <input class="form-control" type="text" value="{{$resultEmbalagem[0]->nome}}" id="nome" name="nome" required oninvalid="this.setCustomValidity('Campo requerido')">
            </div>
        </div>

        <div class="row mt-3">
            <label for="sigla" class="col-sm-2 col-form-label">Sigla</label>
            <div class="col-sm-4">
                <input class="form-control" type="text" value="{{$resultEmbalagem[0]->sigla}}" id="sigla" name="sigla" required oninvalid="this.setCustomValidity('Campo requerido')">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 mt-3" style="text-align: right;">
            <button type="submit" class="btn btn-success">Alterar</button>
        </div>
    </div>
</form>
