<?php

namespace App;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->SimpleDetails();
    }

    public function quote()
    {
        return $this->belongsTo(UserQuote::class, 'user_quote_id', 'id');
    }

    public function friend()
    {
        return $this->belongsTo(User::class, 'friend_id', 'id')->SimpleDetails();
    }

    public function message_latest()
    {
        return $this->hasOne(Message::class,"threads_id")->latest();
    }

    public function unread_message()
    {
        return $this->hasMany(Message::class,"threads_id")->where('status', 'unread');
    }

    public function user_qot()
    {
        return $this->belongsTo(UserQuote::class, 'user_quote_id', 'id');
    }


    public function messages()
    {
        return $this->hasMany(Message::class, 'threads_id');
    }
    // public function jobInfo_messages()
    // {
    //     return $this->hasMany(Message::class, 'threads_id')->where('friend_id', auth()->id());
    // }

    public static function get_thread_id($user_id_1 = 0, $user_id_2 = 0)
    {
        $isThreadExist = Thread::where(function ($q) use ($user_id_1) {
            $q->where('user_id', '=', $user_id_1)
                ->orWhere('friend_id', '=', $user_id_1);
        })->where(function ($q) use ($user_id_2) {
            $q->where('user_id', '=', $user_id_2)
                ->orWhere('friend_id', '=', $user_id_2);
        })->first();
        return (!is_null($isThreadExist)) ? (string)$isThreadExist->id : "0";
    }

    public function scopeTotalUnreadMessageCount($query, $receiver_id = 0)
    {
        $query->selectRaw("(select COUNT(*) from messages where threads_id=threads.id and status='unread' and receiver_id='" . $receiver_id . "') as unread_count");
    }
}
