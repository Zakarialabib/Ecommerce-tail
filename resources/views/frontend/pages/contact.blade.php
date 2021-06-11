@extends('frontend.layouts.master')

@section('main-content')
	<!-- Breadcrumbs -->
	<div class="breadcrumb-area bg-gray">
		<div class="container">
			<div class="breadcrumb-content text-center">
				<ul >
					<li><a href="{{route('home')}}">{{ __('Home')}}<i class="ti-arrow-right"></i></a></li>
					<li class="active"><a href="javascript:void(0);">{{ __('Contact')}}</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
  
	<!-- Start Contact -->
	<section id="contact-us" class="contact-area pt-85 pb-120">
	<div class="container">
		<div class="container">
			<div class="contact-info-wrap-3">
					<h3>{{ __('Contact')}}</h3>
			</div>
				<div class="contact-head">
					<div class="row">
						<div class="col-lg-8 col-12">
							<div class="form-main">
								<div class="get-in-touch-wrap">
									@php
										$settings=DB::table('settings')->get();
									@endphp
									<h4>{{ __('Get in touch')}}</h4>
									<h3>{{ __('Write us a message')}} @auth @else<span style="font-size:12px;" class="text-danger">{{ __('You need to login first')}}</span>@endauth</h3>
								</div>
								<form class="contact-from contact-shadow" method="post" action="{{route('contact.store')}}" id="contactForm" novalidate="novalidate">
									@csrf
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<input name="name" id="name" type="text" placeholder="{{ __('Enter your name')}}">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<input name="subject"  type="text" id="subject" placeholder="{{ __('Enter Subject')}}">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<input name="email"  type="email" id="email" placeholder="{{ __('Enter email address')}}">
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<input id="phone"  name="phone" type="number" placeholder="{{ __('Enter your phone')}}">
											</div>	
										</div>
										<div class="col-12">
											<div class="form-group message">
												<textarea name="message" id="message" cols="30" rows="9" placeholder="{{ __('Enter Message')}}"></textarea>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group button">
												<button type="submit" class="btn ">{{ __('Send Message')}}</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="single-head">
								<div class="single-contact-info-3 text-center mb-30">
									<i class="icon-screen-smartphone"></i>
									<h4 class="title">{{ __('Call us Now')}}:</h4>
									<ul>
										<li>@foreach($settings as $data) <a href="tel:{{$data->phone}}">{{$data->phone}}</a> @endforeach</li>
									</ul>
								</div>
								<div class="single-contact-info-3 text-center mb-30">
									<i class="icon-envelope"></i>
									<h4 class="title">{{ __('Email')}}:</h4>
									<ul>
										<li>@foreach($settings as $data) <a href="mailto:{{$data->email}}">{{$data->email}}</a> @endforeach</li>
									</ul>
								</div>
								<div class="single-contact-info-3 text-center mb-30">
									<i class="icon-location-pin"></i>
									<h4 class="title">{{ __('Our Address')}}:</h4>
									<ul>
										<li>@foreach($settings as $data) {{$data->address}} @endforeach</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ End Contact -->
	
	<!--================Contact Success  =================-->
	<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<h2 class="text-success">{{ __('Thank you')}}!</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="text-success">{{ __('Your message is successfully sent')}}...</p>
			</div>
		  </div>
		</div>
	</div>
	
	<!-- Modals error -->
	<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<h2 class="text-warning">{{ __('Sorry')}}!</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="text-warning">{{ __('Something went wrong')}}.</p>
			</div>
		  </div>
		</div>
	</div>
@endsection

@push('styles')
<style>
	.modal-dialog .modal-content .modal-header{
		position:initial;
		padding: 10px 20px;
		border-bottom: 1px solid #e9ecef;
	}
	.modal-dialog .modal-content .modal-body{
		height:100px;
		padding:10px 20px;
	}
	.modal-dialog .modal-content {
		width: 50%;
		border-radius: 0;
		margin: auto;
	}
</style>
@endpush
@push('scripts')
<script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/js/contact.js') }}"></script>
@endpush