<?php

namespace App\Http\Controllers\Transporter;

use App\Http\Controllers\WebController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\EmailService;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class GuestController extends WebController
{
   
    protected $emailService;
    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }
    public function index()
    {
        return view('transporter.index', [
            'title' => 'Home',
        ]);
    }

    public function login()
    {
        return view('transporter.guest.login');
    }

    public function loginPost(Request $request)
    {
        $remember = ($request->remember) ? true : false;
        $remember = true;
        $request->validate(['email' => 'required','password' => 'required']);
        $find_field = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? "email" : "username";
        $creds = [$find_field => $request->email, 'password' => $request->password, 'type' => 'car_transporter'];
        if (Auth::guard("transporter")->attempt($creds, $remember)) {
            if (Auth::guard("transporter")->user()->status == 'active') {
                // Check for unsub query parameter and redirect accordingly
                if ($request->has('unsub') && $request->unsub != null) {
                    return redirect()->route('transporter.profile');
                }
                Auth::loginUsingId(Auth::guard("transporter")->user()->id);
                // Retrieve and remove the share_quotation session if it exists
                $shareQuotation = $request->session()->pull('share_quotation');
                // If the share_quotation session exists, you can handle it here
                if ($shareQuotation !== null) {
                    return redirect()->route('transporter.new_jobs_new', ['share_quotation' => $shareQuotation]);
                } else {
                    // If no share_quotation session, redirect to the dashboard without it
                    return redirect()->route('transporter.new_jobs_new');
                }
            } else {
                Auth::logout();
                return redirect()->route('transporter.login')->withErrors(['general' => 'Your account has been disabled, kindly contact the admin.']);

            }
        } else {
            $errors = [];
    
            $user = User::where($find_field, $request->email)->where('type', 'car_transporter)')->first();
            if (!$user) {
                $errors['email'] = 'Please enter valid email or username';
            }
    
            if (!Auth::guard("transporter")->validate([$find_field => $request->email, 'password' => $request->password])) {
                $errors['password'] = 'Please enter valid password';
            }
            return redirect()->back()
                ->withErrors($errors)
                ->withInput();
        }
    }

    public function forgotPassword()
    {
        return view('transporter.guest.forgot_password', [
            'title' => 'Forgot password'
        ]);
    }

    public function forgotPasswordPost(Request $request)
    {
        $user = User::password_reset($request->email, false, 'transporter',$this->emailService);
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

    public function transForgotPassword($token)
    {
        return view('transporter.guest.reset_password_view', [
            'token' => $token,
            'header_panel' => false,
            'title' => 'Password reset',
        ]);
    }

    public function updatePasswordPost(Request $request) {
        $user = User::where('reset_token', $request->reset_token)->first();
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'Invalid reset token.']);
        }
        $user->password = $request->cnf_password;
        $user->reset_token = null;
        $user->save();
        return response()->json(['status' => true, 'message' => 'Password reset successfully']);
    }

    public function signup()
    {
         return view('transporter.guest.signup', [
             'title' => 'Signup'
         ]);
    }

    public function signupPost(Request $request)
    {
        //dd($request->all());
        // $request->validate([
        //     'full_name' => ['required'],
        //     'company_name' => ['required'],
        //     //'business_name' => ['required', 'max:255'],
        //     'username' => ['required', 'max:25', Rule::unique('users')->whereNull('deleted_at')],
        //     'main_email' => ['required', 'email', Rule::unique('users', 'email')->whereNull('deleted_at')],
        //     'country_code' => ['required'],
        //     'mobile' => ['required', 'numeric', Rule::unique('users')->where('country_code', $request->country_code)->whereNull('deleted_at')],
        //     'password' => ['required'],
        // ]);
        //temporary remove document section
        if ($request->hasFile('driver_license')) {
            $driver_license = upload_file('driver_license', 'user_profile_image');
        }
        if ($request->hasFile('motor_trade_insurance')) {
            $motor_trade_insurance = upload_file('motor_trade_insurance', 'user_profile_image');
        }
        $emailToUse = !empty($request->main_email) ? $request->main_email : $request->email;
        $user = User::create([
            'first_name' => $request->full_name,
            // 'last_name' => $request->last_name,
            'username' => $request->username ?? '',
            'name' => $request->company_name ?? '',
            'email' => $emailToUse,
            'password' => $request->password,
            'address_line_1' => $request->address_line1 ?? null,
            //'address_line_2' => $request->address_line2 ?? null,
            'postcode' => $request->postcode ?? null,
            'town' => $request->hidden_city ?? null,
            'county' => $request->hidden_country ?? null,
            'address' => $request->address ?? null,
            'lat' => $request->latitude ?? null,
            'lng' => $request->longitude ?? null,
            'country_code' => $request->country_code ?? null,
            'mobile' => $request->mobile,
            'type' => 'car_transporter',
            'job_email_preference' => 1,
            //'driver_license' => $driver_license ?? null,
            //'motor_trade_insurance' => $motor_trade_insurance ?? null,
            'profile_image' => config('constants.default.user_image'),
        ]);
        if ($user) {
            try {
                try {
                    // send to transporter welcome mail
                    $htmlContent = view('mail.General.new-message', ['user' => $user])->render();
                    $this->emailService->sendEmail($emailToUse, $htmlContent, 'Welcome to Transport Any Car');

                    // send to admin for transporter information
                    $admin_email = config('constants.default.admin_email');
                    $htmlContent1 = view('mail.General.new-transporter-signup-to-admin', ['user' => $user])->render();
                    $this->emailService->sendEmail($admin_email, $htmlContent1, 'New Transporter Signup');
                } catch (\Exception $ex) {
                    Log::error('Error sending email: ' . $ex->getMessage());
                }
            } catch (\Exception $ex) {
            }
            // Set a session variable to show the alert
            $request->session()->flash('show_transporter_alert', true);
            Auth::guard('transporter')->loginUsingId($user->id);
            return redirect()->route('transporter.profile');
        } else {
            error_session('Something went wrong');
            return redirect()->back();
        }
    }
}
