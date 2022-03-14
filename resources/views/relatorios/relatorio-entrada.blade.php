@extends('layouts.master')

@section('title') Relatório de entradas @endsection

@section('content')



    <div class="col12" style="background:#ffffff;">
        <h4 class="card-title" class="card-title" style="font-size:20px; text-align: center; background: #088CFF; color: white;">RELATÓRIO DE ENTRADAS POR PERÍODO</h4>

        <h5> Em construção </h5>

    </div>

@section('footerScript')
            <script src="{{ URL::asset('/js/pages/mascaras.init.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/busca-cep.init.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
            <script src="{{ URL::asset('/libs/select2/select2.min.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/form-advanced.init.js')}}"></script>
@endsection


@endsection
