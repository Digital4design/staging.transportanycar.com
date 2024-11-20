@extends('layouts.web.app')
@section('head_css')
@endsection
@section('content')
<style>
    .col-lg-12.forgot-link {
        margin-top: -7px;
    }

.great_job_sec h2 {
    font-size: 48px;
    text-align: center;
    margin-bottom: 0;
    color: #000;
}
.great_job_sec p.subheader {
    color: #777;
    font-size: 17px;
    text-align: center;
    max-width: 500px;
    margin: 10px auto;
}
.great_job_sec ul.checklist {
    border: 1px solid #DADADA;
    padding: 20px 20px;
    border-radius: 10px;
    max-width: 370px;
    margin: 30px auto 30px;
}
.great_job_sec .checklist li {
    font-size: 16px;
    margin: 15px 0;
    position: relative;
    padding-left: 27px;
    color: #000;
    font-weight: 400;   
}
.great_job_sec .checklist li:before {
    content: '';
    display: block;
    position: absolute;
    left: 0;
    top: 0;
    border-right: 4px solid #52D017;
    border-bottom: 4px solid #52D017;
    width: 12px;
    height: 20px;
    transform: rotate(45deg);
}
.trans_login_blog_sec p {
    font-size: 17px;
    text-align: center;
    color: #000;
}
.trans-login {
    color: #07F !important;
    text-align: center;
    display: block;
    text-decoration: underline !important;
    text-underline-offset: 7px;
    margin-top: -10px;
}
.signnetwork {
    border: 1px solid #DADADA !important;
}
@media(max-width: 580px){
    .trans-login {margin-top: 10px;}
    .signnetwork {
        max-width: 370px;
        margin: auto;
    }
    .col-lg-12.forgot-link {
        margin-bottom: -21px !important;
    }
    .great_job_sec p.subheader {
        font-size: 15px;
    }
    .great_job_sec .checklist li {  
        padding-left: 25px;    margin: 20px 0;    font-size: 15px;
    }
    .trans_login_blog_sec p {
        font-size: 16px;
    }
    .trans_login_blog .signnetwork {
        padding-top: 15px;
    }
    .great_job_sec_new {
    padding: 0 2px;
}
/* .trans_login_blog_sec {
    max-width: 366px;
} */

.great_job_sec ul.checklist {
    padding: 0px 20px;
}

}
</style>
@include('layouts.web.head-web-menu-without-mobile')
<main>
    <section class="join_network_main trans_login_main position-relative">
        <div class="container">
            @if (!session()->has('login_message'))
            <div class="position-relative text-center">
                <h1 class="banner_newtext d-block text-center">Your account</h1>
                <p>Login to your account</p>
            </div>
            @endif
            @if (session()->has('login_message'))
            <div class="great_job_sec_new">
            <div class="great_job_sec">
                <h2>Great news!</h2>
                <p class="subheader">Your job has been sent to our network of transport companies and you will start to receive quotes shortly.</p>
                <ul class="checklist">
                    <li>Start receiving quotes via email in minutes.</li>
                    <li>Choose the best quote for you based on price and feedback.</li>
                    <li>Accept the quote and arrange collection.</li>
                </ul>
                </div>
            </div>
            @endif
            <form class="trans_login_blog @if (session()->has('login_message')) trans_login_blog_sec @endif" action="{{ route('front.login_post') }}" name="form_login" id="form_login" method="post" autocomplete="off">
                @csrf
                <input type="hidden" name="unsub" value="{{ request()->get('unsub') }}">
                @if (!session()->has('login_message'))
                <a href="{{route('front.home')}}" class="backtologin">
                    <svg width="7" height="13" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 11.5L1 6.5L6 1.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>Back </a>
                @endif
                <div class="signnetwork">
                    @if ($errors->has('general'))
                        <span class="login-error" id="general-error" style="margin: -20px 0px 10px 0px !important;text-align:center !important;">{{ $errors->first('general') }}</span>
                    @endif
                    <div class="row m-0">
                        @if (session()->has('login_message'))
                        <div class="col-lg-12">
                            <p>It looks like you already have an account with us so please log in to manage your jobs.</p>
                        </div>
                        @endif
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="email" id="email" value="{{ session('login_email', old('email')) }}" placeholder="Enter your email address" />
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
                        <div class="col-lg-12 forgot-link">
                            <div class="form-group text-right">
                                <a href="{{route('front.forgot_password')}}" class="manual_link d-inline-block ">Forgot password</a>
                            </div>
                        </div>
                    </div>
                    <div class="btngroup">
                        <button type="submit" class="getqt_btnincld">Log in <svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.4848 1.62323L8.35854 8.49696L1.4848 15.3707" stroke="white" stroke-width="2.06212" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <img src="{{asset('assets/web/images/home/trans_account_img.png')}}" alt="image" class="bgright_img" />
        @if (!session()->has('login_message'))
        <a class="trans-login" href="{{ route('transporter.login') }}">Transporter login</a>
        @endif
    </section>
</main>
@endsection

@section('script')
   <script src="{{asset('assets/web/js/login.js')}}"></script>
@endsection
