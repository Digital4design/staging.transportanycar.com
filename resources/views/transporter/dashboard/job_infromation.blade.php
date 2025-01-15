@foreach ($quotes as $key => $quote)
                    @if ($quote->status != 'rejected')
                        <div class="card">
                            <div class="card-header @if ($key == 0) active @endif"
                                id="heading{{ $key }}">
                                <div class="card_lft" style="width:calc(100% - 350px);">
                                    <div class="d-flex flex-wrap align-items-center mobile-wrap first-mobile-wrap" style="max-width:20%; flex: 0 0 20%;">
                                        <span class="mobile-label">
                                            Transport Provider
                                        </span>
                                        {{-- <a href="{{ route('front.feedback_view', $quote->id) }}"> --}}
                                            <h4 style="line-height: 24px;">
                                                {{ $quote->getTransporters->username ?? '' }}</h4>
                                        {{-- </a> --}}
                                    </div>
                                        <div class="mobile-wrap rating-mobile-wrap" style="max-width:20%; flex: 0 0 20%; text-align:center;">
                                            <span class="mobile-label">Rating</span>
                                            @php
                                            $totalStars = 5; // Total number of stars
                                            $yellowStars = 5; // Full yellow stars
                                            @endphp
                                            <ul class="rating-star choose_quote_rating">

                                                @for ($i = 1; $i <= $totalStars; $i++)
                                                    <li>
                                                        <svg width="20" height="20" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                                                fill="{{ $i <= $yellowStars ? '#FFA800' : '#ccc' }}" />
                                                        </svg>
                                                    </li>
                                                @endfor 
                                             <li><span class="ml-1 d-inline-block">(100%)</span></li>
                                        </ul>
                                        </div>
                                    {{-- </div> --}}
                                    <div class="mobile-wrap" style="max-width:20%; flex: 0 0 20%; text-align:center;">
                                        <span class="mobile-label">Verified</span>
                                        <span class="verified-icon">
                                            <svg width="27" height="27" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9965 5.3326C17.1504 13.7554 12.1262 17.3386 9.2776 18.184C9.08891 18.2401 8.88795 18.2401 8.69926 18.184C5.89741 17.3534 1.01723 13.876 1 5.75221C1.01688 5.05019 1.41171 4.41206 2.03239 4.08364C6.36869 1.63494 8.45439 1 8.98474 1C9.51509 1 11.7657 1.67555 16.3899 4.32236C16.756 4.52867 16.9865 4.91248 16.9965 5.3326Z" stroke="#52D017" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M5.30664 9.63198L7.76765 12.093L12.6897 7.16113" stroke="#52D017" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>   
                                            <div class="icon_hover_sec">
                                                <a class="hover_anchor">
                                                    <img src="{{ asset('assets/web/images/question.png') }}" alt="question" />
                                                </a>
                                                <div class="info_sec_details" id="infos-details">
                                                    <div class="info_sec_details_contant">
                                                        <p>We have verified this transport providers insurance cover and drivers license to protect you and transport vehicles safe and securely.</p>
                                                    </div>
                                                </div>
                                            </div>                                        
                                        </span>
                                        {{-- <img src="{{ asset('assets/web/images/right-mark.png') }}" class="right_mark"
                                        alt="right mark"> --}}
                                    </div>
                                    <div class="mobile-wrap" style="max-width:20%; flex: 0 0 20%;">
                                        <span class="mobile-label">Availability</span>
                                        <div class="icon_hover_sec">
                                            <div class="flex_blog "><span>Flexible</span>
                                                <a class="hover_anchor" 
                                                    data-toggle="popover" data-placement="bottom" data-content="Accept the quote and the transporter will contact you to arrange a convenient time and date."><img
                                                        src="{{ asset('assets/web/images/question.png') }}"
                                                        alt="question"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mobile-wrap" style="max-width:20%; flex: 0 0 20%; text-align:center;">
                                        <span class="mobile-label">Quote Amount</span>
                                        <h5 class="amount">£{{ $quote->price }} <span class="no-due">(No fees)</span></h5>
                                    </div>
                                </div>
                                <div class="wd-quote-btn" style="width: 350px;">
                                    <a href="javascript:;" class="wd-view-btn messageShow justify-content-center"
                                        data-msgkey="{{ $key }}" type="button" data-toggle="collapse"
                                        data-target="#collapse{{ $key }}" aria-expanded="true"
                                        aria-controls="collapseOne">View messages
                                        <span class="msg_{{ $quote->thread_id ?? 0 }}">0</span>
                                    </a>
                                    {{-- @if ($quote->status == 'pending' && !$hasAcceptedQuote)
                                        <a href="javascript:;"
                                            onclick="quoteChangeStatus({{ $quote->id }}, 'accept');"
                                            class="wd-accepted-btn">Accept
                                            <svg width="9" height="15" id="accept-svg" viewBox="0 0 9 15"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.45029 8.19736L2.87217 13.7755C2.48662 14.161 1.86318 14.161 1.48174 13.7755L0.554785 12.8485C0.169238 12.463 0.169238 11.8396 0.554785 11.4581L4.50869 7.5042L0.554785 3.55029C0.169238 3.16475 0.169238 2.54131 0.554785 2.15986L1.47764 1.22471C1.86318 0.83916 2.48662 0.83916 2.86807 1.22471L8.44619 6.80283C8.83584 7.18838 8.83584 7.81182 8.45029 8.19736Z"
                                                    fill="#F3F8FF" />
                                            </svg>
                                        </a>
                                        <a href="javascript:;" data-toggle="modal"
                                            data-target="#delete_quote_{{ $quote->id }}" class="d-lg-block delete_cross">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 2C10.0222 2 8.08879 2.58649 6.4443 3.6853C4.79981 4.78412 3.51809 6.3459 2.76121 8.17317C2.00433 10.0004 1.8063 12.0111 2.19215 13.9509C2.578 15.8907 3.53041 17.6725 4.92894 19.0711C6.32746 20.4696 8.10929 21.422 10.0491 21.8079C11.9889 22.1937 13.9996 21.9957 15.8268 21.2388C17.6541 20.4819 19.2159 19.2002 20.3147 17.5557C21.4135 15.9112 22 13.9778 22 12C22 10.6868 21.7413 9.38642 21.2388 8.17317C20.7363 6.95991 19.9997 5.85752 19.0711 4.92893C18.1425 4.00035 17.0401 3.26375 15.8268 2.7612C14.6136 2.25866 13.3132 2 12 2ZM15.21 13.79C15.3037 13.883 15.3781 13.9936 15.4289 14.1154C15.4797 14.2373 15.5058 14.368 15.5058 14.5C15.5058 14.632 15.4797 14.7627 15.4289 14.8846C15.3781 15.0064 15.3037 15.117 15.21 15.21C15.117 15.3037 15.0064 15.3781 14.8846 15.4289C14.7627 15.4797 14.632 15.5058 14.5 15.5058C14.368 15.5058 14.2373 15.4797 14.1154 15.4289C13.9936 15.3781 13.883 15.3037 13.79 15.21L12 13.41L10.21 15.21C10.117 15.3037 10.0064 15.3781 9.88458 15.4289C9.76272 15.4797 9.63202 15.5058 9.5 15.5058C9.36799 15.5058 9.23729 15.4797 9.11543 15.4289C8.99357 15.3781 8.88297 15.3037 8.79 15.21C8.69628 15.117 8.62188 15.0064 8.57111 14.8846C8.52034 14.7627 8.49421 14.632 8.49421 14.5C8.49421 14.368 8.52034 14.2373 8.57111 14.1154C8.62188 13.9936 8.69628 13.883 8.79 13.79L10.59 12L8.79 10.21C8.6017 10.0217 8.49591 9.7663 8.49591 9.5C8.49591 9.2337 8.6017 8.9783 8.79 8.79C8.97831 8.6017 9.2337 8.49591 9.5 8.49591C9.76631 8.49591 10.0217 8.6017 10.21 8.79L12 10.59L13.79 8.79C13.9783 8.6017 14.2337 8.49591 14.5 8.49591C14.7663 8.49591 15.0217 8.6017 15.21 8.79C15.3983 8.9783 15.5041 9.2337 15.5041 9.5C15.5041 9.7663 15.3983 10.0217 15.21 10.21L13.41 12L15.21 13.79Z"
                                                    fill="#9C9C9C" />
                                            </svg>
                                        </a>
                                    @elseif($quote->status == 'accept')
                                        @if ($job_status != 'completed')
                                            <a
                                                href="{{ route('front.booking_confirm_page', $user_quote_id) }}"class="wd-accepted-btn">Go
                                                to booking</a>
                                        @else
                                            <a
                                                href="{{ route('front.user_deposit', ['id' => $quote->id]) }}"class="wd-accepted-btn">Go
                                                to booking</a>
                                        @endif
                                    @endif --}}
                                    
                                </div>
                            </div>

                            <!-- delete quote Modal -->
                         
                            <div id="collapse{{ $key }}"
                                class="collapse @if ($key == 0) show @endif"
                                aria-labelledby="heading{{ $key }}" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form id="chat__form_{{ $key }}"
                                        action="{{ route('front.message.quote_send_message') }}" method="post"
                                        enctype='multipart/form-data'>
                                        @csrf
                                        <?php
                                        $thread = App\Thread::where('user_id', Auth::user()->id)
                                            ->where('friend_id', $quote->user_id)
                                            ->where('user_quote_id', $quote->user_quote_id)
                                            ->first();
                                        ?>
                                        <input type="hidden" name="form_page" value="quote">
                                        <input type="hidden" name="transporter_id" value="{{ $quote->user_id }}">
                                        <input type="hidden" name="user_quote_id" value="{{ $quote->user_quote_id }}">
                                        <input type="hidden" name="user_current_chat_id"
                                            id="user_current_chat_id_{{ $key }}"
                                            value="{{ $thread ? $thread->id : 0 }}">
                                        <div class="wd-quote-form">
                                            <div class="form-group">
                                                <p class="font-weight-light d-flex flex-wrap align-items-center text-left position-relative" style="font-size:14px; padding-left:20px; margin-bottom: 5px; color:#444444;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none" class="position-absolute" style="left:0;">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.95833 8.70834V10.2917C3.95833 12.915 6.08498 15.0417 8.70833 15.0417H10.2917C12.915 15.0417 15.0417 12.915 15.0417 10.2917V8.70834C15.0417 6.08499 12.915 3.95834 10.2917 3.95834H8.70833C6.08498 3.95834 3.95833 6.08499 3.95833 8.70834Z" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M8.75 12.6667C8.75 13.0809 9.08579 13.4167 9.5 13.4167C9.91421 13.4167 10.25 13.0809 10.25 12.6667H8.75ZM9.5 8.70834H10.25C10.25 8.29413 9.91421 7.95834 9.5 7.95834V8.70834ZM8.70833 7.95834C8.29412 7.95834 7.95833 8.29413 7.95833 8.70834C7.95833 9.12256 8.29412 9.45834 8.70833 9.45834V7.95834ZM9.5 13.4167C9.91421 13.4167 10.25 13.0809 10.25 12.6667C10.25 12.2525 9.91421 11.9167 9.5 11.9167V13.4167ZM8.70833 11.9167C8.29412 11.9167 7.95833 12.2525 7.95833 12.6667C7.95833 13.0809 8.29412 13.4167 8.70833 13.4167V11.9167ZM9.5 11.9167C9.08579 11.9167 8.75 12.2525 8.75 12.6667C8.75 13.0809 9.08579 13.4167 9.5 13.4167V11.9167ZM10.2917 13.4167C10.7059 13.4167 11.0417 13.0809 11.0417 12.6667C11.0417 12.2525 10.7059 11.9167 10.2917 11.9167V13.4167ZM10.25 6.33334C10.25 5.91913 9.91421 5.58334 9.5 5.58334C9.08579 5.58334 8.75 5.91913 8.75 6.33334H10.25ZM8.75 7.12501C8.75 7.53922 9.08579 7.87501 9.5 7.87501C9.91421 7.87501 10.25 7.53922 10.25 7.12501H8.75ZM10.25 12.6667V8.70834H8.75V12.6667H10.25ZM9.5 7.95834H8.70833V9.45834H9.5V7.95834ZM9.5 11.9167H8.70833V13.4167H9.5V11.9167ZM9.5 13.4167H10.2917V11.9167H9.5V13.4167ZM8.75 6.33334V7.12501H10.25V6.33334H8.75Z" fill="#444444"></path>
                                                    </svg>
                                                    Accept a quote to receive the transport providers contact details. 
                                                </p>
                                                {{-- <div class="wd-form-btn">
                                                    <p>Accept a quote to receive the transport providers contact details.</p>
                                                </div>                                                --}}
                                                <textarea class="form-control textarea" id="message"
                                                    placeholder="Type any question you have about this quote here."></textarea>
                                                    <p class="chat-note text-left font-weight-light position-relative" style="font-size:14px; padding-left:20px; margin-top: 5px; color:#444444;">
                                                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg" class="position-absolute" style="left:0; top:-2px;">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5631 12.2653L10.9587 4.78559C10.655 4.27279 10.1032 3.95831 9.50721 3.95831C8.91121 3.95831 8.35943 4.27279 8.05569 4.78559L3.45057 12.2653C3.10235 12.8105 3.07241 13.5003 3.37208 14.0737C3.67176 14.647 4.25525 15.0163 4.90169 15.0416H14.1119C14.7584 15.0163 15.3419 14.647 15.6416 14.0737C15.9412 13.5003 15.9113 12.8105 15.5631 12.2653Z" stroke="#5B5B5B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M9.50682 10.2916V6.33329" stroke="#5B5B5B" stroke-width="1.5" stroke-linecap="round"></path>
                                                            <path d="M9.50682 12.6666V11.875" stroke="#5B5B5B" stroke-width="1.5" stroke-linecap="round"></path>
                                                        </svg>                           
                                                        Do not share your contact details or personal information here.
                                                    </p>
                                            </div>
                                            <div class="message-error" style="display:none">Please enter your message.
                                            </div>
                                            <div class="wd-form-btn">
                                                {{--                                    <button type="submit" href="javascript:;" class="send-msg" id="send_message">Send message --}}
                                                {{--                                        <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg"> --}}
                                                {{--                                            <path d="M16.7637 1.65906L14.2551 13.4895C14.0658 14.3245 13.5722 14.5323 12.8709 14.1389L9.04861 11.3223L7.20428 13.0962C7.00018 13.3003 6.82947 13.471 6.43611 13.471L6.71072 9.5782L13.7949 3.17683C14.1029 2.90222 13.7281 2.75007 13.3162 3.02468L4.55838 8.53913L0.788066 7.35906C-0.0320513 7.103 -0.0468951 6.53894 0.958769 6.14558L15.706 0.464134C16.3888 0.208079 16.9863 0.616282 16.7637 1.65906Z" fill="white"/> --}}
                                                {{--                                        </svg> --}}
                                                {{--                                    </button> --}}
                                                <a href="javascript:;" class="send-msg"
                                                    onclick="sendMessage({{ $key }});" id="send_message">Send
                                                    message
                                                    <svg width="17" height="15" viewBox="0 0 17 15"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16.7637 1.65906L14.2551 13.4895C14.0658 14.3245 13.5722 14.5323 12.8709 14.1389L9.04861 11.3223L7.20428 13.0962C7.00018 13.3003 6.82947 13.471 6.43611 13.471L6.71072 9.5782L13.7949 3.17683C14.1029 2.90222 13.7281 2.75007 13.3162 3.02468L4.55838 8.53913L0.788066 7.35906C-0.0320513 7.103 -0.0468951 6.53894 0.958769 6.14558L15.706 0.464134C16.3888 0.208079 16.9863 0.616282 16.7637 1.65906Z"
                                                            fill="white" />
                                                    </svg>
                                                </a>
                                                <p class="text-note d-none"><span>Note:</span> Please do not share any contact information here,
                                                    details are exchanged after you have accepted the quote.</p>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="wd-quote-msg" id="chat_history_main_{{ $key }}">

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

@section('script')
    <script src="{{ asset('assets/web/js/admin.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.40/moment-timezone-with-data.js"
        type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.2/tinymce.min.js"></script>
    <script>
        $(document).ready(()=>{
            $('[data-toggle="popover"]').popover({trigger:'hover'});
        });
        function quoteChangeStatus(quote_id, status) {
            var formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("quote_id", quote_id);
            formData.append("status", status);
            $.ajax({
                url: "{{ route('front.quote_change_status') }}",
                data: formData,
                processData: false,
                contentType: false,
                type: "POST",
                beforeSend: function() {
                    addOverlay();
                },
                complete: function() {
                    removeOverlay();
                },
                success: function(res) {
                    if (res.success == true) {
                        if (status == 'accept') {
                            var url = "{{ route('front.checkout', ['id' => ':quote_id']) }}";
                            url = url.replace(':quote_id', quote_id);
                            window.location.href = url;
                            return;
                        } else {
                            window.location.reload();
                        }

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
    </script>
    <script>
        const fileImage = document.querySelector('.photo-preview__src');
        const filePreview = document.querySelector('.photo-preview');

        fileImage.onchange = function() {
            const reader = new FileReader();

            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                filePreview.style.backgroundImage = "url(" + e.target.result + ")";
                filePreview.classList.add("has-image");
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };
    </script>
    <script>
        function isEmptyOrSpaces(str) {
            return str === null || str.match(/^ *$/) !== null;
        }

        function getChatHistory(url, id) {
            var elems = document.querySelector(".active");
            var timezone = moment.tz.guess();
            console.log(timezone);

            // if(elems !==null){
            //     elems.classList.remove("active");
            // }
            //$(thisobj).find("li").addClass('active');
            $.ajax({
                url: url,
                data: {
                    "timezone": timezone
                },
                dataType: "json",
            }).done(function(response) {
                $("#chat_history_main_" + id).html(response.html);
                if (response.messageCounts) {
                    console.log('Message Counts:', response.messageCounts);
                    for (const [threadId, count] of Object.entries(response.messageCounts)) {
                        const messageCountElem = document.querySelector('.msg_' + threadId);
                        if (messageCountElem) {
                            messageCountElem.textContent = count;
                        }
                    }
                }
                // $(thisobj).find(".kt-widget__item").find('.kt-widget__action').html('');
                // KTAppChat.init();
                // scrollToBottom();
                // getTotalUnreadMessage();
            });
        }
        var send_message = false;

        function sendMessage(id) {
            var form = $('#chat__form_' + id);
            var message = form.find('.textarea').val();
            var contains_email = /\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b/i.test(message);
            var contains_digit = /\d/.test(message);
            if (!message.trim()) {
                form.find('.message-error').css('display', 'block').text("Please enter your message.");
                return;
            }
            if (contains_email || contains_digit) {
                form.find('.message-error').css('display', 'block').text(
                    "Do not share contact information or you will be banned.");
                return;
            }

            var send_message = false;

            if (!isEmptyOrSpaces(message)) {
                send_message = true;
            }

            if (send_message == true) {
                var submitButton = form.find(".send-msg");
                submitButton.prop("disabled", true).text("Please Wait...");
                var file_type = form.find('#file_type').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    }
                });
                var timezone = moment.tz.guess();
                var data = new FormData(form[0]); // Form data needs to be from the specific form
                data.append('message', message);
                data.append('file_type', file_type);
                data.append('timezone', timezone);

                $.ajax({
                    url: form.attr('action'),
                    method: "POST",
                    data: data,
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                }).done(function(response) {
                    submitButton.prop("disabled", false).html(
                        "Send message <svg width='17' height='15' viewBox='0 0 17 15' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M16.7637 1.65906L14.2551 13.4895C14.0658 14.3245 13.5722 14.5323 12.8709 14.1389L9.04861 11.3223L7.20428 13.0962C7.00018 13.3003 6.82947 13.471 6.43611 13.471L6.71072 9.5782L13.7949 3.17683C14.1029 2.90222 13.7281 2.75007 13.3162 3.02468L4.55838 8.53913L0.788066 7.35906C-0.0320513 7.103 -0.0468951 6.53894 0.958769 6.14558L15.706 0.464134C16.3888 0.208079 16.9863 0.616282 16.7637 1.65906Z' fill='white'/></svg>"
                        );
                    if (response.status == "success") {
                        window.location.reload();
                    }
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    // Handle any unexpected errors
                    submitButton.prop("disabled", false).html(
                        "Send message <svg width='17' height='15' viewBox='0 0 17 15' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M16.7637 1.65906L14.2551 13.4895C14.0658 14.3245 13.5722 14.5323 12.8709 14.1389L9.04861 11.3223L7.20428 13.0962C7.00018 13.3003 6.82947 13.471 6.43611 13.471L6.71072 9.5782L13.7949 3.17683C14.1029 2.90222 13.7281 2.75007 13.3162 3.02468L4.55838 8.53913L0.788066 7.35906C-0.0320513 7.103 -0.0468951 6.53894 0.958769 6.14558L15.706 0.464134C16.3888 0.208079 16.9863 0.616282 16.7637 1.65906Z' fill='white'/></svg>"
                        );
                    form.find('.message-error').css('display', 'block').text(
                        "Do not share contact information or you will be banned.");
                });
            }
        }


        $(document).ready(function() {
            updateChat();
            $('.textarea').on('keyup', function() {
                $('.message-error').css('display', 'none');
            })
            //setInterval(updateChat, 5000);

            function updateChat() {
                var id = 0;
                var selected_chat_id = $("#user_current_chat_id_0").val();
                if (selected_chat_id) {
                    var url = "{{ route('front.message.quote_history', ':chat_id') }}";
                    url = url.replace(':chat_id', selected_chat_id);
                    getChatHistory(url, id);
                }

                {{-- var url = "{{route('transporter.message.history',($latest_chat->id) ?? 0)}}" --}}
                {{-- getChatHistory(url,$(".get-chat-history")[0]); --}}
            }

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
        $('.messageShow').on('click', function() {
            var id = $(this).attr('data-msgkey');
            var selected_chat_id = $("#user_current_chat_id_" + id).val();
            if (selected_chat_id) {
                var url = "{{ route('front.message.quote_history', ':chat_id') }}";
                url = url.replace(':chat_id', selected_chat_id);
                getChatHistory(url, id);
            }
        })
      
    </script>
@endsection

     