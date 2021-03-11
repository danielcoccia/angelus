@extends('layouts.master')

@section('title') Lightbox @endsection

@section('headerCss')
  <!-- Lightbox css -->
<link href="{{ URL::asset('/libs/magnific-popup/magnific-popup.min.css')}}" rel="stylesheet" type="text/css" /> 
@endsection

@section('content')
  <!-- start page title -->
                    <div class="row">
                         @component('common-components.breadcrumb')
                     @slot('title') Lightbox @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') UI Elements  @endslot
                     @slot('li3') Lightbox  @endslot
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

                                    <h4 class="card-title">Single image lightbox</h4>
                                    <p class="card-title-desc">Three simple popups with different scaling settings.</p>

                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="mt-0 font-size-14 mb-3 text-muted">Fits (Horz/Vert)</h5>
                                            <a class="image-popup-vertical-fit" href="{{ URL::asset('/images/small/img-2.jpg')}}" title="Caption. Can be aligned it to any side and contain any HTML.">
                                                <img class="img-fluid" alt="" src="{{ URL::asset('/images/small/img-2.jpg')}}" width="145">
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="mt-0 font-size-14 mb-3 text-muted">Effects</h5>
                                            <a class="image-popup-no-margins" href="{{ URL::asset('/images/small/img-3.jpg')}}">
                                                <img class="img-fluid" alt="" src="{{ URL::asset('/images/small/img-3.jpg')}}" width="75">
                                            </a>
                                            <p class="mt-2 mb-0 text-muted">No gaps, zoom animation, close icon in top-right corner.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Lightbox gallery</h4>
                                    <p class="card-title-desc">In this example lazy-loading of images is enabled for the next image based on move direction. </p>

                                    <div class="popup-gallery">
                                        <a class="float-left" href="{{ URL::asset('/images/small/img-1.jpg')}}" title="Project 1">
                                            <div class="img-responsive">
                                                <img src="{{ URL::asset('/images/small/img-1.jpg')}}" alt="" width="120">
                                            </div>
                                        </a>
                                        <a class="float-left" href="{{ URL::asset('/images/small/img-2.jpg')}}" title="Project 2">
                                            <div class="img-responsive">
                                                <img src="{{ URL::asset('/images/small/img-2.jpg')}}" alt="" width="120">
                                            </div>
                                        </a>
                                        <a class="float-left" href="{{ URL::asset('/images/small/img-3.jpg')}}" title="Project 3">
                                            <div class="img-responsive">
                                                <img src="{{ URL::asset('/images/small/img-3.jpg')}}" alt="" width="120">
                                            </div>
                                        </a>
                                        <a class="float-left" href="{{ URL::asset('/images/small/img-4.jpg')}}" title="Project 4">
                                            <div class="img-responsive">
                                                <img src="{{ URL::asset('/images/small/img-4.jpg')}}" alt="" width="120">
                                            </div>
                                        </a>
                                        <a class="float-left" href="{{ URL::asset('/images/small/img-5.jpg')}}" title="Project 5">
                                            <div class="img-responsive">
                                                <img src="{{ URL::asset('/images/small/img-5.jpg')}}" alt="" width="120">
                                            </div>
                                        </a>
                                        <a class="float-left" href="{{ URL::asset('/images/small/img-6.jpg')}}" title="Project 6">
                                            <div class="img-responsive">
                                                <img src="{{ URL::asset('/images/small/img-6.jpg')}}" alt="" width="120">
                                            </div>
                                        </a>
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

                                    <h4 class="card-title">Zoom Gallery</h4>
                                    <p class="card-title-desc">Zoom effect works only with images.</p>

                                    <div class="zoom-gallery">
                                        <a class="float-left" href="{{ URL::asset('/images/small/img-3.jpg')}}" title="Project 1"><img src="{{ URL::asset('/images/small/img-3.jpg')}}" alt="" width="275"></a>
                                        <a class="float-left" href="{{ URL::asset('/images/small/img-7.jpg')}}" title="Project 2"><img src="{{ URL::asset('/images/small/img-7.jpg')}}" alt="" width="275"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Popup with video or map</h4>
                                    <p class="card-title-desc">In this example lazy-loading of images is enabled for the next image based on move direction. </p>

                                    <div class="row">
                                        <div class="col-12">
                                            <a class="popup-youtube btn btn-secondary mr-1 mt-2" href="http://www.youtube.com/watch?v=0O2aH4XLbto">Open YouTube Video</a>
                                            <a class="popup-vimeo btn btn-secondary mr-1 mt-2" href="https://vimeo.com/45830194">Open Vimeo Video</a>
                                            <a class="popup-gmaps btn btn-secondary mr-1 mt-2" href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom">Open Google Map</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
@endsection

@section('footerScript')
            <!-- Magnific Popup-->
            <script src="{{ URL::asset('/libs/magnific-popup/magnific-popup.min.js')}}"></script>
            <!-- lightbox init js-->
            <script src="{{ URL::asset('/js/pages/lightbox.init.js')}}"></script>

           
@endsection