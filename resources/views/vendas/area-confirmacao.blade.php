<input type="hidden" id="idItem" value="{{$item[0]->id}}" >
<div class="row"> 
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Item<i class="mdi mdi-account-badge"></i></h4>
                <hr>
                <div class="card-body"> 
                    <p>ID:<strong> {{$item[0]->id}}</strong></p>
                    <p>Nome item: <strong> {{$item[0]->nome}}</strong> </p>
                    <p>Marca:<strong> {{$item[0]->marca}}</strong> </p>
                    <p>Tamanho:<strong>  {{$item[0]->tamanho}}</strong> </p>
                    <p>Cor: <strong> {{$item[0]->cor}}</strong> </p>
                    <p>Tipo de material: <strong> {{$item[0]->tipo_material}}</strong> </p>
                </div>
            </div>
        </div>
 	</div>
</div>