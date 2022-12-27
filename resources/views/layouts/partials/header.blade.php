
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box" style="background: #fff;">
                  <!--       <a href="/" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ URL::asset('/images/logo-sm.png')}}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ URL::asset('/images/logo-dark.png')}}" alt="" height="17">
                            </span>
                        </a> -->

                       {{-- <a href="/" class="logo">--}}
                            {{--<span class="logo-sm">
                                <img src="{{ URL::asset('/images/logo150px.png')}}" alt="" height="22">
                            </span>--}}
                            <span class="logo-lg">
                                <img src="{{ URL::asset('/images/logo150px.png')}}" style=" margin:1em;" alt="" height="55">
                            </span>
                        {{--</a>--}}
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <!-- <div class="d-none d-sm-block">
                        <div class="dropdown dropdown-topbar pt-3 mt-1 d-inline-block">
                            <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Create <i class="mdi mdi-chevron-down"></i>
                                </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>
                    </div> -->
                </div>

                <div class="d-flex">

                     <!-- App Search-->
                    <!--  <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="fa fa-search"></span>
                        </div>
                    </form> -->

                    <div class="dropdown d-inline-block d-lg-none ml-2">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                            aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- <div class="dropdown d-none d-md-block ml-2">
                        <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="mr-2" src="{{ URL::asset('/images/flags/us_flag.jpg')}}" alt="Header Language" height="16"> English <span class="mdi mdi-chevron-down"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ URL::asset('/images/flags/germany_flag.jpg')}}" alt="user-image" class="mr-1" height="12"> <span class="align-middle"> German </span>
                            </a>


                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ URL::asset('/images/flags/italy_flag.jpg')}}" alt="user-image" class="mr-1" height="12"> <span class="align-middle"> Italian </span>
                            </a>


                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ URL::asset('/images/flags/french_flag.jpg')}}" alt="user-image" class="mr-1" height="12"> <span class="align-middle"> French </span>
                            </a>


                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ URL::asset('/images/flags/spain_flag.jpg')}}" alt="user-image" class="mr-1" height="12"> <span class="align-middle"> Spanish </span>
                            </a>


                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ URL::asset('/images/flags/russia_flag.jpg')}}" alt="user-image" class="mr-1" height="12"> <span class="align-middle"> Russian </span>
                            </a>
                        </div>
                    </div> -->

<!--                     <div class="dropdown d-none d-lg-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                            <i class="mdi mdi-fullscreen font-size-24"></i>
                        </button>
                    </div> -->

                    <div class="dropdown d-inline-block ml-1">
<!--                         <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-bell"></i>
                            <span class="badge badge-danger badge-pill">3</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="m-0"> Notifications (258) </h5>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">
                                <a href="" class="text-reset notification-item">
                                    <div class="media">
                                        <div class="avatar-xs mr-3">
                                            <span class="avatar-title border-success rounded-circle ">
                                                <i class="mdi mdi-cart-outline"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">Your order is placed</h6>
                                            <div class="text-muted">
                                                <p class="mb-1">If several languages coalesce the grammar</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="text-reset notification-item">
                                    <div class="media">
                                        <div class="avatar-xs mr-3">
                                            <span class="avatar-title border-warning rounded-circle ">
                                                <i class="mdi mdi-message"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">New Message received</h6>
                                            <div class="text-muted">
                                                <p class="mb-1">You have 87 unread messages</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="text-reset notification-item">
                                    <div class="media">
                                        <div class="avatar-xs mr-3">
                                            <span class="avatar-title border-info rounded-circle ">
                                                <i class="mdi mdi-glass-cocktail"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">Your item is shipped</h6>
                                            <div class="text-muted">
                                                <p class="mb-1">It is a long established fact that a reader will</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="text-reset notification-item">
                                    <div class="media">
                                        <div class="avatar-xs mr-3">
                                            <span class="avatar-title border-primary rounded-circle ">
                                                <i class="mdi mdi-cart-outline"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">Your order is placed</h6>
                                            <div class="text-muted">
                                                <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="text-reset notification-item">
                                    <div class="media">
                                        <div class="avatar-xs mr-3">
                                            <span class="avatar-title border-warning rounded-circle ">
                                                <i class="mdi mdi-message"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">New Message received</h6>
                                            <div class="text-muted">
                                                <p class="mb-1">You have 87 unread messages</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2 border-top">
                                <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                                    View all
                                </a>
                            </div> -->
                        </div>
                    </div>


                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="{{ URL::asset('/images/users/ico_usuario.png')}}"
                                alt="Header Avatar">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <!-- <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle font-size-17 text-muted align-middle mr-1"></i> Profile</a> -->
                            <!-- <a class="dropdown-item" href="#"><i class="mdi mdi-wallet font-size-17 text-muted align-middle mr-1"></i> My Wallet</a> -->
                            <!-- <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right">11</span><i class="mdi mdi-settings font-size-17 text-muted align-middle mr-1"></i> Settings</a> -->
                            <a class="dropdown-item" href="/usuario/alterar-senha"><i class="mdi mdi-lock-open-outline font-size-17 text-muted align-middle mr-1"></i>Alterar Senha</a>
                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item text-danger" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="mdi mdi-power font-size-17 text-muted align-middle mr-1 text-danger"></i> {{ __('Sair') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
<!--
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="mdi mdi-spin mdi-settings"></i>
                        </button>
                    </div> -->

                </div>
            </div>
        </header>
