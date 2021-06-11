@php
	$settings = DB::table('settings')->get()->first();
@endphp

<div class="subscribe-area bg-gray pt-115 pb-115">
	<div class="container">
			<div class="row">
					<div class="col-lg-5 col-md-5">
							<div class="section-title">
									<h2>{{__('keep connected')}}</h2>
									<p>{{__('Get updates by subscribe our weekly newsletter')}}</p>
							</div>
					</div>
					<div class="col-lg-7 col-md-7">
							<div id="mc_embed_signup" class="subscribe-form">
									<form id="mc-embedded-subscribe-form" class="validate subscribe-form-style" novalidate="" target="_blank" name="mc-embedded-subscribe-form" method="post" action="">
											<div id="mc_embed_signup_scroll" class="mc-form">
													<input class="email" type="email" required="" placeholder="Enter your email address" name="EMAIL" value="">
													<div class="mc-news" aria-hidden="true">
															<input type="text" value="" tabindex="-1" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef">
													</div>
													<div class="clear">
															<input id="mc-embedded-subscribe" class="button" type="submit" name="subscribe" value="Subscribe">
													</div>
											</div>
									</form>
							</div>
					</div>
			</div>
	</div>
</div>
<footer class="footer-area bg-gray pb-30">
	<div class="container">
			<div class="row">
					<div class="col-lg-5 col-md-5">
							<div class="contact-info-wrap">
									<div class="footer-logo">
											<a href="{{route('home')}}"><img src="{{asset($settings->logo)}}" alt="logo"></a>
									</div>
									<div class="single-contact-info">
											<span>{{ __('Our Location')}}</span>
											<p>{{$settings->address}}</p>
									</div>
									<div class="single-contact-info">
											<span>24/7 hotline:</span>
											<p>{{$settings->phone}}</p>
									</div>
							</div>
					</div>
					<div class="col-lg-7 col-md-7">
							<div class="footer-right-wrap">
									<div class="footer-menu">
											<nav>
													<ul>
															<li><a href="{{route('home')}}">{{ __('Home')}}</a></li>
															<li><a href="{{route('about-us')}}">{{ __('About Us')}}</a></li>
															<li><a href="{{route('product-grids')}}">{{ __('Shop')}} </a></li>
															<li><a href="{{route('contact')}}">{{ __('Contact Us')}}</a></li>
															<li><a href="{{route('blog')}}">{{__('Blog')}}</a></li>
													</ul>
											</nav>
									</div>
									<div class="social-style-2 social-style-2-mrg">
											<a href="#"><i class="social_twitter"></i></a>
											<a href="#"><i class="social_facebook"></i></a>
											<a href="#"><i class="social_googleplus"></i></a>
											<a href="#"><i class="social_instagram"></i></a>
											<a href="#"><i class="social_youtube"></i></a>
									</div>
									<div class="copyright">
											<p>Copyright © {{date('Y')}} <a href="" target="_blank">Alphaboost</a>  -  {{__('All Rights Reserved')}}.</p>
									</div>
							</div>
					</div>
			</div>
	</div>
</footer>