<?php
$user = $thread->user ? $thread->user : null;
$auth_user = Auth::user();
?>
@if(isset($user) && !empty($user))
    @if(isset($messages) && $messages->count() > 0)
        @foreach ($messages as $date=>$message_date)
            @foreach ($message_date as $message)
                <?php
                $sender_user = $message->sender;
                ?>
                @if($user->id == $message->sender_id)
                    <h5><b>You</b> sent on {{ \Carbon\Carbon::parse($message->created_at)->format('d/m') }} {{carbon\carbon::parse($message->created_at)->diffForHumans()}}</h5>
                    <p>{{$message->message}}</p>
                    <br>
                @else
                    <h5><b>{{$sender_user->username}}</b> sent on {{ \Carbon\Carbon::parse($message->created_at)->format('d/m') }} {{carbon\carbon::parse($message->created_at)->diffForHumans()}}</h5>
                    <p>{{$message->message}}</p>
                    <br>
                @endif
            @endforeach
        @endforeach
    @endif
@endif
