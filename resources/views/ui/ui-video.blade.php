@extends('layouts.master')

@section('title') Video @endsection

@section('content')
 <!-- start page title -->
                    <div class="row">
                         @component('common-components.breadcrumb')
                     @slot('title') Video  @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') UI Elements @endslot
                     @slot('li3') Video @endslot
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

                                    <h4 class="card-title">Responsive embed video 16:9</h4>
                                    <p class="card-title-desc">Aspect ratios can be customized with modifier classes.</p>

                                    <!-- 16:9 aspect ratio -->
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/1y_kfWUCFDQ"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Responsive embed video 21:9</h4>
                                    <p class="card-title-desc">Aspect ratios can be customized with modifier classes.</p>

                                    <!-- 21:9 aspect ratio -->
                                    <div class="embed-responsive embed-responsive-21by9">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/1y_kfWUCFDQ"></iframe>
                                    </div>

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

                                    <h4 class="card-title">Responsive embed video 4:3</h4>
                                    <p class="card-title-desc">Aspect ratios can be customized with modifier classes.</p>

                                    <!-- 4:3 aspect ratio -->
                                    <div class="embed-responsive embed-responsive-4by3">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/1y_kfWUCFDQ"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Responsive embed video 1:1</h4>
                                    <p class="card-title-desc">Aspect ratios can be customized with modifier classes.</p>

                                    <!-- 1:1 aspect ratio -->
                                    <div class="embed-responsive embed-responsive-1by1">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/1y_kfWUCFDQ"></iframe>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                    </div>
                    <!-- end row -->
@endsection
