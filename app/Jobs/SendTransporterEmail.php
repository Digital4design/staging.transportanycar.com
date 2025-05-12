<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Services\EmailService; // Make sure to import the EmailService

class SendTransporterEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //$transporters = User::where(['type' => 'car_transporter', 'status' => 'active'])->get();
        $transporters = ['subham.k@ptiwebtech.com','info@transportanycar.com'];

        foreach ($transporters as $transporter) {
             // send to transporter new job mail
             $emailService = app(EmailService::class);
             try {
                $htmlContent = view('mail.General.transporter-new-job-received')->render();
                $emailService->sendEmail($transporter, $htmlContent, 'New transporter job alert!');
            } catch (\Exception $ex) {
                \Log::error('Error sending email to transporter: ' . $ex->getMessage());
            }
        }
    }
}
