<style>
    @media (max-width: 580px) {

        .search_resu_sec .form-group.where_custom {
            padding: 10px 30px;
        }

        .srch-data {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .srch-data span {
            color: #9C9C9C;
            font-size: 15px;
        }

        .srch-data a {
            font-size: 15px;
            color: #80b6f7;
            text-decoration: underline;
            font-weight: 700;
        }

        .jobserch_mob .jobsrch_box {
            margin-bottom: 7px;
            box-shadow: 0px 0px 4px 0px rgb(0 0 0 / 15%);
        }

        .jobserch_mob ul.jobsrch_info_list {
            width: 90%;
        }

        .search_sec_footer span {
            font-size: 17px;
            text-align: center;
            display: block;
            color: #616161;
            line-height: normal;
        }

        .search_sec_footer span a {
            color: #80b6f7 !important;
            text-decoration: underline !important;
            font-size: 17px;
            text-underline-offset: 5px;
            font-weight: 400;
        }

        .search_sec_footer .srch-data {
            justify-content: center;
        }

        .content_container {
            padding-bottom: 0;
        }

        .new_job_design ul.jobsrch_info_list {
            margin: 0;
        }

        .new_job_design ul.jobsrch_info_list {
            margin: 0;
            display: block;
        }

        .jobserch_mob ul.jobsrch_info_list li.job_new_grid_img {
            width: 28%;
            float: left;
        }

        .jobserch_mob ul.jobsrch_info_list li.job_new_grid_post_code {
            width: 30%;
            float: left;
        }

        .jobserch_mob ul.jobsrch_info_list li.job_new_grid_vehi_modal {
            width: 41%;
            float: left;
            margin-bottom: 20px;
        }

        .jobserch_mob ul.jobsrch_info_list li.job_new_grid_drop_code {
            width: 30%;
            float: left;
        }

        .jobserch_mob ul.jobsrch_info_list li.job_new_grid_time_from {
            width: 40%;
            margin-bottom: 20px;
        }

        .jobserch_mob ul.jobsrch_info_list li.job_new_grid_miles {
            width: 59%;
            float: left;
            display: block;
            clear: both;
            padding-right: 10px;
        }

        .jobserch_mob ul.jobsrch_info_list li.job_new_grid_type {
            width: 59%;
            float: left;
            display: block;
            clear: both;
        }

        .jobserch_mob ul.jobsrch_info_list li.job_new_grid_img span {
            font-size: 10px;
        }

        .jobserch_mob ul.jobsrch_info_list li.job_new_grid_date {
            display: block;
            width: 59%;
            float: left;
            clear: both;
        }

        .jobserch_mob ul.jobsrch_info_list li.job_new_grid_lowest {
            width: 41%;
            display: block;
            float: left;
        }

        .jobserch_mob ul.jobsrch_info_list li.job_new_grid_bidding {
            width: 41%;
            display: block;
            float: left;
        }

        .jobserch_mob ul.jobsrch_info_list li span {
            font-size: 15px;
            font-weight: 400;
        }

        .jobserch_mob ul.jobsrch_info_list li {
            margin-bottom: 6px;
        }

        .jobserch_mob ul.jobsrch_info_list li.job_new_grid_bid_btn {
            display: block;
            width: 41%;
            float: left;
            margin: 0;
        }

        .jobserch_mob ul.jobsrch_info_list li.job_new_grid_bid_btn .jobsrch_right_box {
            margin: 0;
            display: flex;
            align-items: center;
        }

        .jobserch_mob ul.jobsrch_info_list li.job_new_grid_bid_btn .jobsrch_right_box a.make_offer_btn {
            margin-top: 0;
            font-size: 15px;
            width: max-content;
            padding: 7px 33px 10px;
            border-radius: 7px;
            text-transform: none;
        }

        .jobserch_mob ul.jobsrch_info_list li span.sub_color {
            color: #0356D6 !important;
        }

        .jobserch_mob ul.jobsrch_info_list li.job_new_grid_lowest span.sub_color {
            color: #52D017 !important;
        }

        .jobserch_mob ul.jobsrch_info_list li span.sub_color span {
            color: #9C9C9C;
        }

        small.new_tag {
            position: absolute;
            background: #52d017;
            color: #fff;
            right: -48px;
            padding: 3px 32px;
            font-size: 13px;
            transform: rotate(50deg);
            top: -11px;
        }

        small.expring_tag {
            position: absolute;
            background: #ED1C24;
            color: #fff;
            right: -56px;
            padding: 3px 32px;
            font-size: 12px;
            transform: rotate(50deg);
            top: -11px;
        }

        .jobsrch_box {
            position: relative;
            overflow: hidden;
        }

        .jobserch_mob ul.jobsrch_info_list li.job_new_grid_type span,
        .jobserch_mob ul.jobsrch_info_list li.job_new_grid_lowest span,
        .jobserch_mob ul.jobsrch_info_list li.job_new_grid_bidding span,
        .jobserch_mob ul.jobsrch_info_list li.job_new_grid_date span,
        .jobserch_mob ul.jobsrch_info_list li.job_new_grid_miles span {
            color: #000000ba;
            font-size: 12px;
            font-weight: 300;
        }


    }
</style>

<div class="jobsrch_form_blog search_resu_sec mb-0" style="display:block !important">
    <div class="form-group where_custom">
        <label id="pickupLabel">Your job search</label>
        <input type="text" class="form-control" name="search_pick_up_area" id="search_pick_up_area"
            placeholder="{{ $pickup }} - {{ $dropoff }}" disabled />
        <input type="hidden" name="pick_up_latitude" id="pick_up_latitude">
        <input type="hidden" name="pick_up_longitude" id="pick_up_longitude">
        <svg class="svgvector_mob d-md-none d-block" width="30" height="30" viewBox="0 0 30 30" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M2 13.4131C1.99918 7.96953 5.84383 3.28343 11.1827 2.22069C16.5215 1.15795 21.8676 4.01456 23.9514 9.04352C26.0353 14.0725 24.2764 19.8731 19.7506 22.898C15.2248 25.9228 9.19247 25.3294 5.34286 21.4806C3.20274 19.3412 2.00025 16.4392 2 13.4131Z"
                stroke="black" stroke-width="2.78571" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M21.4795 21.4824L27.9999 28.0028" stroke="black" stroke-width="2.78571" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
    </div>


</div>

<div class="savebtnS">
    {{-- <button type="button" id="saveSrch" class="make_offer_btn checkStatus">Save
        Search</button> --}}

    <a href="#" id="saveSrch" class="make_offer_btn checkStatus">Save search</a>
</div>

<div class="srch-data">
    <div class="srch-data-filter">
        @if ($quotes->total() == 0)
            <span>Results: 0</span>
        @else
            @if ($quotes->total() > 20)
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
    <a href="{{ route('transporter.new_jobs_new') }}">Reset Search</a>
</div>

@foreach ($quotes as $quote)
    <div class="boxContent">
        <div class="boxContentList" id="search-results">

            <h2 class="imgHeading">
                <span>Posted
                    {{ getTimeAgo($quote->created_at->toDateTimeString()) }}</span>
            </h2>
            <div class="boxImg-text car-row" data-car-id="{{ $quote->id }}">

                <div class="imgCol">
                    <img src="{{ $quote->image ? env('APP_URL') . '/' . $quote->image : env('APP_URL') . '/uploads/no_car_image.png' }}"
                        class="" alt="image" />
                </div>

                <div class="textCol">
                    <span class="hideMob">Posted
                        {{ getTimeAgo($quote->created_at->toDateTimeString()) }}</span>
                    @if (!is_null($quote->vehicle_make_1) && !is_null($quote->vehicle_model_1))
                        <h2>2x Vehicles</h2>
                    @else
                        <h2>
                            {{ $quote->vehicle_make }}
                            {{ $quote->vehicle_model }}
                        </h2>
                    @endif
                    <ul>
                        <li>
                            <i>
                                <svg width="16" height="22" viewBox="0 0 16 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.00002 0.16C7.5361 0.15999 7.16001 0.536063 7.16 0.999982C7.15999 1.4639 7.53606 1.83999 7.99998 1.84L8.00002 0.16ZM10.6782 1.5264L10.9964 0.748992L10.9961 0.748881L10.6782 1.5264ZM13.8198 4.08L13.1238 4.5503L13.1243 4.55106L13.8198 4.08ZM15 7.916H15.84L15.84 7.91465L15 7.916ZM12.949 12.8062L12.271 12.3103C12.2608 12.3243 12.251 12.3386 12.2417 12.3531L12.949 12.8062ZM10.9162 15.98L10.2088 15.5269L10.2059 15.5316L10.9162 15.98ZM8 20.6L7.2901 21.049C7.44414 21.2926 7.71225 21.4401 8.0004 21.44C8.28855 21.4399 8.55652 21.292 8.71033 21.0484L8 20.6ZM5.0838 15.9898L5.79371 15.5407L5.79151 15.5373L5.0838 15.9898ZM3.051 12.8104L3.75871 12.3579C3.74942 12.3434 3.73969 12.3291 3.72952 12.3152L3.051 12.8104ZM1 7.9202L0.16 7.91937V7.9202H1ZM2.1802 4.08L2.87569 4.55106L2.87573 4.551L2.1802 4.08ZM5.3218 1.5306L5.63951 2.3082L5.64092 2.30762L5.3218 1.5306ZM8.00124 1.84C8.46516 1.83932 8.84068 1.46268 8.84 0.998763C8.83932 0.534845 8.46268 0.159318 7.99876 0.160001L8.00124 1.84ZM8 9.38182C7.53608 9.38182 7.16 9.7579 7.16 10.2218C7.16 10.6857 7.53608 11.0618 8 11.0618V9.38182ZM8 4.77022C7.53608 4.77022 7.16 5.1463 7.16 5.61022C7.16 6.07414 7.53608 6.45022 8 6.45022V4.77022ZM8.02068 11.07C8.48445 11.0585 8.85116 10.6733 8.83973 10.2095C8.82829 9.74574 8.44306 9.37903 7.97928 9.39046L8.02068 11.07ZM5.95582 9.09437L6.67981 8.66841L5.95582 9.09437ZM5.95582 6.75585L5.23184 6.32989L5.95582 6.75585ZM7.97928 6.45975C8.44306 6.47119 8.82829 6.10449 8.83973 5.64071C8.85116 5.17693 8.48446 4.7917 8.02068 4.78026L7.97928 6.45975ZM7.99998 1.84C8.8094 1.84002 9.61108 1.99759 10.3603 2.30392L10.9961 0.748881C10.0451 0.360035 9.02746 0.160022 8.00002 0.16L7.99998 1.84ZM10.36 2.30381C11.4829 2.76336 12.4445 3.54504 13.1238 4.5503L14.5158 3.6097C13.6508 2.32959 12.4262 1.3342 10.9964 0.748992L10.36 2.30381ZM13.1243 4.55106C13.7974 5.54482 14.1581 6.7171 14.16 7.91735L15.84 7.91465C15.8375 6.37945 15.3762 4.88002 14.5153 3.60894L13.1243 4.55106ZM14.16 7.916C14.16 8.72866 14.0336 9.33192 13.7568 9.95594C13.4676 10.608 13.0038 11.3082 12.271 12.3103L13.627 13.3021C14.3614 12.298 14.9231 11.4701 15.2926 10.6371C15.6745 9.77608 15.84 8.93734 15.84 7.916H14.16ZM12.2417 12.3531L10.2089 15.5269L11.6235 16.4331L13.6563 13.2593L12.2417 12.3531ZM10.2059 15.5316L7.28967 20.1516L8.71033 21.0484L11.6265 16.4284L10.2059 15.5316ZM8.7099 20.151L5.7937 15.5408L4.3739 16.4388L7.2901 21.049L8.7099 20.151ZM5.79151 15.5373L3.75871 12.3579L2.34329 13.2629L4.37609 16.4423L5.79151 15.5373ZM3.72952 12.3152C2.99627 11.3105 2.5324 10.6102 2.24307 9.95836C1.96633 9.33489 1.84 8.73275 1.84 7.9202H0.16C0.16 8.94165 0.325572 9.7794 0.707534 10.6399C1.0769 11.4721 1.63853 12.2999 2.37248 13.3056L3.72952 12.3152ZM1.84 7.92103C1.84119 6.71953 2.20189 5.54586 2.87569 4.55106L1.48471 3.60894C0.622887 4.88135 0.161527 6.38255 0.16 7.91937L1.84 7.92103ZM2.87573 4.551C3.55555 3.54711 4.51715 2.76676 5.63951 2.3082L5.00409 0.752999C3.57488 1.33694 2.35036 2.33063 1.48467 3.609L2.87573 4.551ZM5.64092 2.30762C6.38988 2.00002 7.19157 1.84119 8.00124 1.84L7.99876 0.160001C6.97101 0.161514 5.95338 0.363125 5.00268 0.75358L5.64092 2.30762ZM8 11.0618C9.12389 11.0618 10.1624 10.4622 10.7243 9.48892L9.26942 8.64892C9.00758 9.10244 8.52368 9.38182 8 9.38182V11.0618ZM10.7243 9.48892C11.2863 8.5156 11.2863 7.31643 10.7243 6.34312L9.26942 7.18312C9.53126 7.63664 9.53126 8.1954 9.26942 8.64892L10.7243 9.48892ZM10.7243 6.34312C10.1624 5.3698 9.12389 4.77022 8 4.77022V6.45022C8.52368 6.45022 9.00758 6.7296 9.26942 7.18312L10.7243 6.34312ZM7.97928 9.39046C7.44715 9.40358 6.94973 9.12719 6.67981 8.66841L5.23184 9.52033C5.81113 10.5049 6.87865 11.0981 8.02068 11.07L7.97928 9.39046ZM6.67981 8.66841C6.40989 8.20964 6.40989 7.64058 6.67981 7.18181L5.23184 6.32989C4.65254 7.31448 4.65254 8.53574 5.23184 9.52033L6.67981 8.66841ZM6.67981 7.18181C6.94973 6.72303 7.44715 6.44664 7.97928 6.45975L8.02068 4.78026C6.87865 4.75212 5.81113 5.34529 5.23184 6.32989L6.67981 7.18181Z"
                                        fill="#52D017"></path>
                                </svg>
                            </i>
                            <span>{{ $quote->pickup_postcode ? $quote->pickup_postcode : '-' }}</span>
                        </li>

                        <li>
                            <i>
                                <svg width="16" height="22" viewBox="0 0 16 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.00002 0.16C7.5361 0.15999 7.16001 0.536063 7.16 0.999982C7.15999 1.4639 7.53606 1.83999 7.99998 1.84L8.00002 0.16ZM10.6782 1.5264L10.9964 0.748992L10.9961 0.748881L10.6782 1.5264ZM13.8198 4.08L13.1238 4.5503L13.1243 4.55106L13.8198 4.08ZM15 7.916H15.84L15.84 7.91465L15 7.916ZM12.949 12.8062L12.271 12.3103C12.2608 12.3243 12.251 12.3386 12.2417 12.3531L12.949 12.8062ZM10.9162 15.98L10.2088 15.5269L10.2059 15.5316L10.9162 15.98ZM8 20.6L7.2901 21.049C7.44414 21.2926 7.71225 21.4401 8.0004 21.44C8.28855 21.4399 8.55652 21.292 8.71033 21.0484L8 20.6ZM5.0838 15.9898L5.79371 15.5407L5.79151 15.5373L5.0838 15.9898ZM3.051 12.8104L3.75871 12.3579C3.74942 12.3434 3.73969 12.3291 3.72952 12.3152L3.051 12.8104ZM1 7.9202L0.16 7.91937V7.9202H1ZM2.1802 4.08L2.87569 4.55106L2.87573 4.551L2.1802 4.08ZM5.3218 1.5306L5.63951 2.3082L5.64092 2.30762L5.3218 1.5306ZM8.00124 1.84C8.46516 1.83932 8.84068 1.46268 8.84 0.998763C8.83932 0.534845 8.46268 0.159318 7.99876 0.160001L8.00124 1.84ZM8 9.38182C7.53608 9.38182 7.16 9.7579 7.16 10.2218C7.16 10.6857 7.53608 11.0618 8 11.0618V9.38182ZM8 4.77022C7.53608 4.77022 7.16 5.1463 7.16 5.61022C7.16 6.07414 7.53608 6.45022 8 6.45022V4.77022ZM8.02068 11.07C8.48445 11.0585 8.85116 10.6733 8.83973 10.2095C8.82829 9.74574 8.44306 9.37903 7.97928 9.39046L8.02068 11.07ZM5.95582 9.09437L6.67981 8.66841L5.95582 9.09437ZM5.95582 6.75585L5.23184 6.32989L5.95582 6.75585ZM7.97928 6.45975C8.44306 6.47119 8.82829 6.10449 8.83973 5.64071C8.85116 5.17693 8.48446 4.7917 8.02068 4.78026L7.97928 6.45975ZM7.99998 1.84C8.8094 1.84002 9.61108 1.99759 10.3603 2.30392L10.9961 0.748881C10.0451 0.360035 9.02746 0.160022 8.00002 0.16L7.99998 1.84ZM10.36 2.30381C11.4829 2.76336 12.4445 3.54504 13.1238 4.5503L14.5158 3.6097C13.6508 2.32959 12.4262 1.3342 10.9964 0.748992L10.36 2.30381ZM13.1243 4.55106C13.7974 5.54482 14.1581 6.7171 14.16 7.91735L15.84 7.91465C15.8375 6.37945 15.3762 4.88002 14.5153 3.60894L13.1243 4.55106ZM14.16 7.916C14.16 8.72866 14.0336 9.33192 13.7568 9.95594C13.4676 10.608 13.0038 11.3082 12.271 12.3103L13.627 13.3021C14.3614 12.298 14.9231 11.4701 15.2926 10.6371C15.6745 9.77608 15.84 8.93734 15.84 7.916H14.16ZM12.2417 12.3531L10.2089 15.5269L11.6235 16.4331L13.6563 13.2593L12.2417 12.3531ZM10.2059 15.5316L7.28967 20.1516L8.71033 21.0484L11.6265 16.4284L10.2059 15.5316ZM8.7099 20.151L5.7937 15.5408L4.3739 16.4388L7.2901 21.049L8.7099 20.151ZM5.79151 15.5373L3.75871 12.3579L2.34329 13.2629L4.37609 16.4423L5.79151 15.5373ZM3.72952 12.3152C2.99627 11.3105 2.5324 10.6102 2.24307 9.95836C1.96633 9.33489 1.84 8.73275 1.84 7.9202H0.16C0.16 8.94165 0.325572 9.7794 0.707534 10.6399C1.0769 11.4721 1.63853 12.2999 2.37248 13.3056L3.72952 12.3152ZM1.84 7.92103C1.84119 6.71953 2.20189 5.54586 2.87569 4.55106L1.48471 3.60894C0.622887 4.88135 0.161527 6.38255 0.16 7.91937L1.84 7.92103ZM2.87573 4.551C3.55555 3.54711 4.51715 2.76676 5.63951 2.3082L5.00409 0.752999C3.57488 1.33694 2.35036 2.33063 1.48467 3.609L2.87573 4.551ZM5.64092 2.30762C6.38988 2.00002 7.19157 1.84119 8.00124 1.84L7.99876 0.160001C6.97101 0.161514 5.95338 0.363125 5.00268 0.75358L5.64092 2.30762ZM8 11.0618C9.12389 11.0618 10.1624 10.4622 10.7243 9.48892L9.26942 8.64892C9.00758 9.10244 8.52368 9.38182 8 9.38182V11.0618ZM10.7243 9.48892C11.2863 8.5156 11.2863 7.31643 10.7243 6.34312L9.26942 7.18312C9.53126 7.63664 9.53126 8.1954 9.26942 8.64892L10.7243 9.48892ZM10.7243 6.34312C10.1624 5.3698 9.12389 4.77022 8 4.77022V6.45022C8.52368 6.45022 9.00758 6.7296 9.26942 7.18312L10.7243 6.34312ZM7.97928 9.39046C7.44715 9.40358 6.94973 9.12719 6.67981 8.66841L5.23184 9.52033C5.81113 10.5049 6.87865 11.0981 8.02068 11.07L7.97928 9.39046ZM6.67981 8.66841C6.40989 8.20964 6.40989 7.64058 6.67981 7.18181L5.23184 6.32989C4.65254 7.31448 4.65254 8.53574 5.23184 9.52033L6.67981 8.66841ZM6.67981 7.18181C6.94973 6.72303 7.44715 6.44664 7.97928 6.45975L8.02068 4.78026C6.87865 4.75212 5.81113 5.34529 5.23184 6.32989L6.67981 7.18181Z"
                                        fill="#ED1C24"></path>
                                </svg>
                            </i>
                            <span>{{ $quote->drop_postcode ? $quote->drop_postcode : '-' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- <h2 class="imgHeading">
                <span>Posted
                    {{ getTimeAgo($quote->created_at->toDateTimeString()) }}</span>
            </h2> --}}
            @php
                $modifiedDate = $quote->created_at->copy()->addDays(10); // Cloning to avoid modifying the original
            @endphp
            <div class="contentBlockBtn">
                <div class="leftList">
                    <ul class="col-6 px-0 car-row" data-car-id="{{ $quote->id }}">
                        <li>
                            <b>Expiry date:</b>
                            <span class="font-weight-light">
                                {{ formatCustomDate($modifiedDate) }}
                            </span>
                        </li>
                        <li class="colorDivBlue">
                            <b>Delivery date:</b>
                            @if ($quote->delivery_timeframe_from)
                                <span class="sub_color">{{ formatCustomDate($quote->delivery_timeframe_from) }}</span>
                            @else
                                <span class="sub_color">{{ $quote->delivery_timeframe }}</span>
                            @endif
                        </li>

                        <li class="colorDivBlue">
                            <b>Delivery type:</b>
                            <span class="sub_color"> {{ $quote->how_moved }}</span>
                        </li>
                        <li class="colorDivBlue">
                            <b>Journey miles:</b>
                            <span class="sub_color">{{ str_replace(' mi', '', $quote->distance) }}</span>
                            <span class="grey">({{ $quote->duration }})</span>
                        </li>

                    </ul>
                    {{-- <h1>{{$quote->lowest_bid }}</h1> --}}
                    <ul class="col-6 px-0">
                        {{-- @php
                            $lowestBid = $quote->lowest_bid ?? 0;
                            $transporterQuotesCount = $quote->tranporterId ?? 0;
                        @endphp --}}
                        @if ($quote->quotes_count > 0)
                            <li class="colorDivgreen car-row" data-car-id="{{ $quote->id }}">
                                <span><b>Current lowest bid:</b></span>
                                <span class="sub_color">£{{ $quote->lowest_bid }}</span>
                            </li>
                        @else
                            <li class="colorDivgreen car-row" data-car-id="{{ $quote->id }}">
                                <span><b>Current lowest bid:</b></span>
                                <span class="sub_color">£0</span>
                            </li>
                        @endif
                        <li class="colorDivBlue  mb-2 car-row" data-car-id="{{ $quote->id }}">
                            <b>Transporters bidding: </b>
                            @if ($quote->quotes_count > 0)
                                <span class="sub_color">{{ $quote->quotes_count }}</span>
                            @else
                                <span class="sub_color">0</span>
                            @endif
                        </li>
                        <li class="row mx-0 w-100 align-items-end mb-0">
                            <div class="btnCol">

                                @if ($quote->tranporterId == auth()->user()->id)
                                    <a href="javascript:;" onclick="share_edit_quote('{{ $quote->id }}');"
                                        class="w-100 mt-0 make_offer_btn checkStatus">Edit bid</a>
                                @else
                                    <a href="javascript:;" onclick="share_give_quote('{{ $quote->id }}');"
                                        class="w-100 mt-0 make_offer_btn checkStatus">
                                        Place bid</a>
                                @endif
                            </div>

                            <div class="iconDiv ml-4">
                                @if ($quote->watchlist_id == '0')
                                    <a href="javascript:;" style="margin-left: auto;" class=""
                                        onclick="addToWatchlist('{{ $quote->id }}');" style="margin-left: auto;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="none" stroke="#9C9C9C" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path
                                                d="M8 2.5C4.5 2.5 1.73 5.11.64 8c1.09 2.89 3.86 5.5 7.36 5.5s6.27-2.61 7.36-5.5C14.27 5.11 11.5 2.5 8 2.5z" />
                                            <circle cx="8" cy="8" r="3" />
                                        </svg>
                                    </a>
                                @else
                                    <a href="javascript:;" onclick="removeToWatchlist('{{ $quote->id }}');"
                                        style="margin-left: auto;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="#9C9C9C" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                            <path
                                                d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z" />
                                            <path
                                                d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829" />
                                            <path
                                                d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z" />
                                        </svg>

                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#9C9C9C"
                                            class="bi bi-eye-slash" viewBox="0 0 16 16">
                                            <path
                                                d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z" />
                                            <path
                                                d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829" />
                                            <path
                                                d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z" />
                                        </svg> --}}
                                    </a>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>

                @if ($quote->tranporterId == auth()->user()->id)
                    <div class="actionDiv">
                        <div class="rotated-banner">Bidding</div>
                    </div>
                @else
                    @if ($quote->created_at->timezone('Europe/London') > now('Europe/London')->subHour())
                        <div class="actionDiv">
                            <div class="rotated-banner green">new</div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endforeach

@if (count($quotes) == 0)
    <div class="col-12">
        <div class="card nodata-card border-0 rounded-3 bg-white h-100 overflow-hidden">
            <div class="card-body text-center p-3 py-5">
                -Currently no jobs to show-
            </div>
        </div>
    </div>
@endif
<div class="pagination after_search">
    {{ $quotes->links() }}
</div>
@if ($quotes->currentPage() == $quotes->lastPage())
    <div class="search_sec_footer">
        <div class="conatiner srch-data">
            <span>That’s all for now. Why not try<br>
                <a href="{{ route('transporter.new_jobs_new') }}">editing your search</a> for more jobs.
            </span>
        </div>
    </div>
@endif
