@extends('layouts.transporter.dashboard.app')

@section('head_css')
<style>
    .add_to_wishlist {
        background: #999999;
        color:#F3F8FF;
        border-radius: 7px;
        font-size: 12px;
        line-height: 16px;
        font-weight: 500;
        padding: 8px 18px;
        display: inline-block;
    }    
    .add_to_wishlist:hover {
        background-color: #6c6969;
        color:#F3F8FF;
    }
    .content_wrap .label,
    .content_wrap .value {
        font-size: 15px;
        line-height: 20px;
    }
    .zoom-icon {
        left: 20px;
        top: 0;
    }
    .car-title {font-weight: 500;}
    .wishlist_wrap .label,
    .content_wrap .label {font-weight: 300;}

    .wishlist_wrap .value,
    .content_wrap .value {font-weight: 400;}
    
    .wishlist_wrap .value,
    .wishlist_wrap .label {font-size: 12px; line-height: 16px;}
    .wishlist_wrap .value.price {
        color:#52D017;
    }
    .wishlist_wrap .value.bid_count {
        color:#0356D6;
    }
    .car-content {
        font-size: 15px;
        line-height: 20px;
        font-weight: 400;
    }
    .left-content .img_wrap {
        max-width: 92px;
        width: 92px;
        flex: 0 0 92px;
        border-radius: 5px;
        overflow: hidden;
        display: inline-block;
    }
    .left-content .img_wrap + .car-content {
        flex: 0 0 calc(100% - 100px);
        max-width: calc(100% - 100px);
    }
    .back_btn {
        font-size: 18px;
        line-height: 24px;
        color:rgba(0,0,0,0.5);
    }
    .date {
        font-size: 12px;
        line-height: 16px;
        font-weight: 400;
        color:#5F5F5F;
    }
    @media screen and (min-width: 1680px) {
        .upper-left {
            flex: 0 0 41.666667%;
            max-width: 41.666667%;
            margin-bottom: 0!important;
        }
        .upper-right {
            flex: 0 0 58.333333%;
            max-width: 58.333333%;
            margin-top: 0!important;
        }
        .expiry,
        .delivery {
            flex: 0 0 50%;
            max-width:50%;
        }
        .left-content {
            flex: 0 0 25%;
            max-width: 25%;
        }
        .right-content {
            flex: 0 0 75%;
            max-width: 75%;
        }
    }
    @media screen and (min-width: 1024px) {.add_to_wishlist {font-size: 16px; padding: 9px 18px;}}
    @media screen and (min-width: 768px) {
        .content_wrap {margin-left: -15px; margin-right: -15px;}
        .place_bid_wrap {width: auto;}
        .add_to_wishlist {          
            font-size: 14px;
            line-height: 24px;
            padding: 6px 18px;
        } 
        .wishlist_wrap .value,
        .wishlist_wrap .label {
            font-size: 14px;
        } 
    }
    @media screen and (max-width: 767px) {
        .place_bid_wrap {width: 100%;}
        .place_bid_btn {width: 100%; font-size: 20px!important; line-height: 37px!important;}
        .content_wrap {
            bordeR:1px solid #DADADA;
            border-radius: 8px;
            padding: 20px 5px;    
            /* margin: 0;         */
        }
        .wishlist_wrap .label, .content_wrap .label {
            min-width: 30%;
        }
        .lower-left {margin: 0;}
        /* .expiry,
        .delivery {
            flex-direction: column;
            align-items: flex-start!important;
        }
        .expiry .value,
        .delivery .value {margin:0!important;} */
    }
    @media screen and (max-width: 575px) {
        .wishlist_wrap .label, .content_wrap .label {
            min-width: 40%;
        }
    }
</style>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/globle.css') }}" />
@endsection


@section('content')
    <div id="wrapper">
        <!-- SIDEBAR -->
        @include('layouts.transporter.dashboard.sidebar')
        <div id="page-content-wrapper">
            @include('layouts.transporter.dashboard.top_head')
           
            <div class="content_container adjust_spacing">
                <div class="inner_content set_banner_position">
                    <div class="wd-white-box">
                      
                        <div class="back_btn mb-3 row mx-0 align-items-center">
                            <svg width="7" height="13" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                                <g opacity="0.5">
                                    <path d="M6 11.5L1 6.5L6 1.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                            </svg>
                            Back to find jobs
                        </div>
                        <div class="row">
                            <div class="col-12 date mb-3">Posted 1 min ago</div>
                        </div>
                        <div class="wrapper row">
                            <div class="left-content row mx-0 align-items-start justify-content-between col-xl-4 mb-3 mb-xl-0">
                                <div class="img_wrap">
                                    <img src="https://imgd.aeplcdn.com/370x208/n/cw/ec/139651/curvv-exterior-right-front-three-quarter.jpeg?isig=0&q=80" alt="" width="92" height="57" class="img-fluid" />
                                    <svg class="position-absolute zoom-icon" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1 4.46454C1.00208 2.81004 2.25546 1.38727 3.99372 1.06625C5.73198 0.745234 7.47105 1.61536 8.1475 3.14456C8.82395 4.67375 8.24941 6.43617 6.77521 7.35411C5.301 8.27205 3.33766 8.08988 2.08575 6.919C1.38943 6.26774 0.998849 5.38479 1 4.46454Z" stroke="#D9D9D9" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.03516 7.17249L8.99979 8.99999" stroke="#D9D9D9" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M3.84426 3.10517C3.68279 2.95441 3.42967 2.96308 3.2789 3.12455C3.12814 3.28602 3.13681 3.53913 3.29828 3.6899L3.84426 3.10517ZM4.44118 4.75706C4.60264 4.90783 4.85576 4.89915 5.00653 4.73768C5.1573 4.57621 5.14862 4.3231 4.98715 4.17233L4.44118 4.75706ZM4.98753 4.17233C4.82606 4.02157 4.57294 4.03024 4.42217 4.19171C4.27141 4.35318 4.28008 4.60629 4.44155 4.75706L4.98753 4.17233ZM5.58444 5.82422C5.74591 5.97499 5.99903 5.96631 6.1498 5.80484C6.30057 5.64338 6.29189 5.39026 6.13042 5.23949L5.58444 5.82422ZM4.98715 4.75706C5.14862 4.60629 5.1573 4.35318 5.00653 4.19171C4.85576 4.03024 4.60264 4.02157 4.44118 4.17233L4.98715 4.75706ZM3.29828 5.23949C3.13681 5.39026 3.12814 5.64338 3.2789 5.80484C3.42967 5.96631 3.68279 5.97499 3.84426 5.82422L3.29828 5.23949ZM4.44155 4.17233C4.28008 4.3231 4.27141 4.57621 4.42217 4.73768C4.57294 4.89915 4.82606 4.90783 4.98753 4.75706L4.44155 4.17233ZM6.13042 3.6899C6.29189 3.53913 6.30057 3.28602 6.1498 3.12455C5.99903 2.96308 5.74591 2.95441 5.58444 3.10517L6.13042 3.6899ZM3.29828 3.6899L4.44118 4.75706L4.98715 4.17233L3.84426 3.10517L3.29828 3.6899ZM4.44155 4.75706L5.58444 5.82422L6.13042 5.23949L4.98753 4.17233L4.44155 4.75706ZM4.44118 4.17233L3.29828 5.23949L3.84426 5.82422L4.98715 4.75706L4.44118 4.17233ZM4.98753 4.75706L6.13042 3.6899L5.58444 3.10517L4.44155 4.17233L4.98753 4.75706Z" fill="#D9D9D9"/>
                                    </svg>
                                </div>
                                <div class="car-content">
                                    <div class="car-title">BMW 1 Series</div>
                                    <div>
                                        <svg width="10" height="16" viewBox="0 0 16 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-1">
                                            <path d="M8.00002 0.16C7.5361 0.15999 7.16001 0.536063 7.16 0.999982C7.15999 1.4639 7.53606 1.83999 7.99998 1.84L8.00002 0.16ZM10.6782 1.5264L10.9964 0.748992L10.9961 0.748881L10.6782 1.5264ZM13.8198 4.08L13.1238 4.5503L13.1243 4.55106L13.8198 4.08ZM15 7.916H15.84L15.84 7.91465L15 7.916ZM12.949 12.8062L12.271 12.3103C12.2608 12.3243 12.251 12.3386 12.2417 12.3531L12.949 12.8062ZM10.9162 15.98L10.2088 15.5269L10.2059 15.5316L10.9162 15.98ZM8 20.6L7.2901 21.049C7.44414 21.2926 7.71225 21.4401 8.0004 21.44C8.28855 21.4399 8.55652 21.292 8.71033 21.0484L8 20.6ZM5.0838 15.9898L5.79371 15.5407L5.79151 15.5373L5.0838 15.9898ZM3.051 12.8104L3.75871 12.3579C3.74942 12.3434 3.73969 12.3291 3.72952 12.3152L3.051 12.8104ZM1 7.9202L0.16 7.91937V7.9202H1ZM2.1802 4.08L2.87569 4.55106L2.87573 4.551L2.1802 4.08ZM5.3218 1.5306L5.63951 2.3082L5.64092 2.30762L5.3218 1.5306ZM8.00124 1.84C8.46516 1.83932 8.84068 1.46268 8.84 0.998763C8.83932 0.534845 8.46268 0.159318 7.99876 0.160001L8.00124 1.84ZM8 9.38182C7.53608 9.38182 7.16 9.7579 7.16 10.2218C7.16 10.6857 7.53608 11.0618 8 11.0618V9.38182ZM8 4.77022C7.53608 4.77022 7.16 5.1463 7.16 5.61022C7.16 6.07414 7.53608 6.45022 8 6.45022V4.77022ZM8.02068 11.07C8.48445 11.0585 8.85116 10.6733 8.83973 10.2095C8.82829 9.74574 8.44306 9.37903 7.97928 9.39046L8.02068 11.07ZM5.95582 9.09437L6.67981 8.66841L5.95582 9.09437ZM5.95582 6.75585L5.23184 6.32989L5.95582 6.75585ZM7.97928 6.45975C8.44306 6.47119 8.82829 6.10449 8.83973 5.64071C8.85116 5.17693 8.48446 4.7917 8.02068 4.78026L7.97928 6.45975ZM7.99998 1.84C8.8094 1.84002 9.61108 1.99759 10.3603 2.30392L10.9961 0.748881C10.0451 0.360035 9.02746 0.160022 8.00002 0.16L7.99998 1.84ZM10.36 2.30381C11.4829 2.76336 12.4445 3.54504 13.1238 4.5503L14.5158 3.6097C13.6508 2.32959 12.4262 1.3342 10.9964 0.748992L10.36 2.30381ZM13.1243 4.55106C13.7974 5.54482 14.1581 6.7171 14.16 7.91735L15.84 7.91465C15.8375 6.37945 15.3762 4.88002 14.5153 3.60894L13.1243 4.55106ZM14.16 7.916C14.16 8.72866 14.0336 9.33192 13.7568 9.95594C13.4676 10.608 13.0038 11.3082 12.271 12.3103L13.627 13.3021C14.3614 12.298 14.9231 11.4701 15.2926 10.6371C15.6745 9.77608 15.84 8.93734 15.84 7.916H14.16ZM12.2417 12.3531L10.2089 15.5269L11.6235 16.4331L13.6563 13.2593L12.2417 12.3531ZM10.2059 15.5316L7.28967 20.1516L8.71033 21.0484L11.6265 16.4284L10.2059 15.5316ZM8.7099 20.151L5.7937 15.5408L4.3739 16.4388L7.2901 21.049L8.7099 20.151ZM5.79151 15.5373L3.75871 12.3579L2.34329 13.2629L4.37609 16.4423L5.79151 15.5373ZM3.72952 12.3152C2.99627 11.3105 2.5324 10.6102 2.24307 9.95836C1.96633 9.33489 1.84 8.73275 1.84 7.9202H0.16C0.16 8.94165 0.325572 9.7794 0.707534 10.6399C1.0769 11.4721 1.63853 12.2999 2.37248 13.3056L3.72952 12.3152ZM1.84 7.92103C1.84119 6.71953 2.20189 5.54586 2.87569 4.55106L1.48471 3.60894C0.622887 4.88135 0.161527 6.38255 0.16 7.91937L1.84 7.92103ZM2.87573 4.551C3.55555 3.54711 4.51715 2.76676 5.63951 2.3082L5.00409 0.752999C3.57488 1.33694 2.35036 2.33063 1.48467 3.609L2.87573 4.551ZM5.64092 2.30762C6.38988 2.00002 7.19157 1.84119 8.00124 1.84L7.99876 0.160001C6.97101 0.161514 5.95338 0.363125 5.00268 0.75358L5.64092 2.30762ZM8 11.0618C9.12389 11.0618 10.1624 10.4622 10.7243 9.48892L9.26942 8.64892C9.00758 9.10244 8.52368 9.38182 8 9.38182V11.0618ZM10.7243 9.48892C11.2863 8.5156 11.2863 7.31643 10.7243 6.34312L9.26942 7.18312C9.53126 7.63664 9.53126 8.1954 9.26942 8.64892L10.7243 9.48892ZM10.7243 6.34312C10.1624 5.3698 9.12389 4.77022 8 4.77022V6.45022C8.52368 6.45022 9.00758 6.7296 9.26942 7.18312L10.7243 6.34312ZM7.97928 9.39046C7.44715 9.40358 6.94973 9.12719 6.67981 8.66841L5.23184 9.52033C5.81113 10.5049 6.87865 11.0981 8.02068 11.07L7.97928 9.39046ZM6.67981 8.66841C6.40989 8.20964 6.40989 7.64058 6.67981 7.18181L5.23184 6.32989C4.65254 7.31448 4.65254 8.53574 5.23184 9.52033L6.67981 8.66841ZM6.67981 7.18181C6.94973 6.72303 7.44715 6.44664 7.97928 6.45975L8.02068 4.78026C6.87865 4.75212 5.81113 5.34529 5.23184 6.32989L6.67981 7.18181Z" fill="#52D017"></path>
                                        </svg>
                                        Brentwood, EC1V 2NX
                                    </div>
                                    <div>
                                        <svg width="10" height="16" viewBox="0 0 16 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-1">
                                            <path d="M8.00002 0.16C7.5361 0.15999 7.16001 0.536063 7.16 0.999982C7.15999 1.4639 7.53606 1.83999 7.99998 1.84L8.00002 0.16ZM10.6782 1.5264L10.9964 0.748992L10.9961 0.748881L10.6782 1.5264ZM13.8198 4.08L13.1238 4.5503L13.1243 4.55106L13.8198 4.08ZM15 7.916H15.84L15.84 7.91465L15 7.916ZM12.949 12.8062L12.271 12.3103C12.2608 12.3243 12.251 12.3386 12.2417 12.3531L12.949 12.8062ZM10.9162 15.98L10.2088 15.5269L10.2059 15.5316L10.9162 15.98ZM8 20.6L7.2901 21.049C7.44414 21.2926 7.71225 21.4401 8.0004 21.44C8.28855 21.4399 8.55652 21.292 8.71033 21.0484L8 20.6ZM5.0838 15.9898L5.79371 15.5407L5.79151 15.5373L5.0838 15.9898ZM3.051 12.8104L3.75871 12.3579C3.74942 12.3434 3.73969 12.3291 3.72952 12.3152L3.051 12.8104ZM1 7.9202L0.16 7.91937V7.9202H1ZM2.1802 4.08L2.87569 4.55106L2.87573 4.551L2.1802 4.08ZM5.3218 1.5306L5.63951 2.3082L5.64092 2.30762L5.3218 1.5306ZM8.00124 1.84C8.46516 1.83932 8.84068 1.46268 8.84 0.998763C8.83932 0.534845 8.46268 0.159318 7.99876 0.160001L8.00124 1.84ZM8 9.38182C7.53608 9.38182 7.16 9.7579 7.16 10.2218C7.16 10.6857 7.53608 11.0618 8 11.0618V9.38182ZM8 4.77022C7.53608 4.77022 7.16 5.1463 7.16 5.61022C7.16 6.07414 7.53608 6.45022 8 6.45022V4.77022ZM8.02068 11.07C8.48445 11.0585 8.85116 10.6733 8.83973 10.2095C8.82829 9.74574 8.44306 9.37903 7.97928 9.39046L8.02068 11.07ZM5.95582 9.09437L6.67981 8.66841L5.95582 9.09437ZM5.95582 6.75585L5.23184 6.32989L5.95582 6.75585ZM7.97928 6.45975C8.44306 6.47119 8.82829 6.10449 8.83973 5.64071C8.85116 5.17693 8.48446 4.7917 8.02068 4.78026L7.97928 6.45975ZM7.99998 1.84C8.8094 1.84002 9.61108 1.99759 10.3603 2.30392L10.9961 0.748881C10.0451 0.360035 9.02746 0.160022 8.00002 0.16L7.99998 1.84ZM10.36 2.30381C11.4829 2.76336 12.4445 3.54504 13.1238 4.5503L14.5158 3.6097C13.6508 2.32959 12.4262 1.3342 10.9964 0.748992L10.36 2.30381ZM13.1243 4.55106C13.7974 5.54482 14.1581 6.7171 14.16 7.91735L15.84 7.91465C15.8375 6.37945 15.3762 4.88002 14.5153 3.60894L13.1243 4.55106ZM14.16 7.916C14.16 8.72866 14.0336 9.33192 13.7568 9.95594C13.4676 10.608 13.0038 11.3082 12.271 12.3103L13.627 13.3021C14.3614 12.298 14.9231 11.4701 15.2926 10.6371C15.6745 9.77608 15.84 8.93734 15.84 7.916H14.16ZM12.2417 12.3531L10.2089 15.5269L11.6235 16.4331L13.6563 13.2593L12.2417 12.3531ZM10.2059 15.5316L7.28967 20.1516L8.71033 21.0484L11.6265 16.4284L10.2059 15.5316ZM8.7099 20.151L5.7937 15.5408L4.3739 16.4388L7.2901 21.049L8.7099 20.151ZM5.79151 15.5373L3.75871 12.3579L2.34329 13.2629L4.37609 16.4423L5.79151 15.5373ZM3.72952 12.3152C2.99627 11.3105 2.5324 10.6102 2.24307 9.95836C1.96633 9.33489 1.84 8.73275 1.84 7.9202H0.16C0.16 8.94165 0.325572 9.7794 0.707534 10.6399C1.0769 11.4721 1.63853 12.2999 2.37248 13.3056L3.72952 12.3152ZM1.84 7.92103C1.84119 6.71953 2.20189 5.54586 2.87569 4.55106L1.48471 3.60894C0.622887 4.88135 0.161527 6.38255 0.16 7.91937L1.84 7.92103ZM2.87573 4.551C3.55555 3.54711 4.51715 2.76676 5.63951 2.3082L5.00409 0.752999C3.57488 1.33694 2.35036 2.33063 1.48467 3.609L2.87573 4.551ZM5.64092 2.30762C6.38988 2.00002 7.19157 1.84119 8.00124 1.84L7.99876 0.160001C6.97101 0.161514 5.95338 0.363125 5.00268 0.75358L5.64092 2.30762ZM8 11.0618C9.12389 11.0618 10.1624 10.4622 10.7243 9.48892L9.26942 8.64892C9.00758 9.10244 8.52368 9.38182 8 9.38182V11.0618ZM10.7243 9.48892C11.2863 8.5156 11.2863 7.31643 10.7243 6.34312L9.26942 7.18312C9.53126 7.63664 9.53126 8.1954 9.26942 8.64892L10.7243 9.48892ZM10.7243 6.34312C10.1624 5.3698 9.12389 4.77022 8 4.77022V6.45022C8.52368 6.45022 9.00758 6.7296 9.26942 7.18312L10.7243 6.34312ZM7.97928 9.39046C7.44715 9.40358 6.94973 9.12719 6.67981 8.66841L5.23184 9.52033C5.81113 10.5049 6.87865 11.0981 8.02068 11.07L7.97928 9.39046ZM6.67981 8.66841C6.40989 8.20964 6.40989 7.64058 6.67981 7.18181L5.23184 6.32989C4.65254 7.31448 4.65254 8.53574 5.23184 9.52033L6.67981 8.66841ZM6.67981 7.18181C6.94973 6.72303 7.44715 6.44664 7.97928 6.45975L8.02068 4.78026C6.87865 4.75212 5.81113 5.34529 5.23184 6.32989L6.67981 7.18181Z" fill="#ed1c24"></path>
                                        </svg>
                                        London, NW1
                                    </div>
                                </div>
                            </div>
                            <div class="right-content col-xl-8">
                                <div class="content_wrap row align-items-center justify-content-between mb-3 mb-md-0">
                                    <div class="col-12 d-flex flex-wrap align-items-center upper-left">
                                        <div class="row w-100 ">
                                            <div class="wrap d-flex flex-wrap flex-md-column col-12 col-md-4 expiry mb-2 mb-md-0">
                                                <span class="label">Expiry date:</span>
                                                <span class="value">26/08/24</span>
                                            </div>
                                            <div class="wrap d-flex flex-wrap flex-md-column col-12 col-md-4 delivery mb-2 mb-md-0">
                                                <span class="label">Delivery date:</span>
                                                <span class="value">ASAP</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex flex-wrap align-items-center upper-right my-md-3">
                                        <div class="row w-100 ">
                                            <div class="wrap d-flex flex-wrap flex-md-column col-12 col-md-4 mb-2 mb-md-0">
                                                <span class="label">Starts & drives:</span>
                                                <span class="value">Yes/No</span>
                                            </div>
                                            <div class="wrap d-flex flex-wrap flex-md-column col-12 col-md-4 mb-2 mb-md-0">
                                                <span class="label">Delivery type:</span>
                                                <span class="value">Transported</span>
                                            </div>
                                            <div class="wrap d-flex flex-wrap flex-md-column col-12 col-md-4">
                                                <span class="label">Journey miles:</span>
                                                <span class="value">160 (3 hours 10 mins)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wishlist_wrap row align-items-center">
                                        <div class="col-6 col-md-12 mb-3 mb-md-0 d-flex d-md-none flex-wrap align-items-end upper-right px-0 px-md-3">
                                            <div class="row w-100 mx-0">
                                                <a href="#" class="add_to_wishlist">
                                                    Add to watchlist
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-12 d-flex flex-wrap align-items-center upper-left mb-3 px-0 px-md-3">
                                            <div class="row w-100 lower-left">
                                                <div class="wrap d-flex flex-wrap align-items-center col-12 col-md-4 px-0 px-md-3 expiry justify-content-end justify-content-md-start">
                                                    <span class="label">Current lowest bid:</span>
                                                    <span class="value price ml-1">£250</span>
                                                </div>
                                                <div class="wrap d-flex flex-wrap align-items-center col-12 col-md-4 px-0 px-md-3 delivery justify-content-end justify-content-md-start">
                                                    <span class="label">Transporters bidding:</span>
                                                    <span class="value bid_count ml-1">4</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex flex-wrap align-items-end upper-right px-0 px-md-3">
                                            <div class="row w-100 mx-0">
                                                <a href="#" class="add_to_wishlist d-none d-md-inline-block">
                                                    Add to watchlist
                                                </a>
                                                <div class="place_bid_wrap view-quote my-0 ml-md-2 mr-0">
                                                    <a href="#" class="place_bid_btn">Place Bid</a>
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
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/web/js/admin.js') }}"></script>

    <script>
        $(function() {
            $('.photo_id_popover').popover({
                content: 'We have a copy of this transporters valid drivers license photo I.D to protect you and ensuring a safe market place for transporting your vehicle.',
                container: '.photo_id_popover',
                trigger: 'hover',
                html: true,
                placement: 'bottom',
                template: '<div class="popover" role="tooltip"><div class="arrow center"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
            })
            $('.insurance_popover').popover({
                content: 'We have verified this transport providers insurance to ensure they have the correct goods in transit (GIT) cover to protect you and transport vehicles safe and securely.',
                container: '.insurance_popover',
                trigger: 'hover',
                html: true,
                placement: 'bottom',
                template: '<div class="popover" role="tooltip"><div class="arrow center"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
            })
        })
        var globalSiteUrl = '<?php echo $path = url('/'); ?>'

        function fetch_data(page) {
            $.ajax({
                url: globalSiteUrl + "/transporter/feedback_listing?page=" + page + '&' + params(),
                success: function(res) {
                    let result = res.data;
                    if (result) {
                        $('#feedback_listing').html(result.html);
                    }
                }
            });
        }

        function params() {
            var search = $('#search').val();
            return "search=" + search;
        }

        $(document).ready(function() {
            fetch_data(1);
        });

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            $('#page').val(page);
            fetch_data(page);
        });

        $(document).ready(function() {
            $('body').attr('id', 'transporter-feedback');
            $(document).on('click', '.read_more_show', function() {
                var parentTr = $(this).siblings('.read_more_content');
                // var readMoreContent = parentTr.find('.read_more_content');
                $(this).addClass('d-none');
                parentTr.removeClass('d-none');
                parentTr.find('.read_more_less').removeClass('d-none');
            });
            $(document).on('click', '.read_more_less', function() {
                var parentTr = $(this).parent('.read_more_content');
                var showMore = $(this).parent().parent().find('.read_more_show');
                // var readMoreContent = parentTr.find('.read_more_content');
                // parentTr.find('.read_more_show').removeClass('d-none');
                showMore.removeClass('d-none');
                parentTr.addClass('d-none');
                $(this).addClass('d-none');
            });
        });
    </script>
@endsection
