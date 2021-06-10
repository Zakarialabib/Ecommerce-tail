<!DOCTYPE html>
<html lang="en">
<head>
	@include('frontend.layouts.head')	
</head>
<body class="js">
	
	
	<!-- End Preloader -->
	@include('frontend.layouts.notification')
	<!-- Header -->
	@include('frontend.layouts.header')
	<!--/ End Header -->
	<div class="main-wrapper">
	@yield('main-content')
</div>
	@include('frontend.layouts.footer')

</body>
</html>