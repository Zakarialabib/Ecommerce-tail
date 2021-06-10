<!DOCTYPE html>
<html lang="en">
<head>
	@include('frontend.layouts.head')	
</head>
<body class="js">
	
	<div class="main-wrapper">

		@include('frontend.layouts.notification')
		<!-- Header -->
		@include('frontend.layouts.header')
		<!--/ End Header -->

		@yield('main-content')

		@include('frontend.layouts.footer')
	
	</div>
</body>
</html>