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
            $feedbackQuoteIds = Feedback::pluck('quote_by_transporter_id')->toArray();
            $quotesWithoutFeedback = QuoteByTransporter::where('status', 'accept')
                ->whereNotIn('id', $feedbackQuoteIds)
                ->get(['user_quote_id', 'user_id','id as quote_by_transporter_id']); // Retrieve both user_quote_id and user_id
            if ($quotesWithoutFeedback->isEmpty()) {
                CronLog::create([
                    'cron_name' => 'send:feedback-reminder',
                    'status' => true,
                    'error_message' => 'No quotes found to send feedback reminders.'
                ]);
                return;
            }
            // Fetch transporter IDs
            $transporterIds = $quotesWithoutFeedback->pluck('user_id');

            // Get transporter names
            $transporterNames = \DB::table('users')
                ->whereIn('id', $transporterIds)
                ->pluck('username', 'id') // Fetch names with IDs
                ->toArray();
            // Step 3: Get user quotes with email preferences and feedback reminder not yet sent
            $userQuotes = UserQuote::join('users', 'users.id', '=', 'user_quotes.user_id')
                ->whereIn('user_quotes.id', $quotesWithoutFeedback->pluck('user_quote_id'))
                ->whereIn('user_quotes.status', ['ongoing', 'completed'])
                ->select('user_quotes.*', 'users.job_email_preference')
                ->get();
            if ($userQuotes->isEmpty()) {
                CronLog::create([
                    'cron_name' => 'send:feedback-reminder',
                    'status' => true,
                    'error_message' => 'No UserQuotes found to process for feedback reminder.'
                ]);
                return;
            }
            foreach ($userQuotes as $userQuote) {
                $cronStatuses = json_decode($userQuote->cron_statuses, true);
                if (!is_array($cronStatuses)) {
                    $cronStatuses = [];
                }
                // Check if feedback reminder was already sent
                if (array_key_exists('leave_feedback_reminder', $cronStatuses) && $cronStatuses['leave_feedback_reminder'] === true) {
                    continue; // Skip if reminder was already sent
                }
                try {
                    // Step 4: Send feedback reminder email
                    if ($userQuote->job_email_preference) { // Check if email preference allows sending emails
                        $quoteByTransporter = $quotesWithoutFeedback->firstWhere('user_quote_id', $userQuote->id);
                        $transporterName = $transporterNames[$quotesWithoutFeedback->firstWhere('user_quote_id', $userQuote->id)->user_id] ?? 'Transporter'; // Get the transporter's name
                        $maildata['email'] = $userQuote->email;
                        $maildata['user_quotes'] = $userQuote;
                        $maildata['transporter_name'] = $transporterName;
                        $maildata['quote_by_transporter_id'] = $quoteByTransporter->quote_by_transporter_id; // Include transporter name in the email data
                        $htmlContent = view('mail.General.leave-feedback', ['data' => $maildata])->render();
                        $this->emailService->sendEmail($maildata['email'], $htmlContent, 'Leave Feedback for your'.$maildata['user_quotes']->vehicle_make.' '.$maildata['user_quotes']->vehicle_model.'Delivery in a Few Seconds');
                        // Update cron status for feedback reminder
                        $cronStatuses['leave_feedback_reminder'] = true;
                        $userQuote->cron_statuses = json_encode($cronStatuses);
                        $userQuote->save();
                        CronLog::create([
                            'cron_name' => 'send:feedback-reminder',
                            'status' => true,
                            'error_message' => 'Feedback reminder sent successfully to UserQuote ID: ' . $userQuote->id
                        ]);
                    }
                } catch (\Exception $ex) {
                    // Handle email sending failure
                    $cronStatuses['leave_feedback_reminder'] = false;
                    $userQuote->cron_statuses = json_encode($cronStatuses);
                    $userQuote->save();
                    CronLog::create([
                        'cron_name' => 'send:feedback-reminder',
                        'status' => false,
                        'error_message' => 'Failed to send feedback reminder to UserQuote ID: ' . $userQuote->id . '. Error: ' . $ex->getMessage()
                    ]);
                }
            }
        } catch (\Exception $e) {
            CronLog::create([
                'cron_name' => 'send:feedback-reminder',
                'status' => false,
                'error_message' => 'An error occurred while processing the cron job: ' . $e->getMessage()
            ]);
        }
    }
}
