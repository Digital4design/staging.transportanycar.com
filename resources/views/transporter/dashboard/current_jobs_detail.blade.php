@extends('layouts.transporter.dashboard.app')

@section('head_css')
<style>
.details_service {
    display: flex;
    border-bottom: 1px solid #C8C8C8;
}
.car_details_left {
    width: 50%;
}
.car_service_right {
    width: 50%;
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-end;
}
.car_service_right h1 {
    width: 100%;
    text-align: end;
    font-size: 22px;
    color: #000;
    margin-bottom: 0;
    
}
.car_service_right .img-wrap {
    width: 168px;
    height: 112px;
    border-radius: 7px;
    object-fit: cover;
    overflow:hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}
.car_service_right p {
    width: 100%;
    text-align: end;
    font-size: 18px;
    color: #000;
    margin-bottom: 0;
}
.car_service_right a.wd-resolve-btn {
    line-height: normal;
    padding: 12px 15px 0px;
}
.car_details_left .wd-dlvr-profl {
    align-items: center; 
}
.car_details_left .wd-dlvr-dtls {
    border: none;
}
.car_details_left .wd-dlvr-img img {
    width: 50px;
    height: 50px;
}
.car_details_left .wd-dlvr-img {
    width: max-content;
}
.car_details_left .wd-dlvr-contact {
    width: 68%;
}
.message-error{
    font-size: 14px;
    color: red;
    margin-top:-15px;
}
.send-msg {
    color: #fff !important;
}

.collection_details {
    margin-bottom: 30px;
    padding-bottom: 30px;
    border-bottom: 1px solid #C8C8C8;
}
.collection_details h2 {
    font-size: 25px;
    color: #000;
    margin-bottom: 20px;
}
.collection_list {
    display: flex;
    margin: 10px 0;
}
.collection_list span {
    width: 10%;
    font-size: 16px;
    color: #000;
}
.collection_list b {
    font-size: 16px;
    color: #444;
}
.coll_det {
    margin-top: 30px;
}

@media screen and (min-device-width: 1401px) and (max-device-width: 1800px) { 
    .collection_list span {
        width: 16%;
    }
}

@media(max-width: 1400px){
.collection_list span {
    width: 20%;
}
.new_header_custom section.wd-deposit-area{
    padding-right: 0;
}
}

@media(max-width: 1199px){
.collection_list b {
    width: 73%;
}
.collection_list span {
    width: 25%;
}
}

@media(min-width: 992px){
    .new_header_custom section.wd-deposit-area {
    border: none;
    margin-top: 0;
    padding-top: 0;
    background: transparent;
    box-shadow: none;
}
.new_header_custom section.wd-deposit-area .row.new_header_custom_row {
    padding: 120px 50px 50px;
    margin-left: 80px;
}
}
@media(max-width: 991px){
 .new_header_custom section.wd-deposit-area {
    border: none;
    margin-top: 0;
    padding-top: 0;
    background: transparent;
    box-shadow: none;
}
.new_header_custom section.wd-deposit-area .row.new_header_custom_row {
    padding: 120px 30px 50px;
    margin: 0px;
}
}




@media(max-width: 580px){
    .car_details_left .wd-dlvr-img {
    width: 34%;
}
.car_service_right h1 {
    font-size: 16px;
    margin-bottom: 10px;
}
/* .car_service_right img {
    max-width: 100px;
    height: 65px;
    border-radius: 5px;  margin-bottom: 25px;
} */
.car_service_right p {
    text-align: left;
    font-size: 12px;
    color: #000;
    margin-bottom: 10px;
}
.car_service_right {
    padding-left: 30px;
}
.car_service_right a.wd-resolve-btn {
    margin-left: 0;
    margin-right: auto;
    width: 100%;
    padding: 10px 15px 10px;
}
.car_details_left .wd-dlvr-id h2 {
    font-size: 36px;
    margin-bottom: 0;
}
.car_details_left .wd-dlvr-dtls {
    margin-bottom: 0;
}
.details_service {
    padding-bottom: 10px;
    margin-bottom: 20px;
}
.resolve_bx .modal-header .close {
    margin: 0 !important;
    position: absolute;
    right: 12px;
    top: 12px;
}
.coll_det {
    margin-top: 7px;
}
.collection_list b {
    width: 65%;
}
.collection_list span {
    width: 35%;
}

.error {
    font-size: 12px;
    color: red;
    /* padding: 3px 15px; */
}
.resolve_bx .modal-header  button.close {
    margin: 0 !important;
    position: absolute;
    right: -13px;
    top: -14px;
}
.resolve_bx .modal-header {
    position: relative;
}
.resolve_bx .form-group {
    position: relative;
}
.resolve_bx .form-group label.error {
    padding: 0 !important;
    position: absolute;
    left: 0;
}

.car_details_left .wd-dlvr-profl{
    gap: 0;
}
.details_service ul.wd-dlvr-dtls li a {
    width: 80%;
}

.new_header_custom .wd-deposit-area{
    margin-top: 0;
}
.new_header_custom section.wd-deposit-area .row.new_header_custom_row {
    padding: 95px 0 0 0;
    margin: 0 -15px;
}
}

</style>
@endsection



@section('content')
<div id="wrapper">
    @include('layouts.transporter.dashboard.sidebar')
    <div id="page-content-wrapper" class="new_header_custom">
    <section class="wd-deposit-area">
    @include('layouts.transporter.dashboard.top_head')
        <div class="row new_header_custom_row">
            <div class="col-lg-12">
                <div class="details_service">
                    <div class="car_details_left">
                        <div class="wd-dlvr-profl">
                            <div class="wd-dlvr-img">
                                <img src="{{checkFileExist($user->profile_image)}}" alt="transporter delivery" class="img-fluid">
                            </div>
                            <div class="wd-dlvr-contact">
                                <h3>{{ $user->username ?? 'N/A' }}</h3>
                            </div>
                        </div>
                        <ul class="wd-dlvr-dtls">
                            <li>
                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.7537 4.84453C12.8527 4.76582 13 4.83945 13 4.96387V10.1562C13 10.8291 12.4541 11.375 11.7812 11.375H1.21875C0.545898 11.375 0 10.8291 0 10.1562V4.96641C0 4.83945 0.144727 4.76836 0.246289 4.84707C0.815039 5.28887 1.56914 5.85 4.15898 7.73145C4.69473 8.12246 5.59863 8.94512 6.5 8.94004C7.40645 8.94766 8.32812 8.10723 8.84355 7.73145C11.4334 5.85 12.185 5.28633 12.7537 4.84453ZM6.5 8.125C7.08906 8.13516 7.93711 7.38359 8.36367 7.07383C11.733 4.62871 11.9895 4.41543 12.7664 3.80605C12.9137 3.6918 13 3.51406 13 3.32617V2.84375C13 2.1709 12.4541 1.625 11.7812 1.625H1.21875C0.545898 1.625 0 2.1709 0 2.84375V3.32617C0 3.51406 0.0863281 3.68926 0.233594 3.80605C1.01055 4.41289 1.26699 4.62871 4.63633 7.07383C5.06289 7.38359 5.91094 8.13516 6.5 8.125Z" fill="#B1B1B1"/>
                                </svg>
                                <a href="mailto:{{ $user->email ?? 'N/A' }}">{{ $user->email ?? 'N/A' }}</a>
                            </li>
                            <li>
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.9214 6.17044C11.6975 3.78237 9.27445 2.16663 6.49999 2.16663C3.72553 2.16663 1.30179 3.7835 0.0785293 6.17067C0.0268999 6.2728 0 6.38563 0 6.50007C0 6.61451 0.0268999 6.72734 0.0785293 6.82947C1.30247 9.21755 3.72553 10.8333 6.49999 10.8333C9.27445 10.8333 11.6982 9.21642 12.9214 6.82925C12.9731 6.72712 13 6.61428 13 6.49985C13 6.38541 12.9731 6.27257 12.9214 6.17044ZM6.49999 9.74996C5.8572 9.74996 5.22884 9.55935 4.69438 9.20223C4.15992 8.84512 3.74336 8.33754 3.49738 7.74368C3.25139 7.14982 3.18703 6.49635 3.31244 5.86592C3.43784 5.23548 3.74737 4.65638 4.20189 4.20186C4.65641 3.74734 5.23551 3.43781 5.86594 3.31241C6.49638 3.18701 7.14985 3.25137 7.74371 3.49735C8.33757 3.74334 8.84515 4.1599 9.20226 4.69436C9.55938 5.22882 9.74999 5.85717 9.74999 6.49996C9.7502 6.92681 9.66627 7.34952 9.50302 7.74393C9.33976 8.13833 9.10038 8.49669 8.79855 8.79852C8.49672 9.10035 8.13836 9.33974 7.74395 9.50299C7.34955 9.66624 6.92684 9.75017 6.49999 9.74996ZM6.49999 4.33329C6.3066 4.336 6.11445 4.36477 5.92875 4.41883C6.08183 4.62685 6.15528 4.88283 6.1358 5.14036C6.11632 5.39789 6.00519 5.63992 5.82257 5.82254C5.63994 6.00516 5.39792 6.11629 5.14039 6.13577C4.88286 6.15525 4.62688 6.0818 4.41886 5.92873C4.30041 6.36513 4.32179 6.82768 4.48 7.2513C4.6382 7.67491 4.92527 8.03824 5.30079 8.29016C5.6763 8.54207 6.12137 8.66989 6.57333 8.65561C7.0253 8.64133 7.4614 8.48568 7.82027 8.21057C8.17914 7.93545 8.4427 7.55472 8.57385 7.12197C8.70501 6.68922 8.69715 6.22623 8.55139 5.79818C8.40563 5.37013 8.12931 4.99856 7.76131 4.73578C7.39331 4.47299 6.95218 4.33223 6.49999 4.33329Z" fill="#B1B1B1"/>
                                </svg>
                                <p>{{ strtolower($last_visited_at ?? 'no visit recorded') }}</p>
                            </li>
                        </ul>
                        <div class="wd-deposit-title">
                            <div class="wd-dlvr-id">
                                <h2>£{{roundBasedOnDecimal($quote->transporter_payment)}}</h2>
                                <p>Delivery ID: {{ $quotation_detail->delivery_reference_id ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="car_service_right">
                        <h1>{{$user_job->vehicle_make}} {{$user_job->vehicle_model}}
                            @if(!is_null($user_job->vehicle_make_1) && !is_null($user_job->vehicle_model_1))
                            / {{$user_job->vehicle_make_1}} {{$user_job->vehicle_model_1}}
                            @endif
                        </h1>
                        @php
                            $image = $user_job->image;
                            $defaultImage = asset('uploads/no_car_image.png');
                            $noQuoteImage = asset('uploads/no_quote.png');

                            if (is_null($image) || $image == $noQuoteImage) {
                                $image = $defaultImage;
                            }
                        @endphp
                        <div class="img-wrap">
                            <img src="{{ $image }}" class="img-fluid" alt="book delivery">
                        </div>
                        <p class="issue-txt">Having an issue with this delivery?</p>
                        <a href="javascript:;" class="wd-resolve-btn" data-toggle="modal" data-target="#resolve">Resolve now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 coll_det">
                <div class="collection_details">
                    <h2>Collection details</h2>
                    <div class="collection_list">
                        <span>Contact name:</span>
                        <b>{{ optional($quotation_detail)->collection_contact_name ?? 'Waiting for details' }}</b>
                    </div>
                    <div class="collection_list">
                        <span>Mobile number:</span>
                        <b>{{ optional($quotation_detail)->collection_mobile_number ?? 'Waiting for details' }}</b>

                    </div>
                    <div class="collection_list">
                        <span>Email address:</span>
                        <b>{{ optional($quotation_detail)->collection_email ?? 'Waiting for details' }}</b>
                    </div>
                    <div class="collection_list">
                        <span>Pickup address:</span>
                        @if(optional($quotation_detail)->collection_address)
                            <b>{{ $quotation_detail->collection_address }}</b>
                        @else
                            <b>
                                {{ optional($quotation_detail)->collection_address_1 ?? 'Waiting for details' }}<br>
                                {{ optional($quotation_detail)->collection_address_2 ?? '' }}<br>
                                {{ optional($quotation_detail)->collection_town ?? '' }}<br>
                                {{ optional($quotation_detail)->collection_country ?? '' }}
                            </b>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="collection_details">
                    <h2>Delivery details</h2>
                    <div class="collection_list">
                        <span>Contact name:</span>
                        <b>{{ optional($quotation_detail)->delivery_contact_name ?? 'Waiting for details' }}</b>
                    </div>
                    <div class="collection_list">
                        <span>Mobile number:</span>
                        <b>{{ optional($quotation_detail)->delivery_mobile_number ?? 'Waiting for details' }}</b>

                    </div>
                    <div class="collection_list">
                        <span>Email address:</span>
                        <b>{{ optional($quotation_detail)->delivery_email ?? 'Waiting for details' }}</b>
                    </div>
                    <div class="collection_list">
                        <span>Drop off address:</span>
                        @if(optional($quotation_detail)->delivery_address)
                            <b>{{ $quotation_detail->delivery_address }}</b>
                        @else
                            <b>
                                {{ optional($quotation_detail)->delivery_address_1 ?? 'Waiting for details' }}<br>
                                {{ optional($quotation_detail)->delivery_address_2 ?? '' }}<br>
                                {{ optional($quotation_detail)->delivery_town ?? '' }}<br>
                                {{ optional($quotation_detail)->delivery_country ?? '' }}
                            </b>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-12">

                <!-- <div class="series_flx series-listing">
                    <div class="series_lft">
                        <div class="job-list-img p-0">
                            <img src="https://hexeros.com/dev/transport-any-car-new/assets/web/images/feedback.png" class="img-fluid" alt="book delivery">
                        </div>
                    </div>
                </div> -->
                <div class="wd-transport-box">
                    <div class="wd-transport-lft">
                        <img src="{{checkFileExist($user->profile_image)}}" alt="transporter" class="img-fluid">
                        <span></span>
                    </div>
                    <div class="wd-transport-txt">
                        <div>
                            <h3>{{ $user->username ?? 'N/A' }}</h3>
                            <span>
                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_580_1850)">
                                <path d="M0.8125 11.7812C0.8125 12.4541 1.3584 13 2.03125 13H10.9688C11.6416 13 12.1875 12.4541 12.1875 11.7812V4.875H0.8125V11.7812ZM8.9375 6.80469C8.9375 6.63711 9.07461 6.5 9.24219 6.5H10.2578C10.4254 6.5 10.5625 6.63711 10.5625 6.80469V7.82031C10.5625 7.98789 10.4254 8.125 10.2578 8.125H9.24219C9.07461 8.125 8.9375 7.98789 8.9375 7.82031V6.80469ZM8.9375 10.0547C8.9375 9.88711 9.07461 9.75 9.24219 9.75H10.2578C10.4254 9.75 10.5625 9.88711 10.5625 10.0547V11.0703C10.5625 11.2379 10.4254 11.375 10.2578 11.375H9.24219C9.07461 11.375 8.9375 11.2379 8.9375 11.0703V10.0547ZM5.6875 6.80469C5.6875 6.63711 5.82461 6.5 5.99219 6.5H7.00781C7.17539 6.5 7.3125 6.63711 7.3125 6.80469V7.82031C7.3125 7.98789 7.17539 8.125 7.00781 8.125H5.99219C5.82461 8.125 5.6875 7.98789 5.6875 7.82031V6.80469ZM5.6875 10.0547C5.6875 9.88711 5.82461 9.75 5.99219 9.75H7.00781C7.17539 9.75 7.3125 9.88711 7.3125 10.0547V11.0703C7.3125 11.2379 7.17539 11.375 7.00781 11.375H5.99219C5.82461 11.375 5.6875 11.2379 5.6875 11.0703V10.0547ZM2.4375 6.80469C2.4375 6.63711 2.57461 6.5 2.74219 6.5H3.75781C3.92539 6.5 4.0625 6.63711 4.0625 6.80469V7.82031C4.0625 7.98789 3.92539 8.125 3.75781 8.125H2.74219C2.57461 8.125 2.4375 7.98789 2.4375 7.82031V6.80469ZM2.4375 10.0547C2.4375 9.88711 2.57461 9.75 2.74219 9.75H3.75781C3.92539 9.75 4.0625 9.88711 4.0625 10.0547V11.0703C4.0625 11.2379 3.92539 11.375 3.75781 11.375H2.74219C2.57461 11.375 2.4375 11.2379 2.4375 11.0703V10.0547ZM10.9688 1.625H9.75V0.40625C9.75 0.182812 9.56719 0 9.34375 0H8.53125C8.30781 0 8.125 0.182812 8.125 0.40625V1.625H4.875V0.40625C4.875 0.182812 4.69219 0 4.46875 0H3.65625C3.43281 0 3.25 0.182812 3.25 0.40625V1.625H2.03125C1.3584 1.625 0.8125 2.1709 0.8125 2.84375V4.0625H12.1875V2.84375C12.1875 2.1709 11.6416 1.625 10.9688 1.625Z" fill="#919191"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_580_1850">
                                <rect width="13" height="13" fill="white"/>
                                </clipPath>
                                </defs>
                                </svg>
                                {{$formattedDilveryDate}}
                            </span>
                        </div>

                    </div>
                </div>

                <div class="wd-delivr-box">
                    <span class="wd-date">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_580_1850)">
                        <path d="M0.8125 11.7812C0.8125 12.4541 1.3584 13 2.03125 13H10.9688C11.6416 13 12.1875 12.4541 12.1875 11.7812V4.875H0.8125V11.7812ZM8.9375 6.80469C8.9375 6.63711 9.07461 6.5 9.24219 6.5H10.2578C10.4254 6.5 10.5625 6.63711 10.5625 6.80469V7.82031C10.5625 7.98789 10.4254 8.125 10.2578 8.125H9.24219C9.07461 8.125 8.9375 7.98789 8.9375 7.82031V6.80469ZM8.9375 10.0547C8.9375 9.88711 9.07461 9.75 9.24219 9.75H10.2578C10.4254 9.75 10.5625 9.88711 10.5625 10.0547V11.0703C10.5625 11.2379 10.4254 11.375 10.2578 11.375H9.24219C9.07461 11.375 8.9375 11.2379 8.9375 11.0703V10.0547ZM5.6875 6.80469C5.6875 6.63711 5.82461 6.5 5.99219 6.5H7.00781C7.17539 6.5 7.3125 6.63711 7.3125 6.80469V7.82031C7.3125 7.98789 7.17539 8.125 7.00781 8.125H5.99219C5.82461 8.125 5.6875 7.98789 5.6875 7.82031V6.80469ZM5.6875 10.0547C5.6875 9.88711 5.82461 9.75 5.99219 9.75H7.00781C7.17539 9.75 7.3125 9.88711 7.3125 10.0547V11.0703C7.3125 11.2379 7.17539 11.375 7.00781 11.375H5.99219C5.82461 11.375 5.6875 11.2379 5.6875 11.0703V10.0547ZM2.4375 6.80469C2.4375 6.63711 2.57461 6.5 2.74219 6.5H3.75781C3.92539 6.5 4.0625 6.63711 4.0625 6.80469V7.82031C4.0625 7.98789 3.92539 8.125 3.75781 8.125H2.74219C2.57461 8.125 2.4375 7.98789 2.4375 7.82031V6.80469ZM2.4375 10.0547C2.4375 9.88711 2.57461 9.75 2.74219 9.75H3.75781C3.92539 9.75 4.0625 9.88711 4.0625 10.0547V11.0703C4.0625 11.2379 3.92539 11.375 3.75781 11.375H2.74219C2.57461 11.375 2.4375 11.2379 2.4375 11.0703V10.0547ZM10.9688 1.625H9.75V0.40625C9.75 0.182812 9.56719 0 9.34375 0H8.53125C8.30781 0 8.125 0.182812 8.125 0.40625V1.625H4.875V0.40625C4.875 0.182812 4.69219 0 4.46875 0H3.65625C3.43281 0 3.25 0.182812 3.25 0.40625V1.625H2.03125C1.3584 1.625 0.8125 2.1709 0.8125 2.84375V4.0625H12.1875V2.84375C12.1875 2.1709 11.6416 1.625 10.9688 1.625Z" fill="#919191"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_580_1850">
                        <rect width="13" height="13" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>
                        {{$formattedDilveryDate}}
                    </span>
                    <div class="wd-dlvr-txt">
                        <img src="{{asset('assets/web/images/delivery.png')}}" alt="delivery">
                        <h5>Delivery Booked</h5>
                        <p>{{ $user->username ?? 'N/A' }} has been notified about this booking. Your delivery reference is {{ $quotation_detail->delivery_reference_id ?? 'N/A' }}.</p>
                    </div>
                </div>

                <!-- <div class="wd-transport-box">
                    <div class="wd-transport-lft">
                        <img src="{{asset('assets/web/images/transporter.png')}}" alt="transporter" class="img-fluid">
                        <span></span>
                    </div>
                    <div class="wd-transport-txt">
                        <div>
                            <h3>Transporter101</h3>
                            <span>
                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_580_1850)">
                                <path d="M0.8125 11.7812C0.8125 12.4541 1.3584 13 2.03125 13H10.9688C11.6416 13 12.1875 12.4541 12.1875 11.7812V4.875H0.8125V11.7812ZM8.9375 6.80469C8.9375 6.63711 9.07461 6.5 9.24219 6.5H10.2578C10.4254 6.5 10.5625 6.63711 10.5625 6.80469V7.82031C10.5625 7.98789 10.4254 8.125 10.2578 8.125H9.24219C9.07461 8.125 8.9375 7.98789 8.9375 7.82031V6.80469ZM8.9375 10.0547C8.9375 9.88711 9.07461 9.75 9.24219 9.75H10.2578C10.4254 9.75 10.5625 9.88711 10.5625 10.0547V11.0703C10.5625 11.2379 10.4254 11.375 10.2578 11.375H9.24219C9.07461 11.375 8.9375 11.2379 8.9375 11.0703V10.0547ZM5.6875 6.80469C5.6875 6.63711 5.82461 6.5 5.99219 6.5H7.00781C7.17539 6.5 7.3125 6.63711 7.3125 6.80469V7.82031C7.3125 7.98789 7.17539 8.125 7.00781 8.125H5.99219C5.82461 8.125 5.6875 7.98789 5.6875 7.82031V6.80469ZM5.6875 10.0547C5.6875 9.88711 5.82461 9.75 5.99219 9.75H7.00781C7.17539 9.75 7.3125 9.88711 7.3125 10.0547V11.0703C7.3125 11.2379 7.17539 11.375 7.00781 11.375H5.99219C5.82461 11.375 5.6875 11.2379 5.6875 11.0703V10.0547ZM2.4375 6.80469C2.4375 6.63711 2.57461 6.5 2.74219 6.5H3.75781C3.92539 6.5 4.0625 6.63711 4.0625 6.80469V7.82031C4.0625 7.98789 3.92539 8.125 3.75781 8.125H2.74219C2.57461 8.125 2.4375 7.98789 2.4375 7.82031V6.80469ZM2.4375 10.0547C2.4375 9.88711 2.57461 9.75 2.74219 9.75H3.75781C3.92539 9.75 4.0625 9.88711 4.0625 10.0547V11.0703C4.0625 11.2379 3.92539 11.375 3.75781 11.375H2.74219C2.57461 11.375 2.4375 11.2379 2.4375 11.0703V10.0547ZM10.9688 1.625H9.75V0.40625C9.75 0.182812 9.56719 0 9.34375 0H8.53125C8.30781 0 8.125 0.182812 8.125 0.40625V1.625H4.875V0.40625C4.875 0.182812 4.69219 0 4.46875 0H3.65625C3.43281 0 3.25 0.182812 3.25 0.40625V1.625H2.03125C1.3584 1.625 0.8125 2.1709 0.8125 2.84375V4.0625H12.1875V2.84375C12.1875 2.1709 11.6416 1.625 10.9688 1.625Z" fill="#919191"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_580_1850">
                                <rect width="13" height="13" fill="white"/>
                                </clipPath>
                                </defs>
                                </svg>
                                January 08, 19:18
                            </span>
                        </div>
                        <p>Hello. My mobile 07987654321 Call me back ASAP please. Regards Transporter101</p>
                    </div>
                </div> -->

                <!-- <div class="wd-delivr-box">
                    <span class="wd-date">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_580_1850)">
                        <path d="M0.8125 11.7812C0.8125 12.4541 1.3584 13 2.03125 13H10.9688C11.6416 13 12.1875 12.4541 12.1875 11.7812V4.875H0.8125V11.7812ZM8.9375 6.80469C8.9375 6.63711 9.07461 6.5 9.24219 6.5H10.2578C10.4254 6.5 10.5625 6.63711 10.5625 6.80469V7.82031C10.5625 7.98789 10.4254 8.125 10.2578 8.125H9.24219C9.07461 8.125 8.9375 7.98789 8.9375 7.82031V6.80469ZM8.9375 10.0547C8.9375 9.88711 9.07461 9.75 9.24219 9.75H10.2578C10.4254 9.75 10.5625 9.88711 10.5625 10.0547V11.0703C10.5625 11.2379 10.4254 11.375 10.2578 11.375H9.24219C9.07461 11.375 8.9375 11.2379 8.9375 11.0703V10.0547ZM5.6875 6.80469C5.6875 6.63711 5.82461 6.5 5.99219 6.5H7.00781C7.17539 6.5 7.3125 6.63711 7.3125 6.80469V7.82031C7.3125 7.98789 7.17539 8.125 7.00781 8.125H5.99219C5.82461 8.125 5.6875 7.98789 5.6875 7.82031V6.80469ZM5.6875 10.0547C5.6875 9.88711 5.82461 9.75 5.99219 9.75H7.00781C7.17539 9.75 7.3125 9.88711 7.3125 10.0547V11.0703C7.3125 11.2379 7.17539 11.375 7.00781 11.375H5.99219C5.82461 11.375 5.6875 11.2379 5.6875 11.0703V10.0547ZM2.4375 6.80469C2.4375 6.63711 2.57461 6.5 2.74219 6.5H3.75781C3.92539 6.5 4.0625 6.63711 4.0625 6.80469V7.82031C4.0625 7.98789 3.92539 8.125 3.75781 8.125H2.74219C2.57461 8.125 2.4375 7.98789 2.4375 7.82031V6.80469ZM2.4375 10.0547C2.4375 9.88711 2.57461 9.75 2.74219 9.75H3.75781C3.92539 9.75 4.0625 9.88711 4.0625 10.0547V11.0703C4.0625 11.2379 3.92539 11.375 3.75781 11.375H2.74219C2.57461 11.375 2.4375 11.2379 2.4375 11.0703V10.0547ZM10.9688 1.625H9.75V0.40625C9.75 0.182812 9.56719 0 9.34375 0H8.53125C8.30781 0 8.125 0.182812 8.125 0.40625V1.625H4.875V0.40625C4.875 0.182812 4.69219 0 4.46875 0H3.65625C3.43281 0 3.25 0.182812 3.25 0.40625V1.625H2.03125C1.3584 1.625 0.8125 2.1709 0.8125 2.84375V4.0625H12.1875V2.84375C12.1875 2.1709 11.6416 1.625 10.9688 1.625Z" fill="#919191"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_580_1850">
                        <rect width="13" height="13" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>
                        January 08, 19:18
                    </span>
                    <div class="wd-dlvr-txt">
                        <img src="{{asset('assets/web/images/deliver-user.png')}}" alt="deliver user">
                        <p>{{ $user->username ?? 'N/A' }} has been invited to join the conversation</p>
                    </div>
                </div> -->
                <div class="wd-quote-msg" id="chat_history_main"></div>
                <form id="chat__form" action="{{route('transporter.message.quote_send_message')}}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <?php
                    $thread = App\Thread::where('user_id',$friend_id)->where('friend_id', Auth::user()->id)->where('user_quote_id', $quote->user_quote_id)->first();
                    ?>
                    <input type="hidden" name="form_page" id="form_page" value="delivery_admin">
                    <input type="hidden" name="user_id" value="{{$friend_id}}">
                    <input type="hidden" name="user_quote_id" value="{{$quote->user_quote_id}}">
                    <input type="hidden" name="user_current_chat_id" id="user_current_chat_id" value="{{$thread ? $thread->id : 0}}">
                    <div class="form-group">
                        <textarea class="form-control textarea" placeholder="Write something here..... "></textarea>
                    </div>
                    <div class="message-error" style="display:none" >Please enter your message.</div>
                    <a href="javascript:;" class="send-msg" onclick="sendMessage();" id="send_message">Send message
                        <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.7637 1.65906L14.2551 13.4895C14.0658 14.3245 13.5722 14.5323 12.8709 14.1389L9.04861 11.3223L7.20428 13.0962C7.00018 13.3003 6.82947 13.471 6.43611 13.471L6.71072 9.5782L13.7949 3.17683C14.1029 2.90222 13.7281 2.75007 13.3162 3.02468L4.55838 8.53913L0.788066 7.35906C-0.0320513 7.103 -0.0468951 6.53894 0.958769 6.14558L15.706 0.464134C16.3888 0.208079 16.9863 0.616282 16.7637 1.65906Z" fill="white"/>
                        </svg>
                    </a>
                </form>
            </div>
        </div>
    </section>
    </div>
    <!-- Modal -->
    <div class="modal resolve_bx fade" id="resolve" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Resolve a delivery</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">
                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.93934 15.9393C0.353553 16.5251 0.353553 17.4749 0.93934 18.0607C1.52513 18.6464 2.47487 18.6464 3.06066 18.0607L0.93934 15.9393ZM10.5607 10.5607C11.1464 9.97487 11.1464 9.02513 10.5607 8.43934C9.97487 7.85355 9.02513 7.85355 8.43934 8.43934L10.5607 10.5607ZM8.43934 8.43934C7.85355 9.02513 7.85355 9.97487 8.43934 10.5607C9.02513 11.1464 9.97487 11.1464 10.5607 10.5607L8.43934 8.43934ZM18.0607 3.06066C18.6464 2.47487 18.6464 1.52513 18.0607 0.93934C17.4749 0.353553 16.5251 0.353553 15.9393 0.93934L18.0607 3.06066ZM10.5607 8.43934C9.97487 7.85355 9.02513 7.85355 8.43934 8.43934C7.85355 9.02513 7.85355 9.97487 8.43934 10.5607L10.5607 8.43934ZM15.9393 18.0607C16.5251 18.6464 17.4749 18.6464 18.0607 18.0607C18.6464 17.4749 18.6464 16.5251 18.0607 15.9393L15.9393 18.0607ZM8.43934 10.5607C9.02513 11.1464 9.97487 11.1464 10.5607 10.5607C11.1464 9.97487 11.1464 9.02513 10.5607 8.43934L8.43934 10.5607ZM3.06066 0.93934C2.47487 0.353553 1.52513 0.353553 0.93934 0.93934C0.353553 1.52513 0.353553 2.47487 0.93934 3.06066L3.06066 0.93934ZM3.06066 18.0607L10.5607 10.5607L8.43934 8.43934L0.93934 15.9393L3.06066 18.0607ZM10.5607 10.5607L18.0607 3.06066L15.9393 0.93934L8.43934 8.43934L10.5607 10.5607ZM8.43934 10.5607L15.9393 18.0607L18.0607 15.9393L10.5607 8.43934L8.43934 10.5607ZM10.5607 8.43934L3.06066 0.93934L0.93934 3.06066L8.43934 10.5607L10.5607 8.43934Z" fill="#CFCFCF"/>
                    </svg>
                </span>
            </button>
        </div>
        <div class="modal-body">
            <form id="resolveForm">
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::guard('transporter')->user()->username }}" placeholder="Name*">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::guard('transporter')->user()->email }}" placeholder="Email*">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="delivery" name="delivery" value="{{ $quotation_detail->delivery_reference_id ?? '' }}" placeholder="Delivery ref*" {{ isset($delivery_info->delivery_reference_id) ? 'disabled' : '' }}>
                </div>
                <div class="form-group">
                    <textarea class="form-control help-msg" name="message" placeholder="How can we help?"></textarea>
                </div>
                <div class="form-group text-center">
                    <button class="admin_snd_btn">Send message 
                        <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.7637 1.65893L14.2551 13.4894C14.0658 14.3244 13.5722 14.5322 12.8709 14.1388L9.04861 11.3222L7.20428 13.096C7.00018 13.3001 6.82947 13.4708 6.43611 13.4708L6.71072 9.57807L13.7949 3.17671C14.1029 2.9021 13.7281 2.74995 13.3162 3.02456L4.55838 8.53901L0.788066 7.35893C-0.0320513 7.10288 -0.0468951 6.53882 0.958769 6.14546L15.706 0.464011C16.3888 0.207957 16.9863 0.61616 16.7637 1.65893Z" fill="white"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        
        </div>
    </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/web/js/admin.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.40/moment-timezone-with-data.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.2/tinymce.min.js"></script>
<script>
$(document).ready(function() {
    $('#resolveForm').validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            delivery: {
                required: true
            },
            message: {
                required: true
            }
        },
        messages: {
            name: {
                required: "Please enter name"
            },
            email: {
                required: "Please enter email address",
                email: "Please enter a valid email address"
            },
            delivery: {
                required: "Please enter delivery reference"
            },
            message: {
                required: "Please enter message"
            }
        },
        submitHandler: function(form) {
            $('.admin_snd_btn').text('Please wait!..');
            $('.admin_snd_btn').attr('disabled', true); 
            const email = "support@transportanycar.com";
            const template = 'mail.General.resolve-a-delivery';
            const user = { 
                name: $('#name').val(),
                email: $('#email').val(),
                delivery_ref: $('#delivery').val(),
                message: $('.help-msg').val(),
            };

            $.ajax({
                url: "{{ route('send-email') }}",
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    email: email,
                    template: template,
                    subject: 'Resolve a delivery',
                    user: user
                }),
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // If you're using Laravel's CSRF protection
                },
                success: function(response) {
                    $('.admin_snd_btn').text('Send message');
                    $('.admin_snd_btn').attr('disabled', false); 
                    Swal.fire({
                        title: '<span class="swal-title">Thank You</span>',
                        html: '<span class="swal-text">Your request has been sent.</span>',
                        confirmButtonColor: '#52D017',
                        confirmButtonText: 'Ok',
                        customClass: {
                            title: 'swal-title',
                            htmlContainer: 'swal-text-container',
                            popup: 'swal-popup', // Add custom class for the popup
                            cancelButton: 'swal-button--cancel' // Add custom class for the cancel button
                        },
                        showCloseButton: true, // Add this line to show the close button
                        showConfirmButton: true, // Add this line to hide the confirm button
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed || result.isDismissed) {
                            $(form)[0].reset();
                            $('#resolve').modal('hide');
                        }
                    });
                },
                error: function(xhr, status, error) {
                }
            });
        }
    });
});
</script>
<script>
    function sendMessage() {
        $('#chat__form').submit();
    }

    function isEmptyOrSpaces(str) {
        return str === null || str.match(/^ *$/) !== null;
    }

    function getChatHistory(url, thisobj) {
        var elems = document.querySelector(".active");
        var timezone = moment.tz.guess();
        var from_page = $('#form_page').val();
        console.log(timezone);

        // if(elems !==null){
        //     elems.classList.remove("active");
        // }
        $(thisobj).find("li").addClass('active');
        $.ajax({
            url: url,
            data: {"timezone": timezone,'from_page': from_page},
            dataType: "json",
        }).done(function(response) {
            $('.msg-no').text(response.totalmessagecount);                
            $("#chat_history_main").html(response.html);
            // $(thisobj).find(".kt-widget__item").find('.kt-widget__action').html('');
            // KTAppChat.init();
            // scrollToBottom();
            // getTotalUnreadMessage();
        });
    }


    var send_message = false;

    $('#chat__form').on('submit', function(e) {
        e.preventDefault();
        var message = $('.textarea').val();
        var send_message = false;
        if (!message.trim()) {
            $('.message-error').css('display', 'block');
            return;
        }
        if (!isEmptyOrSpaces(message)) {
            send_message = true;
        }
        if (send_message == true) {
            $("#send_message").prop("disabled", true);
            $("#send_message").text("Please Wait...");
            var file_type = $('#file_type').val();
            $('.textarea').val('');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                }
            });
            var timezone = moment.tz.guess();
            var data = new FormData(this);
            data.append('message', message);
            data.append('file_type', file_type);
            data.append('timezone', timezone);

            $.ajax({
                url: $(this).attr('action'),
                method: "POST",
                data: data,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
            }).done(function(response) {
                $("#send_message").prop("disabled", false);
                $("#send_message").html("Send message <svg width='17' height='15' viewBox='0 0 17 15' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M16.7637 1.65906L14.2551 13.4895C14.0658 14.3245 13.5722 14.5323 12.8709 14.1389L9.04861 11.3223L7.20428 13.0962C7.00018 13.3003 6.82947 13.471 6.43611 13.471L6.71072 9.5782L13.7949 3.17683C14.1029 2.90222 13.7281 2.75007 13.3162 3.02468L4.55838 8.53913L0.788066 7.35906C-0.0320513 7.103 -0.0468951 6.53894 0.958769 6.14558L15.706 0.464134C16.3888 0.208079 16.9863 0.616282 16.7637 1.65906Z' fill='white'/></svg>");
                if (response.status == "success") {
                    window.location.reload();
                }
                //scrollToBottom();
                //$(".kt-avatar__cancel").click();
            });
        }
    });


    $(document).ready(function () {
        function updateChat() {
            var selected_chat_id = $("#user_current_chat_id").val();
            var url = "{{route('transporter.message.quote_history', ':chat_id')}}";
            url = url.replace(':chat_id', selected_chat_id);
            getChatHistory(url, $(".get-chat-history")[0]);

            {{--var url = "{{route('transporter.message.history',($latest_chat->id) ?? 0)}}"--}}
            {{--getChatHistory(url,$(".get-chat-history")[0]);--}}
        }
        updateChat();
        $('.textarea').on('keyup', function() {
            $('.message-error').css('display','none');
        })
        //setInterval(updateChat, 5000);
    });

</script>
@endsection