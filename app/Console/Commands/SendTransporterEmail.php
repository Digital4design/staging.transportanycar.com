<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\UserQuote;
use App\SaveSearch;
use Illuminate\Support\Facades\DB;
use App\Services\EmailService;
use Illuminate\Support\Facades\Http;


class SendTransporterEmail extends Command
{
    protected $signature = 'send:save-search-mail';
    protected $description = 'Send quatation description to transporter';
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        parent::__construct();
        $this->emailService = $emailService;
    }

    // public function handle()
    // {

    //     $user_quotes = UserQuote::where('created_at', '>=', Carbon::now()->subDay())->get();

        
    //         $transporter = DB::table('save_searches')
    //         ->join('users', function ($join) {
    //             $join->on('users.id', '=', 'save_searches.user_id')
    //                 ->where('users.status', 'active')
    //                 ->where('users.type', 'car_transporter')
    //                 ->where('users.is_status', 'approved');
    //             // ->where('users.job_email_preference', 1);
    //         })
    //         ->where(function ($query) use ($user_quotes) {
    //             foreach ($user_quotes as $word) {
    //                 $query->orWhere(DB::raw('LOWER(save_searches.pick_area)'), 'LIKE', '%' . $word->pickup_postcode . '%');
    //             }
    //         })
    //         // Match if any of the words in the drop_postcode input match the drop_area
    //         ->where(function ($query) use ($user_quotes) {
    //             $query->orWhere(function ($innerQuery) use ($user_quotes) {
    //                 foreach ($user_quotes as $word) {
    //                     $innerQuery->orWhere(DB::raw('LOWER(save_searches.drop_area)'), 'LIKE', '%' . $word->drop_postcode . '%');
    //                 }
    //             })
    //                 ->orWhereNull('save_searches.drop_area') // Match if drop_area is NULL
    //                 ->orWhere('save_searches.drop_area', 'anywhere'); // Match if drop_area is 'anywhere'
    //         })
    //         ->where('save_searches.email_notification', 'true')
    //         ->groupBy('users.id')
    //         ->get();
            
    //         $last24HoursCount = UserQuote::where('created_at', '>=', Carbon::now()->subDay())->count();
             
    //         foreach($transporter as $transport)
    //         {
    //         $mailData = [
    //             'last24HoursCount' =>$last24HoursCount,
    //            'name'=>$transport->first_name,
    //         ]; 
         
    //         $htmlContent = view('mail.General.today-transporter-leads', ['quote' => $mailData])->render();
    //         $subject='Todays Transport Leads';

             
    //           try
    //           {
    //             if($transport->summary_of_leads == 1 && $transport->email_notification == true)
    //             {
    //             $this->emailService->sendEmail($transport->email, $htmlContent, $subject);
    //             }
    //           }
    //           catch(\Exception $ex)
    //           {
    //             \Log::error('Error sending email: ' . $ex->getMessage());
    //           }
              
    //        }
    //     }
    // }
    public function handle()
    {
        // Fetch new quotes from the last 24 hours
        $newQuotes = UserQuote::whereDate("created_at", ">=", now()->subDay())
        ->whereIn("status", ["pending", "approved"])
        ->get();

        // Fetch active and approved transporters
        $transporters = DB::table("users")
        ->where("status", "active")
        ->where("is_status", "approved")
        ->where("type", "car_transporter")
        ->get();

        $maxDistance = config("constants.max_range_km");

        $systum = [];

        foreach ($transporters as $transporter) {
                // Retrieve saved searches for this transporter
                $savedSearches = SaveSearch::where('user_id', $transporter->id)->get();

                foreach ($savedSearches as $search) {
                    // Fetch pickup coordinates
                    $pickUpResponse = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
                        'address' => $search->pick_area,
                        'key' => config('constants.google_map_key'),
                    ]);
                
                    $pickUpData = $pickUpResponse->json();
                    if ($pickUpData['status'] !== 'OK') {
                        continue; // Skip if coordinates are not found
                    }
                    $pickUpLat = $pickUpData['results'][0]['geometry']['location']['lat'];
                    $pickUpLng = $pickUpData['results'][0]['geometry']['location']['lng'];
                
                    // Fetch drop-off coordinates if provided
                    $dropOffLat = $dropOffLng = null;
                    if (!empty($search->drop_area) && $search->drop_area !== 'Anywhere') {
                        $dropOffResponse = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
                            'address' => $search->drop_area,
                            'key' => config('constants.google_map_key'),
                        ]);
                        $dropOffData = $dropOffResponse->json();
                        if ($dropOffData['status'] === 'OK') {
                            $dropOffLat = $dropOffData['results'][0]['geometry']['location']['lat'];
                            $dropOffLng = $dropOffData['results'][0]['geometry']['location']['lng'];
                        }
                    }
                
                    // Build the query to calculate the matching quotes
                    $quoteQuery = UserQuote::query()
                        ->whereIn('status', ['pending', 'approved'])
                        ->whereDate('created_at', '>=', now()->subDay());
                
                    if ($dropOffLat) {
                        $quoteQuery->select(
                            \DB::raw("(6371 * acos(cos(radians($pickUpLat)) * cos(radians(pickup_lat)) * cos(radians(pickup_lng) - radians($pickUpLng)) + sin(radians($pickUpLat)) * sin(radians(pickup_lat)))) AS distance_pickup"),
                            \DB::raw("(6371 * acos(cos(radians($dropOffLat)) * cos(radians(drop_lat)) * cos(radians(drop_lng) - radians($dropOffLng)) + sin(radians($dropOffLat)) * sin(radians(drop_lat)))) AS distance_drop_off")
                        )
                            ->having('distance_pickup', '<=', $maxDistance)
                            ->having('distance_drop_off', '<=', $maxDistance);
                    } else {
                        $quoteQuery->select(
                            \DB::raw("(6371 * acos(cos(radians($pickUpLat)) * cos(radians(pickup_lat)) * cos(radians(pickup_lng) - radians($pickUpLng)) + sin(radians($pickUpLat)) * sin(radians(pickup_lat)))) AS distance_pickup")
                        )
                            ->having('distance_pickup', '<=', $maxDistance);
                    }
                
                    // Count matching quotes
                    $quoteCount = $quoteQuery->count();
                    $systum[] = ["$transporter->first_name" => "$quoteCount"];
                
                    // Send email only if there are matching quotes
                    if ($quoteCount > 0) {
                        // Prepare email data
                        $mailData = [
                            'name' => $transporter->first_name,
                            'last24HoursCount' => $quoteCount,
                        ];
                    
                        // return view('mail.General.today-transporter-leads', ['quote' => $mailData])->render();
                    
                        $htmlContent = view('mail.General.today-transporter-leads',['quote' => $mailData])->render();
                        $subject = 'Today’s Transporter Leads';
                    
                        try {
                            if ($transporter->summary_of_leads == 1 && $transporter->email_notification == true) {
                                $this->emailService->sendEmail($transporter->email, $htmlContent, $subject);
                            }
                        } catch (\Exception $ex) {
                            \Log::error('Error sending email: ' . $ex->getMessage());
                        }
                    }
                }
            }
    }

}

