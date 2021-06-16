@extends('frontend.layouts.master')

@section('title','Login Page || leMotoShop')

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
    <div class="login-register-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active" data-toggle="tab" href="#lg1">
                                <h4> {{ __('Login')}} </h4>
                            </a>
                            <a data-toggle="tab" href="#lg2">
                                <h4> register </h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form class="form" method="post" action="{{route('login.submit')}}">
                                            @csrf
                                            <input type="email" name="email" placeholder="email" required="required" value="{{old('email')}}">
                                            @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            <input type="password" name="password" placeholder="password" required="required" value="{{old('password')}}">
                                            @error('password')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input name="news" id="2" type="checkbox">
                                                    <label>{{ __('Remember me')}}</label>
                                                    @if (Route::has('password.request'))
                                                    <a href="{{ route('password.reset') }}">
                                                        {{ __('Lost your password')}}?
                                                    </a>
                                                    @endif
                                                </div>

                                                <a href="{{route('login.redirect','facebook')}}" class="btn btn-facebook"><i class="ti-facebook"></i></a>
                                                <a href="{{route('login.redirect','github')}}" class="btn btn-github"><i class="ti-github"></i></a>
                                                <a href="{{route('login.redirect','google')}}" class="btn btn-google"><i class="ti-google"></i></a>

                                                <button type="submit">{{ __('Login')}}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="lg2" class="tab-pane">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form class="form" method="post" action="{{route('register.submit')}}">
                                            @csrf
                                          
                                                <input type="text" name="name" placeholder="{{ __('Your Name')}}" required="required" value="{{old('name')}}">
                                                @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                          
                                                        <input type="text"  name="email" placeholder="{{ __('Your Email')}}" required="required" value="{{old('email')}}">
                                                        @error('email')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                             
                                                        <input type="password"  name="password" placeholder="{{ __('Your Password')}}" required="required" value="{{old('password')}}">
                                                        @error('password')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                              
                                                        <input type="password"  name="password_confirmation" placeholder="{{ __('Confirm Password')}}" required="required" value="{{old('password_confirmation')}}">
                                                        @error('password_confirmation')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                 
                                                <div class="button-box">
                                                        <button class="btn" type="submit">{{ __('Register')}}</button>                                               
                                                        <a href="{{route('login.redirect','facebook')}}" class="btn btn-facebook"><i class="ti-facebook"></i></a>
                                                        <a href="{{route('login.redirect','github')}}" class="btn btn-github"><i class="ti-github"></i></a>
                                                        <a href="{{route('login.redirect','google')}}" class="btn btn-google"><i class="ti-google"></i></a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
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