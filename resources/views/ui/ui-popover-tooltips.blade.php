@extends('layouts.master')

@section('title') Popover & Tooltips @endsection

@section('content')
 <!-- start page title -->
                    <div class="row">
                         @component('common-components.breadcrumb')
                     @slot('title') Popover & Tooltips @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') UI Elements @endslot
                     @slot('li3') Popover & Tooltips @endslot
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

                                    <h4 class="card-title">Popovers</h4>
                                    <p class="card-title-desc">Add small overlay content, like those found in iOS, to any element for housing secondary information.</p>

                                    <button type="button" class="btn btn-secondary waves-effect mo-mb-2" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                        Popover on top
                                    </button>

                                    <button type="button" class="btn btn-secondary waves-effect mo-mb-2" data-container="body" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                        Popover on right
                                    </button>

                                    <button type="button" class="btn btn-secondary waves-effect mo-mb-2" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                        Popover on bottom
                                    </button>

                                    <button type="button" class="btn btn-secondary waves-effect mo-mb-2" data-container="body" data-toggle="popover" data-placement="left" title="Popover Title" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                        Popover on left
                                    </button>

                                    <button type="button" class="btn btn-primary waves-effect waves-light mo-mb-2" data-toggle="popover" data-trigger="focus" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">Dismissible popover</button>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Tooltips</h4>
                                    <p class="card-title-desc">Hover over the links below to see tooltips:</p>

                                    <button type="button" class="btn btn-secondary mo-mb-2" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                        Tooltip on top
                                    </button>

                                    <button type="button" class="btn btn-secondary mo-mb-2" data-toggle="tooltip" data-placement="right" title="Tooltip on right">
                                        Tooltip on right
                                    </button>

                                    <button type="button" class="btn btn-secondary mo-mb-2" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">
                                        Tooltip on bottom
                                    </button>

                                    <button type="button" class="btn btn-secondary mo-mb-2" data-toggle="tooltip" data-placement="left" title="Tooltip on left">
                                        Tooltip on left
                                    </button>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
@endsection
