<?php

namespace App\Http\Controllers\Transporter;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebController;
use App\Message;
use App\QuoteByTransporter;
use App\Services\EmailService;
use App\Thread;
use App\User;
use App\UserQuote;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Services\SmsService;
use App\TransactionHistory;

class MessageController extends WebController
{
    public $chat_obj;
    public $user_obj;
    public $thread_obj;
    public $sendSMS;

    public function __construct(EmailService $emailService)
    {
        $this->thread_obj = new Thread();
        $this->chat_obj = new Message();
        $this->user_obj = new User();
        $this->emailService = $emailService;
        $this->sendSMS = new SmsService;
    }

    public function getChatHistory(Request $request, $id)
    {
        $thread = Thread::with(['user_qot', 'messages', 'messages.sender'])->where('id', '=', $id)->first();
        $quote_by_transporter = QuoteByTransporter::where(['user_quote_id' => $thread->user_quote_id, 'user_id'=> $thread->friend_id])->first();
        $transaction = TransactionHistory::where('quote_by_transporter_id',$quote_by_transporter->id)->where('status','completed')->exists() ? "true":"false";
        if (!empty($thread)) {
            $firend_data = $this->user_obj->find($request->to);
            $thread->messages()->update(['status' => "read"]);
            $messages = $thread->messages->groupBy(function ($query) {
                return $query->created_at->format('d-m-Y');
            });
        } else {
            $messages = collect();
        }
        return view('transporter.dashboard.partial.history_listing')->with(compact('messages', 'thread','transaction'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'message' => [
                'required',
                $request->check !== "true" ? 'regex:/^[^\d]*$/' : 'nullable',
                // 'regex:/^[^\d]*$/', // Ensure no digits are present
            ],
        ]);
        $auth_user = Auth::user();
        $from_quote_id = $id;
        $current_chat_id = $request->current_chat_id;
        
        $isThreadExist = Thread::where(function ($q) use ($from_quote_id, $current_chat_id) {
            $q->where('user_quote_id', '=', $from_quote_id)
              ->where('id', '=', $current_chat_id);
        })->first();
        $thread_id = 0;
        if ($isThreadExist) {
            // Thread exists, update its status
            $thread_id = $isThreadExist->id;
            $isThreadExist->user_status = 'y'; // Update the thread's status
            $isThreadExist->save(); // Save the changes
        }  
        // else {
        //     $threads = Thread::createOrUpdate(['user_id' => $from_user_id]);
        //     $thread_id = $threads->id;
        // }
        $message_type = "message";
        if ($request->hasFile('file')) {
            $message_type = "file";
        }
        $isThread = Thread::where('id', $thread_id)->first();
        $userQuote = UserQuote::where('id', $from_quote_id)->first();
        $customer_user = $userQuote->user;
        $message = Message::create([
            'threads_id' => $thread_id,
            'sender_id' => $auth_user->id,
            'receiver_id' => $customer_user->id,
            'message' => $request->message ?? null,
            'type' => $message_type,
        ]);
        if ($request->hasFile('file')) {
            $message->file = $request->file('file')->store('uploads/messages');
            $message->file_type = ($request->file_type) ?? "image";
            $message->save();
        }
        if ($message) {
            try {
                $subject= 'You Have a Message from ' . ($auth_user->username ?? 'User') . ' Regarding ' . ($userQuote->vehicle_make ?? '') . ' ' . ($userQuote->vehicle_model ?? '') . ' Delivery.';

                if($customer_user->job_email_preference) {
                    $email_to = $customer_user->email;
                    $maildata['user'] = $auth_user;
                    $maildata['thread'] = $isThread;
                    $maildata['message'] = $request->message;
                    if($userQuote->status == 'pending'){
                        $maildata['from_page'] = 'quotes_admin';
                        
                    } else if($userQuote->status == 'completed') {
                        $maildata['from_page'] = 'delivery_admin';
                    } else {
                        $maildata['from_page'] = 'message_admin';
                    }
                  
                    $maildata['quotes'] = $userQuote;
                    $maildata['quote_id'] = $from_quote_id;
                    $maildata['type'] = 'user';
                    $maildata['url'] =  route('front.manage_notification');
                    
                    $htmlContent = view('mail.General.new-message-received', ['data' => $maildata, 'thread_id' => $thread_id])->render();
                    $this->emailService->sendEmail($email_to, $htmlContent,  $subject);

                    // Call create_notification to notify the user
                    create_notification(
                        $customer_user->id, 
                        $auth_user->id,
                        $from_quote_id,       
                        'New message',
                        'You have received a message from '.$auth_user->username,  // Message of the notification
                        'message',
                        $thread_id
                    );
                } else {
                    Log::info('User with email ' . $customer_user->email . ' has opted out of receiving emails. Message email not sent.');
                }
                if($customer_user->mobile && $customer_user->user_sms_alert > 0)
                {
                    $smS = "Transport Any Car: New message from $auth_user->username to deliver your $userQuote->vehicle_make $userQuote->vehicle_model. \n\n".request()->getSchemeAndHttpHost()."/messages \n\n"." ".request()->getSchemeAndHttpHost()."/manage_notification";
                    $this->sendSMS->sendSms($customer_user->mobile,$smS);
                }
            } 
            catch (\Exception $ex) {
                    Log::error('Error sending email: ' . $ex->getMessage());
            }
            return response()->json(['status' => "success", "data" => $message]);
        } else {
            return response()->json(['status' => "error", "data" => []]);
        }
    }

    public function totalUnreadMessage()
    {

        $total_unread_chat = totalUnreadMessage();

        return response()->json(['status' => "success", "data" => $total_unread_chat]);
    }

    public function getChatList(Request $request)
    {
        $selected_chat_id = $request->selected_chat_id ?? 0;
        $search = ($request->search) ?? "";
        $user = Auth::user();
        $user_id = $user->id;
        $front_user=array();
        $my_quotes = QuoteByTransporter::where('user_id', $user_id)->get();
        $quotes = UserQuote::whereIn('id', $my_quotes->pluck('user_quote_id'))->where('created_at', '>=', Carbon::now()->subDays(10))->get();
        foreach ($quotes as $quote) {
            // $existingThread = Thread::where('friend_id', $quote->user_id)
            //     ->where('user_id', $user_id)
            //     ->where('user_quote_id', $quote->id)
            //     ->first();
            // Check if a thread already exists using the new condition format
            $existingThread = Thread::where(function ($q) use ($quote, $user_id) {
                $q->where(function ($q1) use ($quote, $user_id) {
                    $q1->where('user_id', '=', $user_id)
                    ->where('friend_id', '=', $quote->user_id);
                })->orWhere(function ($q2) use ($quote, $user_id) {
                    $q2->where('user_id', '=', $quote->user_id)
                    ->where('friend_id', '=', $user_id);
                });
            })->where('user_quote_id', '=', $quote->id)
            ->first();
            if (!$existingThread) {
                $thread = new Thread();
                $thread->user_id = $user_id;
                $thread->friend_id = $quote->user_id;
                $thread->user_quote_id = $quote->id;
                $thread->last_msg_update_time = now();
                $thread->save();
            }
            $front_user[$quote->user_id] = User::where('id',$quote->user_id)->first();
        }

        $c_insatnce = $this->thread_obj->with(['message_latest'])->select("threads.*", 'u.name as user_name', 'u.profile_image', 'u.type as user_type')->TotalUnreadMessageCount(0)
            ->leftJoin("users as u", 'u.id', '=', 'threads.user_id')
            ->where("is_active", "y")
            ->where('threads.friend_id', $user_id)
            ->orderBy('last_msg_update_time', 'DESC');

        if (!empty($search)) {
            $c_insatnce->where(function ($query) use ($search) {
                $query->where("u.name", 'like', '%' . $search . '%');
                $query->orWhereHas('user_qot', function ($q) use ($search) {
                    $q->whereRaw('(vehicle_make like "%' . $search . '%")')
                        ->orWhereRaw('(vehicle_model like "%' . $search . '%")');
                });
                $query->orWhereHas('messages', function ($q) use ($search) {
                    $q->whereRaw('(message like "%' . $search . '%")');
                });
            });
        }

        $chats = $c_insatnce->get();

        // $chats = $this->chat_obj->select('messages.*','f.name','f.id as user_id','f.profile_image')
        //     //->select(DB::raw("select count(cm.from_user) from chat_messages as cm where cm.from_user_id = chat_messages.from_user_id group by  as unread_message"))
        //     ->leftJoin('users as f','f.id','=','chat_messages.from_user_id')
        //     ->where('to_user_id', '=', $user_id)
        //     ->OrderBy('total_unread','DESC')
        //     ->groupBy('from_user_id')
        //     ->get();
        $latest_chat = $chats->first();
        return view('transporter.dashboard.partial.chat_listing')->with(compact('chats', 'user', 'latest_chat', 'quotes', 'selected_chat_id','front_user'));
    }

    public function QuoteSendMessage(Request $request)
    {
       
        $user = Auth::user();
        $friend_id = $request->user_id ?? 0;
        $quoteId = $request->user_quote_id;
        $thread = Thread::where(function ($q) use ($friend_id) {
            $q->where('user_id', '=', $friend_id)
            ->orWhere('friend_id', '=', $friend_id);
        })->where(function ($q) use ($user) {
            $q->where('user_id', '=', $user->id)
            ->orWhere('friend_id', '=', $user->id);
        })->where('user_quote_id', '=', $quoteId)
        ->first();
        if (!$thread) {
            $thread = Thread::create([
                'user_id' => $friend_id,
                'friend_id' => $user->id,
                'user_quote_id' => $request->user_quote_id,
                'last_msg_update_time' => date('Y-m-d H:i:s'),
            ]);
        }

        $thread_id = $thread->id ?? 0;
        $message = Message::create([
            'threads_id' => $thread->id,
            'sender_id' => $user->id,
            'receiver_id' => $friend_id,
            'message' => $request->message ?? null,
            'type' => "message",
        ]);
        if ($message) {
            try {
               
                $customer_user = User::where('id', $friend_id)->first();
                $quote_id= QuoteByTransporter::where('user_quote_id',$request->user_quote_id)->where('user_id',$user->id)->first();
                if($customer_user->job_email_preference) {
                    $email_to = $customer_user->email;
                    $maildata['user'] = $user;
                    $maildata['thread'] = $thread;
                    $maildata['message'] = $request->message;
                    $maildata['from_page'] = $request->form_page;
                    $maildata['quote_id'] = $quote_id->id;
                    $quotes = UserQuote::where('id', $request->user_quote_id)->first();
                    $maildata['quotes'] = $quotes;
                    $maildata['type'] = 'user';
                    $maildata['url'] =  route('front.manage_notification');
                    $htmlContent = view('mail.General.new-message-received', ['data' => $maildata, 'thread_id' => $thread_id])->render();
                    $this->emailService->sendEmail($email_to, $htmlContent, 'You have a new message');

                    // Call create_notification to notify the user
                    create_notification(
                        $customer_user->id, 
                        $user->id,
                        $request->user_quote_id,       
                        'New message',
                        'You have received a message from '.$user->username.' for '.$quotes->vehicle_make.' '.$quotes->vehicle_model.' delivery. ',  // Message of the notification
                        'message',
                        $thread_id
                    );
                } else {
                    Log::info('User with email ' . $customer_user->email . ' has opted out of receiving emails. Message email not sent.');
                }
                if($customer_user->mobile && $customer_user->user_sms_alert > 0)
                {
                    $smS = "Transport Any Car: New message from $auth_user->username to deliver your $quotes->vehicle_make $quotes->vehicle_model. \n\n".request()->getSchemeAndHttpHost()."/messages \n\n"." ".request()->getSchemeAndHttpHost()."/manage_notification";
                    $this->sendSMS->sendSms($customer_user->mobile,$smS);
                }
            } 
            catch (\Exception $ex) {
                    Log::error('Error sending email: ' . $ex->getMessage());
            }
            return response()->json(['status' => "success", "data" => $message, "thread" => $thread]);
        } else {
            return response()->json(['status' => "error", "data" => []]);
        }
    }

    public function getQuoteChatHistory(Request $request, $id)
    {
        $user = Auth::user();
        $thread = Thread::with(['user_qot', 'messages', 'messages.sender'])->where('id', '=', $id)->first();
        if (!empty($thread)) {
            $firend_data = $this->user_obj->find($request->to);
            //dd($firend_data);
            $thread->messages()->update(['status' => "read"]);
            $messages = $thread->messages->groupBy(function ($query) {
                return $query->created_at->format('d-m-Y');
            });
            $totalMessageCount = $thread->messages->count();
        } else {
            $messages = collect();
            $totalMessageCount = 0;
        }
        $view = view('transporter.dashboard.partial.delivery_chat_history', compact('messages', 'thread', 'user','totalMessageCount'))->render();
        return response()->json([
            'html' => $view,
            'totalmessagecount' => $totalMessageCount,
        ]);
    }
}