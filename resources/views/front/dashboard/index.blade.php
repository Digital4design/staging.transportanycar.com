@extends('layouts.web.dashboard.app')

@section('head_css')
@endsection
<style>
    .wd-file-upload .input-preview p {
        position: inherit !important;
        color: #5F5F5F;
    }

    .wd-file-upload img.img-fluid {
        width: 40px !important;
        height: 40px !important;
        object-fit: contain !important;
        margin-bottom: 4px !important;
    }

    .great_job_sec h2 {
        font-size: 20px;
        text-align: center;
        margin-bottom: 17px;
    }

    .job-list-img .job-list-img-sec {
        background: #e8f0fb;
        height: 92px;
        border-radius: 6px;
        width: 132px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .job-list-img .job-list-img-sec img {
        width: 50px;
        height: 50px;
        min-width: 50px;
        object-fit: contain;
    }

    .active-job-box.active_job_mobile ul {
        gap: 10PX;
    }

    .job-list-img .job-list-img-sec img {
        width: 100%;
        height: 100%;
    }

    .job-listing ul li.job-list-img {
        width: 162px;
    }

    .job-list-img .job-list-img-sec {
        background: none;
    }

    .active_job_mobile .quote_grp_btns {
        padding: 30px 0 0;
    }

    @media(max-width: 580px) {
        .active-job-box.active_job_mobile {
            margin: 0;
        }

        .wd-active-job .active_job_mobile .job-listing {
            border-radius: 10px;
            padding: 10px 20px 20px;
        }

        .active_job_mobile .input-preview {
            width: 132px;
            height: 92px;
        }

        .active-job-box.active_job_mobile ul {
            display: flex;
            overflow: hidden;
            clear: both;
            justify-content: unset;
            flex-wrap: wrap;
            gap: 20px;
            row-gap: 30px;
        }

        .active-job-box.active_job_mobile ul li {
            height: auto;
            display: block;
            width: 46%;
        }

        .active-job-box.active_job_mobile ul li.view-quote a {
            width: 100%;
        }

        .active-job-box.active_job_mobile ul li.job-img {
            order: 1;
        }

        .active-job-box.active_job_mobile ul li.view-quote {
            order: 2;
            display: flex;
            margin-top: 7px;
            flex-direction: column;
            gap: 15px;
        }

        .active-job-box.active_job_mobile ul li.job-access {
            order: 3;
            position: absolute;
            right: 8px;
            top: 85px;
            /* display: none; */
        }

        .active-job-box.active_job_mobile ul li.job-access.completed_jobs {
            display: none;
        }

        .active-job-box.active_job_mobile ul li.job-access a.wd-blue {
            display: block;
            margin-bottom: 3px;
        }

        .active-job-box.active_job_mobile ul li.list_detail {
            order: 4;
        }

        .active-job-box.active_job_mobile ul li.list_detail {
            order: 5;
        }

        .active_job_mobile .job-access::before {
            display: none;
        }

        .bidding_new_design_date.job_new_grid_date {
            padding-left: 0 !important;
        }

        .active-job-box.active_job_mobile ul li.job-access {
            top: 110px;
        }

        .bidding_new_design {
            padding: 0 0px 5px !important;
        }

        .active-job-box.active_job_mobile ul li.job-access.completed_jobs {
            top: 100px;
        }

        .active_job_mobile .quote_grp_btns {
            padding: 15px 0 15px;
        }

        .job-list-img .job-list-img-sec img {
            object-fit: cover;
        }
    }
</style>
@section('content')
    @include('layouts.web.dashboard.header')
    <section class="wd-active-job great_job_sec_new">
        <div class="container great_job_sec">
            @if (session()->has('came_from') && session('came_from') == 'quote_save')
                <h2>Great news!</h2>
                <p class="subheader">Your job has been sent to our network of transport companies and you will start to
                    receive quotes shortly.</p>
                <ul class="checklist">
                    <li>Start receiving quotes via email in minutes.</li>
                    <li>Choose the best quote for you based on price and feedback.</li>
                    <li>Accept the quote and arrange collection.</li>
                </ul>
            @endif
            <div class="active-job-box active_job_mobile">
                <h1 class="wd-active-title">Active quote requests</h1>
                @forelse($data as $key => $item)
                    @php
                        $lowestBid = $item->lowest_bid ?? 0;
                        $transporterQuotesCount = $item->quotes_count ?? 0;
                    @endphp
                    <div class="job-listing">
                        <div class="bidding_new_design_date job_new_grid_date">
                            <span>Expiry date:</span>
                            <span>
                                {{ formatCustomDate($item->created_at->addDays(10)) }}
                            </span>
                        </div>
                        <ul>
                            @php
                                $imageUrl = checkCarFileExist($item->image);
                                $defaultImages = [asset('uploads/svg_image.png')];
                                $isDefaultImage = in_array($imageUrl, $defaultImages);
                                $imageClass = $isDefaultImage ? '' : 'car-image';
                            @endphp
                            <li class="job-img">
                                <div class="wd-file-upload {{ $imageClass }}">
                                    <label for="upload file" class="input-preview">
                                        <img src="{{ $item->image }}" alt="active job" class="img-fluid"
                                            id="image_preview_{{ $item->id }}">
                                        <p>Upload your car photo <br />(recommended)</p>
                                    </label>
                                    <input type="file" name="upload file" class="input-preview__src"
                                        id="uploadImage{{ $item->id }}"
                                        onclick="uploadImageQuote('{{ $item->id }}');">
                                </div>
                            </li>

                            <li class="list_detail">
                                <span>
                                    <img src="{{ asset('assets/web/images/dashboard/map-icon.svg') }}" alt="Map Icon">
                                </span>
                                <p>Pick-up postcode:</p>
                                <p><b>{{ formatAddress($item->pickup_postcode) }}</b></p>
                            </li>


                            <li class="list_detail">
                                <span>
                                    <img src="{{ asset('assets/web/images/dashboard/red-map-icon.svg') }}" alt="Map Icon">
                                </span>
                                <p>Drop-off area:</p>
                                <p><b>{{ formatAddress($item->drop_postcode) }}</b></p>
                            </li>

                            <li class="list_detail">
                                <span>
                                    <img src="{{ asset('assets/web/images/dashboard/car-icon.svg') }}" alt="Car Icon">
                                </span>
                                <p>Make &amp; model:</p>
                                <p><b>{{ $item->vehicle_make }} {{ $item->vehicle_model }}</b></p>
                            </li>

                            <li class="list_detail">
                                <span>
                                    <svg width="19" height="22" viewBox="0 0 19 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.85714 4.33929C6.36012 4.33929 6.76786 3.93155 6.76786 3.42857C6.76786 2.9256 6.36012 2.51786 5.85714 2.51786V4.33929ZM13.1429 2.51786C12.6399 2.51786 12.2321 2.9256 12.2321 3.42857C12.2321 3.93155 12.6399 4.33929 13.1429 4.33929V2.51786ZM5.85714 2.51786C5.35417 2.51786 4.94643 2.9256 4.94643 3.42857C4.94643 3.93155 5.35417 4.33929 5.85714 4.33929V2.51786ZM13.1429 4.33929C13.6458 4.33929 14.0536 3.93155 14.0536 3.42857C14.0536 2.9256 13.6458 2.51786 13.1429 2.51786V4.33929ZM6.76786 3.42857C6.76786 2.9256 6.36012 2.51786 5.85714 2.51786C5.35417 2.51786 4.94643 2.9256 4.94643 3.42857H6.76786ZM4.94643 4.64286C4.94643 5.14583 5.35417 5.55357 5.85714 5.55357C6.36012 5.55357 6.76786 5.14583 6.76786 4.64286H4.94643ZM4.94643 3.42857C4.94643 3.93155 5.35417 4.33929 5.85714 4.33929C6.36012 4.33929 6.76786 3.93155 6.76786 3.42857H4.94643ZM6.76786 1C6.76786 0.497026 6.36012 0.0892857 5.85714 0.0892857C5.35417 0.0892857 4.94643 0.497026 4.94643 1L6.76786 1ZM14.0536 3.42857C14.0536 2.9256 13.6458 2.51786 13.1429 2.51786C12.6399 2.51786 12.2321 2.9256 12.2321 3.42857H14.0536ZM12.2321 4.64286C12.2321 5.14583 12.6399 5.55357 13.1429 5.55357C13.6458 5.55357 14.0536 5.14583 14.0536 4.64286H12.2321ZM12.2321 3.42857C12.2321 3.93155 12.6399 4.33929 13.1429 4.33929C13.6458 4.33929 14.0536 3.93155 14.0536 3.42857H12.2321ZM14.0536 1C14.0536 0.497026 13.6458 0.0892857 13.1429 0.0892857C12.6399 0.0892857 12.2321 0.497026 12.2321 1L14.0536 1ZM5.85714 2.51786C2.67164 2.51786 0.0892849 5.10021 0.0892849 8.28571H1.91071C1.91071 6.10616 3.67759 4.33929 5.85714 4.33929V2.51786ZM0.0892849 8.28571V15.5714H1.91071V8.28571H0.0892849ZM0.0892849 15.5714C0.0892849 18.7569 2.67164 21.3393 5.85714 21.3393V19.5179C3.67759 19.5179 1.91071 17.751 1.91071 15.5714H0.0892849ZM5.85714 21.3393H13.1429V19.5179H5.85714V21.3393ZM13.1429 21.3393C16.3284 21.3393 18.9107 18.7569 18.9107 15.5714H17.0893C17.0893 17.751 15.3224 19.5179 13.1429 19.5179V21.3393ZM18.9107 15.5714V8.28571H17.0893V15.5714H18.9107ZM18.9107 8.28571C18.9107 5.10021 16.3284 2.51786 13.1429 2.51786V4.33929C15.3224 4.33929 17.0893 6.10616 17.0893 8.28571H18.9107ZM5.85714 4.33929L13.1429 4.33929V2.51786L5.85714 2.51786V4.33929ZM4.94643 3.42857V4.64286H6.76786V3.42857H4.94643ZM6.76786 3.42857V1L4.94643 1V3.42857H6.76786ZM12.2321 3.42857V4.64286H14.0536V3.42857H12.2321ZM14.0536 3.42857V1L12.2321 1V3.42857H14.0536Z"
                                            fill="#008DD4" />
                                        <path d="M4.64062 11.9286L7.0692 15.5714L14.3549 9.5" stroke="#008DD4"
                                            stroke-width="1.82143" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                </span>
                                <p>Delivery date:</p>
                                <p>
                                    <b>
                                        @if ($item->delivery_timeframe_from)
                                            {{ formatCustomDate($item->delivery_timeframe_from) }}
                                        @else
                                            {{ $item->delivery_timeframe }}
                                        @endif
                                    </b>
                                </p>
                            </li>
                            {{-- <li class="view-quote">
                        <a href="{{route('front.quotes', $item->id)}}">View quotes</a>
                    </li> --}}



                            @if ($item->status == 'pending')
                                <li class="view-quote">
                                    <a href="{{ route('front.quotes', $item->id) }}">View quotes</a>
                                </li>
                                <li class="job-access">
                                    <a href="javascript:;" class="wd-delete" data-toggle="modal"
                                        data-target="#delete_quote_{{ $item->id }}">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.6122 6.8586L13.3872 13.6688C13.368 14.252 13.1223 14.8049 12.7022 15.2099C12.2821 15.615 11.7207 15.8404 11.1372 15.8383H6.86218C6.27899 15.8404 5.71792 15.6153 5.29789 15.2107C4.87787 14.8061 4.63192 14.2539 4.61218 13.671L4.38718 6.8586C4.38226 6.70941 4.4368 6.56438 4.53881 6.45541C4.64081 6.34644 4.78193 6.28246 4.93112 6.27753C5.0803 6.27261 5.22533 6.32715 5.3343 6.42916C5.44327 6.53117 5.50726 6.67229 5.51218 6.82147L5.73718 13.6333C5.74838 13.9241 5.87184 14.1993 6.08161 14.401C6.29139 14.6027 6.57117 14.7152 6.86218 14.715H11.1372C11.4286 14.7152 11.7087 14.6024 11.9185 14.4002C12.1283 14.198 12.2515 13.9223 12.2622 13.6311L12.4872 6.82147C12.4921 6.67229 12.5561 6.53117 12.6651 6.42916C12.774 6.32715 12.9191 6.27261 13.0682 6.27753C13.2174 6.28246 13.3585 6.34644 13.4606 6.45541C13.5626 6.56438 13.6171 6.70941 13.6122 6.8586ZM14.3564 4.59228C14.3564 4.74147 14.2971 4.88454 14.1916 4.99003C14.0861 5.09552 13.9431 5.15478 13.7939 5.15478H4.20605C4.05687 5.15478 3.9138 5.09552 3.80831 4.99003C3.70282 4.88454 3.64355 4.74147 3.64355 4.59228C3.64355 4.4431 3.70282 4.30002 3.80831 4.19454C3.9138 4.08905 4.05687 4.02978 4.20605 4.02978H5.9498C6.12803 4.03026 6.30006 3.96442 6.43242 3.84506C6.56477 3.7257 6.64799 3.56136 6.66587 3.38403C6.70738 2.96806 6.90226 2.58243 7.21256 2.30229C7.52285 2.02216 7.92633 1.86757 8.34437 1.86866H9.65499C10.073 1.86757 10.4765 2.02216 10.7868 2.30229C11.0971 2.58243 11.292 2.96806 11.3335 3.38403C11.3514 3.56136 11.4346 3.7257 11.5669 3.84506C11.6993 3.96442 11.8713 4.03026 12.0496 4.02978H13.7933C13.9425 4.02978 14.0856 4.08905 14.1911 4.19454C14.2965 4.30002 14.3558 4.4431 14.3558 4.59228H14.3564ZM7.64237 4.02978H10.3581C10.2842 3.86089 10.2359 3.68192 10.2147 3.49878C10.2007 3.36013 10.1358 3.23159 10.0325 3.13806C9.92924 3.04453 9.7949 2.99267 9.65555 2.99253H8.34493C8.20558 2.99267 8.07124 3.04453 7.96794 3.13806C7.86464 3.23159 7.79974 3.36013 7.7858 3.49878C7.76445 3.68195 7.71648 3.86092 7.64237 4.02978ZM8.2088 12.5522V7.76253C8.2088 7.61335 8.14954 7.47027 8.04405 7.36479C7.93856 7.2593 7.79549 7.20003 7.6463 7.20003C7.49712 7.20003 7.35405 7.2593 7.24856 7.36479C7.14307 7.47027 7.0838 7.61335 7.0838 7.76253V12.5545C7.0838 12.7037 7.14307 12.8467 7.24856 12.9522C7.35405 13.0577 7.49712 13.117 7.6463 13.117C7.79549 13.117 7.93856 13.0577 8.04405 12.9522C8.14954 12.8467 8.2088 12.7037 8.2088 12.5545V12.5522ZM10.9167 12.5522V7.76253C10.9167 7.61335 10.8574 7.47027 10.7519 7.36479C10.6464 7.2593 10.5034 7.20003 10.3542 7.20003C10.205 7.20003 10.0619 7.2593 9.95643 7.36479C9.85094 7.47027 9.79168 7.61335 9.79168 7.76253V12.5545C9.79168 12.7037 9.85094 12.8467 9.95643 12.9522C10.0619 13.0577 10.205 13.117 10.3542 13.117C10.5034 13.117 10.6464 13.0577 10.7519 12.9522C10.8574 12.8467 10.9167 12.7037 10.9167 12.5545V12.5522Z"
                                                fill="#ED1C24" />
                                        </svg>
                                        Delete</a>
                                </li>
                            @elseif ($item->quoteByTransporter && $item->quoteByTransporter->status == 'accept')
                                <li class="view-quote">
                                    <a href="{{ route('front.booking_confirm_page', $item->id) }}"class="wd-accepted-btn">Complete
                                        booking</a>
                                </li>

                                <li class=" job-access view-quote" style="margin:0;">
                                    <a href="javascript:void(0)" style="margin-bottom:auto;"
                                        data-href="{{ route('front.messages', ['thread_id' => $item->notification_thread->id]) }}"
                                        onclick="handleNotificationClick(event, this);">Message</a>
                                </li>
                            @endif
                            


                            {{-- <li class="view-quote">
                    @if ($item->status == 'pending')
                    <a href="{{route('front.quotes', $item->id)}}">View quotes</a>
                    @elseif($item->quoteByTransporter->status == 'accept') 
                        
                            <a href="{{ route('front.booking_confirm_page', $item->id) }}"class="wd-accepted-btn">Complete booking</a>
                      
                    @endif
                </li>

                    <li class="job-access">
                        <a href="javascript:;" class="wd-delete" data-toggle="modal" data-target="#delete_quote_{{$item->id}}">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.6122 6.8586L13.3872 13.6688C13.368 14.252 13.1223 14.8049 12.7022 15.2099C12.2821 15.615 11.7207 15.8404 11.1372 15.8383H6.86218C6.27899 15.8404 5.71792 15.6153 5.29789 15.2107C4.87787 14.8061 4.63192 14.2539 4.61218 13.671L4.38718 6.8586C4.38226 6.70941 4.4368 6.56438 4.53881 6.45541C4.64081 6.34644 4.78193 6.28246 4.93112 6.27753C5.0803 6.27261 5.22533 6.32715 5.3343 6.42916C5.44327 6.53117 5.50726 6.67229 5.51218 6.82147L5.73718 13.6333C5.74838 13.9241 5.87184 14.1993 6.08161 14.401C6.29139 14.6027 6.57117 14.7152 6.86218 14.715H11.1372C11.4286 14.7152 11.7087 14.6024 11.9185 14.4002C12.1283 14.198 12.2515 13.9223 12.2622 13.6311L12.4872 6.82147C12.4921 6.67229 12.5561 6.53117 12.6651 6.42916C12.774 6.32715 12.9191 6.27261 13.0682 6.27753C13.2174 6.28246 13.3585 6.34644 13.4606 6.45541C13.5626 6.56438 13.6171 6.70941 13.6122 6.8586ZM14.3564 4.59228C14.3564 4.74147 14.2971 4.88454 14.1916 4.99003C14.0861 5.09552 13.9431 5.15478 13.7939 5.15478H4.20605C4.05687 5.15478 3.9138 5.09552 3.80831 4.99003C3.70282 4.88454 3.64355 4.74147 3.64355 4.59228C3.64355 4.4431 3.70282 4.30002 3.80831 4.19454C3.9138 4.08905 4.05687 4.02978 4.20605 4.02978H5.9498C6.12803 4.03026 6.30006 3.96442 6.43242 3.84506C6.56477 3.7257 6.64799 3.56136 6.66587 3.38403C6.70738 2.96806 6.90226 2.58243 7.21256 2.30229C7.52285 2.02216 7.92633 1.86757 8.34437 1.86866H9.65499C10.073 1.86757 10.4765 2.02216 10.7868 2.30229C11.0971 2.58243 11.292 2.96806 11.3335 3.38403C11.3514 3.56136 11.4346 3.7257 11.5669 3.84506C11.6993 3.96442 11.8713 4.03026 12.0496 4.02978H13.7933C13.9425 4.02978 14.0856 4.08905 14.1911 4.19454C14.2965 4.30002 14.3558 4.4431 14.3558 4.59228H14.3564ZM7.64237 4.02978H10.3581C10.2842 3.86089 10.2359 3.68192 10.2147 3.49878C10.2007 3.36013 10.1358 3.23159 10.0325 3.13806C9.92924 3.04453 9.7949 2.99267 9.65555 2.99253H8.34493C8.20558 2.99267 8.07124 3.04453 7.96794 3.13806C7.86464 3.23159 7.79974 3.36013 7.7858 3.49878C7.76445 3.68195 7.71648 3.86092 7.64237 4.02978ZM8.2088 12.5522V7.76253C8.2088 7.61335 8.14954 7.47027 8.04405 7.36479C7.93856 7.2593 7.79549 7.20003 7.6463 7.20003C7.49712 7.20003 7.35405 7.2593 7.24856 7.36479C7.14307 7.47027 7.0838 7.61335 7.0838 7.76253V12.5545C7.0838 12.7037 7.14307 12.8467 7.24856 12.9522C7.35405 13.0577 7.49712 13.117 7.6463 13.117C7.79549 13.117 7.93856 13.0577 8.04405 12.9522C8.14954 12.8467 8.2088 12.7037 8.2088 12.5545V12.5522ZM10.9167 12.5522V7.76253C10.9167 7.61335 10.8574 7.47027 10.7519 7.36479C10.6464 7.2593 10.5034 7.20003 10.3542 7.20003C10.205 7.20003 10.0619 7.2593 9.95643 7.36479C9.85094 7.47027 9.79168 7.61335 9.79168 7.76253V12.5545C9.79168 12.7037 9.85094 12.8467 9.95643 12.9522C10.0619 13.0577 10.205 13.117 10.3542 13.117C10.5034 13.117 10.6464 13.0577 10.7519 12.9522C10.8574 12.8467 10.9167 12.7037 10.9167 12.5545V12.5522Z" fill="#ED1C24"/>
                            </svg>
                            Delete</a>
                    </li> --}}
                        </ul>
                        <div class="bidding_new_design">
                            <div class="bidding_new_design_grid job_new_grid_type">
                                <span>Delivery type:</span>
                                <span class="sub_color " style="font-weight: 500">
                                    {{ $item->how_moved }}
                                </span>
                            </div>
                            @if ($transporterQuotesCount > 0)
                                <div class="bidding_new_design_grid job_new_grid_lowest">
                                    <span>Current lowest bid:</span>
                                    <span class="sub_color "
                                        style="font-weight: 500">£{{ roundBasedOnDecimal($lowestBid) }}</span>
                                </div>
                            @else
                                <div class="bidding_new_design_grid job_new_grid_lowest">
                                    <span>Current lowest bid:</span>
                                    <span class="sub_color  " style="font-weight: 500">£0</span>
                                </div>
                            @endif

                            <div class="bidding_new_design_grid job_new_grid_miles">
                                <span>Journey miles:</span>
                                <span class="sub_color  "
                                    style="font-weight: 500">{{ str_replace(' mi', '', $item->distance) }} <span
                                        class=" " style="font-weight: 500">({{ $item->duration }})</span></span>
                            </div>

                            @if ($transporterQuotesCount > 0)
                                <div class="bidding_new_design_grid job_new_grid_bidding">
                                    <span>Transporters bidding:</span>
                                    <span class="sub_color  " style="font-weight: 500">{{ $transporterQuotesCount }}</span>
                                </div>
                            @else
                                <div class="bidding_new_design_grid job_new_grid_bidding">
                                    <span>Transporters bidding:</span>
                                    <span class="sub_color  " style="font-weight: 500">0</span>
                                </div>
                            @endif
                        </div>
                        <!-- delete quote Modal -->
                        <div class="modal fade mark_bx" id="delete_quote_{{ $item->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">
                                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0.93934 15.9393C0.353553 16.5251 0.353553 17.4749 0.93934 18.0607C1.52513 18.6464 2.47487 18.6464 3.06066 18.0607L0.93934 15.9393ZM10.5607 10.5607C11.1464 9.97487 11.1464 9.02513 10.5607 8.43934C9.97487 7.85355 9.02513 7.85355 8.43934 8.43934L10.5607 10.5607ZM8.43934 8.43934C7.85355 9.02513 7.85355 9.97487 8.43934 10.5607C9.02513 11.1464 9.97487 11.1464 10.5607 10.5607L8.43934 8.43934ZM18.0607 3.06066C18.6464 2.47487 18.6464 1.52513 18.0607 0.93934C17.4749 0.353553 16.5251 0.353553 15.9393 0.93934L18.0607 3.06066ZM10.5607 8.43934C9.97487 7.85355 9.02513 7.85355 8.43934 8.43934C7.85355 9.02513 7.85355 9.97487 8.43934 10.5607L10.5607 8.43934ZM15.9393 18.0607C16.5251 18.6464 17.4749 18.6464 18.0607 18.0607C18.6464 17.4749 18.6464 16.5251 18.0607 15.9393L15.9393 18.0607ZM8.43934 10.5607C9.02513 11.1464 9.97487 11.1464 10.5607 10.5607C11.1464 9.97487 11.1464 9.02513 10.5607 8.43934L8.43934 10.5607ZM3.06066 0.93934C2.47487 0.353553 1.52513 0.353553 0.93934 0.93934C0.353553 1.52513 0.353553 2.47487 0.93934 3.06066L3.06066 0.93934ZM3.06066 18.0607L10.5607 10.5607L8.43934 8.43934L0.93934 15.9393L3.06066 18.0607ZM10.5607 10.5607L18.0607 3.06066L15.9393 0.93934L8.43934 8.43934L10.5607 10.5607ZM8.43934 10.5607L15.9393 18.0607L18.0607 15.9393L10.5607 8.43934L8.43934 10.5607ZM10.5607 8.43934L3.06066 0.93934L0.93934 3.06066L8.43934 10.5607L10.5607 8.43934Z"
                                                        fill="#CFCFCF" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h3 class="d-block text-center">Are you sure you want to <br /> delete this quote ?
                                        </h3>
                                    </div>
                                    <div class="modal-footer p-0">
                                        <a href="javascript:;" class="no_btn" data-dismiss="modal">No</a>
                                        <a href="javascript:void(0);" onclick="deleteQuote({{ $item->id }})"
                                            class="yes_btn">Yes</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>-Currently none to show-</p>
                @endforelse

                @if (count($quotes_booked) != 0)
                    <h1 class="wd-active-title wd-mt-90">Recently booked deliveries</h1>
                    @foreach ($quotes_booked as $item)
                        @php
                            $lowestBid = $item->lowest_bid ?? 0;
                            $transporterQuotesCount = $item->quotes_count ?? 0;
                        @endphp
                        <div class="job-listing">
                            <div class="bidding_new_design_date job_new_grid_date">
                                <span>Expiry date:</span>
                                <span>
                                    {{ formatCustomDate($item->created_at->addDays(10)) }}
                                </span>
                            </div>
                            <ul>
                                <li class="job-list-img">
                                    @php
                                        $image = $item->image;
                                        $defaultImage = asset('uploads/no_car_image.png');
                                        $noQuoteImage = asset('uploads/svg_image.png');

                                        if (is_null($image) || $image == $noQuoteImage) {
                                            $image = $defaultImage;
                                        }
                                    @endphp
                                    <div class="job-list-img-sec">
                                        <img src="{{ $image }}" class="img-fluid" alt="book delivery">
                                        <div>
                                </li>

                                <li class="list_detail">
                                    <span>
                                        <img src="{{ asset('assets/web/images/dashboard/map-icon.svg') }}"
                                            alt="Map Icon">
                                    </span>
                                    <p>Pick-up postcode:</p>
                                    <p><b>{{ formatAddress($item->pickup_postcode) }}</b></p>
                                </li>

                                <li class="list_detail">
                                    <span>
                                        <img src="{{ asset('assets/web/images/dashboard/red-map-icon.svg') }}"
                                            alt="Map Icon">
                                    </span>
                                    <p>Drop-off area:</p>
                                    <p><b>{{ formatAddress($item->drop_postcode) }}</b></p>
                                </li>

                                <li class="list_detail">
                                    <span>
                                        <img src="{{ asset('assets/web/images/dashboard/car-icon.svg') }}"
                                            alt="Car Icon">
                                    </span>
                                    <p>Make &amp; model:</p>
                                    <p><b>{{ $item->vehicle_make }} {{ $item->vehicle_model }}</b></p>
                                </li>
                                <li class="list_detail">
                                    <span>
                                        <svg width="19" height="22" viewBox="0 0 19 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.85714 4.33929C6.36012 4.33929 6.76786 3.93155 6.76786 3.42857C6.76786 2.9256 6.36012 2.51786 5.85714 2.51786V4.33929ZM13.1429 2.51786C12.6399 2.51786 12.2321 2.9256 12.2321 3.42857C12.2321 3.93155 12.6399 4.33929 13.1429 4.33929V2.51786ZM5.85714 2.51786C5.35417 2.51786 4.94643 2.9256 4.94643 3.42857C4.94643 3.93155 5.35417 4.33929 5.85714 4.33929V2.51786ZM13.1429 4.33929C13.6458 4.33929 14.0536 3.93155 14.0536 3.42857C14.0536 2.9256 13.6458 2.51786 13.1429 2.51786V4.33929ZM6.76786 3.42857C6.76786 2.9256 6.36012 2.51786 5.85714 2.51786C5.35417 2.51786 4.94643 2.9256 4.94643 3.42857H6.76786ZM4.94643 4.64286C4.94643 5.14583 5.35417 5.55357 5.85714 5.55357C6.36012 5.55357 6.76786 5.14583 6.76786 4.64286H4.94643ZM4.94643 3.42857C4.94643 3.93155 5.35417 4.33929 5.85714 4.33929C6.36012 4.33929 6.76786 3.93155 6.76786 3.42857H4.94643ZM6.76786 1C6.76786 0.497026 6.36012 0.0892857 5.85714 0.0892857C5.35417 0.0892857 4.94643 0.497026 4.94643 1L6.76786 1ZM14.0536 3.42857C14.0536 2.9256 13.6458 2.51786 13.1429 2.51786C12.6399 2.51786 12.2321 2.9256 12.2321 3.42857H14.0536ZM12.2321 4.64286C12.2321 5.14583 12.6399 5.55357 13.1429 5.55357C13.6458 5.55357 14.0536 5.14583 14.0536 4.64286H12.2321ZM12.2321 3.42857C12.2321 3.93155 12.6399 4.33929 13.1429 4.33929C13.6458 4.33929 14.0536 3.93155 14.0536 3.42857H12.2321ZM14.0536 1C14.0536 0.497026 13.6458 0.0892857 13.1429 0.0892857C12.6399 0.0892857 12.2321 0.497026 12.2321 1L14.0536 1ZM5.85714 2.51786C2.67164 2.51786 0.0892849 5.10021 0.0892849 8.28571H1.91071C1.91071 6.10616 3.67759 4.33929 5.85714 4.33929V2.51786ZM0.0892849 8.28571V15.5714H1.91071V8.28571H0.0892849ZM0.0892849 15.5714C0.0892849 18.7569 2.67164 21.3393 5.85714 21.3393V19.5179C3.67759 19.5179 1.91071 17.751 1.91071 15.5714H0.0892849ZM5.85714 21.3393H13.1429V19.5179H5.85714V21.3393ZM13.1429 21.3393C16.3284 21.3393 18.9107 18.7569 18.9107 15.5714H17.0893C17.0893 17.751 15.3224 19.5179 13.1429 19.5179V21.3393ZM18.9107 15.5714V8.28571H17.0893V15.5714H18.9107ZM18.9107 8.28571C18.9107 5.10021 16.3284 2.51786 13.1429 2.51786V4.33929C15.3224 4.33929 17.0893 6.10616 17.0893 8.28571H18.9107ZM5.85714 4.33929L13.1429 4.33929V2.51786L5.85714 2.51786V4.33929ZM4.94643 3.42857V4.64286H6.76786V3.42857H4.94643ZM6.76786 3.42857V1L4.94643 1V3.42857H6.76786ZM12.2321 3.42857V4.64286H14.0536V3.42857H12.2321ZM14.0536 3.42857V1L12.2321 1V3.42857H14.0536Z"
                                                fill="#008DD4" />
                                            <path d="M4.64062 11.9286L7.0692 15.5714L14.3549 9.5" stroke="#008DD4"
                                                stroke-width="1.82143" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </span>
                                    <p>Delivery date:</p>
                                    <p>
                                        <b>
                                            @if ($item->delivery_timeframe_from)
                                                {{ formatCustomDate($item->delivery_timeframe_from) }}
                                            @else
                                                {{ $item->delivery_timeframe }}
                                            @endif
                                        </b>
                                    </p>
                                </li>
                                <li class="view-quote">
                                    @if (isset($item->quoteByTransporter))
                                        <a
                                            href="{{ route('front.user_deposit', ['id' => $item->quoteByTransporter->id]) }}">
                                            Contact transporter
                                        </a>
                                    @endif
                                    <a href="{{ route('front.leave_feedback', ['id' => $item->quoteByTransporter->id ?? null]) }}"
                                        class="wd-blue d-sm-none">Leave feedback</a>
                                    <!-- <a href="javascript:;" class="wd-orange">View VAT receipt </a> -->
                                    <div class="d-sm-none">
                                        @if ($item->is_mark_as_complete == 'no')
                                            <a href="javascript:;" class="wd-red"
                                                onclick="markComplete('{{ $item->id }}')">Mark complete</a>
                                        @else
                                            <a href="javascript:;" class="wd-red">Complete</a>
                                        @endif
                                    </div>
                                </li>
                                <li class="job-access completed_jobs">
                                    <a href="{{ route('front.leave_feedback', ['id' => $item->quoteByTransporter->id ?? null]) }}"
                                        class="wd-blue">Leave feedback</a>
                                    <!-- <a href="javascript:;" class="wd-orange">View VAT receipt </a> -->
                                    @if ($item->is_mark_as_complete == 'no')
                                        <a href="javascript:;" class="wd-red"
                                            onclick="markComplete('{{ $item->id }}')">Mark complete</a>
                                    @else
                                        <a href="javascript:;" class="wd-red">Complete</a>
                                    @endif
                                </li>
                            </ul>
                            <div class="bidding_new_design">
                                <div class="bidding_new_design_grid job_new_grid_type">
                                    <span>Delivery type:</span>
                                    <span class="sub_color">
                                        {{ $item->how_moved }}
                                    </span>
                                </div>
                                @if ($transporterQuotesCount > 0)
                                    <div class="bidding_new_design_grid job_new_grid_lowest">
                                        <span>Current lowest bid:</span>
                                        <span class="sub_color">£{{ roundBasedOnDecimal($lowestBid) }}</span>
                                    </div>
                                @else
                                    <div class="bidding_new_design_grid job_new_grid_lowest">
                                        <span>Current lowest bid:</span>
                                        <span class="sub_color">£0</span>
                                    </div>
                                @endif

                                <div class="bidding_new_design_grid job_new_grid_miles">
                                    <span>Journey miles:</span>
                                    <span class="sub_color">{{ str_replace(' mi', '', $item->distance) }}
                                        <span>({{ $item->duration }})</span></span>
                                </div>

                                @if ($transporterQuotesCount > 0)
                                    <div class="bidding_new_design_grid job_new_grid_bidding">
                                        <span>Transporters bidding:</span>
                                        <span class="sub_color">{{ $transporterQuotesCount }}</span>
                                    </div>
                                @else
                                    <div class="bidding_new_design_grid job_new_grid_bidding">
                                        <span>Transporters bidding:</span>
                                        <span class="sub_color">0</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
                @if (!(session()->has('came_from') && session('came_from') == 'quote_save'))
                    <div class="quote_grp_btns">
                        <a href="{{ route('front.home') }}" class="rqt_txt">Get new quote request</a>
                        <a href="{{ route('front.home') }}" class="quote_btn">Get quotes</a>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- modal -->
    <div class="modal mark_bx fade" id="mark_complete" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.93934 15.9393C0.353553 16.5251 0.353553 17.4749 0.93934 18.0607C1.52513 18.6464 2.47487 18.6464 3.06066 18.0607L0.93934 15.9393ZM10.5607 10.5607C11.1464 9.97487 11.1464 9.02513 10.5607 8.43934C9.97487 7.85355 9.02513 7.85355 8.43934 8.43934L10.5607 10.5607ZM8.43934 8.43934C7.85355 9.02513 7.85355 9.97487 8.43934 10.5607C9.02513 11.1464 9.97487 11.1464 10.5607 10.5607L8.43934 8.43934ZM18.0607 3.06066C18.6464 2.47487 18.6464 1.52513 18.0607 0.93934C17.4749 0.353553 16.5251 0.353553 15.9393 0.93934L18.0607 3.06066ZM10.5607 8.43934C9.97487 7.85355 9.02513 7.85355 8.43934 8.43934C7.85355 9.02513 7.85355 9.97487 8.43934 10.5607L10.5607 8.43934ZM15.9393 18.0607C16.5251 18.6464 17.4749 18.6464 18.0607 18.0607C18.6464 17.4749 18.6464 16.5251 18.0607 15.9393L15.9393 18.0607ZM8.43934 10.5607C9.02513 11.1464 9.97487 11.1464 10.5607 10.5607C11.1464 9.97487 11.1464 9.02513 10.5607 8.43934L8.43934 10.5607ZM3.06066 0.93934C2.47487 0.353553 1.52513 0.353553 0.93934 0.93934C0.353553 1.52513 0.353553 2.47487 0.93934 3.06066L3.06066 0.93934ZM3.06066 18.0607L10.5607 10.5607L8.43934 8.43934L0.93934 15.9393L3.06066 18.0607ZM10.5607 10.5607L18.0607 3.06066L15.9393 0.93934L8.43934 8.43934L10.5607 10.5607ZM8.43934 10.5607L15.9393 18.0607L18.0607 15.9393L10.5607 8.43934L8.43934 10.5607ZM10.5607 8.43934L3.06066 0.93934L0.93934 3.06066L8.43934 10.5607L10.5607 8.43934Z"
                                    fill="#CFCFCF" />
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3>Are you sure you want to mark complete?</h3>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="" id="mark_as_complete_id">
                    <button type="button" class="yes_btn" onclick="markAsComplete()">Yes</button>
                    <button type="button" class="no_btn" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/web/js/admin.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function uploadImageQuote(item_id) {
            const fileImage = document.querySelector('#uploadImage' + item_id);

            fileImage.onchange = function() {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    /*filePreview.style.backgroundImage  = "url("+e.target.result+")";
                    filePreview.classList.add("has-image");*/
                    $('#image_preview_' + item_id).attr('src', e.target.result);
                    uploadImage(e.target.result, item_id);
                };

                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            };
        }

        function uploadImage(image, item_id) {
            var formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("image", image);
            formData.append("item_id", item_id);
            $.ajax({
                url: "{{ route('front.update_quote_image') }}",
                data: formData,
                processData: false,
                contentType: false,
                type: "POST",
                success: function(res) {
                    if (res.success == true) {
                        toastr.success(res.message);
                        window.location.reload();
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

        function markComplete(id) {
            $('#mark_as_complete_id').val(id);
            $('#mark_complete').modal("show");
        }

        function markAsComplete() {
            let id = $('#mark_as_complete_id').val();
            var formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("quote_id", id);
            $.ajax({
                url: "{{ route('front.mark_as_complete_quote') }}",
                data: formData,
                processData: false,
                contentType: false,
                type: "POST",
                success: function(res) {
                    if (res.success == true) {
                        window.location.href = "{{ route('front.past_deliveries') }}";
                    } else {
                        Swal.fire({
                            title: 'Error',
                            html: '<span class="swal-text">' + res.message + '</span>',
                            confirmButtonColor: '#52D017',
                            confirmButtonText: 'Dismiss',
                            customClass: {
                                title: 'swal-title',
                                htmlContainer: 'swal-text-container',
                                popup: 'swal-popup',
                                cancelButton: 'swal-button--cancel'
                            },
                            showCloseButton: true,
                            showConfirmButton: true,
                            allowOutsideClick: false
                        });
                    }
                },
                error: function(data) {
                    Swal.fire({
                        title: 'Error',
                        html: '<span class="swal-text">Something went wrong!</span>',
                        confirmButtonColor: '#52D017',
                        confirmButtonText: 'Dismiss',
                        customClass: {
                            title: 'swal-title',
                            htmlContainer: 'swal-text-container',
                            popup: 'swal-popup',
                            cancelButton: 'swal-button--cancel'
                        },
                        showCloseButton: true,
                        showConfirmButton: true,
                        allowOutsideClick: false
                    });
                }
            });
        }

        function deleteQuote(quoteId) {
            $.ajax({
                url: "{{ route('front.quote_delete', ['id' => ':id']) }}".replace(':id', quoteId),
                type: "GET",
                success: function(res) {
                    if (res.success == true) {
                        Swal.fire({
                            title: '<span class="swal-title">Quote deleted</span>',
                            html: '<span class="swal-text">Your quote has been deleted successfully.</span>',
                            confirmButtonColor: '#52D017',
                            confirmButtonText: 'Dismiss',
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
                                window.location.reload();
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            html: '<span class="swal-text">Failed to delete quote.</span>',
                            confirmButtonColor: '#52D017',
                            confirmButtonText: 'Dismiss',
                            customClass: {
                                title: 'swal-title',
                                htmlContainer: 'swal-text-container',
                                popup: 'swal-popup',
                                cancelButton: 'swal-button--cancel'
                            },
                            showCloseButton: true,
                            showConfirmButton: true,
                            allowOutsideClick: false
                        });
                    }
                },
                error: function(data) {
                    Swal.fire({
                        title: 'Error',
                        html: '<span class="swal-text">Something went wrong!</span>',
                        confirmButtonColor: '#52D017',
                        confirmButtonText: 'Dismiss',
                        customClass: {
                            title: 'swal-title',
                            htmlContainer: 'swal-text-container',
                            popup: 'swal-popup',
                            cancelButton: 'swal-button--cancel'
                        },
                        showCloseButton: true,
                        showConfirmButton: true,
                        allowOutsideClick: false
                    });
                }
            });
        }



        /*const fileImage = document.querySelector('.input-preview__src');
        const filePreview = document.querySelector('.input-preview');

        fileImage.onchange = function () {
            const reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                filePreview.style.backgroundImage  = "url("+e.target.result+")";
                filePreview.classList.add("has-image");
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };*/

        $(document).ready(function() {
            var cameFrom = "{{ session('came_from') }}";
            if (cameFrom && cameFrom === 'quote_save') {
                Swal.fire({
                    title: '<span class="swal-title" style="color:red;font-weight: 700;">Check your spam.</span>',
                    html: '<span class="swal-text">Please check your spam or junk folder and mark your welcome email as ‘not spam’ so that you don’t miss out on any quotes that we send you via email.</span>',
                    confirmButtonColor: '#52D017',
                    confirmButtonText: 'Ok, got it',
                    customClass: {
                        title: 'swal-title',
                        htmlContainer: 'swal-text-container',
                        popup: 'swal-popup', // Add custom class for the popup
                        cancelButton: 'swal-button--cancel' // Add custom class for the cancel button
                    },
                    //showCloseButton: true, // Add this line to show the close button
                    showConfirmButton: true, // Add this line to hide the confirm button
                    allowOutsideClick: true
                });
            }
        });
    </script>
@endsection
