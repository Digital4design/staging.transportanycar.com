<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\CronLog;
use App\UserQuote;
use App\QuoteByTransporter;
use App\Feedback;
use App\Services\EmailService;
use Illuminate\Support\Facades\Log;

class SendFeedbackReminder extends Command
{
    protected $signature = 'send:feedback-reminder';
    protected $description = 'Send feedback reminder email to users periodically (every 7 days)';
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        parent::__construct();
        $this->emailService = $emailService;
    }

    public function handle()
    {
        
        try {
            // Step 1: Fetch all QuoteByTransporter records that need a feedback reminder
            $quotesWithoutFeedback = QuoteByTransporter::where('status', 'accept')
                ->whereNotIn('id', Feedback::pluck('quote_by_transporter_id')->toArray()) // Exclude records already in Feedback
                ->whereRaw('DATEDIFF(NOW(), updated_at)  IN (14, 28)') // Check if 2 weeks or more have passed
                ->get(['user_quote_id', 'user_id', 'id as quote_by_transporter_id', 'updated_at']);
        
            if ($quotesWithoutFeedback->isEmpty()) {
                CronLog::create([
                    'cron_name' => 'send:feedback-reminder',
                    'status' => true,
                    'error_message' => 'No eligible quotes found to send feedback reminders.'
                ]);
                return;
            }
        
            // Step 2: Get transporter details
            $transporterIds = $quotesWithoutFeedback->pluck('user_id');
            $transporterNames = \DB::table('users')
                ->whereIn('id', $transporterIds)
                ->pluck('username', 'id')
                ->toArray();
        
            // Step 3: Fetch UserQuotes for email preferences
            $userQuotes = UserQuote::join('users', 'users.id', '=', 'user_quotes.user_id')
                ->whereIn('user_quotes.id', $quotesWithoutFeedback->pluck('user_quote_id'))
                ->whereIn('user_quotes.status', ['ongoing', 'completed'])
                ->select('user_quotes.*', 'users.job_email_preference')
                ->get();
        
            if ($userQuotes->isEmpty()) {
                CronLog::create([
                    'cron_name' => 'send:feedback-reminder',
                    'status' => true,
                    'error_message' => 'No UserQuotes found to process for feedback reminders.'
                ]);
                return;
            }
        
            // Step 4: Process reminders
            foreach ($userQuotes as $userQuote) {
                try {
                    if ($userQuote->job_email_preference) { // Ensure the user allows emails
                        $quoteByTransporter = $quotesWithoutFeedback->firstWhere('user_quote_id', $userQuote->id);
                        $transporterName = $transporterNames[$quoteByTransporter->user_id] ?? 'Transporter';
        
                        $maildata['email'] = $userQuote->email;
                        $maildata['user_quotes'] = $userQuote;
                        $maildata['transporter_name'] = $transporterName;
                        $maildata['quote_by_transporter_id'] = $quoteByTransporter->quote_by_transporter_id;
        
                        // Send email
                        $htmlContent = view('mail.General.leave-feedback', ['data' => $maildata])->render();
                        $this->emailService->sendEmail(
                            $maildata['email'],
                            $htmlContent,
                            'Reminder: Leave Feedback for your ' . $maildata['user_quotes']->vehicle_make . ' ' . $maildata['user_quotes']->vehicle_model . ' Delivery'
                        );
        
                        // Step 5: Update the updated_at field for the current record
                        $quoteByTransporter->updated_at = now();
                        $quoteByTransporter->save();
                        Log::error('Feedback reminder to user to give feedback notification run and send successfully  '.$userQuote->id);
                        CronLog::create([
                            'cron_name' => 'send:feedback-reminder',
                            'status' => true,
                            'error_message' => 'Feedback reminder sent successfully to UserQuote ID: ' . $userQuote->id
                        ]);
                    }
                } catch (\Exception $ex) {
                    Log::error('Feedback reminder to user to give feedback notification run Error'.$userQuote->id . '. Error: ' . $ex->getMessage());
                    CronLog::create([
                        'cron_name' => 'send:feedback-reminder',
                        'status' => false,
                        'error_message' => 'Failed to send feedback reminder to UserQuote ID: ' . $userQuote->id . '. Error: ' . $ex->getMessage()
                    ]);
                }
            }

            Log::error('Feedback reminder to user to give feedback notification run  successfully');
        } catch (\Exception $e) {
            Log::error('Feedback reminder to user to give feedback notification run Error'. $e->getMessage());
            CronLog::create([
                'cron_name' => 'send:feedback-reminder',
                'status' => false,
                'error_message' => 'An error occurred while processing the cron job: ' . $e->getMessage()
            ]);
        }
    }
}
