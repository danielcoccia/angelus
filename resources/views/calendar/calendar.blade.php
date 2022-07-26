@extends('layouts.master')

@section('title') Calendar @endsection

@section('headerCss')
<!-- Plugin css -->
<link href="{{ URL::asset('/libs/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />  
@endsection

@section('content')
 <!-- start page title -->
                    <div class="row">

                @component('common-components.breadcrumb')
                     @slot('title') Calender  @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') Calender  @endslot
                     @slot('li3') Calender  @endslot
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
                                    <div id='calendar'></div>

                                    <div style='clear:both'></div>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection

@section('footerScript')
            <!-- plugin js -->
            <script src="{{ URL::asset('/libs/moment/moment.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/jquery-ui/jquery-ui.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/fullcalendar/fullcalendar.min.js')}}"></script>

            <!-- Calendar init -->
            <script src="{{ URL::asset('/js/pages/calendar.init.js')}}"></script>
@endsection