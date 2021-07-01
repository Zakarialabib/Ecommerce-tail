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
                                @php 
                                    $photo=explode(',',$product->photo);
                                // dd($photo);
                                @endphp
                                @foreach($photo as $data)
                                <div class="quickview-wrap mt-15">
                                    <div class="quickview-slide-active nav-style-6 slick-initialized slick-slider">
                                        <img src="{{$data}}" alt="{{$data}}">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-12 col-sm-12">
                        <div class="product-details-content quickview-content">
                            <h2>{{$product->title}}</h2>
                            <div class="product-ratting-review-wrap">
                                <div class="product-ratting-digit-wrap">
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
                                    <div class="product-digit">
                                        <span>({{$rate_count}}) Reviews</span>
                                    </div>
                                </div>
                                <div class="product-review-order">
                                    @if($product->stock >0)
                                    <span class="badge badge-success"><i class="fa fa-check-circle-o"></i> {{$product->stock}} {{ __('in stock')}}</span>
                                    @else 
                                    <span class="badge badge-danger"><i class="fa fa-times-circle-o text-danger"></i> {{$product->stock}} {{ __('out stock')}}</span>
                                    @endif
                                </div>
                            </div>
                            {!!$product->summary!!}
                            <div class="pro-details-price">
                                @if ($product->discount > 0) 
                                <span class="new-price">$ {{ Helper::showCurrencyPrice($product->price) }}</span>   
                                <span class="old-price">$ {{number_format($product->price + $product->price * $product->discount / 100)}}</span>
                                @else
                                <span class="new-price">$ {{ Helper::showCurrencyPrice($product->price) }}</span>
                                @endif
                            </div>
                            @if($product->size)
                                <div class="pro-details-size">
                                    <span>{{ __('Size')}}</span>
                                    <div class="pro-details-size-content">
                                        <ul>
                                            @php 
                                                $sizes=explode(',',$product->size);
                                                // dd($sizes);
                                            @endphp
                                            @foreach($sizes as $size)
                                            <li><a href="#" class="one">{{$size}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                             @endif
                            <div class="pro-details-quality">
                                <span>Quantity:</span>
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                                </div>
                            </div>
                            <div class="product-details-meta">
                                {{-- <ul>
                                    <p class="cat">Category :<a
                                        href="{{ route('product-cat',$product->cat_info['slug']) }}">{{ $product->cat_info['title'] }}</a>
                                </p>
                                @if($product->sub_cat_info)
                                    <p class="cat mt-1">Sub Category :<a
                                            href="{{ route('product-sub-cat',[$product->cat_info['slug'],$product->sub_cat_info['slug']]) }}">{{ $product->sub_cat_info['title'] }}</a>
                                    </p>
                                @endif
                                </ul> --}}
                            </div>
                            <div class="pro-details-action-wrap">
                                <div class="pro-details-add-to-cart">
                                    <a title="{{ __('Add to Cart')}}" href="{{route('add-to-cart',$product->slug)}}">{{ __('Add to Cart')}} </a>
                                </div>
                                <div class="pro-details-action">
                                    <a title="Add to Wishlist" href="{{route('add-to-wishlist',$product->slug)}}"><i class="icon-heart"></i></a>
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
