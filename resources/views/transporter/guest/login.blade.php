@extends('layouts.transporter.app')

@section('head_css')
@endsection
@section('content')
    @include('layouts.transporter.head-web-menu')
    <main>
        <section class="join_network_main trans_login_main position-relative">
            <div class="container">
                <div class="position-relative text-center">
                    <h1 class="banner_newtext d-block text-center" style="font-size:30px">Transporter login</h1>
                    <p>Login to your account</p>
                </div>
                <form class="trans_login_blog" action="{{ route('transporter.login_post') }}" name="form_login" id="form_login" method="post" autocomplete="off">
                    @csrf
                    <input type="hidden" name="unsub" value="{{ request()->get('unsub') }}">
                    <a href="{{route('transporter.home')}}" class="backtologin">
                        <svg width="7" height="13" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 11.5L1 6.5L6 1.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>Back </a>
                    <div class="signnetwork">
                        <!-- Display general error message -->
                        @if ($errors->has('general'))
                            <span class="login-error" id="general-error" style="margin: -20px 0px 10px 0px !important;text-align:center !important;">{{ $errors->first('general') }}</span>
                        @endif
                        <div class="row m-0">
                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Enter your email address" />
                                @if ($errors->has('email'))
                                    <span class="login-error">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-12 eyeicon">
                                <input type="password" id="password" name="password" class="form-control no_margin" placeholder="Enter your password">
                                <i class="fas fa-eye" id="passwordIcon"></i>
                                <a href="#" id="togglePassword"></a>
                                @if ($errors->has('password'))
                                    <span class="login-error">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group text-right">
                                    <a href="{{ route('transporter.forgot_password') }}" class="manual_link d-inline-block">Forgot password</a>
                                </div>
                            </div>
                        </div>
                        <div class="btngroup">
                            <button type="submit" class="getqt_btnincld">Log in 
                                <svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.4848 1.62323L8.35854 8.49696L1.4848 15.3707" stroke="white" stroke-width="2.06212" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <img src="{{asset('assets/web/images/home/trans_account_img.png')}}" alt="image" class="bgright_img" />
        </section>
    </main>
    @include('layouts.web.footer')
@endsection
@section('script')
<script src="{{asset('assets/web/js/login.js')}}"></script>
@endsection
