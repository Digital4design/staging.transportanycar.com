@extends('layouts.transporter.dashboard.app')

@section('head_css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/vendors/owl.carousel/css/owl.carousel.min.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

<?php
use Illuminate\Support\Str;
$auth_user = Auth::user();
?>
@section('content')
    <div id="wrapper">
        <!-- SIDEBAR -->
        @include('layouts.transporter.dashboard.sidebar')
        <div id="page-content-wrapper">
        @include('layouts.transporter.dashboard.top_head')
        <!-- content part -->
            <div class="content_container p-0">
                <div class="message_container">
                    <!-- chat -->
                    <div class="chat_title_bx">
                        <h5>Messages</h5>
                        <form method="get" id="search_form" action="">
                            @csrf
                            <div class="form-group">
                                <input type="text" id="search-chat" class="form-control" placeholder="Search messages">
                                <button class="srch_btn">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1 6.26698C0.999621 3.75467 2.77399 1.59196 5.23795 1.10148C7.70192 0.611012 10.1692 1.92939 11.1309 4.25033C12.0927 6.57128 11.2809 9.24837 9.19219 10.6444C7.10345 12.0404 4.31944 11.7665 2.54278 9.99022C1.55508 9.00287 1.00012 7.66355 1 6.26698Z" stroke="#F9FFF1" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M9.99023 9.99109L12.9995 13.0004" stroke="#F9FFF1" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    Search
                                </button>
                            </div>
                        </form>

                    </div>
                    <div class="chat_box">
                        <!-- left chat list -->
                        <div class="chat_list">
                            <div class="chat_list_body" >
                                <input type="hidden" id="trans_current_chat_id" value="@if($latest_chat) {{$latest_chat->id}} @else 0 @endif">
                                <ul id="style-1" class="chat_listing_main">

                                </ul>
                            </div>
                        </div>
                        <!-- right chat box -->
                        <div class="chat_conversation" id="chat_history_main">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('/assets/admin/vendors/general/validate/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/assets/admin/vendors/general/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.40/moment-timezone-with-data.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.2/tinymce.min.js"></script>

    <script type="text/javascript">
    // function setDynamicHeight() {
    //     let height = window.innerHeight; // Visible height without hidden browser UI
    //     document.documentElement.style.setProperty('--vh', `${height * 0.01}px`);
    // }

    // // Update on load and resize
    // window.addEventListener('resize', setDynamicHeight);
    // window.addEventListener('orientationchange', setDynamicHeight);
    // document.addEventListener('DOMContentLoaded', setDynamicHeight);
        const textarea = document.querySelector('textarea');

        textarea.addEventListener('focus', () => {
        // Add a class or adjust the height when focusing
        document.body.style.height = `${window.innerHeight}px`;
        });

        textarea.addEventListener('blur', () => {
        // Reset the height when out of focus
        document.body.style.height = '100vh';
        });
        function getChatHistory(url,thisobj){
            var elems = document.querySelector(".active");
            var timezone = moment.tz.guess();
            console.log(timezone);
            // if(elems !==null){
            //     elems.classList.remove("active");
            // }
            $(thisobj).find("li").addClass('active');
            $.ajax({
                url: url,
                data:{"timezone":timezone},
            }).done(function(response) {
                $("#chat_history_main").html(response);
                // $(thisobj).find(".kt-widget__item").find('.kt-widget__action').html('');
                // KTAppChat.init();
                scrollToBottom();
                //getTotalUnreadMessage();
            });
        }
        function getChatListing(){
            var data = $("#search-chat").val();
            var selected_chat_id = $("#trans_current_chat_id").val();
            $.ajax({
                url: "{{route('transporter.message.chat_list')}}",
                data:{"search":data,"selected_chat_id":selected_chat_id},
            }).done(function(response) {
                $(".chat_listing_main").html(response);
                 {{--var url = "{{route('admin.chat.history',($latest_chat->id) ?? 0)}}"--}}
                // getChatHistory(url,$(".get-chat-history")[0]);
                //$(".get-chat-history")[0].click();
            });
        }
        function scrollToBottom() {
            var objDiv = document.getElementsByClassName("chat_div")[0]; // Target the first element
            if (objDiv) {
                if (objDiv.scrollHeight > objDiv.clientHeight) {
                    objDiv.scrollTop = objDiv.scrollHeight;
                } 
            }
        }
        $(document).ready(function () {
            // $(document).on('focus', 'input, textarea', function () {
            //     $('body').addClass('keyboard-open');
            // }).on('blur', 'input, textarea', function () {
            //     $('body').removeClass('keyboard-open');
            // });
            //open particular chat
            const urlParams = new URLSearchParams(window.location.search);
            const threadId = urlParams.get('thread_id');
            if (threadId) {
                const clickAnchorTag = () => {
                    const targetElement = document.querySelector(`li[data-id="${threadId}"] a.get-chat-history`);
                    if (targetElement) {
                        targetElement.click();
                    } else {
                        setTimeout(clickAnchorTag, 500);
                    }
                };
                clickAnchorTag();
            }
            if (history.pushState) {
                const cleanUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
                window.history.pushState({ path: cleanUrl }, '', cleanUrl);
            }
            //end chat code
            {{--function updateChat() {--}}
            {{--    getChatListing();--}}
            {{--    selected_chat_id = $("#trans_current_chat_id").val();--}}
            {{--    var url = "{{route('transporter.message.history', ':chat_id')}}";--}}
            {{--    url = url.replace(':chat_id', selected_chat_id);--}}
            {{--    getChatHistory(url, $(".get-chat-history")[0]);--}}
            {{--}--}}
            {{--updateChat();--}}
            {{--setInterval(updateChat, 5000);--}}

            setInterval(function(){
                getChatListing();
            }, 1000);
            getChatListing();

            var url = "{{route('transporter.message.history',($latest_chat->id) ?? 0)}}"
            getChatHistory(url,$(".get-chat-history")[0]);
        });

        $(document).on('submit', '#search_form', function (event) {
            event.preventDefault();
            getChatListing();
        });

    </script>

@endsection
