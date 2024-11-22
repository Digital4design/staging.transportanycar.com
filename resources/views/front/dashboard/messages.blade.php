@extends('layouts.web.dashboard.app')

@section('head_css')
@endsection

@section('content')
    @include('layouts.web.dashboard.header')
    <section class="wd-active-job new_message_section">
        <div class="container-job">
            <div class="active-job-box">
                <div class="chat_title_bx">
                    <h5>{{$title}}</h5>
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
                        <div class="chat_list_body">
                            <ul id="style-1" class="chat_listing_main">
{{--                                <li class="active">--}}
{{--                                    <a href="javascript:;" class="chat_list_info unread_msg">--}}
{{--                                        <div class="chat_list_info_fst">--}}
{{--                                            <img src="{{asset('assets/web/images/dashboard/chat/chat1.png')}}">--}}
{{--                                            <div class="chat_msg">--}}
{{--                                                <h6><span>Ford Fiesta</span> - Hello, there is this...</h6>--}}
{{--                                                <h3>--}}
{{--                                                    <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                        <circle cx="4" cy="4" r="4" fill="#52D017"/>--}}
{{--                                                    </svg>--}}
{{--                                                    User101--}}
{{--                                                </h3>--}}
{{--                                                <p>Lorem ipsum dolor sit amet consectetur. Turpis vestibulum lobortis in mi vel et congue...</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="chat_list_info_lst">--}}
{{--                                            <span>09:12 PM</span>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:;" class="chat_list_info unread_msg">--}}
{{--                                        <div class="chat_list_info_fst">--}}
{{--                                            <img src="{{asset('assets/web/images/dashboard/chat/chat1.png')}}">--}}
{{--                                            <div class="chat_msg">--}}
{{--                                                <h6><span>Ford Fiesta</span> - Hello, there is this...</h6>--}}
{{--                                                <h3>--}}
{{--                                                    <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                        <circle cx="4" cy="4" r="4" fill="#52D017"/>--}}
{{--                                                    </svg>--}}
{{--                                                    User101--}}
{{--                                                </h3>--}}
{{--                                                <p>Lorem ipsum dolor sit amet consectetur. Turpis vestibulum lobortis in mi vel et congue...</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="chat_list_info_lst">--}}
{{--                                            <span>09:12 PM</span>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                            </ul>
                        </div>
                    </div>
                    <!-- right chat box -->
                    <input type="hidden" id="user_current_chat_id" value="@if($latest_chat) {{$latest_chat->id}} @else 0 @endif">
                    <div class="chat_conversation" id="chat_history_main">

{{--                        <div class="chat_conversation_body scrollbar" id="style-1">--}}
{{--                            <!-- incoming -->--}}
{{--                            <div class="chat_messages_incoming">--}}
{{--                                <div class="chat_conversation_bx">--}}
{{--                                    <div class="chat_txt_bx">--}}
{{--                                        <h4>User101</h4>--}}
{{--                                        <div class="chat_incoming_txt">--}}
{{--                                            <p>Lorem ipsum dolor sit amet consectetur. Turpis vestibulum lobortis in mi vel et congue. Massa facilisis</p>--}}
{{--                                            <span class="chat_time">09:12 PM</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="chat_incoming_txt">--}}
{{--                                            <p>Lorem ipsum dolor sit amet consectetur. Turpis vestibulum </p>--}}
{{--                                            <span class="chat_time">09:12 PM</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- outgoing -->--}}
{{--                            <div class="chat_messages_outgoing">--}}
{{--                                <div class="chat_conversation_bx">--}}
{{--                                    <div class="chat_out_txt_bx">--}}
{{--                                        <h4>You</h4>--}}
{{--                                        <div class="chat_outgoing_txt">--}}
{{--                                            <p>Lorem ipsum dolor sit ame</p>--}}
{{--                                            <span class="chat_time">09:12 PM</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- incoming -->--}}
{{--                            <div class="chat_messages_incoming">--}}
{{--                                <div class="chat_conversation_bx">--}}
{{--                                    <div class="chat_txt_bx">--}}
{{--                                        <h4>User101</h4>--}}
{{--                                        <div class="chat_incoming_txt">--}}
{{--                                            <p>Lorem ipsum dolor sit amet??</p>--}}
{{--                                            <span class="chat_time">09:12 PM</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- outgoing -->--}}
{{--                            <div class="chat_messages_outgoing">--}}
{{--                                <div class="chat_conversation_bx">--}}
{{--                                    <div class="chat_out_txt_bx">--}}
{{--                                        <h4>You</h4>--}}
{{--                                        <div class="chat_outgoing_txt">--}}
{{--                                            <p>Lorem ipsum dolor sit amet amet</p>--}}
{{--                                            <span class="chat_time">09:12 PM</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- incoming -->--}}
{{--                            <div class="chat_messages_incoming">--}}
{{--                                <div class="chat_conversation_bx">--}}
{{--                                    <div class="chat_txt_bx">--}}
{{--                                        <h4>User101</h4>--}}
{{--                                        <div class="chat_incoming_txt">--}}
{{--                                            <p>Lorem ipsum dolor sit amet consectetur. Turpis vestibulum lobortis in mi vel et congue. Massa facilisis</p>--}}
{{--                                            <span class="chat_time">09:12 PM</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="chat_incoming_txt">--}}
{{--                                            <p>Lorem ipsum dolor sit amet consectetur. Turpis vestibulum </p>--}}
{{--                                            <span class="chat_time">09:12 PM</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- outgoing -->--}}
{{--                            <div class="chat_messages_outgoing">--}}
{{--                                <div class="chat_conversation_bx">--}}
{{--                                    <div class="chat_out_txt_bx">--}}
{{--                                        <h4>You</h4>--}}
{{--                                        <div class="chat_outgoing_txt">--}}
{{--                                            <p>Lorem ipsum.</p>--}}
{{--                                            <span class="chat_time">09:12 PM</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{asset('/assets/admin/vendors/general/validate/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/assets/admin/vendors/general/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.40/moment-timezone-with-data.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.2/tinymce.min.js"></script>

    <script type="text/javascript">
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
                // console.log(response,"------------hello world-----------------");
                $("#chat_history_main").html(response);
                // $(thisobj).find(".kt-widget__item").find('.kt-widget__action').html('');
                // KTAppChat.init();
                setTimeout(function() {
                    scrollToBottom();
                }, 500);
                //getTotalUnreadMessage();
            });
        }
        function getChatListing(){
            var data = $("#search-chat").val();
            var selected_chat_id = $("#user_current_chat_id").val();
            $.ajax({
                url: "{{route('front.message.chat_list')}}",
                data:{"search":data,"selected_chat_id":selected_chat_id},
            }).done(function(response) {
                //console.log(response,"////////////");
                $(".chat_listing_main").html(response);
                {{--var url = "{{route('admin.chat.history',($latest_chat->id) ?? 0)}}"--}}
                // getChatHistory(url,$(".get-chat-history")[0]);
                //$(".get-chat-history")[0].click();
            });
        }
        // function scrollToBottom(){
        //     var objDiv = document.getElementsByClassName("chat_div")[0];
        //     console.log(objDiv);
        //     if (objDiv) {
        //         objDiv.scrollTop = objDiv.scrollHeight;
        //     }
        //     //objDiv.scrollTop = 569874;
        // }

        function scrollToBottom() {
            var objDiv = document.getElementsByClassName("chat_div")[0]; // Target the first element
            if (objDiv) {
                if (objDiv.scrollHeight > objDiv.clientHeight) {
                    objDiv.scrollTop = objDiv.scrollHeight;
                }
            }
        }

        $(document).ready(function () {
            //open particular chat
            const urlParams = new URLSearchParams(window.location.search);
            const threadId = urlParams.get('thread_id');
            console.log(threadId,'------------urlparams');
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
            
            setInterval(function(){
                getChatListing();
            }, 1000);
            getChatListing();

            var url = "{{route('front.message.history',($latest_chat->id) ?? 0)}}"
            getChatHistory(url,$(".get-chat-history")[0]);
        });

        $(document).on('submit', '#search_form', function (event) {
            event.preventDefault();
            getChatListing();
        });
        function quoteChangeStatus(quote_id) {
            var url = "{{ route('front.checkout', ['id' => ':quote_id']) }}";
            url = url.replace(':quote_id', quote_id);
            window.location.href = url;
            return;
        }
    </script>
@endsection

