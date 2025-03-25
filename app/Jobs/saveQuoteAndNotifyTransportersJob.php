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

class saveQuoteAndNotifyTransportersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $timeout = 0; 
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public $quoteData)
    {
        // $this->all_transport = $all_transport;
        $this->quoteData = $quoteData;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $emailService = new EmailService;
        $all_transport = user::where('type', 'car_transporter')->where('is_status', 'approved')->where('new_job_alert','1')->get();

        $quoteData = $this->quoteData;
        foreach ($all_transport as $index=> $transporter) {
           
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
                    
                        $htmlContent = view('mail.General.transporter-new-job-received', ['quote' => $mailData])->render();
                        $subject = 'You have received a transport notification';
                        $emailService->sendEmail($transporter->email, $htmlContent, $subject);
                        // $emailService->sendEmail("kartik.d4d@gmail.com", $htmlContent, $subject);

                        Log::info("quote functionality sending email to transporter: #{$index} {$transporter}  {$transporter->email} ");
                   
                } catch (\Exception $ex) {
                    Log::error('error quote functionality sending email to transporter: ' . $ex->getMessage());
                    // return $ex->getMessage();
                }
           
        }
    }
}
