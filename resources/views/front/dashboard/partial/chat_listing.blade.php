<?php
$auth_user = Auth::user();
$quoteFound = false;
?>
@if(isset($chats) && $chats->count() > 0)
    @foreach ($chats as $chat)
        <?php
        $latest_message = $chat->message_latest;
        $unreadCount = $chat->unread_count;
        $chat_history_url = route('front.message.history', $chat->id);
        $quote = collect($quotes_with_transporter)->where('quote.id', $chat->user_quote_id)->first();
        if($quote) {
            $quoteFound = true;
        }
        ?>
        @if($quote)
            <li class="@if($selected_chat_id == $chat->id) active @endif user_current_chat" data-id="{{$chat->id}}">
                @if(isset($auth_user) && !empty($auth_user))
                    <a href="javascript:;" class="chat_list_info unread_msg get-chat-history" onclick="getChatHistory('{{$chat_history_url}}',this)">
                        <div class="chat_list_info_fst">
                            <img src="{{$quote['quote']->image}}" alt="Car">
                            <div class="chat_msg">
                                <h6><span>{{$quote['quote']->vehicle_make}} {{$quote['quote']->vehicle_model}}</span>@if($chat->message_latest) - {{$chat->message_latest->message}} @endif</h6>
                                <h3>
                                    <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="4" cy="4" r="4" fill="#52D017"/>
                                    </svg>
                                    @if (in_array($chat->friend_id, array_keys($transporters_name)))
                                        {{ Str::limit($transporters_name[$chat->friend_id], 10) }}
                                    @else
                                        '-'
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
    $('.user_current_chat').on('click', function () {
        $('body').attr('id','messages');
        $('#user_current_chat_id').val($(this).data('id'));
    });
</script>