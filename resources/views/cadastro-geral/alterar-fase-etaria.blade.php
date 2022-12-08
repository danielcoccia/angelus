<form class="form-horizontal mt-4" method="POST" action="fase-etaria/atualizar/{{$resultFaseEtaria[0]->id}}">
@csrf
@method('PUT')
    <div class="form-group">
        <div class="row">
            <label for="categoria" class="col-sm-2 col-form-label">Categoria</label>
            <div class="col-4">
                    <select class="form-control select2" id="categoria" name="categoria" required oninvalid="this.setCustomValidity('Campo requerido')">
                            <option value="null">Selecione </option>
                        @Foreach ($resultCategoria as $resultCategorias)
                        @if($resultCategorias->id  == $resultFaseEtaria[0]->id_categoria_material )
                            <option value="{{$resultCategorias->id}}" selected="sim">{{$resultCategorias->nome}} </option>
                        @else
                            <option value="{{$resultCategorias->id}}">{{$resultCategorias->nome}} </option>
                        @endif
                        @endForeach
                    </select>
            </div>
        </div>

        <div class="row mt-3">
            <label for="faseEtaria" class="col-sm-2 col-form-label">Fase Etária</label>
            <div class="col-4">
                <input class="form-control" value="{{$resultFaseEtaria[0]->nome}}" type="text" id="faseEtaria" name="faseEtaria" required oninvalid="this.setCustomValidity('Campo requerido')">
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
            <button type="submit" class="btn btn-success">Alterar</button>
        </div>
    </div>
</form>
