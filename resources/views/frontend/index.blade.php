@extends('frontend.layouts.master')
@section('title','DropshippingSupplier || HOME PAGE')
@section('main-content')
<div class="slider-area bg-gray">
    <div class="hero-slider-active-1 hero-slider-pt-1 nav-style-1 dot-style-1">
        @foreach ($featured as $product)    
        <div class="single-hero-slider single-animation-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="hero-slider-content-1 hero-slider-content-1-pt-1 slider-animated-1">
                            <h4 class="animated">New Arrivals</h4>
                            <h1 class="animated">{{$product->title}}</h1>
                            <p class="animated">{!!$product->summary!!}</p>
                            <div class="btn-style-1">
                                <a class="animated btn-1-padding-1" href="product-details.html">Explore Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="hero-slider-img-1 slider-animated-1">
                            <img class="animated" src="{{asset($product->photo)}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="product-area section-padding-1 pt-115 pb-75">
    <div class="container">
        <div class="section-title-tab-wrap mb-45">
            <div class="section-title">
                <h2>Featured Products</h2>
            </div>
            <div class="tab-style-1 nav">
                <a class="active" href="#product-1" data-toggle="tab">Best Seller</a>
                {{--
                <a href="#product-2" data-toggle="tab"> Trending</a>
                <a href="#product-3" data-toggle="tab">New Arrivals </a>
                <a href="#product-4" data-toggle="tab">All Products</a>
                --}}
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="tab-content jump">
            <div id="product-1" class="tab-pane active">
                <div class="row">
                    @foreach ($product_lists as $product)   
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="{{asset($product->photo)}}" alt="">
                                </a>
                                @if ($product->discount > 0)    
                                <span class="pro-badge left bg-red">-{{$product->discount}}%</span>
                                @endif
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-toggle="modal" data-target="#{{$product->slug}}"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">{{$product->title}}</a></h4>
                                    <div class="product-price">
                                        @if ($product->discount > 0) 
                                        <span class="new-price">${{number_format($product->price)}}</span>   
                                        <span class="old-price">${{number_format($product->price + $product->price * $product->discount / 100)}}</span>
                                        @else
                                        <span>${{number_format($product->price)}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="{{$product->slug}}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6 col-12 col-sm-12">
                                            <div class="tab-content quickview-big-img">
                                                <div id="pro-1" class="tab-pane fade show active">
                                                    <img src="{{asset($product->photo)}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6 col-12 col-sm-12">
                                            <div class="product-details-content quickview-content">
                                                <h2>{{$product->title}}</h2>
                                                <div class="product-ratting-review-wrap">
                                                    <div class="product-ratting-digit-wrap">
                                                        <div class="product-ratting">
                                                            <i class="icon_star"></i>
                                                            <i class="icon_star"></i>
                                                            <i class="icon_star"></i>
                                                            <i class="icon_star"></i>
                                                            <i class="icon_star"></i>
                                                        </div>
                                                        <div class="product-digit">
                                                            <span>5.0</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-review-order">
                                                        <span>62 Reviews</span>
                                                        <span>242 orders</span>
                                                    </div>
                                                </div>
                                                {!!$product->summary!!}
                                                <div class="pro-details-price">
                                                    @if ($product->discount > 0) 
                                                    <span class="new-price">${{number_format($product->price)}}</span>   
                                                    <span class="old-price">${{number_format($product->price + $product->price * $product->discount / 100)}}</span>
                                                    @else
                                                    <span>${{number_format($product->price)}}</span>
                                                    @endif
                                                </div>
                                                <div class="pro-details-color-wrap">
                                                    <span>Color:</span>
                                                    <div class="pro-details-color-content">
                                                        <ul>
                                                            <li><a class="dolly" href="#">dolly</a></li>
                                                            <li><a class="white" href="#">white</a></li>
                                                            <li><a class="azalea" href="#">azalea</a></li>
                                                            <li><a class="peach-orange" href="#">Orange</a></li>
                                                            <li><a class="mona-lisa active" href="#">lisa</a></li>
                                                            <li><a class="cupid" href="#">cupid</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="pro-details-size">
                                                    <span>Size:</span>
                                                    <div class="pro-details-size-content">
                                                        <ul>
                                                            <li><a href="#">XS</a></li>
                                                            <li><a href="#">S</a></li>
                                                            <li><a href="#">M</a></li>
                                                            <li><a href="#">L</a></li>
                                                            <li><a href="#">XL</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="pro-details-quality">
                                                    <span>Quantity:</span>
                                                    <div class="cart-plus-minus">
                                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                                                    </div>
                                                </div>
                                                <div class="product-details-meta">
                                                    <ul>
                                                        <li><span>{{__('Categories')}}:</span><a href="#">{{$product->cat_info->title}}</a></li>
                                                        <li><span>{{__('Subcategory')}}: </span><a href="#">{{$product->sub_cat_info->title}}</a></li>
                                                    </ul>
                                                </div>
                                                <div class="pro-details-action-wrap">
                                                    <div class="pro-details-add-to-cart">
                                                        <a title="Add to Cart" href="#">Add To Cart </a>
                                                    </div>
                                                    <div class="pro-details-action">
                                                        <a title="Add to Wishlist" href="#"><i class="icon-heart"></i></a>
                                                        <a title="Add to Compare" href="#"><i class="icon-refresh"></i></a>
                                                        <a class="social" title="Social" href="#"><i class="icon-share"></i></a>
                                                        <div class="product-dec-social">
                                                            <a class="facebook" title="Facebook" href="#"><i class="icon-social-facebook"></i></a>
                                                            <a class="twitter" title="Twitter" href="#"><i class="icon-social-twitter"></i></a>
                                                            <a class="instagram" title="Instagram" href="#"><i class="icon-social-instagram"></i></a>
                                                            <a class="pinterest" title="Pinterest" href="#"><i class="icon-social-pinterest"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal end -->
                    @endforeach
                </div>
            </div>
            
        </div>
    </div>
</div>
<div class="banner-area pb-85">
    <div class="container">
        <div class="section-title mb-45">
            <h2>Our Collections</h2>
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-7">
                <div class="banner-wrap banner-mr-1 mb-30">
                    <div class="banner-img banner-img-zoom">
                        <a href="product-details.html"><img src="{{asset($category_lists[0]->photo)}}" alt=""></a>
                    </div>
                    <div class="banner-content-1">
                        <h2>{{$category_lists[0]->title}}</h2>
                        <p>{!! $category_lists[0]->summary !!}</p>
                        <div class="btn-style-1">
                            <a class="animated btn-1-padding-2" href="product-details.html">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="banner-wrap  banner-ml-1 mb-30">
                    <div class="banner-img banner-img-zoom">
                        <a href="product-details.html"><img src="{{asset($category_lists[1]->photo)}}" alt=""></a>
                    </div>
                    <div class="banner-content-2">
                        <h2>{{$category_lists[1]->title}}</h2>
                        <p>{!! $category_lists[1]->summary !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
