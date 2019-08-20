<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Pos Android">
    <meta name="keywords" content="Pos Android">
    <meta name="author" content="PIXINVENT">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Beranda :: NiagaPos</title>
    <link rel="apple-touch-icon" href="{{asset('app-assets/images/logo/GLO_logo.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/logo/GLO_logo.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,400,500,700"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/vendors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/unslider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/weather-icons/climacons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/calendars/clndr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-climacon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/users.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/extensions/rowReorder.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/selects/select2.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/sweetalert.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-callout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/checkboxes-radios.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/icheck.css')}}">
    {{--<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/custom.css')}}">--}}

    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/timeline.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/file-uploaders/dropzone.css">

    <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu" data-col="2-columns">

@include('layouts.sidebar')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>

        @yield('content')

    </div>
</div>
<footer class="footer footer-static footer-light navbar-border fixed-bottom">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <!-- <span class="float-md-left d-block d-md-inline-block">Copyright Britech &copy; 2019
          All rights reserved.
      </span> -->
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">NiagaPos <i class="ft-heart pink"></i></span>
    </p>
</footer>
<!-- BEGIN VENDOR JS-->
<script src="{{asset('app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
<script type="text/javascript" src="{{asset('app-assets/vendors/js/charts/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/jquery.dataTables.min.js" type="text/javascript')}}"></script>

<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.rowReorder.min.js')}}" type="text/javascript"></script>

<script src="{{asset('app-assets/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/core/libraries/jquery_ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/ui/jquery-ui/date-pickers.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/forms/select/select2.min.js')}}" type="text/javascript"></script>

<script src="{{asset('app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/core/app.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('app-assets/js/scripts/ui/breadcrumbs-with-stats.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/pages/dashboard-fitness.js')}}" type="text/javascript"></script>

<script src="{{asset('app-assets/vendors/js/tables/jquery.dataTables.min.js')}}" type="text/javascript"></script>

<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.rowReorder.min.js')}}" type="text/javascript"></script>

<script src="{{asset('app-assets/js/scripts/pages/project-task-list.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"  type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/cards/card-statistics.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/extensions/sweet-alerts.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/forms/checkbox-radio.js')}}" type="text/javascript"></script>

<script src="../../../app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="../../../app-assets/vendors/js/tables/buttons.flash.min.js" type="text/javascript"></script>
<script src="../../../app-assets/vendors/js/tables/jszip.min.js" type="text/javascript"></script>
<script src="../../../app-assets/vendors/js/tables/pdfmake.min.js" type="text/javascript"></script>
<script src="../../../app-assets/vendors/js/tables/vfs_fonts.js" type="text/javascript"></script>
<script src="../../../app-assets/vendors/js/tables/buttons.html5.min.js" type="text/javascript"></script>
<script src="../../../app-assets/vendors/js/tables/buttons.print.min.js" type="text/javascript"></script>
{{--<script src="{{asset('app-assets/vendors/js/custom/searching-cs.js')}}" type="text/javascript"></script>--}}
<script src="{{asset('app-assets/vendors/js/custom/searching-cs-print.js')}}" type="text/javascript"></script>
<script src="../../../app-assets/js/scripts/popover/popover.js" type="text/javascript"></script>
{{--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<!-- END PAGE LEVEL JS-->
</body>
</html>