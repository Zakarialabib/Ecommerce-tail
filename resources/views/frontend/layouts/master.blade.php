<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	@include('frontend.layouts.head')	
</head>
<body class="js">
	{{-- {!!$settings->body_tag!!} --}}

	<div class="main-wrapper">

		@include('frontend.layouts.notification')
		<!-- Header -->
		@include('frontend.layouts.header')
		<!--/ End Header -->

		@yield('main-content')

		@include('frontend.layouts.footer')
	
	</div>
	@include('frontend.layouts.js')

</body>
</html>