<!DOCTYPE html>
<html lang="pt-br" style="color: #000">

<head style="color:black;">
<script src="https://kit.fontawesome.com/a944918be8.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function Atualizar() {
            window.location.reload();
        }
    </script>

    <meta charset="utf-8" />
    <title> @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Lexa Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/images/logo.ico')}}">

     <!-- headerCss -->
    @yield('headerCss')

    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ URL::asset('/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ URL::asset('/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body class="vertical-collpsed" data-sidebar="dark" style="font-family: consolas; background:#fff;  color:black;">


    <!-- Begin page -->
    <div id="layout-wrapper" style="color: #000;">

         @include('layouts/partials/header')

         @include('layouts/partials/sidebar')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content" style="color: #000;">



                <div class="page-content" style="color: #000; padding-top: 70px;">

                    <div class="container-fluid" style="color: #000;">

                  <!-- content -->


                    @include('layouts/partials/footer')



                        @include('components/flash_alerts')


                        @yield('content')







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
            <link rel="stylesheet" href="css/bootstrap.min.css" />
            <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />



            <!-- footerScript -->
             @yield('footerScript')

            <!-- App js -->
            <script src="{{ URL::asset('/js/app.min.js')}}"></script>
</body>

</html>
