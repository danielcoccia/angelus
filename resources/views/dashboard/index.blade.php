@extends('layouts.master')

@section('title') Dashboard @endsection

@section('content')
     
    <div class="row">
        Sistema Angelus
    </div>
@endsection

@section('footerScript')
<!--Morris Chart-->
            <script src="{{ URL::asset('/libs/morris.js/morris.js.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/raphael/raphael.min.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/dashboard.init.js')}}"></script>
@endsection