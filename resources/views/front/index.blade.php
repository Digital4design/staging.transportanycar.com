@extends('layouts.web.app')

@section('head_css')
    <style>
        .getqt_btnincld{
            border: none;
        }
        .error{
            color: red;
        }
        #transportQuote span.error:before {
            content: '';
            display: block;
            position: absolute;
            bottom: -6px;
            left: 50%;
            transform: translateX(-50%) rotate(45deg);
            width: 12px;
            height: 12px;
            background: white;
            box-shadow: 2px 2px 4px 0px #ccc;
        }
        #transportQuote span.error {
            position: absolute;
            top: -30px;
            background: #fff;
            padding: 10px 20px;
            border-radius: 10px;
            border: 1px solid #CFCFCF;
            left: 50%;
            transform: translateX(-50%);
            font-size: 14px;
            box-shadow: 0 2px 4px 0px #ccc;    width: max-content;
        }
        .headitemshow,
        .headitemshow body {
            overflow: inherit;
        }
        section#chooseus{
            padding-top: 95px;
        }
        @media(max-width:580px) {
            #transportQuote span.error {
                top: -20px;
            }
            .headitemshow,
            .headitemshow body {
                overflow: hidden;
            }
        }
    </style>
    <!-- owl slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/vendors/owl.carousel/css/owl.carousel.min.css')}}" />
@endsection

@section('content')
    @include('layouts.web.head-web-menu')
    <main>
        <section id="home" class="wd_banner">
            <div class="container">
                <h1 class="banner_newtext">Get an <b>instant</b> car transport quote </h1>
                <p class="pera_netext">
                    <strong>Save up to 70%</strong> by getting quotes from car transport companies <br /> that are already travelling your route.
                </p>
                <!-- Display the error message if it exists -->
                @if ($errors->has('general'))
                    <div class="alert alert-danger">
                        {{ $errors->first('general') }}
                    </div>
                @endif
                <form class="newform_getqt" id="transportQuote" method="post" action="{{route('front.set_location')}}">
                    @csrf
                    <div class="form_flex_includes">
                        <div class="form-group">
                            <span class="bglayer">
                              <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.00001 0.5C5.72387 0.499994 5.50001 0.723847 5.5 0.999989C5.49999 1.27613 5.72385 1.49999 5.99999 1.5L6.00001 0.5ZM7.913 1.376L8.10239 0.913257L8.10223 0.913191L7.913 1.376ZM10.157 3.2L9.74271 3.47994L9.74302 3.4804L10.157 3.2ZM11 5.94H11.5L11.5 5.9392L11 5.94ZM9.535 9.433L9.13141 9.13784C9.12533 9.14616 9.11951 9.15465 9.11396 9.16333L9.535 9.433ZM8.083 11.7L7.66195 11.4303L7.66019 11.4331L8.083 11.7ZM6 15L5.57744 15.2673C5.66913 15.4122 5.82872 15.5001 6.00024 15.5C6.17176 15.4999 6.33126 15.4119 6.42281 15.2669L6 15ZM3.917 11.707L4.33956 11.4397L4.33826 11.4377L3.917 11.707ZM2.465 9.436L2.88626 9.16666C2.88073 9.15801 2.87493 9.14954 2.86888 9.14125L2.465 9.436ZM1 5.943L0.5 5.9425V5.943H1ZM1.843 3.2L2.25698 3.48039L2.25701 3.48036L1.843 3.2ZM4.087 1.379L4.27611 1.84186L4.27695 1.84151L4.087 1.379ZM6.00074 1.5C6.27688 1.49959 6.50041 1.27541 6.5 0.999264C6.49959 0.723122 6.27541 0.499594 5.99926 0.500001L6.00074 1.5ZM6 7.087C5.72386 7.087 5.5 7.31086 5.5 7.587C5.5 7.86314 5.72386 8.087 6 8.087V7.087ZM6 3.793C5.72386 3.793 5.5 4.01686 5.5 4.293C5.5 4.56914 5.72386 4.793 6 4.793V3.793ZM6.01232 8.09285C6.28838 8.08604 6.50665 7.85674 6.49985 7.58068C6.49304 7.30462 6.26374 7.08635 5.98768 7.09315L6.01232 8.09285ZM4.53989 6.78169L4.97083 6.52814L4.53989 6.78169ZM4.53989 5.11131L4.10894 4.85776L4.53989 5.11131ZM5.98768 4.79985C6.26374 4.80665 6.49304 4.58838 6.49985 4.31232C6.50665 4.03626 6.28838 3.80696 6.01232 3.80015L5.98768 4.79985ZM5.99999 1.5C6.59112 1.50001 7.17661 1.61509 7.72377 1.83881L8.10223 0.913191C7.43494 0.640355 6.72092 0.500015 6.00001 0.5L5.99999 1.5ZM7.72361 1.83874C8.54391 2.17448 9.24646 2.74554 9.74271 3.47994L10.5713 2.92006C9.96449 2.02205 9.10543 1.32378 8.10239 0.913257L7.72361 1.83874ZM9.74302 3.4804C10.235 4.20673 10.4986 5.06354 10.5 5.9408L11.5 5.9392C11.4983 4.86256 11.1747 3.81102 10.571 2.9196L9.74302 3.4804ZM10.5 5.94C10.5 6.53289 10.4074 6.97781 10.2034 7.43765C9.99208 7.91418 9.65498 8.42194 9.13141 9.13784L9.93859 9.72816C10.463 9.01106 10.8584 8.42732 11.1176 7.8431C11.3841 7.24219 11.5 6.65711 11.5 5.94H10.5ZM9.11396 9.16333L7.66196 11.4303L8.50404 11.9697L9.95604 9.70267L9.11396 9.16333ZM7.66019 11.4331L5.57719 14.7331L6.42281 15.2669L8.50581 11.9669L7.66019 11.4331ZM6.42256 14.7327L4.33956 11.4397L3.49444 11.9743L5.57744 15.2673L6.42256 14.7327ZM4.33826 11.4377L2.88626 9.16666L2.04374 9.70534L3.49574 11.9763L4.33826 11.4377ZM2.86888 9.14125C2.34509 8.42353 2.00793 7.91574 1.7965 7.4394C1.59257 6.97996 1.5 6.53583 1.5 5.943H0.5C0.5 6.66017 0.61593 7.24454 0.882497 7.8451C1.14157 8.42876 1.53691 9.01247 2.06112 9.73075L2.86888 9.14125ZM1.5 5.9435C1.50087 5.06532 1.76451 4.20749 2.25698 3.48039L1.42902 2.91961C0.824622 3.81195 0.501071 4.86474 0.5 5.9425L1.5 5.9435ZM2.25701 3.48036C2.75365 2.74695 3.45617 2.17686 4.27611 1.84186L3.89789 0.916142C2.89529 1.32578 2.03628 2.02286 1.42899 2.91964L2.25701 3.48036ZM4.27695 1.84151C4.82393 1.61687 5.40942 1.50087 6.00074 1.5L5.99926 0.500001C5.27813 0.501062 4.56411 0.642524 3.89705 0.916488L4.27695 1.84151ZM6 8.087C6.76705 8.087 7.47583 7.67778 7.85936 7.0135L6.99333 6.5135C6.78844 6.86838 6.40978 7.087 6 7.087V8.087ZM7.85936 7.0135C8.24288 6.34922 8.24288 5.53078 7.85936 4.8665L6.99333 5.3665C7.19822 5.72138 7.19822 6.15862 6.99333 6.5135L7.85936 7.0135ZM7.85936 4.8665C7.47583 4.20222 6.76705 3.793 6 3.793V4.793C6.40978 4.793 6.78844 5.01162 6.99333 5.3665L7.85936 4.8665ZM5.98768 7.09315C5.57128 7.10341 5.18205 6.88714 4.97083 6.52814L4.10894 7.03524C4.50431 7.70722 5.23289 8.11206 6.01232 8.09285L5.98768 7.09315ZM4.97083 6.52814C4.75962 6.16914 4.75962 5.72386 4.97083 5.36486L4.10894 4.85776C3.71358 5.52975 3.71358 6.36325 4.10894 7.03524L4.97083 6.52814ZM4.97083 5.36486C5.18205 5.00586 5.57128 4.78959 5.98768 4.79985L6.01232 3.80015C5.23289 3.78094 4.50431 4.18578 4.10894 4.85776L4.97083 5.36486Z" fill="white" />
                              </svg>
                            </span>
                            <input type="text" class="form-control" placeholder="Collection Postcode" id="start_point" name="start_point"/>
                            <div id="start_address_div" class="col-md-10">
                                <input type="hidden" data-geo="lat" value="" id="start_latitude" name="start_latitude">
                                <input type="hidden" data-geo="lng" value="" id="start_longitude" name="start_longitude">
                            </div>
                        </div>
                        <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.4089 11.8079C10.0661 12.1344 10.0528 12.6769 10.3793 13.0197C10.7058 13.3625 11.2483 13.3757 11.5911 13.0493L10.4089 11.8079ZM17.5911 7.33498C17.9339 7.0085 17.9472 6.46595 17.6207 6.12316C17.2942 5.78036 16.7517 5.76713 16.4089 6.0936L17.5911 7.33498ZM16.4089 7.33497C16.7517 7.66145 17.2942 7.64821 17.6207 7.30542C17.9472 6.96262 17.9339 6.42007 17.5911 6.09359L16.4089 7.33497ZM11.5911 0.379308C11.2483 0.0528345 10.7058 0.0660667 10.3793 0.408864C10.0528 0.751661 10.0661 1.29421 10.4089 1.62069L11.5911 0.379308ZM17 7.57141C17.4734 7.57141 17.8571 7.18766 17.8571 6.71427C17.8571 6.24088 17.4734 5.85713 17 5.85713V7.57141ZM1 5.85713C0.526615 5.85713 0.14286 6.24088 0.14286 6.71427C0.14286 7.18766 0.526615 7.57141 1 7.57141V5.85713ZM11.5911 13.0493L17.5911 7.33498L16.4089 6.0936L10.4089 11.8079L11.5911 13.0493ZM17.5911 6.09359L11.5911 0.379308L10.4089 1.62069L16.4089 7.33497L17.5911 6.09359ZM17 5.85713L1 5.85713V7.57141L17 7.57141V5.85713Z" fill="#7F807D" />
                        </svg>
                        <div class="form-group">
                            <span class="bglayer">
                              <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.00001 0.5C5.72387 0.499994 5.50001 0.723847 5.5 0.999989C5.49999 1.27613 5.72385 1.49999 5.99999 1.5L6.00001 0.5ZM7.913 1.376L8.10239 0.913257L8.10223 0.913191L7.913 1.376ZM10.157 3.2L9.74271 3.47994L9.74302 3.4804L10.157 3.2ZM11 5.94H11.5L11.5 5.9392L11 5.94ZM9.535 9.433L9.13141 9.13784C9.12533 9.14616 9.11951 9.15465 9.11396 9.16333L9.535 9.433ZM8.083 11.7L7.66195 11.4303L7.66019 11.4331L8.083 11.7ZM6 15L5.57744 15.2673C5.66913 15.4122 5.82872 15.5001 6.00024 15.5C6.17176 15.4999 6.33126 15.4119 6.42281 15.2669L6 15ZM3.917 11.707L4.33956 11.4397L4.33826 11.4377L3.917 11.707ZM2.465 9.436L2.88626 9.16666C2.88073 9.15801 2.87493 9.14954 2.86888 9.14125L2.465 9.436ZM1 5.943L0.5 5.9425V5.943H1ZM1.843 3.2L2.25698 3.48039L2.25701 3.48036L1.843 3.2ZM4.087 1.379L4.27611 1.84186L4.27695 1.84151L4.087 1.379ZM6.00074 1.5C6.27688 1.49959 6.50041 1.27541 6.5 0.999264C6.49959 0.723122 6.27541 0.499594 5.99926 0.500001L6.00074 1.5ZM6 7.087C5.72386 7.087 5.5 7.31086 5.5 7.587C5.5 7.86314 5.72386 8.087 6 8.087V7.087ZM6 3.793C5.72386 3.793 5.5 4.01686 5.5 4.293C5.5 4.56914 5.72386 4.793 6 4.793V3.793ZM6.01232 8.09285C6.28838 8.08604 6.50665 7.85674 6.49985 7.58068C6.49304 7.30462 6.26374 7.08635 5.98768 7.09315L6.01232 8.09285ZM4.53989 6.78169L4.97083 6.52814L4.53989 6.78169ZM4.53989 5.11131L4.10894 4.85776L4.53989 5.11131ZM5.98768 4.79985C6.26374 4.80665 6.49304 4.58838 6.49985 4.31232C6.50665 4.03626 6.28838 3.80696 6.01232 3.80015L5.98768 4.79985ZM5.99999 1.5C6.59112 1.50001 7.17661 1.61509 7.72377 1.83881L8.10223 0.913191C7.43494 0.640355 6.72092 0.500015 6.00001 0.5L5.99999 1.5ZM7.72361 1.83874C8.54391 2.17448 9.24646 2.74554 9.74271 3.47994L10.5713 2.92006C9.96449 2.02205 9.10543 1.32378 8.10239 0.913257L7.72361 1.83874ZM9.74302 3.4804C10.235 4.20673 10.4986 5.06354 10.5 5.9408L11.5 5.9392C11.4983 4.86256 11.1747 3.81102 10.571 2.9196L9.74302 3.4804ZM10.5 5.94C10.5 6.53289 10.4074 6.97781 10.2034 7.43765C9.99208 7.91418 9.65498 8.42194 9.13141 9.13784L9.93859 9.72816C10.463 9.01106 10.8584 8.42732 11.1176 7.8431C11.3841 7.24219 11.5 6.65711 11.5 5.94H10.5ZM9.11396 9.16333L7.66196 11.4303L8.50404 11.9697L9.95604 9.70267L9.11396 9.16333ZM7.66019 11.4331L5.57719 14.7331L6.42281 15.2669L8.50581 11.9669L7.66019 11.4331ZM6.42256 14.7327L4.33956 11.4397L3.49444 11.9743L5.57744 15.2673L6.42256 14.7327ZM4.33826 11.4377L2.88626 9.16666L2.04374 9.70534L3.49574 11.9763L4.33826 11.4377ZM2.86888 9.14125C2.34509 8.42353 2.00793 7.91574 1.7965 7.4394C1.59257 6.97996 1.5 6.53583 1.5 5.943H0.5C0.5 6.66017 0.61593 7.24454 0.882497 7.8451C1.14157 8.42876 1.53691 9.01247 2.06112 9.73075L2.86888 9.14125ZM1.5 5.9435C1.50087 5.06532 1.76451 4.20749 2.25698 3.48039L1.42902 2.91961C0.824622 3.81195 0.501071 4.86474 0.5 5.9425L1.5 5.9435ZM2.25701 3.48036C2.75365 2.74695 3.45617 2.17686 4.27611 1.84186L3.89789 0.916142C2.89529 1.32578 2.03628 2.02286 1.42899 2.91964L2.25701 3.48036ZM4.27695 1.84151C4.82393 1.61687 5.40942 1.50087 6.00074 1.5L5.99926 0.500001C5.27813 0.501062 4.56411 0.642524 3.89705 0.916488L4.27695 1.84151ZM6 8.087C6.76705 8.087 7.47583 7.67778 7.85936 7.0135L6.99333 6.5135C6.78844 6.86838 6.40978 7.087 6 7.087V8.087ZM7.85936 7.0135C8.24288 6.34922 8.24288 5.53078 7.85936 4.8665L6.99333 5.3665C7.19822 5.72138 7.19822 6.15862 6.99333 6.5135L7.85936 7.0135ZM7.85936 4.8665C7.47583 4.20222 6.76705 3.793 6 3.793V4.793C6.40978 4.793 6.78844 5.01162 6.99333 5.3665L7.85936 4.8665ZM5.98768 7.09315C5.57128 7.10341 5.18205 6.88714 4.97083 6.52814L4.10894 7.03524C4.50431 7.70722 5.23289 8.11206 6.01232 8.09285L5.98768 7.09315ZM4.97083 6.52814C4.75962 6.16914 4.75962 5.72386 4.97083 5.36486L4.10894 4.85776C3.71358 5.52975 3.71358 6.36325 4.10894 7.03524L4.97083 6.52814ZM4.97083 5.36486C5.18205 5.00586 5.57128 4.78959 5.98768 4.79985L6.01232 3.80015C5.23289 3.78094 4.50431 4.18578 4.10894 4.85776L4.97083 5.36486Z" fill="white" />
                              </svg>
                            </span>
                            <input type="text" class="form-control" placeholder="Delivery Postcode" id="end_point" name="end_point"/>
                            <div id="end_address_div" class="col-md-10">
                                <input type="hidden" data-geo="lat" value="" id="end_latitude" name="end_latitude">
                                <input type="hidden" data-geo="lng" value="" id="end_longitude" name="end_longitude">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="getqt_btnincld">Get Instant Quotes <svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.4848 1.62323L8.35854 8.49696L1.4848 15.3707" stroke="white" stroke-width="2.06212" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </form>
            </div>
        </section>
        <section id="network" class="network_main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <img src="{{asset('assets/web/images/star_rate.png')}}" alt="icon" class="star_rating" />
                        <h2>The UKs best online car <br /> transporting network. </h2>
                        <p>Sit back and relax whilst your car is being delivered safely and securely by our highly rated transport companies.</p>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <ul class="network_steps">
                            <li>
                                <span>Step 1</span>
                                <div class="network_card">
                                    <svg width="35" height="47" viewBox="0 0 35 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.1845 2L2 21.2882H11.1845L4.29682 45.4L33 21.2882H20.3717L27.2594 2H11.1845Z" stroke="#008DD4" stroke-width="3.1" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <h6>Get instant quotes from our transporters</h6>
                                </div>
                            </li>
                            <li class="svgicon_inclds">
                                <svg width="35" height="8" viewBox="0 0 35 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="3.75226" cy="3.97156" r="3.17689" fill="#D9D9D9" />
                                    <circle cx="17.7404" cy="3.9715" r="3.17689" fill="#D9D9D9" />
                                    <circle cx="31.7285" cy="3.9715" r="3.17689" fill="#D9D9D9" />
                                </svg>
                            </li>
                            <li>
                                <span>Step 2</span>
                                <div class="network_card">
                                    <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.9467 31.3587C4.57686 28.9388 2.96951 25.8764 2.32401 22.5514C1.67316 19.2171 2.00737 15.7653 3.28581 12.6178C4.55333 9.48795 6.71732 6.80239 9.50603 4.89839C15.1641 1.03387 22.6128 1.03387 28.2708 4.89839C31.0595 6.80239 33.2235 9.48795 34.4911 12.6178C35.7695 15.7653 36.1037 19.2171 35.4529 22.5514C34.8074 25.8764 33.2 28.9388 30.8302 31.3587C27.6917 34.5795 23.3854 36.396 18.8884 36.396C14.3915 36.396 10.0852 34.5795 6.9467 31.3587Z" stroke="#008DD4" stroke-width="3.56239" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M18.9363 8.30913C17.958 8.41279 17.249 9.28985 17.3527 10.2681C17.4563 11.2464 18.3334 11.9553 19.3117 11.8517L18.9363 8.30913ZM24.2328 14.751C24.6163 15.6569 25.6615 16.0804 26.5674 15.6969C27.4733 15.3134 27.8968 14.2681 27.5133 13.3622L24.2328 14.751ZM32.3382 29.8352C31.642 29.1402 30.5142 29.1411 29.8192 29.8373C29.1242 30.5335 29.1252 31.6613 29.8214 32.3563L32.3382 29.8352ZM39.1052 41.624C39.8014 42.319 40.9292 42.3181 41.6242 41.6219C42.3192 40.9256 42.3182 39.7979 41.622 39.1029L39.1052 41.624ZM19.3117 11.8517C21.4114 11.6292 23.4096 12.8064 24.2328 14.751L27.5133 13.3622C26.0786 9.97314 22.596 7.92132 18.9363 8.30913L19.3117 11.8517ZM29.8214 32.3563L39.1052 41.624L41.622 39.1029L32.3382 29.8352L29.8214 32.3563Z" fill="#008DD4" />
                                    </svg>
                                    <h6>Choose one of the best quotes for you</h6>
                                </div>
                            </li>
                            <li class="svgicon_inclds">
                                <svg width="35" height="8" viewBox="0 0 35 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="3.75226" cy="3.97156" r="3.17689" fill="#D9D9D9" />
                                    <circle cx="17.7404" cy="3.9715" r="3.17689" fill="#D9D9D9" />
                                    <circle cx="31.7285" cy="3.9715" r="3.17689" fill="#D9D9D9" />
                                </svg>
                            </li>
                            <li>
                                <span>Step 3</span>
                                <div class="network_card">
                                    <svg width="72" height="36" viewBox="0 0 72 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.99994 13.2291H13.2291" stroke="#008DD4" stroke-width="2.8073" stroke-linecap="round" />
                                        <path d="M4.24597 19.9667L12.6679 19.9667" stroke="#008DD4" stroke-width="2.8073" stroke-linecap="round" />
                                        <path d="M6.49176 26.7042H12.1064" stroke="#008DD4" stroke-width="2.8073" stroke-linecap="round" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M37.794 28.5595C37.8013 30.5431 36.612 32.3355 34.7814 33.0996C32.9509 33.8638 30.8402 33.449 29.4349 32.0489C28.0297 30.6488 27.6071 28.5397 28.3645 26.7063C29.122 24.8729 30.91 23.677 32.8936 23.677C34.1909 23.6746 35.436 24.1877 36.355 25.1033C37.274 26.019 37.7917 27.2622 37.794 28.5595Z" stroke="#008DD4" stroke-width="3.36876" stroke-linecap="round" stroke-linejoin="round" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M61.8631 28.5595C61.8704 30.5431 60.681 32.3355 58.8505 33.0996C57.0199 33.8638 54.9092 33.449 53.5039 32.0489C52.0987 30.6488 51.6761 28.5397 52.4336 26.7063C53.191 24.8729 54.979 23.677 56.9627 23.677C58.26 23.6746 59.5051 24.1877 60.4241 25.1033C61.3431 26.019 61.8607 27.2622 61.8631 28.5595Z" stroke="#008DD4" stroke-width="3.36876" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M23.7806 13.1946C23.4527 14.0651 23.8925 15.0367 24.7631 15.3646C25.6336 15.6926 26.6052 15.2527 26.9331 14.3822L23.7806 13.1946ZM27.0794 9.21588L25.5174 8.58564C25.5125 8.59773 25.5078 8.60988 25.5032 8.62208L27.0794 9.21588ZM40.2872 3.68438C41.2174 3.68438 41.9716 2.93026 41.9716 2C41.9716 1.06974 41.2174 0.315622 40.2872 0.315622V3.68438ZM25.3568 15.4728C26.2871 15.4728 27.0412 14.7186 27.0412 13.7884C27.0412 12.8581 26.2871 12.104 25.3568 12.104V15.4728ZM22.417 13.7884L22.4045 15.4728H22.417V13.7884ZM20.6919 14.4881L21.8741 15.6879H21.8741L20.6919 14.4881ZM19.9668 16.2027L18.2824 16.1903V16.2027H19.9668ZM18.2824 19.9667C18.2824 20.8969 19.0365 21.6511 19.9668 21.6511C20.8971 21.6511 21.6512 20.8969 21.6512 19.9667H18.2824ZM25.3569 12.104C24.4266 12.104 23.6725 12.8582 23.6725 13.7884C23.6725 14.7187 24.4266 15.4728 25.3569 15.4728V12.104ZM40.2872 15.4728C41.2174 15.4728 41.9716 14.7187 41.9716 13.7884C41.9716 12.8582 41.2174 12.104 40.2872 12.104V15.4728ZM58.1306 14.3822C58.4585 15.2527 59.4301 15.6926 60.3006 15.3646C61.1712 15.0367 61.611 14.0651 61.2831 13.1946L58.1306 14.3822ZM57.9843 9.21588L59.5605 8.62208C59.5559 8.60988 59.5512 8.59773 59.5463 8.58564L57.9843 9.21588ZM40.2871 0.315622C39.3568 0.315622 38.6027 1.06974 38.6027 2C38.6027 2.93026 39.3568 3.68438 40.2871 3.68438V0.315622ZM59.7068 15.4728C60.6371 15.4728 61.3912 14.7187 61.3912 13.7884C61.3912 12.8582 60.6371 12.104 59.7068 12.104V15.4728ZM40.2871 12.104C39.3568 12.104 38.6027 12.8582 38.6027 13.7884C38.6027 14.7187 39.3568 15.4728 40.2871 15.4728V12.104ZM59.7068 12.104C58.7765 12.104 58.0224 12.8581 58.0224 13.7884C58.0224 14.7186 58.7765 15.4728 59.7068 15.4728V12.104ZM66.9271 13.7884V15.4728L66.9381 15.4727L66.9271 13.7884ZM69.3751 16.2027H71.0595L71.0594 16.1902L69.3751 16.2027ZM67.6907 19.9667C67.6907 20.8969 68.4448 21.6511 69.3751 21.6511C70.3053 21.6511 71.0595 20.8969 71.0595 19.9667H67.6907ZM52.0618 30.2438C52.992 30.2438 53.7461 29.4897 53.7461 28.5595C53.7461 27.6292 52.992 26.8751 52.0618 26.8751V30.2438ZM37.794 26.8751C36.8637 26.8751 36.1096 27.6292 36.1096 28.5595C36.1096 29.4897 36.8637 30.2438 37.794 30.2438V26.8751ZM61.8629 26.8749C60.9326 26.8749 60.1785 27.629 60.1785 28.5593C60.1785 29.4896 60.9326 30.2437 61.8629 30.2437V26.8749ZM66.925 28.5593L66.9375 26.8749H66.925V28.5593ZM68.6501 27.8596L67.4679 26.6598V26.6598L68.6501 27.8596ZM69.3752 26.145L71.0596 26.1574V26.145H69.3752ZM71.0596 19.9667C71.0596 19.0365 70.3055 18.2824 69.3752 18.2824C68.4449 18.2824 67.6908 19.0365 67.6908 19.9667H71.0596ZM27.9934 30.2437C28.9237 30.2437 29.6778 29.4896 29.6778 28.5593C29.6778 27.629 28.9237 26.8749 27.9934 26.8749V30.2437ZM22.417 28.5593V26.8749L22.4045 26.875L22.417 28.5593ZM19.9668 26.145H18.2824L18.2825 26.1574L19.9668 26.145ZM21.6512 19.9667C21.6512 19.0365 20.8971 18.2824 19.9668 18.2824C19.0365 18.2824 18.2824 19.0365 18.2824 19.9667H21.6512ZM41.9714 2C41.9714 1.06974 41.2173 0.315622 40.287 0.315622C39.3568 0.315622 38.6026 1.06974 38.6026 2H41.9714ZM38.6026 13.7884C38.6026 14.7187 39.3568 15.4728 40.287 15.4728C41.2173 15.4728 41.9714 14.7187 41.9714 13.7884H38.6026ZM19.9668 18.2823C19.0365 18.2823 18.2824 19.0364 18.2824 19.9667C18.2824 20.8969 19.0365 21.6511 19.9668 21.6511V18.2823ZM24.4428 21.6511C25.373 21.6511 26.1271 20.8969 26.1271 19.9667C26.1271 19.0364 25.373 18.2823 24.4428 18.2823V21.6511ZM69.3752 21.6511C70.3055 21.6511 71.0596 20.8969 71.0596 19.9667C71.0596 19.0364 70.3055 18.2823 69.3752 18.2823V21.6511ZM64.7106 18.2823C63.7804 18.2823 63.0263 19.0364 63.0263 19.9667C63.0263 20.8969 63.7804 21.6511 64.7106 21.6511V18.2823ZM26.9331 14.3822L28.6557 9.80968L25.5032 8.62208L23.7806 13.1946L26.9331 14.3822ZM28.6414 9.84611C29.4807 7.76595 30.3223 6.23581 31.3768 5.21997C32.3616 4.27118 33.6225 3.68438 35.5552 3.68438V0.315622C32.8076 0.315622 30.6919 1.20208 29.0395 2.7939C27.4568 4.31867 26.4007 6.39646 25.5174 8.58564L28.6414 9.84611ZM35.5552 3.68438H40.2872V0.315622H35.5552V3.68438ZM25.3568 12.104H22.417V15.4728H25.3568V12.104ZM22.4295 12.1041C21.3377 12.096 20.2874 12.5219 19.5097 13.2883L21.8741 15.6879C22.0154 15.5486 22.2062 15.4713 22.4045 15.4727L22.4295 12.1041ZM19.5097 13.2883C18.7319 14.0546 18.2905 15.0985 18.2825 16.1903L21.6511 16.2151C21.6526 16.0167 21.7328 15.8271 21.8741 15.6879L19.5097 13.2883ZM18.2824 16.2027V19.9667H21.6512V16.2027H18.2824ZM25.3569 15.4728H40.2872V12.104H25.3569V15.4728ZM61.2831 13.1946L59.5605 8.62208L56.408 9.80968L58.1306 14.3822L61.2831 13.1946ZM59.5463 8.58564C58.663 6.39646 57.6069 4.31867 56.0242 2.7939C54.3718 1.20208 52.2561 0.315622 49.5085 0.315622V3.68438C51.4412 3.68438 52.7021 4.27118 53.6869 5.21997C54.7414 6.23581 55.583 7.76595 56.4222 9.84611L59.5463 8.58564ZM49.5085 0.315622H40.2871V3.68438H49.5085V0.315622ZM59.7068 12.104H40.2871V15.4728H59.7068V12.104ZM59.7068 15.4728H66.9271V12.104H59.7068V15.4728ZM66.9381 15.4727C67.3508 15.47 67.6877 15.8023 67.6908 16.2151L71.0594 16.1902C71.0427 13.9182 69.1883 12.0893 66.9162 12.104L66.9381 15.4727ZM67.6907 16.2027V19.9667H71.0595V16.2027H67.6907ZM52.0618 26.8751H37.794V30.2438H52.0618V26.8751ZM61.8629 30.2437H66.925V26.8749H61.8629V30.2437ZM66.9125 30.2436C68.0043 30.2517 69.0546 29.8258 69.8323 29.0594L67.4679 26.6598C67.3266 26.7991 67.1358 26.8764 66.9375 26.875L66.9125 30.2436ZM69.8323 29.0594C70.6101 28.2931 71.0515 27.2492 71.0595 26.1574L67.6909 26.1326C67.6894 26.331 67.6092 26.5206 67.4679 26.6598L69.8323 29.0594ZM71.0596 26.145V19.9667H67.6908V26.145H71.0596ZM27.9934 26.8749H22.417V30.2437H27.9934V26.8749ZM22.4045 26.875C22.2062 26.8764 22.0154 26.7991 21.8741 26.6598L19.5097 29.0594C20.2874 29.8258 21.3377 30.2517 22.4295 30.2436L22.4045 26.875ZM21.8741 26.6598C21.7328 26.5206 21.6526 26.331 21.6511 26.1326L18.2825 26.1574C18.2905 27.2492 18.7319 28.2931 19.5097 29.0594L21.8741 26.6598ZM21.6512 26.145V19.9667H18.2824V26.145H21.6512ZM38.6026 2V13.7884H41.9714V2H38.6026ZM19.9668 21.6511H24.4428V18.2823H19.9668V21.6511ZM69.3752 18.2823H64.7106V21.6511H69.3752V18.2823Z" fill="#008DD4" />
                                    </svg>
                                    <h6>Book online & have your car transported</h6>
                                </div>
                            </li>
                        </ul>
                        <a href="javascript:;" onclick="getInstantQuote();" class="getqt_btnincld">Get Instant Quotes <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.5 1.5L6.5 6.5L1.5 11.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section id="chooseus">
            <div class="container">
                <div class="wd_title text-center">
                    <h3>Why people choose Transport Any Car</h3>
                </div>
                <div class="row card_blogchoose">
                    <div class="col-lg-4 col-md-6">
                        <div class="choose_card">
                            <h5>Get quotes <b>quicker & easier</b> than ever </h5>
                            <img src="{{asset('assets/web/images/home/car-vehicle-motor-crossover-transportation.svg')}}" alt="image" />
                        </div>
                        <p class="chcard_pera">Getting a quote for transporting your vehicle with transport any car is quick and easy. Simply fill out our online form and you will start receiving quotes instantly.</p>
                       
                        <a href="javascript:;" onclick="getInstantQuote();" class="getqt_btnincld">Get Instant Quotes 
                            <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.5 1.5L6.5 6.5L1.5 11.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="choose_card">
                            <h5>Get quotes <b>sent directly</b> to your inbox </h5>
                            <img src="{{asset('assets/web/images/home/car-vehicle-transportation-automobile-sedan.svg')}}" alt="image" />
                        </div>
                        <p class="chcard_pera">Our network of car transport companies will send your quote within seconds. Meaning you can get back to what’s important while we take care of the rest.</p>
                       
                        <a href="javascript:;" onclick="getInstantQuote();" class="getqt_btnincld">Get Instant Quotes 
                            <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.5 1.5L6.5 6.5L1.5 11.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                      
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="choose_card">
                            <h5>
                                <b>Save over 70%</b> when you choose us
                            </h5>
                            <img src="{{asset('assets/web/images/home/car-vehicle-motor-automobile-supercar.svg')}}" alt="image" />
                        </div>
                        <p class="chcard_pera">You save money when you choose us as we match you with car transport companies that are already travelling similar routes. This allows them to bid competitively for your job.</p>
                        <a href="javascript:;" onclick="getInstantQuote();" class="getqt_btnincld">Get Instant Quotes <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.5 1.5L6.5 6.5L1.5 11.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section id="aboutus">
            <div class="container">
                <div class="row row-reverse">
                    <div class="col-lg-6 col-md-6">
                        <div class="wd_title text-left">
                            <h3>Environmentally <b>friendly</b>
                                <br /> vehicle transporting
                            </h3>
                            <img src="{{asset('assets/web/images/home/login_right_newph.png')}}" alt="image" class="choose_carimg phimg_right"  />
                            <p>When you use transport any car to have your vehicle transported you are choosing to help the environment by utilising the space on empty recovery vehicles already travelling on the road. <br /> Avoiding any wasteful journeys. </p>
                            <a href="javascript:;" onclick="getInstantQuote();" class="getqt_btnincld">Get Instant Quotes <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.5 1.5L6.5 6.5L1.5 11.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 carbg_resblog mt-auto">
                        <img src="{{asset('assets/web/images/home/login_right_new.png')}}" alt="image" class="choose_carimg deskimg_right"  />
                    </div>
                </div>
            </div>
        </section>
        <section id="review" class="text-center">
            <div class="container">
                <div class="wd_title">
                    <h3>Our <b>happy</b> customers</h3>
                    <p>Check out what our customers say about their experience with us</p>
                </div>
                @if(isMobile())
                    <div class="mob_review_section">
                    <div class="mob_review">
                    <div class="item">
                        <div class="reviewblog">
                            <div class="review_topblog">
                                <img src="{{asset('assets/web/images/home/starating.svg')}}" class="star_rating" alt="object" />
                                <h4>Very satisfied with the service</h4>
                                <p>“First time i have used transport any car and they were amazing! I got the best online quote and the transport company was very professional and efficient. Would defo recommend.</p>
                                <h6>Mark R</h6>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="reviewblog">
                            <div class="review_topblog">
                                <img src="{{asset('assets/web/images/home/starating.svg')}}" class="star_rating" alt="object" />
                                <h4>Would reccomend to anyone!</h4>
                                <p>“Put my details into the system and got loads of quotes almost instantly and i was able to choose the right one for me based on price and availability. Many thanks.</p>
                                <h6>Sarah L</h6>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="reviewblog">
                            <div class="review_topblog">
                                <img src="{{asset('assets/web/images/home/starating.svg')}}" class="star_rating" alt="object" />
                                <h4>Great experience with this company</h4>
                                <p>“Excellent service from start to finish! if you need a car transport service then look no further as these guys will make sure its a seamless experience from start to finish.</p>
                                <h6>Josh B</h6>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="reviewblog">
                            <div class="review_topblog">
                                <img src="{{asset('assets/web/images/home/starating.svg')}}" class="star_rating" alt="object" />
                                <h4>Excellent service once again</h4>
                                <p>“After using transport any car for the second time i can honestly say they are now my go to company for getting my car transported. Thanks guys</p>
                                <h6>Terry</h6>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="reviewblog">
                            <div class="review_topblog">
                                <img src="{{asset('assets/web/images/home/starating.svg')}}" class="star_rating" alt="object" />
                                <h4>Would reccomend to anyone!</h4>
                                <p>“Put my details into the system and got loads of quotes almost instantly and i was able to choose the right one for me based on price and availability. Many thanks.</p>
                                <h6>Sarah L</h6>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="reviewblog">
                            <div class="review_topblog">
                                <img src="{{asset('assets/web/images/home/starating.svg')}}" class="star_rating" alt="object" />
                                <h4>Great experience with this company</h4>
                                <p>“Excellent service from start to finish! if you need a car transport service then look no further as these guys will make sure its a seamless experience from start to finish.</p>
                                <h6>Josh B</h6>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                @else
                <div class="owl-review owl-carousel owl-theme">
                    <div class="item">
                        <div class="reviewblog">
                            <div class="review_topblog">
                                <img src="{{asset('assets/web/images/home/starating.svg')}}" class="star_rating" alt="object" />
                                <h4>Very satisfied with the service</h4>
                                <p>“First time i have used transport any car and they were amazing! I got the best online quote and the transport company was very professional and efficient. Would defo recommend.</p>
                                <h6>Mark R</h6>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="reviewblog">
                            <div class="review_topblog">
                                <img src="{{asset('assets/web/images/home/starating.svg')}}" class="star_rating" alt="object" />
                                <h4>Would reccomend to anyone!</h4>
                                <p>“Put my details into the system and got loads of quotes almost instantly and i was able to choose the right one for me based on price and availability. Many thanks.</p>
                                <h6>Sarah L</h6>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="reviewblog">
                            <div class="review_topblog">
                                <img src="{{asset('assets/web/images/home/starating.svg')}}" class="star_rating" alt="object" />
                                <h4>Great experience with this company</h4>
                                <p>“Excellent service from start to finish! if you need a car transport service then look no further as these guys will make sure its a seamless experience from start to finish.</p>
                                <h6>Josh B</h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="reviewblog">
                            <div class="review_topblog">
                                <img src="{{asset('assets/web/images/home/starating.svg')}}" class="star_rating" alt="object" />
                                <h4>Excellent service once again</h4>
                                <p>“After using transport any car for the second time i can honestly say they are now my go to company for getting my car transported. Thanks guys</p>
                                <h6>Terry</h6>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="reviewblog">
                            <div class="review_topblog">
                                <img src="{{asset('assets/web/images/home/starating.svg')}}" class="star_rating" alt="object" />
                                <h4>Would reccomend to anyone!</h4>
                                <p>“Put my details into the system and got loads of quotes almost instantly and i was able to choose the right one for me based on price and availability. Many thanks.</p>
                                <h6>Sarah L</h6>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="reviewblog">
                            <div class="review_topblog">
                                <img src="{{asset('assets/web/images/home/starating.svg')}}" class="star_rating" alt="object" />
                                <h4>Great experience with this company</h4>
                                <p>“Excellent service from start to finish! if you need a car transport service then look no further as these guys will make sure its a seamless experience from start to finish.</p>
                                <h6>Josh B</h6>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </section>
    </main>
@include('layouts.web.footer')
@endsection

@section('script')
    <script src="{{asset('assets/web/vendors/owl.carousel/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/web/js/main.js')}}"></script>
    <script src="{{asset('assets/admin/js/jquery.geocomplete.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script>
        function getInstantQuote()
        {
            $('#transportQuote').submit();
        }
    </script>
    <script>
        $(function () {

            $("#transportQuote").validate({
                //ignore: [],
                rules: {
                    start_point: {required: true,},
                    end_point: {required: true},
                },
                messages: {
                    start_point: {required: 'Please enter collection postcode'},
                    end_point: {required: 'Please enter delivery postcode'},
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.insertAfter($(element));
                },
                submitHandler: function (form) {
                    addOverlay();
                    form.submit();
                }
            });
            
            $('#choose-us').on('click', function() {
                $('.close-lable').click();
            });
        });
    </script>
    <script>
        // List of European countries
        const europeanCountries = @json(config('constants.european_countries'));

        // Initialize the Google Places Autocomplete for start point
        function initialize() {
            var input = document.getElementById('start_point');
            var options = {
                componentRestrictions: { country: europeanCountries }
            };

            var autocomplete = new google.maps.places.Autocomplete(input, options);

            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                console.log(place);

                if (!place.geometry) {
                    return;
                }

                document.getElementById('start_latitude').value = place.geometry.location.lat();
                document.getElementById('start_longitude').value = place.geometry.location.lng();
            });
        }

        // Initialize the Google Places Autocomplete for end point
        function initialize_end() {
            var input = document.getElementById('end_point');
            var options = {
                componentRestrictions: { country: europeanCountries }
            };

            var autocomplete = new google.maps.places.Autocomplete(input, options);

            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();

                if (!place.geometry) {
                    return;
                }

                document.getElementById('end_latitude').value = place.geometry.location.lat();
                document.getElementById('end_longitude').value = place.geometry.location.lng();
            });
        }

        // Callback function to initialize both start and end points
        function initMap() {
            initialize();
            initialize_end();
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{get_constants('google_map_key')}}&loading=async&libraries=places&callback=initMap"></script>

@endsection
