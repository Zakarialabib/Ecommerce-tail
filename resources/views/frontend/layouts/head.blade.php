<!-- Meta Tag -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name='copyright' content=''>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="online shop, purchase, cart, ecommerce site, best online shopping">

@yield('meta')
<!-- Title Tag  -->
<title>@yield('title')</title>
<!-- Favicon-->
<link rel="icon" type="image/png" href="images/favicon.png"> 
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">

{!!$settings->ganalytics!!}	

{!!$settings->pixel!!}

{!!$settings->klaviyo!!}

<link rel="stylesheet" href="{{asset('assets/css/vendor/vendor.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/plugins/plugins.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}"> 
<!-- Sweetalert -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />


@stack('styles')