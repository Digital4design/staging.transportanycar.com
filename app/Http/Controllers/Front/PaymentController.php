<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\WebController;
use App\QuoteByTransporter;
use Illuminate\Http\Request;
use App\Services\EmailService;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\TransactionHistory;
use App\User;
use App\UserQuote;
use Illuminate\Support\Facades\Log;


class PaymentController extends WebController
{
    protected $emailService;
    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }
    public function checkout($id)
    {
        $quote = QuoteByTransporter::find($id);
        $transporter_name = User::where('id', $quote->user_id)->pluck('username')->first() ?? '-';
        return view('front.checkout', ['data' => $quote,'transporter_name'=>$transporter_name]);
    }

    public function processPayment(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $amountInPence = $request->input('items.amount') * 100;
        $paymentIntent = PaymentIntent::create([
            'amount' => $amountInPence, // amount in cents
            'currency' => 'gbp',
        ]);
        $payment_data = TransactionHistory::create([
            'user_id' => Auth::id(),
            'user_quote_id' => $request->input('items.user_quote_id'),
            'quote_by_transporter_id' => $request->input('items.quote_by_transporter_id'),
            'transaction_id' => $paymentIntent->id,
            'amount' => $paymentIntent->amount / 100, // Convert cents to dollars
            'status' => 'pending',
            'payment_method'=>'card',
            'description' => $paymentIntent->description,
            'currency' => $paymentIntent->currency
        ]);
        $output = [
            'clientSecret' => $paymentIntent->client_secret,
        ];
        return response()->json($output);
    }

    public function paymentConfirm(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $paymentIntentId = $request->input('payment_intent');
        try {
            \Log::info('Starting payment confirmation', ['payment_intent' => $paymentIntentId]);
            $paymentIntent = PaymentIntent::retrieve($paymentIntentId);
            if ($paymentIntent->status !== 'succeeded') {
                $paymentIntent->confirm();
            } else {
                \Log::info('PaymentIntent already succeeded', ['payment_intent' => $paymentIntentId]);
            }
            $transaction = TransactionHistory::where('transaction_id', $paymentIntent->id)->firstOrFail();
            $quoteId = $transaction->user_quote_id;
            $quote_by_transporter_id = $transaction->quote_by_transporter_id;
            $transaction->status = 'completed';
            $transaction->delivery_reference_id = 'TAC' . rand(10000, 99999);
            $transaction->payment_method = $paymentIntent->payment_method;
            $transaction->description = $paymentIntent->description ?? 'Payment successful';
            $transaction->save();
            // Update job status
            $quote = QuoteByTransporter::where('id', $quote_by_transporter_id)->first();
            $quote->update(['status' => 'accept']);
            $user_quote = UserQuote::where('id', $quoteId)->first();
            $user_quote->update(['status' => 'ongoing']);
            $data['deposit'] = isset($transaction->amount) ? $transaction->amount : '';
            $data['transporter_name'] = User::where('id', $quote->user_id)->pluck('username')->first() ?? '-';
            $data['transaction_id'] = isset($transaction->transaction_id) ? $transaction->transaction_id : '';
            $data['delivery_reference_id'] = isset($transaction->delivery_reference_id) ? $transaction->delivery_reference_id : '';
            $data['user_email'] = isset(Auth::user()->email) ? Auth::user()->email : '';
            $data['quoteId'] = $quoteId;
            $data['quote_by_transporter_id'] = $quote->id;
            //Optionally send email (uncomment and adjust as necessary)


$user=User::find($quote->user_id);
// return $user->email;
            $email_to = $user->email;;
            $subject = "confirm booking";
            //$email_to = 'info@transportanycar.com';
            $maildata['quotation'] = $quote;
            $maildata['transporter_name'] =$data['transporter_name'];
            $maildata['booking_ref'] = isset($transaction->delivery_reference_id) ? $transaction->delivery_reference_id : '';
            $htmlContent = view('mail.General.quote-accepted-booking-mailtransporter', ['data' => $maildata])->render();
            $this->emailService->sendEmail($email_to, $htmlContent, $subject);


            try {
                if($quote->quote->user->job_email_preference) {
                    $email_to = $quote->quote->user->email;
                    $subject = 'Booking confirmation for delivery of your '.$quote->quote->vehicle_make.' '.$quote->quote->vehicle_model;
                    //$email_to = 'info@transportanycar.com';
                    $maildata['quotation'] = $quote;
                    $maildata['transporter_name'] =$data['transporter_name'];
                    $maildata['booking_ref'] = isset($transaction->delivery_reference_id) ? $transaction->delivery_reference_id : '';
                    $htmlContent = view('mail.General.quote-accepted-booking-confirmation', ['data' => $maildata])->render();
                    $this->emailService->sendEmail($email_to, $htmlContent, $subject);
                } else {
                    Log::info('User with email ' . $quote->quote->user->email . ' has opted out of receiving emails. Payment email not sent.');
                }
            } catch (\Exception $ex) {
                \Log::error('Error sending email to transporter: ' . $ex->getMessage());
            }

            // Call create_notification to notify the user
            create_notification(
                $quote->user_id, 
                Auth::id(),
                $quoteId,       
                'You’ve won a job!',
                (isset(Auth::user()->username) ? Auth::user()->username : '') . ' has accepted your quote.',  // Message of the notification
                'won_job',
                $quote_by_transporter_id
            );
            
            \Log::info('Payment confirmation successful', ['payment_intent' => $paymentIntentId]);
    
            return view('front.payment_confirm',$data);
        } catch (\Exception $e) {
            \Log::error('Error in payment confirmation', ['error' => $e->getMessage(), 'payment_intent' => $paymentIntentId]);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
        return view('front.payment_confirm');

    }
}
