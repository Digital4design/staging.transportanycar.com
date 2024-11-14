@extends('layouts.web.dashboard.app')

@section('head_css')

@endsection

@section('content')

<style>

@media(max-width: 1400px){
    .wd-quote-box2 {
        width: 100%;
    }
}

@media(max-width: 580px){
    .accepted_quotes_row  .wd-quote-lft {
        column-gap: 15px;
    }
    .wd-quote-lft {
        row-gap: 15px;
    }
    .accepted_quotes_row .wd-quote-lft {
        display: flex;
        flex-wrap: wrap;
    }
    .accepted_quotes_row .wd-quote-lft .list_detail {
        width: 100%;
    }
    .new_dev_delivery .accepted_quotes_row .wd-quote-box .wd-quote-lft,
    .new_dev_delivery .accepted_quotes_row .wd-quote-box.accepted_quotes_new .wd-quote-lft {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        width: 100%;
    }
    .wd-quote-rght a {margin-bottom: 15px;}
    .wd-quote-box {align-items: flex-start;}
    .wd-quote-rght {
        width: 50%;
        align-items: flex-start;
    }
    .wd-quote-box {
        flex-direction: column;
    }
}

@media(max-width: 380px){
/* .accepted_quotes_row .wd-quote-lft .list_detail {
    width: 29%;
} */
}

</style>

    @include('layouts.web.dashboard.header')
    <section class="admin_del wd-active-job">
        <div class="container-job" style="padding-right: 20px;">
            <div class="wd-deliver-box">
                <div class="row h-100 new_dev_delivery">
                    <div class="col-lg-4">
                        <div class="wd-deliver-lft">
                            <div class="wd-profl-delivr">
                                <h1>Past Deliveries</h1>
                                <ul>
                                    {{-- <li>
                                        <a href="javascript:;">
                                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.525 12.35H18.05V9.14081C18.05 8.76377 17.8986 8.40159 17.6314 8.1344L14.6656 5.16862C14.3984 4.90143 14.0363 4.75002 13.6592 4.75002H12.35V3.32502C12.35 2.53831 11.7117 1.90002 10.925 1.90002H1.425C0.638281 1.90002 0 2.53831 0 3.32502V12.825C0 13.6117 0.638281 14.25 1.425 14.25H1.9C1.9 15.8235 3.17656 17.1 4.75 17.1C6.32344 17.1 7.6 15.8235 7.6 14.25H11.4C11.4 15.8235 12.6766 17.1 14.25 17.1C15.8234 17.1 17.1 15.8235 17.1 14.25H18.525C18.7862 14.25 19 14.0363 19 13.775V12.825C19 12.5638 18.7862 12.35 18.525 12.35ZM4.75 15.675C3.96328 15.675 3.325 15.0367 3.325 14.25C3.325 13.4633 3.96328 12.825 4.75 12.825C5.53672 12.825 6.175 13.4633 6.175 14.25C6.175 15.0367 5.53672 15.675 4.75 15.675ZM14.25 15.675C13.4633 15.675 12.825 15.0367 12.825 14.25C12.825 13.4633 13.4633 12.825 14.25 12.825C15.0367 12.825 15.675 13.4633 15.675 14.25C15.675 15.0367 15.0367 15.675 14.25 15.675ZM16.625 9.50002H12.35V6.17502H13.6592L16.625 9.14081V9.50002Z" fill="white"/>
                                            </svg> Booked Deliveries
                                        </a>
                                    </li>

                                    <li>
                                        <a href="javascript:;">
                                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.86533 2.86514C-0.345662 6.07613 -0.345662 11.2793 2.86533 14.4903C6.07631 17.7013 11.2795 17.7013 14.4905 14.4903C17.7015 11.2793 17.7015 6.07613 14.4905 2.86514C11.2795 -0.345845 6.07631 -0.345844 2.86533 2.86514ZM12.7092 5.95894C12.8639 6.11363 12.8639 6.36676 12.7092 6.52145L10.5529 8.67773L12.7092 10.834C12.8639 10.9887 12.8639 11.2418 12.7092 11.3965L11.3967 12.709C11.242 12.8637 10.9889 12.8637 10.8342 12.709L8.67792 10.5528L6.52163 12.709C6.36694 12.8637 6.11381 12.8637 5.95912 12.709L4.6466 11.3965C4.49191 11.2418 4.49191 10.9887 4.6466 10.834L6.80289 8.67773L4.6466 6.52145C4.49191 6.36676 4.49191 6.11363 4.6466 5.95894L5.95912 4.64642C6.11381 4.49173 6.36694 4.49173 6.52163 4.64642L8.67792 6.80271L10.8342 4.64642C10.9889 4.49173 11.242 4.49173 11.3967 4.64642L12.7092 5.95894Z" fill="white"/>
                                            </svg>

                                            Expired Quote Requests
                                        </a>
                                    </li> --}}

                                    <!-- <li>
                                        <a href="javascript:;">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_650_1100)">
                                                    <path d="M17.4437 7.36875C17.5537 7.86375 17.6175 8.3725 17.6175 8.895C17.6175 12.93 14.1925 16.2937 9.6825 17.0162C10.6362 17.4012 11.705 17.6262 12.8437 17.6262C13.9175 17.6262 14.9312 17.4287 15.8462 17.085C17.005 17.48 18.27 17.5825 19.3162 17.5825C18.8438 17.0159 18.4437 16.3928 18.125 15.7275C19.285 14.6925 20 13.3212 20 11.8113C20 10.0262 19.0037 8.435 17.4437 7.36875ZM15.7425 8.895C15.7425 5.36375 12.2187 2.5 7.87125 2.5C3.52375 2.5 0 5.36375 0 8.895C0 10.7375 0.96375 12.3925 2.49875 13.56C2.1138 14.546 1.57132 15.4629 0.8925 16.275C2.465 16.275 4.49 16.0687 6.04875 15.1112C6.635 15.225 7.24375 15.2912 7.87125 15.2912C12.2187 15.29 15.7425 12.4275 15.7425 8.895Z" fill="white"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_650_1100">
                                                        <rect width="20" height="20" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg> Leave feedback
                                        </a>
                                    </li> -->

                                    <li>
                                        <a href="{{route('front.logout')}}">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_650_1110)">
                                                    <path d="M15.75 0H7.5C6.90381 0.00178057 6.33255 0.239405 5.91098 0.660977C5.48941 1.08255 5.25178 1.65381 5.25 2.25V6.75H12C12.5967 6.75 13.169 6.98705 13.591 7.40901C14.0129 7.83097 14.25 8.40326 14.25 9C14.25 9.59674 14.0129 10.169 13.591 10.591C13.169 11.0129 12.5967 11.25 12 11.25H5.25V15.75C5.25178 16.3462 5.48941 16.9175 5.91098 17.339C6.33255 17.7606 6.90381 17.9982 7.5 18H15.75C16.3462 17.9982 16.9175 17.7606 17.339 17.339C17.7606 16.9175 17.9982 16.3462 18 15.75V2.25C17.9982 1.65381 17.7606 1.08255 17.339 0.660977C16.9175 0.239405 16.3462 0.00178057 15.75 0Z" fill="white"/>
                                                    <path d="M2.55772 9.75002H12.0002C12.1991 9.75002 12.3899 9.671 12.5305 9.53035C12.6712 9.38969 12.7502 9.19893 12.7502 9.00002C12.7502 8.8011 12.6712 8.61034 12.5305 8.46969C12.3899 8.32903 12.1991 8.25002 12.0002 8.25002H2.55772L3.53272 7.28252C3.67395 7.14129 3.75329 6.94974 3.75329 6.75002C3.75329 6.55029 3.67395 6.35874 3.53272 6.21752C3.39149 6.07629 3.19994 5.99695 3.00022 5.99695C2.80049 5.99695 2.60895 6.07629 2.46772 6.21752L0.217718 8.46752C0.0822483 8.61173 0.00683594 8.80215 0.00683594 9.00002C0.00683594 9.19788 0.0822483 9.3883 0.217718 9.53252L2.46772 11.7825C2.61133 11.9192 2.80198 11.9954 3.00022 11.9954C3.19845 11.9954 3.3891 11.9192 3.53272 11.7825C3.67323 11.6409 3.75208 11.4495 3.75208 11.25C3.75208 11.0505 3.67323 10.8591 3.53272 10.7175L2.55772 9.75002Z" fill="white"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_650_1110">
                                                        <rect width="18" height="18" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg> Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 accepted_quotes_row">
                        <div class="wd-delivr-rght new_sec_delivr">
                            <h2>Booked Deliveries</h2>
                            @forelse($quotes_booked as $item)
                                <div class="wd-quote-box accepted_quotes_new">
                                    <div class="wd-quote-lft">
                                        <div class="list_detail">
                                            <span>
                                                <img src="{{ asset('assets/web/images/dashboard/car-icon.svg') }}" alt="Car Icon">
                                            </span>
                                            <p>Make & model:</p>
                                            <p><b>{{ $item->vehicle_make }} {{ $item->vehicle_model }}</b></p>
                                        </div>

                                        <div class="list_detail">
                                            <span>
                                                <img src="{{ asset('assets/web/images/dashboard/map-icon.svg') }}" alt="Map Icon">
                                            </span>
                                            <p>Pick-up area:</p>
                                            <p><b>{{ $item->pickup_postcode }}</b></p>
                                        </div>

                                        <div class="list_detail">
                                            <span>
                                                <img src="{{ asset('assets/web/images/dashboard/credit-card.png') }}" alt="Credit Card Icon">
                                            </span>
                                            <p>Balance to pay:</p>
                                            <p><b>£@if($item->quoteByTransporter) {{ roundBasedOnDecimal($item->quoteByTransporter->transporter_payment) }} @endif</b></p>
                                        </div>

                                        <div class="list_detail">
                                            <span>
                                                <img src="{{ asset('assets/web/images/dashboard/calender.png') }}" alt="Calendar Icon">
                                            </span>
                                            <p>Accepted:</p>
                                            <p><b>{{ $item->updated_at->format('d M Y') }}</b></p>
                                        </div>

                                        <div class="list_detail">
                                            <span>
                                                <img src="{{ asset('assets/web/images/dashboard/red-map-icon.svg') }}" alt="Map Icon">
                                            </span>
                                            <p>Drop-off area:</p>
                                            <p><b>{{ $item->drop_postcode }}</b></p>
                                        </div>

                                        <div class="list_detail">
                                            <span>
                                                <img src="{{ asset('assets/web/images/dashboard/pound.png') }}" alt="Pound Icon">
                                            </span>
                                            <p>Quote:</p>
                                            <p><b>£@if($item->quoteByTransporter) {{ roundBasedOnDecimal($item->quoteByTransporter->price) }} @endif</b></p>
                                        </div>
                                    </div>

                                    <div class="wd-quote-rght">
                                        <a href="{{route('front.leave_feedback', ['id' => $item->quoteByTransporter->id ?? null]) }}"class="wd-leave-btn">Leave feedback</a>
                                        <a href="{{ route('front.user_deposit', ['id' => $item->quoteByTransporter->id ?? null]) }}">Contact transporter</a>
                                        @if($item->quoteByTransporter && $item->quoteByTransporter->id)
                                        <form id="download-form" action="{{ route('front.download_vat_receipt') }}" method="GET">
                                            <input type="hidden" name="payment_date" value="{{ $item->quoteByTransporter->updated_at }}">
                                            <input type="hidden" name="total" value="{{ $item->quoteByTransporter->deposit }}">
                                            <input type="hidden" name="vehicle_name" value="{{ $item->vehicle_make . ' ' . $item->vehicle_model }}">
                                        </form>
                                        <a href="javascript:;" id="download-vat-receipt" class="wd-orange">View VAT receipt </a>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <p>-Currently none to show-</p>
                            @endforelse
                            <h2>Expired Quote Requests</h2>
                            @forelse($quotes_cancelled as $item)
                            <div class="wd-quote-box">
                                <div class="wd-quote-box2">
                                    <div class="wd-quote-lft">
                                        <div class="list_detail">
                                        <span>
                                            <img src="{{asset('assets/web/images/dashboard/car-icon.svg')}}" alt="Map Icon">
                                        </span>
                                            <p>Make & model:</p>
                                            <p><b>{{$item->vehicle_make}} {{$item->vehicle_model}}</b></p>
                                        </div>
                                        <div class="list_detail">
                                            <span>
                                              <img src="{{asset('assets/web/images/dashboard/calender.png')}}" alt="Map Icon">
                                            </span>
                                            <p>Expired:</p>
                                            <p><b>{{ formatCustomDate($item->created_at->addDays(10)) }}</b></p>
                                        </div>
                                       
                                    </div>

                                    <div class="wd-quote-lft">
                                        <div class="list_detail">
                                            <span>
                                                <img src="{{asset('assets/web/images/dashboard/map-icon.svg')}}" alt="Map Icon">
                                            </span>
                                            <p>Pick-up area:</p>
                                            <p><b>{{$item->pickup_postcode}}</b></p>
                                        </div>
                                        <div class="list_detail">
                                            <span>
                                            <img src="{{asset('assets/web/images/dashboard/red-map-icon.svg')}}" alt="Map Icon">
                                            </span>
                                            <p>Drop-off area:</p>
                                            <p><b>{{$item->drop_postcode}}</b></p>
                                        </div>

                                        <div class="list_detail">
                                        <span>
                                          <img src="{{asset('assets/web/images/dashboard/pound.png')}}" alt="Map Icon">
                                        </span>
                                            <p>Quotes:</p>
                                            <p><b>{{$item->quotation_count}}</b></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="wd-quote-rght">
                                    <a href="javascript:;" class="wd-leave-btn">Relist</a>
                                </div>
                            </div>
                            @empty
                                <p>-Currently none to show-</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{asset('assets/web/js/admin.js')}}"></script>
    <script>
        const fileImage = document.querySelector('.input-preview__src');
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
        };
    </script>
    <script>
        $('#download-vat-receipt').on('click', function(e) {
            e.preventDefault();
            $('#download-form').submit();
        });
    </script>
@endsection

