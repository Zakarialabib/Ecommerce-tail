@extends('frontend.layouts.master')

@section('main-content')
	<!-- Breadcrumbs -->
	<section  class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="{{route('home')}}">{{ __('Home')}}<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="javascript:void(0);">{{ __('Contact')}}</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Breadcrumbs -->
  
	<!-- Start Contact -->
	<section id="contact-us" class="contact-us section">
	<div class="container margin_60">
				<div class="main_title">
					<h2>Contact Allaia</h2>
					<p>Euismod phasellus ac lectus fusce parturient cubilia a nisi blandit sem cras nec tempor adipiscing rcu ullamcorper ligula.</p>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-4">
						<div class="box_contacts">
							<i class="ti-support"></i>
							<h2>Allaia Help Center</h2>
							<a href="#0">+94 423-23-221</a> - <a href="#0">help@allaia.com</a>
							<small>MON to FRI 9am-6pm SAT 9am-2pm</small>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="box_contacts">
							<i class="ti-map-alt"></i>
							<h2>Allaia Showroom</h2>
							<div>6th Forrest Ray, London - 10001 UK</div>
							<small>MON to FRI 9am-6pm SAT 9am-2pm</small>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="box_contacts">
							<i class="ti-package"></i>
							<h2>Allaia Orders</h2>
							<a href="#0">+94 423-23-221</a> - <a href="#0">order@allaia.com</a>
							<small>MON to FRI 9am-6pm SAT 9am-2pm</small>
						</div>
					</div>
				</div>
				<!-- /row -->				
			</div>
			<!-- /container -->
		<div class="container">
				<div class="contact-head">
					<div class="row">
						<div class="col-lg-8 col-12">
							<div class="form-main">
								<div class="title">
									@php
										$settings=DB::table('settings')->get();
									@endphp
									<h4>{{ __('Get in touch')}}</h4>
									<h3>{{ __('Write us a message')}} @auth @else<span style="font-size:12px;" class="text-danger">{{ __('You need to login first')}}</span>@endauth</h3>
								</div>
								<form class="form-contact form contact_form" method="post" action="{{route('contact.store')}}" id="contactForm" novalidate="novalidate">
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
								<div class="single-info">
									<i class="fa fa-phone"></i>
									<h4 class="title">{{ __('Call us Now')}}:</h4>
									<ul>
										<li>@foreach($settings as $data) <a href="tel:{{$data->phone}}">{{$data->phone}}</a> @endforeach</li>
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-envelope-open"></i>
									<h4 class="title">{{ __('Email')}}:</h4>
									<ul>
										<li>@foreach($settings as $data) <a href="mailto:{{$data->email}}">{{$data->email}}</a> @endforeach</li>
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-location-arrow"></i>
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
	</section>
	<!--/ End Contact -->
	
	<!-- Start Shop Newsletter  -->
	@include('frontend.layouts.newsletter')
	<!-- End Shop Newsletter -->
	
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