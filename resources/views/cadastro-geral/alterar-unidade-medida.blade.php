<form class="form-horizontal mt-4" method="POST" action="unidade-medida/atualizar/{{$resultUniMed[0]->id}}">
@csrf
@method('PUT')
    <div class="form-group">
        <div class="row">
            <label for="unidade_med" class="col-sm-2 col-form-label">Unidade</label>
            <div class="col-sm-4">
                <input class="form-control" value="{{$resultUniMed[0]->nome}}" type="text" id="unidade_med" name="unidade_med" required oninvalid="this.setCustomValidity('Campo requerido')">
            </div>
        </div>

        <div class="row mt-3">
            <label for="sigla" class="col-sm-2 col-form-label">Sigla</label>
            <div class="col-sm-4">
                <input class="form-control" value="{{$resultUniMed[0]->sigla}}" type="text" id="sigla" name="sigla" required oninvalid="this.setCustomValidity('Campo requerido')">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 mt-3" style="text-align: right;">
            <button type="submit" class="btn btn-success">Alterar</button>
        </div>
    </div>
</form>
