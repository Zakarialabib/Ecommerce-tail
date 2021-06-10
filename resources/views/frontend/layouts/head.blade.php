<!-- Meta Tag -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name='copyright' content=''>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="online shop, purchase, cart, ecommerce site, best online shopping">
@yield('meta')
<!-- Title Tag  -->
<title>@yield('title')</title>
<!-- Favicon -->
<link rel="icon" type="image/png" href="images/favicon.png">
<!-- Web Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">


<!-- Bootstrap -->
<link rel="stylesheet" href="{{asset('assets/css/vendor/vendor.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/plugins/plugins.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}"> 
<!-- Slicknav -->
<link rel="stylesheet" href="{{asset('frontend/css/slicknav.min.css')}}">
<!-- Jquery Ui -->
<link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">
<!-- Sweetalert -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<!-- Eshop StyleSheet -->
<link rel="stylesheet" href="{{asset('frontend/css/reset.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">

<!-- BASE CSS -->
<link href="{{asset('frontend/css/bootstrap.custom.min.css')}}" rel="stylesheet">

<!-- YOUR CUSTOM CSS -->
<link href="{{asset('frontend/css/custom.css')}}" rel="stylesheet">

<style>
    /* Multilevel dropdown */
    .dropdown-submenu {
    position: relative;
    }

    .dropdown-submenu>a:after {
    content: "\f0da";
    float: right;
    border: none;
    font-family: 'FontAwesome';
    }

    .dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: 0px;
    margin-left: 0px;
    }

</style>
@stack('styles')
