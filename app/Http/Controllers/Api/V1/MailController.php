<?php

namespace App\Http\Controllers\Api\V1;

use App\DeviceToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ResponseController;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use App\Services\EmailService;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Facades\Mail;



class MailController extends ResponseController
{
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }
    public function sendEmail(Request $request)
    {
        $validation = $this->apiValidation([
            'email' => 'required|email',
            'template' => 'required|string',
            'user' => 'required|array'
        ]);
        if (!$validation) {
            return $this->sendError(null, null);
        }
        try {
            $htmlContent = view($request->template, ['user' => $request->user])->render();
            $this->emailService->sendEmail($request->email, $htmlContent, $request->subject); // Corrected variable name
            return $this->sendResponse(200, 'Email sent successfully.');
        } catch (\Exception $ex) {
            return $this->sendError('Email could not be sent.', null);
        }
    }

    public function transporterEmailVerify(Request $request)
    {
        
        $emailService = app(EmailService::class);
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'user' => 'required|array',
            'user.first_name' => 'required|string',
            'user.name' => 'required|string',
            'user.username' => 'required|string',
        ]);

        // Find the user by the provided email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }
    
        try {
          
            $verificationToken = Str::random(60);
            
            // Store the verification token in the database
            $user->email_verification_token = $verificationToken;
            $user->save();
 
            $verificationLink = url("/transporter/verify-email/{$verificationToken}");
            $htmlContent = view('mail.General.transporterEmailVerify', [
                'verificationLink' => $verificationLink,
                'name'=> $user->first_name,
            ])->render();
          
            $emailService->sendEmail($request->email, $htmlContent, $request->subject);

            return response()->json(['message' => 'Verification email sent successfully.']);

        } catch (\Exception $ex) {
            Log::error('Error sending email: ' . $ex->getMessage());
        }
       
    }

    public function verifyEmail($token)
    {

       
        // Find the user by the verification token
        $user = User::where('email_verification_token', $token)->first();

        if (!$user) {
            return redirect('/transporter/profile')->with('error', 'Invalid verification link.');
        }

        // Mark the email as verified
        $user->email_verify_status = '1';
        $user->email_verification_token = null;
        $user->save();

        // return redirect('url("/transporter')->with('success', 'Your email has been verified.');
        return redirect('/transporter/profile')->with('success', 'Your email has been verified.');
    }
}
