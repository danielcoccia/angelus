@extends('layouts.master')

@section('title') Form Xeditable @endsection

@section('headerCss')
 <!-- Plugins css -->
    <link href="{{ URL::asset('/libs/bootstrap-editable/bootstrap-editable.min.css')}}" rel="stylesheet" type="text/css" /> 
    
@endsection

@section('content')
 <!-- start page title -->
                    <div class="row">

               @component('common-components.breadcrumb')
                     @slot('title') Form Xeditable @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') Forms  @endslot
                     @slot('li3') Form Xeditable @endslot
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

                                    <h4 class="card-title">Inline Example</h4>
                                    <p class="card-title-desc">This library allows you to create editable elements on your page. It can be used with any engine (bootstrap, jquery-ui, jquery only) and includes both popup and inline modes. Please try out demo to see how it works.</p>

                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th style="width: 50%;">Inline</th>
                                                    <th>Examples</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Simple Text Field</td>
                                                    <td>
                                                        <a href="#" id="inline-username" data-type="text" data-pk="1" data-title="Enter username">superuser</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Empty text field, required</td>
                                                    <td>
                                                        <a href="#" id="inline-firstname" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter your firstname"></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Select, local array, custom display</td>
                                                    <td>
                                                        <a href="#" id="inline-sex" data-type="select" data-pk="1" data-value="" data-title="Select sex"></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Select, error while loading</td>
                                                    <td>
                                                        <a href="#" id="inline-status" data-type="select" data-pk="1" data-value="0" data-source="/status" data-title="Select status">Active</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Combodate</td>
                                                    <td>
                                                        <a href="#" id="inline-dob" data-type="combodate" data-value="2015-09-24" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1" data-title="Select Date of birth"></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Textarea, buttons below. Submit by ctrl+enter</td>
                                                    <td>
                                                        <a href="#" id="inline-comments" data-type="textarea" data-pk="1" data-placeholder="Your comments here..." data-title="Enter comments">awesome user!</a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
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
            <script src="{{ URL::asset('/libs/moment/moment.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/bootstrap-editable/bootstrap-editable.min.js')}}"></script>

            <!-- Init js-->
            <script src="{{ URL::asset('/js/pages/form-xeditable.init.js')}}"></script>
@endsection