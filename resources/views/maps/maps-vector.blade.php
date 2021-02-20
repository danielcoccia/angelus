@extends('layouts.master')

@section('title') Vactor Map @endsection

@section('headerCss')
<!-- plugin css -->
    <link href="{{ URL::asset('/libs/jquery-vectormap/jquery-vectormap.min.css')}}" rel="stylesheet" type="text/css" /> 
@endsection

@section('content')
  <!-- start page title -->
                    <div class="row">
                                @component('common-components.breadcrumb')
                     @slot('title') Vector Map @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') Maps  @endslot
                     @slot('li3') Vector Map @endslot
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
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">World Map</h4>
                                    <p class="card-title-desc">Example of vector map.</p>

                                    <div id="world-map-markers" style="height: 400px"></div>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">USA Map</h4>
                                    <p class="card-title-desc">Example of vector map.</p>

                                    <div id="usa" style="height: 400px"></div>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">UK Map</h4>
                                    <p class="card-title-desc">Example of vector map.</p>

                                    <div id="uk" style="height: 400px"></div>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Chicago Map</h4>
                                    <p class="card-title-desc">Example of vector map.</p>

                                    <div id="chicago" style="height: 400px"></div>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
@endsection

@section('footerScript')
            <!-- Plugins js-->
            <script src="{{ URL::asset('/libs/jquery-vectormap/jquery-vectormap.min.js')}}"></script>

            <!-- Init js-->
            <script src="{{ URL::asset('/js/pages/vector-maps.init.js')}}"></script>
@endsection