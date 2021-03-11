@extends('layouts.master')

@section('title') Jquery Knob Chart @endsection

@section('content')
 <!-- start page title -->
                    <div class="row">
                @component('common-components.breadcrumb')
                     @slot('title') Jquery Knob Chart  @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') Charts  @endslot
                     @slot('li3') Jquery Knob Chart  @endslot
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

                                    <h4 class="card-title">Examples</h4>
                                    <p class="card-title-desc">Nice, downward compatible, touchable, jQuery dial</p>

                                    <div class="row text-center">
                                        <div class="col-lg-4 text-center" dir="ltr">
                                            <h5 class="font-size-16 mb-4">Disable display input</h5>
                                            <input class="knob" data-width="150" data-fgcolor="#7a6fbe" data-displayinput="false" value="35">
                                        </div>
                                        <div class="col-lg-4 text-center" dir="ltr">
                                            <h5 class="font-size-16 mb-4">Cursor mode</h5>
                                            <input class="knob" data-width="150" data-cursor="true" data-fgcolor="#4ac18e" value="29">
                                        </div>
                                        <div class="col-lg-4 text-center" dir="ltr">
                                            <h5 class="font-size-16 mb-4">Display previous value</h5>
                                            <input class="knob" data-width="150" data-min="-100" data-fgcolor="#ffbb44" data-displayprevious="true" value="44">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4 text-center" dir="ltr">
                                            <h5 class="font-size-16 mb-4">Angle offset</h5>
                                            <input class="knob" data-width="150" data-angleoffset="90" data-linecap="round" data-fgcolor="#ea553d" value="35">
                                        </div>
                                        <div class="col-lg-4 text-center" dir="ltr">
                                            <h5 class="font-size-16 mb-4"> 5-digit values, step 1000</h5>
                                            <input class="knob" data-width="150" data-min="-15000" data-displayprevious="true" data-max="15000" data-step="1000" value="-11000" data-fgcolor="#1d1e3a">
                                        </div>
                                        <div class="col-lg-4 text-center" dir="ltr">
                                            <h5 class="font-size-16 mb-4">Angle offset and arc</h5>
                                            <input class="knob" data-width="150" data-cursor="true" data-fgcolor="#f06292" value="29">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4 text-center" dir="ltr">
                                            <h5 class="font-size-16 mb-4">Readonly</h5>
                                            <input class="knob" data-width="150" data-height="150" data-linecap=round data-fgColor="#5468da" value="80" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".1" />
                                        </div>
                                        <div class="col-lg-4 text-center" dir="ltr">
                                            <h5 class="font-size-16 mb-4"> Angle offset and arc</h5>
                                            <input class="knob" data-width="150" data-height="150" data-displayPrevious=true data-fgColor="#8d6e63" data-skin="tron" data-cursor=true value="75" data-thickness=".2" data-angleOffset=-125 data-angleArc=250 value="44" />

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
 <script src="{{ URL::asset('/libs/jquery-knob/jquery-knob.min.js')}}"></script>
 <script src="{{ URL::asset('/js/pages/jquery-knob.init.js')}}"></script>
@endsection
