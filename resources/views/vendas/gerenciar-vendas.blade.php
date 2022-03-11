@extends('layouts.master')

@section('title') Gerenciar Vendas @endsection

@section('content')
<div class="container">
    <div class="row align-items-center">
        <div class="col-12">
        <h4 class="card-title" class="card-title" style="text-align: center; background: #088CFF; color: white;">Gerenciar Vendas</h4>
        </div>
        <hr>
        <div class="col-sm-1">
        <form action="{{route('vendas.index')}}" class="form-horizontal mt-4" method="GET" >
        </div>
        <div class="col-md-3">
        @csrf
            <label for="nome">Início</label>
            <input type="date" name="data_inicio" value="{{$data_inicio}}">
        </div>
        <div class="col-md-3">
            <label for="date">Final</label>
            <input type="date" name="data_fim"  value="{{$data_fim}}">
        </div>
        <div class="col-sm"style="text-align: right;>
            <label for="nome">Situação da venda:</label>
        </div>
        <div class="col-sm">
            <select class="form-control" id="sit" name="situacao" required="required">
            @Foreach($resultSitVenda as $resultSitVendas)
            <option value="{{$resultSitVendas->id}}" {{$resultSitVendas->id == $situacao ? 'selected' : ''}}>{{$resultSitVendas->nome}}</option>
            @endForeach
            </select>
        </div>
    </div>
</div>
    <br>
<div class="container">
    <div class="row align-items-center">
        <div class="col-sm-5">
            <input class="form-control" type="text" name="cliente" id="cliente" value="{{$cliente}}" placeholder="Nome do cliente"/>
        </div>
        <div class="col-sm">
            <input class="btn btn-info" type="submit" value="Pesquisar">
        </div>
        <div class="col-sm">
            <a href="/gerenciar-vendas">
            <input class="btn btn-danger" type="button" value="Limpar">
            </a>
        </div>
        </form>
        <div class="col-sm">
            <a href="/registrar-venda">
            <input class="btn btn-success" type="button" value="Nova venda +">
            </a>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-12">
            <div class="card"><h4 class="card-title" class="card-title">Dados das vendas</h4>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead style='text-align:center;vertical-align:middle'>
                            <tr>
                                <th>ID Venda</th>
                                <th>Data Venda</th>
                                <th>Cliente</th>
                                <th>Vendedor</th>
                                <th>Valor Venda</th>
                                <th>Situação</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody style='text-align:center;vertical-align:middle'>
                        @foreach($result as $results)
                            <tr>
                                <td>{{$results->id}}</td>
                                <td>{{ date( 'd/m/Y' , strtotime($results->data))}}</td>
                                <td>{{$results->nome_cliente}}</td>
                                <td>{{$results->nome_usuario}}</td>
                                <td>{{number_format($results->valor,2,',','.')}}</td>
                                <td>{{$results->sit_venda}}</td>
                                <td>
                                    <a href="/registrar-venda/editar/{{$results->id}}">
                                        <input class="btn btn-warning" type="button" value="Alterar">
                                    </a>
                                    <a href="/gerenciar-vendas/excluir/{{$results->id}}">
                                        <input class="btn btn-danger" type="button" value="Excluir" data-toggle="modal" data-target="#modalExemplo">
                                    </a>
                                    <a>
                                        <a href="/gerenciar-pagamentos/{{$results->id}}">
                                        <input class="btn btn-success" type="button" value="Pagar">
                                    </a>

                                    <a href="/demonstrativo/{{$results->id}}"  type="button" class="btn btn-info">Exportar</a>
                                    @endforeach

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- end col -->

<!--
    **********************************************************************************************************************************
    * MODAL
    **********************************************************************************************************************************
    -->
    <div class="modal" id="modalExemplo" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Excluir venda</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>A venda foi excluida com sucesso.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>



@endsection

@section('footerScript')
            <!-- Required datatable js -->
           <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

            <!-- Datatable init js -->
            <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>
            <script src="{{ URL::asset('/libs/select2/select2.min.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/form-advanced.init.js')}}"></script>

@endsection
