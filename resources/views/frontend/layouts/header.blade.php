<header class="version_1">
    <div class="layer"></div><!-- Mobile menu overlay mask -->
    <div class="main_header">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
                    <div id="logo">
                        @php
                        $settings=DB::table('settings')->get();
                         @endphp                    
                        <a href="{{route('home')}}"><img src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="logo"  width="100" height="35"></a>
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
                            <li class="{{Request::path()=='home' ? 'active' : ''}}"><a href="{{route('home')}}">{{ __('Home')}}</a></li>
                            <li class="{{Request::path()=='about-us' ? 'active' : ''}}"><a href="{{route('about-us')}}">{{ __('About Us')}}</a></li>
                            <li class="@if(Request::path()=='product-grids'||Request::path()=='product-lists')  active  @endif"><a href="{{route('product-grids')}}">{{ __('Products')}}</a></li>												
                                {{Helper::getHeaderCategory()}}
                            <li class="{{Request::path()=='blog' ? 'active' : ''}}"><a href="{{route('blog')}}">{{ __('Blog')}}</a></li>									
                            <li class="{{Request::path()=='contact' ? 'active' : ''}}"><a href="{{route('contact')}}">{{ __('Contact Us')}}</a></li>
                        </ul>
                    </div>
                    <!--/main-menu -->
                </nav>
                <div class="col-xl-2 col-lg-1 d-lg-flex align-items-center justify-content-end text-right">
                    @php
                    $settings=DB::table('settings')->get();
                    @endphp
                    @foreach($settings as $data)
                    <a class="phone_top" href="tel:{{$data->phone}}">
                   <strong><span>Need Help?</span> {{$data->phone}} </strong></a> 
                    @endforeach
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
                                                @foreach(Helper::getAllCategory() as $cat)
                                                <li><a href=" ">{{$cat->title}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
                    <div class="custom-search-input">
                        <form method="POST" action="{{route('product.search')}}">
                            @csrf
                            <input type="text" name="search"  placeholder="{{ __('Search Products here')}}...">
                            <button class="btnn" type="submit"><i class="header-icon_search_custom"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-2 col-md-3">
                    <ul class="top_tools">
                        <li>
                            <div class="dropdown dropdown-cart">
                                <a href="{{route('cart')}}" class="cart_bt">{{ __('Cart')}} </a>
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
                                        <a href="{{route('cart')}}" class="btn_1 outline">{{ __('Cart')}}</a><a href="{{route('checkout')}}" class="btn_1">{{ __('Checkout')}}</a>
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
                                <a href="{{route('wishlist')}}" class="wishlist"><span class="total-count">{{Helper::wishlistCount()}}</span></a>
                               
                                <div class="dropdown-menu">
                                    <span>{{count(Helper::getAllProductFromWishlist())}} Items</span>

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
                                            <a href="{{route('order.track')}}"><i class="ti-truck"></i>{{ __('Track Order')}}</a>
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
        <div class="search_mob_wp">
            <input type="text" class="form-control" placeholder="Search over 10.000 products">
            <input type="submit" class="btn_1 full-width" value="Search">
        </div>
        <!-- /search_mobile -->
    </div>
    <!-- /main_nav -->
</header>
<!-- /header -->