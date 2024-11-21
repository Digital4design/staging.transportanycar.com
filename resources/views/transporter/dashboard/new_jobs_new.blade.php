@extends('layouts.transporter.dashboard.app')

@section('head_css')
    <style>
        .adjust-space-without-btn {
            margin-bottom: 40px!important;
        }
        .jobsrch_info_list h6 {
            width: 10% !important;
        }

        .vehicle_image {
            width: 500px !important;
        }

        a.make_offer_btn {
            margin-top: 30px;
        }

        .jobsrch_top_box img {
            object-fit: cover;
            height: 272px !important;
        }

        .jobsrch_info_list li:nth-last-child(1) {
            margin-bottom: 0;
        }

        .distance_text {
            margin-bottom: 25px;
        }

        h4.distance_text strong {
            color: #898989;
        }

        .jobsrch_info_list li small {
            font-size: 15px;
            margin-left: 10px;
        }

        .jpbsrch_inner {
            width: 50%;
        }

        .jobsrch_info_list span {
            width: 50%;
        }

        .jobsrch_info_list li {
            margin-bottom: 37px;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }


        /* .jobsrch_form_blog .form-control {
                            color: #000000;
                        } */
        .jobsrch_form_blog .error-message {
            position: absolute;
            bottom: -34px;
            padding-left: 0;
        }



        .custom-navigation {
            position: absolute;
            bottom: 14px;
            left: 15px;
            color: #fff;
            font-size: 15px;
        }

        .jobsrch_top_box .slick-prev {
            left: 10px;
        }

        .jobsrch_top_box .slick-next {
            right: 10px;
        }

        .jobsrch_top_box .slick-next,
        .jobsrch_top_box .slick-prev {
            z-index: 1;
        }

        .jobsrch_top_box .slick-next:before,
        .jobsrch_top_box .slick-prev:before {
            font-size: 0;
            display: block;
        }

        .jobsrch_top_box .slick-arrow.slick-disabled svg {
            display: none;
        }


        .bid_form input.form-control {
            height: auto;
            font-size: 20px;
        }

        .bid_form span.icon_includes {
            height: 62px;
        }

        .bid_form span#amount-error,
        .bid_form span#message-error {
            padding: 0;
        }

        .bid_form .form-group {
            position: relative;
        }

        .bid_form textarea.form-control.textarea {
            height: 107px;
        }

        .get_quote .modal-content {
            padding: 20px 30px;
            /* margin:0px 10px; */
        }

        .get_quote .modal-header span svg {
            margin-right: 0px;
            width: 17px;
            height: 17px;
        }

        /* .get_quote .modal-header .close {
                    position: absolute;
                    right: 15px;
                } */

        /* Add your CSS styling here */
        #popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border: 1px solid #ccc;
            text-align: center;
            width: 350px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 1;
            box-shadow: 0px 4px 4px 0px #00000040;
            border-radius: 8px;
        }

        #popup.show {
            display: block;
        }

        #popup img {
            width: 100%;
            margin: 20px 0;
        }

        #popup p {
            font-size: 20px;
            font-weight: 500;
        }

        .modal_current {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 7px;
        }

        .modal_current p {
            margin: 0;
            font-weight: normal;
            font-size: 13px;
            color: #000000d6;
        }

        .modal_current p span {
            color: #52D017;
        }

        .modal_current p span.red {
            color: #0356D6;
        }

        .modal-footer button.submit_btn {
            text-transform: none;
        }

        .submit_btn {
            padding: 8px 60px !important;
            margin: 0 auto 5px;
            font-size: 19px;
        }

        .page-item:last-child .page-link,
        .page-item:first-child .page-link {
            padding-bottom: 6px;
            padding-left: 3px;
            font-size: 20px;
        }




        /* start 16-09-2024 */

        .jobserch_mob li span.sub_color {
            margin-left: 4px;
        }

        .job-data {
            margin-left: 0px;
            margin-bottom: 0px;
        }

        .job-data span {
            color: #9C9C9C;
            font-size: 15px;
        }

        /* #carDetailsModal .modal-header button.btn-close {
                    position: absolute;
                    top: 11px;
                    right: 15px;
                } */

        #carDetailsModal .modal-header span {
            display: flex;
            align-items: center;
            color: #9C9C9C;
            font-size: 18px;
        }

        #carDetailsModal .modal-header {
            border-bottom: 0;
            padding-bottom: 0;
        }

        #carDetailsModal .modal-header span svg {
            margin-right: 7px;
        }

        #carDetailsModal .modal-header button.btn-close {
            background: transparent;
            border: none;
            font-size: 22px;
            color: #9C9C9C;
            padding: 0;
            margin-left: auto;
            line-height: 18px;
        }

        #carDetailsModal .jobsrch_box {
            padding: 0;
            background: transparent;
            border-radius: 0;
            border: none;
            box-shadow: none;
            margin-bottom: 0;
        }

        #carDetailsModal .jobsrch_box .col-lg-6 {
            flex: auto;
            max-width: 100%;
        }

        #carDetailsModal .jobsrch_box img.vehicle_image {
            height: 250px !important;
        }

        #carDetailsModal .modal-dialog {
            max-width: 500px;
        }

        #carDetailsModal h4.distance_text {
            margin-bottom: 20px;
            text-align: left;
            font-size: 16px;
        }

        #carDetailsModal .jobsrch_right_box {
            margin-top: 20px;
        }

        #carDetailsModal ul.jobsrch_info_list li {
            margin-bottom: 20px;
        }

        #carDetailsModal ul.jobsrch_info_list li svg {
            width: 24px;
        }

        .jobserch_mob li svg {
            margin-bottom: 7px;
            width: 22px;
            height: 22px;
        }

        .job_new_grid_bid_btn.pop_new_btn a.make_offer_btn {
            color: #fff !important;
            background: #52D017 !important;
        }

        .jobserch_mob li p {
            font-size: 15px;
            font-weight: 300;
            letter-spacing: 0em;
            color: #000;
            text-align: left;
            margin-bottom: 5px;
            display: block !important;
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

        .jobserch_mob .jobsrch_box {
            overflow: hidden;
        }

        small.expring_tag {
            position: absolute;
            background: #ED1C24;
            color: #fff;
            right: -54px;
            padding: 3px 32px;
            font-size: 12px;
            transform: rotate(50deg);
            top: -8px;
        }

        .content_container {
            padding: 95px 0 0px;
        }

        #page-content-wrapper {
            padding-bottom: 20px;
        }

        .get_quote.avoid-user-to-place-bid .modal-header {margin-bottom: 0;}
        .get_quote.avoid-user-to-place-bid .modal-content {border-radius: 8px; box-shadow: 0 4px 4px 0rgba(0,0,0,0.25); padding: 35px;}
        .get_quote.avoid-user-to-place-bid .modal-title {
            font-size: 20px;
            line-height: 25px;
            font-weight: 400;
        }
        .get_quote.avoid-user-to-place-bid .modal-body {
            font-size: 12px;
            line-height: 15px;
            font-weight: 300;
            color:#444444;
            text-align: center;
            margin: 25px 0;
        }
        .get_quote.avoid-user-to-place-bid .modal-dialog {
            max-width: 285px;
        }
        .get_quote.avoid-user-to-place-bid .modal-footer {margin-top: 0;}
        .get_quote.avoid-user-to-place-bid .modal-footer button {
            font-size: 14px;
            line-height: 18px;
            font-weight: 400!important;
            margin-bottom: 0;
            border-radius: 5px;
        }

        @media (min-width: 579px) {

            .jobserch_mob .jobsrch_box {
                border-radius: 10px;
                padding: 20px;
                margin-bottom: 20px;
            }

            .jobserch_mob .jobsrch_box .row {
                margin: 0;
            }

            .jobserch_mob .jobsrch_box ul.jobsrch_info_list {
                margin: 0;
                display: flex;
                flex-wrap: wrap;
                column-gap: 15px;
                position: relative;
                padding-top: 18px;
                row-gap: 0px;
            }

            .jobserch_mob li p {
                display: none;
            }

            .jobserch_mob .job_new_grid_img {
                width: 16%;
                margin-bottom: 15px;
            }

            .jobserch_mob .job_new_grid_post_code {
                width: 16%;
            }

            .jobserch_mob .job_new_grid_vehi_modal {
                width: 20%;
            }

            .jobserch_mob li {
                display: block;
                margin-bottom: 0;
                align-items: center;
            }

            .jobserch_mob li span {
                display: block;
                font-weight: 400;
            }

            .jobserch_mob .job_new_grid_drop_code {
                width: 16%;
            }

            .jobserch_mob .job_new_grid_time_from {
                width: 16%;
            }

            .jobserch_mob .job_new_grid_date {
                width: 30%;
                display: flex;
                position: absolute;
                top: -7px;
                left: 0;
            }

            .jobserch_mob .job_new_grid_date span {
                font-size: 12px;
                color: #000000ba;
            }

            .jobserch_mob .job_new_grid_img img {
                height: auto !important;
                border-radius: 5px;
            }

            .jobserch_mob .job_new_grid_img span {
                display: block;
                color: #9C9C9C;
                width: 100%;
                font-size: 8px;
            }

            .jobserch_mob .job_new_grid_lowest {
                width: 48%;
                display: flex;
            }

            .jobserch_mob .job_new_grid_type {
                width: 48%;
                display: flex;
            }

            .jobserch_mob .job_new_grid_bidding {
                width: 48%;
                display: flex;
            }

            .jobserch_mob .job_new_grid_miles {
                width: 48%;
                display: flex;
            }

            .jobserch_mob .job_new_grid_lowest span,
            .jobserch_mob .job_new_grid_type span,
            .jobserch_mob .job_new_grid_bidding span,
            .jobserch_mob .job_new_grid_miles span {
                font-size: 14px;
                font-weight: 300;
                color: #000000b8;
            }

            .jobserch_mob li span.sub_color {
                display: flex;
            }

            .jobserch_mob .job_new_grid_date span {
                width: max-content;
            }

            .jobserch_mob .job_new_grid_lowest span {
                width: max-content;
            }

            .jobserch_mob li span.sub_color {
                color: #52d017;
            }

            .jobserch_mob .job_new_grid_type span {
                width: max-content;
            }

            .jobserch_mob .job_new_grid_bidding span {
                width: max-content;
            }

            .jobserch_mob .job_new_grid_miles span {
                width: max-content;
            }

            .jobserch_mob .job_new_grid_type .sub_color {
                color: #0356D6;
            }

            .jobserch_mob .job_new_grid_bidding span.sub_color {
                color: #0356D6;
            }

            .job_new_grid_bid_btn.pop_new_btn {
                position: inherit;
                top: 6px;
                right: 0;
                width: max-content;
                margin-left: auto;
                display: block;
            }

            .jobserch_mob_grid.new_job_design {
                position: relative;
            }

            .job_new_grid_bid_btn.pop_new_btn a.make_offer_btn {
                margin: 0;
                padding: 6px 15px;
                font-size: 12px;
                border-radius: 7px;
                white-space: nowrap;
            }

            .jobserch_mob .job_new_grid_vehi_modal span {
                width: 100%;
            }


        }

        @media (min-width: 768px) {

            .jobserch_mob .jobsrch_box {
                border-radius: 10px;
                padding: 20px;
                margin-bottom: 20px;
            }

            .jobserch_mob .jobsrch_box .row {
                margin: 0;
            }

            .jobserch_mob .jobsrch_box ul.jobsrch_info_list {
                margin: 0;
                display: flex;
                flex-wrap: wrap;
                column-gap: 15px;
                position: relative;
                padding-top: 18px;
                row-gap: 0px;
            }

            .jobserch_mob .job_new_grid_img {
                width: 13%;
                margin-bottom: 15px;
            }

            .jobserch_mob .job_new_grid_post_code {
                width: 16%;
            }

            .jobserch_mob .job_new_grid_vehi_modal {
                width: 20%;
            }

            .jobserch_mob li {
                display: block;
                margin-bottom: 0;
                align-items: center;
            }

            .jobserch_mob li span {
                display: block;
                font-weight: 400;
            }

            .jobserch_mob .job_new_grid_drop_code {
                width: 16%;
            }

            .jobserch_mob .job_new_grid_time_from {
                width: 16%;
            }

            .jobserch_mob .job_new_grid_date {
                width: 30%;
                display: flex;
                position: absolute;
                top: -7px;
                left: 0;
            }

            .jobserch_mob .job_new_grid_date span {
                font-size: 12px;
                color: #000000ba;
            }

            .jobserch_mob .job_new_grid_img img {
                height: auto !important;
                border-radius: 5px;
            }

            .jobserch_mob .job_new_grid_img span {
                display: block;
                color: #9C9C9C;
                width: 100%;
                font-size: 8px;
            }

            .jobserch_mob .job_new_grid_lowest {
                width: 48%;
                display: flex;
            }

            .jobserch_mob .job_new_grid_type {
                width: 48%;
                display: flex;
            }

            .jobserch_mob .job_new_grid_bidding {
                width: 48%;
                display: flex;
            }

            .jobserch_mob .job_new_grid_miles {
                width: 48%;
                display: flex;
            }

            .jobserch_mob .job_new_grid_lowest span,
            .jobserch_mob .job_new_grid_type span,
            .jobserch_mob .job_new_grid_bidding span,
            .jobserch_mob .job_new_grid_miles span {
                font-size: 14px;
                font-weight: 300;
                color: #000000b8;
            }

            .jobserch_mob li span.sub_color {
                display: flex;
            }

            .jobserch_mob .job_new_grid_date span {
                width: max-content;
            }

            .jobserch_mob .job_new_grid_lowest span {
                width: max-content;
            }

            .jobserch_mob li span.sub_color {
                color: #52d017;
            }

            .jobserch_mob .job_new_grid_type span {
                width: max-content;
            }

            .jobserch_mob .job_new_grid_bidding span {
                width: max-content;
            }

            .jobserch_mob .job_new_grid_miles span {
                width: max-content;
            }

            .jobserch_mob .job_new_grid_type .sub_color {
                color: #0356D6;
            }

            .jobserch_mob .job_new_grid_bidding span.sub_color {
                color: #0356D6;
            }

            .job_new_grid_bid_btn.pop_new_btn {
                position: absolute;
                top: 16%;
                right: 0;
            }

            .jobserch_mob_grid.new_job_design {
                position: relative;
            }

            .job_new_grid_bid_btn.pop_new_btn a.make_offer_btn {
                margin: 0;
                padding: 6px 15px;
                font-size: 12px;
                border-radius: 7px;
                white-space: nowrap;
            }

            .jobserch_mob .job_new_grid_vehi_modal span {
                width: 100%;
            }

            .jobserch_mob li p {
                display: none !important;
            }





        }

        @media screen and (min-width: 1000px) and (max-width: 1199px) {

            .jobserch_mob .jobsrch_box {
                border-radius: 10px;
                padding: 20px;
                margin-bottom: 20px;
            }

            .jobserch_mob .jobsrch_box .row {
                margin: 0;
            }

            .jobserch_mob .jobsrch_box ul.jobsrch_info_list {
                margin: 0;
                display: flex;
                flex-wrap: wrap;
                column-gap: 15px;
                position: relative;
                padding-top: 18px;
                row-gap: 0px;
            }

            .jobserch_mob .job_new_grid_img {
                width: 13%;
                margin-bottom: 15px;
            }

            .jobserch_mob .job_new_grid_post_code {
                width: 16%;
            }

            .jobserch_mob .job_new_grid_vehi_modal {
                width: 20%;
            }

            .jobserch_mob li {
                display: block;
                margin-bottom: 0;
                align-items: center;
            }

            .jobserch_mob li span {
                display: block;
                font-weight: 400;
            }

            .jobserch_mob .job_new_grid_drop_code {
                width: 16%;
            }

            .jobserch_mob .job_new_grid_time_from {
                width: 16%;
            }

            .jobserch_mob .job_new_grid_date {
                width: 30%;
                display: flex;
                position: absolute;
                top: -7px;
                left: 0;
            }

            .jobserch_mob .job_new_grid_date span {
                font-size: 12px;
                color: #000000ba;
            }

            .jobserch_mob .job_new_grid_img img {
                height: auto !important;
                border-radius: 5px;
            }

            .jobserch_mob .job_new_grid_img span {
                display: block;
                color: #9C9C9C;
                width: 100%;
                font-size: 8px;
            }

            .jobserch_mob .job_new_grid_lowest {
                width: 48%;
                display: flex;
            }

            .jobserch_mob .job_new_grid_type {
                width: 48%;
                display: flex;
            }

            .jobserch_mob .job_new_grid_bidding {
                width: 48%;
                display: flex;
            }

            .jobserch_mob .job_new_grid_miles {
                width: 48%;
                display: flex;
            }

            .jobserch_mob .job_new_grid_lowest span,
            .jobserch_mob .job_new_grid_type span,
            .jobserch_mob .job_new_grid_bidding span,
            .jobserch_mob .job_new_grid_miles span {
                font-size: 14px;
                font-weight: 300;
                color: #000000b8;
            }

            .jobserch_mob li span.sub_color {
                display: flex;
            }

            .jobserch_mob .job_new_grid_date span {
                width: max-content;
            }

            .jobserch_mob .job_new_grid_lowest span {
                width: max-content;
            }

            .jobserch_mob li span.sub_color {
                color: #52d017;
            }

            .jobserch_mob .job_new_grid_type span {
                width: max-content;
            }

            .jobserch_mob .job_new_grid_bidding span {
                width: max-content;
            }

            .jobserch_mob .job_new_grid_miles span {
                width: max-content;
            }

            .jobserch_mob .job_new_grid_type .sub_color {
                color: #0356D6;
            }

            .jobserch_mob .job_new_grid_bidding span.sub_color {
                color: #0356D6;
            }

            .job_new_grid_bid_btn.pop_new_btn {
                position: absolute;
                top: 16%;
                right: 0;
            }

            .jobserch_mob_grid.new_job_design {
                position: relative;
            }

            .job_new_grid_bid_btn.pop_new_btn a.make_offer_btn {
                margin: 0;
                padding: 6px 15px;
                font-size: 12px;
                border-radius: 7px;
                white-space: nowrap;
            }

            .jobserch_mob .job_new_grid_vehi_modal span {
                width: 100%;
            }





        }

        @media(min-width: 1366px) {
            .jobserch_mob .jobsrch_box {
                border-radius: 10px;
                padding: 20px;
                margin-bottom: 20px;
            }

            .jobserch_mob .jobsrch_box .row {
                margin: 0;
            }

            .jobserch_mob .jobsrch_box ul.jobsrch_info_list {
                margin: 0;
                display: flex;
                flex-wrap: wrap;
                column-gap: 20px;
                position: relative;
                padding-top: 20px;
                row-gap: 10px;
            }

            .jobserch_mob .job_new_grid_img {
                width: 13%;
            }

            .jobserch_mob .job_new_grid_post_code {
                width: 16%;
            }

            .jobserch_mob .job_new_grid_vehi_modal {
                width: 20%;
            }

            .jobserch_mob li {
                display: block;
                margin-bottom: 0;
                align-items: center;
            }

            .jobserch_mob li span {
                display: block;
                font-weight: 400;
            }

            .jobserch_mob .job_new_grid_drop_code {
                width: 16%;
            }

            .jobserch_mob .job_new_grid_time_from {
                width: 16%;
            }

            .jobserch_mob .job_new_grid_date {
                width: 19%;
                display: flex;
                position: absolute;
                top: -7px;
                left: 0;
            }

            .jobserch_mob .job_new_grid_date span {
                font-size: 12px;
                color: #000000ba;
            }

            .jobserch_mob .job_new_grid_img img {
                height: auto !important;
                border-radius: 5px;
            }

            .jobserch_mob .job_new_grid_img span {
                display: block;
                color: #9C9C9C;
                width: 100%;
                font-size: 11px;
            }

            .jobserch_mob .job_new_grid_lowest {
                width: 20%;
                display: flex;
            }

            .jobserch_mob .job_new_grid_type {
                width: 22%;
                display: flex;
            }

            .jobserch_mob .job_new_grid_bidding {
                width: 20%;
                display: flex;
            }

            .jobserch_mob .job_new_grid_miles {
                width: 29%;
                display: flex;
            }

            .jobserch_mob .job_new_grid_lowest span,
            .jobserch_mob .job_new_grid_type span,
            .jobserch_mob .job_new_grid_bidding span,
            .jobserch_mob .job_new_grid_miles span {
                font-size: 14px;
                font-weight: 300;
                color: #000000b8;
            }

            .jobserch_mob li span.sub_color {
                display: flex;
            }

            .jobserch_mob .job_new_grid_date span {
                width: max-content;
            }

            .jobserch_mob .job_new_grid_lowest span {
                width: max-content;
            }

            .jobserch_mob li span.sub_color {
                color: #52d017;
            }

            .jobserch_mob .job_new_grid_type span {
                width: max-content;
            }

            .jobserch_mob .job_new_grid_bidding span {
                width: max-content;
            }

            .jobserch_mob .job_new_grid_miles span {
                width: max-content;
            }

            .jobserch_mob .job_new_grid_type .sub_color {
                color: #0356D6;
            }

            .jobserch_mob .job_new_grid_bidding span.sub_color {
                color: #0356D6;
            }

            .job_new_grid_bid_btn.pop_new_btn {
                position: absolute;
                top: 16%;
                right: 0;
            }

            .jobserch_mob_grid.new_job_design {
                position: relative;
            }

            .job_new_grid_bid_btn.pop_new_btn a.make_offer_btn {
                margin: 0;
                padding: 6px 15px;
                font-size: 12px;
                border-radius: 7px;
                white-space: nowrap;
            }

            .jobserch_mob .job_new_grid_vehi_modal span {
                width: 100%;
            }

            .jobserch_mob li p {
                display: block !important;
            }

        }

        @media(min-width: 1600px) {
            .jobserch_mob .jobsrch_box {
                border-radius: 10px;
                padding: 20px;
                margin-bottom: 20px;
            }

            .jobserch_mob .jobsrch_box .row {
                margin: 0;
            }

            .jobserch_mob .jobsrch_box ul.jobsrch_info_list {
                margin: 0;
                display: flex;
                flex-wrap: wrap;
                column-gap: 20px;
                position: relative;
                padding-top: 20px;
                row-gap: 10px;
            }

            .jobserch_mob .job_new_grid_img {
                width: 10%;
            }

            .jobserch_mob .job_new_grid_post_code {
                width: 16%;
            }

            .jobserch_mob .job_new_grid_vehi_modal {
                width: 20%;
            }

            .jobserch_mob li {
                display: block;
                margin-bottom: 0;
                align-items: center;
            }

            .jobserch_mob li span {
                display: block;
                font-weight: 400;
            }

            .jobserch_mob .job_new_grid_drop_code {
                width: 16%;
            }

            .jobserch_mob .job_new_grid_time_from {
                width: 16%;
            }

            .jobserch_mob .job_new_grid_date {
                width: 19%;
                display: flex;
                position: absolute;
                top: -7px;
                left: 0;
            }

            .jobserch_mob .job_new_grid_date span {
                font-size: 12px;
                color: #000000ba;
            }

            .jobserch_mob .job_new_grid_img img {
                height: auto !important;
                border-radius: 5px;
            }

            .jobserch_mob .job_new_grid_img span {
                display: block;
                color: #9C9C9C;
                width: 100%;
                font-size: 11px;
            }

            .jobserch_mob .job_new_grid_lowest {
                width: 23%;
                display: flex;
            }

            .jobserch_mob .job_new_grid_type {
                width: 23%;
                display: flex;
            }

            .jobserch_mob .job_new_grid_bidding {
                width: 24%;
                display: flex;
            }

            .jobserch_mob .job_new_grid_miles {
                width: 23%;
                display: flex;
            }

            .jobserch_mob .job_new_grid_lowest span,
            .jobserch_mob .job_new_grid_type span,
            .jobserch_mob .job_new_grid_bidding span,
            .jobserch_mob .job_new_grid_miles span {
                font-size: 14px;
                font-weight: 300;
                color: #000000b8;
            }

            .jobserch_mob li span.sub_color {
                display: flex;
            }

            .jobserch_mob .job_new_grid_date span {
                width: max-content;
            }

            .jobserch_mob .job_new_grid_lowest span {
                width: max-content;
            }

            .jobserch_mob li span.sub_color {
                color: #52d017;
            }

            .jobserch_mob .job_new_grid_type span {
                width: max-content;
            }

            .jobserch_mob .job_new_grid_bidding span {
                width: max-content;
            }

            .jobserch_mob .job_new_grid_miles span {
                width: max-content;
            }

            .jobserch_mob .job_new_grid_type .sub_color {
                color: #0356D6;
            }

            .jobserch_mob .job_new_grid_bidding span.sub_color {
                color: #0356D6;
            }

            .job_new_grid_bid_btn.pop_new_btn {
                position: absolute;
                top: 16%;
                right: 0;
            }

            .jobserch_mob_grid.new_job_design {
                position: relative;
            }

            .job_new_grid_bid_btn.pop_new_btn a.make_offer_btn {
                margin: 0;
                padding: 6px 15px;
                font-size: 12px;
                border-radius: 7px;
                white-space: nowrap;
            }

            .jobserch_mob .job_new_grid_vehi_modal span {
                width: 100%;
            }

        }

        @media(max-width: 767px) {
            .jobserch_mob li p {
                display: none !important;
            }
        }

        /* end 16-09-2024 */
        @media(max-width: 580px) {
            .jobsrch_info_list li small {
                font-size: 14px;
                margin-left: 7px;
            }

            .jobsrch_info_list span {
                font-size: 14px;
                width: 47%;
            }

            .jpbsrch_inner {
                width: 53%;
            }

            .jobsrch_info_list li {
                margin-bottom: 20px;
            }

            .jobsrch_top_box img {
                height: 203px !important;
            }

            .distance_text {
                margin-bottom: 20px;
                text-align: left;
                font-size: 16px;
            }

            .jobsrch_right_box {
                margin-top: 30px;
            }

            .modal-content {
                border-radius: 10px;
            }



            .jobserch_mob_grid {
                display: flex;
            }

            .jobserch_mob .jobsrch_top_box {
                width: 100px;
            }

            .jobserch_mob .jobsrch_top_box img {
                height: 60px !important;
                border-radius: 5px;
                width: 87px !important;
            }

            .jobserch_mob ul.jobsrch_info_list {
                margin: 0 0 0 10px;
                display: flex;
                flex-wrap: wrap;
            }

            .jobserch_mob ul.jobsrch_info_list li {
                width: 50%;
                margin: 0;
                display: flex;
                align-items: flex-start;
                line-height: normal;
            }

            .jobserch_mob .row {
                margin: 0;
            }

            .jobserch_mob {
                width: calc(100% + 60px);
                margin-left: -30px;
            }

            .jobserch_mob .jobsrch_box {
                padding: 20px;
                margin-bottom: 7px;
                border-radius: 0;
            }

            .jobserch_mob ul.jobsrch_info_list li span {
                width: 100%;
                font-size: 15px;
                display: inline;
                line-height: normal;
            }

            .jobserch_mob ul.jobsrch_info_list li svg {
                margin-right: 7px;
                width: 21px;
                display: inline-block;
            }

            .jobserch_mob .jobsrch_top_box span {
                font-size: 10px;
                color: #9C9C9C;
            }

            .modal-header {
                border-bottom: 0;
                padding-bottom: 0;
            }

            button.btn-close {
                background: transparent;
                border: none;
                font-size: 22px;
                color: #9C9C9C;
                padding: 0;
                margin-left: auto;
            }

            .modal-header span {
                display: flex;
                align-items: center;
                color: #9C9C9C;
                font-size: 18px;
            }

            .modal-header span svg {
                margin-right: 7px;
            }

            .modal-body .jobsrch_box {
                padding: 0;
                margin-bottom: 0;
                box-shadow: none;
                border-radius: 0;
            }

            .jobsrch_form_blog .form-group.field_filled,
            .jobsrch_form_blog .form-group.field_active {
                padding: 22px 24px;
                box-shadow: none;
                font-size: 18px;
                color: #000;
            }

            .jobsrch_form_blog .form-control {
                font-size: 18px;
                /* color: #000000; */
            }

            .jobsrch_form_blog .error-message {
                position: absolute;
                bottom: -24px;
                padding-left: 0;
            }



            .job_se_sec.slick-initialized .slick-slide {
                display: block;
                width: 380px !important;
            }

            .job_se_sec .slick-track {
                width: 760px !important;
            }

            .job_se_sec .slick-list.draggable {
                height: 203px !important;
            }

            /* .modal-header button.btn-close {
                        position: absolute;
                        top: 11px;
                        right: 15px;
                    } */

            .jobserch_mob .jobsrch_box {
                padding: 20px 20px 10px;
            }



            /* 16-08-2024 */

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
                margin-bottom: 14px;
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
                width: 77%;
                line-height: 1;
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
                right: -50px;
                padding: 3px 32px;
                font-size: 13px;
                transform: rotate(50deg);
                top: -12px;
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

            .jobserch_mob_grid.new_job_design ul.jobsrch_info_list {
                width: 100%;
            }

            .jobserch_mob_grid {
                display: flex;
                flex-wrap: wrap;
                position: relative;
                padding-bottom: 11px;
                width: 100%;
            }

            .pop_new_btn .jobsrch_right_box {
                position: absolute;
                right: 7%;
                bottom: 0;
                margin: 0;
            }

            .pop_new_btn .jobsrch_right_box a.make_offer_btn {
                font-size: 15px;
                padding: 7px 33px 10px;
                border-radius: 7px;
            }

            .jpbsrch_inner svg {
                width: 24px;
            }


            .job-data span {
                color: #9C9C9C;
                font-size: 15px;
            }

            .job-data {
                margin-left: -10px;
                margin-bottom: 8px;
            }

            .content_container {
                padding-bottom: 0;
            }

            .jobserch_mob li p {
                display: none !important;
            }


        }

        @media(max-width: 400px) {
            .jobsrch_box {
                padding: 10px;
                margin-bottom: 24px;
            }

            .pop_new_btn .jobsrch_right_box {
                right: 5%;
            }
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/globle.css') }}" />
@endsection


@section('content')
    <div id="wrapper">
        <!-- SIDEBAR -->
        @include('layouts.transporter.dashboard.sidebar')
        <div id="page-content-wrapper">
            @include('layouts.transporter.dashboard.top_head')
            <!-- content part -->
            <div class="content_container">
                <div class="banner" id="spam-banner" style="display:none">
                    <h2 class="spam-title">Check your spam.</h2>
                    <p>Please check your spam or junk folder and mark email as ‘not spam’ so that you don’t miss out on any
                        important email notifications. You can unsubscribe from job alert emails at any time within your
                        profile.</p>
                    <button onclick="hideBanner()" class="btn btn-success">Ok, got it</button>
                </div>
                <div class="job_container">
                    <div class="admin_job_bx find_trans_newjob list_of_items" id="style-1">


                        <!------------------------ 27-09-2024 start ------------------>

                        <section class="transportSection container">
                            <div class="admin_job_top" style="margin-bottom:20px!important;">
                                <h3>Find <br>transport jobs</h3>
                            </div>
                            <div class="">
                                <div id="popup">
                                    <p>Searching for transport jobs that match your criteria...</p>
                                    <img src="/uploads/loading-popup.gif" alt="Loading">
                                </div>
                                <p class="pera_srch">Search for jobs and make an offer.</p>
                                <form id="jobsrch_form_blog" class="jobsrch_form_blog">
                                    <div class="form-group where_custom">
                                        <label id="pickupLabel">Where from?</label>
                                        <input type="text" class="form-control" name="search_pick_up_area"
                                            id="search_pick_up_area" placeholder="Search collection area " />
                                        <input type="hidden" name="pick_up_latitude" id="pick_up_latitude">
                                        <input type="hidden" name="pick_up_longitude" id="pick_up_longitude">
                                        <svg class="svgvector_mob d-md-none d-block" width="22" height="22"
                                            viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M2 13.4131C1.99918 7.96953 5.84383 3.28343 11.1827 2.22069C16.5215 1.15795 21.8676 4.01456 23.9514 9.04352C26.0353 14.0725 24.2764 19.8731 19.7506 22.898C15.2248 25.9228 9.19247 25.3294 5.34286 21.4806C3.20274 19.3412 2.00025 16.4392 2 13.4131Z"
                                                stroke="black" stroke-width="2.78571" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M21.4795 21.4824L27.9999 28.0028" stroke="black" stroke-width="2.78571"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="suggest_filter where_box" style="display: none;">
                                        <label>London</label>
                                        <label>Manchester</label>
                                        <label>Newcastle</label>
                                        <label>Birmingham</label>
                                        <label>Liverpool</label>
                                        <label>Essex</label>
                                        <label>Leeds</label>
                                        <label>Wales</label>
                                        <label>Sheffield</label>
                                        <label>Devon</label>
                                    </div>
                                    <div class="form-group drop_off_box">
                                        <label id="dropoffLabel">Where to?</label>
                                        <input type="text" class="form-control" name="search_drop_off_area"
                                            id="search_drop_off_area" placeholder="Anywhere" />
                                        <input type="hidden" name="drop_off_latitude" id="drop_off_latitude">
                                        <input type="hidden" name="drop_off_longitude" id="drop_off_longitude">
                                        <svg class="svgvector_mob d-md-none d-block" width="22" height="22"
                                            viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M2 13.4131C1.99918 7.96953 5.84383 3.28343 11.1827 2.22069C16.5215 1.15795 21.8676 4.01456 23.9514 9.04352C26.0353 14.0725 24.2764 19.8731 19.7506 22.898C15.2248 25.9228 9.19247 25.3294 5.34286 21.4806C3.20274 19.3412 2.00025 16.4392 2 13.4131Z"
                                                stroke="black" stroke-width="2.78571" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M21.4795 21.4824L27.9999 28.0028" stroke="black" stroke-width="2.78571"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="suggest_filter to_box" style="display: none;">
                                        <label>Anywhere</label>
                                        <label>London</label>
                                        <label>Manchester</label>
                                        <label>Newcastle</label>
                                        <label>Birmingham</label>
                                        <label>Liverpool</label>
                                        <label>Essex</label>
                                        <label>Leeds</label>
                                        <label>Wales</label>
                                        <label>Sheffield</label>
                                        <label>Devon</label>
                                    </div>
                                    
                                   
                                    <div class="form-group">
                                        <a href="javascript:;" class="srchjob_byn" id="search_job">
                                            <svg class="d-md-inline-block d-none" xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="17" viewBox="0 0 16 17" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1.21851 7.6448C1.21806 4.71363 3.28826 2.19034 6.16303 1.6181C9.0378 1.04585 11.9165 2.58403 13.0385 5.29194C14.1606 7.99984 13.2135 11.1233 10.7765 12.752C8.33955 14.3808 5.09138 14.0612 3.01851 11.9888C1.86613 10.8368 1.21864 9.27422 1.21851 7.6448Z"
                                                    stroke="#F9FFF1" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M11.7075 11.9897L15.2185 15.5007" stroke="#F9FFF1"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg><span class="d-md-inline-block d-none">Search</span> <span
                                                class="d-md-none d-inline-block">Search jobs</span>
                                        </a>
                                    </div>
                                </form>
                            </div>
                            {{-- <div class="form-group">
                                <button type="button"  id="saveSrch" class="btn btn-success">Save
                                    Search</button>
                            </div> --}}

                            <div class="mainContentDiv">
                                <div class="job-data">
                                    @if ($quotes->total() == 0)
                                        <span>Results: 0</span>
                                    @else
                                        @if ($quotes->total() > 50)
                                            <span>Results: {{ $quotes->firstItem() }}-{{ $quotes->lastItem() }} of
                                                {{ $quotes->total() }}</span>
                                        @else
                                            @if ($quotes->firstItem() == $quotes->lastItem())
                                                <span>Results: {{ $quotes->firstItem() }} of {{ $quotes->total() }}</span>
                                            @else
                                                <span>Results: {{ $quotes->firstItem() }}-{{ $quotes->lastItem() }} of
                                                    {{ $quotes->total() }}</span>
                                            @endif
                                        @endif
                                    @endif
                                </div>
                                <div id="orderlisting">
                                    @foreach ($quotes as $quote)
                                        <div class="boxContent">
                                            <div class="boxContentList">

                                                <h2 class="imgHeading">
                                                    <span>Posted
                                                        {{ getTimeAgo($quote->created_at->toDateTimeString()) }}</span>
                                                </h2>
                                                <div class="boxImg-text car-row" data-car-id="{{ $quote->id }}">

                                                    <div class="imgCol">
                                                        <img src="{{ $quote->image }}" class="" alt="image" />
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
                                                                    <svg width="16" height="22"
                                                                        viewBox="0 0 16 22" fill="none"
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
                                                                    <svg width="16" height="22"
                                                                        viewBox="0 0 16 22" fill="none"
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
                                                <div class="contentBlockBtn">
                                                    <div class="leftList">
                                                        <ul class="col-6 px-0 car-row" data-car-id="{{ $quote->id }}">
                                                            <li>
                                                                <b>Expiry date:</b>
                                                                <span class="font-weight-light">
                                                                    {{ formatCustomDate($quote->created_at->addDays(10)) }}
                                                                </span>
                                                            </li>
                                                            <li class="colorDivBlue">
                                                                <b>Delivery date:</b>
                                                                @if ($quote->delivery_timeframe_from)
                                                                    <span
                                                                        class="sub_color">{{ formatCustomDate($quote->delivery_timeframe_from) }}</span>
                                                                @else
                                                                    <span
                                                                        class="sub_color">{{ $quote->delivery_timeframe }}</span>
                                                                @endif
                                                            </li>

                                                            <li class="colorDivBlue">
                                                                <b>Delivery type:</b>
                                                                <span class="sub_color"> {{ $quote->how_moved }}</span>
                                                            </li>
                                                            <li class="colorDivBlue">
                                                                <b>Journey miles:</b>
                                                                <span
                                                                    class="sub_color">{{ str_replace(' mi', '', $quote->distance) }}</span>
                                                                <span class="grey">({{ $quote->duration }})</span>
                                                            </li>

                                                        </ul>
                                                        <ul class="col-6 px-0">
                                                            @php
                                                                $lowestBid = $quote->lowest_bid ?? 0;
                                                                $transporterQuotesCount =
                                                                    $quote->transporter_quotes_count ?? 0;
                                                            @endphp
                                                            @if ($transporterQuotesCount > 0)
                                                                <li class="colorDivgreen car-row"
                                                                    data-car-id="{{ $quote->id }}">
                                                                    <span><b>Current lowest bid:</b></span>
                                                                    <span class="sub_color">£{{ $lowestBid }}</span>
                                                                </li>
                                                            @else
                                                                <li class="colorDivgreen car-row"
                                                                    data-car-id="{{ $quote->id }}">
                                                                    <span><b>Current lowest bid:</b></span>
                                                                    <span class="sub_color">£0</span>
                                                                </li>
                                                            @endif
                                                            <li class="colorDivBlue  mb-2 car-row"
                                                                data-car-id="{{ $quote->id }}">
                                                                <b>Transporters bidding: </b>
                                                                @if ($transporterQuotesCount > 0)
                                                                    <span
                                                                        class="sub_color">{{ $transporterQuotesCount }}</span>
                                                                @else
                                                                    <span class="sub_color">0</span>
                                                                @endif
                                                            </li>
                                                            <li class="row mx-0 w-100 align-items-end mb-0">
                                                                <div class="btnCol">
                                                                    @if ($quote->quoteByTransporter)
                                                                        <a href="javascript:;"
                                                                            onclick="share_edit_quote('{{ $quote->id }}');"
                                                                            class="w-100 mt-0 make_offer_btn checkStatus">Edit
                                                                            bid</a>
                                                                    @else
                                                                        <a href="javascript:;"
                                                                            onclick="share_give_quote('{{ $quote->id }}');"
                                                                            class="w-100 mt-0 make_offer_btn checkStatus">Place
                                                                            bid</a>
                                                                    @endif
                                                                </div>
                                                                <div class="iconDiv ml-4">
                                                                    @if ($quote->watchlist)
                                                                        <a href="javascript:;" style="margin-left: auto;"
                                                                            class=""
                                                                            onclick="removeToWatchlist('{{ $quote->id }}');">
                                                                           
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="16" height="16"
                                                                                fill="#9C9C9C" class="bi bi-eye-slash"
                                                                                viewBox="0 0 16 16">
                                                                                <path
                                                                                    d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z" />
                                                                                <path
                                                                                    d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829" />
                                                                                <path
                                                                                    d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z" />
                                                                            </svg>
                                                                        </a>
                                                                    @else
                                                                        <a href="javascript:;" style="margin-left: auto;"
                                                                            class=""
                                                                            onclick="addToWatchlist('{{ $quote->id }}');"
                                                                            style="margin-left: auto;">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="#9C9C9C" class="bi bi-eye" viewBox="0 0 16 16">
                                                                                <path d="M8 2.5C4.5 2.5 1.73 5.11.64 8c1.09 2.89 3.86 5.5 7.36 5.5s6.27-2.61 7.36-5.5C14.27 5.11 11.5 2.5 8 2.5z" />
                                                                                <circle cx="8" cy="8" r="3" />
                                                                            </svg>
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    @if ($quote->quoteByTransporter)
                                                        <div class="actionDiv">
                                                            <div class="rotated-banner">Bidding</div>
                                                            {{-- <svg width="52" height="43" viewBox="0 0 52 43"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0 2H19L49 27V43L24 22L0 2Z" fill="#ED1C24" />
                                                                <path
                                                                    d="M16.124 12.0284L16.7554 11.253L18.314 12.5222C18.588 12.7453 18.8694 12.8326 19.1583 12.7841C19.4471 12.7355 19.682 12.6001 19.863 12.3779C19.9851 12.2279 20.0652 12.061 20.1032 11.877C20.1412 11.6931 20.1272 11.5097 20.0611 11.3269C19.995 11.1441 19.8715 10.9791 19.6906 10.8317L18.132 9.56255L18.7634 8.78713L20.1902 9.94898C20.4228 10.1384 20.6574 10.2305 20.8937 10.2253C21.1301 10.22 21.3431 10.1011 21.5325 9.86848C21.7219 9.63585 21.7953 9.40326 21.7525 9.1707C21.7098 8.93814 21.5721 8.72715 21.3394 8.53771L19.9127 7.37586L20.5441 6.60044L21.9941 7.78124C22.3612 8.08012 22.6115 8.39569 22.745 8.72795C22.8785 9.06021 22.9184 9.38072 22.8647 9.68949C22.811 9.99826 22.6852 10.2741 22.4874 10.5171C22.2558 10.8014 21.9715 10.9869 21.6345 11.0735C21.3026 11.1643 20.9294 11.1528 20.515 11.0388L20.8121 10.8165C21.0396 11.2339 21.1459 11.6471 21.1309 12.0562C21.1159 12.4653 20.9695 12.8404 20.6916 13.1816C20.4643 13.4607 20.1861 13.6598 19.8571 13.7787C19.5333 13.9019 19.178 13.9264 18.7913 13.8523C18.414 13.7772 18.0315 13.5817 17.6438 13.266L16.124 12.0284ZM15.5114 11.5295L19.9315 6.1016L20.8233 6.82776L16.4032 12.2557L15.5114 11.5295ZM20.2265 15.3692L23.2575 11.6471L24.1104 12.3417L21.0795 16.0638L20.2265 15.3692ZM24.2396 11.3121C24.0949 11.1942 24.0134 11.0462 23.9951 10.868C23.9821 10.694 24.0345 10.5346 24.1523 10.3899C24.2702 10.2451 24.4157 10.1615 24.5887 10.1391C24.7669 10.1208 24.9284 10.1706 25.0731 10.2885C25.223 10.4106 25.3045 10.5586 25.3176 10.7326C25.3307 10.9066 25.2783 11.066 25.1604 11.2107C25.0425 11.3555 24.8971 11.4391 24.724 11.4615C24.551 11.484 24.3895 11.4341 24.2396 11.3121ZM23.5316 18.1895C23.1956 17.9159 22.9601 17.5823 22.825 17.1886C22.6951 16.7991 22.6679 16.3943 22.7434 15.9743C22.8282 15.5534 23.018 15.162 23.3127 14.8001C23.6116 14.4331 23.9564 14.168 24.3473 14.0048C24.7475 13.8406 25.1514 13.7827 25.5592 13.831C25.9763 13.8783 26.3528 14.0388 26.6888 14.3124C26.9732 14.544 27.1734 14.8102 27.2895 15.111C27.4149 15.411 27.456 15.7195 27.4126 16.0367C27.3693 16.3539 27.2381 16.6469 27.0192 16.9157L26.1478 17.9858C25.9289 18.2546 25.6686 18.4423 25.3667 18.5491C25.0701 18.66 24.7601 18.687 24.4368 18.63C24.1177 18.5679 23.8159 18.4211 23.5316 18.1895ZM24.3279 17.4968C24.5398 17.6694 24.7612 17.7723 24.9921 17.8055C25.2323 17.8378 25.4659 17.8044 25.6927 17.7054C25.9195 17.6064 26.1234 17.4457 26.3044 17.2234C26.4854 17.0011 26.6014 16.7689 26.6525 16.5267C26.7035 16.2846 26.6868 16.0517 26.6023 15.8282C26.5272 15.6037 26.3837 15.4051 26.1717 15.2325C25.9649 15.0642 25.7414 14.9638 25.5012 14.9315C25.2703 14.8983 25.0389 14.9291 24.807 15.0239C24.5802 15.1229 24.3762 15.2836 24.1952 15.5059C24.0142 15.7282 23.8982 15.9604 23.8472 16.2026C23.8013 16.4489 23.8159 16.6844 23.891 16.9089C23.9755 17.1324 24.1211 17.3284 24.3279 17.4968ZM25.5876 19.7348L24.7346 19.0402L25.5492 18.0399L26.4353 17.2527L27.0205 16.2332L29.281 13.4572L30.134 14.1518L25.5876 19.7348ZM28.0297 21.8524C27.6937 21.5788 27.4581 21.2451 27.323 20.8514C27.1932 20.4619 27.1659 20.0572 27.2414 19.6372C27.3263 19.2162 27.5161 18.8248 27.8107 18.463C28.1096 18.0959 28.4545 17.8308 28.8453 17.6676C29.2455 17.5035 29.6495 17.4455 30.0572 17.4938C30.4743 17.5412 30.8509 17.7017 31.1869 17.9753C31.4712 18.2068 31.6714 18.473 31.7875 18.7739C31.913 19.0738 31.954 19.3824 31.9107 19.6996C31.8673 20.0167 31.7362 20.3097 31.5173 20.5786L30.6459 21.6486C30.427 21.9175 30.1666 22.1052 29.8648 22.2119C29.5681 22.3228 29.2581 22.3498 28.9348 22.2929C28.6157 22.2308 28.314 22.0839 28.0297 21.8524ZM28.8259 21.1596C29.0379 21.3322 29.2593 21.4351 29.4902 21.4684C29.7304 21.5007 29.9639 21.4673 30.1907 21.3683C30.4175 21.2692 30.6214 21.1086 30.8024 20.8863C30.9834 20.664 31.0995 20.4318 31.1505 20.1896C31.2015 19.9475 31.1848 19.7146 31.1003 19.4911C31.0252 19.2665 30.8817 19.068 30.6698 18.8954C30.463 18.727 30.2395 18.6267 29.9992 18.5944C29.7684 18.5612 29.537 18.592 29.305 18.6868C29.0782 18.7858 28.8743 18.9465 28.6933 19.1688C28.5123 19.391 28.3962 19.6233 28.3452 19.8654C28.2993 20.1118 28.314 20.3472 28.3891 20.5717C28.4735 20.7953 28.6192 20.9912 28.8259 21.1596ZM30.0856 23.3977L29.2327 22.7031L30.0472 21.7028L30.9334 20.9155L31.5185 19.8961L33.7791 17.1201L34.632 17.8146L30.0856 23.3977ZM31.04 24.1749L34.071 20.4528L34.9239 21.1474L31.893 24.8694L31.04 24.1749ZM35.0531 20.1178C34.9084 19.9999 34.8269 19.8518 34.8086 19.6736C34.7956 19.4996 34.848 19.3403 34.9658 19.1955C35.0837 19.0508 35.2292 18.9672 35.4022 18.9447C35.5804 18.9265 35.7419 18.9763 35.8866 19.0942C36.0365 19.2163 36.118 19.3643 36.1311 19.5383C36.1442 19.7123 36.0918 19.8717 35.9739 20.0164C35.856 20.1612 35.7106 20.2448 35.5375 20.2672C35.3645 20.2896 35.203 20.2398 35.0531 20.1178ZM35.4008 27.7259L37.1499 25.578C37.352 25.3299 37.4381 25.0604 37.4084 24.7697C37.3838 24.4831 37.2474 24.2388 36.9993 24.0368C36.8339 23.9021 36.6571 23.8183 36.4689 23.7854C36.2807 23.7525 36.0978 23.7713 35.9202 23.8416C35.7426 23.9119 35.5864 24.0297 35.4517 24.1952L35.2698 23.7375C35.5014 23.4532 35.7676 23.253 36.0684 23.1369C36.3735 23.0157 36.6851 22.9814 37.0033 23.0341C37.3308 23.0859 37.6316 23.2234 37.9056 23.4465C38.1847 23.6738 38.3739 23.9482 38.4732 24.2698C38.5766 24.5862 38.5978 24.9086 38.5366 25.2371C38.4797 25.5604 38.3523 25.8435 38.1544 26.0865L36.2538 28.4205L35.4008 27.7259ZM32.8497 25.6485L35.8806 21.9265L36.7336 22.621L33.7026 26.3431L32.8497 25.6485ZM37.3454 32.0176C36.9525 31.6977 36.6676 31.3454 36.4908 30.9607C36.3098 30.5812 36.2341 30.1885 36.2637 29.7827L37.2766 29.679C37.275 29.9872 37.3319 30.2657 37.4474 30.5145C37.5629 30.7633 37.7551 30.9972 38.0239 31.2161C38.3599 31.4897 38.6977 31.6186 39.0373 31.6028C39.3726 31.5922 39.6624 31.437 39.9065 31.1371L40.6516 30.2221L41.4683 29.5202L41.9966 28.5705L42.8112 27.5702L43.6641 28.2648L40.7595 31.8317C40.469 32.1884 40.1337 32.4312 39.7536 32.5602C39.3693 32.6943 38.9688 32.7163 38.552 32.6263C38.1353 32.5362 37.7331 32.3334 37.3454 32.0176ZM38.6958 30.2801C38.3649 30.0107 38.1303 29.6864 37.992 29.3073C37.8631 28.9272 37.8368 28.5318 37.9133 28.1212C37.9949 27.7148 38.1788 27.3358 38.4651 26.9843C38.7513 26.6328 39.0831 26.3785 39.4603 26.2214C39.8427 26.0685 40.231 26.0193 40.6251 26.0738C41.0287 26.1272 41.3958 26.2887 41.7267 26.5581C42.0213 26.7981 42.2314 27.068 42.3569 27.3679C42.4823 27.6678 42.5208 27.9743 42.4723 28.2872C42.428 28.595 42.2921 28.8885 42.0648 29.1677L41.3197 30.0827C41.0966 30.3567 40.8341 30.547 40.5323 30.6537C40.2357 30.7646 39.9278 30.789 39.6087 30.7269C39.2895 30.6648 38.9852 30.5159 38.6958 30.2801ZM39.5231 29.6126C39.7298 29.781 39.9465 29.8844 40.1732 29.9228C40.3998 29.9612 40.6177 29.9365 40.8267 29.8488C41.045 29.7601 41.2405 29.6098 41.4131 29.3979C41.5857 29.1859 41.6912 28.9666 41.7296 28.74C41.7774 28.5124 41.7595 28.2915 41.676 28.0773C41.5925 27.8631 41.4474 27.6718 41.2406 27.5035C41.0338 27.3351 40.8145 27.2296 40.5827 27.187C40.356 27.1486 40.1335 27.1737 39.9151 27.2624C39.701 27.3459 39.5076 27.4936 39.335 27.7056C39.1666 27.9124 39.0611 28.1317 39.0185 28.3635C38.9759 28.5953 38.9963 28.8183 39.0798 29.0325C39.1685 29.2508 39.3163 29.4442 39.5231 29.6126Z"
                                                                    fill="#F3F8FF" />
                                                            </svg> --}}
                                                        </div>
                                                    @else
                                                        @if ($quote->created_at->timezone('Europe/London')->diffInHours(now('Europe/London')) < 1)
                                                            <div class="actionDiv">
                                                                <div class="rotated-banner green">New</div>
                                                                {{-- <svg width="49" height="41" viewBox="0 0 49 41"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M0 0H19L49 25V41L24 20L0 0Z" fill="#52D017" />
                                                                    <path
                                                                        d="M19.3422 12.9488L23.7623 7.52081L24.3826 8.02597L23.8205 9.27053L20.2339 13.6749L19.3422 12.9488ZM23.103 16.0113L23.308 9.12396L24.3826 8.02597L24.1776 14.9133L23.103 16.0113ZM23.103 16.0113L23.6083 14.8365L27.2517 10.3623L28.1434 11.0885L23.7233 16.5164L23.103 16.0113ZM26.4501 18.8659C26.0779 18.5628 25.8092 18.2065 25.6441 17.7969C25.4884 17.3863 25.4426 16.9622 25.5068 16.5244C25.5761 16.0908 25.7603 15.6905 26.0592 15.3235C26.358 14.9564 26.7106 14.6976 27.117 14.5471C27.5275 14.3913 27.947 14.346 28.3754 14.4112C28.809 14.4805 29.2041 14.6604 29.5608 14.9509C29.9072 15.2329 30.1469 15.5614 30.2801 15.9364C30.4184 16.3155 30.4488 16.7057 30.3714 17.1069C30.2992 17.5124 30.1178 17.8935 29.8274 18.2501C29.7769 18.3122 29.7191 18.3726 29.654 18.4314C29.5983 18.4892 29.5311 18.5506 29.4525 18.6155L26.3973 16.1276L26.9656 15.4297L29.5788 17.5577L29.0336 17.5779C29.2084 17.3421 29.3203 17.115 29.369 16.8968C29.4178 16.6786 29.4034 16.4691 29.326 16.2686C29.2538 16.0722 29.1143 15.8898 28.9075 15.7214C28.6904 15.5446 28.4638 15.4375 28.2278 15.4001C27.9918 15.3626 27.7604 15.3934 27.5336 15.4924C27.311 15.5863 27.105 15.7495 26.9156 15.9822C26.7261 16.2148 26.6064 16.4569 26.5563 16.7084C26.5062 16.9599 26.5265 17.2043 26.6171 17.4414C26.7119 17.6734 26.8705 17.8799 27.0927 18.0609C27.284 18.2166 27.4871 18.3262 27.7021 18.3895C27.9223 18.457 28.1418 18.4724 28.3608 18.4358L28.4553 19.4283C28.1017 19.4929 27.7515 19.4743 27.4047 19.3724C27.0578 19.2705 26.7396 19.1016 26.4501 18.8659ZM29.9664 21.6003L31.5007 16.6596L32.3847 17.3794L31.189 20.9065L30.9191 20.6996L34.1139 18.7875L34.6102 19.1917L33.3849 22.7076L33.1276 22.4851L36.3394 20.5998L37.2233 21.3196L32.6959 23.823L32.1996 23.4188L33.2879 20.0236L33.5671 20.2509L30.4626 22.0044L29.9664 21.6003Z"
                                                                        fill="#F3F8FF" />
                                                                </svg> --}}
                                                            </div>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="idLoadData">
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pagination before_search">
        {{ $quotes->links() }}
    </div>
    

    <div class="modal get_quote fade" id="quote" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"> Place your bid</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.6584 0.166626L6.00008 4.82496L1.34175 0.166626L0.166748 1.34163L4.82508 5.99996L0.166748 10.6583L1.34175 11.8333L6.00008 7.17496L10.6584 11.8333L11.8334 10.6583L7.17508 5.99996L11.8334 1.34163L10.6584 0.166626Z"
                                    fill="#000" />
                            </svg>
                        </span>
                    </button>
                </div>
                <form id="main_form" method="post" action="{{ route('transporter.submit_offer') }}" class="bid_form">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <span class="icon_includes">£</span>
                            <input type="number" class="form-control" aria-describedby="emailHelp"
                                placeholder="Enter your bid" id="amount" name="amount">
                            <!-- <p style="font-size:12px; margin-top: 10px;"><b> Note:</b> The amount you bid will be the total amount you get paid directly by the customer.</p> -->
                            <div class="modal_current">
                                <p>Current lowest bid: <span class="lowAmount">£0</span></p>
                                <p>Transporters bidding: <span class="red bidCount">0</span></p>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <textarea placeholder="Send a professional message for a better chance of winning the job..."
                                class="form-control textarea" id="message" name="message"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer" style="margin-top: 10px;">
                        <input type="hidden" name="quote_id" id="quote_id" value="">
                        <p><b> Note:</b> Do not share any contact information or company names, we will provide you with the
                            customers details after they have accepted your quote.</p>
                        <button type="submit" class="submit_btn">Place bid</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- EDIT  --}}
    <div class="modal get_quote fade" id="quoteEdit" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"> Edit bid</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onClick="adjustbackdrop()">
                        <span aria-hidden="true">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.6584 0.166626L6.00008 4.82496L1.34175 0.166626L0.166748 1.34163L4.82508 5.99996L0.166748 10.6583L1.34175 11.8333L6.00008 7.17496L10.6584 11.8333L11.8334 10.6583L7.17508 5.99996L11.8334 1.34163L10.6584 0.166626Z"
                                    fill="#000" />
                            </svg>
                        </span>
                    </button>
                </div>
                <form id="editQuoteForm" action="{{ route('transporter.submit_offer') }}" method="POST"
                    class="bid_form">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <span class="icon_includes">£</span>
                            <input type="number" class="form-control" aria-describedby="emailHelp"
                                placeholder="Enter your bid" id="editamount" name="amount">
                            <!-- <p style="font-size:12px; margin-top: 10px;"><b> Note:</b> The amount you bid will be the total amount you get paid directly by the customer.</p> -->
                            <div class="modal_current">
                                <p>Current lowest bid: <span class="lowAmount">£0</span></p>
                                <p>Transporters bidding: <span class="red bidCount">0</span></p>
                            </div>
                        </div>
                        {{-- <div class="form-group" style="margin-bottom:0px">
                            <textarea placeholder="Send a professional message for a better chance of winning the job..."
                                class="form-control textarea" id="editmessage" name="message"></textarea>
                        </div> --}}
                    </div>
                    <div class="modal-footer" style="margin-top: 10px;">
                        <input type="hidden" name="quote_id" id="quote_edit_id" value="">
                        {{-- <p><b> Note:</b> Do not share any contact information or company names, we will provide you with the
                            customers details after they have accepted your quote.</p> --}}
                        <button type="submit" class="submit_btn">Submit bid</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- The Modal -->
    <div class="modal fade" id="carDetailsModal" tabindex="-1" aria-labelledby="carDetailsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <div>
                        <span id="backButton">
                            <svg width="7" height="13" viewBox="0 0 7 13" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.5">
                                    <path d="M6 11.5L1 6.5L6 1.5" stroke="black" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </g>
                            </svg>
                            Back
                        </span>
                    </div>
                    <div class="expiryDiv" id="expiry_date">

                    </div>
                    <div>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.292893 15.2929C-0.0976311 15.6834 -0.0976311 16.3166 0.292893 16.7071C0.683417 17.0976 1.31658 17.0976 1.70711 16.7071L0.292893 15.2929ZM9.20711 9.20711C9.59763 8.81658 9.59763 8.18342 9.20711 7.79289C8.81658 7.40237 8.18342 7.40237 7.79289 7.79289L9.20711 9.20711ZM7.79289 7.79289C7.40237 8.18342 7.40237 8.81658 7.79289 9.20711C8.18342 9.59763 8.81658 9.59763 9.20711 9.20711L7.79289 7.79289ZM16.7071 1.70711C17.0976 1.31658 17.0976 0.683417 16.7071 0.292893C16.3166 -0.0976311 15.6834 -0.0976311 15.2929 0.292893L16.7071 1.70711ZM9.20711 7.79289C8.81658 7.40237 8.18342 7.40237 7.79289 7.79289C7.40237 8.18342 7.40237 8.81658 7.79289 9.20711L9.20711 7.79289ZM15.2929 16.7071C15.6834 17.0976 16.3166 17.0976 16.7071 16.7071C17.0976 16.3166 17.0976 15.6834 16.7071 15.2929L15.2929 16.7071ZM7.79289 9.20711C8.18342 9.59763 8.81658 9.59763 9.20711 9.20711C9.59763 8.81658 9.59763 8.18342 9.20711 7.79289L7.79289 9.20711ZM1.70711 0.292893C1.31658 -0.0976311 0.683417 -0.0976311 0.292893 0.292893C-0.0976311 0.683417 -0.0976311 1.31658 0.292893 1.70711L1.70711 0.292893ZM1.70711 16.7071L9.20711 9.20711L7.79289 7.79289L0.292893 15.2929L1.70711 16.7071ZM9.20711 9.20711L16.7071 1.70711L15.2929 0.292893L7.79289 7.79289L9.20711 9.20711ZM7.79289 9.20711L15.2929 16.7071L16.7071 15.2929L9.20711 7.79289L7.79289 9.20711ZM9.20711 7.79289L1.70711 0.292893L0.292893 1.70711L7.79289 9.20711L9.20711 7.79289Z"
                                    fill="#9C9C9C" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- Modal Body -->
                <div class="modal-body modalMainBody" id="carDetailsModalBody">
                    <!-- Modal content will be dynamically updated here -->
                </div>
            </div>
        </div>
    </div>

    {{-- d4dDeveloper-r  start --}}
    @include('transporter.Modal.saveSearch')
    {{-- End --}}

@endsection

@section('script')
    <script src="{{ asset('assets/web/js/admin.js') }}"></script>
    <script src="{{ asset('assets/web/js/main.js') }}"></script>
    <script src="{{ asset('assets/web/js/rangeslider.js') }}"></script>
    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key={{ config('constants.google_map_key') }}&libraries=places"></script>
    {{--    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('constants.google_map_key') }}&loading=async&libraries=places&callback=initMap" async defer></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        var globalSiteUrl = '<?php echo $path = url('/'); ?>'
        var carDetails = @json($quotes);
        var isMobile = '{{ isMobile() }}';
        $.validator.addMethod("noPhoneOrEmail", function(value, element) {
            var contains_email = /\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b/i.test(value);
            var contains_six_or_more_digits = value.replace(/\s+/g, '').match(/\d{7,}/);
            return !(contains_email || contains_six_or_more_digits);
        });
        $.validator.addMethod("greaterThanZero", function(value, element) {
            return this.optional(element) || parseFloat(value) > 0;
        }, "You must enter an amount greater than zero");
        $("#main_form").validate({
            rules: {
                amount: {
                    required: true,
                    noPhoneOrEmail: true,
                    greaterThanZero: true
                },
                message: {
                    required: true,
                    noPhoneOrEmail: true,
                },
            },
            messages: {
                amount: {
                    required: 'Please enter amount',
                    noPhoneOrEmail: `Do not share contact information or you will be banned.`,
                    greaterThanZero: 'You must enter an amount greater than zero'
                },
                message: {
                    required: 'Please enter message',
                    noPhoneOrEmail: `Do not share contact information or you will be banned.`
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.insertAfter($(element));
            },
            submitHandler: function(form) {
                var submitButton = $(form).find('button[type="submit"]');
                submitButton.prop('disabled', true).text('Submitting...');
                $.ajax({
                    url: $(form).attr('action'),
                    type: 'POST',
                    data: $(form).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: '<span class="swal-title">Bid placed</span>',
                                html: '<span class="swal-text">Your bid has been placed successfully.</span>',
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
                            submitButton.prop('disabled', false).text('Submit');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        if (jqXHR.responseJSON && jqXHR.responseJSON.errors) {
                            var errors = jqXHR.responseJSON.errors;
                            $('#main_form').find('span.error').remove();
                            $.each(errors, function(key, errorMessages) {
                                alert(key)
                                var element = $('#' + key);
                                if (element.length > 0) {
                                    var errorElement = element.next('span.error');
                                    if (errorElement.length === 0) {
                                        errorElement = $('<span id=' + key +
                                            '-error class="error"></span>');
                                        element.after(errorElement);
                                    }

                                    errorElement.text(errorMessages[0]);
                                }
                            });
                        } else {
                            console.error('Unexpected error:', textStatus, errorThrown);
                        }
                        submitButton.prop('disabled', false).text('Submit');
                    }
                });
            }
        });
        // D4dDeveloper-R 04-10-2024
        $(document).on('click','#saveSrch',function() {
            // alert("clicked");
            $("#srchName").val('');
            $('#emailNtf').prop('checked', false);
            $("#saveSrchModal").modal('show');
        });
        $("#saveSrchForm").submit(function(e) {
            e.preventDefault();
            var pick_area = $("#search_pick_up_area").val();
            var drop_area = $("#search_drop_off_area").val();
            var search_name = $("#srchName").val();
            var isChecked = $('#save-search').prop('checked');
            $("#srchName").next("span.error").remove();
            if (srchName === "") {
                $("#srchName").after('<span class="error" style="color:red;">This field is required</span>');
            }
            $.ajax({
                url: "{{ route('transporter.save.search') }}",
                type: "POST",
                data: {
                    pick_area: pick_area,
                    drop_area: drop_area,
                    search_name: search_name,
                    emailNtf: isChecked,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log('Success:', response);
                    $("#srchName").val('');
                    $('#emailNtf').prop('checked', false);
                    if (response.success) {
                        $("#srchName").val('');
                        $('#emailNtf').prop('checked', false);
                        $("#saveSrchModal").modal('hide');
                        toastr.success(response.message);
                        $(".search_resu_sec").addClass('adjust-space-without-btn');
                        $(".search_resu_sec").siblings('.savebtnS').addClass('d-none');
                    } else {
                        $("#srchName").val('');
                        $('#emailNtf').prop('checked', false);
                        $("#saveSrchModal").modal('hide');
                        toastr.error(response.message);
                    }


                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Error:', jqXHR.responseText || errorThrown);
                    $("#srchName").val('');
                    $('#emailNtf').prop('checked', false);
                }
            });
        });
        // end
        $("#editQuoteForm").validate({
            rules: {
                amount: {
                    required: true,
                    noPhoneOrEmail: true,
                    greaterThanZero: true
                },
                message: {
                    required: true,
                    noPhoneOrEmail: true,
                },
            },
            messages: {
                amount: {
                    required: 'Please enter amount',
                    noPhoneOrEmail: `Do not share contact information or you will be banned.`,
                    greaterThanZero: 'You must enter an amount greater than zero'
                },
                message: {
                    required: 'Please enter message',
                    noPhoneOrEmail: `Do not share contact information or you will be banned.`
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.insertAfter($(element));
            },
            submitHandler: function(form) {
                var submitButton = $(form).find('button[type="submit"]');
                submitButton.prop('disabled', true).text('Submitting...');
                $.ajax({
                    url: $(form).attr('action'),
                    type: 'POST',
                    data: $(form).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: '<span class="swal-title">Bid placed</span>',
                                html: '<span class="swal-text">Your bid has been placed successfully.</span>',
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
                            submitButton.prop('disabled', false).text('Submit');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        if (jqXHR.responseJSON && jqXHR.responseJSON.errors) {
                            var errors = jqXHR.responseJSON.errors;
                            $('#main_form').find('span.error').remove();
                            $.each(errors, function(key, errorMessages) {
                                alert(key)
                                var element = $('#' + key);
                                if (element.length > 0) {
                                    var errorElement = element.next('span.error');
                                    if (errorElement.length === 0) {
                                        errorElement = $('<span id=' + key +
                                            '-error class="error"></span>');
                                        element.after(errorElement);
                                    }

                                    errorElement.text(errorMessages[0]);
                                }
                            });
                        } else {
                            console.error('Unexpected error:', textStatus, errorThrown);
                        }
                        submitButton.prop('disabled', false).text('Submit');
                    }
                });
            }
        });
        function share_give_quote(id) {
            $('#quote_id').val(id);
            var quotes = @json($quotes);
            var selectedQuote = quotes.data.find(quote => quote.id == id);
            if (selectedQuote) {
                var lowestBid = selectedQuote.lowest_bid ? selectedQuote.lowest_bid : 0;
                var bidCount = selectedQuote.transporter_quotes_count ? selectedQuote.transporter_quotes_count : 0;

                $('.lowAmount').text('£' + lowestBid);
                $('.bidCount').text(bidCount);
                // Prevent closing quote modal when clicking outside
                $('#quote').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                // if(isMobile) {
                $('#quote').css('z-index', parseInt($('#carDetailsModal').css('z-index')) + 10);
                $('.modal-backdrop').css('z-index', parseInt($('#carDetailsModal').css('z-index')) + 5);
                // }
                $('#quote').modal('show');
            }
        }

        function adjustbackdrop() {
            $('.modal-backdrop').css('z-index', '1040');
        }

        function share_edit_quote(id) {
            // console.log('aaaaaaaaaaaaaaa');
            $('#quote_edit_id').val(id);
            var quotes = @json($quotes);
            var selectedQuote = quotes.data.find(quote => quote.id == id);
            if (selectedQuote) {
                var lowestBid = selectedQuote.lowest_bid ? selectedQuote.lowest_bid : 0;
                var bidCount = selectedQuote.transporter_quotes_count ? selectedQuote.transporter_quotes_count : 0;
                // $('#editamount').val(selectedQuote.quote_by_transporter.price);
                $('#editmessage').val(selectedQuote.quote_by_transporter.message);
                $('.lowAmount').text('£' + lowestBid);
                $('.bidCount').text(bidCount);
                // Prevent closing quote modal when clicking outside
                $('#quoteEdit').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                // if(isMobile) {
                $('#quoteEdit').css('z-index', parseInt($('#carDetailsModal').css('z-index')) + 10);
                $('.modal-backdrop').css('z-index', parseInt($('#carDetailsModal').css('z-index')) + 5);
                // }
                $('#quoteEdit').modal('show');
            }
        }

        function myFunction(x) {
            if (x.matches) { // If media query matches
                $(document).ready(function() {
                    $('.where_custom').click(function() {
                        $('.where_box').slideToggle("slow");
                        $('#pickupLabel').hide();
                        $('#search_pick_up_area').attr('placeholder', 'Where from ?');
                    });
                    $('.drop_off_box').click(function() {
                        $('.to_box').slideToggle("slow");
                        $('#dropoffLabel').hide();
                        $('#search_drop_off_area').attr('placeholder', 'Where to ?');
                    });
                });
            } else {
                $(document).ready(function() {
                    $('.where_custom').click(function() {
                        $('.where_box').hide();
                    });
                });

                $(document).ready(function() {
                    $('.drop_off_box').click(function() {
                        $('.to_box').hide();
                    });
                });
            }
        }

        function addToWatchlist(quoteId) {
            console.log('Adding quote to watchlist with ID:', quoteId); // Log for debugging

            // Send the AJAX request
            $.ajax({
                url: "{{ route('transporter.watchlist.store') }}", // Replace with your route for adding to the watchlist
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token for security
                    quote_id: quoteId // Quote ID to be sent
                },
                success: function(response) {
                    if (response.success) {
                        // Show a success message or update the UI accordingly
                        toastr.success('Job added to watchlist!');
                        setTimeout(function() {
                            location.reload(); // Reload the page
                        }, 2000);
                    } else {
                        // Handle the case where the operation wasn't successful
                        toastr.error(response.message); // Display the specific message returned from the server
                    }
                },
                error: function(xhr, status, error) {
                    // General error handling for unexpected issues
                    console.error('An error occurred:', error);
                    toastr.error('An error occurred while adding to the watchlist.');
                }
            });
        }


        // Listen for the quote modal to be hidden
        $('#quote').on('hidden.bs.modal', function(e) {
            // Clear the z-index
            $('#quote').css('z-index', '');
            $('.modal-backdrop').remove(); // Ensure the backdrop is removed

            // Remove the modal-open class and re-enable scrolling
            $('body').removeClass('modal-open');
            $('body').css('overflow', 'auto'); // Re-enable scrolling if it was disabled
        });
        // Create a MediaQueryList object
        var x = window.matchMedia("(max-width: 767px)")

        // Call listener function at run time
        myFunction(x);

        // Attach listener function on state changes
        x.addEventListener("change", function() {
            myFunction(x);
        });


        $(document).ready(function() {
            $("#jobsrch_form_blog").validate({
                rules: {
                    search_pick_up_area: {
                        required: true
                    },
                    search_drop_off_area: {
                        required: false
                    }
                },
                messages: {
                    search_pick_up_area: {
                        required: "Please enter collection area"
                    },
                    search_drop_off_area: {
                        required: "Please enter delivery area"
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('error-message'); // Add custom class for styling
                    error.insertAfter(element);
                    element.closest('.form-group').addClass('error-margin');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('error-margin');
                }
            });
            $(document).on('click', '.car-row', function() {
                var carId = $(this).data('car-id');
                var carData = carDetails.data.find(function(car) {
                    return car.id == carId;
                });
                if (carData) {
                    let makeAndModel = `${carData.vehicle_make} ${carData.vehicle_model}`;
                    if (carData.vehicle_make_1 && carData.vehicle_model_1) {
                        makeAndModel += ` / ${carData.vehicle_make_1} ${carData.vehicle_model_1}`;
                    }
                    let startsDrives = carData.starts_drives == 0 ? 'No' : 'Yes';
                    if (carData.starts_drives_1 !== null) {
                        startsDrives += ` / ${carData.starts_drives_1 == 0 ? 'No' : 'Yes'}`;
                    }
                    var createdAt = new Date(carData.created_at);

                    // Add 10 days to the created_at date
                    createdAt.setDate(createdAt.getDate() + 10);

                    // Extract the day, month, and last two digits of the year
                    var dd = String(createdAt.getDate()).padStart(2, '0'); // Day with leading zero
                    var mm = String(createdAt.getMonth() + 1).padStart(2, '0'); // Month with leading zero
                    var yy = String(createdAt.getFullYear()).slice(-2); // Last two digits of the year

                    // Format the date as dd//mm/yy
                    var formattedDate = `${dd}//${mm}//${yy}`;

                    var switch_custom = '';
                    if (carData?.quote_by_transporter) {
                        // switch_custom =
                        switch_custom = `<a href="javascript:;"
                                            onclick="share_edit_quote('${carData.id}');"
                                            class="make_offer_btn checkStatus">Edit bid</a>`
                    } else {
                        switch_custom = ` <a href="javascript:;"
                                            onclick="share_give_quote(${carData.id});"
                                            class="make_offer_btn checkStatus">Place bid</a>`
                    }

                    // Dynamically update modal body content
                    var modalBodyContent = `
                    <div class="jobsrch_box">
                        <div class="row">                           
                            <div class="col-lg-6">
                                <div class="jobsrch_top_box position-relative">
                                    ${carData.vehicle_make_1 == null && carData.vehicle_model_1 == null ? `
                                                        <div>
                                                            <img src="${carData.image}" class="vehicle_image" alt="Vehicle Image" />
                                                        </div>
                                                        ` : `
                                                        <div class="job_se_sec slider">
                                                            <div>
                                                                <img src="${carData.image}" class="vehicle_image" alt="Vehicle Image" />
                                                            </div>
                                                            ${carData.image_1 ? `
                                                <div>
                                                    <img src="/${carData.image_1}" class="vehicle_image" alt="Vehicle Image" />
                                                </div>
                                            ` : `
                                                <div>
                                                    <img src="/uploads/no_car_image.png" class="vehicle_image" alt="No Image Available" />
                                                </div>
                                            `}
                                                        </div>
                                                        <div class="custom-navigation">
                                                            <span class="current-slide">1</span> of <span class="total-slides">2</span>
                                                        </div>
                                                    `}                                   
                                </div>
                                
                                <div class="btnCustom">${switch_custom}</div>
                                <div class="wishList-bidInfo">
                                    <div class="wishListBtn">
                                         <a href="javascript:;" class="btn"
                                            onclick="addToWatchlist('${carData.id}');"
                                            style="margin-left: auto;">
                                                Add to watchlist
                                        </a>
                                    </div>
                                    <div class="bidTnfo">
                                        <p class="info">Current lowest bid: <span class="green">£${carData.lowest_bid  ?? 0}</span></p>
                                        <p class="info">Transporters bidding: <span class="blue">${carData.transporter_quotes_count}</span></p>
                                    </div>
                                </div>
                           
                                <ul class="jobsrch_info_list">
                                    <li>
                                        <div class="jpbsrch_inner">
                                            <small>Make & model:</small>
                                        </div>
                                        <span>${makeAndModel}</span>
                                    </li>
                                    <li>
                                        <div class="jpbsrch_inner">                                           
                                            <small>Pick-up area:</small>
                                        </div>
                                        <span>${carData.pickup_postcode ? formatAddress(carData.pickup_postcode) : '-'}</span>
                                    </li>
                                    <li>
                                        <div class="jpbsrch_inner">                                            
                                            <small>Drop-off area:</small>
                                        </div>
                                        <span>${carData.drop_postcode ? formatAddress(carData.drop_postcode) : '-'}</span>
                                    </li>
                                    <li>
                                        <div class="jpbsrch_inner">                                           
                                            <small>Delivery date:</small>
                                        </div>
                                        <span>${carData.delivery_timeframe_from ? formatCustomDate(carData.delivery_timeframe_from) : carData.delivery_timeframe}</span>
                                    </li>
                                    <li>
                                        <div class="jpbsrch_inner">                                            
                                            <small>Starts & drives:</small>
                                        </div>
                                        <span>${startsDrives}</span>
                                    </li>
                                    <li>
                                        <div class="jpbsrch_inner">                                            
                                            <small>Delivery type:</small>
                                        </div>
                                        <span>${carData.how_moved}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <div class="jobsrch_right_box">
                                    <h4 class="distance_text">Journey Distance: <b>${carData.distance} miles</b> <strong>(${carData.duration})</strong></h4> 
                                </div>
                            </div>
                        </div>
                    </div>`;
                    $('#carDetailsModalBody').html(modalBodyContent);
                }
                $('#expiry_date').html(`<p>Expiry date: ${formattedDate}</p>`);
                $('#carDetailsModal').modal('show');
                var $slider = $('.slider');
                $slider.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide) {
                    var i = (currentSlide ? currentSlide : 0) + 1;
                    $('.current-slide').text(i);
                    $('.total-slides').text(slick.slideCount);
                });

                $slider.slick({
                    infinite: false,
                    speed: 300,
                    slidesToShow: 1,
                    adaptiveHeight: true,
                    prevArrow: '<div class="slick-prev"><svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.0756 16.5115L1.85822 10.7965C1.31976 10.4441 1 9.87387 1 9.26607C1 8.65827 1.31976 8.08803 1.85822 7.73561L10.0756 1.48823C10.7708 0.976677 11.7151 0.857068 12.5347 1.17696C13.3543 1.49685 13.917 2.20438 14 3.01972V14.984L14 14.984C13.9156 15.7986 13.3523 16.5049 12.533 16.8238C11.7136 17.1427 10.7702 17.0228 10.0756 16.5115Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>',
                    nextArrow: '<div class="slick-next"><svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M4.9244 1.48852L13.1418 7.20349C13.6802 7.5559 14 8.12613 14 8.73393C14 9.34173 13.6802 9.91197 13.1418 10.2644L4.9244 16.5118C4.22923 17.0233 3.28491 17.1429 2.46532 16.823C1.64573 16.5032 1.08303 15.7956 1 14.9803L1 3.01597C1.08445 2.20143 1.6477 1.49505 2.46703 1.17615C3.28636 0.857255 4.22984 0.977185 4.9244 1.48852Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>'
                });
            });
            $('#backButton').on('click', function() {
                $('#carDetailsModal').modal('hide');
            });

            $('.local_srch_box').click(function() {
                $('.local_srch_fillterbx').slideToggle("slow");
            });
            $('.where_box label').click(function() {
                var location = $(this).text();
                $('#search_pick_up_area').val(location);
                $('.where_box').hide();
                var errorElement = $('#search_pick_up_area-error');
                if (errorElement.length) {
                    $('#search_pick_up_area').closest('.form-group').removeClass('error-margin');
                    errorElement.remove();
                }
            });

            // Click event for drop off area suggestions
            $('.to_box label').click(function() {
                var location = $(this).text();
                $('#search_drop_off_area').val(location);
                $('.to_box').hide();
                var errorElement = $('#search_drop_off_area-error');
                if (errorElement.length) {
                    $('#search_drop_off_area').closest('.form-group').removeClass('error-margin');
                    errorElement.remove();
                }
            });

            // Hide label on keyup in input field
            $('#search_pick_up_area').on('keyup', function() {
                if ($(this).val().length > 0) {
                    $('.where_box').hide();
                } else {
                    if (isMobile)
                        $('.where_box').show();
                }
            });

            $('#search_drop_off_area').on('keyup', function() {
                if ($(this).val().length > 0) {
                    $('.to_box').hide();
                } else {
                    if (isMobile)
                        $('.to_box').show();
                }
            })

            // Check for the 'open_modal' parameter in the URL
            const urlParams = new URLSearchParams(window.location.search);
            const openModalId = urlParams.get('share_quotation');
            if (openModalId) {
                // Trigger a click event for the check document status
                // if(isMobile) {
                const carRowDiv = $(`ul.car-row[data-car-id="${openModalId}"]`);
                if (carRowDiv.length) {
                    simulateClick(carRowDiv);
                    // setTimeout(function() {
                    //     share_give_quote(openModalId);
                    // }, 500); // Adjust the timeout duration as needed
                }
                // } else {
                //share_give_quote(openModalId);
                //$(".checkStatus").click();
                // }
                //Remove the share_quotation parameter from the URL
                if (history.pushState) {
                    const cleanUrl = window.location.protocol + "//" + window.location.host + window.location
                        .pathname;
                    window.history.pushState({
                        path: cleanUrl
                    }, '', cleanUrl);
                }
            }

            function simulateClick(element) {
                element.trigger('click');
            }

            var $slider = $('.slider');
            $slider.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide) {
                var i = (currentSlide ? currentSlide : 0) + 1;
                $('.current-slide').text(i);
                $('.total-slides').text(slick.slideCount);
            });

            $slider.slick({
                infinite: false,
                speed: 300,
                slidesToShow: 1,
                adaptiveHeight: true,
                prevArrow: '<div class="slick-prev"><svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.0756 16.5115L1.85822 10.7965C1.31976 10.4441 1 9.87387 1 9.26607C1 8.65827 1.31976 8.08803 1.85822 7.73561L10.0756 1.48823C10.7708 0.976677 11.7151 0.857068 12.5347 1.17696C13.3543 1.49685 13.917 2.20438 14 3.01972V14.984L14 14.984C13.9156 15.7986 13.3523 16.5049 12.533 16.8238C11.7136 17.1427 10.7702 17.0228 10.0756 16.5115Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>',
                nextArrow: '<div class="slick-next"><svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M4.9244 1.48852L13.1418 7.20349C13.6802 7.5559 14 8.12613 14 8.73393C14 9.34173 13.6802 9.91197 13.1418 10.2644L4.9244 16.5118C4.22923 17.0233 3.28491 17.1429 2.46532 16.823C1.64573 16.5032 1.08303 15.7956 1 14.9803L1 3.01597C1.08445 2.20143 1.6477 1.49505 2.46703 1.17615C3.28636 0.857255 4.22984 0.977185 4.9244 1.48852Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>'
            });


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

        function formatAddress(address) {
            var addressParts = address.split(',');
            var firstPart = addressParts[0].trim();
            var lastTwoParts = addressParts.slice(-2);
            var limitedAddress = lastTwoParts.join(',');
            return limitedAddress;
        }

        function formatCustomDate(date) {
            var d = new Date(date);
            var day = String(d.getDate()).padStart(2, '0');
            var month = String(d.getMonth() + 1).padStart(2, '0'); // getMonth() returns month from 0-11
            var year = String(d.getFullYear()).slice(-2); // Get last two digits of the year

            return `${day}/${month}/${year}`;
        }

        const setActive = (el, active) => {
            const formField = el.parentNode
            if (active) {
                formField.classList.add('field_active')
            } else {
                //formField.classList.remove('field_active')
                el.value === '' ?
                    formField.classList.remove('field_filled') :
                    formField.classList.add('field_filled')
            }
        }

        // Select all form-control elements
        const formControls = document.querySelectorAll('.form-control');

        // Add event listeners for focus and blur to form-control elements
        formControls.forEach(el => {
            el.onblur = () => {
                setActive(el, false);
            };
            el.onfocus = () => {
                setActive(el, true);
            };
        });

        // Select all form-group divs
        const formGroups = document.querySelectorAll('.form-group');

        // Add event listeners for click to form-group divs
        formGroups.forEach(group => {
            group.onclick = (e) => {
                // Find the input element within the div
                const input = group.querySelector('.form-control');
                if (input && e.target !== input) {
                    input.focus();
                }
            };
        });

        // reset field
        function resetcode() {
            var element = document.getElementByClass("resetdata");
            element.reset();
        }

        function fetch_data(page, str = '') {
           
            if (str == '') {
                $('#popup').addClass('show'); // Show the popup
            }
            var search_pick_up_area = $('#search_pick_up_area').val();
            var search_drop_off_area = $('#search_drop_off_area').val();
            $.ajax({
                url: globalSiteUrl + "/transporter/find_job?page=" + page,
                data: {
                    
                    search_pick_up_area: search_pick_up_area,
                    search_drop_off_area: search_drop_off_area,
                },
                type: "GET",
                success: function(res) {
                    // console.log(res);
                    // return;
                    if (res.success == true) {
                        $('#popup').removeClass('show');
                        $('.jobsrch_blogs, .mainContentDiv').addClass('d-none');
                        $('#idLoadData').html(res.data);
                        $('.jobsrch_form_blog').addClass('d-none');
                        $('.admin_job_top h3').text('Your results');
                        $('.pera_srch').text('Here are some jobs we’ve found that match your search.');
                        $('html, body').scrollTop(0);

                        checkAndHideSections();
                    } else {
                        $('#popup').removeClass('show');
                        toastr.error(res.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Response:', xhr.responseText); // Full
                }
            });
        }
        $('#search_job').on('click', function() {
            var form = $('#jobsrch_form_blog');
            // Trigger form validation
            if (form.valid()) {
                fetch_data(1);
            }
        });

        $(document).on('click', '.after_search a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            $('#page').val(page);
            fetch_data(page, 'pagination');
        });

        $(document).on('click', '.before_search a', function(event) {
            event.preventDefault();
            var baseUrl = window.location.origin; // e.g., http://127.0.0.1:8000
            var path = '/transporter/new-jobs-new';
            var page = $(this).attr('href').split('page=')[1];
            var newUrl = baseUrl + path + '?page=' + page;
            window.location.href = newUrl;
        });

        function checkAndHideSections() {
            if ($('#idLoadData').children().length > 0) {
                $('.pagination.before_search').hide();
                $('.job-data').hide();

            } else {
                $('.pagination.before_search').show();
                $('.job-data').show();
            }
        }

        function removeToWatchlist(quoteId) {
            $.ajax({
                url: "{{ route('transporter.watchlist.remove') }}", // Replace with your route for adding to the watchlist
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token for security
                    quote_id: quoteId // Quote ID to be sent
                },
                success: function(response) {
                    if (response.success) {
                        // Show a success message or update the UI accordingly
                        toastr.success('Job removed from watchlist!');
                        setTimeout(function() {
                            location.reload(); // Reload the page
                        }, 2000);
                    } else {
                        // Handle the case where the operation wasn't successful
                        toastr.error(response.message); // Display the specific message returned from the server
                    }
                },
                error: function(xhr, status, error) {
                    // General error handling for unexpected issues
                    console.error('An error occurred:', error);
                    toastr.error('An error occurred while adding to the watchlist.');
                }
            });
        }
    </script>
@endsection
