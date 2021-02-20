@extends('layouts.master')

@section('title') Directory @endsection

@section('content')

                    <!-- start page title -->
                    <div class="row">

                           @component('common-components.breadcrumb')
                     @slot('title') Directory @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') Pages  @endslot
                     @slot('li3') Directory @endslot
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

                        <div class="col-xl-4 col-md-6">
                            <div class="card directory-card">
                                <div>
                                    <div class="directory-bg text-center">
                                        <div class="directory-overlay">
                                            <img class="rounded-circle avatar-lg img-thumbnail" src="{{ URL::asset('/images/users/user-2.jpg')}}" alt="Generic placeholder image">
                                        </div>
                                    </div>

                                    <div class="directory-content text-center p-4">
                                        <p class=" mt-4">Creative Director</p>
                                        <h5 class="font-size-16">Katherine J. McAvoy</h5>

                                        <p class="text-muted">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>

                                        <ul class="social-links list-inline mb-0 mt-4">
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-primary" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-info" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-danger" data-toggle="tooltip" class="tooltips" href="" data-original-title="1234567890"><i class="fa fa-phone"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-info" data-toggle="tooltip" class="tooltips" href="" data-original-title="@skypename"><i class="fab fa-skype"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-4 col-md-6">
                            <div class="card directory-card">
                                <div>
                                    <div class="directory-bg text-center">
                                        <div class="directory-overlay">
                                            <img class="rounded-circle avatar-lg img-thumbnail" src="{{ URL::asset('/images/users/user-3.jpg')}}" alt="Generic placeholder image">
                                        </div>
                                    </div>

                                    <div class="directory-content text-center p-4">
                                        <p class=" mt-4">Creative Director</p>
                                        <h5 class="font-size-16">Richard L. Jackson</h5>
                                        <p class="text-muted">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>

                                        <ul class="social-links list-inline mb-0 mt-4">
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-primary" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-info" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-danger" data-toggle="tooltip" class="tooltips" href="" data-original-title="1234567890"><i class="fa fa-phone"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-info" data-toggle="tooltip" class="tooltips" href="" data-original-title="@skypename"><i class="fab fa-skype"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-4 col-md-6">
                            <div class="card directory-card">
                                <div>
                                    <div class="directory-bg text-center">
                                        <div class="directory-overlay">
                                            <img class="rounded-circle avatar-lg img-thumbnail" src="{{ URL::asset('/images/users/user-4.jpg')}}" alt="Generic placeholder image">
                                        </div>
                                    </div>

                                    <div class="directory-content text-center p-4">
                                        <p class=" mt-4">Creative Director</p>
                                        <h5 class="font-size-16">Joshua D. Pearson</h5>
                                        <p class="text-muted">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>

                                        <ul class="social-links list-inline mb-0 mt-4">
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-primary" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-info" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-danger" data-toggle="tooltip" class="tooltips" href="" data-original-title="1234567890"><i class="fa fa-phone"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-info" data-toggle="tooltip" class="tooltips" href="" data-original-title="@skypename"><i class="fab fa-skype"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-4 col-md-6">
                            <div class="card directory-card">
                                <div>
                                    <div class="directory-bg text-center">
                                        <div class="directory-overlay">
                                            <img class="rounded-circle avatar-lg img-thumbnail" src="{{ URL::asset('/images/users/user-5.jpg')}}" alt="Generic placeholder image">
                                        </div>
                                    </div>

                                    <div class="directory-content text-center p-4">
                                        <p class=" mt-4">Creative Director</p>
                                        <h5 class="font-size-16">Michael J. Folma</h5>
                                        <p class="text-muted">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>

                                        <ul class="social-links list-inline mb-0 mt-4">
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-primary" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-info" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-danger" data-toggle="tooltip" class="tooltips" href="" data-original-title="1234567890"><i class="fa fa-phone"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-info" data-toggle="tooltip" class="tooltips" href="" data-original-title="@skypename"><i class="fab fa-skype"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-4 col-md-6">
                            <div class="card directory-card">
                                <div>

                                    <div class="directory-bg text-center">
                                        <div class="directory-overlay">
                                            <img class="rounded-circle avatar-lg img-thumbnail" src="{{ URL::asset('/images/users/user-6.jpg')}}" alt="Generic placeholder image">
                                        </div>
                                    </div>

                                    <div class="directory-content text-center p-4">
                                        <p class=" mt-4">Creative Director</p>
                                        <h5 class="font-size-16">Samuel P. Augustus</h5>
                                        <p class="text-muted">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>

                                        <ul class="social-links list-inline mb-0 mt-4">
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-primary" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-info" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-danger" data-toggle="tooltip" class="tooltips" href="" data-original-title="1234567890"><i class="fa fa-phone"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-info" data-toggle="tooltip" class="tooltips" href="" data-original-title="@skypename"><i class="fab fa-skype"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-4 col-md-6">
                            <div class="card directory-card">
                                <div>
                                    <div class="directory-bg text-center">
                                        <div class="directory-overlay">
                                            <img class="img-thumbnail rounded-circle avatar-lg" src="{{ URL::asset('/images/users/user-7.jpg')}}" alt="Generic placeholder image">
                                        </div>
                                    </div>

                                    <div class="directory-content text-center p-4">
                                        <p class=" mt-4">Creative Director</p>
                                        <h5 class="font-size-16">Joseph D. Starnes</h5>
                                        <p class="text-muted">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>

                                        <ul class="social-links list-inline mb-0 mt-4">
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-primary" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-info" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-danger" data-toggle="tooltip" class="tooltips" href="" data-original-title="1234567890"><i class="fa fa-phone"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" class="btn-info" data-toggle="tooltip" class="tooltips" href="" data-original-title="@skypename"><i class="fab fa-skype"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                    </div>
                    <!-- end row -->
@endsection
