@extends('frontend.layouts.master')

@section('title','Checkout page || leMotoShop')

@section('main-content')

    <!-- Breadcrumbs -->
	<div class="breadcrumb-area bg-gray">
		<div class="container">
			<div class="breadcrumb-content text-center">
				<ul >
                    <li><a href="{{route('home')}}">{{ __('Home')}}<i class="ti-arrow-right"></i></a></li>
                    <li class="active"><a href="javascript:void(0)">{{ __('Checkout')}}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
            
    <!-- Start Checkout -->
    <section class="checkout-main-area pt-60 pb-60">
        <div class="container">
                <form class="form" method="POST" action="{{route('cart.order')}}">
                    @csrf
                    <div class="row"> 

                        <div class="col-lg-8 col-12">
                            <div class="checkout-form">
                                <h2>{{ __('Make Your Checkout Here')}}</h2>
                                <p>{{ __('Please register in order to checkout more quickly')}}</p>
                                <!-- Form -->
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>{{ __('First Name')}}<span>*</span></label>
                                            <input type="text" name="first_name" placeholder="" value="{{old('first_name')}}" value="{{old('first_name')}}">
                                            @error('first_name')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>{{ __('Last Name')}}<span>*</span></label>
                                            <input type="text" name="last_name" placeholder="" value="{{old('lat_name')}}">
                                            @error('last_name')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>{{ __('Email Address')}}<span>*</span></label>
                                            <input type="email" name="email" placeholder="" value="{{old('email')}}">
                                            @error('email')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>{{ __('Phone Number')}} <span>*</span></label>
                                            <input type="number" name="phone" placeholder="" required value="{{old('phone')}}">
                                            @error('phone')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>{{ __('Country')}}<span>*</span></label>
                                            <input type="text" name="country" placeholder="" required value="{{old('country')}}">
                                            @error('country')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>{{ __('Address Line 1')}}<span>*</span></label>
                                            <input type="text" name="address1" placeholder="" required value="{{old('address1')}}">
                                            @error('address1')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>{{ __('Address Line 2')}}</label>
                                            <input type="text" name="address2" placeholder="" value="{{old('address2')}}">
                                            @error('address2')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>{{ __('Postal Code')}}</label>
                                            <input type="text" name="post_code" placeholder="" value="{{old('post_code')}}">
                                            @error('post_code')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>
                                <!--/ End Form -->
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="your-order-area">
                                <!-- Order Widget -->
                                    <h3>{{ __('CART  TOTALS')}}</h3>
                                    <div class="your-order-wrap gray-bg-4">
                                        <div class="your-order-info-wrap">
                                        <ul>
										    <li class="your-order-info" data-price="{{Helper::totalCartPrice()}}">{{ __('Cart Subtotal')}}<span> {{ Helper::showCurrencyPrice(Helper::totalCartPrice(),2) }}</span></li>
                                            <li class="your-order-middle">
                                            {{ __('Shipping Cost')}}
                                                @if(count(Helper::shipping())>0 && Helper::cartCount()>0)
                                                    <select name="shipping" class="form-control" required>
                                                        <option value="">{{ __('Select Shipping Methode')}}</option>
                                                        @foreach(Helper::shipping() as $shipping)
                                                        <option value="{{$shipping->id}}" class="shippingOption" data-price="{{$shipping->price}}">{{$shipping->type}}: {{$shipping->price}} $</option>
                                                        @endforeach
                                                    </select>
                                                @else 
                                                    <span>{{ __('Free')}}</span>
                                                @endif
                                            </li>
                                            
                                            @if(session('coupon'))
                                            <li class="your-order-info order-shipping" data-price="{{session('coupon')['value']}}">{{ __('You Save')}}<span>{{number_format(session('coupon')['value'],2)}} $</span></li>
                                            @endif
                                            @php
                                                $total_amount=Helper::totalCartPrice();
                                                if(session('coupon')){
                                                    $total_amount=$total_amount-session('coupon')['value'];
                                                }
                                            @endphp
                                            @if(session('coupon'))
                                                <li class="last"  id="your-order-info order-total">Total<span> {{ Helper::showCurrencyPrice($total_amount,2) }}</span></li>
                                            @else
                                                <li class="last"  id="your-order-info order-total">Total<span> {{ Helper::showCurrencyPrice($total_amount,2) }}</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                
                                <!--/ End Order Widget -->
                                <!-- Order Widget -->
                                <div class="payment-method">
                                    <h3>{{ __('Payments')}}</h3>
                                    <div class="pay-top sin-payment">
                                        <input name="payment_method" id="payment_method_1" class="input-radio"  type="radio" value="cod">
                                         <label for="payment_method_1"> {{ __('Cash On Delivery')}}</label>
                                    </div>
                                    <div class="pay-top sin-payment">
                                        <input name="payment_method" id="payment_method_2" class="input-radio"  type="radio" value="paypal"> 
                                        <label for="payment_method_2"> 
                                            PayPal 
                                            <img src="{{('backend/img/payment-method.png')}}" alt="#">
                                        </label> 
                                    </div>   
                                    <div class="pay-top sin-payment">
                                        <input name="payment_method" id="payment_method_3" class="input-radio"  type="radio" value="stripe"> 
                                        <label for="payment_method_3"> 
                                            PAY WITH YOUR CARD (Stripe)
                                            <img src="{{('backend/img/payment-method.png')}}" alt="#">
                                        </label> 
                                    </div>                                      
                                </div>
                                <!--/ End Order Widget -->
                         
                                <!-- Button Widget -->
                                <div class="Place-order">
                                        <button type="submit" class="btn">{{ __('proceed to checkout')}}</button>
                                </div>
                                <!--/ End Button Widget -->
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </section>
    <!--/ End Checkout -->
    
   	<!-- Modal -->
       <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    
                    @if (Session::has('success'))
                    <div class="alert alert-primary text-center">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                    @endif

                    <form role="form" action="{{ route('make-payment') }}" method="post" class="stripe-payment"
                        data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                        id="stripe-payment">
                        @csrf

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input class='form-control'
                                    size='4' type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input autocomplete='off'
                                    class='form-control card-num' size='20' type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label>
                                <input autocomplete='off' class='form-control card-cvc' placeholder='e.g 595'
                                    size='4' type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-md-12 hide error form-group'>
                                <div class='alert-danger alert'>Fix the errors before you begin.</div>
                            </div>
                        </div>

                        <div class="row">
                            <button class="btn btn-success btn-lg btn-block" type="submit">Pay</button>
                        </div>

                    </form>
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
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>

<script type="text/javascript">
    $(function () {
        var $form = $(".stripe-payment");
        $('form.stripe-payment').bind('submit', function (e) {
            var $form = $(".stripe-payment"),
                inputVal = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputVal),
                $errorStatus = $form.find('div.error'),
                valid = true;
            $errorStatus.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function (i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorStatus.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-num').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeRes);
            }

        });

        function stripeRes(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });

</script>
	<script>
		$(document).ready(function() { $("select.select2").select2(); });
	</script>
	<script>
		function showMe(box){
			var checkbox=document.getElementById('shipping').style.display;
			// alert(checkbox);
			var vis= 'none';
			if(checkbox=="none"){
				vis='block';
			}
			if(checkbox=="block"){
				vis="none";
			}
			document.getElementById(box).style.display=vis;
		}
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