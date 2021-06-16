@extends('frontend.layouts.master')

@section('title','Order Track Page || leMotoShop')

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumb-area bg-gray">
		<div class="container">
			<div class="breadcrumb-content text-center">
				<ul >
                    <li><a href="{{route('home')}}">{{ __('Home')}}<i class="ti-arrow-right"></i></a></li>
                    <li class="active"><a href="javascript:void(0);">{{ __('Order Track')}}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
<section class="order-tracking-area pt-110 pb-120">
    <div class="container">
        <div class="order-tracking-content">
            <p>{{ __('To track your order please enter your Order ID in the box below and press the "Track" button. This was given
                to you on your receipt and in the confirmation email you should have received')}}.</p>
            <div class="order-tracking-form">
                <form class="my-4" action="{{route('product.track.order')}}" method="post" novalidate="novalidate">
                @csrf
                    <div class="sin-order-tracking">
                        <label>{{ __('Order ID')}}</label>
                        <input type="text" class="p-2"  name="order_number" placeholder="Enter your order number">
                    </div>
                    <div class="order-track-btn">
                        <button type="submit" class="btn submit_btn">{{ __('Track Order')}}</button>
                    </div>
                </form>
             </div>
        </div>
    </div>
</section>
@endsection