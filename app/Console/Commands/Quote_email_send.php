<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Services\EmailService;

class Quote_email_send extends Command
{

    protected $signature = 'send:quote_email_sent {pickup_postcode?} {drop_postcode?}';
    protected $description = 'Send an email every minute';
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        parent::__construct();
        $this->emailService = $emailService;
    }
    public function handle()
    {
        $pickupPostcode = $this->argument('pickup_postcode');
        $dropPostcode = $this->argument('drop_postcode');

        // Log the received postcodes for debugging
        \Log::info('Pickup Postcode: ' . $pickupPostcode);
        \Log::info('Drop Postcode: ' . $dropPostcode);


        $transporter = DB::table('save_searches')
            ->join('users', function ($join) {
                $join->on('users.id', '=', 'save_searches.user_id')
                    ->where('users.status', 'active')
                    ->where('users.type', 'car_transporter')
                    ->where('users.is_status', 'approved');
            })
            ->where(function ($query) use ($pickupPostcode) {
                $query->where(DB::raw('LOWER(save_searches.pick_area)'), 'LIKE', '%' . strtolower($pickupPostcode) . '%');
            })
            ->where(function ($query) use ($dropPostcode) {
                $query->where(DB::raw('LOWER(save_searches.drop_area)'), 'LIKE', '%' . strtolower($dropPostcode) . '%')
                    ->orWhereNull('save_searches.drop_area') // Match if drop_area is NULL
                    ->orWhere('save_searches.drop_area', 'anywhere'); // Match if drop_area is 'anywhere'
            })
            ->where('save_searches.email_notification', true)
            ->groupBy('users.id')
            ->get();
        \Log::info('Email sent successfully for emails: ' . $transporter);
        // $emails = DB::table('users')
        //     ->where('status', 'active')
        //     ->where('type', 'car_transporter')
        //     ->where('is_status', 'approved')
        //     ->where('job_email_preference', 1)
        //     ->pluck('email'); // This already returns a simple array of emails

        // Map the emails to the format required by Mandrill
        // $toEmails = $emails->map(function($email) {
        //     return ['email' => $email, 'type' => 'to'];
        // })->toArray();

        $quotes = DB::table('user_quotes')
            ->where('email_sent', 0)
            ->orderBy('id', 'asc')
            ->get();
        foreach ($transporter as $email) {
            if ($email->job_email_preference == 1) {
                foreach ($quotes as $quote) {
                    $mailData = [
                        'id' => $quote->id,
                        'vehicle_make' => $quote->vehicle_make,
                        'vehicle_model' => $quote->vehicle_model,
                        'vehicle_make_1' => $quote->vehicle_make_1,
                        'vehicle_model_1' => $quote->vehicle_model_1,
                        'pickup_postcode' => formatAddress($quote->pickup_postcode),
                        'drop_postcode' => formatAddress($quote->drop_postcode),
                        'delivery_timeframe_from' => isset($quote->delivery_timeframe_from) ? $quote->delivery_timeframe_from : null,
                        'starts_drives' => $quote->starts_drives == 1 ? 'Yes' : 'No',
                        'starts_drives_1' => $quote->starts_drives_1,
                        'how_moved' => $quote->how_moved,
                        'distance' => $quote->distance,
                        'duration' => $quote->duration,
                        'map_image' => $quote->map_image,
                        'delivery_timeframe' => $quote->delivery_timeframe
                    ];

                    try {
                        // Generate email content
                        $htmlContent = view('mail.General.transporter-new-job-received', ['quote' => $mailData])->render();
                        $subject = 'You have received a transport notification';

                        // Send the email
                        $this->emailService->sendEmail($email->email, $htmlContent, $subject);

                        // Update email_sent status


                        \Log::info('Email sent successfully for Quote ID: ' . $quote->id);
                    } catch (\Exception $ex) {
                        \Log::error('Error sending email to transporter: ' . $ex->getMessage());
                    }
                }
            }
        }
        DB::table('user_quotes')
        ->where('id', $quote->id)
        ->update(['email_sent' => 1]);
    }
}
