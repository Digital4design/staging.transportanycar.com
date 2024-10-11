
@if (count($quotes) == 0)
    <div class="col-12 biddata">
        <div class="card nodata-card border-0 rounded-3 bg-white h-100 overflow-hidden">
            <div class="card-body text-center p-3 py-5">
                -Currently no jobs to show-
            </div>
        </div>
    </div>
@else
    <div class="job-data">
        @if ($quotes->total() == 0)
            <span>Results: 0</span>
        @else
            @if ($quotes->total() > 50)
                <span>Results: {{ $quotes->firstItem() }}-{{ $quotes->lastItem() }} of {{ $quotes->total() }}</span>
            @else
                @if ($quotes->firstItem() == $quotes->lastItem())
                    <span>Results: {{ $quotes->firstItem() }} of {{ $quotes->total() }}</span>
                @else
                    <span>Results: {{ $quotes->firstItem() }}-{{ $quotes->lastItem() }} of {{ $quotes->total() }}</span>
                @endif
            @endif
        @endif
    </div>
    @foreach ($quotes as $quote)
    @php
    $transporterQuotesCount = 0;
@endphp
@php
    $lowestBid = $quote->lowest_bid ?? 0;
    $transporterQuotesCount = $quote->quotes_count ?? 0;
@endphp
        <div class="deshbord-job-listing job_list_desh_mobile" id="edit_bid_{{ $quote->id }}">
            @if ($type != 'cancel')
                <div class="bidding_new_design_date job_new_grid_date">
                    <span>Expiry date:</span>
                    <span>
                        {{ formatCustomDate($quote->created_at->addDays(10)) }}
                    </span>
                </div>
            @else
                <div class="bidding_new_design_date job_new_grid_date">
                    <span>Cancel date:</span>
                    <span>
                        {{ formatCustomDate($quote->qbt_updated_at) }}
                    </span>
                </div>
            @endif
            <li>
                {{-- <div class="bidding-pic-wrap"> --}}
                    <div class="list_img">
                        <img src="{{ $quote->image }}">

                        @if ($transporterQuotesCount > 0)
                        <p>£ {{ (roundBasedOnDecimal($lowestBid)) }}</p>
                        @endif

                        <span>Posted {{ getTimeAgo($quote->created_at->toDateTimeString()) }}</span>
                    </div>
                {{-- </div> --}}
                <div class="list_detail">
                    <span>
                        <img src="{{ asset('assets/web/images/dashboard/map-icon.svg') }}" alt="Map Icon">
                    </span>
                    <p>Pick-up area:</p>
                    <p><b>{{ $quote->pickup_postcode ? formatAddress($quote->pickup_postcode) : '-' }}</b></p>
                </div>
                <div class="list_detail">
                    <span>
                        <img src="{{ asset('assets/web/images/dashboard/red-map-icon.svg') }}" alt="Map Icon">
                    </span>
                    <p>Drop-off area:</p>
                    <p><b>{{ $quote->drop_postcode ? formatAddress($quote->drop_postcode) : '-' }}</b></p>
                </div>
                <div class="list_detail">
                    <span>
                        <img src="{{ asset('assets/web/images/dashboard/car-icon.svg') }}" alt="Car Icon">
                    </span>
                    <p>Make & model:</p>
                    <p><b>{{ $quote->vehicle_make }} {{ $quote->vehicle_model }}</b></p>
                </div>
                <div class="list_detail">
                    <span>
                        <img src="{{ asset('assets/web/images/dashboard/calendar.svg') }}" alt="calendar Icon">
                    </span>
                    <p>Delivery date:</p>
                    <p>
                        @if ($quote->delivery_timeframe_from)
                            <b>{{ date('d/m/Y', strtotime($quote->delivery_timeframe_from)) }}</b>
                        @else
                            <b>{{ $quote->delivery_timeframe }}</b>
                        @endif
                    </p>
                </div>
               
                @if ($type == 'all')
                    @if ($quote->status == 'completed' && $quote->qbt_status != 'pending')
                        <div class="won_details">
                            <a href="{{ route('transporter.current_jobs', ['id' => $quote->quote_by_transporter_id]) }}"
                                class="view_btn"> View details </a>
                        </div>
                        <div class="won_message">
                            <a href="{{ route('transporter.current_jobs', ['id' => $quote->quote_by_transporter_id]) }}"
                                class="view_btn"> Message </a>
                        </div>
                    @endif
                    @if ($quote->qbt_status == 'pending')
                        <div class="won_details">
                            <a href="javascript:;" id="edit_quote_{{ $quote->id }}"
                                onclick="edit_quote_amount(this, '{{ $quote->id }}');"
                                data-amount="{{ roundBasedOnDecimal($quote->transporter_payment) }}"
                                data-lowbid="{{ $lowestBid }}" data-bidcount="{{ $transporterQuotesCount }}"
                                class="view_btn edit_quote_btn won_details">Edit bid</a>
                        </div>
                        <div class="won_message">
                            <a href="{{ route('transporter.messages', ['thread_id' => $quote->thread_id]) }}"
                                class="view_btn edit_quote_btn">Message</a>
                        </div>
                        <a href="javascript:;" data-toggle="modal" data-target="#delete_quote_{{ $quote->id }}"
                            class="d-lg-block delete_btn_mobile">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 2C10.0222 2 8.08879 2.58649 6.4443 3.6853C4.79981 4.78412 3.51809 6.3459 2.76121 8.17317C2.00433 10.0004 1.8063 12.0111 2.19215 13.9509C2.578 15.8907 3.53041 17.6725 4.92894 19.0711C6.32746 20.4696 8.10929 21.422 10.0491 21.8079C11.9889 22.1937 13.9996 21.9957 15.8268 21.2388C17.6541 20.4819 19.2159 19.2002 20.3147 17.5557C21.4135 15.9112 22 13.9778 22 12C22 10.6868 21.7413 9.38642 21.2388 8.17317C20.7363 6.95991 19.9997 5.85752 19.0711 4.92893C18.1425 4.00035 17.0401 3.26375 15.8268 2.7612C14.6136 2.25866 13.3132 2 12 2ZM15.21 13.79C15.3037 13.883 15.3781 13.9936 15.4289 14.1154C15.4797 14.2373 15.5058 14.368 15.5058 14.5C15.5058 14.632 15.4797 14.7627 15.4289 14.8846C15.3781 15.0064 15.3037 15.117 15.21 15.21C15.117 15.3037 15.0064 15.3781 14.8846 15.4289C14.7627 15.4797 14.632 15.5058 14.5 15.5058C14.368 15.5058 14.2373 15.4797 14.1154 15.4289C13.9936 15.3781 13.883 15.3037 13.79 15.21L12 13.41L10.21 15.21C10.117 15.3037 10.0064 15.3781 9.88458 15.4289C9.76272 15.4797 9.63202 15.5058 9.5 15.5058C9.36799 15.5058 9.23729 15.4797 9.11543 15.4289C8.99357 15.3781 8.88297 15.3037 8.79 15.21C8.69628 15.117 8.62188 15.0064 8.57111 14.8846C8.52034 14.7627 8.49421 14.632 8.49421 14.5C8.49421 14.368 8.52034 14.2373 8.57111 14.1154C8.62188 13.9936 8.69628 13.883 8.79 13.79L10.59 12L8.79 10.21C8.6017 10.0217 8.49591 9.7663 8.49591 9.5C8.49591 9.2337 8.6017 8.9783 8.79 8.79C8.97831 8.6017 9.2337 8.49591 9.5 8.49591C9.76631 8.49591 10.0217 8.6017 10.21 8.79L12 10.59L13.79 8.79C13.9783 8.6017 14.2337 8.49591 14.5 8.49591C14.7663 8.49591 15.0217 8.6017 15.21 8.79C15.3983 8.9783 15.5041 9.2337 15.5041 9.5C15.5041 9.7663 15.3983 10.0217 15.21 10.21L13.41 12L15.21 13.79Z"
                                    fill="#ED1C24"></path>
                            </svg>
                        </a>
                    @endif
                @elseif($type == 'won')
                    @if ($quote->status == 'completed')
                        <div class="won_details">
                            <a href="{{ route('transporter.current_jobs', ['id' => $quote->quote_by_transporter_id]) }}"
                                class="view_btn"> View details </a>
                        </div>
                        <div class="won_message">
                            <a href="{{ route('transporter.current_jobs', ['id' => $quote->quote_by_transporter_id]) }}"
                                class="view_btn"> Message </a>
                        </div>
                    @endif
                @elseif($type == 'bidding')
                    <div class="won_details">
                        <a href="javascript:;" id="edit_quote_{{ $quote->id }}"
                            onclick="edit_quote_amount(this, '{{ $quote->id }}');"
                            data-amount="{{ roundBasedOnDecimal($quote->transporter_payment) }}"
                            data-lowbid="{{ $lowestBid }}" data-bidcount="{{ $transporterQuotesCount }}"
                            class="view_btn edit_quote_btn won_details">Edit bid</a>
                    </div>
                    <div class="won_message">
                        <a href="{{ route('transporter.messages', ['thread_id' => $quote->thread_id]) }}"
                            class="view_btn edit_quote_btn">Message</a>
                    </div>
                    @if ($is_dashboard != 1)
                        <a href="javascript:;" data-toggle="modal" data-target="#delete_quote_{{ $quote->id }}"
                            class="d-lg-block delete_btn_mobile">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 2C10.0222 2 8.08879 2.58649 6.4443 3.6853C4.79981 4.78412 3.51809 6.3459 2.76121 8.17317C2.00433 10.0004 1.8063 12.0111 2.19215 13.9509C2.578 15.8907 3.53041 17.6725 4.92894 19.0711C6.32746 20.4696 8.10929 21.422 10.0491 21.8079C11.9889 22.1937 13.9996 21.9957 15.8268 21.2388C17.6541 20.4819 19.2159 19.2002 20.3147 17.5557C21.4135 15.9112 22 13.9778 22 12C22 10.6868 21.7413 9.38642 21.2388 8.17317C20.7363 6.95991 19.9997 5.85752 19.0711 4.92893C18.1425 4.00035 17.0401 3.26375 15.8268 2.7612C14.6136 2.25866 13.3132 2 12 2ZM15.21 13.79C15.3037 13.883 15.3781 13.9936 15.4289 14.1154C15.4797 14.2373 15.5058 14.368 15.5058 14.5C15.5058 14.632 15.4797 14.7627 15.4289 14.8846C15.3781 15.0064 15.3037 15.117 15.21 15.21C15.117 15.3037 15.0064 15.3781 14.8846 15.4289C14.7627 15.4797 14.632 15.5058 14.5 15.5058C14.368 15.5058 14.2373 15.4797 14.1154 15.4289C13.9936 15.3781 13.883 15.3037 13.79 15.21L12 13.41L10.21 15.21C10.117 15.3037 10.0064 15.3781 9.88458 15.4289C9.76272 15.4797 9.63202 15.5058 9.5 15.5058C9.36799 15.5058 9.23729 15.4797 9.11543 15.4289C8.99357 15.3781 8.88297 15.3037 8.79 15.21C8.69628 15.117 8.62188 15.0064 8.57111 14.8846C8.52034 14.7627 8.49421 14.632 8.49421 14.5C8.49421 14.368 8.52034 14.2373 8.57111 14.1154C8.62188 13.9936 8.69628 13.883 8.79 13.79L10.59 12L8.79 10.21C8.6017 10.0217 8.49591 9.7663 8.49591 9.5C8.49591 9.2337 8.6017 8.9783 8.79 8.79C8.97831 8.6017 9.2337 8.49591 9.5 8.49591C9.76631 8.49591 10.0217 8.6017 10.21 8.79L12 10.59L13.79 8.79C13.9783 8.6017 14.2337 8.49591 14.5 8.49591C14.7663 8.49591 15.0217 8.6017 15.21 8.79C15.3983 8.9783 15.5041 9.2337 15.5041 9.5C15.5041 9.7663 15.3983 10.0217 15.21 10.21L13.41 12L15.21 13.79Z"
                                    fill="#ED1C24"></path>
                            </svg>
                        </a>
                    @endif
                @elseif($type == 'cancel')
                    <a href="javascript:;" class="view_btn cancel_btn_mobile"> View details </a>
                @endif
            </li>
            <div class="bidding_new_design">
                <div class="bidding_new_design_grid job_new_grid_type">
                    <span>Delivery type:</span>
                    <span class="sub_color">
                        {{ $quote->how_moved }}
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
                    <span class="sub_color">{{ str_replace(' mi', '', $quote->distance) }}
                        <span>({{ $quote->duration }})</span></span>
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
        <!-- delete quote Modal -->
        <div class="modal fade mark_bx" id="delete_quote_{{ $quote->id }}" tabindex="-1" role="dialog"
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
                        <h3 class="d-block text-center">Are you sure you want to <br /> cancel your bid ?</h3>
                    </div>
                    <div class="modal-footer p-0">
                        <a href="javascript:;" class="no_btn" data-dismiss="modal">No</a>
                        <a href="javascript:void(0)" onclick="quoteChangeStatus({{ $quote->id }}, 'rejected');"
                            class="yes_btn">Yes</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
<div class="pagination">
    {{ $quotes->links() }}
</div>
