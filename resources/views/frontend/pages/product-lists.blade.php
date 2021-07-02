@extends('frontend.layouts.master')

@section('title','PRODUCT PAGE || leMotoShop')

@section('main-content')
	
		<!-- Breadcrumbs -->
		<div class="breadcrumb-area bg-gray">
			<div class="container">
				<div class="breadcrumb-content text-center">
					<ul >
						<li><a href="{{route('home')}}">{{ __('Home')}}<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="javascript:void(0)">{{ __('Catalogue')}}</a></li>
					</ul>
				</div>
			</div>
		</div>

		<!-- End Breadcrumbs -->
		<form action="{{route('shop.filter')}}" method="POST">
		@csrf
			<!-- Product Style 1 -->
			<section class="shop-area pt-60 pb-60 shop-sidebar shop-list shop">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-4 col-12">
							<div class="shop-sidebar">
                                <!-- Single Widget -->
                                <div class="sidebar-widget shop-sidebar-border mb-35">
                                    <h3 class="sidebar-widget-title">{{ __('Categories')}}</h3>
                                  <div class="shop-catigory">
                                    <ul>
										@php
											// $category = new Category();
											$menu=App\Models\Category::getAllParentWithChild();
										@endphp
										@if($menu)
										<li>
											@foreach($menu as $cat_info)
													@if($cat_info->child_cat->count()>0)
														<li><a href="{{route('product-cat',$cat_info->slug)}}">{{$cat_info->title}}</a>
															<ul>
																@foreach($cat_info->child_cat as $sub_menu)
																	<li><a href="{{route('product-sub-cat',[$cat_info->slug,$sub_menu->slug])}}">{{$sub_menu->title}}</a></li>
																@endforeach
															</ul>
														</li>
													@else
														<li><a href="{{route('product-cat',$cat_info->slug)}}">{{$cat_info->title}}</a></li>
													@endif
											@endforeach
										</li>
										@endif
                                        {{-- @foreach(Helper::productCategoryList('products') as $cat)
                                            @if($cat->is_parent==1)
												<li><a href="{{route('product-cat',$cat->slug)}}">{{$cat->title}}</a></li>
											@endif
                                        @endforeach --}}
                                    </ul>
								</div>
                                </div>
                                <!--/ End Single Widget -->
                                <!-- Shop By Price -->
								<div class="sidebar-widget shop-sidebar-border mb-35 range">
									<h3 class="sidebar-widget-title">{{ __('Shop by Price')}}</h3>
									<div class="price-filter">
											{{-- <div id="slider-range" data-min="10" data-max="2000" data-currency="%"></div>
												<div class="price_slider_amount">
												<div class="label-input">
													<span>Range:</span>
													<input type="text" id="amount" name="price_range" value='@if(!empty($_GET['price'])) {{$_GET['price']}} @endif' placeholder="Add Your Price"/>
												</div>
											</div> --}}
											@php
												$max=DB::table('products')->max('price');
												// dd($max);
											@endphp
											<div id="slider-range" data-min="0" data-max="{{$max}}" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"></div>
											<div class="price-slider-amount">
												<div class="label-input">
													<span>{{ __('Range')}}:</span>
													<input style="" type="text" id="amount" readonly/>
													<input type="hidden" name="price_range" id="price_range" value="@if(!empty($_GET['price'])){{$_GET['price']}}@endif"/>
													<button type="submit" class="filter_button">{{ __('Filter')}}</button>
												</div>
											</div>
									</div>
									{{-- <ul class="check-box-list">
										<li>
											<label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">$20 - $50<span class="count">(3)</span></label>
										</li>
										<li>
											<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">$50 - $100<span class="count">(5)</span></label>
										</li>
										<li>
											<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">$100 - $250<span class="count">(8)</span></label>
										</li>
									</ul> --}}
								</div>
								<!--/ End Shop By Price -->
                                <!-- Single Widget -->
                                <div class="sidebar-widget shop-sidebar-border mb-35 recent-post">
                                    <h3 class="sidebar-widget-title">{{ __('Recent products')}}</h3>
                                    {{-- {{dd($recent_products)}} --}}
                                    @foreach($recent_products as $product)
                                        <!-- Single Post -->
                                        @php 
                                            $photo=explode(',',$product->photo);
                                        @endphp
                                        <div class="single-post first">
                                            <div class="image">
                                                <img src="{{$photo[0]}}" alt="{{$photo[0]}}" style="max-width: 50%">
                                            </div>
                                            <div class="content">
                                                <h5><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h5>
                                                @php
                                                    $org=($product->price-($product->price*$product->discount)/100);
                                                @endphp
                                                <p class="price"><del class="text-muted">{{ Helper::showCurrencyPrice($product->price,2) }}</del>   {{ Helper::showCurrencyPrice($org,2) }}  </p>                                                
                                            </div>
                                        </div>
                                        <!-- End Single Post -->
                                    @endforeach
                                </div>
                                <!--/ End Single Widget -->
                                <!-- Single Widget -->
                                <div class="sidebar-widget shop-sidebar-border pt-40">
                                    <h3 class="sidebar-widget-title">{{ __('Brands')}}</h3>
                                    <div class="tag-wrap sidebar-widget-tag">
                                        @php
                                            $brands=DB::table('brands')->orderBy('title','ASC')->where('status','active')->get();
                                        @endphp
                                        @foreach($brands as $brand)
                                            <a href="{{route('product-brand',$brand->slug)}}">{{$brand->title}}</a>
                                        @endforeach
									</div>
                                </div>
                                <!--/ End Single Widget -->
                        	</div>
						</div>
						<div class="col-lg-9 col-md-8 col-12">
							<div class="row">
								<div class="col-12">
									<!-- Shop Top -->
									<div class="shop-topbar-wrapper">
										<div class="product-sorting-wrapper">
											<div class="product-shorting shorting-style">
												<label>{{ __('Show')}} :</label>
												<select class="show" name="show" onchange="this.form.submit();">
													<option value="">{{ __('Default')}}</option>
													<option value="9" @if(!empty($_GET['show']) && $_GET['show']=='9') selected @endif>09</option>
													<option value="15" @if(!empty($_GET['show']) && $_GET['show']=='15') selected @endif>15</option>
													<option value="21" @if(!empty($_GET['show']) && $_GET['show']=='21') selected @endif>21</option>
													<option value="30" @if(!empty($_GET['show']) && $_GET['show']=='30') selected @endif>30</option>
												</select>
											</div>
											<div class="product-shorting shorting-style">
												<label>{{ __('Sort By')}} :</label>
												<select class='sortBy' name='sortBy' onchange="this.form.submit();">
													<option value="">{{ __('Default')}}</option>
													<option value="title" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='title') selected @endif>{{ __('Name')}}</option>
													<option value="price" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='price') selected @endif>{{ __('Price')}}</option>
													<option value="category" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='category') selected @endif>{{ __('Category')}}</option>
													<option value="brand" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='brand') selected @endif>{{ __('Brand')}}</option>
												</select>
											</div>
										</div>
										<div class="shop-topbar-left">
										<ul class="view-mode nav">
											<li class="active"><a href="{{route('product-grids')}}"><i class="icon-grid"></i></a></li>
											<li><a href="javascript:void(0)"><i class="icon-menu"></i></a></li>
										</ul>
										</div>
									</div>
									<!--/ End Shop Top -->
								</div>
							</div>
							<div class="shop-bottom-area">
								@if(count($products))
									@foreach($products as $product)
									 	{{-- {{$product}} --}}
										<!-- Start Single List -->
										<div class="shop-list-wrap mb-30">
											<div class="row">
												<div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
														<div class="product-list-img">
															<a href="{{route('product-detail',$product->slug)}}">
																@php 
																	$photo=explode(',',$product->photo);
																@endphp
																<img class="default-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
															</a>															
														</div>
												</div>
												<div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
													<div class="shop-list-content">
														<h3><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h3>
															<div class="pro-list-price">
																@php
																$after_discount=($product->price-($product->price*$product->discount)/100);
																@endphp
																<span class="new-price">{{ Helper::showCurrencyPrice($after_discount,2) }}</span>
																<del class="old-price">{{ Helper::showCurrencyPrice($product->price,2) }}</del>
															</div>
														{{-- <p>{!! html_entity_decode($product->summary) !!}</p> --}}
														
														<p>{!! html_entity_decode($product->summary) !!}</p>
														<div class="product-list-action">
															<a title="{{ __('Add to Cart')}}" href="{{route('add-to-cart',$product->slug)}}"><i class="icon-basket-loaded"></i></a>
															<a title="Wishlist" href="{{route('add-to-wishlist',$product->slug)}}"><i class="icon-heart"></i></a>
															<a title="Quick View" data-toggle="modal" data-target="#{{$product->slug}}" ><i class="icon-size-fullscreen icons"></i></a>    
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- End Single List -->
										@include('frontend.layouts.quick-view-modal')
									@endforeach
								@else
									<h4 class="text-warning" style="margin:100px auto;">{{ __('There are no products')}}.</h4>
								@endif
							</div>
							 <div class="row">
                            <div class="col-md-12 justify-content-center d-flex">
                                {{$products->appends($_GET)->links()}}
                            </div>
                          </div>
						</div>
					</div>
				</div>
			</section>
			<!--/ End Product Style 1  -->	
		</form>
		


@endsection
@push ('styles')
<style>
	 .pagination{
        display:inline-flex;
    }
  .pagination>li>a, .pagination>li>span { 
      border-radius: 50% !important;margin: 0 5px;
  }
  
  .page-item.active .page-link{
    color: #fff;
    background-color: #ff2f2f;
    border-color: #ff2f2f;
  }
 .page-link{
    color: #ff2f2f;
 }
 .page-link:hover{
    color: #000;
 }
 </style>
@endpush
@push('scripts')


	<script>
        $(document).ready(function(){
       
        if ($("#slider-range").length > 0) {
            const max_value = parseInt( $("#slider-range").data('max') ) || 500;
            const min_value = parseInt($("#slider-range").data('min')) || 0;
            const currency = $("#slider-range").data('currency') || '';
            let price_range = min_value+'-'+max_value;
            if($("#price_range").length > 0 && $("#price_range").val()){
                price_range = $("#price_range").val().trim();
            }
            
            let price = price_range.split('-');
            $("#slider-range").slider({
                range: true,
                min: min_value,
                max: max_value,
                values: price,
                slide: function (event, ui) {
                    $("#amount").val(currency + ui.values[0] + " -  "+currency+ ui.values[1]);
                    $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
                }
            });
            }
        if ($("#amount").length > 0) {
            const m_currency = $("#slider-range").data('currency') || '';
            $("#amount").val(m_currency + $("#slider-range").slider("values", 0) +
                "  -  "+m_currency + $("#slider-range").slider("values", 1));
            }
        })
    </script>

@endpush