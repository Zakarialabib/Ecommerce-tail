@extends('frontend.layouts.master')

@section('title','DropshippingSupplier || Login Page')

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumb-area bg-gray">
		<div class="container">
			<div class="breadcrumb-content text-center">
				<ul >
                    <li><a href="{{route('home')}}">{{ __('Home')}}<i class="ti-arrow-right"></i></a></li>
                    <li class="active"><a href="javascript:void(0);">{{ __('Login')}}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
            
    <!-- Shop Login -->
    <section class="login-register-area pt-115 pb-120">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-6 offset-lg-3 col-12">
                    <div class="login-form">
                        <h2>{{ __('Login')}}</h2>
                        <p>{{ __("We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!")}}</p>
                        <!-- Form -->
                        <form class="form" method="post" action="{{route('login.submit')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>{{ __('Your Email')}}<span>*</span></label>
                                        <input type="email" name="email" placeholder="" required="required" value="{{old('email')}}">
                                        @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>{{ __('Your Password')}}<span>*</span></label>
                                        <input type="password" name="password" placeholder="" required="required" value="{{old('password')}}">
                                        @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group login-btn">
                                        <button class="btn" type="submit">{{ __('Login')}}</button>
                                        <a href="{{route('register.form')}}" class="btn">{{ __('Register')}}</a>
                                    </div>
                                </div>
                                 <div class="col-lg-6 col-12">
                                      <div class="form-group login-btn">
                                        <a href="{{route('login.redirect','facebook')}}" class="btn btn-facebook"><i class="ti-facebook"></i></a>
                                        <a href="{{route('login.redirect','github')}}" class="btn btn-github"><i class="ti-github"></i></a>
                                        <a href="{{route('login.redirect','google')}}" class="btn btn-google"><i class="ti-google"></i></a>
                                      </div>
                                </div>
                                 <div class="col-12">
                                    <div class="form-group login-btn">
                                        <div class="checkbox">
                                            <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">{{ __('Remember me')}}</label>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <a class="lost-pass" href="{{ route('password.reset') }}">
                                                {{ __('Lost your password')}}?
                                            </a>
                                        @endif
                                     </div>
                                </div>
                            </div>
                        </form>
                        <!--/ End Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Login -->
@endsection
@push('styles')
<style>
    .shop.login .form .btn{
        margin-right:0;
    }
    .btn-facebook{
        background:#39579A;
    }
    .btn-facebook:hover{
        background:#073088 !important;
    }
    .btn-github{
        background:#444444;
        color:white;
    }
    .btn-github:hover{
        background:black !important;
    }
    .btn-google{
        background:#ea4335;
        color:white;
    }
    .btn-google:hover{
        background:rgb(243, 26, 26) !important;
    }
</style>
@endpush