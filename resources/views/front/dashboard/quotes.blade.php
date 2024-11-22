@extends('layouts.web.dashboard.app')

@section('head_css')
@endsection
<style>
.info_sec_details {
    display: none;
    padding-top: 20px;
    position: absolute;
    width: 300px;
    top: 37px;
    z-index: 1;
    transform: translateX(-50%);
}
.icon_hover_sec:hover .info_sec_details{
    display: block;
}
.info_sec_details_contant {
    background: #fff;
    border: 1px solid #cfcfcf;
    padding: 20px;
    text-align: center;
    border-radius: 10px;
    box-shadow: 0px 0px 3px 0px #cfcfcf;
}
.info_sec_details p {
    font-size: 14px;
    font-weight: 200;
    color: #777;
    margin-bottom: 0;
}
.info_sec_details:before {
    content: '';
    display: block;
    position: absolute;
    top: 10px;
    width: 20px;
    height: 20px;
    background: white;
    transform: rotate(45deg);
    border: 1px solid #cfcfcfe0;
    border-bottom: 0;
    border-right: 0;
    right: 71px;
}
.wd-quote-data .accordion>.card {
    overflow: initial;
}
/* .rating-star li svg path {
    fill: #ffa800;
} */
.message-error{
    font-size: 14px;
    color: red;
    margin-top:-15px;
}
.card_lft .rating-star li:last-child {
    margin-left: 0;
    /* padding-top: 2px; */
}
.card_lft .rating-star li:last-child span {font-size: 14px;}
.wd-quote-data .card_lft h4 {
    width: 15%;
}

.wd-quote-head p.quote-table-transport {
    margin-left: -46px;
}

.wd-quote-head p.quote-table-Rating {
    margin-left: -63px;
}

.wd-quote-head p.quote-table-Verified {
    margin-left: -103px;
}
.choose_quote_rating li svg {
    width: 16px;
    height: 16px;
}

@media(max-width: 580px){
    .info_sec_details {
      transform: translateX(-56%);
    }
    .wd-quote-data .card_lft h4 {
    width: 21%;
}
.wd-quote-head p.quote-table-transport {
    margin-left: 0;
    width: 20%;
}
.wd-quote-head p.quote-table-Rating {
    margin-left: 0;
}
.wd-quote-head p.quote-table-Verified {
    margin-left: 0;
}
.wd-quote-table-head .wd-quote-head {
    padding: 0 10px;
    justify-content: space-between;
}
.card_lft .rating-star li:last-child {
    padding-top: 1px;
}
.card_lft .rating-star li:last-child svg{
    padding-top: 0.5px;
}

}

@media(max-width: 430px){
.icon_hover_sec:hover .info_sec_details {
    transform: translateX(-67%);
}
.icon_hover_sec:hover .info_sec_details:before {
    right: 35px;
}
}

@media(max-width: 340px){
.icon_hover_sec .info_sec_details {
    width: 260px;
}
.icon_hover_sec .info_sec_details:before {
    right: 52px;
}
}

</style>
@section('content')
    @include('layouts.web.dashboard.header')
    <section class="wd-quote-area bradius_10">
        <div class="row">
            <div class="col-lg-12">
                <div class="wd-quote-title">
                    <h1>Choose the best quote</h1>
                    <p>You have received {{count($quotes)}} quotes so far, feel free to check them all out below and choose the best one based on price and convenience.</p>
                </div>
            </div>
        </div>
        <div class="wd-quote-data">
            <div class="wd-quote-table-head">
                <div class="wd-quote-head">
                    <p class="quote-table-transport">Transporter</p>
                    <p class="quote-table-Rating">Rating</p>
                    <p class="quote-table-Verified">Verified</p>
                    <p class="quote-table-Dates">Dates</p>
                    <p class="quote-table-Quote">Quote</p>
                </div>
             </div>
            <div class="wd-quote-txt">
                <p>
                    <svg width="19" height="25" viewBox="0 0 19 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d_580_2223)">
                            <path d="M7.06648 18.4953C7.06679 18.6854 7.1234 18.8716 7.22963 19.03L7.74982 19.8065C7.83869 19.9393 7.95922 20.0481 8.10069 20.1234C8.24216 20.1987 8.40018 20.2382 8.5607 20.2382H10.439C10.5996 20.2382 10.7576 20.1987 10.8991 20.1234C11.0405 20.0481 11.1611 19.9393 11.2499 19.8065L11.7701 19.03C11.8763 18.8716 11.9331 18.6856 11.9333 18.4953L11.9345 17.3361H7.06496L7.06648 18.4953ZM4.14258 10.0818C4.14258 11.423 4.64329 12.6465 5.46847 13.5814C5.97131 14.1512 6.75784 15.3415 7.05766 16.3456C7.05887 16.3535 7.05979 16.3613 7.061 16.3692H11.9384C11.9397 16.3613 11.9406 16.3538 11.9418 16.3456C12.2416 15.3415 13.0281 14.1512 13.531 13.5814C14.3562 12.6465 14.8569 11.423 14.8569 10.0818C14.8569 7.13808 12.4495 4.75292 9.48298 4.76199C6.37797 4.77136 4.14258 7.26986 4.14258 10.0818ZM9.49972 7.66371C8.15709 7.66371 7.06466 8.74853 7.06466 10.0818C7.06466 10.349 6.84672 10.5654 6.57764 10.5654C6.30857 10.5654 6.09063 10.349 6.09063 10.0818C6.09063 8.21504 7.61985 6.69647 9.49972 6.69647C9.7688 6.69647 9.98673 6.91289 9.98673 7.18009C9.98673 7.44729 9.7688 7.66371 9.49972 7.66371Z" fill="#FFA800"/>
                        </g>
                        <defs>
                            <filter id="filter0_d_580_2223" x="0.142578" y="0.761963" width="18.7148" height="23.4761" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                <feOffset/>
                                <feGaussianBlur stdDeviation="2"/>
                                <feComposite in2="hardAlpha" operator="out"/>
                                <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 0.66 0 0 0 0 0 0 0 0 1 0"/>
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_580_2223"/>
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_580_2223" result="shape"/>
                            </filter>
                        </defs>
                    </svg>
                    Transport providers get booked up and quotes are often withdrawn, book now to avoid missing out.
                </p>
            </div>
            <div class="accordion" id="accordionExample">
                @foreach($quotes as $key => $quote)
                @if($quote->status != 'rejected')
                <div class="card">
                    <div class="card-header @if($key == 0) active @endif" id="heading{{$key}}">
                        <div class="card_lft">
                            <div class="d-flex flex-wrap align-items-center" style="gap:5px;">
                                <a href="{{ route('front.feedback_view', $quote->id)}}">
                                    <h4 style="width: 100%; line-height: 24px;">{{$quote->getTransporters->username ??""}}</h4>
                                </a>
                                @if ($overall_percentage == 0)
                                <ul class="rating-star choose_quote_rating">
                                    <li>
                                        <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.8 0L13.2248 7.46262L21.0714 7.46262L14.7233 12.0748L17.1481 19.5374L10.8 14.9252L4.45192 19.5374L6.87667 12.0748L0.528589 7.46262L8.37525 7.46262L10.8 0Z" fill="#D9D9D9"/>
                                        </svg>
                                    </li>
                                    <li>
                                        <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.8 0L13.2248 7.46262L21.0714 7.46262L14.7233 12.0748L17.1481 19.5374L10.8 14.9252L4.45192 19.5374L6.87667 12.0748L0.528589 7.46262L8.37525 7.46262L10.8 0Z" fill="#D9D9D9"/>
                                        </svg>
                                    </li>
                                    <li>
                                        <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.8 0L13.2248 7.46262L21.0714 7.46262L14.7233 12.0748L17.1481 19.5374L10.8 14.9252L4.45192 19.5374L6.87667 12.0748L0.528589 7.46262L8.37525 7.46262L10.8 0Z" fill="#D9D9D9"/>
                                        </svg>
                                    </li>
                                    <li>
                                        <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.8 0L13.2248 7.46262L21.0714 7.46262L14.7233 12.0748L17.1481 19.5374L10.8 14.9252L4.45192 19.5374L6.87667 12.0748L0.528589 7.46262L8.37525 7.46262L10.8 0Z" fill="#D9D9D9"/>
                                        </svg>
                                    </li>
                                    <li>
                                        <!-- <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.8 0L13.2248 7.46262L21.0714 7.46262L14.7233 12.0748L17.1481 19.5374L10.8 14.9252L4.45192 19.5374L6.87667 12.0748L0.528589 7.46262L8.37525 7.46262L10.8 0Z" fill="#FFA800"/>
                                        </svg> -->
                                        <svg width="22" height="20" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22 0L26.9393 15.2016H42.9232L29.992 24.5967L34.9313 39.7984L22 30.4033L9.06872 39.7984L14.008 24.5967L1.07676 15.2016H17.0607L22 0Z" fill="#DCDCDE"/>
                                            <mask id="mask0_5_1268" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="23" height="44">
                                            <rect width="23" height="44" fill="#D9D9D9"/>
                                            </mask>
                                            <g mask="url(#mask0_5_1268)">
                                            <path d="M22 0L26.9393 15.2016H42.9232L29.992 24.5967L34.9313 39.7984L22 30.4033L9.06872 39.7984L14.008 24.5967L1.07676 15.2016H17.0607L22 0Z" fill="#D9D9D9"/>
                                            </g>
                                        </svg>
                                    </li>
                                    <li><span class="ml-1">({{$overall_percentage}}%)</span></li> 
                                </ul>
                                @else
                                 @php
                                    $totalStars = 5; // Total number of stars
                                    $yellowStars = round($rating_average); // Full yellow stars
                                @endphp
                                <ul class="rating-star choose_quote_rating">

                                    @for ($i = 1; $i < $totalStars; $i++)
                                        <li>
                                            <svg width="20" height="20" viewBox="0 0 12 12"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                    fill="{{ $i <= $yellowStars ? '#FFA800' : '#ccc' }}" />
                                            </svg>
                                        </li>
                                    @endfor
                                    <li>
                                        <!-- <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.8 0L13.2248 7.46262L21.0714 7.46262L14.7233 12.0748L17.1481 19.5374L10.8 14.9252L4.45192 19.5374L6.87667 12.0748L0.528589 7.46262L8.37525 7.46262L10.8 0Z" fill="#FFA800"/>
                                        </svg> -->
                                        <svg width="22" height="20" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22 0L26.9393 15.2016H42.9232L29.992 24.5967L34.9313 39.7984L22 30.4033L9.06872 39.7984L14.008 24.5967L1.07676 15.2016H17.0607L22 0Z" fill="#DCDCDE"/>
                                            <mask id="mask0_5_1268" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="23" height="44">
                                            <rect width="23" height="44" fill="#D9D9D9"/>
                                            </mask>
                                            <g mask="url(#mask0_5_1268)">
                                            <path d="M22 0L26.9393 15.2016H42.9232L29.992 24.5967L34.9313 39.7984L22 30.4033L9.06872 39.7984L14.008 24.5967L1.07676 15.2016H17.0607L22 0Z" fill="#FFB902"/>
                                            </g>
                                        </svg>
                                    </li>
                                <li><span class="ml-1">({{$overall_percentage}}%)</span></li>
                                </ul>
                                @endif
                            </div>
                            <img src="{{asset('assets/web/images/right-mark.png')}}" class="right_mark" alt="right mark">
                            <div class="icon_hover_sec">
                                <div class="flex_blog "><span>Flexible</span>
                                    <a href="javascript:;" class="hover_anchor" data-toggle="modal" data-target="#anchor"><img src="{{asset('assets/web/images/question.png')}}" alt="question"></a>                                
                                </div>
                                <div class="info_sec_details" id="info-details">
                                    <div class="info_sec_details_contant">
                                        <p>Transport providers are able to carry out the job on various dates so we recommend messaging them first to confirm availability
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <h5>£{{$quote->price}}</h5>
                            <!-- <a href="javascript:;" class="d-lg-none" data-toggle="modal" data-target="#delete_quote_{{$quote->id}}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 2C10.0222 2 8.08879 2.58649 6.4443 3.6853C4.79981 4.78412 3.51809 6.3459 2.76121 8.17317C2.00433 10.0004 1.8063 12.0111 2.19215 13.9509C2.578 15.8907 3.53041 17.6725 4.92894 19.0711C6.32746 20.4696 8.10929 21.422 10.0491 21.8079C11.9889 22.1937 13.9996 21.9957 15.8268 21.2388C17.6541 20.4819 19.2159 19.2002 20.3147 17.5557C21.4135 15.9112 22 13.9778 22 12C22 10.6868 21.7413 9.38642 21.2388 8.17317C20.7363 6.95991 19.9997 5.85752 19.0711 4.92893C18.1425 4.00035 17.0401 3.26375 15.8268 2.7612C14.6136 2.25866 13.3132 2 12 2ZM15.21 13.79C15.3037 13.883 15.3781 13.9936 15.4289 14.1154C15.4797 14.2373 15.5058 14.368 15.5058 14.5C15.5058 14.632 15.4797 14.7627 15.4289 14.8846C15.3781 15.0064 15.3037 15.117 15.21 15.21C15.117 15.3037 15.0064 15.3781 14.8846 15.4289C14.7627 15.4797 14.632 15.5058 14.5 15.5058C14.368 15.5058 14.2373 15.4797 14.1154 15.4289C13.9936 15.3781 13.883 15.3037 13.79 15.21L12 13.41L10.21 15.21C10.117 15.3037 10.0064 15.3781 9.88458 15.4289C9.76272 15.4797 9.63202 15.5058 9.5 15.5058C9.36799 15.5058 9.23729 15.4797 9.11543 15.4289C8.99357 15.3781 8.88297 15.3037 8.79 15.21C8.69628 15.117 8.62188 15.0064 8.57111 14.8846C8.52034 14.7627 8.49421 14.632 8.49421 14.5C8.49421 14.368 8.52034 14.2373 8.57111 14.1154C8.62188 13.9936 8.69628 13.883 8.79 13.79L10.59 12L8.79 10.21C8.6017 10.0217 8.49591 9.7663 8.49591 9.5C8.49591 9.2337 8.6017 8.9783 8.79 8.79C8.97831 8.6017 9.2337 8.49591 9.5 8.49591C9.76631 8.49591 10.0217 8.6017 10.21 8.79L12 10.59L13.79 8.79C13.9783 8.6017 14.2337 8.49591 14.5 8.49591C14.7663 8.49591 15.0217 8.6017 15.21 8.79C15.3983 8.9783 15.5041 9.2337 15.5041 9.5C15.5041 9.7663 15.3983 10.0217 15.21 10.21L13.41 12L15.21 13.79Z" fill="#ED1C24"/>
                                </svg>
                            </a> -->
                        </div>
                        <div class="wd-quote-btn">
                            <a href="javascript:;" class="wd-view-btn messageShow" data-msgkey="{{$key}}" type="button" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapseOne">View messages
                                <span class="msg_{{$quote->thread_id ?? 0}}">0</span>
                            </a>
                            @if($quote->status == 'pending' && (!$hasAcceptedQuote))
                            <a href="javascript:;" onclick="quoteChangeStatus({{$quote->id}}, 'accept');" class="wd-accepted-btn">Accept
                                <svg width="9" height="15" id="accept-svg" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.45029 8.19736L2.87217 13.7755C2.48662 14.161 1.86318 14.161 1.48174 13.7755L0.554785 12.8485C0.169238 12.463 0.169238 11.8396 0.554785 11.4581L4.50869 7.5042L0.554785 3.55029C0.169238 3.16475 0.169238 2.54131 0.554785 2.15986L1.47764 1.22471C1.86318 0.83916 2.48662 0.83916 2.86807 1.22471L8.44619 6.80283C8.83584 7.18838 8.83584 7.81182 8.45029 8.19736Z" fill="#F3F8FF"/>
                                </svg>
                            </a>
                            <a href="javascript:;"  data-toggle="modal" data-target="#delete_quote_{{$quote->id}}" class="d-lg-block">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 2C10.0222 2 8.08879 2.58649 6.4443 3.6853C4.79981 4.78412 3.51809 6.3459 2.76121 8.17317C2.00433 10.0004 1.8063 12.0111 2.19215 13.9509C2.578 15.8907 3.53041 17.6725 4.92894 19.0711C6.32746 20.4696 8.10929 21.422 10.0491 21.8079C11.9889 22.1937 13.9996 21.9957 15.8268 21.2388C17.6541 20.4819 19.2159 19.2002 20.3147 17.5557C21.4135 15.9112 22 13.9778 22 12C22 10.6868 21.7413 9.38642 21.2388 8.17317C20.7363 6.95991 19.9997 5.85752 19.0711 4.92893C18.1425 4.00035 17.0401 3.26375 15.8268 2.7612C14.6136 2.25866 13.3132 2 12 2ZM15.21 13.79C15.3037 13.883 15.3781 13.9936 15.4289 14.1154C15.4797 14.2373 15.5058 14.368 15.5058 14.5C15.5058 14.632 15.4797 14.7627 15.4289 14.8846C15.3781 15.0064 15.3037 15.117 15.21 15.21C15.117 15.3037 15.0064 15.3781 14.8846 15.4289C14.7627 15.4797 14.632 15.5058 14.5 15.5058C14.368 15.5058 14.2373 15.4797 14.1154 15.4289C13.9936 15.3781 13.883 15.3037 13.79 15.21L12 13.41L10.21 15.21C10.117 15.3037 10.0064 15.3781 9.88458 15.4289C9.76272 15.4797 9.63202 15.5058 9.5 15.5058C9.36799 15.5058 9.23729 15.4797 9.11543 15.4289C8.99357 15.3781 8.88297 15.3037 8.79 15.21C8.69628 15.117 8.62188 15.0064 8.57111 14.8846C8.52034 14.7627 8.49421 14.632 8.49421 14.5C8.49421 14.368 8.52034 14.2373 8.57111 14.1154C8.62188 13.9936 8.69628 13.883 8.79 13.79L10.59 12L8.79 10.21C8.6017 10.0217 8.49591 9.7663 8.49591 9.5C8.49591 9.2337 8.6017 8.9783 8.79 8.79C8.97831 8.6017 9.2337 8.49591 9.5 8.49591C9.76631 8.49591 10.0217 8.6017 10.21 8.79L12 10.59L13.79 8.79C13.9783 8.6017 14.2337 8.49591 14.5 8.49591C14.7663 8.49591 15.0217 8.6017 15.21 8.79C15.3983 8.9783 15.5041 9.2337 15.5041 9.5C15.5041 9.7663 15.3983 10.0217 15.21 10.21L13.41 12L15.21 13.79Z" fill="#ED1C24"/>
                                </svg>
                            </a>
                            @elseif($quote->status == 'accept') 
                                @if($job_status != 'completed')
                                    <a href="{{ route('front.booking_confirm_page', $user_quote_id) }}"class="wd-accepted-btn">Go to booking</a>
                                @else
                                    <a href="{{ route('front.user_deposit', ['id' => $quote->id]) }}"class="wd-accepted-btn">Go to booking</a>
                                @endif
                            @endif
                        </div>
                    </div>

                     <!-- delete quote Modal -->
                    <div class="modal fade mark_bx" id="delete_quote_{{$quote->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">
                                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.93934 15.9393C0.353553 16.5251 0.353553 17.4749 0.93934 18.0607C1.52513 18.6464 2.47487 18.6464 3.06066 18.0607L0.93934 15.9393ZM10.5607 10.5607C11.1464 9.97487 11.1464 9.02513 10.5607 8.43934C9.97487 7.85355 9.02513 7.85355 8.43934 8.43934L10.5607 10.5607ZM8.43934 8.43934C7.85355 9.02513 7.85355 9.97487 8.43934 10.5607C9.02513 11.1464 9.97487 11.1464 10.5607 10.5607L8.43934 8.43934ZM18.0607 3.06066C18.6464 2.47487 18.6464 1.52513 18.0607 0.93934C17.4749 0.353553 16.5251 0.353553 15.9393 0.93934L18.0607 3.06066ZM10.5607 8.43934C9.97487 7.85355 9.02513 7.85355 8.43934 8.43934C7.85355 9.02513 7.85355 9.97487 8.43934 10.5607L10.5607 8.43934ZM15.9393 18.0607C16.5251 18.6464 17.4749 18.6464 18.0607 18.0607C18.6464 17.4749 18.6464 16.5251 18.0607 15.9393L15.9393 18.0607ZM8.43934 10.5607C9.02513 11.1464 9.97487 11.1464 10.5607 10.5607C11.1464 9.97487 11.1464 9.02513 10.5607 8.43934L8.43934 10.5607ZM3.06066 0.93934C2.47487 0.353553 1.52513 0.353553 0.93934 0.93934C0.353553 1.52513 0.353553 2.47487 0.93934 3.06066L3.06066 0.93934ZM3.06066 18.0607L10.5607 10.5607L8.43934 8.43934L0.93934 15.9393L3.06066 18.0607ZM10.5607 10.5607L18.0607 3.06066L15.9393 0.93934L8.43934 8.43934L10.5607 10.5607ZM8.43934 10.5607L15.9393 18.0607L18.0607 15.9393L10.5607 8.43934L8.43934 10.5607ZM10.5607 8.43934L3.06066 0.93934L0.93934 3.06066L8.43934 10.5607L10.5607 8.43934Z" fill="#CFCFCF"/>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h3 class="d-block text-center">Are you sure you want to <br /> reject this quote ?</h3>
                                </div>
                                <div class="modal-footer p-0">
                                    <a href="javascript:;" class="no_btn" data-dismiss="modal">No</a>
                                    <a href="javascript:void(0)"  onclick="quoteChangeStatus({{$quote->id}}, 'rejected');" class="yes_btn">Yes</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="collapse{{$key}}" class="collapse @if($key == 0) show @endif" aria-labelledby="heading{{$key}}" data-parent="#accordionExample">
                        <div class="card-body">
                            <form id="chat__form_{{$key}}" action="{{route('front.message.quote_send_message')}}" method="post" enctype='multipart/form-data'>
                                @csrf
                                <?php
                                $thread = App\Thread::where('user_id', Auth::user()->id)->where('friend_id', $quote->user_id)->where('user_quote_id', $quote->user_quote_id)->first();
                                ?>
                                <input type="hidden" name="form_page" value="quote">
                                <input type="hidden" name="transporter_id" value="{{$quote->user_id}}">
                                <input type="hidden" name="user_quote_id" value="{{$quote->user_quote_id}}">
                                <input type="hidden" name="user_current_chat_id" id="user_current_chat_id_{{$key}}" value="{{$thread ? $thread->id : 0}}">
                            <div class="wd-quote-form">
                                <div class="form-group">
                                    <textarea class="form-control textarea" id="message" placeholder="Type any question you have about this quote here."></textarea>
                                </div>
                                <div class="message-error" style="display:none" >Please enter your message.</div>
                                <div class="wd-form-btn">
{{--                                    <button type="submit" href="javascript:;" class="send-msg" id="send_message">Send message--}}
{{--                                        <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                            <path d="M16.7637 1.65906L14.2551 13.4895C14.0658 14.3245 13.5722 14.5323 12.8709 14.1389L9.04861 11.3223L7.20428 13.0962C7.00018 13.3003 6.82947 13.471 6.43611 13.471L6.71072 9.5782L13.7949 3.17683C14.1029 2.90222 13.7281 2.75007 13.3162 3.02468L4.55838 8.53913L0.788066 7.35906C-0.0320513 7.103 -0.0468951 6.53894 0.958769 6.14558L15.706 0.464134C16.3888 0.208079 16.9863 0.616282 16.7637 1.65906Z" fill="white"/>--}}
{{--                                        </svg>--}}
{{--                                    </button>--}}
                                    <a href="javascript:;" class="send-msg" onclick="sendMessage({{$key}});" id="send_message">Send message
                                        <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.7637 1.65906L14.2551 13.4895C14.0658 14.3245 13.5722 14.5323 12.8709 14.1389L9.04861 11.3223L7.20428 13.0962C7.00018 13.3003 6.82947 13.471 6.43611 13.471L6.71072 9.5782L13.7949 3.17683C14.1029 2.90222 13.7281 2.75007 13.3162 3.02468L4.55838 8.53913L0.788066 7.35906C-0.0320513 7.103 -0.0468951 6.53894 0.958769 6.14558L15.706 0.464134C16.3888 0.208079 16.9863 0.616282 16.7637 1.65906Z" fill="white"/>
                                        </svg>
                                    </a>
                                    <p><span>Note:</span> Please do not share any contact information here, details are exchanged after you have accepted the quote.</p>
                                </div>
                            </div>
                            </form>
                            <div class="wd-quote-msg" id="chat_history_main_{{$key}}">

                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <!-- <div>
                <p class="wd-view-txt">View declined, withdraw & expired quotes (5)</p>
            </div> -->
        </div>
    </section>
@endsection

@section('script')
    <script src="{{asset('assets/web/js/admin.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.40/moment-timezone-with-data.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.2/tinymce.min.js"></script>
    <script>
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
                        if(status == 'accept') {
                            var url = "{{ route('front.checkout', ['id' => ':quote_id']) }}";
                            url = url.replace(':quote_id', quote_id);
                            window.location.href = url;
                            return;
                        }
                        else {
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

        fileImage.onchange = function () {
            const reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                filePreview.style.backgroundImage  = "url("+e.target.result+")";
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
                data: {"timezone": timezone},
                dataType: "json",
            }).done(function(response) {    
                $("#chat_history_main_"+id).html(response.html);
                if (response.messageCounts) {
                    console.log('Message Counts:', response.messageCounts);
                    for (const [threadId, count] of Object.entries(response.messageCounts)) {
                        const messageCountElem = document.querySelector('.msg_'+threadId);
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
                form.find('.message-error').css('display', 'block').text("Do not share contact information or you will be banned.");
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
                var data = new FormData(form[0]);  // Form data needs to be from the specific form
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
                    submitButton.prop("disabled", false).html("Send message <svg width='17' height='15' viewBox='0 0 17 15' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M16.7637 1.65906L14.2551 13.4895C14.0658 14.3245 13.5722 14.5323 12.8709 14.1389L9.04861 11.3223L7.20428 13.0962C7.00018 13.3003 6.82947 13.471 6.43611 13.471L6.71072 9.5782L13.7949 3.17683C14.1029 2.90222 13.7281 2.75007 13.3162 3.02468L4.55838 8.53913L0.788066 7.35906C-0.0320513 7.103 -0.0468951 6.53894 0.958769 6.14558L15.706 0.464134C16.3888 0.208079 16.9863 0.616282 16.7637 1.65906Z' fill='white'/></svg>");
                    if (response.status == "success") {
                        window.location.reload();
                    }
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    // Handle any unexpected errors
                    submitButton.prop("disabled", false).html("Send message <svg width='17' height='15' viewBox='0 0 17 15' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M16.7637 1.65906L14.2551 13.4895C14.0658 14.3245 13.5722 14.5323 12.8709 14.1389L9.04861 11.3223L7.20428 13.0962C7.00018 13.3003 6.82947 13.471 6.43611 13.471L6.71072 9.5782L13.7949 3.17683C14.1029 2.90222 13.7281 2.75007 13.3162 3.02468L4.55838 8.53913L0.788066 7.35906C-0.0320513 7.103 -0.0468951 6.53894 0.958769 6.14558L15.706 0.464134C16.3888 0.208079 16.9863 0.616282 16.7637 1.65906Z' fill='white'/></svg>");
                    form.find('.message-error').css('display', 'block').text("Do not share contact information or you will be banned.");
                });
            }
        }


        $(document).ready(function () {
            updateChat();
            $('.textarea').on('keyup', function() {
                $('.message-error').css('display','none');
            })
            //setInterval(updateChat, 5000);

            function updateChat() {
                var id=0;
                var selected_chat_id = $("#user_current_chat_id_0").val();
                if(selected_chat_id) {
                    var url = "{{route('front.message.quote_history', ':chat_id')}}";
                    url = url.replace(':chat_id', selected_chat_id);
                    getChatHistory(url, id);
                }

                {{--var url = "{{route('transporter.message.history',($latest_chat->id) ?? 0)}}"--}}
                {{--getChatHistory(url,$(".get-chat-history")[0]);--}}
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
            var selected_chat_id = $("#user_current_chat_id_"+id).val();
            if(selected_chat_id) {
                var url = "{{route('front.message.quote_history', ':chat_id')}}";
                url = url.replace(':chat_id', selected_chat_id);
                getChatHistory(url, id);
            }
        })

    </script>
@endsection

