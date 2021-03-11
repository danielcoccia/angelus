@extends('layouts.master')

@section('title') C3 Chart @endsection

@section('headerCss')
<!-- C3 Chart css -->
    <link href="{{ URL::asset('/libs/c3/c3.min.css')}}" rel="stylesheet" type="text/css" />
    
@endsection

@section('content')
 <!-- start page title -->
                    <div class="row">

                @component('common-components.breadcrumb')
                     @slot('title') C3 Chart  @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') Charts  @endslot
                     @slot('li3') C3 Chart  @endslot
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
                            <div class="card m-b-20">
                                <div class="card-body">

                                    <h4 class="card-title mb-4">Bar Chart</h4>

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
                                            <p class="text-muted" dir="ltr">
                                        </div>
                                    </div>
                                </div>

                                <div id="chart" dir="ltr"></div>
                            </div>

                        </div>
                        <!-- end col -->

                        <div class="col-lg-6">
                            <div class="card m-b-20">
                                <div class="card-body">

                                    <h4 class="card-title mb-4">Stacked Area Chart</h4>

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

                                    <div id="chart-stacked" dir="ltr"></div>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card m-b-20">
                                <div class="card-body">

                                    <h4 class="card-title mb-4">Roated Chart</h4>

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

                                    <div id="roated-chart" dir="ltr"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-6">
                            <div class="card m-b-20">
                                <div class="card-body">

                                    <h4 class="card-title mb-4">Combine Chart</h4>

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

                                    <div id="combine-chart" dir="ltr"></div>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card m-b-20">
                                <div class="card-body">

                                    <h4 class="card-title mb-4">Donut Chart</h4>

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

                                    <div id="donut-chart" dir="ltr"></div>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-6">
                            <div class="card m-b-20">
                                <div class="card-body">

                                    <h4 class="card-title mb-4">Pie Chart</h4>

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

                                    <div id="pie-chart" dir="ltr"></div>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
@endsection

@section('footerScript')
   <!--C3 Chart-->
            <script src="{{ URL::asset('/libs/d3/d3.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/c3/c3.min.js')}}"></script>

            <!-- Init js -->
            <script src="{{ URL::asset('/js/pages/c3-chart.init.js')}}"></script>
@endsection
