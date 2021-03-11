@extends('layouts.master')

@section('title') Form Validation @endsection

@section('content')
  <!-- start page title -->
                    <div class="row">
            @component('common-components.breadcrumb')
                     @slot('title') Form Validation  @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') Forms  @endslot
                     @slot('li3') Form Validation @endslot
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

                                    <h4 class="card-title">Validation type</h4>
                                    <p class="card-title-desc">Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.</p>

                                    <form class="custom-validation" action="#">
                                        <div class="form-group">
                                            <label>Required</label>
                                            <input type="text" class="form-control" required placeholder="Type something" />
                                        </div>

                                        <div class="form-group">
                                            <label>Equal To</label>
                                            <div>
                                                <input type="password" id="pass2" class="form-control" required placeholder="Password" />
                                            </div>
                                            <div class="mt-2">
                                                <input type="password" class="form-control" required data-parsley-equalto="#pass2" placeholder="Re-Type Password" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>E-Mail</label>
                                            <div>
                                                <input type="email" class="form-control" required parsley-type="email" placeholder="Enter a valid e-mail" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>URL</label>
                                            <div>
                                                <input parsley-type="url" type="url" class="form-control" required placeholder="URL" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Digits</label>
                                            <div>
                                                <input data-parsley-type="digits" type="text" class="form-control" required placeholder="Enter only digits" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Number</label>
                                            <div>
                                                <input data-parsley-type="number" type="text" class="form-control" required placeholder="Enter only numbers" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Alphanumeric</label>
                                            <div>
                                                <input data-parsley-type="alphanum" type="text" class="form-control" required placeholder="Enter alphanumeric value" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Textarea</label>
                                            <div>
                                                <textarea required class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                    Submit
                                                </button>
                                                <button type="reset" class="btn btn-secondary waves-effect">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Range validation</h4>
                                    <p class="card-title-desc">Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.</p>

                                    <form action="#" class="custom-validation">

                                        <div class="form-group">
                                            <label>Min Length</label>
                                            <div>
                                                <input type="text" class="form-control" required data-parsley-minlength="6" placeholder="Min 6 chars." />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Max Length</label>
                                            <div>
                                                <input type="text" class="form-control" required data-parsley-maxlength="6" placeholder="Max 6 chars." />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Range Length</label>
                                            <div>
                                                <input type="text" class="form-control" required data-parsley-length="[5,10]" placeholder="Text between 5 - 10 chars length" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Min Value</label>
                                            <div>
                                                <input type="text" class="form-control" required data-parsley-min="6" placeholder="Min value is 6" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Max Value</label>
                                            <div>
                                                <input type="text" class="form-control" required data-parsley-max="6" placeholder="Max value is 6" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Range Value</label>
                                            <div>
                                                <input class="form-control" required type="text range" min="6" max="100" placeholder="Number between 6 - 100" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Regular Exp</label>
                                            <div>
                                                <input type="text" class="form-control" required data-parsley-pattern="#[A-Fa-f0-9]{6}" placeholder="Hex. Color" />
                                            </div>
                                        </div>

                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                    Submit
                                                </button>
                                                <button type="reset" class="btn btn-secondary waves-effect">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
@endsection

@section('footerScript')
  <script src="{{ URL::asset('/libs/parsleyjs/parsleyjs.min.js')}}"></script>
  <script src="{{ URL::asset('/js/pages/form-validation.init.js')}}"></script>
@endsection