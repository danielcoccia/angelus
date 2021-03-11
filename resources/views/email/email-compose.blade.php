@extends('layouts.master')

@section('title') Email Compose @endsection

@section('headerCss')
    <!-- Summernote css -->
    <link href="{{ URL::asset('/libs/summernote/summernote.min.css')}}" rel="stylesheet" type="text/css" /> 
@endsection

@section('content')
                    <!-- start page title -->
                    <div class="row">


                         @component('common-components.breadcrumb')
                     @slot('title') Email Compose  @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') Email  @endslot
                     @slot('li3') Email Compose  @endslot
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
                            <!-- Left sidebar -->
                            <div class="email-leftbar card">
                                <a href="/email/email-compose" class="btn btn-danger rounded btn-custom btn-block waves-effect waves-light">Compose</a>

                                <div class="mail-list mt-3">
                                    <a href="#" class="active">Inbox <span class="ml-1">(18)</span></a>
                                    <a href="#">Starred</a>
                                    <a href="#">Important</a>
                                    <a href="#">Draft</a>
                                    <a href="#">Sent Mail</a>
                                    <a href="#">Trash</a>
                                </div>

                                <h5 class="mt-4">Labels</h5>

                                <div class="mail-list mt-3">
                                    <a href="#"><span
                                            class="mdi mdi-arrow-right-drop-circle text-info float-right mt-1 ml-2"></span>Theme
                                        Support</a>
                                    <a href="#"><span
                                            class="mdi mdi-arrow-right-drop-circle text-warning float-right mt-1 ml-2"></span>Freelance</a>
                                    <a href="#"><span
                                            class="mdi mdi-arrow-right-drop-circle text-primary float-right mt-1 ml-2"></span>Social</a>
                                    <a href="#"><span
                                            class="mdi mdi-arrow-right-drop-circle text-danger float-right mt-1 ml-2"></span>Friends</a>
                                    <a href="#"><span
                                            class="mdi mdi-arrow-right-drop-circle text-success float-right mt-1 ml-2"></span>Family</a>
                                </div>

                                <h5 class="mt-4">Chat</h5>

                                <div class="mt-3">
                                    <a href="#" class="media">
                                        <img class="d-flex mr-3 rounded-circle" src="{{ URL::asset('/images/users/user-2.jpg')}}" alt="Generic placeholder image" height="36">
                                        <div class="media-body chat-user-box">
                                            <p class="user-title m-0">Scott Median</p>
                                            <p class="text-muted">Hello</p>
                                        </div>
                                    </a>

                                    <a href="#" class="media">
                                        <img class="d-flex mr-3 rounded-circle" src="{{ URL::asset('/images/users/user-3.jpg')}}" alt="Generic placeholder image" height="36">
                                        <div class="media-body chat-user-box">
                                            <p class="user-title m-0">Julian Rosa</p>
                                            <p class="text-muted">What about our next..</p>
                                        </div>
                                    </a>

                                    <a href="#" class="media">
                                        <img class="d-flex mr-3 rounded-circle" src="{{ URL::asset('/images/users/user-4.jpg')}}" alt="Generic placeholder image" height="36">
                                        <div class="media-body chat-user-box">
                                            <p class="user-title m-0">David Medina</p>
                                            <p class="text-muted">Yeah everything is fine</p>
                                        </div>
                                    </a>

                                    <a href="#" class="media">
                                        <img class="d-flex mr-3 rounded-circle" src="{{ URL::asset('/images/users/user-6.jpg')}}" alt="Generic placeholder image" height="36">
                                        <div class="media-body chat-user-box">
                                            <p class="user-title m-0">Jay Baker</p>
                                            <p class="text-muted">Wow that's great</p>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <!-- End Left sidebar -->

                            <!-- Right Sidebar -->
                            <div class="email-rightbar mb-3">

                                <div class="card">
                                    <div class="card-body">

                                        <form>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="To">
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Subject">
                                            </div>
                                            <div class="form-group">
                                                <div class="summernote">
                                                    <h6>Hello Summer note</h6>
                                                    <ul>
                                                        <li>
                                                            Select a text to reveal the toolbar.
                                                        </li>
                                                        <li>
                                                            Edit rich document on-the-fly, so elastic!
                                                        </li>
                                                    </ul>
                                                    <p>
                                                        End of air-mode area
                                                    </p>

                                                </div>
                                            </div>

                                            <div class="btn-toolbar form-group mb-0">
                                                <div class="">
                                                    <button type="button" class="btn btn-success waves-effect waves-light mr-1"><i class="far fa-save"></i></button>
                                                    <button type="button" class="btn btn-success waves-effect waves-light mr-1"><i class="far fa-trash-alt"></i></button>
                                                    <button class="btn btn-primary waves-effect waves-light">
                                                        <span>Send</span> <i class="fab fa-telegram-plane ml-2"></i>
                                                    </button>
                                                </div>
                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>
                            <!-- end Col-9 -->

                        </div>

                    </div>
                    <!-- End row -->

@endsection

@section('footerScript')
 <!-- Summernote js -->
            <script src="{{ URL::asset('/libs/summernote/summernote.min.js')}}"></script>

            <!-- email summernote init -->
            <script src="{{ URL::asset('/js/pages/email-summernote.init.js')}}"></script>

@endsection