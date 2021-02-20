@extends('layouts.master')

@section('title') Chartist Chart @endsection


@section('content')
   <!-- start page title -->
                    <div class="row">

                @component('common-components.breadcrumb')
                     @slot('title') Chartist Chart  @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') Charts  @endslot
                     @slot('li3') Chartist Chart  @endslot
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

                                    <h4 class="card-title mb-4">Line Chart</h4>

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

                                    <canvas id="lineChart" height="300"></canvas>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title mb-4">Bar Chart</h4>

                                    <div class="row text-center mt-4">
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">2541</h5>
                                            <p class="text-muted">Activated</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">84845</h5>
                                            <p class="text-muted">Pending</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">12001</h5>
                                            <p class="text-muted">Deactivated</p>
                                        </div>
                                    </div>

                                    <canvas id="bar" height="300"></canvas>

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

                                    <h4 class="card-title mb-4">Pie Chart</h4>

                                    <div class="row text-center mt-4">
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">2536</h5>
                                            <p class="text-muted">Activated</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">69421</h5>
                                            <p class="text-muted">Pending</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">89854</h5>
                                            <p class="text-muted">Deactivated</p>
                                        </div>
                                    </div>

                                    <canvas id="pie" height="260"></canvas>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title mb-4">Donut Chart</h4>

                                    <div class="row text-center mt-4">
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">9595</h5>
                                            <p class="text-muted">Activated</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">36524</h5>
                                            <p class="text-muted">Pending</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">62541</h5>
                                            <p class="text-muted">Deactivated</p>
                                        </div>
                                    </div>

                                    <canvas id="doughnut" height="260"></canvas>

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

                                    <h4 class="card-title mb-4">Polar Chart</h4>

                                    <div class="row text-center mt-4">
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">4852</h5>
                                            <p class="text-muted">Activated</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">3652</h5>
                                            <p class="text-muted">Pending</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">85412</h5>
                                            <p class="text-muted">Deactivated</p>
                                        </div>
                                    </div>

                                    <canvas id="polarArea" height="300"> </canvas>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title mb-4">Radar Chart</h4>

                                    <div class="row text-center mt-4">
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">694</h5>
                                            <p class="text-muted">Activated</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">55210</h5>
                                            <p class="text-muted">Pending</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">489498</h5>
                                            <p class="text-muted">Deactivated</p>
                                        </div>

                                        <canvas id="radar" height="300"></canvas>

                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <footer class="footer">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-12">
                                        © 2018 - 2020 Lexa <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>
                    <!-- end main content-->
@endsection

@section('footerScript')
 <!-- Chart JS -->
                <script src="{{ URL::asset('/libs/chart-js/chart-js.min.js')}}"></script>
                <script src="{{ URL::asset('/js/pages/chartjs.init.js')}}"></script>
@endsection
