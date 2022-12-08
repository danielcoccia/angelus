<form class="form-horizontal mt-4" method="POST" action="cad-pagamento/atualizar/{{$resultPagamento[0]->id}}">
@csrf
@method('PUT')
     <div class="form-group">
        <div class="row">
            <label for="pagamento" class="col-sm-2 col-form-label">Pagamento</label>
            <div class="col-sm-4">
                <input class="form-control" value="{{$resultPagamento[0]->nome}}" type="text" id="pagamento" name="pagamento" required oninvalid="this.setCustomValidity('Campo requerido')">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 mt-3" style="text-align: right;">
            <button type="submit" class="btn btn-success">Alterar</button>
        </div>
    </div>
</form>
