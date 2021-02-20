@extends('layouts.master')

@section('title') Google Map @endsection

@section('content')
 <!-- start page title -->
                    <div class="row">
                         @component('common-components.breadcrumb')
                     @slot('title') Google Map @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') Maps  @endslot
                     @slot('li3') Google Map @endslot
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

                                    <h4 class="card-title">Markers</h4>
                                    <p class="card-title-desc">Example of google maps.</p>

                                    <div id="gmaps-markers" class="gmaps"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Overlays</h4>
                                    <p class="card-title-desc">Example of google maps.</p>

                                    <div id="gmaps-overlay" class="gmaps"></div>
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

                                    <h4 class="card-title">Street View Panoramas</h4>
                                    <p class="card-title-desc">Example of google maps.</p>

                                    <div id="panorama" class="gmaps-panaroma"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Map Types</h4>
                                    <p class="card-title-desc">Example of google maps.</p>

                                    <div id="gmaps-types" class="gmaps"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
@endsection

@section('footerScript')
 <!-- google maps api -->
            <script src="https://maps.google.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script>

            <!-- Gmaps file -->
            <script src="{{ URL::asset('/libs/gmaps/gmaps.min.js')}}"></script>

            <!-- demo codes -->
            <script src="{{ URL::asset('/js/pages/gmaps.init.js')}}"></script>

@endsection 