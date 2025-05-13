<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\User;
use App\Services\EmailService;
use Illuminate\Support\Facades\Log;

class saveQuoteAndNotifyTransportersJob implements ShouldQueue

{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 0;

    public function __construct(public $quoteData)
    {
        $this->quoteData = $quoteData;
        Log::info("Job instantiated with quoteData:", $this->quoteData);
    }

    public function handle()
    {
        // Log::info("saveQuoteAndNotifyTransportersJob started.");

        // $emailService = new EmailService;

        // Log::info("Fetching transporters...");
        // $all_transport = User::where('type', 'car_transporter')
        //     ->where('is_status', 'approved')
        //     ->where('new_job_alert', '1')
        //     ->whereNull('deleted_at')
        //     ->get();

        // Log::info("Total transporters found: " . $all_transport->count());

        // $quoteData = $this->quoteData;

        // foreach ($all_transport as $index => $transporter) {
        //     Log::info("Preparing email for transporter #{$index}: {$transporter->email}");

        //     $mailData = [
        //         'id' => $quoteData['quotation_id'] ?? null,
        //         'vehicle_make' => $quoteData['vehicle_make'] ?? null,
        //         'vehicle_model' => $quoteData['vehicle_model'] ?? null,
        //         'vehicle_make_1' => $quoteData['vehicle_make_1'] ?? null,
        //         'vehicle_model_1' => $quoteData['vehicle_model_1'] ?? null,
        //         'pickup_postcode' => $quoteData['pickup_postcode'] ?? null,
        //         'drop_postcode' => $quoteData['drop_postcode'] ?? null,
        //         'delivery_timeframe_from' => $quoteData['delivery_timeframe_from'] ?? null,
        //         'starts_drives' => $quoteData['starts_drives'] ?? null,
        //         'starts_drives_1' => $quoteData['starts_drives_1'] ?? null,
        //         'how_moved' => $quoteData['how_moved'] ?? null,
        //         'distance' => $quoteData['distance'] ?? null,
        //         'duration' => $quoteData['duration'] ?? null,
        //         'map_image' => $quoteData['map_image'] ?? null,
        //         'delivery_timeframe' => $quoteData['delivery_timeframe'] ?? null,
        //     ];

        //     try {
        //         Log::debug("Generating HTML for email with mailData:", $mailData);
        //         $htmlContent = view('mail.General.transporter-new-job-received', ['quote' => $mailData])->render();

        //         $subject = 'You have received a transport notification';

        //         $emailService->sendEmail($transporter->email, $htmlContent, $subject);

        //         Log::info("Email sent successfully to: {$transporter->email}");
        //     } catch (\Exception $ex) {
        //         Log::error("Failed to send email to {$transporter->email}: " . $ex->getMessage());
        //     }
        // }

        // Log::info("saveQuoteAndNotifyTransportersJob completed.");
        try {
            Log::info("saveQuoteAndNotifyTransportersJob started.");

            // everything inside here...

            Log::info("saveQuoteAndNotifyTransportersJob completed.");
        } catch (\Throwable $e) {
            Log::error("Unhandled exception in handle(): " . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
        }
    }
}
