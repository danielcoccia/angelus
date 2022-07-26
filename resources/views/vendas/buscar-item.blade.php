@csrf
@method('PUT')
<h4 class="card-title">Lista de Itens</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">                                   
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nome</th>
                                                <th>marca</th>
                                                <th>tamanho</th>
                                                <th>cor</th>
                                                <th>tipo_material</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach($resultItem as $resultItens)
                                             <tr>
                                                <td>{{$resultItens->id}}</td>
                                                <td>{{$resultItens->nome}}</td>
                                                <td>{{$resultItens->marca}}</td>
                                                <td>{{$resultItens->tamanho}}</td>
                                                <td>{{$resultItens->cor}}</td>
                                                <td>{{$resultItens->tipo_material}}</td>
                                                 <td><button type="button" id="btnAddItem" value="{{$resultItens->id}}"  class="btn btn-primary">+</button></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

 @section('footerScript')
            <!-- Required datatable js -->
            <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>
           
            <!-- Datatable init js -->
            <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/gerenciar-embalagem.init.js')}}"></script>
@endsection