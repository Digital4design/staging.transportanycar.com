@extends('layouts.web.dashboard.app')

@section('head_css')
@endsection
<style>
    .wd-transport-img img {
        width: 20%;
    }
    .feedback-view {
        padding: 20px 0 70px !important;
    }
    .wd-transport-dtls {
    position: relative;
}
.feedback_right_sec .accept_grp {
    position: absolute;
    right: 15px;
    margin: 0;
    top: 0;
}

.feedback_right_sec .wd-transport-img {
    margin-bottom: 15px;
}
.feedback_right_sec .wd-transport-area {
    display: block;
}
.feedback_right_sec .wd-transport-rght ul li p {
    min-width: 160px;
}
.wd-transport-dtls h1 {
    text-transform: capitalize;
}
.page-item:last-child .page-link {
    padding-bottom: 3px;
    font-size: 16px;
}
.page-item:first-child .page-link {
    padding-bottom: 3px;
    font-size: 16px;
}

ul.pagination {
    padding: 5px 0;
}
.table-responsive {
    border: 1px solid #C3C3C3;
}
.feedback-time-line table {
    border: none !important;
}
@media(max-width: 580px){
    .feedback_right_sec {
        margin-bottom: 40px;
    }
    .feedback-tbl {
        border-radius: 10px !important;
        overflow: hidden;
    }
    .accept_grp {
        margin: 24px auto 20px !important; 
    }
    .fedback-txt {
        padding: 16px 30px 0 !important;
    }
    .table-responsive {
        border: 1px solid #C3C3C3;
    }
}
</style>

@section('content')
    @include('layouts.web.dashboard.header')
    <section class="feedback-view">
        <div class="container">
            <div class="wd-white-box">
                <div class="wd-feedback-box">
                    <div class="row wd-pb">
                        <div class="col-lg-6 feedback_right_sec">
                            <div class="wd-transport-dtls">
                                <h1>{{$user->username ?? '-'}} 
                                    <!-- <span>({{count($feedback)}})</span> -->
                                </h1>
                                @if($quote->status != 'accept')
                                <div class="accept_grp">
                                    <a href="javascript:;" class="wd-accept-btn"  onclick="quoteChangeStatus({{ $quote->id }})" >Accept quote</a>
                                </div>
                                @endif
                                <ul class="wd-star-lst">
                                    <li>
                                        <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z" fill="#FFA800" />
                                        </svg>
                                    </li>
                                    <li>
                                        <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z" fill="#FFA800" />
                                        </svg>
                                    </li>
                                    <li>
                                        <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z" fill="#FFA800" />
                                        </svg>
                                    </li>
                                    <li>
                                        <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z" fill="#FFA800" />
                                        </svg>
                                    </li>
                                    <li>
                                        <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z" fill="#FFA800" />
                                        </svg>
                                    </li>
                                    <!-- <li>({{$overall_percentage}}%)</li> -->
                                    <li>({{100}}%)</li>
                                </ul>
                                <div class="wd-transport-area">
                                    <div class="wd-transport-img">
                                        <img src="{{ $user->profile_image }}" alt="trasporter feedback" class="img-fluid">
                                    </div>
                                    <div class="wd-transport-rght">
                                        <ul>
                                            <li>
                                                <p>Positive feedback:</p>
                                                <span class="wd-black">{{$positive_feedback_percentage}}%</span>
                                            </li>
                                            <!-- <li>
                                                <p>Completed jobs:</p>
                                                <span>{{$completed_job}}</span>
                                            </li> -->
                                            @if($user->is_status == 'approved')
                                            <li>
                                                <p>Insurance:</p>
                                                <span class="verify-btn">
                                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4.41537 11.1567L0.190373 6.93169C-0.0634575 6.67786 -0.0634575 6.2663 0.190373 6.01245L1.10959 5.0932C1.36342 4.83935 1.775 4.83935 2.02883 5.0932L4.87499 7.93934L10.9712 1.8432C11.225 1.58937 11.6366 1.58937 11.8904 1.8432L12.8096 2.76245C13.0634 3.01628 13.0634 3.42783 12.8096 3.68169L5.33462 11.1567C5.08076 11.4105 4.6692 11.4105 4.41537 11.1567Z" fill="#52D017" />
                                                </svg>Verified </span>
                                            </li>
                                            @endif
                                            <li>
                                                <p>Payment method:</p>
                                                <span>Credit/Debit Card, Cash, <br />Paypal, Visa, Cheque </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="feedback-time-line">
                                <h2>Feedback timeline</h2>
                                <div class="table-responsive">
                                    <table>
                                        <thead>
                                        <th></th>
                                        <th>1 month</th>
                                        <th>6 month</th>
                                        <th>12 month</th>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th>
                                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3.04688 6.5625H0.703125C0.314795 6.5625 0 6.87729 0 7.26562V14.2969C0 14.6852 0.314795 15 0.703125 15H3.04688C3.43521 15 3.75 14.6852 3.75 14.2969V7.26562C3.75 6.87729 3.43521 6.5625 3.04688 6.5625ZM1.875 13.8281C1.48667 13.8281 1.17188 13.5133 1.17188 13.125C1.17188 12.7367 1.48667 12.4219 1.875 12.4219C2.26333 12.4219 2.57813 12.7367 2.57813 13.125C2.57813 13.5133 2.26333 13.8281 1.875 13.8281ZM11.25 2.38629C11.25 3.62895 10.4892 4.32598 10.2751 5.15625H13.2553C14.2337 5.15625 14.9954 5.96912 15 6.85834C15.0024 7.38387 14.7789 7.94962 14.4305 8.29966L14.4273 8.30288C14.7154 8.98658 14.6686 9.94459 14.1546 10.6311C14.4089 11.3897 14.1525 12.3216 13.6746 12.8212C13.8005 13.3368 13.7404 13.7756 13.4945 14.1288C12.8966 14.9879 11.4145 15 10.1613 15L10.078 15C8.6633 14.9995 7.50551 14.4844 6.57522 14.0705C6.10773 13.8625 5.49648 13.6051 5.03271 13.5966C4.84111 13.593 4.6875 13.4367 4.6875 13.2451V6.98227C4.6875 6.88852 4.72506 6.79854 4.79174 6.73263C5.95231 5.58583 6.45135 4.37168 7.40259 3.41883C7.8363 2.9843 7.99404 2.32793 8.14653 1.69318C8.27681 1.15116 8.54933 0 9.14063 0C9.84376 0 11.25 0.234375 11.25 2.38629Z" fill="#52D017"/>
                                                </svg>

                                                <span>Positive</span>
                                            </th>
                                            <td>{{$monthly_positive_feedback}}</td>
                                            <td>{{$six_monthly_positive_feedback}}</td>
                                            <td>{{$yearly_positive_feedback}}</td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_681_2389)">
                                                        <path d="M0 9C0 7.20979 0.948212 5.4929 2.63604 4.22703C4.32387 2.96116 6.61305 2.25 9 2.25C11.3869 2.25 13.6761 2.96116 15.364 4.22703C17.0518 5.4929 18 7.20979 18 9C18 10.7902 17.0518 12.5071 15.364 13.773C13.6761 15.0388 11.3869 15.75 9 15.75H7.875C6.75 16.875 4.5 18 2.25 18C2.8125 17.4375 3.375 15.75 3.375 14.2734C2.32109 13.6406 1.47052 12.838 0.886292 11.9252C0.302065 11.0123 -0.000843048 10.0126 0 9Z" fill="#292929" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_681_2389">
                                                            <rect width="18" height="18" fill="white" transform="matrix(-1 0 0 1 18 0)" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <span> Neutral </span>
                                            </th>
                                            <td>{{$monthly_neutral_feedback}}</td>
                                            <td>{{$six_monthly_neutral_feedback}}</td>
                                            <td>{{$yearly_neutral_feedback}}</td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_681_2375)">
                                                        <path d="M0 1.64062V8.67188C0 9.06021 0.314795 9.375 0.703125 9.375H3.04687C3.4352 9.375 3.75 9.06021 3.75 8.67188V1.64062C3.75 1.25229 3.4352 0.9375 3.04687 0.9375H0.703125C0.314795 0.9375 0 1.25229 0 1.64062ZM1.17187 7.5C1.17187 7.11167 1.48667 6.79688 1.875 6.79688C2.26333 6.79688 2.57812 7.11167 2.57812 7.5C2.57812 7.88833 2.26333 8.20312 1.875 8.20312C1.48667 8.20312 1.17187 7.88833 1.17187 7.5ZM9.14062 15C8.54932 15 8.27681 13.8488 8.14655 13.3068C7.99403 12.672 7.83633 12.0157 7.40262 11.5811C6.45138 10.6283 5.95233 9.41414 4.79177 8.26734C4.75874 8.2347 4.73252 8.19582 4.71463 8.15297C4.69674 8.11012 4.68752 8.06414 4.68753 8.0177V1.75491C4.68753 1.56328 4.84113 1.40692 5.03273 1.40341C5.49653 1.39491 6.10775 1.13742 6.57524 0.929443C7.50554 0.515566 8.66335 0.000498047 10.078 0H10.1613C11.4145 0 12.8965 0.0120996 13.4945 0.871201C13.7404 1.22443 13.8006 1.66321 13.6746 2.17878C14.1525 2.67838 14.4089 3.61031 14.1546 4.36893C14.6686 5.05541 14.7154 6.01342 14.4273 6.69712L14.4305 6.70034C14.7789 7.05041 15.0025 7.61613 15 8.14166C14.9954 9.03088 14.2337 9.84375 13.2553 9.84375H10.2751C10.4892 10.674 11.25 11.3711 11.25 12.6137C11.25 14.7656 9.84375 15 9.14062 15Z" fill="#ED1C24" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_681_2375">
                                                            <rect width="15" height="15" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <span> Negative</span>
                                            </th>
                                            <td>{{$monthly_negative_feedback}}</td>
                                            <td>{{$six_monthly_negative_feedback}}</td>
                                            <td>{{$yearly_negative_feedback}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="feedback-tbl" id="feedback_listing">
                            </div>
                            <p class="fedback-txt">Please note above company information is provided by the transport provider and should be verified for accuracy.</p>
                        </div>
                    </div>
                    @if($quote->status != 'accept')
                    <div class="accept_grp">
                        <a href="javascript:;" onclick="quoteChangeStatus({{ $quote->id }})" class="wd-accept-btn">Accept quote</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
<script>
    var transport_id = "{{$user->id}}";
    var globalSiteUrl = "{{ route('front.feedback_listing', ['id' => ':transport_id']) }}";
    globalSiteUrl = globalSiteUrl.replace(':transport_id', transport_id);
    function fetch_data(page) {
        $.ajax({
            url: globalSiteUrl + "?page=" + page,
            type: 'GET',
            success: function (res) {
                let result = res.data;
                if (result){
                    $('#feedback_listing').html(result.html);
                }
            }
        });
    }
    $(document).ready(function () {
        fetch_data(1);
    });

    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        $('#page').val(page);
        fetch_data(page);
    });
    function quoteChangeStatus(quote_id) {
        var url = "{{ route('front.checkout', ['id' => ':quote_id']) }}";
        url = url.replace(':quote_id', quote_id);
        window.location.href = url;
        return;
    }
</script>
@endsection

