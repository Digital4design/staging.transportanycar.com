<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\WebController;
use App\Message;
use App\QuoteByTransporter;
use App\Services\EmailService;
use App\Thread;
use App\User;
use App\UserQuote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class MessageController extends WebController
{
    public $chat_obj;
    public $user_obj;
    public $thread_obj;

    public function __construct(EmailService $emailService)
    {
        $this->thread_obj = new Thread();
        $this->chat_obj = new Message();
        $this->user_obj = new User();
        $this->emailService = $emailService;
    }

    public function getChatHistory(Request $request, $id)
    {
        $user = Auth::user();
        $messages = collect();
        $thread = null;
        $quote_by_transporter_id = null;
        $transporter_username = null;
        if($id != 0){
            $thread = Thread::with(['user_qot', 'messages', 'messages.sender'])->where('id', '=', $id)->first();
            $quote_by_transporter = QuoteByTransporter::where(['user_quote_id' => $thread->user_quote_id, 'user_id'=> $thread->friend_id])->first();
            $transporter_username = User::where('id', $quote_by_transporter->user_id)->first()->username ?? null;
            $quote_by_transporter_id = $quote_by_transporter ? $quote_by_transporter->id : null;
            //$transporter_username = $quote_by_transporter ? $quote_by_transporter->getTransporters->username : null;
        
            if (!empty($thread)) {
                $firend_data = $this->user_obj->find($request->to);
                $thread->messages()->update(['status' => "read"]);
                $messages = $thread->messages->groupBy(function ($query) {
                    return $query->created_at->format('d-m-Y');
                });
            } 
        }
        return view('front.dashboard.partial.history_listing')->with(compact('messages', 'thread', 'quote_by_transporter_id', 'transporter_username'));
    }
    

    public function store(Request $request, $id)
    {
        $request->validate([
            'message' => [
                'required',
                'regex:/^[^\d]*$/', // Ensure no digits are present
            ],
        ]);
        $auth_user = Auth::User();
        $from_quote_id = $id;
        $user_current_chat_id = $request->user_current_chat_id;
        $isThreadExist = Thread::where(function ($q) use ($from_quote_id, $user_current_chat_id) {
            $q->where('user_quote_id', '=', $from_quote_id)
              ->where('id', '=', $user_current_chat_id);
        })->first();
        $thread_id = 0;
        if ($isThreadExist) {
            // Thread exists, update its status
            $thread_id = $isThreadExist->id;
            $isThreadExist->user_status = 'y'; // Update the thread's status
            $isThreadExist->save(); // Save the changes
        }  
        // else {
        //     $threads = Thread::createOrUpdate(['user_id' => $from_quote_id]);
        //     $thread_id = $threads->id;
        // }
        $message_type = "message";
        if ($request->hasFile('file')) {
            $message_type = "file";
        }
        $isThread = Thread::where('id', $thread_id)->first();
        $quoteByTransporter = QuoteByTransporter::where('user_quote_id', $from_quote_id)->where('user_id', $isThread->friend_id)->first();
        $transporter_user = null;
        if ($quoteByTransporter) {
            $transporter_user = $quoteByTransporter->getTransporters; // This will fetch the related User model
        }
        $message = Message::create([
            'threads_id' => $thread_id,
            'sender_id' => $auth_user->id,
            'receiver_id' => $transporter_user->id,
            'message' => $request->message ?? null,
            'type' => $message_type,
        ]);
        if ($request->hasFile('file')) {
            $message->file = $request->file('file')->store('uploads/messages');
            $message->file_type = ($request->file_type) ?? "image";
            $message->save();
        }
        if ($message) {
            $email_to = $transporter_user->email;
            $maildata['user'] = $auth_user;
            $maildata['thread'] = $isThread;
            $maildata['message'] = $request->message;
            $userQuote = UserQuote::where('id', $from_quote_id)->first();
            if($userQuote->status == 'completed') {
                $maildata['from_page'] = 'delivery';
                $maildata['quote_by_transporter_id'] = $quoteByTransporter->id;
            } else {
                $maildata['from_page'] = '';
            }
            $maildata['quotes'] = $userQuote;
            $htmlContent = view('mail.General.new-message-received', ['data' => $maildata])->render();
            $this->emailService->sendEmail($email_to, $htmlContent, 'You have a new message');
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
        $search = $request->search ?? "";
        $user = Auth::user();
        $user_id = $user->id;

        $quotes = UserQuote::where('user_id', $user_id)->get();
        $quotes_with_transporter = [];
        $transporters_name = [];

        foreach ($quotes as $quote) {
            $quote_by_trans = QuoteByTransporter::where('user_quote_id', $quote->id)->get();
            if($quote_by_trans) {
                foreach($quote_by_trans as $quote_by_tran) {
                    $transporters_name[$quote_by_tran->user_id] = User::where('id', $quote_by_tran->user_id)->first()->username??null;
                }
            }
            $quotes_with_transporter[] = [
                'quote' => $quote,
                //'transporter_name' => $transporter_name
            ];
        }
        $c_instance = $this->thread_obj->with(['message_latest', 'user_qot'])
            ->select("threads.*", 'u.username as user_name', 'u.profile_image', 'u.type as user_type')
            ->TotalUnreadMessageCount(0)
            ->leftJoin("users as u", 'u.id', '=', 'threads.user_id')
            ->where("is_active", "y")
            ->orderBy('last_msg_update_time', 'DESC');

        if (!empty($search)) {
            $c_instance->where(function ($query) use ($search) {
                $query->where("u.name", 'like', '%' . $search . '%')
                    ->orWhereHas('user_qot', function ($q) use ($search) {
                        $q->whereRaw('(vehicle_make like "%' . $search . '%")')
                            ->orWhereRaw('(vehicle_model like "%' . $search . '%")');
                    })
                    ->orWhereHas('messages', function ($q) use ($search) {
                        $q->whereRaw('(message like "%' . $search . '%")');
                    });
            });
        }

        $chats = $c_instance->get();
        $latest_chat = $chats->first();

        return view('front.dashboard.partial.chat_listing')->with(compact('chats', 'user', 'latest_chat', 'selected_chat_id', 'quotes_with_transporter','transporters_name'));
    }


    public function QuoteSendMessage(Request $request)
    {
        if(isset($request->form_page) && $request->form_page == 'quote') {
            $request->validate([
                'message' => [
                    'required',
                    'regex:/^[^\d]*$/', // Ensure no digits are present
                ],
            ]);
        }
        $user = Auth::guard('web')->user();        
        $thread = Thread::where('friend_id',$request->transporter_id)
            ->where('user_id', $user->id)
            ->where('user_quote_id', $request->user_quote_id)
            ->first();
        if (!$thread) {
            $thread = new Thread();
            $thread->user_id = $request->user_quote_id;
            $thread->friend_id = $user->id;
            $thread->user_quote_id = $request->user_quote_id;
            $thread->last_msg_update_time = now();
            $thread->save();
        }

        $thread_id = $thread->id ?? 0;
        $message = Message::create([
            'threads_id' => $thread_id,
            'sender_id' => $user->id,
            'receiver_id' => $request->transporter_id,
            'message' => $request->message ?? null,
            'type' => "message",
        ]);
        if ($message) {
            try {
                $transporter = User::where('id', $request->transporter_id)->first();
                $email_to = $transporter->email;
                $maildata['user'] = $user;
                $maildata['thread'] = $thread;
                $maildata['message'] = $request->message;
                $maildata['from_page'] = $request->form_page;
                $my_quote = QuoteByTransporter::where('user_quote_id', $request->user_quote_id)->first();
                $quotes = UserQuote::where('id', $request->user_quote_id)->first();
                $maildata['quotes'] = $quotes;
                $maildata['quote_by_transporter_id'] = $my_quote->id;
                $htmlContent = view('mail.General.new-message-received', ['data' => $maildata])->render();
                $this->emailService->sendEmail($email_to, $htmlContent, 'You have a new message');
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
            $thread->messages()->update(['status' => "read"]);
            $messages = $thread->messages->groupBy(function ($query) {
                return $query->created_at->format('d-m-Y');
            });

            // Fetch total message count for all threads of the logged-in user
            $threads = Thread::where(['user_id' => $user->id, 'user_quote_id' => $thread->user_qot->id])->get();
            if ($threads->isNotEmpty()) {
                $messageCounts = $threads->mapWithKeys(function ($thread) {
                    return [$thread->id => $thread->messages->count()];
                });
            }
        } else {
            $messages = collect();
            $messageCounts = collect();
        }
        if($request->from_page == 'delivery') {
            $view = view('front.dashboard.partial.delivery_chat_history', compact('messages', 'thread', 'user'))->render();
        } 
        else {
            $view = view('front.dashboard.partial.quote_history_listing', compact('messages', 'thread', 'user'))->render();
        }
        return response()->json([
            'html' => $view,
            'messageCounts' => $messageCounts,
        ]);
    }
}
