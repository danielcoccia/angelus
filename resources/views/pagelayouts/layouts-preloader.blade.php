@extends('layouts.layouts-preloader-master')

@section('title') Preloader @endsection

@section('content')
<!-- start page title -->
                    <div class="row">

                @component('common-components.breadcrumb')
                     @slot('title') Preloader @endslot                     
                     @slot('li1') Lexa  @endslot
                     @slot('li2') Layouts  @endslot
                     @slot('li3') Preloader @endslot
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
                        <div class="col-xl-3 col-md-6">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-cube-outline float-right"></i>
                                    </div>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mb-3 font-size-16">Orders</h6>
                                        <h2 class="mb-4">1,587</h2>
                                        <span class="badge badge-info"> +11% </span> <span class="ml-2">From previous period</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-buffer float-right"></i>
                                    </div>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mb-3 font-size-16">Revenue</h6>
                                        <h2 class="mb-4">$46,782</h2>
                                        <span class="badge badge-danger"> -29% </span> <span class="ml-2">From previous period</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-tag-text-outline float-right"></i>
                                    </div>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mb-3 font-size-16">Average Price</h6>
                                        <h2 class="mb-4">$15.9</h2>
                                        <span class="badge badge-warning"> 0% </span> <span class="ml-2">From previous period</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-briefcase-check float-right"></i>
                                    </div>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mb-3 font-size-16">Product Sold</h6>
                                        <h2 class="mb-4">1890</h2>
                                        <span class="badge badge-info"> +89% </span> <span class="ml-2">From previous period</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">

                        <div class="col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Monthly Earnings</h4>

                                    <div class="row text-center mt-4">
                                        <div class="col-6">
                                            <h5 class="font-size-20">$56241</h5>
                                            <p class="text-muted">Marketplace</p>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="font-size-20">$23651</h5>
                                            <p class="text-muted">Total Income</p>
                                        </div>
                                    </div>

                                    <div id="morris-donut-example" class="morris-charts morris-charts-height" dir="ltr"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Email Sent</h4>

                                    <div class="row text-center mt-4">
                                        <div class="col-4">
                                            <h5 class="font-size-20">$ 89425</h5>
                                            <p class="text-muted">Marketplace</p>
                                        </div>
                                        <div class="col-4">
                                            <h5 class="font-size-20">$ 56210</h5>
                                            <p class="text-muted">Total Income</p>
                                        </div>
                                        <div class="col-4">
                                            <h5 class="font-size-20">$ 8974</h5>
                                            <p class="text-muted">Last Month</p>
                                        </div>
                                    </div>

                                    <div id="morris-area-example" class="morris-charts morris-charts-height" dir="ltr"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Monthly Earnings</h4>

                                    <div class="row text-center mt-4">
                                        <div class="col-6">
                                            <h5 class="font-size-20">$ 2548</h5>
                                            <p class="text-muted">Marketplace</p>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="font-size-20">$ 6985</h5>
                                            <p class="text-muted">Total Income</p>
                                        </div>
                                    </div>

                                    <div id="morris-bar-stacked" class="morris-charts morris-charts-height" dir="ltr"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->
 <div class="row">

                        <div class="col-xl-4 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">Inbox</h4>
                                    <div class="inbox-wid">
                                        <a href="#" class="text-dark">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img float-left mr-3"><img src="{{ URL::asset('/images/users/user-1.jpg')}}" class="avatar-sm rounded-circle" alt=""></div>
                                                <h6 class="inbox-item-author mt-0 mb-1 font-size-16">Misty</h6>
                                                <p class="inbox-item-text text-muted mb-0">Hey! there I'm available...</p>
                                                <p class="inbox-item-date text-muted">13:40 PM</p>
                                            </div>
                                        </a>
                                        <a href="#" class="text-dark">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img float-left mr-3"><img src="{{ URL::asset('/images/users/user-2.jpg')}}" class="avatar-sm rounded-circle" alt=""></div>
                                                <div class="inbox-item-img float-left mr-3"><img src="{{ URL::asset('/images/users/user-2.jpg')}}" class="avatar-sm rounded-circle" alt=""></div>
                                                <h6 class="inbox-item-author mt-0 mb-1 font-size-16">Melissa</h6>
                                                <p class="inbox-item-text text-muted mb-0">I've finished it! See you so...</p>
                                                <p class="inbox-item-date text-muted">13:34 PM</p>
                                            </div>
                                        </a>
                                        <a href="#" class="text-dark">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img float-left mr-3"><img src="{{ URL::asset('/images/users/user-3.jpg')}}" class="avatar-sm rounded-circle" alt=""></div>
                                                <h6 class="inbox-item-author mt-0 mb-1 font-size-16">Dwayne</h6>
                                                <p class="inbox-item-text text-muted mb-0">This theme is awesome!</p>
                                                <p class="inbox-item-date text-muted">13:17 PM</p>
                                            </div>
                                        </a>
                                        <a href="#" class="text-dark">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img float-left mr-3"><img src="{{ URL::asset('/images/users/user-4.jpg')}}" class="avatar-sm rounded-circle" alt=""></div>
                                                <h6 class="inbox-item-author mt-0 mb-1 font-size-16">Martin</h6>
                                                <p class="inbox-item-text text-muted mb-0">Nice to meet you</p>
                                                <p class="inbox-item-date text-muted">12:20 PM</p>
                                            </div>
                                        </a>
                                        <a href="#" class="text-dark">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img float-left mr-3"><img src="{{ URL::asset('/images/users/user-5.jpg')}}" class="avatar-sm rounded-circle" alt=""></div>
                                                <h6 class="inbox-item-author mt-0 mb-1 font-size-16">Vincent</h6>
                                                <p class="inbox-item-text text-muted mb-0">Hey! there I'm available...</p>
                                                <p class="inbox-item-date text-muted">11:47 AM</p>
                                            </div>
                                        </a>

                                        <a href="#" class="text-dark">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img float-left mr-3"><img src="{{ URL::asset('/images/users/user-6.jpg')}}" class="avatar-sm rounded-circle" alt=""></div>
                                                <h6 class="inbox-item-author mt-0 mb-1 font-size-16">Robert Chappa</h6>
                                                <p class="inbox-item-text text-muted mb-0">Hey! there I'm available...</p>
                                                <p class="inbox-item-date text-muted">10:12 AM</p>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Recent Activity Feed</h4>

                                    <ol class="activity-feed mb-0">
                                        <li class="feed-item">
                                            <div class="feed-item-list">
                                                <span class="date">Jun 25</span>
                                                <span class="activity-text">Responded to need “Volunteer Activities”</span>
                                            </div>
                                        </li>
                                        <li class="feed-item">
                                            <div class="feed-item-list">
                                                <span class="date">Jun 24</span>
                                                <span class="activity-text">Added an interest “Volunteer Activities”</span>
                                            </div>
                                        </li>
                                        <li class="feed-item">
                                            <div class="feed-item-list">
                                                <span class="date">Jun 23</span>
                                                <span class="activity-text">Joined the group “Boardsmanship Forum”</span>
                                            </div>
                                        </li>
                                        <li class="feed-item">
                                            <div class="feed-item-list">
                                                <span class="date">Jun 21</span>
                                                <span class="activity-text">Responded to need “In-Kind Opportunity”</span>
                                            </div>
                                        </li>
                                    </ol>

                                    <div class="text-center">
                                        <a href="#" class="btn btn-sm btn-primary">Load More</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-4">
                            <div class="card widget-user">
                                <div class="widget-user-desc p-4 text-center bg-primary position-relative">
                                    <i class="fas fa-quote-left h2 text-white-50"></i>
                                    <p class="text-white mb-0">The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe the same vocabulary. The languages only in their grammar.</p>
                                </div>
                                <div class="p-4">
                                    <div class="float-left mt-2 mr-3">
                                        <img src="{{ URL::asset('/images/users/user-2.jpg')}}" alt="" class="rounded-circle avatar-sm">
                                    </div>
                                    <h6 class="mb-1 font-size-16 mt-2">Marie Minnick</h6>
                                    <p class="text-muted mb-0">Marketing Manager</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Yearly Sales</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div>
                                                <h3>52,345</h3>
                                                <p class="text-muted">The languages only differ grammar</p>
                                                <a href="#" class="text-primary">Learn more <i class="mdi mdi-chevron-double-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-md-8 text-right">
                                            <div id="sparkline"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Latest Transactions</h4>

                                    <div class="table-responsive">
                                        <table class="table table-centered table-vertical table-nowrap">

                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="{{ URL::asset('/images/users/user-2.jpg')}}" alt="user-image" class="avatar-xs rounded-circle mr-2" /> Herbert C. Patton
                                                    </td>
                                                    <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                                    <td>
                                                        $14,584
                                                        <p class="m-0 text-muted font-14">Amount</p>
                                                    </td>
                                                    <td>
                                                        5/12/2016
                                                        <p class="m-0 text-muted font-14">Date</p>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <img src="{{ URL::asset('/images/users/user-3.jpg')}}"')}} alt="user-image" class="avatar-xs rounded-circle mr-2" /> Mathias N. Klausen
                                                    </td>
                                                    <td><i class="mdi mdi-checkbox-blank-circle text-warning"></i> Waiting payment</td>
                                                    <td>
                                                        $8,541
                                                        <p class="m-0 text-muted font-14">Amount</p>
                                                    </td>
                                                    <td>
                                                        10/11/2016
                                                        <p class="m-0 text-muted font-14">Date</p>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <img src="{{ URL::asset('/images/users/user-4.jpg')}}" alt="user-image" class="avatar-xs rounded-circle mr-2" /> Nikolaj S. Henriksen
                                                    </td>
                                                    <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                                    <td>
                                                        $954
                                                        <p class="m-0 text-muted font-14">Amount</p>
                                                    </td>
                                                    <td>
                                                        8/11/2016
                                                        <p class="m-0 text-muted font-14">Date</p>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <img src="{{ URL::asset('/images/users/user-5.jpg')}}" alt="user-image" class="avatar-xs rounded-circle mr-2" /> Lasse C. Overgaard
                                                    </td>
                                                    <td><i class="mdi mdi-checkbox-blank-circle text-danger"></i> Payment expired</td>
                                                    <td>
                                                        $44,584
                                                        <p class="m-0 text-muted font-14">Amount</p>
                                                    </td>
                                                    <td>
                                                        7/11/2016
                                                        <p class="m-0 text-muted font-14">Date</p>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <img src="{{ URL::asset('/images/users/user-6.jpg')}}" alt="user-image" class="avatar-xs rounded-circle mr-2" /> Kasper S. Jessen
                                                    </td>
                                                    <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                                    <td>
                                                        $8,844
                                                        <p class="m-0 text-muted font-14">Amount</p>
                                                    </td>
                                                    <td>
                                                        1/11/2016
                                                        <p class="m-0 text-muted font-14">Date</p>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Latest Orders</h4>

                                    <div class="table-responsive">
                                        <table class="table table-centered table-vertical table-nowrap mb-1">

                                            <tbody>
                                                <tr>
                                                    <td>#12354781</td>
                                                    <td>
                                                        <img src="{{ URL::asset('/images/users/user-1.jpg')}}" alt="user-image" class="avatar-xs mr-2 rounded-circle" /> Riverston Glass Chair
                                                    </td>
                                                    <td><span class="badge badge-pill badge-success">Delivered</span></td>
                                                    <td>
                                                        $185
                                                    </td>
                                                    <td>
                                                        5/12/2016
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>#52140300</td>
                                                    <td>
                                                        <img src="{{ URL::asset('/images/users/user-2.jpg')}}" alt="user-image" class="avatar-xs mr-2 rounded-circle" /> Shine Company Catalina
                                                    </td>
                                                    <td><span class="badge badge-pill badge-success">Delivered</span></td>
                                                    <td>
                                                        $1,024
                                                    </td>
                                                    <td>
                                                        5/12/2016
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>#96254137</td>
                                                    <td>
                                                        <img src="{{ URL::asset('/images/users/user-3.jpg')}}" alt="user-image" class="avatar-xs mr-2 rounded-circle" /> Trex Outdoor Furniture Cape
                                                    </td>
                                                    <td><span class="badge badge-pill badge-danger">Cancel</span></td>
                                                    <td>
                                                        $657
                                                    </td>
                                                    <td>
                                                        5/12/2016
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>#12365474</td>
                                                    <td>
                                                        <img src="{{ URL::asset('/images/users/user-4.jpg')}}" alt="user-image" class="avatar-xs mr-2 rounded-circle" /> Oasis Bathroom Teak Corner
                                                    </td>
                                                    <td><span class="badge badge-pill badge-warning">Shipped</span></td>
                                                    <td>
                                                        $8451
                                                    </td>
                                                    <td>
                                                        5/12/2016
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>#85214796</td>
                                                    <td>
                                                        <img src="{{ URL::asset('/images/users/user-5.jpg')}}" alt="user-image" class="avatar-xs mr-2 rounded-circle" /> BeoPlay Speaker
                                                    </td>
                                                    <td><span class="badge badge-pill badge-success">Delivered</span></td>
                                                    <td>
                                                        $584
                                                    </td>
                                                    <td>
                                                        5/12/2016
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#12354781</td>
                                                    <td>
                                                        <img src="{{ URL::asset('/images/users/user-6.jpg')}}" alt="user-image" class="avatar-xs mr-2 rounded-circle" /> Riverston Glass Chair
                                                    </td>
                                                    <td><span class="badge badge-pill badge-success">Delivered</span></td>
                                                    <td>
                                                        $185
                                                    </td>
                                                    <td>
                                                        5/12/2016
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
@endsection

@section('footerScript')
 <!--Morris Chart-->
            <script src="{{ URL::asset('/libs/morris.js/morris.js.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/raphael/raphael.min.js')}}"></script>

            <script src="{{ URL::asset('/js/pages/dashboard.init.js')}}"></script>

@endsection
