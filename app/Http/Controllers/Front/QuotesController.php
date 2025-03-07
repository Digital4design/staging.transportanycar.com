<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\WebController;
use App\QuoteByTransporter;
use App\User;
use App\UserQuote;
use Carbon\Carbon;
use App\QuotationDetail;
use App\MobileVerification;
use App\Services\EmailService;
use App\Jobs\SendTransporterEmail;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Exception;
use App\Services\SmsService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use App\Jobs\Newquotenotify;


class QuotesController extends WebController
{
    protected $emailService;
    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }
    public function quoteSteps()
    {
        $title = 'Get Quote';
        $location = Cache::get('location_info');
        if ($location) {
            return view('front.get_steps', ['title' => $title]);
        }
        //error_session('Please enter valid postcode');
        return redirect()->route('front.home');
    }

    public function setLocation(Request $request)
    {
        Cache::forget('location_info');
        $request->validate([
            'start_point' => ['required'],
            'start_latitude' => ['required'],
            'start_longitude' => ['required'],
            'end_point' => ['required'],
            'end_latitude' => ['required'],
            'end_longitude' => ['required'],
        ]);
        //$user_data = Auth::guard("web")->user();
        $data['start_point'] = $request->start_point ?? '';
        $data['start_latitude'] = $request->start_latitude ?? '';
        $data['start_longitude'] = $request->start_longitude ?? '';
        $data['end_point'] = $request->end_point ?? '';
        $data['end_latitude'] = $request->end_latitude ?? '';
        $data['end_longitude'] = $request->end_longitude ?? '';

        // Store data in the cache
        $isCached = Cache::put('location_info', $data);
        if (!$isCached) {
            throw new Exception('Failed to store data in cache');
        } else {
            //$route = route('front.quote_steps');
            return redirect()->route('front.quote_steps');
        }
        //return response()->json(['success' => true, 'route' => $route]);
        //$location = Cache::get('location_'.$user_data->id);
    }
    public function quoteSave(Request $request)
    {

        // Check if a user is authenticated with the 'web' guard
        $user_info = Auth::guard('web')->check();
        $current_user_data = $user_info ? Auth::guard('web')->user() : null;

        // If user is logged in and is a transporter, invalidate the session
        if ($current_user_data && $current_user_data->type == 'car_transporter') {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            $user_info = false;
            $current_user_data = null;
        }
        $location = Cache::get('location_info');
        if ($location === null) {
            return redirect()->route('front.home')->withErrors(['general' => 'Location information not found.']);
        } else {
            $dis_dur['start_point'] = $location['start_point'];
            $dis_dur['start_latitude'] = $location['start_latitude'];
            $dis_dur['start_longitude'] = $location['start_longitude'];
            $dis_dur['end_point'] = $location['end_point'];
            $dis_dur['end_latitude'] = $location['end_latitude'];
            $dis_dur['end_longitude'] = $location['end_longitude'];
        }

        $user = User::where([
            'email' => $request->email,
            'type' => 'user'
        ])->first();

        if ($user_info && $current_user_data->email !== $request->email) {
            // If the email exists in the database, log out current user
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            if ($user) {
                // If the email exists in the database, log out current user and redirect to login page
                // $this->saveQuoteAndNotifyTransporters($user->id, $request, $dis_dur);
                Newquotenotify::dispatch($user->id, $request, $dis_dur);
                $user->mobile = $request->phone;
                $user->save();
                $user_info = false;
                $current_user_data = null;
                $request->session()->flash('login_email', $request->email);
                $request->session()->flash('login_message', 'Your job created successfully. Please login.');
                return redirect()->route('front.login');
            } else {
                // If the email does not exist, create a new account and login with new account
                $temp_password = genUniqueStr('', 6, 'users', 'password', true);
                $user_data = $this->createNewUserAndNotify($request, $temp_password);
                // $this->saveQuoteAndNotifyTransporters($user_data->id, $request, $dis_dur);
                Newquotenotify::dispatch($user_data->id, $request, $dis_dur);

                // Set session variable to indicate user came from quote page
                $request->session()->flash('came_from', 'quote_save');
                $creds = ['email' => $request->email, 'password' => $temp_password ?? null, 'type' => 'user'];
                if (Auth::guard('web')->attempt($creds)) {
                    // Log in the newly created user
                    if (Auth::guard('web')->user()->status == 'active') {
                        return redirect()->route('front.dashboard');
                    } else {
                        // If user status is not active, log out and redirect to login
                        Auth::logout();
                        return redirect()->route('front.login')->withErrors(['general' => 'Your account has been disabled, kindly contact the admin']);
                    }
                } else {
                    return redirect()->route('front.home')->withErrors(['general' => 'Something went wrong during login.']);
                }
            }
        } elseif (!$user_info) {
            // If user is not logged in, use the found user or create a new user
            if ($user) {
                $user_data = $user;
                $user->mobile = $request->phone;
                $user->save();
            } else {
                $temp_password = genUniqueStr('', 6, 'users', 'password', true);
                $user_data = $this->createNewUserAndNotify($request, $temp_password);
            }
            Newquotenotify::dispatch($user_data->id, $request, $dis_dur);
            // $this->saveQuoteAndNotifyTransporters($user_data->id, $request, $dis_dur);

        } else {
            // If user is logged in and the email is the same, use current user data
            $user_data = $current_user_data;
            $user->mobile = $request->phone;
            $user->save();
            Newquotenotify::dispatch($user_data->id, $request, $dis_dur);
            // $this->saveQuoteAndNotifyTransporters($user_data->id, $request, $dis_dur);

        }


        // Set session variable to indicate user came from quote page
        $request->session()->flash('came_from', 'quote_save');

        // Attempt to log in the user if not already logged in
        if (!$user_info) {
            $creds = ['email' => $request->email, 'password' => $temp_password ?? null, 'type' => 'user'];
            if ($user) {
                // Email already exists, store email in session and return JSON response
                $request->session()->flash('login_email', $request->email);
                $request->session()->flash('login_message', 'Your job created successfully. Please login.');
                return redirect()->route('front.login');
            } else if (Auth::guard('web')->attempt($creds)) {
                // Log in the newly created user
                if (Auth::guard('web')->user()->status == 'active') {
                    Auth::loginUsingId(Auth::guard('web')->user()->id);
                    return redirect()->route('front.dashboard');
                } else {
                    // If user status is not active, log out and redirect to login
                    Auth::logout();
                    return redirect()->route('front.login')->withErrors(['general' => 'Your account has been disabled, kindly contact the admin']);
                }
            } else {
                return redirect()->route('front.home')->withErrors(['general' => 'Something is wrong! Try again.']);
            }
        } else {
            // If user is already logged in, redirect to the dashboard
            return redirect()->route('front.dashboard');
        }
    }

    private function createNewUserAndNotify($request, $password)
    {
        $user_data = User::create([
            'password' => $password,
            'email' => $request->email,
            'name' => $request->name ?? null,
            'country_code' => $request->country_code ?? null,
            'mobile' => $request->mobile ?? $request->phone ?? null,
            'profile_image' => config('constants.default.user_image'),
        ]);

        // Send welcome email
        try {
            $maildata['email'] = $user_data->email;
            $maildata['password'] = $password;
            $htmlContent = view('mail.General.customerWelcome', ['data' => $maildata])->render();
            $this->emailService->sendEmail($maildata['email'], $htmlContent, 'Welcome to Transport Any Car');
        } catch (\Exception $ex) {
            Log::error('Error sending email: ' . $ex->getMessage());
        }

        return $user_data;
    }

    private function saveQuoteAndNotifyTransporters($userId, $request, $dis_dur)
    {

        // Process vehicle information
        $vehicle_make_1 = $request->vehicle_make_1 ?? null;
        $vehicle_model_1 = $request->vehicle_model_1 ?? null;
        $starts_drives_1 = !is_null($vehicle_make_1) && !is_null($vehicle_model_1) ? $request->starts_drives_1 ?? '0' : null;

        // Handle file uploads
        $up = $request->hasFile('file') ? upload_file('file', 'quote') : null;
        $up1 = $request->hasFile('file_1') ? upload_file('file_1', 'quote') : null;
        // Set map image
        $result = $this->saveMapImage($dis_dur);
        // Prepare quote data
        $quoteData = [
            'user_id' => $userId,
            'pickup_postcode' => $dis_dur['start_point'],
            'pickup_lat' => $dis_dur['start_latitude'],
            'pickup_lng' => $dis_dur['start_longitude'],
            'drop_postcode' => $dis_dur['end_point'],
            'drop_lat' => $dis_dur['end_latitude'],
            'drop_lng' => $dis_dur['end_longitude'],
            'distance' => $result['distance'] ?? null,
            'duration' => $result['duration'] ?? null,
            'vehicle_make' => $request->vehicle_make,
            'vehicle_model' => $request->vehicle_model,
            'starts_drives' => $request->starts_drives ?? '0',
            'image' => $up,
            'vehicle_make_1' => $vehicle_make_1,
            'vehicle_model_1' => $vehicle_model_1,
            'starts_drives_1' => $starts_drives_1,
            'image_1' => $up1,
            'map_image' => null,
            'created_at' => $now = Carbon::now('Europe/London'),
            'updated_at' => $now = Carbon::now('Europe/London'),
            'how_moved' => $request->how_moved ? implode(',', $request->how_moved) : null,
            'delivery_timeframe_from' => $request->delivery_timeframe_date ? (\DateTime::createFromFormat('d/m/Y', $request->delivery_timeframe_date) ? \DateTime::createFromFormat('d/m/Y', $request->delivery_timeframe_date)->format('Y-m-d') : null) : null,
            'delivery_timeframe' => $request->delivery_timeframe ?? null,
            'email' => $request->email ?? null,
        ];

        // Create user quote
        $userQuote = UserQuote::create($quoteData);

        // Update quote data with the quotation ID
        $quoteData['quotation_id'] = $userQuote->id;
        Cache::forget('location_info');
        $this->SaveSearchQuoteEmailSend($quoteData);

        $all_transport = user::where('type', 'car_transporter')->where('is_status', 'approved')->get();

        foreach ($all_transport as $transporter) {
            if ($transporter) {
                $mailData = [
                    'id' => $quoteData['quotation_id'],
                    'vehicle_make' => $quoteData['vehicle_make'],
                    'vehicle_model' => $quoteData['vehicle_model'],
                    'vehicle_make_1' => $quoteData['vehicle_make_1'],
                    'vehicle_model_1' => $quoteData['vehicle_model_1'],
                    'pickup_postcode' => $quoteData['pickup_postcode'],
                    'drop_postcode' => $quoteData['drop_postcode'],
                    'delivery_timeframe_from' => $quoteData['delivery_timeframe_from'] ?? null,
                    'starts_drives' => $quoteData['starts_drives'],
                    'starts_drives_1' => $quoteData['starts_drives_1'],
                    'how_moved' => $quoteData['how_moved'],
                    'distance' => $quoteData['distance'],
                    'duration' => $quoteData['duration'],
                    'map_image' => $quoteData['map_image'],
                    'delivery_timeframe' => $quoteData['delivery_timeframe'],
                ];
                try {
                    if ($transporter->new_job_alert == "1") {
                        $htmlContent = view('mail.General.transporter-new-job-received', ['quote' => $mailData])->render();
                        $subject = 'You have received a transport notification';
                        $this->emailService->sendEmail($transporter->email, $htmlContent, $subject);
                        // $this->emailService->sendEmail("kartik.d4d@gmail.com", $htmlContent, $subject);

                        \Log::info("Save Search functionality success sending email to transporter for Quote ID:  {$transporter->email}");
                    }
                } catch (\Exception $ex) {
                    \Log::error('Save Search functionality Error sending email to transporter for Quote ID: ' . $ex->getMessage());
                    // return $ex->getMessage();
                }
            }
        }



        // Send mail to transporters
        //$this->sendMailToTransporters($quoteData);
        // this is commented because of client requirement
        // $command =  \Illuminate\Support\Facades\Artisan::call('send:quote_email_sent', [
        //     'pickup_postcode' => $dis_dur['start_point'],
        //     'drop_postcode' => $dis_dur['end_point'],
        // ]);

        // // $command = '/usr/local/bin/php /home/pfltvaho/public_html/artisan schedule:run';
        // exec($command, $output, $returnVar);
        // comment end
    }

    private function saveMapImage($dis_dur)
    {

        $startPoint = $dis_dur['start_point']; // Replace with your start point
        $endPoint = $dis_dur['end_point']; // Replace with your end point
        $apiKey = get_constants('google_map_key'); // Replace with your API key
        $carImageURL = urlencode(config('constants.default.map_icon')); // URL of the car image

        // Step 1: Get the route from the Directions API
        $directionsUrl = "https://maps.googleapis.com/maps/api/directions/json?units=imperial&";
        $directionsUrl .= "origin=" . urlencode($startPoint) . "&destination=" . urlencode($endPoint) . "&key={$apiKey}";

        $client = new Client();
        $directionsResponse = $client->get($directionsUrl);
        $directionsData = json_decode($directionsResponse->getBody()->getContents(), true);

        if ($directionsData['status'] == 'OK') {
            // // Step 2: Extract the polyline encoding
            // $route = $directionsData['routes'][0]['overview_polyline']['points'];

            // // Map parameters
            // $center = "52.3555,-1.1743"; // Center point for the map (central UK)
            // $zoom = "7"; // Zoom level for a broad view
            // $size = "600x400"; // Size of the map
            // $mapType = "roadmap"; // Map type

            // // No styles to hide features, showing all features
            // $styles = [
            //     'feature:road|element:geometry|visibility:on',
            //     'feature:road|element:labels|visibility:on',
            //     'feature:transit|element:geometry|visibility:on',
            //     'feature:transit|element:labels|visibility:on',
            //     'feature:poi|element:geometry|visibility:on',
            //     'feature:poi|element:labels|visibility:on',
            //     'feature:administrative|element:geometry|visibility:on',
            //     'feature:administrative|element:labels|visibility:on',
            //     'feature:landscape|element:geometry|visibility:on',
            //     'feature:water|element:geometry|visibility:on',
            // ];
            // $styleString = implode('&style=', $styles);

            // // Step 3: Generate the Static Map URL with the route
            // $staticMapUrl = "https://maps.googleapis.com/maps/api/staticmap?";
            // $staticMapUrl .= "center={$center}&zoom={$zoom}&size={$size}&maptype={$mapType}";
            // $staticMapUrl .= "&markers=icon:$carImageURL%7Clabel:S%7C" . urlencode($startPoint); // Car image marker for starting point
            // $staticMapUrl .= "&markers=color:red%7Clabel:E%7C" . urlencode($endPoint); // Default marker for ending point
            // $staticMapUrl .= "&path=enc:{$route}";
            // $staticMapUrl .= "&style={$styleString}";
            // $staticMapUrl .= "&key={$apiKey}";

            // // Step 4: Fetch the image
            // $response = $client->get($staticMapUrl);
            // $image = $response->getBody()->getContents();
            // $path = 'uploads/maps/' . date('ymdHis') . '.png';
            // Storage::put($path, $image);

            $distance = $directionsData['routes'][0]['legs'][0]['distance']['text'];
            $duration = $directionsData['routes'][0]['legs'][0]['duration']['text'];
            return [
                'distance' => $distance,
                'duration' => $duration,
                //'path' => $path
            ];
        } else {
            // Handle the error appropriately
            //throw new Exception('Failed to get directions: ' . $directionsData['status']);
            return redirect()->route('front.home')->withErrors(['general' => 'Failed to get directions. Please try with correct location']);
        }
    }

    // private function sendMailToTransporters($quotation_data) {
    //     $mailData = $this->getMailData($quotation_data);
    //     //send mail to all transporters

    //     //SendTransporterEmail::dispatch();

    //     //$transporters = User::where(['type' => 'car_transporter', 'status' => 'active'])->get();
    //     //$transporters = ['subham.k@ptiwebtech.com','info@transportanycar.com'];
    //     $transporters = ['subham.k@ptiwebtech.com'];

    //     foreach ($transporters as $transporter) {
    //          // send to transporter new job mail
    //         try {
    //             $htmlContent = view('mail.General.transporter-new-job-received', ['quote' => $mailData])->render();
    //             $this->emailService->sendEmail($transporter, $htmlContent, 'You have received a transport notification');
    //         } catch (\Exception $ex) {
    //             \Log::error('Error sending email to transporter: ' . $ex->getMessage());
    //         }
    //     }
    // }

    private function getMailData($quotation_data)
    {
        $mailData = [
            'id' => $quotation_data['quotation_id'],
            'vehicle_make' => $quotation_data['vehicle_make'],
            'vehicle_model' => $quotation_data['vehicle_model'],
            'vehicle_make_1' => $quotation_data['vehicle_make_1'],
            'vehicle_model_1' => $quotation_data['vehicle_model_1'],
            'pickup_postcode' => formatAddress($quotation_data['pickup_postcode']),
            'drop_postcode' => formatAddress($quotation_data['drop_postcode']),
            'delivery_timeframe_from' => isset($quotation_data['delivery_timeframe_from']) ? $quotation_data['delivery_timeframe_from'] : null,
            'starts_drives' => $quotation_data['starts_drives'] == 1 ? 'Yes' : 'No',
            'starts_drives_1' => $quotation_data['starts_drives_1'],
            'how_moved' => $quotation_data['how_moved'],
            'distance' => $quotation_data['distance'],
            'duration' => $quotation_data['duration'],
            'map_image' => $quotation_data['map_image'],
            'delivery_timeframe' => $quotation_data['delivery_timeframe']
        ];
        return $mailData;
    }

    public function quoteChangeStatus(Request $request)
    {
        $request->validate([
            'quote_id' => ['required', Rule::exists('quote_by_transpoters', 'id')],
        ]);
        $quote = QuoteByTransporter::find($request->quote_id);
        if ($request->ajax()) {
            if ($request->status == 'accept') {
                $user_quote = UserQuote::where('id', $quote->user_quote_id)->first();
                $user_quote->update([
                    'status' => 'approved',
                    'updated_at' => Carbon::now(),
                ]);
                // try {
                //     $htmlContent = view('mail.General.accepted-quote-without-payment', ['data' => $quote])->render();
                //     $this->emailService->sendEmail($quote->quote->user->email, $htmlContent, 'Complete Your Transport Booking');
                // } catch (\Exception $ex) {
                //     \Log::error('Error sending email to transporter: ' . $ex->getMessage());
                // }
            } else {
                $quote->update(['status' => $request->status]);
            }
            return response()->json(['success' => true, 'message' => 'Quote ' . $request->status . ' successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'something went wrong!.. Please try again']);
        }
    }

    public function quoteDetailSave(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'contact_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'delivery_contact_name' => 'required',
            'contact_number' => 'required',
            'delivery_email' => 'required|email',
            'collection_address_1' => 'required_if:start_point,null', // Adjust as per your logic
            'collection_town' => 'required_if:start_point,null', // Adjust as per your logic
            'collection_country' => 'required_if:start_point,null', // Adjust as per your logic
            'delivery_address_1' => 'required_if:end_point,null', // Adjust as per your logic
            'delivery_town' => 'required_if:end_point,null', // Adjust as per your logic
            'delivery_country' => 'required_if:end_point,null', // Adjust as per your logic
        ]);

        $quotationDetail = [
            'user_id' => Auth::id(),
            'delivery_reference_id' => $request['delivery_reference_id'],
            'transaction_id' => $request['transaction_id'],
            'collection_contact_name' => $request['contact_name'],
            'collection_mobile_number' => $request['phone'],
            'collection_email' => $request['email'],
            'collection_address' => $request['start_point'],
            'delivery_address' => $request['end_point'],
            'delivery_contact_name' => $request['delivery_contact_name'],
            'delivery_mobile_number' => $request['contact_number'],
            'delivery_email' => $request['delivery_email'],
            'collection_address_1' => $request['collection_address_1'],
            'collection_address_2' => $request['collection_address_2'],
            'collection_town' => $request['collection_town'],
            'collection_country' => $request['collection_country'],
            'delivery_address_1' => $request['delivery_address_1'],
            'delivery_address_2' => $request['delivery_address_2'],
            'delivery_town' => $request['delivery_town'],
            'delivery_country' => $request['delivery_country'],
        ];

        try {
            $quote = QuoteByTransporter::where('quote_by_transpoters.id', $request['quote_by_transporter_id'])
                ->join('users', 'users.id', '=', 'quote_by_transpoters.user_id')
                ->select('users.email', 'quote_by_transpoters.transporter_payment')
                ->first();
            $existingRecord = QuotationDetail::where('user_quote_id', $request['user_quote_id'])->first();
            if ($existingRecord) {
                $existingRecord->update($quotationDetail);
                $details = $existingRecord;
            } else {
                $quotationDetail['user_quote_id'] = $request['user_quote_id'];
                $details = QuotationDetail::create($quotationDetail);
            }
            UserQuote::where('id', $request['user_quote_id'])->update(['status' => 'completed']);
            //$quote->email = 'subham.k@ptiwebtech.com';
            //logged in user
            $username = Auth::user()->username;
            $user_quote = UserQuote::where('id', $request['user_quote_id'])->first();
            $mailData = $this->getMailData($user_quote);
            $mailData['transporter_payment'] = $quote->transporter_payment;
            $mailData['username'] = $username;
            $mailData['quote_by_transporter_id'] = $request['quote_by_transporter_id'];
            $mailData['quotation_detail'] = $details->toArray();
            try {
                $htmlContent = view('mail.General.quote-accepted', ['quote' => $mailData])->render();
                $this->emailService->sendEmail($quote->email, $htmlContent, 'Congratulations, your offer has been accepted!');
            } catch (\Exception $ex) {
                \Log::error('Error sending email to transporter: ' . $ex->getMessage());
            }

            return response()->json([
                'success' => true,
                'id' => $details->user_quote_id,
                'quote_by_transporter_id' => $request['quote_by_transporter_id'],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to save quotation detail.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function SaveSearchQuoteEmailSend($quote)
    {
        $pickupCoordinates = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
            'address' => $quote['pickup_postcode'],
            'key' => config('constants.google_map_key'),
        ])->json();
        $dropCoordinates = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
            'address' => $quote['drop_postcode'],
            'key' => config('constants.google_map_key'),
        ])->json();
        $pickupLat = $pickupCoordinates['results'][0]['geometry']['location']['lat'] ?? null;
        $pickupLng = $pickupCoordinates['results'][0]['geometry']['location']['lng'] ?? null;
        $dropLat = $dropCoordinates['results'][0]['geometry']['location']['lat'] ?? null;
        $dropLng = $dropCoordinates['results'][0]['geometry']['location']['lng'] ?? null;

        if (!$pickupLat || !$pickupLng) {
            \Log::error('Pickup postcode coordinates not found for Quote ID: ' . $quote['quotation_id']);
            return;
        }

        if (!$dropLat || !$dropLng) {
            \Log::error('Drop postcode coordinates not found for Quote ID: ' . $quote['quotation_id']);
            return;
        }

        $maxRangeKm = config('constants.max_range_km', 50);

        $savedSearches = DB::table('save_searches')
            ->select(
                'id',
                'pick_area',
                'drop_area',
                'user_id',
                DB::raw(" 
            (6371 * acos(
                cos(radians($pickupLat)) 
                * cos(radians(pick_lat)) 
                * cos(radians(pick_lng) - radians($pickupLng)) 
                + sin(radians($pickupLat)) 
                * sin(radians(pick_lat))
            )) AS distance_pickup,
            CASE 
                WHEN LOWER(drop_area) = 'anywhere' THEN 0
                ELSE (6371 * acos(
                    cos(radians($dropLat)) 
                    * cos(radians(drop_lat)) 
                    * cos(radians(drop_lng) - radians($dropLng)) 
                    + sin(radians($dropLat)) 
                    * sin(radians(drop_lat))
                ))
            END AS distance_drop
        ")
            )
            ->whereRaw("
        (6371 * acos(
            cos(radians($pickupLat)) 
            * cos(radians(pick_lat)) 
            * cos(radians(pick_lng) - radians($pickupLng)) 
            + sin(radians($pickupLat)) 
            * sin(radians(pick_lat))
        )) <= ?", [$maxRangeKm]) // Filter by pickup distance
            ->where(function ($query) use ($dropLat, $dropLng, $maxRangeKm) {
                $query->whereRaw("
            LOWER(drop_area) = 'anywhere'
        ")->orWhereRaw("
            (6371 * acos(
                cos(radians($dropLat)) 
                * cos(radians(drop_lat)) 
                * cos(radians(drop_lng) - radians($dropLng)) 
                + sin(radians($dropLat)) 
                * sin(radians(drop_lat))
            )) <= ?", [$maxRangeKm]);
            })
            ->get();

        if ($savedSearches->isEmpty()) {
            \Log::info('save search functionality No matching saved searches found for Quote ID: ' . $quote['quotation_id']);
            return;
        }

        foreach ($savedSearches as $savedSearch) {
            $transporter = DB::table('users')
                ->where('id', $savedSearch->user_id)
                ->where('status', 'active')
                ->where('type', 'car_transporter')
                ->where('is_status', 'approved')
                ->first();

            if ($transporter) {
                $mailData = [
                    'id' => $quote['quotation_id'],
                    'vehicle_make' => $quote['vehicle_make'],
                    'vehicle_model' => $quote['vehicle_model'],
                    'vehicle_make_1' => $quote['vehicle_make_1'],
                    'vehicle_model_1' => $quote['vehicle_model_1'],
                    'pickup_postcode' => $quote['pickup_postcode'],
                    'drop_postcode' => $quote['drop_postcode'],
                    'delivery_timeframe_from' => $quote['delivery_timeframe_from'] ?? null,
                    'starts_drives' => $quote['starts_drives'],
                    'starts_drives_1' => $quote['starts_drives_1'],
                    'how_moved' => $quote['how_moved'],
                    'distance' => $quote['distance'],
                    'duration' => $quote['duration'],
                    'map_image' => $quote['map_image'],
                    'delivery_timeframe' => $quote['delivery_timeframe'],
                ];
                try {
                    if ($transporter->job_email_preference){
                    $htmlContent = view('mail.General.transporter-new-job-received', ['quote' => $mailData])->render();
                    $subject = 'You have received a transport notification';
                    $this->emailService->sendEmail($transporter->email, $htmlContent, $subject);
                    // $this->emailService->sendEmail("kartik.d4d@gmail.com", $htmlContent, $subject);

                    \Log::info("Save Search functionality success sending email to transporter for Quote ID:  {$transporter->email}");
                    }
                } catch (\Exception $ex) {
                    \Log::error('Save Search functionality Error sending email to transporter for Quote ID: ' . $quote['quotation_id'] . ': ' . $ex->getMessage());
                    // return $ex->getMessage();
                }
            }
        }
    }

    public function sendOtp(Request $request, SmsService $service)
    {
        $validator = Validator::make($request->all(), [
            'phoneNumber' => 'required|string',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ], 400);
        }

        // Generate a new OTP (e.g., a 6-digit code)
        $otp = rand(1000, 9999);

        // Create or update the phone verification record
        MobileVerification::updateOrCreate(
            ['mobile_number' => $request->phoneNumber],
            [
                'otp_code' => $otp,
                'otp_expires_at' => now()->addMinutes(15), // Set OTP expiry
            ]
        );
        $result = $service->sendSms($request->phoneNumber, "Transport Any Car: $otp is your verification code. It expires in 15 minutes. Don’t share this with anyone.");
        if (isset($result['sid'])) {
            return response()->json([
                'success' => true,
                'message' => 'SMS sent successfully!'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send SMS',
                'data' => $result
            ]);
        }
        return response()->json([
            'success' => true,
            // 'message' => 'OTP sent successfully.',
        ]);
    }

    public function verifyOtp(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phoneNumber' => 'required|string',
            'otp' => 'required|string|size:4',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ], 200);
        }

        // Find the verification record by mobile number
        $verification = MobileVerification::where('mobile_number', $request->phoneNumber)->first();

        if (!$verification) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid mobile number.',
            ], 200);
        }

        // Check if the OTP matches
        if ($verification->otp_code !== $request->otp) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid OTP.',
                'data' => $request->all()
            ], 200);
        }

        // Check if the OTP has expired (15 minutes expiration)
        if (now()->greaterThan($verification->otp_expires_at)) {
            return response()->json([
                'success' => false,
                'message' => 'OTP has expired.',
            ], 200);
        }

        // OTP is valid, proceed with the user's action
        // Optionally remove the verification record
        $verification->delete();

        return response()->json([
            'success' => true,
            'message' => 'OTP verified successfully.',
        ]);
    }
    public function checkSaveSearchFunctionality()
    {
        $quote = UserQuote::where('id', 769)->first()->toArray();

        return $this->SaveSearchQuoteEmailSend($quote);
    }
}
