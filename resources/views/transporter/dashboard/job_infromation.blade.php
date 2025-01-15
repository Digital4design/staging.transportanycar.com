<<<<<<< HEAD
@foreach ($quotes as $key => $quote)
                    @if ($quote->status != 'rejected')
                        <div class="card">
                            <div class="card-header @if ($key == 0) active @endif"
                                id="heading{{ $key }}">
                                <div class="card_lft" style="width:calc(100% - 350px);">
                                    <div class="d-flex flex-wrap align-items-center mobile-wrap first-mobile-wrap" style="max-width:20%; flex: 0 0 20%;">
                                        <span class="mobile-label">
                                            Transport Provider
                                        </span>
                                        {{-- <a href="{{ route('front.feedback_view', $quote->id) }}"> --}}
                                            <h4 style="line-height: 24px;">
                                                {{ $quote->getTransporters->username ?? '' }}</h4>
                                        {{-- </a> --}}
                                    </div>
                                        <div class="mobile-wrap rating-mobile-wrap" style="max-width:20%; flex: 0 0 20%; text-align:center;">
                                            <span class="mobile-label">Rating</span>
                                            @php
                                            $totalStars = 5; // Total number of stars
                                            $yellowStars = 5; // Full yellow stars
                                            @endphp
                                            <ul class="rating-star choose_quote_rating">

                                                @for ($i = 1; $i <= $totalStars; $i++)
                                                    <li>
                                                        <svg width="20" height="20" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                                fill="{{ $i <= $yellowStars ? '#FFA800' : '#ccc' }}" />
                                                        </svg>
                                                    </li>
                                                @endfor 
                                             <li><span class="ml-1 d-inline-block">(100%)</span></li>
                                        </ul>
                                        </div>
                                    {{-- </div> --}}
                                    <div class="mobile-wrap" style="max-width:20%; flex: 0 0 20%; text-align:center;">
                                        <span class="mobile-label">Verified</span>
                                        <span class="verified-icon">
                                            <svg width="27" height="27" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9965 5.3326C17.1504 13.7554 12.1262 17.3386 9.2776 18.184C9.08891 18.2401 8.88795 18.2401 8.69926 18.184C5.89741 17.3534 1.01723 13.876 1 5.75221C1.01688 5.05019 1.41171 4.41206 2.03239 4.08364C6.36869 1.63494 8.45439 1 8.98474 1C9.51509 1 11.7657 1.67555 16.3899 4.32236C16.756 4.52867 16.9865 4.91248 16.9965 5.3326Z" stroke="#52D017" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M5.30664 9.63198L7.76765 12.093L12.6897 7.16113" stroke="#52D017" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>   
                                            <div class="icon_hover_sec">
                                                <a class="hover_anchor">
                                                    <img src="{{ asset('assets/web/images/question.png') }}" alt="question" />
                                                </a>
                                                <div class="info_sec_details" id="infos-details">
                                                    <div class="info_sec_details_contant">
                                                        <p>We have verified this transport providers insurance cover and drivers license to protect you and transport vehicles safe and securely.</p>
                                                    </div>
                                                </div>
                                            </div>                                        
                                        </span>
                                        {{-- <img src="{{ asset('assets/web/images/right-mark.png') }}" class="right_mark"
                                        alt="right mark"> --}}
                                    </div>
                                    <div class="mobile-wrap" style="max-width:20%; flex: 0 0 20%;">
                                        <span class="mobile-label">Availability</span>
                                        <div class="icon_hover_sec">
                                            <div class="flex_blog "><span>Flexible</span>
                                                <a class="hover_anchor" 
                                                    data-toggle="popover" data-placement="bottom" data-content="Accept the quote and the transporter will contact you to arrange a convenient time and date."><img
                                                        src="{{ asset('assets/web/images/question.png') }}"
                                                        alt="question"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mobile-wrap" style="max-width:20%; flex: 0 0 20%; text-align:center;">
                                        <span class="mobile-label">Quote Amount</span>
                                        <h5 class="amount">£{{ $quote->price }} <span class="no-due">(No fees)</span></h5>
                                    </div>
                                </div>
                                <div class="wd-quote-btn" style="width: 350px;">
                                    <a href="javascript:;" class="wd-view-btn messageShow justify-content-center"
                                        data-msgkey="{{ $key }}" type="button" data-toggle="collapse"
                                        data-target="#collapse{{ $key }}" aria-expanded="true"
                                        aria-controls="collapseOne">View messages
                                        <span class="msg_{{ $quote->thread_id ?? 0 }}">0</span>
                                    </a>
                                    {{-- @if ($quote->status == 'pending' && !$hasAcceptedQuote)
                                        <a href="javascript:;"
                                            onclick="quoteChangeStatus({{ $quote->id }}, 'accept');"
                                            class="wd-accepted-btn">Accept
                                            <svg width="9" height="15" id="accept-svg" viewBox="0 0 9 15"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.45029 8.19736L2.87217 13.7755C2.48662 14.161 1.86318 14.161 1.48174 13.7755L0.554785 12.8485C0.169238 12.463 0.169238 11.8396 0.554785 11.4581L4.50869 7.5042L0.554785 3.55029C0.169238 3.16475 0.169238 2.54131 0.554785 2.15986L1.47764 1.22471C1.86318 0.83916 2.48662 0.83916 2.86807 1.22471L8.44619 6.80283C8.83584 7.18838 8.83584 7.81182 8.45029 8.19736Z"
                                                    fill="#F3F8FF" />
                                            </svg>
                                        </a>
                                        <a href="javascript:;" data-toggle="modal"
                                            data-target="#delete_quote_{{ $quote->id }}" class="d-lg-block delete_cross">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 2C10.0222 2 8.08879 2.58649 6.4443 3.6853C4.79981 4.78412 3.51809 6.3459 2.76121 8.17317C2.00433 10.0004 1.8063 12.0111 2.19215 13.9509C2.578 15.8907 3.53041 17.6725 4.92894 19.0711C6.32746 20.4696 8.10929 21.422 10.0491 21.8079C11.9889 22.1937 13.9996 21.9957 15.8268 21.2388C17.6541 20.4819 19.2159 19.2002 20.3147 17.5557C21.4135 15.9112 22 13.9778 22 12C22 10.6868 21.7413 9.38642 21.2388 8.17317C20.7363 6.95991 19.9997 5.85752 19.0711 4.92893C18.1425 4.00035 17.0401 3.26375 15.8268 2.7612C14.6136 2.25866 13.3132 2 12 2ZM15.21 13.79C15.3037 13.883 15.3781 13.9936 15.4289 14.1154C15.4797 14.2373 15.5058 14.368 15.5058 14.5C15.5058 14.632 15.4797 14.7627 15.4289 14.8846C15.3781 15.0064 15.3037 15.117 15.21 15.21C15.117 15.3037 15.0064 15.3781 14.8846 15.4289C14.7627 15.4797 14.632 15.5058 14.5 15.5058C14.368 15.5058 14.2373 15.4797 14.1154 15.4289C13.9936 15.3781 13.883 15.3037 13.79 15.21L12 13.41L10.21 15.21C10.117 15.3037 10.0064 15.3781 9.88458 15.4289C9.76272 15.4797 9.63202 15.5058 9.5 15.5058C9.36799 15.5058 9.23729 15.4797 9.11543 15.4289C8.99357 15.3781 8.88297 15.3037 8.79 15.21C8.69628 15.117 8.62188 15.0064 8.57111 14.8846C8.52034 14.7627 8.49421 14.632 8.49421 14.5C8.49421 14.368 8.52034 14.2373 8.57111 14.1154C8.62188 13.9936 8.69628 13.883 8.79 13.79L10.59 12L8.79 10.21C8.6017 10.0217 8.49591 9.7663 8.49591 9.5C8.49591 9.2337 8.6017 8.9783 8.79 8.79C8.97831 8.6017 9.2337 8.49591 9.5 8.49591C9.76631 8.49591 10.0217 8.6017 10.21 8.79L12 10.59L13.79 8.79C13.9783 8.6017 14.2337 8.49591 14.5 8.49591C14.7663 8.49591 15.0217 8.6017 15.21 8.79C15.3983 8.9783 15.5041 9.2337 15.5041 9.5C15.5041 9.7663 15.3983 10.0217 15.21 10.21L13.41 12L15.21 13.79Z"
                                                    fill="#9C9C9C" />
                                            </svg>
                                        </a>
                                    @elseif($quote->status == 'accept')
                                        @if ($job_status != 'completed')
                                            <a
                                                href="{{ route('front.booking_confirm_page', $user_quote_id) }}"class="wd-accepted-btn">Go
                                                to booking</a>
                                        @else
                                            <a
                                                href="{{ route('front.user_deposit', ['id' => $quote->id]) }}"class="wd-accepted-btn">Go
                                                to booking</a>
                                        @endif
                                    @endif --}}
                                    
                                </div>
                            </div>

                            <!-- delete quote Modal -->
                         
                            <div id="collapse{{ $key }}"
                                class="collapse @if ($key == 0) show @endif"
                                aria-labelledby="heading{{ $key }}" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form id="chat__form_{{ $key }}"
                                        action="{{ route('front.message.quote_send_message') }}" method="post"
                                        enctype='multipart/form-data'>
                                        @csrf
                                        <?php
                                        $thread = App\Thread::where('user_id', Auth::user()->id)
                                            ->where('friend_id', $quote->user_id)
                                            ->where('user_quote_id', $quote->user_quote_id)
                                            ->first();
                                        ?>
                                        <input type="hidden" name="form_page" value="quote">
                                        <input type="hidden" name="transporter_id" value="{{ $quote->user_id }}">
                                        <input type="hidden" name="user_quote_id" value="{{ $quote->user_quote_id }}">
                                        <input type="hidden" name="user_current_chat_id"
                                            id="user_current_chat_id_{{ $key }}"
                                            value="{{ $thread ? $thread->id : 0 }}">
                                        <div class="wd-quote-form">
                                            <div class="form-group">
                                                <p class="font-weight-light d-flex flex-wrap align-items-center text-left position-relative" style="font-size:14px; padding-left:20px; margin-bottom: 5px; color:#444444;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none" class="position-absolute" style="left:0;">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.95833 8.70834V10.2917C3.95833 12.915 6.08498 15.0417 8.70833 15.0417H10.2917C12.915 15.0417 15.0417 12.915 15.0417 10.2917V8.70834C15.0417 6.08499 12.915 3.95834 10.2917 3.95834H8.70833C6.08498 3.95834 3.95833 6.08499 3.95833 8.70834Z" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M8.75 12.6667C8.75 13.0809 9.08579 13.4167 9.5 13.4167C9.91421 13.4167 10.25 13.0809 10.25 12.6667H8.75ZM9.5 8.70834H10.25C10.25 8.29413 9.91421 7.95834 9.5 7.95834V8.70834ZM8.70833 7.95834C8.29412 7.95834 7.95833 8.29413 7.95833 8.70834C7.95833 9.12256 8.29412 9.45834 8.70833 9.45834V7.95834ZM9.5 13.4167C9.91421 13.4167 10.25 13.0809 10.25 12.6667C10.25 12.2525 9.91421 11.9167 9.5 11.9167V13.4167ZM8.70833 11.9167C8.29412 11.9167 7.95833 12.2525 7.95833 12.6667C7.95833 13.0809 8.29412 13.4167 8.70833 13.4167V11.9167ZM9.5 11.9167C9.08579 11.9167 8.75 12.2525 8.75 12.6667C8.75 13.0809 9.08579 13.4167 9.5 13.4167V11.9167ZM10.2917 13.4167C10.7059 13.4167 11.0417 13.0809 11.0417 12.6667C11.0417 12.2525 10.7059 11.9167 10.2917 11.9167V13.4167ZM10.25 6.33334C10.25 5.91913 9.91421 5.58334 9.5 5.58334C9.08579 5.58334 8.75 5.91913 8.75 6.33334H10.25ZM8.75 7.12501C8.75 7.53922 9.08579 7.87501 9.5 7.87501C9.91421 7.87501 10.25 7.53922 10.25 7.12501H8.75ZM10.25 12.6667V8.70834H8.75V12.6667H10.25ZM9.5 7.95834H8.70833V9.45834H9.5V7.95834ZM9.5 11.9167H8.70833V13.4167H9.5V11.9167ZM9.5 13.4167H10.2917V11.9167H9.5V13.4167ZM8.75 6.33334V7.12501H10.25V6.33334H8.75Z" fill="#444444"></path>
                                                    </svg>
                                                    Accept a quote to receive the transport providers contact details. 
                                                </p>
                                                {{-- <div class="wd-form-btn">
                                                    <p>Accept a quote to receive the transport providers contact details.</p>
                                                </div>                                                --}}
                                                <textarea class="form-control textarea" id="message"
                                                    placeholder="Type any question you have about this quote here."></textarea>
                                                    <p class="chat-note text-left font-weight-light position-relative" style="font-size:14px; padding-left:20px; margin-top: 5px; color:#444444;">
                                                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg" class="position-absolute" style="left:0; top:-2px;">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5631 12.2653L10.9587 4.78559C10.655 4.27279 10.1032 3.95831 9.50721 3.95831C8.91121 3.95831 8.35943 4.27279 8.05569 4.78559L3.45057 12.2653C3.10235 12.8105 3.07241 13.5003 3.37208 14.0737C3.67176 14.647 4.25525 15.0163 4.90169 15.0416H14.1119C14.7584 15.0163 15.3419 14.647 15.6416 14.0737C15.9412 13.5003 15.9113 12.8105 15.5631 12.2653Z" stroke="#5B5B5B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M9.50682 10.2916V6.33329" stroke="#5B5B5B" stroke-width="1.5" stroke-linecap="round"></path>
                                                            <path d="M9.50682 12.6666V11.875" stroke="#5B5B5B" stroke-width="1.5" stroke-linecap="round"></path>
                                                        </svg>                           
                                                        Do not share your contact details or personal information here.
                                                    </p>
                                            </div>
                                            <div class="message-error" style="display:none">Please enter your message.
                                            </div>
                                            <div class="wd-form-btn">
                                                {{--                                    <button type="submit" href="javascript:;" class="send-msg" id="send_message">Send message --}}
                                                {{--                                        <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg"> --}}
                                                {{--                                            <path d="M16.7637 1.65906L14.2551 13.4895C14.0658 14.3245 13.5722 14.5323 12.8709 14.1389L9.04861 11.3223L7.20428 13.0962C7.00018 13.3003 6.82947 13.471 6.43611 13.471L6.71072 9.5782L13.7949 3.17683C14.1029 2.90222 13.7281 2.75007 13.3162 3.02468L4.55838 8.53913L0.788066 7.35906C-0.0320513 7.103 -0.0468951 6.53894 0.958769 6.14558L15.706 0.464134C16.3888 0.208079 16.9863 0.616282 16.7637 1.65906Z" fill="white"/> --}}
                                                {{--                                        </svg> --}}
                                                {{--                                    </button> --}}
                                                <a href="javascript:;" class="send-msg"
                                                    onclick="sendMessage({{ $key }});" id="send_message">Send
                                                    message
                                                    <svg width="17" height="15" viewBox="0 0 17 15"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16.7637 1.65906L14.2551 13.4895C14.0658 14.3245 13.5722 14.5323 12.8709 14.1389L9.04861 11.3223L7.20428 13.0962C7.00018 13.3003 6.82947 13.471 6.43611 13.471L6.71072 9.5782L13.7949 3.17683C14.1029 2.90222 13.7281 2.75007 13.3162 3.02468L4.55838 8.53913L0.788066 7.35906C-0.0320513 7.103 -0.0468951 6.53894 0.958769 6.14558L15.706 0.464134C16.3888 0.208079 16.9863 0.616282 16.7637 1.65906Z"
                                                            fill="white" />
                                                    </svg>
                                                </a>
                                                <p class="text-note d-none"><span>Note:</span> Please do not share any contact information here,
                                                    details are exchanged after you have accepted the quote.</p>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="wd-quote-msg" id="chat_history_main_{{ $key }}">

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
=======
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
>>>>>>> d3c0609a50d2bd890116800b0a5fa2a40af59396

@section('script')
    <script src="{{ asset('assets/web/js/admin.js') }}"></script>

<<<<<<< HEAD
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.40/moment-timezone-with-data.js"
        type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.2/tinymce.min.js"></script>
    <script>
        $(document).ready(()=>{
            $('[data-toggle="popover"]').popover({trigger:'hover'});
        });
        function quoteChangeStatus(quote_id, status) {
            var formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("quote_id", quote_id);
            formData.append("status", status);
            $.ajax({
                url: "{{ route('front.quote_change_status') }}",
                data: formData,
                processData: false,
                contentType: false,
                type: "POST",
                beforeSend: function() {
                    addOverlay();
                },
                complete: function() {
                    removeOverlay();
                },
                success: function(res) {
                    if (res.success == true) {
                        if (status == 'accept') {
                            var url = "{{ route('front.checkout', ['id' => ':quote_id']) }}";
                            url = url.replace(':quote_id', quote_id);
                            window.location.href = url;
                            return;
                        } else {
                            window.location.reload();
                        }

                    } else {
                        toastr.error(res.message);
                    }
                },
                error: function(data) {
                    toastr.clear();
                    toastr.error(data.message);
                }
            });
        }
    </script>
    <script>
        const fileImage = document.querySelector('.photo-preview__src');
        const filePreview = document.querySelector('.photo-preview');

        fileImage.onchange = function() {
            const reader = new FileReader();

            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                filePreview.style.backgroundImage = "url(" + e.target.result + ")";
                filePreview.classList.add("has-image");
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };
    </script>
    <script>
        function isEmptyOrSpaces(str) {
            return str === null || str.match(/^ *$/) !== null;
        }

        function getChatHistory(url, id) {
            var elems = document.querySelector(".active");
            var timezone = moment.tz.guess();
            console.log(timezone);

            // if(elems !==null){
            //     elems.classList.remove("active");
            // }
            //$(thisobj).find("li").addClass('active');
            $.ajax({
                url: url,
                data: {
                    "timezone": timezone
                },
                dataType: "json",
            }).done(function(response) {
                $("#chat_history_main_" + id).html(response.html);
                if (response.messageCounts) {
                    console.log('Message Counts:', response.messageCounts);
                    for (const [threadId, count] of Object.entries(response.messageCounts)) {
                        const messageCountElem = document.querySelector('.msg_' + threadId);
                        if (messageCountElem) {
                            messageCountElem.textContent = count;
                        }
                    }
                }
                // $(thisobj).find(".kt-widget__item").find('.kt-widget__action').html('');
                // KTAppChat.init();
                // scrollToBottom();
                // getTotalUnreadMessage();
            });
        }
        var send_message = false;

        function sendMessage(id) {
            var form = $('#chat__form_' + id);
            var message = form.find('.textarea').val();
            var contains_email = /\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b/i.test(message);
            var contains_digit = /\d/.test(message);
            if (!message.trim()) {
                form.find('.message-error').css('display', 'block').text("Please enter your message.");
                return;
            }
            if (contains_email || contains_digit) {
                form.find('.message-error').css('display', 'block').text(
                    "Do not share contact information or you will be banned.");
                return;
            }

            var send_message = false;

            if (!isEmptyOrSpaces(message)) {
                send_message = true;
            }

            if (send_message == true) {
                var submitButton = form.find(".send-msg");
                submitButton.prop("disabled", true).text("Please Wait...");
                var file_type = form.find('#file_type').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    }
                });
                var timezone = moment.tz.guess();
                var data = new FormData(form[0]); // Form data needs to be from the specific form
                data.append('message', message);
                data.append('file_type', file_type);
                data.append('timezone', timezone);

                $.ajax({
                    url: form.attr('action'),
                    method: "POST",
                    data: data,
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                }).done(function(response) {
                    submitButton.prop("disabled", false).html(
                        "Send message <svg width='17' height='15' viewBox='0 0 17 15' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M16.7637 1.65906L14.2551 13.4895C14.0658 14.3245 13.5722 14.5323 12.8709 14.1389L9.04861 11.3223L7.20428 13.0962C7.00018 13.3003 6.82947 13.471 6.43611 13.471L6.71072 9.5782L13.7949 3.17683C14.1029 2.90222 13.7281 2.75007 13.3162 3.02468L4.55838 8.53913L0.788066 7.35906C-0.0320513 7.103 -0.0468951 6.53894 0.958769 6.14558L15.706 0.464134C16.3888 0.208079 16.9863 0.616282 16.7637 1.65906Z' fill='white'/></svg>"
                        );
                    if (response.status == "success") {
                        window.location.reload();
                    }
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    // Handle any unexpected errors
                    submitButton.prop("disabled", false).html(
                        "Send message <svg width='17' height='15' viewBox='0 0 17 15' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M16.7637 1.65906L14.2551 13.4895C14.0658 14.3245 13.5722 14.5323 12.8709 14.1389L9.04861 11.3223L7.20428 13.0962C7.00018 13.3003 6.82947 13.471 6.43611 13.471L6.71072 9.5782L13.7949 3.17683C14.1029 2.90222 13.7281 2.75007 13.3162 3.02468L4.55838 8.53913L0.788066 7.35906C-0.0320513 7.103 -0.0468951 6.53894 0.958769 6.14558L15.706 0.464134C16.3888 0.208079 16.9863 0.616282 16.7637 1.65906Z' fill='white'/></svg>"
                        );
                    form.find('.message-error').css('display', 'block').text(
                        "Do not share contact information or you will be banned.");
                });
            }
        }


        $(document).ready(function() {
            updateChat();
            $('.textarea').on('keyup', function() {
                $('.message-error').css('display', 'none');
            })
            //setInterval(updateChat, 5000);

            function updateChat() {
                var id = 0;
                var selected_chat_id = $("#user_current_chat_id_0").val();
                if (selected_chat_id) {
                    var url = "{{ route('front.message.quote_history', ':chat_id') }}";
                    url = url.replace(':chat_id', selected_chat_id);
                    getChatHistory(url, id);
                }

                {{-- var url = "{{route('transporter.message.history',($latest_chat->id) ?? 0)}}" --}}
                {{-- getChatHistory(url,$(".get-chat-history")[0]); --}}
            }

            $('#message').on('keydown paste input', function(event) {
                if (event.type === 'keydown' && event.key >= '0' && event.key <= '9') {
                    event.preventDefault();
                }
                if (event.type === 'paste') {
                    let pastedData = event.originalEvent.clipboardData.getData('text');
                    if (/\d/.test(pastedData)) {
                        event.preventDefault();
                    }
                }
                if (event.type === 'input') {
                    let newValue = $(this).val().replace(/[0-9]/g, '');
                    $(this).val(newValue);
                }
            });
        });
        $('.messageShow').on('click', function() {
            var id = $(this).attr('data-msgkey');
            var selected_chat_id = $("#user_current_chat_id_" + id).val();
            if (selected_chat_id) {
                var url = "{{ route('front.message.quote_history', ':chat_id') }}";
                url = url.replace(':chat_id', selected_chat_id);
                getChatHistory(url, id);
            }
        })
      
    </script>
@endsection

     
=======
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
>>>>>>> d3c0609a50d2bd890116800b0a5fa2a40af59396
