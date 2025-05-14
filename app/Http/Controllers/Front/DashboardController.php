<?php

namespace App\Http\Controllers\Front;

use App\Feedback;
use App\Http\Controllers\WebController;
use App\Message;
use App\QuoteByTransporter;
use App\QuotationDetail;
use App\Thread;
use App\User;
use App\UserQuote;
use App\CompanyDetail;
use App\Notification;
use App\TransactionHistory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use PDF;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class DashboardController extends WebController
{

    public $chat_obj;
    public $user_obj;
    public $thread_obj;

    public function __construct()
    {
        $this->thread_obj = new Thread();
        $this->chat_obj = new Message();
        $this->user_obj = new User();
    }

    public function dashboard()
    {

        $title = 'Dashboard';
        $user_data = Auth::guard('web')->user();
        // save last visit time of transporter
        $user_data->last_visited_at = now();
        $user_data->save();

        // Subquery to get quotes count and lowest bid
        $subQuery = DB::table('quote_by_transpoters')
            ->select('user_quote_id', DB::raw('COUNT(*) as quotes_count'), DB::raw('MIN(price) as lowest_bid'))
            ->where('status', 'pending')
            ->groupBy('user_quote_id');

        $quotes = UserQuote::with('notification_thread')
            ->where('user_id', $user_data->id)
            ->whereNotIn('status', ['completed', 'cancelled'])
            ->whereRaw('DATE_ADD(user_quotes.created_at, INTERVAL 10 DAY) >= ?', [Carbon::today()->toDateString()])
            ->leftJoinSub($subQuery, 'sub', function ($join) {
                $join->on('user_quotes.id', '=', 'sub.user_quote_id');
            })
            ->select('user_quotes.*', 'sub.quotes_count', 'sub.lowest_bid')
            ->latest()
            ->get();
        //  dd($quotes);

        $subQuery1 = \DB::table('quote_by_transpoters')
            ->select('user_quote_id', \DB::raw('COUNT(*) as quotes_count'), \DB::raw('MIN(price) as lowest_bid'))
            ->whereIn('status', ['pending', 'accept'])  // Add this line to filter by status
            ->groupBy('user_quote_id');

        $quotes_booked = UserQuote::where('user_id', $user_data->id)
            ->where('status', 'completed')
            ->where('is_mark_as_complete', 'no')
            ->whereHas('quoteByTransporter', function ($query) {
                $query->where('status', 'accept');
            })
            ->with(['quoteByTransporter' => function ($query) {
                $query->where('status', 'accept');
            }])
            ->joinSub($subQuery1, 'sub', function ($join) {
                $join->on('user_quotes.id', '=', 'sub.user_quote_id');
            })
            ->select('user_quotes.*', 'sub.quotes_count', 'sub.lowest_bid')
            ->get();
        // return $quotes;
        return view('front.dashboard.index', [
            'title' => $title,
            'data' => $quotes,
            'quotes_booked' => $quotes_booked,
        ]);
    }

    public function updateQuoteImage(Request $request)
    {
        $user_data = Auth::guard('web')->user();
        $thumb_upload = upload_base_64_img($request->image, get_constants('upload_paths.quote'));
        if ($thumb_upload) {
            $quote = UserQuote::where(['id' => $request->item_id, 'user_id' => $user_data->id])->first();
            un_link_file($quote->image);
            $quote->image = $thumb_upload;
            $quote->save();
            if ($request->ajax()) {
                return response()->json(['success' => true, 'message' => 'Quote image upload successfully']);
            }
        }
        return response()->json(['success' => false, 'message' => 'something went wrong please try again']);
    }

    public function pastDeliveries()
    {
        $title = 'Past Deliveries';
        $user_data = Auth::guard('web')->user();
        // Fetching booked quotes with related transporter data
        $quotes_booked = UserQuote::where(['user_id' => $user_data->id])
            ->whereIn('status', ['completed'])
            ->where('is_mark_as_complete', 'yes')
            ->latest()
            ->with('quoteByTransporter')
            ->get();

        // Fetching cancelled quotes
        // $quotes_cancelled = UserQuote::where(['user_id' => $user_data->id])
        //     ->whereIn('status', ['cancelled'])
        //     ->latest()
        //     ->get();
        $quotes_cancelled = UserQuote::select('user_quotes.*', \DB::raw('IFNULL(quote_counts.quotation_count, 0) as quotation_count'))
            ->leftJoinSub(function ($query) {
                $query->select('user_quote_id', \DB::raw('COUNT(*) as quotation_count'))
                    ->from('quote_by_transpoters')
                    ->groupBy('user_quote_id');
            }, 'quote_counts', function ($join) {
                $join->on('user_quotes.id', '=', 'quote_counts.user_quote_id');
            })
            ->where(['user_quotes.user_id' => $user_data->id])
            ->whereIn('user_quotes.status', ['cancelled'])
            ->latest()
            ->get();
        // Passing data to the view
        return view('front.dashboard.past_deliveries', [
            'title' => $title,
            'quotes_booked' => $quotes_booked,
            'quotes_cancelled' => $quotes_cancelled,
        ]);
    }
    public function account()
    {
        $title = 'Account';
        return view('front.dashboard.account', ['title' => $title]);
    }
    public function quoteRenew(Request $request, $id)
    {

        $quote = UserQuote::find($id);
        //  return    $quote;
        $quoteData = [
            'user_id' => $quote->user_id,
            'pickup_postcode' => $quote->pickup_postcode,
            'pickup_lat' => $quote->pickup_lat,
            'pickup_lng' => $quote->pickup_lng,
            'drop_postcode' => $quote->drop_postcode,
            'drop_lat' => $quote->drop_lat,
            'drop_lng' => $quote->drop_lng,
            'distance' => $quote->distance,
            'duration' => $quote->duration,
            'vehicle_make' => $quote->vehicle_make ?? null,
            'vehicle_model' => $quote->vehicle_model ?? null,
            'starts_drives' => $quote->starts_drives ?? '0',
            'image' => $quote->image === url('uploads/no_quote.png') ? null : $quote->image,
            'vehicle_make_1' => $quote->vehicle_make_1 ?? null,
            'vehicle_model_1' => $quote->vehicle_model_1 ?? null,
            'starts_drives_1' => $quote->starts_drives_1 ?? null,
            'image_1' => $quote->image_1  === url('uploads/no_quote.png') ? null : $quote->image_1,
            'map_image' => $quote->map_image,
            'created_at' => $now = Carbon::now('Europe/London'),
            'updated_at' => $now = Carbon::now('Europe/London'),
            'how_moved' => $quote->how_moved ?? null,
            'delivery_timeframe_from' => $quote->delivery_timeframe_from ? (\DateTime::createFromFormat('d/m/Y', $quote->delivery_timeframe_from) ? \DateTime::createFromFormat('d/m/Y', $quote->delivery_timeframe_from)->format('Y-m-d') : null) : null,
            'delivery_timeframe' => $quote->delivery_timeframe ?? null,
            'email' => $quote->email ?? null,
        ];


        // return $quote;
        if ($quoteData) {
            // Update the record
            UserQuote::create($quoteData);
            // return redirect()->route('front.dashboard')->with('success', 'Quote updated successfully!');
            // Update the record
            UserQuote::destroy($id);

            // Redirect to the dashboard after a successful update
            return redirect()->route('front.dashboard')->with('success', 'Quote updated successfully!');
        }
    }

    public function profile(Request $request)
    {

        $user_data = Auth::guard('web')->user();
        $user_data->last_visited_at = now();
        $user_data->save();
        // return $user_data->getAuthPassword();
        $request->validate([
            'email' => ['required', 'email', Rule::unique('users')->ignore($user_data->id)->whereNull('deleted_at')],
            'opassword' => ['required'],
            // 'npassword' => ['required'],
            // 'cpassword' => [ 'same:npassword'],
        ], [
            'opassword.exists' => __('admin.change_password_not_match'),
            'cpassword.same' => __('admin.change_password_not_same'),
        ]);

        if ($request->opassword == $user_data->getAuthPassword()) {
            if ($request->npassword == '') {
                $is_update = $user_data->update(['email' => $request->email]);
                if ($is_update) {
                    success_session(__('admin.chang_profile_updated'));
                } else {
                    error_session(__('admin.chang_fail_to_update'));
                }
            } else {
                $is_update = $user_data->update(['password' => $request->npassword, 'email' => $request->email]);
                if ($is_update) {
                    success_session(__('admin.chang_profile_updated'));
                } else {
                    error_session(__('admin.chang_fail_to_update'));
                }
            }
        } else {
            error_session(__('admin.change_password_not_match'));
        }
        return redirect()->back();
    }

    public function updateProfileImage(Request $request)
    {
        $user_data = Auth::guard('web')->user();
        $thumb_upload = upload_base_64_img($request->image, get_constants('upload_paths.user_profile_image'));
        if ($thumb_upload) {
            un_link_file($user_data->profile_image);
            $user_data->profile_image = $thumb_upload;
            $user_data->save();
            if ($request->ajax()) {
                return response()->json(['success' => true, 'message' => 'Profile image upload successfully']);
            }
        }
        return response()->json(['success' => false, 'message' => 'something went wrong please try again']);
    }

    public function markAsCompleteQuote(Request $request)
    {
        $user_data = Auth::guard('web')->user();
        $quote = UserQuote::where('id', $request->quote_id)->first();
        if ($quote) {
            $quote->is_mark_as_complete = 'yes';
            $quote->save();
            if ($request->ajax()) {
                return response()->json(['success' => true, 'message' => 'Mark as completed successfully']);
            }
        }
        return response()->json(['success' => false, 'message' => 'something went wrong please try again']);
    }


    public function updateEmailPreference(Request $request)
    {
        $user = Auth::guard('web')->user();
        if ($user) {
            if ($user->type === 'user') {
                $status = $user->update(['job_email_preference' => $request->value]);
                if ($status) {
                    return response()->json(['status' => true, 'message' => 'Preference updated successfully.']);
                } else {
                    return response()->json(['status' => false, 'message' => 'Failed to update preference.']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'User type is not valid for this action.']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'User not authenticated.']);
        }
    }

    public function feedbackView($quote_id)
    {
        $quote = QuoteByTransporter::where('id', $quote_id)->first();
        $params = $this->get_transporter_feedback($quote->user_id);
        // return $params;
        return view('front.dashboard.feedback_view', $params)->with('quote', $quote);
    }


    public function feedback_listing($transporter_id)
    {
        // $my_quotes = QuoteByTransporter::where('user_id', $transporter_id)->pluck('id');
        // $all_feedbacks = Feedback::whereIn('quote_by_transporter_id', $my_quotes)->get();
        // $feedbacks = Feedback::whereIn('quote_by_transporter_id', $my_quotes)->paginate(10);
        // return"yesssssssssssss";
        $all_feedbacks = Feedback::where('transporter_id', $transporter_id)
            ->where('quote_by_transporter_id', null)
            ->get();

        $feedbacks = Feedback::where('transporter_id', $transporter_id)
            ->where('quote_by_transporter_id', null)
            ->paginate(10);

        $total_feedbacks = $all_feedbacks->count(); // Correct total count

        // Calculate rating percentages
        $ratings = collect([5, 4, 3, 2, 1])->mapWithKeys(function ($rating) use ($all_feedbacks, $total_feedbacks) {
            $count = $all_feedbacks->where('rating', $rating)->count();
            $percentage = $total_feedbacks > 0 ? round(($count / $total_feedbacks) * 100, 1) : 0;
            return ['star_' . $rating  =>  $percentage];
        });

        // Ensure total percentage sums exactly to 100%
        $totalPercentage = array_sum($ratings->toArray());

        if ($totalPercentage !== 100) {
            $difference = 100 - $totalPercentage; // Calculate how much to adjust

            // Find the largest rating percentage to adjust it
            $highestKey = collect($ratings)->sortDesc()->keys()->first();

            // Apply adjustment while preventing negative values
            if (isset($ratings[$highestKey])) {
                $ratings[$highestKey] = max(0, $ratings[$highestKey] + $difference);
            }
        }

        // Calculate the average rating
        $average_rating = $total_feedbacks > 0 ? round($all_feedbacks->avg('rating'), 1) : 0;

        // Render the feedback listing view
        $params['html'] = view('front.dashboard.partial.feedback_listing', compact('feedbacks', 'ratings', 'average_rating'))->render();

        return response()->json(['success' => true, 'message' => 'Job find successfully', 'data' => $params]);
    }

    private function get_transporter_feedback($transporter_id)
    {
        $user_data = user::find($transporter_id);
        // $quoteBytransporter = QuoteByTransporter::where('user_id', $user_data->id)->get();
        // $userQuote = UserQuote::whereIn('id', $quoteBytransporter->pluck('user_quote_id'))->get();
        // $total_distance = UserQuote::whereIn('id', $quoteBytransporter->where('status', 'accept')->pluck('user_quote_id')->toArray())
        //     ->sum('distance');
        // $totalDistance = $total_distance >= 1000 ? round($total_distance / 1000, 1) . 'K' : round($total_distance, 1);
        // $my_quotes = $quoteBytransporter->pluck('id');
        // $quotes = TransactionHistory::whereIn('quote_by_transporter_id', $my_quotes)->get();
        // $totalDistanceFormatted =  number_format((float)$totalDistance, 0);;
        // $completedCount = $userQuote->where('status', 'completed')->count();

        // $total_earning = $quoteBytransporter->where('status', 'accept')->whereIn('user_quote_id', $userQuote->where('status', 'completed')->pluck('id')->toArray())->sum('transporter_payment');

        // $totalDistanceFormatted = $total_distance >= 1000
        //     ? round($total_distance / 1000, 1) . 'K'
        //     : number_format($total_distance, 1);


        $rating_average = Feedback::where('transporter_id', $transporter_id)->where('quote_by_transporter_id', null)
            // ->whereNotNull('rating')
            ->avg('rating');
        // return $rating_average;
        $percentage = 0;
        if ($rating_average !== null) {
            $percentage = ($rating_average / 5) * 100;
        }

        $company_details = CompanyDetail::where('user_id', $transporter_id)->first();

        $params['user'] = $user_data;
        $params['feedback'] = Feedback::where('transporter_id', $transporter_id)->where('quote_by_transporter_id', null)->get();
        $params['completed_job'] =  $user_data->completed_job;
        // $params['distance'] = $totalDistanceFormatted;
        $params['company_details'] = $company_details;
        $params['rating_percentage'] = $percentage;
        $params['rating_average']  = $rating_average;


        // $customRequest = new Request([
        //     'type' => 'feedback'
        // ]);

        // Call notificationStatus with the custom request
        // $this->notificationStatus($customRequest);
        return $params;
    }


    // private function get_transporter_feedback($transporter_id)
    // {
    //     $user_data = user::find($transporter_id);
    //     $quoteBytransporter = QuoteByTransporter::where('user_id', $user_data->id)->get();
    //     $userQuote = UserQuote::whereIn('id', $quoteBytransporter->pluck('user_quote_id'))->get();
    //     $total_distance = UserQuote::whereIn('id', $quoteBytransporter->where('status', 'accept')->pluck('user_quote_id')->toArray())
    //         ->sum('distance');
    //     $totalDistance = $total_distance >= 1000 ? round($total_distance / 1000, 1) . 'K' : round($total_distance, 1);
    //     $my_quotes = $quoteBytransporter->pluck('id');
    //     $quotes = TransactionHistory::whereIn('quote_by_transporter_id', $my_quotes)->get();
    //     // $totalDistanceFormatted =  number_format((float)$totalDistance, 0);;
    //     $completedCount = $userQuote->where('status', 'completed')->count();

    //     $total_earning = $quoteBytransporter->where('status', 'accept')->whereIn('user_quote_id', $userQuote->where('status', 'completed')->pluck('id')->toArray())->sum('transporter_payment');

    //     $totalDistanceFormatted = $total_distance >= 1000
    //         ? round($total_distance / 1000, 1) . 'K'
    //         : number_format($total_distance, 1);


    //     $rating_average = Feedback::whereIn('quote_by_transporter_id', $my_quotes)
    //         ->whereNotNull('rating')
    //         ->avg('rating');
    //     $percentage = 0;
    //     if ($rating_average !== null) {
    //         $percentage = ($rating_average / 5) * 100;
    //     }

    //     $company_details = CompanyDetail::where('user_id', $transporter_id)->first();

    //     $params['user'] = $user_data;
    //     $params['feedback'] = Feedback::whereIn('quote_by_transporter_id', $my_quotes)->with('quote_by_transporter.quote')->get();
    //     $params['completed_job'] =  $completedCount;
    //     $params['distance'] = $totalDistanceFormatted;
    //     $params['total_earning'] = $total_earning;
    //     $params['company_details'] = $company_details;
    //     $params['rating_percentage'] = $percentage;
    //     $params['rating_average']  = $rating_average;


    //     $customRequest = new Request([
    //         'type' => 'feedback'
    //     ]);

    //     // Call notificationStatus with the custom request
    //     $this->notificationStatus($customRequest);
    //     return $params;
    // }

    public function userDeposit($id)
    {
        if ($id) {
            $user_data = Auth::guard('web')->user();
            $quote_by_transporter_data = QuoteByTransporter::where('id', $id)->first();
            //   return $quote_by_transporter_data;
            if ($quote_by_transporter_data) {
                $delivery_info = QuotationDetail::where('user_quote_id', $quote_by_transporter_data->user_quote_id)->first();
                // return $delivery_info;
                if ($delivery_info) {
                    //$quote = QuoteByTransporter::where('user_quote_id', $id)->first();
                    $transporter_detail = User::where('id', $quote_by_transporter_data->user_id)->first();
                    $user_info = UserQuote::where('id', $quote_by_transporter_data->user_quote_id)->first();
                    $transporter_feedback = $this->get_transporter_feedback($transporter_detail->id);
                    $lastVisitedAt = $transporter_detail->last_visited_at->timezone('Europe/London');
                    $formattedLastVisitedAt = $this->formatLastVisitedAt($lastVisitedAt);
                    $formattedDilveryDate = Carbon::createFromFormat('Y-m-d H:i:s', $transporter_detail->created_at)
                        ->setTimezone('Europe/London')
                        ->format('F d, H:i');

                    $my_quotes = QuoteByTransporter::where('user_id', $transporter_detail->id)->pluck('id');
                    $rating_average = Feedback::whereIn('quote_by_transporter_id', $my_quotes)
                        ->whereNotNull('rating')
                        ->avg('rating');
                    $percentage = 0;
                    if ($rating_average !== null) {
                        $percentage = ($rating_average / 5) * 100;
                    }
                    // return $percentage;
                    $result = [
                        'transporter_detail' => $transporter_detail,
                        'user_info' => $user_info,
                        'quote_by_transporter' => $quote_by_transporter_data,
                        'trans_feedback' => $transporter_feedback,
                        'last_visited_at' => $formattedLastVisitedAt,
                        'formattedDilveryDate' => $formattedDilveryDate,
                        'delivery_info' => $delivery_info,
                        'percentage' => $percentage,
                        'rating_average' => $rating_average,
                    ];
                    // return $result;
                    return view('front.dashboard.user_deposit', $result);
                } else {
                    return redirect()->route('front.dashboard');
                }
            } else {
                return redirect()->route('front.dashboard');
            }
        } else {
            return redirect()->route('front.dashboard');
        }
    }

    private function formatLastVisitedAt(Carbon $lastVisitedAt)
    {
        $now = Carbon::now('Europe/London');

        if ($lastVisitedAt->isToday()) {
            return 'Last seen today ' . $lastVisitedAt->format('H:i');
        } elseif ($lastVisitedAt->isYesterday()) {
            return 'Last seen yesterday ' . $lastVisitedAt->format('H:i');
        } else {
            return 'Last seen ' . $lastVisitedAt->format('d M Y H:i');
        }
    }

    public function messages()
    {
        $title = 'Messages';
        $user_data = Auth::guard('web')->user();
        $user_id = $user_data->id;
        $c_insatnce = $this->thread_obj->with(['message_latest'])->select("threads.*", 'u.name as user_name', 'u.profile_image')->TotalUnreadMessageCount(0)
            ->leftJoin("users as u", 'u.id', '=', 'threads.user_id')
            ->where("is_active", "y")
            ->where(function ($query) use ($user_id) {
                $query->where('threads.user_id', $user_id)
                    ->orWhere('threads.friend_id', $user_id);
            })
            ->orderBy('last_msg_update_time', 'DESC');
        $chats = $c_insatnce->get();

        //dd($chats);
        //dd($chats->TotalUnreadMessageCount);
        // $chats = $this->chat_obj->select('messages.*','f.name','f.id as user_id','f.profile_image')
        //     //->select(DB::raw("select count(cm.from_user) from chat_messages as cm where cm.from_user_id = chat_messages.from_user_id group by  as unread_message"))
        //     ->leftJoin('users as f','f.id','=','chat_messages.from_user_id')
        //     ->where('to_user_id', '=', $user_id)
        //     ->OrderBy('total_unread','DESC')
        //     ->groupBy('from_user_id')
        //     ->get();

        $latest_chat = $chats->first();

        return view('front.dashboard.messages')->with(compact('title', 'chats', 'latest_chat'));
    }

    public function quotes(Request $request, $id, $user_id = null)
    {
        // return $id;
        $user_data = Auth::guard('web')->user();
        $job_status = UserQuote::where(['user_id' => $user_data->id, 'id' => $id])
            ->value('status');
        // return  $job_status;

        $quotes = QuoteByTransporter::where('user_quote_id', $id)
            ->orderByRaw('CAST(price AS UNSIGNED) ASC')
            ->get();
        // return $quotes;

        $quotes = $quotes->map(function ($quote) {
            // $my_quotes = QuoteByTransporter::where('user_id', $quote->user_id)->pluck('id');
            $rating_average = Feedback::where('quote_by_transporter_id', null)->where('transporter_id', $quote->user_id)
                ->whereNotNull('rating')
                ->avg('rating');
            $percentage = $rating_average !== null ? ($rating_average / 5) * 100 : 0;
            $quote->rating_average = $rating_average;
            $quote->percentage = $percentage;
            return $quote;
        });


        $threads = Thread::where(['user_id' => $user_data->id, 'user_quote_id' => $id])->get();
        $threadMap = $threads->pluck('id', 'friend_id');
        $quotes->map(function ($quote) use ($threadMap) {
            // Add thread_id only if a matching thread exists
            if (isset($threadMap[$quote->user_id])) {
                $quote->thread_id = $threadMap[$quote->user_id];
            } else {
                $quote->thread_id = null; // Set to null or handle as needed if no thread matches
            }
        });


        $hasAcceptedQuote = $quotes->contains(function ($quote) {
            return strtolower($quote->status) === 'accept';
        });
        $scroll = $request->has('scroll') ? $request->query('scroll') : null;
        // Pass the flag to the view
        // return $quotes;
        $params['hasAcceptedQuote'] = $hasAcceptedQuote;
        // $params['overall_percentage'] = $percentage;
        $params['quotes'] = $quotes;
        $params['user_quote_id'] = $id;
        $params['job_status'] = $job_status;
        $params['scroll'] = $scroll;
        $params['user_id'] = $user_id;

        // $params['rating_average'] = $rating_average;
        return view('front.dashboard.quotes', $params);
    }

    public function quotesDelete($id)
    {
        $user = Auth::guard('web')->user();

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Unauthenticated'], 401);
        }

        $quote = UserQuote::where('id', $id)->where('user_id', $user->id)->first();

        if (!$quote) {
            return response()->json(['success' => false, 'message' => 'Quote not found'], 404);
        }

        $quote->delete();

        return response()->json(['success' => true, 'message' => 'Your quote deleted successfully']);
    }

    public function leaveFeedback($id)
    {
        $user_data = Auth::guard('web')->user();
        if ($id != null) {
            $quote = $id ? QuoteByTransporter::with(['getTransporters', 'quote'])->where(['id' => $id])->first() : null;
            $user_info = null;
            // dd($quote);
            if ($quote) {
                $transporter_detail = $quote->getTransporters;
                $transporter_feedback = $this->get_transporter_feedback($transporter_detail->id);
                $feedback_count = Feedback::where('transporter_id', $user_data->id)->count();
                $quote_info = $quote->quote;

                $my_quotes = QuoteByTransporter::where('user_id', $transporter_detail->id)->pluck('id');
                $rating_average = Feedback::whereIn('quote_by_transporter_id', $my_quotes)
                    ->whereNotNull('rating')
                    ->avg('rating');
                $percentage = 0;
                if ($rating_average !== null) {
                    $percentage = ($rating_average / 5) * 100;
                }
                // return  $percentage;
            } else {
                return redirect()->back();
            }
            // Return the view with the quote data, transporter name, and user info
            return view('front.dashboard.leave_feedback', [
                'data' => $quote,
                'transporter_detail' => $transporter_detail,
                'quote_info' => $quote_info,
                'transporter_feedback' => $transporter_feedback,
                'feedback_count' => $feedback_count,
                'percentage' => $percentage,
                'rating_average' => $rating_average
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function saveFeedbackQuote(Request $request)
    {
        $user_data = Auth::guard('web')->user();

        $feedbackComment = $request->input('feedback');
        $quoteByTransporterId = $request->input('quote_by_transporter_id');
        $rating = $request->input('rating');
        $transporter_id = $request->input('transporter_id');
        // 
        Feedback::updateOrCreate(
            ['quote_by_transporter_id' => $quoteByTransporterId],
            [
                // 'type' => $feedbackType,
                // 'communication' => $mappedRatings['communication'],
                // 'punctuality' => $mappedRatings['punctuality'],
                // 'care_of_good' => $mappedRatings['care_of_good'],
                // 'professionalism' => $mappedRatings['professionalism'],
                'transporter_id' => $transporter_id,
                'user_id' => $user_data->id,
                'rating' => $rating,
                'comment' => $feedbackComment,
                'first_name' => $user_data->username,
            ]
        );

        $details = QuoteByTransporter::where('id', $quoteByTransporterId)->first();

        // Call create_notification to notify the user
        create_notification(
            $details->user_id,
            $user_data->id,
            $details->user_quote_id,
            'New Feedback',
            'got feedback',  // Message of the notification
            'feedback',
        );

        return response()->json(['status' => true, 'message' => 'Feedback saved successfully.']);
        // }

        return response()->json(['status' => false, 'message' => 'Invalid feedback data.']);
    }

    private function mapRatings($ratings, $feedbackType)
    {
        // Initialize ratings to null
        $communication = null;
        $punctuality = null;
        $careOfGood = null;
        $professionalism = null;

        foreach ($ratings as $rating) {
            switch ($rating['category']) {
                case 'rating_comm_' . $feedbackType:
                    $communication = $rating['value'];
                    break;
                case 'rating_punct_' . $feedbackType:
                    $punctuality = $rating['value'];
                    break;
                case 'rating_care_' . $feedbackType:
                    $careOfGood = $rating['value'];
                    break;
                case 'rating_prof_' . $feedbackType:
                    $professionalism = $rating['value'];
                    break;
            }
        }

        return [
            'communication' => $communication,
            'punctuality' => $punctuality,
            'care_of_good' => $careOfGood,
            'professionalism' => $professionalism,
        ];
    }

    public function bookingConfirm($quote_id = null)
    {
        if ($quote_id) {
            $quote = QuoteByTransporter::with(['getTransporters', 'quote'])->where(['user_quote_id' => $quote_id, 'status' => 'accept'])->first();
            $transaction = TransactionHistory::where('user_quote_id', $quote_id)
                ->where('status', 'completed')
                ->first();
            if ($transaction) {
                $data['deposit'] = isset($quote->deposit) ? $quote->deposit : '';
                $data['transporter_name'] = $quote->getTransporters->username ?? '-';
                $data['transaction_id'] = isset($transaction->transaction_id) ? $transaction->transaction_id : '';
                $data['delivery_reference_id'] = isset($transaction->delivery_reference_id) ? $transaction->delivery_reference_id : '';
                $data['user_email'] = isset(Auth::user()->email) ? Auth::user()->email : '';
                $data['quoteId'] = $quote_id;
                $data['quote_by_transporter_id'] = $quote->id;
                return view('front.payment_confirm', $data);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        $name = getDashboardRouteName();
        Auth::guard('web')->logout();
        return redirect()->route($name);
    }

    public function notificationStatus(Request $request)
    {
        $user_data = Auth::guard('web')->user();
        if ($request->type == 'message') {
            Notification::where([
                'user_id' => $user_data->id,
                'reference_id' => $request->quote_id
            ])->update(['seen' => 0]);
        } else {
            Notification::where([
                'user_id' => $user_data->id,
                'user_quote_id' => $request->quote_id,
                'type' => 'quote'
            ])->update(['seen' => 0]);
        }
        return response()->json(['success' => true,]);
    }

    public function downloadVatReceipt(Request $request)
    {
        $user_data = Auth::guard('web')->user();
        $total_amount = $request->input('total');
        $tax_rate = 0.20; // 20%
        $tax_amount = number_format($total_amount * $tax_rate, 2);
        $subtotal_amount = number_format($total_amount - $tax_amount, 2);
        $data = [
            'invoice_number' => 'INV' . $user_data->id,
            'payment_date' => $request->input('payment_date'),
            'due' => 'On Receipt',
            'subtotal' => $subtotal_amount,
            'tax' => $tax_amount,
            'total' => $total_amount,
            'username' => $user_data->username,
            'user_email' => $user_data->email,
            'description' => 'Transport delivery for ' . $request->input('vehicle_name'),
            'rate' => $subtotal_amount,
            'qty' => 1,
            'amount' => $subtotal_amount,
            'van_number' => '458 2533 76',
        ];
        $pdf = PDF::loadView('pdf.vat_receipt', $data);
        return $pdf->download('vat_receipt.pdf');
    }
    public function manageNotification(Request $request)
    {
        // return "yessssssssss";
        $user =  Auth::guard('web')->user();
        return view('front.dashboard.notifications.manageNotification', [
            'data' => $user,
        ]);
    }
    public function updateManageNotification(Request $request)
    {
        // return $request->all();
        $request->validate([
            'job_email_preference' => 'nullable|boolean',
            'sms_alert' => 'nullable|boolean',

        ]);

        // Update user preferences
        try {
            $user = Auth::user();

            $user->user_sms_alert = $request->sms_alert ?? 0;
            $user->job_email_preference = $request->job_email_preference ?? 0;
            // return $user;
            $user->save();

            return response()->json(['success' => true, 'message' => 'Preferences updated successfully.']);
        } catch (\Exception $e) {
            // Log the error for debugging
            // Log::error('Error updating preferences: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' =>  $e->getMessage()], 500);
        }
    }
}
