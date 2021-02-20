@extends('layouts.master')

@section('title') Sweet-Alert @endsection

@section('headerCss')
<!-- Sweet Alert-->
    <link href="{{ URL::asset('/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
   <!-- start page title -->
                    <div class="row">
                         @component('common-components.breadcrumb')
                     @slot('title') Sweet-Alert @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') UI Elements  @endslot
                     @slot('li3') Sweet-Alert  @endslot
                @endcomponent

                @component('common-components.chart')
                     @slot('chart1_id') header-chart-1  @endslot                     
                     @slot('chart1_title') Balance $ 2,317  @endslot
                     @slot('chart2_id') header-chart-2  @endslot                     
                     @slot('chart3_title') Item Sold 1230  @endslot
                @endcomponent
                    
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card ">
                                <div class="card-body">

                                    <h4 class="card-title">Examples</h4>
                                    <p class="card-title-desc">A beautiful, responsive, customizable and accessible (WAI-ARIA) replacement for JavaScript's popup boxes. Zero dependencies.
                                    </p>

                                    <div class="row text-center">
                                        <div class="col-lg-3 col-md-6 mb-4">
                                            <p class="text-muted">A basic message</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="sa-basic">Click me</button>
                                        </div>
                                        <div class="col-lg-3 col-md-6 mb-4">
                                            <p class="text-muted">A title with a text under</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="sa-title">Click me</button>
                                        </div>
                                        <div class="col-lg-3 col-md-6 mb-4">
                                            <p class="text-muted">A success message!</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="sa-success">Click me</button>
                                        </div>
                                        <div class="col-lg-3 col-md-6 mb-4">
                                            <p class="text-muted">A warning message, with a function attached to the "Confirm"-button...</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="sa-warning">Click me</button>
                                        </div>

                                        <div class="col-lg-3 col-md-6 mb-4">
                                            <p class="text-muted">By passing a parameter, you can execute something else for "Cancel".</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="sa-params">Click me</button>
                                        </div>
                                        <div class="col-lg-3 col-md-6 mb-4">
                                            <p class="text-muted">A message with custom Image Header</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="sa-image">Click me</button>
                                        </div>
                                        <div class="col-lg-3 col-md-6 mb-4">
                                            <p class="text-muted">A message with auto close timer</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="sa-close">Click me</button>
                                        </div>
                                        <div class="col-lg-3 col-md-6 mb-4">
                                            <p class="text-muted">Custom HTML description and buttons</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="custom-html-alert">Click me</button>
                                        </div>
                                        <div class="col-lg-3 col-md-6 mb-4">
                                            <p class="text-muted">A message with custom width, padding and background</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="custom-padding-width-alert">Click me</button>
                                        </div>
                                        <div class="col-lg-3 col-md-6 mb-4">
                                            <p class="text-muted">Ajax request example</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="ajax-alert">Click me</button>
                                        </div>
                                        <div class="col-lg-3 col-md-6 mb-4">
                                            <p class="text-muted">Chaining modals (queue) example</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="chaining-alert">Click me</button>
                                        </div>
                                        <div class="col-lg-3 col-md-6 mb-4">
                                            <p class="text-muted">Dynamic queue example</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="dynamic-alert">Click me</button>
                                        </div>

                                    </div>
                                    <!-- end row -->

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
@endsection

@section('footerScript')
 <!-- Sweet Alerts js -->
            <script src="{{ URL::asset('/libs/sweetalert2/sweetalert2.min.js')}}"></script>

            <!-- Sweet alert init js-->
            <script src="{{ URL::asset('/js/pages/sweet-alerts.init.js')}}"></script>

@endsection