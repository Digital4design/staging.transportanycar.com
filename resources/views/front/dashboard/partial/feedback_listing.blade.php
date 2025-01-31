
<style>
    .read-more {
        white-space: normal !important;
        max-width: 300px !important;
        word-wrap: break-word !important;
    }
    .user-feedback-stars li {
        padding: 0;
    }
</style>
<div class="overall-review py-3 py-md-5">
    <h2 class="total-review">Reviews (<?php echo count($feedbacks); ?>)</h2>
    {{-- <span class="total-rating my-2 d-block">{{ round($average_rating) }}/5</span> --}}
    <span class="total-rating my-2 d-block">{{ number_format($average_rating, 0) }}/5</span>

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
            $yellow_stars = floor($average_rating); // Full yellow stars
            $half_star = $average_rating - $yellow_stars >= 0.5; // Check for a half-star
            $grey_stars = $total_stars - $yellow_stars - ($half_star ? 1 : 0); // Remaining grey stars
        @endphp
        <ul class="wd-star-lst user-feedback-stars">
            {{-- Full yellow stars --}}
            @for ($i = 1; $i <= $yellow_stars; $i++)
                <li>
                    <svg width="20" height="20" viewBox="0 0 12 12" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                            fill="#FFA800" />
                    </svg>
                </li>
            @endfor

            {{-- Half star if applicable --}}
            @if ($half_star)
                <li>
                    <svg width="20" height="20" viewBox="0 0 12 12" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="halfStarGradient" x1="0%" y1="0%" x2="100%"
                                y2="0%">
                                <stop offset="50%" stop-color="#FFA800" />
                                <stop offset="50%" stop-color="#ccc" />
                            </linearGradient>
                        </defs>
                        <path
                            d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                            fill="url(#halfStarGradient)" />
                    </svg>
                </li>
            @endif

            {{-- Grey stars --}}
            @for ($i = 1; $i <= $grey_stars; $i++)
                <li>
                    <svg width="20" height="20" viewBox="0 0 12 12" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                            fill="#ccc" />
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
            <span class="review-percentage">{{ number_format($ratings['star_5'],0) }}%</span>
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
            <span class="review-percentage">{{number_format($ratings['star_4'],0) }}%</span>
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
            <span class="review-percentage">{{ number_format($ratings['star_3'],0) }}%</span>
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
            <span class="review-percentage">{{number_format($ratings['star_2'],0) }}%</span>
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
            <span class="review-percentage">{{ number_format($ratings['star_1'],0) }}%</span>
        </li>
    </ul>
</div>
<div class="review-outer-wrap">
    @foreach ($feedbacks as $feedback)
        <div class="review-wrap">
            <div class="feedback-user-name">
                @if ($feedback->quote_by_transporter->quote->user ?? '')
                    @if ($feedback->quote_by_transporter->quote->user->name ?? '')
                        {{ $feedback->quote_by_transporter->quote->user->name ?? '' }}
                    @else
                        {{ $feedback->quote_by_transporter->quote->user->username ?? '' }}
                    @endif
                @else
                    {{$feedback->first_name}}
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="9" viewBox="0 0 11 9"
                        fill="none">
                        <path
                            d="M3.73608 8.04173L0.161084 4.46672C-0.0536948 4.25195 -0.0536948 3.90371 0.161084 3.6889L0.938883 2.91108C1.15366 2.69628 1.50192 2.69628 1.7167 2.91108L4.125 5.31935L9.28329 0.161084C9.49807 -0.0536948 9.84633 -0.0536948 10.0611 0.161084L10.8389 0.938905C11.0537 1.15368 11.0537 1.50192 10.8389 1.71672L4.51391 8.04175C4.2991 8.25653 3.95086 8.25653 3.73608 8.04173Z"
                            fill="#52D017" />
                    </svg>
                    <span>Verified</span>
                </div>
            </ul>
            <div class="font-weight-light">{{ general_date($feedback->created_at) }}</div>
            <div class="feedback-item">{{ $feedback->vehical_name }} </div> 
            {{-- <div class="feedback-item">{{ $feedback->quote_by_transporter->quote->vehicle_make }}
                {{ $feedback->quote_by_transporter->quote->vehicle_model }}
            </div>  --}}
            <div class="font-weight-light">{!! $feedback->comment ? readMoreHelper($feedback->comment, 50) : '-' !!}</div>
        </div>
    @endforeach
</div>
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
