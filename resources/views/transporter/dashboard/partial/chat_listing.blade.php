<?php
$auth_user = Auth::user();
$quoteFound = false;
?>
@if(isset($chats) && $chats->count() > 0)
    @foreach ($chats as $chat)
        <?php
        $latest_message = $chat->message_latest;
        $unreadCount = $chat->unread_count;
        $chat_history_url = route('transporter.message.history',$chat->id);
        $quote = $quotes->where('id', $chat->user_quote_id)->first();
        if($quote) {
            $quoteFound = true;
        }
        ?>
        @if($quote)
            <li class="@if($selected_chat_id == $chat->id) active @endif trans_current_chat" data-id="{{$chat->id}}">
                @if(isset($auth_user) && !empty($auth_user))
                    <a href="javascript:;" class="chat_list_info unread_msg get-chat-history" onclick="getChatHistory('{{$chat_history_url}}',this)">
                        <div class="chat_list_info_fst">
                            <img src="{{$quote->image}}" alt="Car">
                            <div class="chat_msg">
                                <h6><span>{{$quote->vehicle_make}} {{$quote->vehicle_model}}</span>@if($chat->message_latest) -{{ Str::limit($chat->message_latest->message, 50) }} @endif</h6>
                                <h3>
                                    <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="4" cy="4" r="4" fill="#52D017"/>
                                    </svg>
                                    @if (isset($front_user[$chat->user_id]) && in_array($chat->user_id, array_keys($front_user)))
                                        {{ Str::limit($front_user[$chat->user_id]['username'], 10) }}
                                    @endif

                                </h3>
                                @if($chat->message_latest)
                                    <p>{{$chat->message_latest->message}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="chat_list_info_lst">
                            <span>{{Carbon\Carbon::parse($chat->last_msg_update_time)->diffForHumans()}}</span>
                        </div>
                    </a>
                @endif
            </li>
        @endif
    @endforeach
    @if(!$quoteFound)
        <div class="get-chat-history text-left px-3 py-2">-Currently none to show-</div>
    @endif
@else
    <div class="get-chat-history text-left px-3 py-2">-Currently none to show-</div>
@endif
<script src="{{asset('assets/web/js/admin.js')}}"></script>
<script>
    $('.trans_current_chat').on('click', function (){
        $('body').attr('id', 'messages');
        $('#trans_current_chat_id').val($(this).data('id'));
    });
</script>
