<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Pos Android">
    <meta name="keywords" content="POS ANDROID">
    <meta name="author" content="POSANDROID">
    <title>Reset Page - POS</title>
    <link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,400,500,700"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/vendors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-content-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/login-register.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
</head>
<body class="vertical-layout vertical-content-menu 1-column   menu-expanded blank-page blank-page"
      data-open="click" data-menu="vertical-content-menu" data-col="1-column">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-4 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                            <div class="card-header border-0 pb-0">
                                <div class="card-title text-center">
                                    <img src="../../../app-assets/images/logo/logo-dark.png" alt="branding logo">
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>We will send you a link to reset password.</span>
                                </h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form-horizontal" method="post" action="{{ url('/password/email') }}">
                                        {!! csrf_field() !!}

                                        <fieldset class="form-group position-relative has-icon-left {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <input type="email" class="form-control form-control-lg input-lg" name="email" value="{{ old('email') }}" placeholder="Alamat Email">
                                            <div class="form-control-position">
                                                <i class="ft-mail"></i>
                                            </div>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </fieldset>

                                        <button type="submit" class="btn btn-outline-info btn-lg btn-block"><i class="ft-unlock"></i> Recover Password</button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer border-0">
                                <p class="float-sm-left text-center"><a href="{{ url('/login') }}" class="card-link">Login</a></p>
                                <p class="float-sm-right text-center">New to Admin ? <a href="{{ url('/register') }}" class="card-link">Create Account</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- BEGIN VENDOR JS-->
<script src="../../../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script type="text/javascript" src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
<script type="text/javascript" src="../../../app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="../../../app-assets/vendors/js/ui/headroom.min.js"></script>
<script src="../../../app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"
        type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="../../../app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="../../../app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script type="text/javascript" src="../../../app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
<script src="../../../app-assets/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</body>
</html>