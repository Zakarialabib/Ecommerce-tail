@extends('frontend.layouts.master')
@section('title','{{ __('Wishlist Page')}} || leMotoShop ')
@section('main-content')
	<!-- Breadcrumbs -->
	<div class="breadcrumb-area bg-gray">
		<div class="container">
			<div class="breadcrumb-content text-center">
				<ul >
					<li><a href="{{('home')}}">{{ __('Home')}}<i class="ti-arrow-right"></i></a></li>
					<li class="active"><a href="javascript:void(0);">{{ __('Wishlist')}}</a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- End Breadcrumbs -->
			
	<!-- Shopping Cart -->
	<div class="cart-main-area pt-60 pb-60">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<div class="table-content table-responsive cart-table-content">
						<table>
						<thead>
							<tr class="main-hading">
								<th>{{ __('PRODUCT')}}</th>
								<th>{{ __('NAME')}}</th>
								<th class="text-center">TOTAL</th> 
								<th class="text-center">{{ __('ADD TO CART')}}</th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>
							@if(Helper::getAllProductFromWishlist())
								@foreach(Helper::getAllProductFromWishlist() as $key=>$wishlist)
									<tr>
										@php 
											$photo=explode(',',$wishlist->product['photo']);
										@endphp
										<td class="product-thumbnail" data-title="No"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></td>
										<td class="product-name" data-title="Description">
											<p class="product-name"><a href="{{route('product-detail',$wishlist->product['slug'])}}">{{$wishlist->product['title']}}</a></p>
											<p class="product-des">{!!($wishlist['summary']) !!}</p>
										</td>
										<td class="product-subtotal" data-title="Total"><span>{{$wishlist['amount']}} $</span></td>
										<td class="product-price-cart"><a href="{{route('add-to-cart',$wishlist->product['slug'])}}" class='btn text-white'>{{ __('ADD TO CART')}}</a></td>
										<td class="action" data-title="Remove"><a href="{{route('wishlist-delete',$wishlist->id)}}"><i class="ti-trash remove-icon"></i></a></td>
									</tr>
								@endforeach
							@else 
								<tr>
									<td class="text-center">
									{{ __('There are no any wishlist available')}}. <a href="{{route('product-grids')}}" style="color:blue;">{{ __('Continue shopping')}}</a>

									</td>
								</tr>
							@endif
						</tbody>
					</table>
					</div>
					<!--/ End Shopping Summery -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->
	

	@include('frontend.layouts.quick-view-modal')

	
@endsection
@push('scripts')

@endpush