<style>
    .read-more {
        white-space: normal !important;
        max-width: 300px !important;
        word-wrap: break-word !important;
    }
</style>
<div class="overall-review py-3 py-md-5">
    <h2 class="total-review">Reviews (<?php echo count($feedbacks); ?>)</h2>
    <span class="total-rating my-2 d-block">{{ round($average_rating) }}/5</span>
    @if (count($feedbacks) == 0)
        <ul class="wd-star-lst user-feedback-stars">
            <li>
                <svg width="20" height="20" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                        fill="#D9D9D9" />
                </svg>
            </li>
            <li>
                <svg width="20" height="20" viewBox="0 0 12 12" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                        fill="#D9D9D9" />
                </svg>
            </li>
            <li>
                <svg width="20" height="20" viewBox="0 0 12 12" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                        fill="#D9D9D9" />
                </svg>
            </li>
            <li>
                <svg width="20" height="20" viewBox="0 0 12 12" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                        fill="#D9D9D9" />
                </svg>
            </li>
            <li>
                <svg width="20" height="20" viewBox="0 0 12 12" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                        fill="#D9D9D9" />
                </svg>
            </li>
        </ul>
    @else
        @php
            $total_stars = 5; // Total number of stars
            $yellow_stars = round($average_rating);
            $ratings =round($ratings);// Full yellow stars
           $half_star = $average_rating - $yellow_stars > 0 ? true : false; // Check for a half-star
           $grey_stars = $total_stars - $yellow_stars - ($half_star ? 1 : 0); // Remaining grey stars
        @endphp
        <ul class="wd-star-lst user-feedback-stars">
            {{-- Full yellow stars --}}
            @for ($i = 1; $i <= $total_stars; $i++)
                <li>
                    <svg width="20" height="20" viewBox="0 0 12 12" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                            fill="{{ $i <= $yellow_stars ? '#FFA800' : '#ccc' }}" />
                    </svg>
                </li>
            @endfor
        </ul>
    @endif
    <div class="total-review-count my-3"> <?php echo count($feedbacks); ?> customer reviews</div>
    <ul class="review-count-bar">
        <li>
            <span class="review-steps">5</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 19" fill="none">
                <path
                    d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z"
                    fill="#595959" />
            </svg>
            <div class="review-base-bar">
                <div class="review-active-bar" style="width:{{ $ratings['star_5'] }}%">

                </div>
            </div>
            <span class="review-percentage">{{ $ratings['star_5'] }}%</span>
        </li>
        <li>
            <span class="review-steps">4</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 19" fill="none">
                <path
                    d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z"
                    fill="#595959" />
            </svg>
            <div class="review-base-bar">
                <div class="review-active-bar" style="width:{{ $ratings['star_4'] }}%">

                </div>
            </div>
            <span class="review-percentage">{{ $ratings['star_4'] }}%</span>
        </li>
        <li>
            <span class="review-steps">3</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 19" fill="none">
                <path
                    d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z"
                    fill="#595959" />
            </svg>
            <div class="review-base-bar">
                <div class="review-active-bar" style="width:{{ $ratings['star_3'] }}%">

                </div>
            </div>
            <span class="review-percentage">{{ $ratings['star_3'] }}%</span>
        </li>
        <li>
            <span class="review-steps">2</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 19" fill="none">
                <path
                    d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z"
                    fill="#595959" />
            </svg>
            <div class="review-base-bar">
                <div class="review-active-bar" style="width:{{ $ratings['star_2'] }}%">

                </div>
            </div>
            <span class="review-percentage">{{ $ratings['star_2'] }}%</span>
        </li>
        <li>
            <span class="review-steps">1</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 19"
                fill="none">
                <path
                    d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z"
                    fill="#595959" />
            </svg>
            <div class="review-base-bar">
                <div class="review-active-bar" style="width:{{ $ratings['star_1'] }}%">

                </div>
            </div>
            <span class="review-percentage">{{ $ratings['star_1'] }}%</span>
        </li>
    </ul>
</div>
<div class="review-outer-wrap">
    @foreach ($feedbacks as $feedback)
        <div class="review-wrap">
            <div class="feedback-user-name">
                @if ($feedback->quote_by_transporter->quote->user)
                    @if ($feedback->quote_by_transporter->quote->user->name)
                        {{ $feedback->quote_by_transporter->quote->user->name }}
                    @else
                        {{ $feedback->quote_by_transporter->quote->user->username }}
                    @endif
                @else
                    -
                @endif
            </div>
            <ul class="wd-star-lst user-feedback-stars other-reviews">
                @for ($i = 1; $i <= $total_stars; $i++)
                    <li>
                        <svg width="20" height="20" viewBox="0 0 12 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                fill="{{ $i <= $feedback->rating ? '#FFA800' : '#ccc' }}" />
                        </svg>
                    </li>
                @endfor
                <div class="feedback-user-verified">
                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="9" viewBox="0 0 11 9" fill="none">
                        <path d="M3.73608 8.04173L0.161084 4.46672C-0.0536948 4.25195 -0.0536948 3.90371 0.161084 3.6889L0.938883 2.91108C1.15366 2.69628 1.50192 2.69628 1.7167 2.91108L4.125 5.31935L9.28329 0.161084C9.49807 -0.0536948 9.84633 -0.0536948 10.0611 0.161084L10.8389 0.938905C11.0537 1.15368 11.0537 1.50192 10.8389 1.71672L4.51391 8.04175C4.2991 8.25653 3.95086 8.25653 3.73608 8.04173Z" fill="#52D017"/>
                    </svg>
                    <span>Verified</span>
                </div>
            </ul>
            <div class="font-weight-light">{{ general_date($feedback->created_at) }}</div>
            <div class="feedback-item">{{ $feedback->quote_by_transporter->quote->vehicle_make }}
                {{ $feedback->quote_by_transporter->quote->vehicle_model }}</div>
            <div class="font-weight-light">{!! $feedback->comment ? readMoreHelper($feedback->comment, 50) : '-' !!}</div>
        </div>
    @endforeach
</div>
{{-- <div class="table-responsive">
    <table>
        <thead>
        <tr>
            <th>Rating</th>
            <th>Item</th>
            <th>Left by</th>
            <th>Comments</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($feedbacks as $feedback)
        <tr>
            <td>
                @if ($feedback->type == 'positive')
                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.04688 6.5625H0.703125C0.314795 6.5625 0 6.8773 0 7.26562V14.2969C0 14.6852 0.314795 15 0.703125 15H3.04688C3.43521 15 3.75 14.6852 3.75 14.2969V7.26562C3.75 6.8773 3.43521 6.5625 3.04688 6.5625ZM1.875 13.8281C1.48667 13.8281 1.17188 13.5133 1.17188 13.125C1.17188 12.7367 1.48667 12.4219 1.875 12.4219C2.26333 12.4219 2.57813 12.7367 2.57813 13.125C2.57813 13.5133 2.26333 13.8281 1.875 13.8281ZM11.25 2.38629C11.25 3.62895 10.4892 4.32598 10.2751 5.15625H13.2553C14.2337 5.15625 14.9954 5.96912 15 6.85834C15.0024 7.38387 14.7789 7.94962 14.4305 8.29966L14.4273 8.30288C14.7154 8.98658 14.6686 9.94459 14.1546 10.6311C14.4089 11.3897 14.1525 12.3216 13.6746 12.8212C13.8005 13.3368 13.7404 13.7756 13.4945 14.1288C12.8966 14.9879 11.4145 15 10.1613 15L10.078 15C8.6633 14.9995 7.50551 14.4844 6.57522 14.0705C6.10773 13.8625 5.49648 13.6051 5.03271 13.5966C4.84111 13.593 4.6875 13.4367 4.6875 13.2451V6.98227C4.6875 6.88852 4.72506 6.79854 4.79174 6.73263C5.95231 5.58583 6.45135 4.37168 7.40259 3.41883C7.8363 2.9843 7.99404 2.32793 8.14653 1.69318C8.27681 1.15116 8.54933 0 9.14063 0C9.84376 0 11.25 0.234375 11.25 2.38629Z" fill="#52D017" />
                </svg>
                @elseif($feedback->type == 'neutral')
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
                @else
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
                @endif
            </td>

            <td>{{$feedback->quote_by_transporter->quote->vehicle_make}} {{$feedback->quote_by_transporter->quote->vehicle_model}}</td>
            <td>
                @if ($feedback->quote_by_transporter->quote->user)
                    @if ($feedback->quote_by_transporter->quote->user->name)
                        {{$feedback->quote_by_transporter->quote->user->name}}
                    @else
                        {{$feedback->quote_by_transporter->quote->user->username}}
                    @endif
                @else
                    -
                @endif
            <td class="read-more">{!! $feedback->comment ? readMoreHelper($feedback->comment, 50) : '-' !!}</td>
            <td>{{general_date($feedback->created_at)}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div> --}}
{{-- {{ $feedbacks->links() }} --}}
{{-- <nav aria-label="..."> --}}
{{--    <ul class="pagination"> --}}
{{--        <li class="page-item page-prenxt disabled"> --}}
{{--            <a class="page-link" href="javascript:;" tabindex="-1"> --}}
{{--                <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg"> --}}
{{--                    <path d="M5.5 1L1 5.5L5.5 10" stroke="black" stroke-linecap="round" /> --}}
{{--                </svg> --}}
{{--            </a> --}}
{{--        </li> --}}
{{--        <li class="page-item"> --}}
{{--            <a class="page-link" href="javascript:;">1</a> --}}
{{--        </li> --}}
{{--        <li class="page-item active"> --}}
{{--            <a class="page-link" href="javascript:;">2</a> --}}
{{--        </li> --}}
{{--        <li class="page-item"> --}}
{{--            <a class="page-link" href="javascript:;">3</a> --}}
{{--        </li> --}}
{{--        <li class="page-item"> --}}
{{--            <a class="page-link" href="javascript:;">4</a> --}}
{{--        </li> --}}
{{--        <li class="page-item page-prenxt"> --}}
{{--            <a class="page-link" href="javascript:;"> --}}
{{--                <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg"> --}}
{{--                    <path d="M1 1L5.5 5.5L1 10" stroke="black" stroke-linecap="round" /> --}}
{{--                </svg> --}}
{{--            </a> --}}
{{--        </li> --}}
{{--    </ul> --}}
{{-- </nav> --}}

@if ($feedbacks->lastPage() > 1)
    <nav aria-label="...">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            <li class="page-item{{ $feedbacks->currentPage() == 1 ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $feedbacks->previousPageUrl() }}" rel="prev"
                    aria-label="@lang('pagination.previous')">
                    <svg width="6" height="11" viewBox="0 0 6 11" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.5 1L1 5.5L5.5 10" stroke="black" stroke-linecap="round" />
                    </svg>
                </a>
            </li>

            {{-- Pagination Elements --}}
            @for ($i = 1; $i <= $feedbacks->lastPage(); $i++)
                @if ($i == $feedbacks->currentPage())
                    <li class="page-item active" aria-current="page"><span
                            class="page-link">{{ $i }}</span></li>
                @elseif ($i >= $feedbacks->currentPage() - 2 && $i <= $feedbacks->currentPage() + 2)
                    <li class="page-item"><a class="page-link"
                            href="{{ $feedbacks->url($i) }}">{{ $i }}</a></li>
                @elseif (
                    ($i == $feedbacks->currentPage() - 3 && $i > 1) ||
                        ($i == $feedbacks->currentPage() + 3 && $i < $feedbacks->lastPage()))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                @endif
            @endfor

            {{-- Next Page Link --}}
            <li class="page-item{{ $feedbacks->currentPage() == $feedbacks->lastPage() ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $feedbacks->nextPageUrl() }}" rel="next"
                    aria-label="@lang('pagination.next')">
                    <svg width="7" height="11" viewBox="0 0 7 11" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L5.5 5.5L1 10" stroke="black" stroke-linecap="round" />
                    </svg>
                </a>
            </li>
        </ul>
    </nav>
@endif
