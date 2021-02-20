@extends('layouts.master')

@section('title') Flot Chart @endsection

@section('content')
 <!-- start page title -->
                    <div class="row">


                @component('common-components.breadcrumb')
                     @slot('title') Flot Chart @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') Charts  @endslot
                     @slot('li3') Flot Chart  @endslot
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

                                    <h4 class="card-title mb-4">Multiple Statistics</h4>

                                    <div class="row text-center mt-4">
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">362411</h5>
                                            <p class="text-muted">Activated</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">8489</h5>
                                            <p class="text-muted">Pending</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">985412</h5>
                                            <p class="text-muted">Deactivated</p>
                                        </div>
                                    </div>

                                    <div id="website-stats" class="flot-charts flot-charts-height"></div>

                                </div>
                            </div>
                        </div> <!-- end col -->

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title mb-4">Realtime Statistics</h4>

                                    <div class="row text-center mt-4">
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">365214</h5>
                                            <p class="text-muted">Activated</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">6521</h5>
                                            <p class="text-muted">Pending</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">44587</h5>
                                            <p class="text-muted">Deactivated</p>
                                        </div>
                                    </div>

                                    <div id="flotRealTime" class="flot-charts flot-charts-height"></div>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title mb-4">Donut Pie</h4>

                                    <div class="row text-center mt-4">
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">5484</h5>
                                            <p class="text-muted">Activated</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">964984</h5>
                                            <p class="text-muted">Pending</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">98498</h5>
                                            <p class="text-muted">Deactivated</p>
                                        </div>
                                    </div>

                                    <div id="donut-chart">
                                        <div id="donut-chart-container" class="flot-charts flot-charts-height">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> <!-- end col -->

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Pie Chart</h4>

                                    <div class="row text-center mt-4">
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">86541</h5>
                                            <p class="text-muted">Activated</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">2541</h5>
                                            <p class="text-muted">Pending</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">102030</h5>
                                            <p class="text-muted">Deactivated</p>
                                        </div>
                                    </div>

                                    <div id="pie-chart">
                                        <div id="pie-chart-container" class="flot-charts flot-charts-height">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
@endsection

@section('footerScript')
 <!-- flot plugins -->
            <script src="{{ URL::asset('/libs/flot-charts/flot-charts.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/flot.curvedLines/flot.curvedLines.min.js')}}"></script>

            <!-- flot init -->
            <script src="{{ URL::asset('/js/pages/flot.init.js')}}"></script>
@endsection
