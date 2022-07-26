@extends('layouts.master')

@section('title') Badge @endsection

@section('content')

                    <!-- start page title -->
                    <div class="row">
                         @component('common-components.breadcrumb')
                     @slot('title') Badge @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') UI Elements  @endslot
                     @slot('li3') Badge  @endslot
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

                                    <h4 class="card-title">Example</h4>
                                    <p class="card-title-desc">Badges scale to match the size of the immediate parent element by using relative font sizing and <code class="highlighter-rouge">em</code> units.</p>

                                    <div class="">
                                        <h1>Example heading <span class="badge badge-light">New</span></h1>
                                        <h2>Example heading <span class="badge badge-light">New</span></h2>
                                        <h3>Example heading <span class="badge badge-light">New</span></h3>
                                        <h4>Example heading <span class="badge badge-light">New</span></h4>
                                        <h5>Example heading <span class="badge badge-light">New</span></h5>
                                        <h6>Example heading <span class="badge badge-light">New</span></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Variations</h4>
                                    <p class="card-title-desc">Add any of the below mentioned modifier classes to change the appearance of a badge.</p>

                                    <div>
                                        <span class="badge badge-light">Light</span>
                                        <span class="badge badge-primary">Primary</span>
                                        <span class="badge badge-success">Success</span>
                                        <span class="badge badge-info">Info</span>
                                        <span class="badge badge-warning">Warning</span>
                                        <span class="badge badge-danger">Danger</span>
                                        <span class="badge badge-dark">Dark</span>
                                    </div>

                                    <p class="card-title-desc mt-5">Use the <code class="highlighter-rouge">.badge-pill</code> modifier class to make badges more rounded (with a larger <code class="highlighter-rouge">border-radius</code> and additional horizontal <code class="highlighter-rouge">padding</code>). Useful if you miss the badges from v3.</p>

                                    <div>
                                        <span class="badge badge-pill badge-light">Light</span>
                                        <span class="badge badge-pill badge-primary">Primary</span>
                                        <span class="badge badge-pill badge-success">Success</span>
                                        <span class="badge badge-pill badge-info">Info</span>
                                        <span class="badge badge-pill badge-warning">Warning</span>
                                        <span class="badge badge-pill badge-danger">Danger</span>
                                        <span class="badge badge-pill badge-dark">Dark</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
@endsection
