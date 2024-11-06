<?php
$user = isset($thread->user) ? $thread->user : null;
$auth_user = Auth::user();
?>
<style>
    .user-chat-header-pic {
        width: 33px;
        height: 33px;
    }

    .conversation_user p.verified {
        font-size: 12px;
        line-height: 16px;
        color: #52D017;
        font-weight: 500;
    }

    .conversation_user ul li {
        line-height: 16px;
    }

    .chat-note {
        font-size: 10px;
        line-height: 13px;
        font-weight: 500;
        color: #444444;
        margin: 15px;
        display: none;
    }

    @media screen and (max-width: 575px) {
        #messages .admin-header {
            box-shadow: none;
        }

        .chat-note {
            display: block
        }
    }
</style>
@if (isset($user) && !empty($user))
    <div class="chat_conversation_header user_header">
        <div class="chat_head_lft">
            <a href="javascript:;" class="chat_back_arrow">
                <svg width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6.03125 8.53906C6.03125 8.92448 5.97135 9.11719 5.85156 9.11719C5.78906 9.11719 5.70052 9.06771 5.58594 8.96875L0.695312 5.17969C0.570312 5.08594 0.507812 4.96615 0.507812 4.82031C0.507812 4.6901 0.570312 4.57031 0.695312 4.46094L5.58594 0.671875C5.70052 0.572917 5.78906 0.523438 5.85156 0.523438C5.97135 0.523438 6.03125 0.716146 6.03125 1.10156C6.02604 1.19531 5.97135 1.28125 5.86719 1.35938L1.46875 4.82031L5.86719 8.28125C5.96094 8.35938 6.01562 8.44531 6.03125 8.53906Z"
                        fill="black"></path>
                </svg>
            </a>
            <div class="conversation_user d-flex flex-wrap align-items-center">
                <div class="wd-transport-img pt-0 user-chat-header-pic mr-2">
                    <img src="https://www.scrapcar.co/wp-content/uploads/2024/08/user.png" width="58" height="58"
                        alt="trasporter feedback" class="img-fluid">
                </div>
                <div>

                    <h3 class="mb-1">{{ $transporter_username }} <img
                            src="{{ asset('assets/images/user-verified.png') }}" alt="" width="20"
                            height="20" class="ml-1" /></h3>
                    <ul class="wd-star-lst user-feedback-stars mb-1">
                        <li>
                            <svg width="16" height="16" viewBox="0 0 12 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                    fill="#D9D9D9"></path>
                            </svg>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 12 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                    fill="#D9D9D9"></path>
                            </svg>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 12 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                    fill="#D9D9D9"></path>
                            </svg>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 12 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                    fill="#D9D9D9"></path>
                            </svg>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 12 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                                    fill="#D9D9D9"></path>
                            </svg>
                        </li>
                        <li class="user-feedback-rating-count">
                            <span>(0)</span>
                        </li>
                    </ul>
                    <p class="verified">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13"
                            fill="none">
                            <path
                                d="M4.41537 11.1567L0.190373 6.93169C-0.0634575 6.67786 -0.0634575 6.2663 0.190373 6.01245L1.10959 5.0932C1.36342 4.83935 1.775 4.83935 2.02883 5.0932L4.87499 7.93934L10.9712 1.8432C11.225 1.58937 11.6366 1.58937 11.8904 1.8432L12.8096 2.76245C13.0634 3.01628 13.0634 3.42783 12.8096 3.68169L5.33462 11.1567C5.08076 11.4105 4.6692 11.4105 4.41537 11.1567Z"
                                fill="#52D017"></path>
                        </svg>
                        Verified
                    </p>
                    {{-- <p>
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="5" cy="5" r="5" fill="#52D017"></circle>
                    </svg>
                    Online
                </p> --}}
                </div>
            </div>
        </div>
        @if ($thread->user_qot->status == 'pending' || $thread->user_qot->status == 'approved')
            <a href="javascript:;" onclick="quoteChangeStatus({{ $quote_by_transporter_id }});"
                class="chat_accept_btn">Accept quote</a>
        @elseif($thread->user_qot->status == 'ongoing')
            <a href="{{ route('front.booking_confirm_page', $thread->user_qot->id) }}" class="chat_accept_btn">Go to
                booking</a>
        @elseif($thread->user_qot->status == 'completed')
            <a href="{{ route('front.user_deposit', $thread->user_qot->id) }}" class="chat_accept_btn">Go to booking</a>
        @endif
    </div>
    {{-- <div class="chat_conversation_body scrollbar chat_div" id="style-1">
        @if (isset($messages) && $messages->count() > 0)
            @foreach ($messages as $date => $message_date)
                @foreach ($message_date as $message)
                    <?php
                    $sender_user = $message->sender;
                    ?>
                    @if ($thread->friend_id != $message->sender_id)
                        <!-- outgoing -->
                        <div class="chat_messages_outgoing">
                            <div class="chat_conversation_bx">
                                <div class="chat_out_txt_bx">
                                    <h4>You</h4>
                                    <div class="chat_outgoing_txt">
                                        <!-- <p>{{ $message->message }}</p> -->
                                        <p>{!! nl2br(e($message->message)) !!}</p>
                                        <!-- <span class="chat_time">{{ carbon\carbon::parse($message->created_at)->diffForHumans() }}</span> -->
                                        <span class="chat_time">
                                            @if (carbon\carbon::parse($message->created_at)->diffInHours() < 24)
                                                {{ carbon\carbon::parse($message->created_at)->format('h:i A') }}
                                            @else
                                                {{ carbon\carbon::parse($message->created_at)->diffForHumans() }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- incoming -->
                        <div class="chat_messages_incoming">
                            <div class="chat_conversation_bx">
                                <div class="chat_txt_bx">
                                    <h4>{{ $transporter_username }}</h4>
                                    <div class="chat_incoming_txt">
                                        <!-- <p>{{ $message->message }}</p> -->
                                        <p>{!! nl2br(e($message->message)) !!}</p>
                                        <!-- <span class="chat_time">{{ carbon\carbon::parse($message->created_at)->diffForHumans() }}</span> -->
                                        <span class="chat_time">
                                            @if (carbon\carbon::parse($message->created_at)->diffInHours() < 24)
                                                {{ carbon\carbon::parse($message->created_at)->format('h:i A') }}
                                            @else
                                                {{ carbon\carbon::parse($message->created_at)->diffForHumans() }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        @endif
    </div> --}}
    <div class="chat_conversation_body scrollbar chat_div" id="style-1">
        @if (isset($messages) && $messages->count() > 0)
            @php
                $previousSender = null; // Track the last sender ID
            @endphp
            @foreach ($messages as $date => $message_date)
                @foreach ($message_date as $message)
                    @php
                        $sender_user = $message->sender;
                        $formattedTime = \Carbon\Carbon::parse($message->created_at)->diffInHours() < 24
                            ? \Carbon\Carbon::parse($message->created_at)->format('h:i A')
                            : \Carbon\Carbon::parse($message->created_at)->diffForHumans();
                    @endphp
    
                    @if ($thread->friend_id != $message->sender_id)
                        <!-- Outgoing message -->
                        @if ($previousSender !== $message->sender_id)
                            <div class="chat_messages_outgoing mb-0">
                                <div class="chat_conversation_bx">
                                    <div class="chat_out_txt_bx">
                                        <h4>You</h4> <!-- Sender name only displayed once -->
                        @endif
                                        <div class="chat_outgoing_txt">
                                            <p>{!! nl2br(e($message->message)) !!}</p>
                                            <span class="chat_time">{{ $formattedTime }}</span>
                                        </div>
                        @if ($loop->last || $message_date[$loop->index + 1]->sender_id !== $message->sender_id)
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        <!-- Incoming message -->
                        @if ($previousSender !== $message->sender_id)
                            <div class="chat_messages_incoming">
                                <div class="chat_conversation_bx">
                                    <div class="chat_txt_bx">
                                        <h4>{{ $transporter_username }}</h4> <!-- Sender name only displayed once -->
                        @endif
                                        <div class="chat_incoming_txt">
                                            <p>{!! nl2br(e($message->message)) !!}</p>
                                            <span class="chat_time">{{ $formattedTime }}</span>
                                        </div>
                        @if ($loop->last || $message_date[$loop->index + 1]->sender_id !== $message->sender_id)
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                    @php
                        $previousSender = $message->sender_id; // Update last sender tracker
                    @endphp
                @endforeach
            @endforeach
            <input type="hidden" id="last_message_sender" value="{{ $previousSender }}">
        @endif
    </div>
    
   
    
   
    <div class="chat_conversation_footer">
        <form id="chat__form" action="{{ route('front.message.store', $thread->user_quote_id) }}" method="post"
            enctype='multipart/form-data'>
            @csrf
            <div class="form-group">
                <div class="msg-send_flex">
                    <!-- <a href="javascript:;" class="option_btn">
                        <svg width="4" height="22" viewBox="0 0 4 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="2" cy="2" r="2" fill="#9A9A9A"/>
                            <circle cx="2" cy="11" r="2" fill="#9A9A9A"/>
                            <circle cx="2" cy="20" r="2" fill="#9A9A9A"/>
                        </svg>
                    </a> -->
                    <textarea type="text" class="form-control textarea" id="message" placeholder="Write your message..."></textarea>
                    <a href="javascript:;" class="wd-send-btn" onclick="sendMessage();" id="send_message">
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.8821 24.3168H12.8128C12.4662 24.2822 12.189 24.0742 12.085 23.7624L9.48604 15.9307L1.27317 13.3317C0.961288 13.2277 0.718714 12.9505 0.68406 12.604C0.649407 12.2574 0.822674 11.9455 1.13456 11.8069L23.1049 0.821773C23.4167 0.648506 23.7979 0.717814 24.0751 0.960388C24.3177 1.20296 24.387 1.58415 24.2484 1.93068L13.6098 23.8317C13.4712 24.1436 13.194 24.3168 12.8821 24.3168ZM3.73357 12.3267L10.387 14.4406C10.6296 14.5099 10.8375 14.7178 10.9068 14.9604L13.0207 21.2673L21.6841 3.35148L3.73357 12.3267Z"
                                fill="#52D017" />
                        </svg>
                    </a>
                </div>
            </div>
        </form>
        <p class="chat-note">
            Note: For your safety, please do not share any contact information, details are exchanged after you have
            accepted the quote and paid the deposit online.
        </p>
    </div>
@endif
<div class="chat_messages_outgoing d-none mb-0" id="send_message_main">
    <div class="chat_conversation_bx message-data">
        <div class="chat_out_txt_bx">
            <h4>You</h4>
            <div class="chat_outgoing_txt message other-message">
                <span class="chat_time message-data-time"></span>
            </div>
        </div>
    </div>
</div>



<script>
    var send_message = false;

    function uploadImageA(thisobj) {
        send_message = true;
        $("#file_type").val("image");
        $("#image-upload1").prop("accept", "image/*");
        $("#image-upload1").click();
    }

    function uploadVideo(thisobj) {
        send_message = true;
        $("#file_type").val("video");
        $("#image-upload1").prop("accept", "video/mp4,video/x-m4v,video/*");
        $("#image-upload1").click();
    }

    function uploadAudio(thisobj) {
        send_message = true;
        $("#file_type").val("audio");
        $("#image-upload1").prop("accept", "audio/mp3");
        $("#image-upload1").click();
    }

    function sendMessage() {
        $('#chat__form').submit();
    }

    function isEmptyOrSpaces(str) {
        return str === null || str.match(/^ *$/) !== null;
    }
    $(function() {
        $('#image-upload1').change(function() {
            //if(videoPreview == true){
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $("#image_previe_main").addClass("d-none");
                    $("#audio_preview").addClass("d-none");
                    $("#video_preview").addClass("d-none");
                    if ($("#file_type").val() == "image") {
                        $("#image_previe_main").removeClass("d-none");
                        $("#image_previe_main").html('<div><img id="imgPreview" src="' + event
                            .target.result +
                            '" width="100" height="100"></img></div><div><a onclick="removeImageFile(this);" href="javascript:;">remove</a></div>'
                            );
                    }
                    if ($("#file_type").val() == "audio") {
                        $("#audio_preview").removeClass("d-none");
                        $("#audio_preview").html('<audio controls><source src="' + event.target
                            .result +
                            '" type="audio/mpeg"></audio><div><a onclick="removeAudioFile(this);" href="javascript:;">remove</a></div></div>'
                            );
                    }
                    if ($("#file_type").val() == "video") {
                        $("#video_preview").removeClass("d-none");
                        $("#video_preview").html('<video width="250" controls><source src="' + event
                            .target.result +
                            '" type="video/mp4"></video><div><a onclick="removeFile(this);" href="javascript:;">remove</a></div></div>'
                            );
                    }


                }
                reader.readAsDataURL(file);
            }
            //}
        });
        // $('#chat__form').on('submit', function(e) {
        //     e.preventDefault();
        //     var user_current_chat_id = $('#user_current_chat_id').val();
        //     var file_name = $("#image-upload1").val();
        //     var message = $('.textarea').val();
        //     var contains_email = /\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b/i.test(message);
        //     var contains_digit = /\d/.test(message);
        //     if (!message.trim()) {
        //         toastr.error("Message cannot be empty.");
        //         return;
        //     }
        //     if (contains_email || contains_digit) {
        //         toastr.error("Do not share contact information or you will be banned.")
        //         return;
        //     }
        //     var send_message = false;
        //     if (file_name != "") {
        //         send_message = true;
        //     }
        //     if (!isEmptyOrSpaces(message)) {
        //         send_message = true;
        //     }
        //     if (send_message == true) {
        //         $("#send_message").prop("disabled", "true");
        //         // $("#send_message").text("Please Wait...");

        //         var file_type = $('#file_type').val();
        //         $('.textarea').val('');

        //         $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('input[name="_token"]').val()
        //             }
        //         });
        //         var timezone = moment.tz.guess();
        //         var data = new FormData(this);
        //         data.append('message', message);
        //         data.append('file_type', file_type);
        //         data.append('timezone', timezone);
        //         data.append('user_current_chat_id', user_current_chat_id)

        //         $.ajax({
        //             url: $(this).attr('action'),
        //             method: "POST",
        //             data: data,
        //             //data:{message_text:message},
        //             dataType: 'json',
        //             contentType: false,
        //             cache: false,
        //             processData: false,
        //         }).done(function(response) {
        //             $("#image-upload1").val("");
        //             $("#image_previe_main").addClass("d-none");
        //             $("#audio_preview").addClass("d-none");
        //             $("#video_preview").addClass("d-none");

        //             $("#send_message").prop("disabled", false);
        //             // $("#send_message").text("Send");
        //             if (response.status == "success") {
        //                 var data = response.data;
        //                 var message_clone = $("#send_message_main").clone();
        //                 message_clone.removeClass("d-none");
        //                 message_clone.find(".message-data-time").html(data.create_message);
        //                 if (data.type == "file") {
        //                     if (data.file_type == "audio") {
        //                         message_clone.find('.message').html(
        //                             '<div><audio controls><source src="' + data.file +
        //                             '" type="audio/mpeg"></audio></div></div>')
        //                     } else if (data.file_type == "video") {
        //                         message_clone.find('.message').html(
        //                             '<div><video width="250" controls><source src="' + data
        //                             .file + '" type="video/mp4"></video></div></div>')
        //                     } else {
        //                         message_clone.find('.message').html(
        //                             '<div><img width="200px;" src="' + data.file +
        //                             '" alt="avatar"><div></div></div>')
        //                     }
        //                 } else {
        //                     var createdAt = data.created_at;
        //                     var parsedCreatedAt = new Date(createdAt);
        //                     var formattedCreatedAt = moment(parsedCreatedAt).fromNow();
        //                     // Convert newline characters to <br> tags for the message
        //                     var formattedMessage = data.message.replace(/\r\n|\n/g, '<br>');
        //                     message_clone.find('.message').html('<p>' + formattedMessage +
        //                         '</p><span class="chat_time">' + formattedCreatedAt +
        //                         '</span>')
        //                 }
        //                 $('.chat_div').append(message_clone);
        //             }
        //             scrollToBottom();
        //             $(".kt-avatar__cancel").click();
        //         }).fail(function(xhr) {
        //             if (xhr.status === 422) {
        //                 var errors = xhr.responseJSON.errors;
        //                 if (errors.message) {
        //                     toastr.error(
        //                         "Do not share contact information or you will be banned..");
        //                 }
        //             }
        //             $("#send_message").prop("disabled",
        //             false); // Re-enable the button in case of error
        //         });
        //     }

        // });
        $('#chat__form').on('submit', function(e) {
            e.preventDefault();
            var user_current_chat_id = $('#user_current_chat_id').val();
            var file_name = $("#image-upload1").val();
            var message = $('.textarea').val();
            var contains_email = /\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b/i.test(message);
            var contains_digit = /\d/.test(message);
            if (!message.trim()) {
                toastr.error("Message cannot be empty.");
                return;
            }
            if (contains_email || contains_digit) {
                toastr.error("Do not share contact information or you will be banned.")
                return;
            }
            var send_message = false;
            if (file_name != "") {
                send_message = true;
            }
            if (!isEmptyOrSpaces(message)) {
                send_message = true;
            }
            if (send_message == true) {
                $("#send_message").prop("disabled", "true");
                // $("#send_message").text("Please Wait...");

                var file_type = $('#file_type').val();
                $('.textarea').val('');
                var lastMessageSender = $('#last_message_sender').val(); // Store the last sender


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    }
                });
                var timezone = moment.tz.guess();
                var data = new FormData(this);
                data.append('message', message);
                data.append('file_type', file_type);
                data.append('timezone', timezone);
                data.append('user_current_chat_id', user_current_chat_id)

                $.ajax({
                    url: $(this).attr('action'),
                    method: "POST",
                    data: data,
                    //data:{message_text:message},
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                }).done(function(response) {
                    $("#image-upload1").val("");
                    $("#image_previe_main").addClass("d-none");
                    $("#audio_preview").addClass("d-none");
                    $("#video_preview").addClass("d-none");

                    $("#send_message").prop("disabled", false);
                    // $("#send_message").text("Send");
                    if (response.status == "success") {
                        var data = response.data;
                        var message_clone = $("#send_message_main").clone();
                        message_clone.removeClass("d-none");

                        // Check if the sender is the same as the last message sender
                        if (lastMessageSender == data.sender_id) {
                            message_clone.find("h4").remove(); // Remove the sender's name if the sender is the same
                            // alert("hello");
                        } else {
                            // alert("out");
                            message_clone.find("h4").text('You'); // Add sender name if it's a different sender
                            lastMessageSender = data.sender_id; // Update the last sender
                            $("#last_message_sender").val(data.sender_id);
                        }
                        message_clone.find(".message-data-time").html(data.create_message);
                        if (data.type == "file") {
                            if (data.file_type == "audio") {
                                message_clone.find('.message').html(
                                    '<div><audio controls><source src="' + data.file +
                                    '" type="audio/mpeg"></audio></div></div>')
                            } else if (data.file_type == "video") {
                                message_clone.find('.message').html(
                                    '<div><video width="250" controls><source src="' + data
                                    .file + '" type="video/mp4"></video></div></div>')
                            } else {
                                message_clone.find('.message').html(
                                    '<div><img width="200px;" src="' + data.file +
                                    '" alt="avatar"><div></div></div>')
                            }
                        } else {
                            var createdAt = data.created_at;
                            var parsedCreatedAt = new Date(createdAt);
                            var formattedCreatedAt = moment(parsedCreatedAt).fromNow();
                            // Convert newline characters to <br> tags for the message
                            var formattedMessage = data.message.replace(/\r\n|\n/g, '<br>');
                            message_clone.find('.message').html('<p>' + formattedMessage +
                                '</p><span class="chat_time">' + formattedCreatedAt +
                                '</span>')
                        }
                        $('.chat_div').append(message_clone);
                    }
                    scrollToBottom();
                    $(".kt-avatar__cancel").click();
                }).fail(function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        if (errors.message) {
                            toastr.error(
                                "Do not share contact information or you will be banned..");
                        }
                    }
                    $("#send_message").prop("disabled",
                    false); // Re-enable the button in case of error
                });
            }

        });
    });

    function removeFile() {
        send_message = false;
        $("#image-upload1").val("");
        $("#video_preview").addClass("d-none");
    }

    function removeAudioFile() {
        send_message = false;
        $("#image-upload1").val("");
        $("#audio_preview").addClass("d-none");
    }

    function removeImageFile() {
        send_message = false;
        $("#image-upload1").val("");
        $("#image_previe_main").addClass("d-none");
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
    $(document).ready(function() {
        $('body').addClass('message-color');
    })
</script>
