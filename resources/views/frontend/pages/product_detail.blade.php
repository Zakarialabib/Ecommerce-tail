    @extends('frontend.layouts.master')

    @section('meta')
    <meta name="keywords" content="{{ $product_detail->title }}">
    <meta name="description" content="{{ $product_detail->summary }}">
    <meta property="og:url" content="{{ route('product-detail',$product_detail->slug) }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $product_detail->title }}">
    <meta property="og:image" content="{{ $product_detail->photo }}">
    <meta property="og:description" content="{{ $product_detail->description }}">
    @endsection

    @section('title','PRODUCT DETAIL || leMotoShop')

    @section('main-content')

    <!-- Breadcrumbs -->
    <div class="breadcrumb-area bg-gray">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('Home') }}<i
                                class="ti-arrow-right"></i></a></li>
                    <li><a href="{{ route('product-grids') }}">{{ __('Shop') }}
                            <i class="ti-arrow-right"></i></a></li>
                    <li class="active"><a href="javascript:void(0)">{{ $product_detail->title }}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Shop Single -->
    <section class="product-details-area pt-120 pb-115">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <!-- Product Slider -->
                    <div class="product-details-tab">
                        <!-- Images slider -->
                        <div class="pro-dec-big-img-slider">
                            <div class="easyzoom-style">
                                        @php
                                            $photo=explode(',',$product_detail->photo);
                                            // dd($photo);
                                        @endphp
                                        @foreach($photo as $data)
                                        <div class="easyzoom easyzoom--overlay">
                                            <a data-thumb="{{ $data }}">
                                                <img src="{{ $data }}" alt="{{ $data }}">
                                            </a>
                                        </div>
                                        <a class="easyzoom-pop-up img-popup" href="{{ $data }}"><i class="icon-size-fullscreen"></i></a>
                                        @endforeach
                            </div>
                            <!-- End Images slider -->
                        </div>
                        <!-- End Product slider -->
                    </div>
                </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product-details-content pro-details-content-mrg">
                            <h2>{{ $product_detail->title }}</h2>
                            <!-- Description -->
                            <div class="product-ratting-review-wrap">
                                <ul class="rating">
                                    @php
                                        $rate=ceil($product_detail->getReview->avg('rate'))
                                    @endphp
                                    @for($i=1; $i<=5; $i++)
                                        @if($rate>=$i)
                                            <li><i class="fa fa-star"></i></li>
                                        @else
                                            <li><i class="fa fa-star-o"></i></li>
                                        @endif
                                    @endfor
                                </ul>
                                <a href="#"
                                    class="total-review">({{ $product_detail['getReview']->count() }})
                                    Review</a>
                            </div>
                            <p>{!!($product_detail->summary)!!}</p>
                            <div class="pro-details-price">
                                @php
                                    $after_discount=($product_detail->price-(($product_detail->price*$product_detail->discount)/100));
                                @endphp
                                <p class="price"><span class="discount">{{ number_format($after_discount,2) }} $</span>
                                    <s> {{ number_format($product_detail->price,2) }} $</s>
                                </p>
                            </div>
                            <!--/ End Description -->
                            <!-- Color -->
                            {{-- <div class="color">
                                                    <h4>Available Options <span>Color</span></h4>
                                                    <ul>
                                                        <li><a href="#" class="one"><i class="ti-check"></i></a></li>
                                                        <li><a href="#" class="two"><i class="ti-check"></i></a></li>
                                                        <li><a href="#" class="three"><i class="ti-check"></i></a></li>
                                                        <li><a href="#" class="four"><i class="ti-check"></i></a></li>
                                                    </ul>
                                                </div> --}}
                            <!--/ End Color -->
                            <!-- Size -->
                            @if($product_detail->size)
                                <div class="pro-details-size">
                                    <span>{{ __('Size') }}</span>
                                    <div class="pro-details-size-content">
                                        <ul>
                                            @php
                                                $sizes=explode(',',$product_detail->size);
                                                // dd($sizes);
                                            @endphp
                                            @foreach($sizes as $size)
                                                <li><a href="#" class="one">{{ $size }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            <div class="product-details-meta">
                                <p class="cat">Category :<a
                                        href="{{ route('product-cat',$product_detail->cat_info['slug']) }}">{{ $product_detail->cat_info['title'] }}</a>
                                </p>
                                @if($product_detail->sub_cat_info)
                                    <p class="cat mt-1">Sub Category :<a
                                            href="{{ route('product-sub-cat',[$product_detail->cat_info['slug'],$product_detail->sub_cat_info['slug']]) }}">{{ $product_detail->sub_cat_info['title'] }}</a>
                                    </p>
                                @endif
                            </div>
                            <!--/ End Size -->
                            <!-- Product Buy -->
                            <div class="pro-details-action-wrap">
                                <form action="{{ route('single-add-to-cart') }}" method="POST">
                                    @csrf
                                    <div class="pro-details-quality">
                                        <span>{{ __('Quantity') }}:</span>
                                        <!-- Input Order -->
                                        <div class="cart-plus-minus">
                                            <div class="dec qtybutton">-
                                            </div>
                                            <input type="hidden" name="slug" value="{{ $product_detail->slug }}">
                                            <input type="text" name="quant[1]" class="cart-plus-minus-box" data-min="1"
                                                data-max="1000" value="1" id="quantity">
                                            <div class="inc qtybutton">+
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </div>
                                    <div class="pro-details-action-wrap">
                                        <div class="pro-details-add-to-cart">
                                            <button type="submit" class="btn">{{ __('ADD TO CART') }}</button>
                                        </div>
                                        <div class="pro-details-action">
                                            <a
                                                href="{{ route('add-to-wishlist',$product_detail->slug) }}"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <p class="availability">Stock : @if($product_detail->stock>0)<span
                                    class="badge badge-success">{{ $product_detail->stock }}</span>@else <span
                                    class="badge badge-danger">{{ $product_detail->stock }}</span> @endif</p>
                            <!--/ End Product Buy -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="description-review-wrapper pb-110">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="dec-review-topbar nav mb-45">
                        <!-- Tab Nav -->
                        <a class=" active" data-toggle="tab"
                            href="#description">{{ __('Description') }}</a>
                        <a class="" data-toggle="tab" href="#reviews">Reviews</a>
                        <!--/ End Tab Nav -->
                    </div>
                    <div class="tab-content dec-review-bottom">
                        <!-- Description Tab -->
                        <div class="tab-pane active" id="description">
                            <div class="description-wrap">
                                <p>{!! ($product_detail->description) !!}</p>
                            </div>
                        </div>
                        <!--/ End Description Tab -->
                        <!-- Reviews Tab -->
                        <div class="tab-pane fade" id="reviews">
                            <!-- Review -->
                            <div class="comment-review">
                                <div class="add-review">
                                    <h5>Add A Review</h5>
                                    <p>Your email address will not be published. Required fields are marked</p>
                                </div>
                                <h4>Your Rating <span class="text-danger">*</span></h4>
                                <div class="review-inner">
                                    <!-- Form -->
                                    @auth
                                        <form class="form" method="post"
                                            action="{{ route('review.store',$product_detail->slug) }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 col-12">
                                                    <div class="rating_box">
                                                        <div class="star-rating">
                                                            <div class="star-rating__wrap">
                                                                <input class="star-rating__input" id="star-rating-5"
                                                                    type="radio" name="rate" value="5">
                                                                <label class="star-rating__ico fa fa-star-o"
                                                                    for="star-rating-5" title="5 out of 5 stars"></label>
                                                                <input class="star-rating__input" id="star-rating-4"
                                                                    type="radio" name="rate" value="4">
                                                                <label class="star-rating__ico fa fa-star-o"
                                                                    for="star-rating-4" title="4 out of 5 stars"></label>
                                                                <input class="star-rating__input" id="star-rating-3"
                                                                    type="radio" name="rate" value="3">
                                                                <label class="star-rating__ico fa fa-star-o"
                                                                    for="star-rating-3" title="3 out of 5 stars"></label>
                                                                <input class="star-rating__input" id="star-rating-2"
                                                                    type="radio" name="rate" value="2">
                                                                <label class="star-rating__ico fa fa-star-o"
                                                                    for="star-rating-2" title="2 out of 5 stars"></label>
                                                                <input class="star-rating__input" id="star-rating-1"
                                                                    type="radio" name="rate" value="1">
                                                                <label class="star-rating__ico fa fa-star-o"
                                                                    for="star-rating-1" title="1 out of 5 stars"></label>
                                                                @error('rate')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-12">
                                                    <div class="form-group">
                                                        <label>Write a review</label>
                                                        <textarea name="review" rows="6" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-12">
                                                    <div class="form-group button5">
                                                        <button type="submit"
                                                            class="btn">{{ __('Submit') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @else
                                        <p class="text-center p-5">
                                            You need to <a href="{{ route('login.form') }}"
                                                style="color:rgb(54, 54, 204)">{{ __('Login') }}</a> OR <a
                                                style="color:blue"
                                                href="{{ route('register.form') }}">Register</a>

                                        </p>
                                        <!--/ End Form -->
                                    @endauth
                                </div>
                            </div>

                            <div class="ratting-main">
                                <div class="avg-ratting">
                                    <h4>{{ ceil($product_detail->getReview->avg('rate')) }}
                                        <span>(Overall)</span></h4>
                                    <span>Based on {{ $product_detail->getReview->count() }} Comments</span>
                                </div>
                                @foreach($product_detail['getReview'] as $data)
                                    <!-- Single Rating -->
                                    <div class="single-rating">
                                        <div class="rating-author">
                                            @if($data->user_info['photo'])
                                                <img src="{{ $data->user_info['photo'] }}"
                                                    alt="{{ $data->user_info['photo'] }}">
                                            @else
                                                <img src="{{ asset('backend/img/avatar.png') }}"
                                                    alt="Profile.jpg">
                                            @endif
                                        </div>
                                        <div class="rating-des">
                                            <h6>{{ $data->user_info['name'] }}</h6>
                                            <div class="ratings">

                                                <ul class="rating">
                                                    @for($i=1; $i<=5; $i++)
                                                        @if($data->rate>=$i)
                                                            <li><i class="fa fa-star"></i></li>
                                                        @else
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        @endif
                                                    @endfor
                                                </ul>
                                                <div class="rate-count">(<span>{{ $data->rate }}</span>)</div>
                                            </div>
                                            <p>{{ $data->review }}</p>
                                        </div>
                                    </div>
                                    <!--/ End Single Rating -->
                                @endforeach
                            </div>
                            <!--/ End Review -->
                        </div>
                        <!--/ End Reviews Tab -->
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Start Most Popular -->
    <div class="related-product pb-115">
        <div class="container">
            <div class="section-title mb-45 text-center">
                <h2>Related Products</h2>
            </div>
            <div class="related-product-active">
                    @foreach($product_detail->rel_prods as $data)
                        @if($data->id !==$product_detail->id)
                            <!-- Start Single Product -->
                        <div class="product-plr-1">
                            <div class="single-product-wrap">
                                <div class="product-img product-img-zoom mb-15">
                                    <a href="{{ route('product-detail',$data->slug) }}">
                                        @php
                                            $photo=explode(',',$data->photo);
                                        @endphp
                                        <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                        <span class="pro-badge left bg-red">{{ $data->discount }} % Off</span>
                                    </a>
                                    <div class="product-action-2 tooltip-style-2">
                                        <div class="product-action">
                                            <a data-toggle="modal" data-target="#modelExample" title="Quick View"
                                                href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to
                                                    Wishlist</span></a>
                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to
                                                    Compare</span></a>
                                        </div>
                                        <div class="product-action-2">
                                            <a title="{{ __('Add to Cart') }}"
                                                href="#">{{ __('ADD TO CART') }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content-wrap-2 text-center">
                                    <h3><a
                                            href="{{ route('product-detail',$data->slug) }}">{{ $data->title }}</a>
                                    </h3>
                                    <div class="product-price-2">
                                        @php
                                            $after_discount=($data->price-(($data->discount*$data->price)/100));
                                        @endphp
                                        <span class="old">{{ number_format($data->price,2) }} $</span>
                                        <span>{{ number_format($after_discount,2) }} $</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap-2 product-content-position text-center">
                                    <h3><a
                                            href="{{ route('product-detail',$data->slug) }}">{{ $data->title }}</a>
                                    </h3>
                                    <div class="data-price-2">
                                        @php
                                            $after_discount=($data->price-($data->price*$data->discount)/100);
                                        @endphp
                                        <span class="new-price">{{ number_format($after_discount,2) }} $</span>
                                        <del class="old-price">{{ number_format($data->price,2) }} $</del>
                                    </div>
                                    <div class="pro-add-to-cart">
                                        <a title="{{ __('Add to Cart') }}"
                                            href="{{ route('add-to-cart',$data->slug) }}"><i
                                                class="icon-basket"></i></a>
                                        <a title="Wishlist"
                                            href="{{ route('add-to-wishlist',$data->slug) }}"><i
                                                class="icon-heart"></i></a>
                                        <a title="Quick View" data-toggle="modal" data-target="#{{ $data->slug }}"><i
                                                class="icon-size-fullscreen icons"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <!-- End Single Product -->
                        @endif
                    @endforeach
            </div>
        </div>
    </div>
    <!-- End Most Popular Area -->



    @endsection
