<?php

namespace App\Http\Controllers\Front;

use App\Content;
use App\Faq;
use App\Http\Controllers\WebController;
use App\User;
use App\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


class GuestController extends WebController
{
    protected $emailService;
    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }
    public function index()
    {
        Cache::forget('location_info');
        return view('front.index', [
            'title' => 'Online Car Transporting Network',
        ]);
    }

    public function privacyPolicy()
    {
        $data = Content::where('slug', 'privacy_policy')->first();
        if ($data) {
            return view('front.privacy_policy', [
                    'data' => $data,
                    'title' => $data->title,
                ]
            );
        }
        return redirect()->back();
    }

    public function termCondition()
    {
        $data = Content::where('slug', 'term_condition')->first();
        if ($data) {
            return view('front.terms_condition',[
                    'data' => $data,
                    'title' => $data->title,
                ]
            );
        }
        return redirect()->back();
    }

    public function faq()
    {
        $data = Faq::orderBy('id','desc')->get();
        if ($data) {
            return view('front.faq',[
                    'data' => $data,
                    'title' => 'Faqs',
                ]
            );
        }
        return redirect()->back();
    }

    public function login()
    {
        return view('front.guest.login');
    }

    public function loginPost(Request $request)
    {
        $remember = ($request->remember) ? true : false;
        $remember = true;
        $request->validate(['email' => 'required','password' => 'required']);
        $find_field = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? "email" : "username";
        $creds = [$find_field => $request->email, 'password' => $request->password, 'type' => 'user'];
        if (Auth::guard("web")->attempt($creds, $remember)) {
            if (Auth::guard("web")->user()->status == 'active') {
                Auth::loginUsingId(Auth::guard("web")->user()->id);
                 // Check for unsub query parameter and redirect accordingly
                if ($request->has('unsub') && $request->unsub != null) {
                    return redirect()->route('front.unsubscribe');
                }
                return redirect()->route('front.dashboard');
            } else {
                Auth::logout();
                return redirect()->route('front.login')->withErrors(['general' => 'Your account has been disabled, kindly contact the admin']);

            }
        } else {
            $errors = [];
    
            // Check if the email/username is incorrect
            $user = User::where($find_field, $request->email)->where('type', 'user')->first();
            if (!$user) {
                $errors['email'] = 'Please enter valid email or username';
            }
    
            if (!Auth::guard("web")->validate([$find_field => $request->email, 'password' => $request->password])) {
                $errors['password'] = 'Please enter valid password';
            }
            return redirect()->back()
                ->withErrors($errors)
                ->withInput();
        }
    }

    public function forgotPassword()
    {
        return view('front.guest.forgot_password', [
            'title' => 'Forgot password'
        ]);
    }

    public function webForgotPassword($token)
    {
        return view('front.guest.reset_password_view', [
            'token' => $token,
            'header_panel' => false,
            'title' => 'Password reset',
        ]);
    }

    public function forgotPasswordPost(Request $request)
    {
        
        $user = User::password_reset($request->email, false, 'user',$this->emailService);
        if ($user['status'] == false || $user === null) {
            $errors['email'] = 'This email does not exist';
        } elseif ($user['status']) {
            $errors['success'] = 'Email sent';
        } else {
            $errors['email'] = 'Failed to send mail';
        }
        return redirect()->back()
        ->withErrors($errors)
        ->withInput();
    }
    
    // public function updatePasswordPost(Request $request) {
    //     $user = User::where('reset_token', $request->reset_token)->first();
    //     if (!$user) {
    //         return response()->json(['status' => false, 'message' => 'Invalid reset token.']);
    //     }
    //     $user->password = $request->cnf_password;
    //     $user->reset_token = null;
    //     $user->save();
    //     return response()->json(['status' => true, 'message' => 'Password reset successfully']);
    // }

    public function contact()
    {
        return view('front.contact', [
            'title' => 'Contact',
        ]);
    }

    public function inquiry(Request $request)
    {
        try {
            $maildata['email'] = 'support@transportanycar.com';
            //$maildata['email'] = 'subham.k@ptiwebtech.com';
            $mailSubject = 'New contact form enquiry';
            $htmlContent = view('mail.General.inquiry', ['data' => $request])->render();
            $this->emailService->sendEmail($maildata['email'], $htmlContent, $mailSubject);
            return response()->json(['success' => true, 'message' => 'Message sent. we will contact ASAP.']);
        } catch (\Exception $ex) {
            Log::error('Error sending email: ' . $ex->getMessage());
            return response()->json(['success' => false, 'message' => 'Something went wrong!.. try again!.']);
        }
        //return redirect()->back();
    }
    public function unsubscribe(request $request)
    {
        $user = Auth::guard('web')->user();
        if ($user) {
                $status = $user->update(['job_email_preference' => 0]);
                return view('front.guest.unsubscribe', [
                    'title' => 'Unsubscribe',
                ]);
        }
        return redirect()->route('front.home');
    }
}
