@extends('layouts.master')

@section('title') Email Read @endsection

@section('content')
 <!-- start page title -->
                    <div class="row">



                         @component('common-components.breadcrumb')
                     @slot('title') Email Read  @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') Email  @endslot
                     @slot('li3') Email Read @endslot
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
                                    <div class="btn-toolbar p-3" role="toolbar">
                                        <div class="btn-group mo-mb-2">
                                            <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-inbox"></i></button>
                                            <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-exclamation-circle"></i></button>
                                            <button type="button" class="btn btn-primary waves-light waves-effect"><i class="far fa-trash-alt"></i></button>
                                        </div>
                                        <div class="btn-group ml-1 mo-mb-2">
                                            <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-folder"></i>
                                                <i class="mdi mdi-chevron-down"></i>
                                            </button>
                                            <div class="dropdown-menu mo-mb-2">
                                                <a class="dropdown-item" href="#">Updates</a>
                                                <a class="dropdown-item" href="#">Social</a>
                                                <a class="dropdown-item" href="#">Team Manage</a>
                                            </div>
                                        </div>
                                        <div class="btn-group ml-1 mo-mb-2">
                                            <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-tag"></i>
                                                <i class="mdi mdi-chevron-down"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Updates</a>
                                                <a class="dropdown-item" href="#">Social</a>
                                                <a class="dropdown-item" href="#">Team Manage</a>
                                            </div>
                                        </div>

                                        <div class="btn-group ml-1 mo-mb-2">
                                            <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                More <i class="mdi mdi-chevron-down"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Mark as Unread</a>
                                                <a class="dropdown-item" href="#">Mark as Important</a>
                                                <a class="dropdown-item" href="#">Add to Tasks</a>
                                                <a class="dropdown-item" href="#">Add Star</a>
                                                <a class="dropdown-item" href="#">Mute</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <div class="media mb-4">
                                            <img class="d-flex mr-3 rounded-circle avatar-sm" src="{{ URL::asset('/images/users/user-1.jpg')}}" alt="Generic placeholder image">
                                            <div class="media-body align-self-center">
                                                <h4 class="font-size-14 m-0">Humberto D. Champion</h4>
                                                <small class="text-muted">support@domain.com</small>
                                            </div>
                                        </div>

                                        <h4 class="mt-0 font-size-16">This Week's Top Stories</h4>

                                        <p>Dear Lorem Ipsum,</p>
                                        <p>Praesent dui ex, dapibus eget mauris ut, finibus vestibulum enim. Quisque arcu leo, facilisis in fringilla id, luctus in tortor. Nunc vestibulum est quis orci varius viverra. Curabitur dictum volutpat massa vulputate molestie. In at felis ac velit maximus convallis.
                                        </p>
                                        <p>Sed elementum turpis eu lorem interdum, sed porttitor eros commodo. Nam eu venenatis tortor, id lacinia diam. Sed aliquam in dui et porta. Sed bibendum orci non tincidunt ultrices. Vivamus fringilla, mi lacinia dapibus condimentum, ipsum urna lacinia lacus, vel tincidunt mi nibh sit amet lorem.</p>
                                        <p>Sincerly,</p>
                                        <hr />

                                        <div class="row">
                                            <div class="col-xl-2 col-6">
                                                <div class="card">
                                                    <img class="card-img-top img-fluid" src="{{ URL::asset('/images/small/img-3.jpg')}}" alt="Card image cap">
                                                    <div class="my-2 text-center">
                                                        <a href="" class="text-muted font-weight-normal">Download</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-6">
                                                <div class="card">
                                                    <img class="card-img-top img-fluid" src="{{ URL::asset('/images/small/img-4.jpg')}}" alt="Card image cap">
                                                    <div class="my-2 text-center">
                                                        <a href="" class="text-muted font-weight-normal">Download</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="email-compose" class="btn btn-secondary waves-effect mt-5"><i
                                                class="mdi mdi-reply"></i> Reply</a>
                                    </div>

                                </div>

                            </div>
                            <!-- end Col-9 -->

                        </div>

                    </div>
                    <!-- End row -->

@endsection
