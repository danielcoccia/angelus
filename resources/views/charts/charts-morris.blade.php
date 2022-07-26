@extends('layouts.master')

@section('title') Morris Chart @endsection

@section('content')
<!-- start page title -->
                    <div class="row">

                @component('common-components.breadcrumb')
                     @slot('title') Morris Chart  @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') Charts  @endslot
                     @slot('li3') Morris Chart  @endslot
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
                                            <h5 class="mb-0 font-size-20">25610</h5>
                                            <p class="text-muted">Activated</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">56210</h5>
                                            <p class="text-muted">Pending</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">12485</h5>
                                            <p class="text-muted">Deactivated</p>
                                        </div>
                                    </div>
    
                                    <div id="morris-line-example" class="morris-charts morris-charts-height" dir="ltr"></div>
    
                                </div>
                            </div>
                        </div> <!-- end col -->
    
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
    
                                    <h4 class="card-title mb-4">Bar Chart</h4>


                                    <div class="row text-center mt-4">
                                        <div class="col-sm-6">
                                            <h5 class="mb-0 font-size-20">6,95,412</h5>
                                            <p class="text-muted">Activated</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <h5 class="mb-0 font-size-20">1,63,542</h5>
                                            <p class="text-muted">Pending</p>
                                        </div>
                                    </div>
    
                                    <div id="morris-bar-example" class="morris-charts morris-charts-height" dir="ltr"></div>
    
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
    
    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
    
                                    <h4 class="card-title mb-4">Area Chart</h4>

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
    
                                    <div id="morris-area-example" class="morris-charts morris-charts-height" dir="ltr"></div>
    
                                </div>
                            </div>
                        </div> <!-- end col -->
    
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
    
                                    <h4 class="card-title mb-4">Donut Chart</h4>

                                    <div class="row text-center mt-4">
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">3201</h5>
                                            <p class="text-muted">Activated</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">85120</h5>
                                            <p class="text-muted">Pending</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="mb-0 font-size-20">65214</h5>
                                            <p class="text-muted">Deactivated</p>
                                        </div>
                                    </div>
    
                                    <div id="morris-donut-example" class="morris-charts morris-charts-height" dir="ltr"></div>
    
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
    
    
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
    
                                    <h4 class="card-title mb-4">Area Chart</h4>

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
    
                                    <div id="morris-bar-stacked" class="morris-charts morris-charts-height" dir="ltr"></div>
    
                                </div>
                            </div>
                        </div> <!-- end col -->
    
                    </div> <!-- end row -->
@endsection

@section('footerScript')
 <!--Morris Chart-->
            <script src="{{ URL::asset('/libs/morris.js/morris.js.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/raphael/raphael.min.js')}}"></script>

            <!-- Init js -->
            <script src="{{ URL::asset('/js/pages/morris.init.js')}}"></script>

@endsection
