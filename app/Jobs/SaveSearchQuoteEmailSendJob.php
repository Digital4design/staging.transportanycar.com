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

class SaveSearchQuoteEmailSendJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public $savedSearches,public $quote)
    {
        $this->savedSearches = $savedSearches;
        $this->quote = $quote;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    // public function handle()
    // {
    //     // dd('yessssss');
    //     $emailService = new EmailService;
    //     $savedSearches = $this->savedSearches;
    //     $quote = $this->quote;
    //     foreach ($savedSearches as $savedSearch) {
    //         $transporter = DB::table('users')
    //             ->where('id', $savedSearch->user_id)
    //             ->where('status', 'active')
    //             ->where('type', 'car_transporter')
    //             ->where('is_status', 'approved')
    //             ->whereNull('deleted_at')
    //             ->first();

    //         if ($transporter) {
    //             $mailData = [
    //                 'id' => $quote['quotation_id'],
    //                 'vehicle_make' => $quote['vehicle_make'],
    //                 'vehicle_model' => $quote['vehicle_model'],
    //                 'vehicle_make_1' => $quote['vehicle_make_1'],
    //                 'vehicle_model_1' => $quote['vehicle_model_1'],
    //                 'pickup_postcode' => $quote['pickup_postcode'],
    //                 'drop_postcode' => $quote['drop_postcode'],
    //                 'delivery_timeframe_from' => $quote['delivery_timeframe_from'] ?? null,
    //                 'starts_drives' => $quote['starts_drives'],
    //                 'starts_drives_1' => $quote['starts_drives_1'],
    //                 'how_moved' => $quote['how_moved'],
    //                 'distance' => $quote['distance'],
    //                 'duration' => $quote['duration'],
    //                 'map_image' => $quote['map_image'],
    //                 'delivery_timeframe' => $quote['delivery_timeframe'],
    //             ];
    //             try {
    //                 if ($transporter->job_email_preference){
    //                 $htmlContent = view('mail.General.transporter-new-job-received', ['quote' => $mailData])->render();
    //                 $subject = 'You have received a transport notification';
    //                 $emailService->sendEmail($transporter->email, $htmlContent, $subject);
    //                 // $emailService->sendEmail("harmeetsingh.d4d@gmail.com", $htmlContent, $subject);

    //                 Log::info("Save Search functionality success sending email to transporter for Quote ID:  {$transporter->email}");
    //                 }
    //             } catch (\Exception $ex) {
    //                 Log::error('Save Search functionality Error sending email to transporter for Quote ID: ' . $quote['quotation_id'] . ': ' . $ex->getMessage());
    //                 // return $ex->getMessage();
    //             }
    //         }
    //     }
    // }
    public function handle()
{
    $emailService = new EmailService;
    $savedSearches = $this->savedSearches;
    $quote = $this->quote;

    Log::info("🚀 SaveSearchQuoteEmailSendJob started. Quote ID: {$quote['quotation_id']}");

    foreach ($savedSearches as $savedSearch) {
        Log::info("🔍 Checking saved search for user_id: {$savedSearch->user_id}");

        $transporter = DB::table('users')
            ->where('id', $savedSearch->user_id)
            ->where('status', 'active')
            ->where('type', 'car_transporter')
            ->where('is_status', 'approved')
            ->whereNull('deleted_at')
            ->first();

        if ($transporter) {
            Log::info("✅ Transporter found: {$transporter->email}");

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
                if ($transporter->job_email_preference) {
                    Log::info("📧 Sending email to: {$transporter->email}");

                    $htmlContent = view('mail.General.transporter-new-job-received', ['quote' => $mailData])->render();
                    $subject = 'You have received a transport notification';
                    $emailService->sendEmail($transporter->email, $htmlContent, $subject);

                    Log::info("✅ Email sent successfully to: {$transporter->email} for Quote ID: {$quote['quotation_id']}");
                } else {
                    Log::info("ℹ️ Transporter has opted out of job emails: {$transporter->email}");
                }
            } catch (\Exception $ex) {
                Log::error("❌ Error sending email to transporter: {$transporter->email} for Quote ID: {$quote['quotation_id']}. Error: " . $ex->getMessage());
            }
        } else {
            Log::warning("⚠️ No valid transporter found for user_id: {$savedSearch->user_id}");
        }
    }

    Log::info("🏁 SaveSearchQuoteEmailSendJob completed for Quote ID: {$quote['quotation_id']}");
 }

}
