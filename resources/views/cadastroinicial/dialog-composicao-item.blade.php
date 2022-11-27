<div class="row">
<div class="col-lg-10">
    <div class="card">
        <div class="card-body">
            <!-- <h4 class="card-title">Basic example</h4>
            <p class="card-title-desc">For basic styling—light padding and only horizontal dividers—add the base class <code>.table</code> to any
                <code>&lt;table&gt;</code>.
            </p> -->
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do Item</th>
                            <th>Embalagem</th>
                            <th>Unidade Medida</th>
                            <th>Quantidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($result as $results)
                            <tr>
                                <td>{{$results->id}}</td>
                                <td>{{$results->nome_item}}</td>
                                <td>{{$results->embalagem}}</td>
                                <td>{{$results->unidade_medida}}</td>
                                <td>{{$results->quantidade}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
