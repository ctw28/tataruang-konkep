<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Sistem Informasi Tata Ruang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Sistem Informasi Tata Ruang" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="icon" href="{{asset('/')}}images/icon/logo-pu-tata-ruang.png">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <!-- jvectormap -->
    <link href="{{asset('/')}}plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">

    <!-- App css -->
    <link href="{{asset('/')}}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}assets/css/app.min.css" rel="stylesheet" type="text/css" />
</head>

<body data-layout="horizontal" class="dark-topbar">

    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- LOGO -->
        <div class="brand">
            <a href="index.html" class="logo">
                <span>
                    <img src="{{asset('/')}}images/logo-pu-tata-ruang.png" alt="logo-small" class="logo-sm">
                </span>
                <span style="color:white; font-weight:bold">
                    SI Tata Ruang
                    <!-- <img src="{{asset('/')}}assets/images/logo.png" alt="logo-large" class="logo-lg logo-light"> -->
                </span>
            </a>
        </div>
        <!--end logo-->
        @include('web.parts.menu')
    </div>
    <!-- Top Bar End -->
    <div class="page-wrapper">
        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div><!-- container -->
        </div>
        <!-- end page content -->
    </div>



    <!-- jQuery  -->
    <script src="{{asset('/')}}assets/js/jquery.min.js"></script>
    <script src="{{asset('/')}}assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/')}}assets/js/metismenu.min.js"></script>
    <script src="{{asset('/')}}assets/js/waves.js"></script>
    <script src="{{asset('/')}}assets/js/feather.min.js"></script>
    <script src="{{asset('/')}}assets/js/simplebar.min.js"></script>
    <script src="{{asset('/')}}assets/js/moment.js"></script>
    <script src="{{asset('/')}}plugins/daterangepicker/daterangepicker.js"></script>

    <!-- App js -->
    <script src="{{asset('/')}}assets/js/app.js"></script>
    @yield('js')
</body>

</html>