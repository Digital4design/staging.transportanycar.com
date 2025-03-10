<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

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
use Illuminate\Http\requestData;
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

class Newquotenotify implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $userId, $requestData, $dis_dur;
    public function __construct($userId,array $requestData,$dis_dur)
    {   
       $this->userId = $userId;
       $this->requestData = $requestData;
       $this->dis_dur = $dis_dur;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {    
        $emailService = new EmailService;
        $userId  = $this->userId;
        $requestData = $this->requestData;
        $dis_dur = $this->dis_dur;
        // Process vehicle information
        $vehicle_make_1 = $requestData['vehicle_make_1'] ?? null;
        $vehicle_model_1 = $requestData["vehicle_model_1"] ?? null;
        $starts_drives_1 = !is_null($vehicle_make_1) && !is_null($vehicle_model_1) ? $requestData["starts_drives_1"] ?? '0' : null;
        //dd($requestData);
        // Handle file uploads
        // $up = $requestData->hasFile('file') ? upload_file('file', 'quote') : null;
        // $up1 = $requestData->hasFile('file_1') ? upload_file('file_1', 'quote') : null;
        $up =  null;
        $up1 =  null;

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
            'vehicle_make' => $requestData['vehicle_make'],
            'vehicle_model' => $requestData['vehicle_model'],
            'starts_drives' => $requestData['starts_drives'] ?? '0',
            'image' => $up,
            'vehicle_make_1' => $vehicle_make_1,
            'vehicle_model_1' => $vehicle_model_1,
            'starts_drives_1' => $starts_drives_1,
            'image_1' => $up1,
            'map_image' => null,
            'created_at' => $now = Carbon::now('Europe/London'),
            'updated_at' => $now = Carbon::now('Europe/London'),
            // 'how_moved' => $requestData->how_moved ? implode(',', $requestData->how_moved) : null,
            'how_moved' =>  $requestData['how_moved'][0] ?? null,
            'delivery_timeframe_from' => $requestData['delivery_timeframe_date'] ? (\DateTime::createFromFormat('d/m/Y', $requestData['delivery_timeframe_date']) ? \DateTime::createFromFormat('d/m/Y', $requestData['delivery_timeframe_date'])->format('Y-m-d') : null) : null,
            'delivery_timeframe' => $requestData['delivery_timeframe'] ?? null,
            'email' => $requestData['email'] ?? null,
        ];

        // Create user quote
        $userQuote = UserQuote::create($quoteData);

        // Update quote data with the quotation ID
        $quoteData['quotation_id'] = $userQuote->id;
        Cache::forget('location_info');
        $this->SaveSearchQuoteEmailSend($quoteData);

        $all_transport = user::where('type', 'car_transporter')->where('is_status', 'approved')->select('new_job_alert','email')->get();

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
                        $emailService->sendEmail($transporter->email, $htmlContent, $subject);
                        // $this->emailService->sendEmail("kartik.d4d@gmail.com", $htmlContent, $subject);

                        Log::info("Save Search functionality success sending email to transporter for Quote ID:  {$transporter->email}");
                    }
                } catch (\Exception $ex) {
                    Log::error('Save Search functionality Error sending email to transporter for Quote ID: ' . $ex->getMessage());
                    // return $ex->getMessage();
                }
            }
        }

//dd('in');
    
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

    public function SaveSearchQuoteEmailSend($quote)
    {
        $emailService = new EmailService;
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
            Log::error('Pickup postcode coordinates not found for Quote ID: ' . $quote['quotation_id']);
            return;
        }

        if (!$dropLat || !$dropLng) {
            Log::error('Drop postcode coordinates not found for Quote ID: ' . $quote['quotation_id']);
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
            Log::info('save search functionality No matching saved searches found for Quote ID: ' . $quote['quotation_id']);
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
                    $emailService->sendEmail($transporter->email, $htmlContent, $subject);
                    // $this->emailService->sendEmail("kartik.d4d@gmail.com", $htmlContent, $subject);

                    Log::info("Save Search functionality success sending email to transporter for Quote ID:  {$transporter->email}");
                    }
                } catch (\Exception $ex) {
                    Log::error('Save Search functionality Error sending email to transporter for Quote ID: ' . $quote['quotation_id'] . ': ' . $ex->getMessage());
                    // return $ex->getMessage();
                }
            }
        }
    }
}
