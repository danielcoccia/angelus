<!DOCTYPE html>
<html lang="en">

    <meta charset="utf-8" />
    <title> @yield('title')  | Lexa - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/images/favicon.ico')}}">
    
     <!-- headerCss -->
    @yield('headerCss')

    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ URL::asset('/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ URL::asset('/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body  data-sidebar="dark" data-sidebar-size="small">

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('layouts/partials/header')

         @include('layouts/partials/sidebar')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                  <!-- content -->
                   @yield('content')


                  @include('layouts/partials/footer')

               </div>
                <!-- end main content-->
            </div>
            <!-- END layout-wrapper -->

             @include('layouts/partials/rightbar')
   
            <!-- JAVASCRIPT -->
            <script src="{{ URL::asset('/libs/jquery/jquery.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/bootstrap/bootstrap.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/metismenu/metismenu.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/simplebar/simplebar.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/node-waves/node-waves.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/jquery-sparkline/jquery-sparkline.min.js')}}"></script>

            <!-- footerScript -->
             @yield('footerScript')

            <!-- App js -->
            <script src="{{ URL::asset('/js/app.min.js')}}"></script>
</body>

</html>