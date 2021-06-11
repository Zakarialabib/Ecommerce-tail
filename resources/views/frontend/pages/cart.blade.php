@extends('frontend.layouts.master')
@section('title','Cart Page')
@section('main-content')
	<!-- Breadcrumbs -->
	<div class="breadcrumb-area bg-gray">
		<div class="container">
			<div class="breadcrumb-content text-center">
				<ul>
					<li><a href="{{route('home')}}">{{ __('Home')}}<i class="ti-arrow-right"></i></a></li>
					<li class="active"><a href="javascript:void(0)">{{ __('Cart')}}</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
	<!-- Shopping Cart -->
	<div class="cart-main-area pt-85 pb-120">
		<div class="container">
			<h3 class="cart-page-title">{{ __('Your cart items')}}</h3>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<!-- Shopping Summery -->
					<div class="table-content table-responsive cart-table-content">
					<table>
						<thead>
							<tr class="main-hading">
								<th>{{ __('PRODUCT')}}</th>
								<th>{{ __('NAME')}}</th>
								<th class="text-center">{{ __('UNIT PRICE')}}</th>
								<th class="text-center">{{ __('QUANTITY')}}</th>
								<th class="text-center">{{ __('TOTAL')}}</th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody id="cart_item_list">
							<form action="{{route('cart.update')}}" method="POST">
								@csrf
								@if(Helper::getAllProductFromCart())
									@foreach(Helper::getAllProductFromCart() as $key=>$cart)
										<tr>
											@php 
											$photo=explode(',',$cart->product['photo']);
											@endphp
											<td class="product-thumbnail" data-title="No"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></td>
											<td class="product-name" data-title="Description">
												<p class="product-name"><a href="{{route('product-detail',$cart->product['slug'])}}" target="_blank">{{$cart->product['title']}}</a></p>
												<p class="product-des">{!!($cart['summary']) !!}</p>
											</td>
											<td class="product-price-cart" data-title="Price"><span>{{number_format($cart['price'],2)}} $</span></td>
											<td class="product-quantity pro-details-quality" data-title="Qty"><!-- Input Order -->
												<div class="cart-plus-minus">
													<div class="dec qtybutton">-</div>
													<input type="text" name="quant[{{$key}}]" class="cart-plus-minus-box"  data-min="1" data-max="100" value="{{$cart->quantity}}">
													<input type="hidden" name="qty_id[]" value="{{$cart->id}}">
													<div class="inc qtybutton">+</div>
												</div>
												<!--/ End Input Order -->
											</td>
											<td class="product-subtotal" data-title="Total"><span class="money">{{$cart['amount']}} $</span></td>
											
											<td class="product-remove" data-title="Remove"><a href="{{route('cart-delete',$cart->id)}}"><i class="ti-trash remove-icon"></i></a></td>
										</tr>
									@endforeach
									<track>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td class="float-right">
											<button class="btn float-right" type="submit">{{ __('Update')}}</button>
										</td>
									</track>
								@else 
										<tr>
											<td class="text-center">
												{{ __('There are no any carts available')}}. <a href="{{route('product-grids')}}" style="color:blue;">{{ __('Continue shopping')}}</a>
											</td>
										</tr>
								@endif
								
							</form>
						</tbody>
					</table>
				</div>
					<!--/ End Shopping Summery -->
				</div>
			</div>

			
			<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="discount-code-wrapper">
					<div class="title-wrap">
						<h4 class="cart-bottom-title section-bg-gray">{{ __('Use Coupon Code')}}</h4>
					</div>
					<div class="discount-code">
						<p>{{ __('Enter your coupon code if you have one')}}.</p>
					<form action="{{route('coupon-store')}}" method="POST">
						@csrf
						<input name="code" placeholder="{{ __('Enter Your Coupon')}}">
						<button class="cart-btn-2" type="submit">{{ __('Apply Coupon')}}</button>
					</form>
					@if(session()->has('coupon'))
					<li class="coupon_price" data-price="{{Session::get('coupon')['value']}}">{{ __('You Save')}}<span>{{number_format(Session::get('coupon')['value'],2)}} $</span></li>
					@endif
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="grand-totall">
					<div class="title-wrap">
						<h4 class="cart-bottom-title section-bg-gary-cart">{{ __('Cart Total')}}</h4>
					</div>
					<ul>
						<h5 class="grand-totall-title" data-price="{{Helper::totalCartPrice()}}">
							{{__('Cart Subtotal')}}<span>
							{{number_format(Helper::totalCartPrice(),2)}} $</span></h5>
						<div id="shipping" style="display:none;">
							<li class="total-shipping">
								{{ __('Shipping')}} {{session('shipping_price')}}
								@if(count(Helper::shipping())>0 && Helper::cartCount()>0)
									<div class="form-select">
										<select name="shipping" class="select2">
											<option value="">Select')}}</option>
											@foreach(Helper::shipping() as $shipping)
											<option value="{{$shipping->id}}" class="shippingOption" data-price="{{$shipping->price}}">{{$shipping->type}}: {{$shipping->price}} $</option>
											@endforeach
										</select>
									</div>
								@else 
									<div class="form-select">
										<span>{{ __('Free')}}</span>
									</div>
								@endif
							</li>
						</div>
						 
						 {{-- {{dd(Session::get('coupon')['value'])}} --}}
						
						@php
							$total_amount=Helper::totalCartPrice();
							if(session()->has('coupon')){
								$total_amount=$total_amount-Session::get('coupon')['value'];
							}
						@endphp
						@if(session()->has('coupon'))
							<h5 class="grand-totall-title" id="order_total_price">{{ __('Continue shopping')}}<span>{{number_format($total_amount,2)}} $</span></li>
						@else
							<h5 class="grand-totall-title" id="order_total_price">{{ __('Continue shopping')}}<span>{{number_format($total_amount,2)}} $</span></li>
						@endif
					</ul>
					<div class="cart-shiping-update-wrapper">
						<div class="cart-shiping-update">
						<a href="{{route('checkout')}}">{{ __('Checkout')}}</a>
						</div>
						<div class="cart-clear">
						<a href="{{route('product-grids')}}">{{ __('Continue shopping')}}</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->
			
	<!-- Start Shop Services Area  -->
	@include('frontend.layouts.services')
	<!-- End Shop Newsletter -->
	
	<!-- Start Shop Newsletter  -->
	@include('frontend.layouts.newsletter')
	<!-- End Shop Newsletter -->
		
	<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <!-- Product Slider -->
									<div class="product-gallery">
										<div class="quickview-slider-active">
											<div class="single-slider">
												<img src="images/modal1.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal2.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal3.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal4.jpg" alt="#">
											</div>
										</div>
									</div>
								<!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2>Flared Shift Dress</h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 customer review)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                        </div>
                                    </div>
                                    <h3>$29.00</h3>
                                    <div class="quickview-peragraph">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                                    </div>
									<div class="size">
										<div class="row">
											<div class="col-lg-6 col-12">
												<h5 class="title">{{ __('Size')}}</h5>
												<select>
													<option selected="selected">s</option>
													<option>m</option>
													<option>l</option>
													<option>xl</option>
												</select>
											</div>
											<div class="col-lg-6 col-12">
												<h5 class="title">Color</h5>
												<select>
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
											</div>
										</div>
									</div>
                                    <div class="quantity">
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</div>
									<div class="add-to-cart">
										<a href="#" class="btn">{{ __('ADD TO CART')}}</a>
										<a href="#" class="btn min"><i class="ti-heart"></i></a>
										<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
									</div>
                                    <div class="default-social">
										<h4 class="share-now">Share:</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
	
@endsection
@push('styles')
	<style>
		li.shipping{
			display: inline-flex;
			width: 100%;
			font-size: 14px;
		}
		li.shipping .input-group-icon {
			width: 100%;
			margin-left: 10px;
		}
		.input-group-icon .icon {
			position: absolute;
			left: 20px;
			top: 0;
			line-height: 40px;
			z-index: 3;
		}
		.form-select {
			height: 30px;
			width: 100%;
		}
		.form-select .select2 {
			border: none;
			border-radius: 0px;
			height: 40px;
			background: #f6f6f6 !important;
			padding-left: 45px;
			padding-right: 40px;
			width: 100%;
		}
		.list li{
			margin-bottom:0 !important;
		}
		.list li:hover{
			background:#F7941D !important;
			color:white !important;
		}
		.form-select .select2::after {
			top: 14px;
		}
	</style>
@endpush
@push('scripts')

	<script>
		$(document).ready(function() { $("select.select2").select2(); });
	</script>
	<script>
		$(document).ready(function(){
			$('.shipping select[name=shipping]').change(function(){
				let cost = parseFloat( $(this).find('option:selected').data('price') ) || 0;
				let subtotal = parseFloat( $('.order_subtotal').data('price') ); 
				let coupon = parseFloat( $('.coupon_price').data('price') ) || 0; 
				// alert(coupon);
				$('#order_total_price span').text('$'+(subtotal + cost-coupon).toFixed(2));
			});

		});

	</script>

@endpush