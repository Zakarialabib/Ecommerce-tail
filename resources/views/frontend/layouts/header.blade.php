<header class="header-area section-padding-1">
    <div class="container-fluid">
        <div class="header-large-device">
            <div class="header-top header-top-ptb-1 border-bottom-1">
                <div class="row">
                    <div class="col-xl-4 col-lg-5">
                        <div class="header-offer-wrap">
                            <p><i class="icon-paper-plane"></i> FREE SHIPPING world wide for all orders over <span>$199</span></p>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="header-top-right">
                            <div class="same-style-wrap">
                                <div class="same-style same-style-border track-order">
                                    <a href="{{route('order.track')}}">{{ __('Track Order')}}</a>
                                </div>
                                <div class="same-style same-style-border language-wrap">
                                    <a class="language-dropdown-active" href="#">English <i class="icon-arrow-down"></i></a>
                                    <div class="language-dropdown">
                                        <ul>
                                            <li><a href="#">English</a></li>
                                            <li><a href="#">French</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="same-style same-style-border currency-wrap">
                                    <a class="currency-dropdown-active" href="#">US Dollar <i class="icon-arrow-down"></i></a>
                                    <div class="currency-dropdown">
                                        <ul>
                                            <li><a href="#">USD</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="social-style-1 social-style-1-mrg">
                                <a href="#"><i class="icon-social-twitter"></i></a>
                                <a href="#"><i class="icon-social-facebook"></i></a>
                                <a href="#"><i class="icon-social-instagram"></i></a>
                                <a href="#"><i class="icon-social-youtube"></i></a>
                                <a href="#"><i class="icon-social-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2">
                        @php
                        $settings=DB::table('settings')->get();
                         @endphp    
                        <div class="logo">
                            <a href="{{route('home')}}"><img src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="main-menu main-menu-padding-1 main-menu-lh-1">
                            <nav>
                                <ul>
                                    <li><a href="{{route('home')}}">HOME </a>
                                    </li>
                                    <li><a href="">SHOP </a>
                                        <ul class="mega-menu-style mega-menu-mrg-1">
                                            <li>
                                                <ul>
                                                    <li>
                                                        <a class="dropdown-title" href="#">Shop Layout</a>
                                                        <ul>
                                                            <li><a href="">standard style</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-title" href="#">Products Layout</a>
                                                        <ul>
                                                            <li><a href="product-details.html">tab style 1</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href=""><img src="assets/images/banner/banner-12.png" alt=""></a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">PAGES </a>
                                        <ul class="sub-menu-style">
                                            <li class="{{Request::path()=='about-us' ? 'active' : ''}}"><a href="{{route('about-us')}}">{{ __('About Us')}}</a></li>
                                            <li class="@if(Request::path()=='product-grids'||Request::path()=='product-lists')  active  @endif"><a href="{{route('product-grids')}}">{{ __('Products')}}</a></li>												
                                                {{Helper::getHeaderCategory()}}
                                        </ul>
                                    </li>
                                    <li class="{{Request::path()=='blog' ? 'active' : ''}}"><a href="{{route('blog')}}">{{ __('Blog')}}</a></li>									
                                    <li class="{{Request::path()=='contact' ? 'active' : ''}}"><a href="{{route('contact')}}">{{ __('Contact Us')}}</a></li>                            </ul>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3">
                        <div class="header-action header-action-flex header-action-mrg-right">
                            <div class="same-style-2 header-search-1">
                                <a class="search-toggle" href="#">
                                    <i class="icon-magnifier s-open"></i>
                                    <i class="icon_close s-close"></i>
                                </a>
                                <div class="search-wrap-1">
                                        <form method="POST" action="{{route('product.search')}}">
                                            @csrf
                                            <input type="text" name="search"  placeholder="{{ __('Search Products here')}}...">
                                            <button class="button-search"  type="submit"><i class="icon-magnifier"></i></button>
                                        </form>
                                </div>
                            </div>
                            <div class="same-style-2">
                                <a href="{{route('login.form')}}"><i class="icon-user"></i></a>
                            </div>
                            <div class="same-style-2">
                                <a href="{{route('wishlist')}}"><i class="icon-heart"></i><span class="pro-count red">03</span></a>
                            </div>
                            <div class="same-style-2 header-cart">
                                <a class="cart-active" href="#">
                                    <i class="icon-basket-loaded"></i><span class="pro-count red">02</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-small-device small-device-ptb-1">
            <div class="row align-items-center">
                <div class="col-5">
                    <div class="mobile-logo">
                        @php
                        $settings=DB::table('settings')->get();
                         @endphp    
                        <a href="{{route('home')}}">
                            <img alt="" src="@foreach($settings as $data) {{$data->logo}} @endforeach">
                        </a>
                    </div>
                </div>
                <div class="col-7">
                    <div class="header-action header-action-flex">
                        <div class="same-style-2">
                            <a href="{{route('login.form')}}"><i class="icon-user"></i></a>
                        </div>
                        <div class="same-style-2">
                            <a href="{{route('wishlist')}}"><i class="icon-heart"></i><span class="pro-count red">03</span></a>
                        </div>
                        <div class="same-style-2 header-cart">
                            <a class="cart-active" href="#">
                                <i class="icon-basket-loaded"></i><span class="pro-count red">02</span>
                            </a>
                        </div>
                        <div class="same-style-2 main-menu-icon">
                            <a class="mobile-header-button-active" href="#"><i class="icon-menu"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- mini cart start -->
<div class="sidebar-cart-active">
    <div class="sidebar-cart-all">
        <a class="cart-close" href="#"><i class="icon_close"></i></a>
        <div class="cart-content">
            <h3>Shopping Cart</h3>
            <ul>
                <li class="single-product-cart">
                    <div class="cart-img">
                        <a href="#"><img src="assets/images/cart/cart-1.jpg" alt=""></a>
                    </div>
                    <div class="cart-title">
                        <h4><a href="#">Simple Black T-Shirt</a></h4>
                        <span> 1 × $49.00	</span>
                    </div>
                    <div class="cart-delete">
                        <a href="#">×</a>
                    </div>
                </li>
            </ul>
            <div class="cart-total">
                <h4>Subtotal: <span>$170.00</span></h4>
            </div>
            <div class="cart-checkout-btn">
                <a class="btn-hover cart-btn-style" href="{{route('cart')}}">view cart</a>
                <a class="no-mrg btn-hover cart-btn-style" href="{{route('checkout')}}">{{ __('Checkout')}}</a>
            </div>
        </div>
    </div>
</div>
<!-- Mobile menu start -->
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="clickalbe-sidebar-wrap">
        <a class="sidebar-close"><i class="icon_close"></i></a>
        <div class="mobile-header-content-area">
            <div class="header-offer-wrap mobile-header-padding-border-4">
                <p><i class="icon-paper-plane"></i> FREE SHIPPING world wide for all orders over <span>$199</span></p>
            </div>
            <div class="mobile-search mobile-header-padding-border-1">
                <form class="search-form" action="#">
                    <input type="text" placeholder="Search here…">
                    <button class="button-search"><i class="icon-magnifier"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-padding-border-2">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="{{Request::path()=='home' ? 'active' : ''}}"><a href="{{route('home')}}">Home</a></li>
                        <li class="menu-item-has-children "><a href="#">shop</a>
                            <ul class="dropdown">                               
                                <li class="menu-item-has-children"><a href="#">{{ __('All Category')}}</a>
                                    <ul class="dropdown">
                                        @foreach(Helper::getAllCategory() as $cat)
                                        <li><a href="">{{$cat->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li class="{{Request::path()=='about-us' ? 'active' : ''}}"><a href="{{route('about-us')}}">{{ __('About Us')}}</a></li>
                                <li class="@if(Request::path()=='product-grids'||Request::path()=='product-lists')  active  @endif"><a href="{{route('product-grids')}}">{{ __('Products')}}</a></li>												
                                    {{Helper::getHeaderCategory()}}
                        </li>
                        <li class="{{Request::path()=='blog' ? 'active' : ''}}"><a href="{{route('blog')}}">{{ __('Blog')}}</a></li>									
                        <li class="{{Request::path()=='contact' ? 'active' : ''}}"><a href="{{route('contact')}}">{{ __('Contact Us')}}</a></li>                            </ul>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap mobile-header-padding-border-3">
                <div class="single-mobile-header-info">
                    <a href="{{route('order.track')}}"><i class="lastudioicon-pin-3-2"></i> {{ __('Track Order')}} </a>
                </div>
                <div class="single-mobile-header-info">
                    <a class="mobile-language-active" href="#">Language <span><i class="icon-arrow-down"></i></span></a>
                    <div class="lang-curr-dropdown lang-dropdown-active">
                        <ul>
                            <li><a href="#">English</a></li>
                            <li><a href="#">French</a></li>
                        </ul>
                    </div>
                </div>
                <div class="single-mobile-header-info">
                    <a class="mobile-currency-active" href="#">Currency <span><i class="icon-arrow-down"></i></span></a>
                    <div class="lang-curr-dropdown curr-dropdown-active">
                        <ul>
                            <li><a href="#">USD</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mobile-contact-info mobile-header-padding-border-4">
                @php
                $settings=DB::table('settings')->get();
                @endphp               
                <ul>
                    @foreach($settings as $data)
                    <li><i class="icon-phone "></i> {{$data->phone}}</li>
                    <li><i class="icon-envelope-open "></i> {{$data->email}}</li>
                    <li><i class="icon-home"></i> PO Box 1622 Colins Street West Australia</li>
                    @endforeach
                </ul>
            </div>
            <div class="mobile-social-icon">
                <a class="facebook" href="#"><i class="icon-social-facebook"></i></a>
                <a class="twitter" href="#"><i class="icon-social-twitter"></i></a>
                <a class="pinterest" href="#"><i class="icon-social-pinterest"></i></a>
                <a class="instagram" href="#"><i class="icon-social-instagram"></i></a>
            </div>
        </div>
    </div>
</div>

{{-- <header class="version_1">
    <div class="layer"></div><!-- Mobile menu overlay mask -->
    <div class="main_header">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
                    <div id="logo">
                                      
                        <a href=""><img src="" alt="logo"  width="100" height="35"></a>
                    </div>
                </div>
                <nav class="col-xl-7 col-lg-8">
                    <a class="open_close" href="javascript:void(0);">
                        <div class="hamburger hamburger--spin">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </a>
                    <!-- Mobile menu button -->
                    <div class="main-menu">
                        <div id="header_menu">
                            @php
                            $settings=DB::table('settings')->get();
                             @endphp  
                            <a href="{{route('home')}}"><img src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="" width="100" height="35"></a>
                            <a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
                        </div>
                        <ul>
                            <li class=""><a href="{{route('home')}}">{{ __('Home')}}</a></li>
                            <li class=""><a href="{{route('about-us')}}">{{ __('About Us')}}</a></li>
                            <li class=""><a href="{{route('product-grids')}}">{{ __('Products')}}</a></li>												
                                {{Helper::getHeaderCategory()}}
                            <li class="{{Request::path()=='blog' ? 'active' : ''}}"><a href="{{route('blog')}}">{{ __('Blog')}}</a></li>									
                            <li class="{{Request::path()=='contact' ? 'active' : ''}}"><a href="{{route('contact')}}">{{ __('Contact Us')}}</a></li>
                        </ul>
                    </div>
                    <!--/main-menu -->
                </nav>
                <div class="col-xl-2 col-lg-1 d-lg-flex align-items-center justify-content-end text-right">
                   
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /main_header -->

    <div class="main_nav Sticky">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <nav class="categories menu">
                        <ul class="clearfix">
                            <li><span>
                                    <a href="#">
                                        <span class="hamburger hamburger--spin">
                                            <span class="hamburger-box">
                                                <span class="hamburger-inner"></span>
                                            </span>
                                        </span>
                                        Categories
                                    </a>
                                </span>
                                <div id="menu">
                                    <ul>
                                        <li><span><a href="#0">{{ __('All Category')}}</a></span>
                                            <ul>
                                               
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
                   
                </div>
                <div class="col-xl-3 col-lg-2 col-md-3">
                    <ul class="top_tools">
                        <li>
                            <div class="dropdown dropdown-cart">
                                <a href="" class="cart_bt">{{ __('Cart')}} </a>
                                @auth
                                <div class="dropdown-menu">
                                    <ul>
                                        @foreach(Helper::getAllProductFromCart() as $data)
                                        @php
                                            $photo=explode(',',$data->product['photo']);
                                        @endphp
                                        <li>
                                            <a href="{{route('product-detail',$data->product['slug'])}}">
                                                <figure><img src="{{$photo[0]}}" data-src="{{$photo[0]}}" alt="{{$data->product['title']}}" width="50" height="50" class="lazy"></figure>
                                                <strong><span>{{$data->quantity}}x {{$data->product['title']}}</span>{{number_format($data->price,2)}}DH</strong>
                                            </a>
                                            <a href="{{route('cart-delete',$data->id)}}" class="action" title="Remove this item"><i class="ti-trash"></i></a>
                                        </li>
                                        @endforeach
                                       
                                    </ul>
                                    <div class="total_drop">
                                        <div class="clearfix"><strong>{{ __('Total')}}</strong><span>{{number_format(Helper::totalCartPrice(),2)}}DH</span></div>
                                        <a href="{{route('cart')}}" class="btn_1 outline">{{ __('Cart')}}</a><a href="" class="btn_1"></a>
                                    </div>
                                </div>
                                @endauth
                            </div>
                            <!-- /dropdown-cart-->
                        </li>
                        <li>
                            @php 
                            $total_prod=0;
                            $total_amount=0;
                            @endphp
                            @if(session('wishlist'))
                                    @foreach(session('wishlist') as $wishlist_items)
                                        @php
                                            $total_prod+=$wishlist_items['quantity'];
                                            $total_amount+=$wishlist_items['amount'];
                                        @endphp
                                    @endforeach
                            @endif
                            <div class="dropdown dropdown-wish">
                                <a href="{" class="wishlist"><span class="total-count">{{Helper::wishlistCount()}}</span></a>
                               
                                <div class="dropdown-menu">
                                    @auth
                                    <span>{{count(Helper::getAllProductFromWishlist())}} Items</span>
                                    @endauth
                                    <div class="clearfix"><strong>{{ __('Total')}}</strong><span>{{number_format(Helper::totalWishlistPrice(),2)}}DH</span></div>

                                    <a href="{{route('wishlist')}}" class="btn_1">{{ __('View Wishlist')}}</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown dropdown-access">
                                <a class="access_link"><span>{{ __('Account')}}</span></a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li>
                                            <a href=""><i class="ti-truck"></i></a>
                                        </li>
                                        @auth 
                                        @if(Auth::user()->role=='admin')
                                            <li>
                                                 <a href="{{route('admin')}}"  target="_blank"><i class="ti-user"></i>{{ __('Dashboard')}}</a></li>
                                        @else 
                                            <li>
                                                 <a href="{{route('user')}}"  target="_blank"><i class="ti-user"></i>{{ __('Dashboard')}}</a></li>
                                        @endif
                                        <li>
                                             <a href="{{route('user.logout')}}"><i class="ti-power-off"></i>{{ __('Logout')}}</a></li>
                                        @else
                                            <li>
                                                <a href="{{route('login.form')}}"><i class="ti-power-off"></i>{{ __('Login')}}</a></li>
                                            <li>
                                                <a href="{{route('register.form')}}"><i class="ti-power-off"></i>{{ __('Register')}}</a></li>
                                        @endauth
                                    </ul>
                                </div>
                            </div>
                            <!-- /dropdown-access-->
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="btn_search_mob"><span>{{ __('Search')}}</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /search_mobile -->
    </div>
    <!-- /main_nav -->
</header>
<!-- /header --> --}}
