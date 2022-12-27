@extends('layouts.master')

@section('title') @endsection

@section('content')


    <div class="row">
        <div class="card">

        <figure class="figure" style="text-align: center;">
        {{--<img src="/images/logo150px.png" class="figure-img img-fluid rounded" alt="Imagem de um quadrado genérico com bordas arredondadas, em uma figure.">--}}
            {{--<figcaption class="figure-caption">Uma legenda para a imagem acima.</figcaption>--}}
          </figure>

        <link href="{{ URL::asset('/images/logo150px.png')}}">
    </div>
</div>
@endsection

@section('footerScript')
<!--Morris Chart-->
            <script src="{{ URL::asset('/libs/morris.js/morris.js.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/raphael/raphael.min.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/dashboard.init.js')}}"></script>
@endsection
