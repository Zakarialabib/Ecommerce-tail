<header class="header-area section-padding-1">
    <div class="container-fluid">
        <div class="header-large-device">
            <div class="header-top header-top-ptb-1 border-bottom-1">
                <div class="row">
                    <div class="col-xl-4 col-lg-5">
                        <div class="header-offer-wrap">
                            <p><i class="icon-paper-plane"></i> {{ __('FREE SHIPPING world wide for all orders over')}} <span>$199</span></p>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="header-top-right">
                            <div class="same-style-wrap">
                                <div class="same-style same-style-border track-order">
                                    <a href="{{route('order.track')}}">{{ __('Track Order')}}</a>
                                </div>
                            
                  
                                <div class="same-style same-style-border language-wrap">

                                          <a class="language-dropdown-active" href="#">{{$language_default->name}} <i class="icon-arrow-down"></i></a>
                
                                          <div class="language-dropdown">
                                            @if(count($languages) > 1)
                                            @foreach($languages as $language)
                                                @if(\Illuminate\Support\Facades\App::getLocale() !== $language->code)
                                                    <ul>
                                                        <li><a href="{{route('change_language', $language->code)}}" title="{{$language->name}}">{{$language->name}}</a></li>
                                                    </ul>
                                                @endif
                                            @endforeach
                                            @endif
                                        </div>

                                </div>
                                <div class="same-style same-style-border currency-wrap">
                                    <a class="currency-dropdown-active" href="#">{{ $currentCurrency->sign }} {{ $currentCurrency->name }} <i class="icon-arrow-down"></i></a>
                                    <div class="currency-dropdown">
                                        <ul>
                                            @foreach ($currencies as $currency)
                                            <li> <a href="{{ route('changeCurrency', $currency->id) }}" class="{{ $currency->id == $currentCurrency->code ? 'active' : '' }}">{{ $currency->name }}</a></li>
                                            @endforeach
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
                      
                        <div class="logo">
                            <a href="{{route('home')}}"><img src="{{asset($settings->logo)}} " alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="main-menu main-menu-padding-1 main-menu-lh-1">
                            <nav>
                                <ul>
                                    <li><a href="{{route('home')}}">{{__('HOME')}} </a>
                                    </li>
                                    <li><a href="{{route('product-grids')}}">{{__('SHOP')}} </a>
                                        <ul class="mega-menu-style mega-menu-mrg-1">
                                            <li>
                                                {{Helper::getHeaderCategory()}}

                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">{{__('PAGES')}} </a>
                                        <ul class="sub-menu-style">
                                            <li class="{{Request::path()=='about-us' ? 'active' : ''}}"><a href="{{route('about-us')}}">{{ __('About Us')}}</a></li>
                                            <li class="@if(Request::path()=='product-grids'||Request::path()=='product-lists')  active  @endif"><a href="{{route('product-grids')}}">{{ __('Catalogue')}}</a></li>												
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
                            @guest
                            <div class="same-style-2">
                                <a href="{{route('login.form')}}"><i class="icon-user"></i></a>

                            </div>
                            @endauth
                            @auth
                            <div class="same-style-2">
                                <a href="{{route('admin')}}"><i class="icon-user"></i></a>
                            </div>
                            @endauth
                            <div class="same-style-2">
                                <a href="{{route('wishlist')}}"><i class="icon-heart"></i><span class="pro-count red">
                                   @if (Helper::getAllProductFromWishlist())
                                   {{count(Helper::getAllProductFromWishlist())}}
                                   @else
                                       0
                                   @endif
                                </span></a>
                            </div>
                            <div class="same-style-2 header-cart">
                                <a class="cart-active" href="#">
                                    <i class="icon-basket-loaded"></i>
                                    <span class="pro-count red">  
                                        @if (Helper::getAllProductFromCart())
                                        @foreach(Helper::getAllProductFromCart() as $data)
                                        {{$data->quantity}} 
                                        @endforeach  
                                        @else
                                            0
                                        @endif
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-small-device small-device-ptb-2">
            <div class="row align-items-center">
                <div class="col-5 col-lg-3 col-md-5">
                    <div class="mobile-logo">
                        <a href="{{route('home')}}">
                            <img alt="" style="width:100%" src="{{asset($settings->logo)}}">
                        </a>
                    </div>
                </div>
                <div class="col-7">
                    <div class="header-action header-action-flex">
                        @guest
                        <div class="same-style-2">
                            <a href="{{route('login.form')}}"><i class="icon-user"></i></a>
                        </div>
                        @endauth
                        @auth
                        <div class="same-style-2">
                            <a href="{{route('admin')}}"><i class="icon-user"></i></a>
                        </div>
                        @endauth
                        <div class="same-style-2">
                            <a href="{{route('wishlist')}}"><i class="icon-heart"></i><span class="pro-count red">                                  
                                @if (Helper::getAllProductFromWishlist())
                                {{count(Helper::getAllProductFromWishlist())}}
                                @else
                                    0
                                @endif                            
                            </span></a>
                        </div>
                        <div class="same-style-2 header-cart">
                            <a class="cart-active" href="#">
                                <i class="icon-basket-loaded"></i>              
                                <span class="pro-count red">
                                        @if (Helper::getAllProductFromCart())
                                        @foreach(Helper::getAllProductFromCart() as $data)
                                        {{$data->quantity}} 
                                        @endforeach 
                                        @else
                                            0
                                        @endif
                                    </span>
                                </span>
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
            <h3>{{ __('Shopping Cart')}}</h3>
            @auth
            <ul>
                @foreach(Helper::getAllProductFromCart() as $data)
                <li class="single-product-cart">
                    <div class="cart-img">
                        @php
                            $photo=explode(',',$data->product['photo']);
                        @endphp
                        <a href="{{route('product-detail',$data->product['slug'])}}"><img src="{{$photo[0]}}" data-src="{{$photo[0]}}" alt="{{$data->product['title']}}" alt=""></a>
                    </div>
                    <div class="cart-title">
                        <h4><a href="{{route('product-detail',$data->product['slug'])}}">{{$data->product['title']}}</a></h4>
                        <span> {{$data->quantity}} x {{ Helper::showCurrencyPrice($data->price,2) }}</span>
                    </div>
                    <div class="cart-delete">
                        <a href="{{route('cart-delete',$data->id)}}">×</a>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="cart-total">
                <h4>{{ __('Subtotal')}}: <span>{{ Helper::showCurrencyPrice(Helper::totalCartPrice(),2) }}</span></h4>
            </div>
            @endauth
            <div class="cart-checkout-btn">
                <a class="btn-hover cart-btn-style" href="{{route('cart')}}">{{ __('View cart')}}</a>
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
                <p><i class="icon-paper-plane"></i> {{ __('FREE SHIPPING world wide for all orders over')}} <span>$199</span></p>
            </div>
            <div class="mobile-search mobile-header-padding-border-1">
                <form class="search-form" action="#">
                    <input type="text" placeholder="{{__('Search here')}}…">
                    <button class="button-search"><i class="icon-magnifier"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-padding-border-2">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="{{Request::path()=='home' ? 'active' : ''}}"><a href="{{route('home')}}">{{__('Home')}}</a></li>
                        <li class="menu-item-has-children "><a href="{{route('product-grids')}}">{{__('SHOP')}}</a>
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
                        <li class="menu-item-has-children"><a href="#">{{__('Pages')}}</a>
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
                    <a class="mobile-language-active" href="#">{{__('Language')}} <span><i class="icon-arrow-down"></i></span></a>
                    <div class="lang-curr-dropdown lang-dropdown-active">
                        <ul>
                            @if(count($languages) > 1)
                            @foreach($languages as $language)
                                @if(\Illuminate\Support\Facades\App::getLocale() !== $language->code)
                                    <ul>
                                        <li><a href="{{route('change_language', $language->code)}}" title="{{$language->name}}">{{$language->name}}</a></li>
                                    </ul>
                                @endif
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="single-mobile-header-info">
                    <a class="mobile-currency-active" href="#">{{__('Currency')}} <span><i class="icon-arrow-down"></i></span></a>
                    <div class="lang-curr-dropdown curr-dropdown-active">
                        <ul>
                            <li><a href="#">USD</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mobile-contact-info mobile-header-padding-border-4">
                <ul>
                    <li><i class="icon-phone "></i> {{$settings->phone}}</li>
                    <li><i class="icon-envelope-open "></i> {{$settings->email}}</li>
                    <li><i class="icon-home"></i> {{$settings->address}}</li>
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





