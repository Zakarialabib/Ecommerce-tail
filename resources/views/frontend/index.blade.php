@extends('frontend.layouts.master')
@section('title','DropshippingSupplier || HOME PAGE')
@section('main-content')
<!-- Slider Area -->
@if(count($banners)>0)
    {{-- <section id="Gslider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($banners as $key=>$banner)
        <li data-target="#Gslider" data-slide-to="{{$key}}" class="{{(($key==0)? 'active' : '')}}"></li>
            @endforeach

        </ol>
        <div class="carousel-inner" role="listbox">
                @foreach($banners as $key=>$banner)
                <div class="carousel-item {{(($key==0)? 'active' : '')}}">
                    <img class="first-slide" src="{{$banner->photo}}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block text-left">
                        <h1 class="wow fadeInDown">{{$banner->title}}</h1>
                        <p>{!! html_entity_decode($banner->description) !!}</p>
                        <a class="btn btn-lg ws-btn wow fadeInUpBig" href="{{route('product-grids')}}" role="button">Shop Now<i class="far fa-arrow-alt-circle-right"></i></i></a>
                    </div>
                </div>  
            @endforeach   
        </div>
        <a class="carousel-control-prev" href="#Gslider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#Gslider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </section> --}}
    <div class="slider-area bg-gray">
        <div class="hero-slider-active-1 hero-slider-pt-1 nav-style-1 dot-style-1">
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="hero-slider-content-1 hero-slider-content-1-pt-1 slider-animated-1">
                                <h4 class="animated">New Arrivals</h4>
                                <h1 class="animated">Leather Simple <br>Backpacks</h1>
                                <p class="animated">Discover our collection with leather simple backpacks. Less is more never out trend.</p>
                                <div class="btn-style-1">
                                    <a class="animated btn-1-padding-1" href="product-details.html">Explore Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="hero-slider-img-1 slider-animated-1">
                                <img class="animated" src="assets/images/slider/hm-1-slider-1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="service-area">
        <div class="container">
            <div class="service-wrap">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="single-service-wrap mb-30">
                            <div class="service-icon">
                                <i class="icon-cursor"></i>
                            </div>
                            <div class="service-content">
                                <h3>Free Shipping</h3>
                                <span>Orders over $100</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="single-service-wrap mb-30">
                            <div class="service-icon">
                                <i class="icon-reload"></i>
                            </div>
                            <div class="service-content">
                                <h3>Free Returns</h3>
                                <span>Within 30 days</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="single-service-wrap mb-30">
                            <div class="service-icon">
                                <i class="icon-lock"></i>
                            </div>
                            <div class="service-content">
                                <h3>100% Secure</h3>
                                <span>Payment Online</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="single-service-wrap mb-30">
                            <div class="service-icon">
                                <i class="icon-tag"></i>
                            </div>
                            <div class="service-content">
                                <h3>Best Price</h3>
                                <span>Guaranteed</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<!--/ End Slider Area -->

<!-- Start Small Banner  -->
<section class="">
    <ul id="banners_grid" class="clearfix">
            @php 
            $category_lists=DB::table('categories')->where('status','active')->limit(3)->get();
            @endphp
            @if($category_lists)
                @foreach($category_lists as $cat)
                    @if($cat->is_parent==1)
                    <li>
                        <a href="{{route('product-cat',$cat->slug)}}" class="img_container">
                            @if($cat->photo)
                            <img src="{{$cat->photo}}" data-src="{{$cat->photo}}" alt="{{$cat->title}}" class="lazy">
                            @else
                            <img src="{{asset('photos/banners_cat_placeholder.jpg')}}"  alt="{{$cat->title}}" class="lazy">
                            @endif
                            <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                                <h3>{{$cat->title}}</h3>
                                <div><span class="btn_1">{{__('Shop Now')}}</span></div>
                            </div>
                        </a>
                    </li>
                    @endif
                    <!-- /End Single Banner  -->
                @endforeach
            @endif
        </ul>
</section>
<!-- End Small Banner -->

<!-- Start Product Area -->
<section class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>{{__('Trending Item')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">        
                    <div class="product-info">
                        <div class="nav-main">
                            <!-- Tab Nav -->
                            <ul class="nav nav-tabs filter-tope-group" id="myTab" role="tablist">
                                @php 
                                    $categories=DB::table('categories')->where('status','active')->where('is_parent',1)->get();
                                    // dd($categories);
                                @endphp
                                @if($categories)
                                <button class="btn" style="background:black"data-filter="*">
                                {{__('All Products')}}
                                </button>
                                    @foreach($categories as $key=>$cat)
                                    
                                    <button class="btn" style="background:none;color:black;"data-filter=".{{$cat->id}}">
                                        {{$cat->title}}
                                    </button>
                                    @endforeach
                                @endif
                            </ul>
                            <!--/ End Tab Nav -->
                        </div>
                        <div class="tab-content isotope-grid" id="myTabContent">
                             <!-- Start Single Tab -->
                            @if($product_lists)
                                @foreach($product_lists as $key=>$product)
                                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$product->cat_id}}">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="{{route('product-detail',$product->slug)}}">
                                                @php 
                                                    $photo=explode(',',$product->photo);
                                                @endphp
                                                <img class="default-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                                <img class="hover-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                                @if($product->stock<=0)
                                                    <span class="out-of-stock">{{__('Sale out')}}</span>
                                                @elseif($product->condition=='new')
                                                    <span class="new">{{__('New')}}</span>
                                                @elseif($product->condition=='hot')
                                                    <span class="hot">{{__('Hot')}}</span>
                                                @else
                                                    <span class="price-dec">{{$product->discount}}% Off</span>
                                                @endif
                                            </a>
                                            <div class="button-head">
                                                <div class="product-action">
                                                    <a data-toggle="modal" data-target="#{{$product->id}}" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                    <a title="Wishlist" href="{{route('add-to-wishlist',$product->slug)}}" ><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                </div>
                                                <div class="product-action-2">
                                                    <a title="Add to cart" href="{{route('add-to-cart',$product->slug)}}">{{ __('ADD TO CART')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h3>
                                            <div class="product-price">
                                                @php
                                                    $after_discount=($product->price-($product->price*$product->discount)/100);
                                                @endphp
                                                <span>{{number_format($after_discount,2)}}DH</span>
                                                <del style="padding-left:4%;">{{number_format($product->price,2)}}DH</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                             <!--/ End Single Tab -->
                            @endif
                       
                        <!--/ End Single Tab -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- End Product Area -->

<!-- Start Midium Banner  -->
<section class="midium-banner">
    <div class="container">
        <div class="row">
            @if($featured)
                @foreach($featured as $data)
                    <!-- Single Banner  -->
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="single-banner">
                            @php 
                                $photo=explode(',',$data->photo);
                            @endphp
                            <img src="{{$photo[0]}}" alt="{{$photo[0]}}">
                            <div class="content">
                                <p>{{$data->cat_info['title']}}</p>
                                <h3>{{$data->title}} <br>Up to<span> {{$data->discount}}%</span></h3>
                                <a href="{{route('product-detail',$data->slug)}}">{{__('Shop Now')}}</a>
                            </div>
                        </div>
                    </div>
                    <!-- /End Single Banner  -->
                @endforeach
            @endif
        </div>
    </div>
</section>
<!-- End Midium Banner -->

<!-- Start Most Popular -->
<section class="product-area most-popular section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>{{__('Hot Item')}}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel popular-slider">
                    @foreach($product_lists as $product)
                        @if($product->condition=='hot')
                            <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-img">
                                <a href="{{route('product-detail',$product->slug)}}">
                                    @php 
                                        $photo=explode(',',$product->photo);
                                    // dd($photo);
                                    @endphp
                                    <img class="default-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                    <img class="hover-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                    {{-- <span class="out-of-stock">Hot</span> --}}
                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#{{$product->id}}" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                        <a title="Wishlist" href="{{route('add-to-wishlist',$product->slug)}}" ><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                    </div>
                                    <div class="product-action-2">
                                        <a href="{{route('add-to-cart',$product->slug)}}">{{ __('ADD TO CART')}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h3>
                                <div class="product-price">
                                    <span class="old">{{number_format($product->price,2)}}DH</span>
                                    @php 
                                    $after_discount=($product->price-($product->price*$product->discount)/100)
                                    @endphp
                                    <span>{{number_format($after_discount,2)}}DH</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Most Popular Area -->

<!-- Start Shop Home List  -->
<section class="shop-home-list section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-section-title">
                            <h1>{{__('Latest Items')}}</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @php
                        $product_lists=DB::table('products')->where('status','active')->orderBy('id','DESC')->limit(6)->get();
                    @endphp
                    @foreach($product_lists as $product)
                        <div class="col-md-4">
                            <!-- Start Single List  -->
                            <div class="single-list">
                                <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="list-image overlay">
                                        @php 
                                            $photo=explode(',',$product->photo);
                                            // dd($photo);
                                        @endphp
                                        <img src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                        <a href="{{route('add-to-cart',$product->slug)}}" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 no-padding">
                                    <div class="content">
                                        <h4 class="title"><a href="#">{{$product->title}}</a></h4>
                                        <p class="price with-discount">{{number_format($product->discount,2)}}DH</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- End Single List  -->
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Shop Home List  -->
{{-- @foreach($featured as $data)
    <!-- Start Cowndown Area -->
    <section class="cown-down">
        <div class="section-inner ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-12 padding-right">
                        <div class="image">
                            @php 
                                $photo=explode(',',$data->photo);
                                // dd($photo);
                            @endphp
                            <img src="{{$photo[0]}}" alt="{{$photo[0]}}">
                        </div>	
                    </div>	
                    <div class="col-lg-6 col-12 padding-left">
                        <div class="content">
                            <div class="heading-block">
                                <p class="small-title">{{ __('Deal of day')}}</p>
                                <h3 class="title">{{$data->title}}</h3>
                                <p class="text">{!! html_entity_decode($data->summary) !!}</p>
                                @php 
                                    $after_discount=($product->price-($product->price*$product->discount)/100)
                                @endphp
                                <h1 class="price">{{number_format($after_discount)}}DH <s>{{number_format($data->price)}}DH</s></h1>
                                <div class="coming-time">
                                    <div class="clearfix" data-countdown="2021/02/30"></div>
                                </div>
                            </div>
                        </div>	
                    </div>	
                </div>
            </div>
        </div>
    </section>
    <!-- /End Cowndown Area -->
@endforeach --}}
<!-- Start Shop Blog  -->
<section class="shop-blog section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>{{ __('From Our Blog')}}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @if($posts)
                @foreach($posts as $post)
				<div class="col-lg-6">
					<a class="box_news" href="{{route('blog.detail',$post->slug)}}">
						<figure>
							<img src="{{$post->photo}}" data-src="{{$post->photo}}" alt="{{$post->title}}" width="400" height="266" class="lazy">
							<figcaption>{{$post->created_at->format('d M')}}</figcaption>
						</figure>
						<ul>
							<li>{{$post->created_at->format('d M , Y. D')}}</li>
						</ul>
						<h4>{{$post->title}}</h4>
						<p>{!! \Illuminate\Support\Str::words($post->description, 50,'....')  !!}</p>
					</a>
				</div>
                @endforeach
            @endif
            
        </div>
    </div>
</section>
<!-- End Shop Blog  -->

@include('frontend.layouts.newsletter')

<!-- Modal -->
@if($product_lists)
    @foreach($product_lists as $key=>$product)
        <div class="modal fade" id="{{$product->id}}" tabindex="-1" role="dialog">
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
                                                @php 
                                                    $photo=explode(',',$product->photo);
                                                // dd($photo);
                                                @endphp
                                                @foreach($photo as $data)
                                                    <div class="single-slider">
                                                        <img src="{{$data}}" alt="{{$data}}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    <!-- End Product slider -->
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <div class="quickview-content">
                                        <h2>{{$product->title}}</h2>
                                        <div class="quickview-ratting-review">
                                            <div class="quickview-ratting-wrap">
                                                <div class="quickview-ratting">
                                                    {{-- <i class="yellow fa fa-star"></i>
                                                    <i class="yellow fa fa-star"></i>
                                                    <i class="yellow fa fa-star"></i>
                                                    <i class="yellow fa fa-star"></i>
                                                    <i class="fa fa-star"></i> --}}
                                                    @php
                                                        $rate=DB::table('product_reviews')->where('product_id',$product->id)->avg('rate');
                                                        $rate_count=DB::table('product_reviews')->where('product_id',$product->id)->count();
                                                    @endphp
                                                    @for($i=1; $i<=5; $i++)
                                                        @if($rate>=$i)
                                                            <i class="yellow fa fa-star"></i>
                                                        @else 
                                                        <i class="fa fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <a href="#"> ({{$rate_count}} customer review)</a>
                                            </div>
                                            <div class="quickview-stock">
                                                @if($product->stock >0)
                                                <span><i class="fa fa-check-circle-o"></i> {{$product->stock}} in stock</span>
                                                @else 
                                                <span><i class="fa fa-times-circle-o text-danger"></i> {{$product->stock}} out stock</span>
                                                @endif
                                            </div>
                                        </div>
                                        @php
                                            $after_discount=($product->price-($product->price*$product->discount)/100);
                                        @endphp
                                        <h3><small><del class="text-muted">{{number_format($product->price,2)}}</del></small>    {{number_format($after_discount,2)}}  </h3>
                                        <div class="quickview-peragraph">
                                            <p>{!! html_entity_decode($product->summary) !!}</p>
                                        </div>
                                        @if($product->size)
                                            <div class="size">
                                                <div class="row">
                                                    <div class="col-lg-6 col-12">
                                                        <h5 class="title">{{ __('Size')}}</h5>
                                                        <select>
                                                            @php 
                                                            $sizes=explode(',',$product->size);
                                                            // dd($sizes);
                                                            @endphp
                                                            @foreach($sizes as $size)
                                                                <option>{{$size}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    {{-- <div class="col-lg-6 col-12">
                                                        <h5 class="title">Color</h5>
                                                        <select>
                                                            <option selected="selected">orange</option>
                                                            <option>purple</option>
                                                            <option>black</option>
                                                            <option>pink</option>
                                                        </select>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        @endif
                                        <form action="{{route('single-add-to-cart')}}" method="POST" class="mt-4">
                                            @csrf 
                                            <div class="quantity">
                                                <!-- Input Order -->
                                                <div class="input-group">
                                                    <div class="button minus">
                                                        <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                                            <i class="ti-minus"></i>
                                                        </button>
                                                    </div>
													<input type="hidden" name="slug" value="{{$product->slug}}">
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
                                                <button type="submit" class="btn">{{ __('ADD TO CART')}}</button>
                                                <a href="{{route('add-to-wishlist',$product->slug)}}" class="btn min"><i class="ti-heart"></i></a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    @endforeach
@endif
<!-- Modal end -->
@endsection

@push('styles')
    <style>
        /* Banner Sliding */
        #Gslider .carousel-inner {
        background: #cbcbcb;
        color:black;
        }

        #Gslider .carousel-inner{
        height: 550px;
        }
        #Gslider .carousel-inner img{
            width: 100% !important;
            opacity: .8;
        }

        #Gslider .carousel-inner .carousel-caption {
        bottom: 60%;
        }

        #Gslider .carousel-inner .carousel-caption h1 {
        font-size: 50px;
        font-weight: bold;
        line-height: 100%;
        color: #F7941D;
        }

        #Gslider .carousel-inner .carousel-caption p {
        font-size: 18px;
        color: black;
        margin: 28px 0 28px 0;
        }

        #Gslider .carousel-indicators {
        bottom: 70px;
        }
    </style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    {{-- <script>
        $('.cart').click(function(){
            var quantity=1;
            var pro_id=$(this).data('id');
            $.ajax({
                url:"{{route('add-to-cart')}}",
                type:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    quantity:quantity,
                    pro_id:pro_id
                },
                success:function(response){
                    console.log(response);
					if(typeof(response)!='object'){
						response=$.parseJSON(response);
					}
					if(response.status){
						swal('success',response.msg,'success').then(function(){
							// document.location.href=document.location.href;
						});
					}
                    else{
                        window.location.href='user/login'
                    }
                }
            })
        });
    </script> --}}
    {{-- <script>
        $('.wishlist').click(function(){
            var quantity=1;
            var pro_id=$(this).data('id');
            // alert(pro_id);
            $.ajax({
                url:"{{route('add-to-wishlist')}}",
                type:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    quantity:quantity,
                    pro_id:pro_id,
                },
                success:function(response){
                    if(typeof(response)!='object'){
                        response=$.parseJSON(response);
                    }
                    if(response.status){
                        swal('success',response.msg,'success').then(function(){
                            document.location.href=document.location.href;
                        });
                    }
                    else{
                        swal('error',response.msg,'error').then(function(){
							// document.location.href=document.location.href;
						}); 
                    }
                }
            });
        });
    </script> --}}
    <script>
        
        /*==================================================================
        [ Isotope ]*/
        var $topeContainer = $('.isotope-grid');
        var $filter = $('.filter-tope-group');

        // filter items on button click
        $filter.each(function () {
            $filter.on('click', 'button', function () {
                var filterValue = $(this).attr('data-filter');
                $topeContainer.isotope({filter: filterValue});
            });
            
        });

        // init Isotope
        $(window).on('load', function () {
            var $grid = $topeContainer.each(function () {
                $(this).isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'fitRows',
                    percentPosition: true,
                    animationEngine : 'best-available',
                    masonry: {
                        columnWidth: '.isotope-item'
                    }
                });
            });
        });

        var isotopeButton = $('.filter-tope-group button');

        $(isotopeButton).each(function(){
            $(this).on('click', function(){
                for(var i=0; i<isotopeButton.length; i++) {
                    $(isotopeButton[i]).removeClass('how-active1');
                }

                $(this).addClass('how-active1');
            });
        });
    </script>
    <script>
         function cancelFullScreen(el) {
            var requestMethod = el.cancelFullScreen||el.webkitCancelFullScreen||el.mozCancelFullScreen||el.exitFullscreen;
            if (requestMethod) { // cancel full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }

        function requestFullScreen(el) {
            // Supports most browsers and their versions.
            var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullscreen;

            if (requestMethod) { // Native full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
            return false
        }
    </script>

@endpush
