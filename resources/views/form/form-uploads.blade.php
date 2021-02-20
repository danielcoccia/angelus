@extends('layouts.master')

@section('title') Form Upload @endsection

@section('headerCss')
<!-- Plugins css -->
    <link href="{{ URL::asset('/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    
@endsection

@section('content')
 <!-- start page title -->
                    <div class="row">
             @component('common-components.breadcrumb')
                     @slot('title') Form Upload  @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') Forms  @endslot
                     @slot('li3') Form Upload @endslot
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
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Dropzone</h4>
                                    <p class="card-title-desc">DropzoneJS is an open source library that provides drag’n’drop file uploads with image previews.
                                    </p>

                                    <div>
                                        <form action="#" class="dropzone">
                                            <div class="fallback">
                                                <input name="file" type="file" multiple="multiple">
                                            </div>
                                            <div class="dz-message needsclick">

                                                <h4>Drop files here or click to upload.</h4>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="text-center mt-4">
                                        <button type="button" class="btn btn-primary waves-effect waves-light">Send Files
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
@endsection

@section('footerScript')
     <!-- Plugins js -->
            <script src="{{ URL::asset('/libs/dropzone/dropzone.min.js')}}"></script>

@endsection