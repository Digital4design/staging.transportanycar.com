<?php

namespace App\Http\Controllers\General;

use App\GeneralSettings;
use App\Http\Controllers\WebController;
use App\Http\Requests\Admin\General\PasswordUpdateRequest;
use App\User;
use App\VersionHistory;
use App\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class GeneralController extends WebController
{
    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }
    public function Panel_Login()
    {
        return view('general.login', [
            'header_panel' => false,
            'title' => __('admin.lbl_login'),
        ]);
    }

    public function login(Request $request)
    {
        $remember = ($request->remember) ? true : false;
        $request->validate(['email' => 'required', 'password' => 'required']);
        $find_field = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? "email" : "username";
        $creds = [$find_field => $request->email, 'password' => $request->password, 'type' => 'admin'];
        if (Auth::guard('admin')->attempt($creds, $remember)) {
            return redirect()->route(getDashboardRouteName('admin'));
        } else {
            $errors = [];

            $user = User::where($find_field, $request->email)->where('type', 'admin')->first();
            if (!$user) {
                $errors['email'] = 'Please enter valid email or username';
            }

            if (!Auth::guard("admin")->validate([$find_field => $request->email, 'password' => $request->password])) {
                $errors['password'] = 'Please enter valid password';
            }
            return redirect()->back()
                ->withErrors($errors)
                ->withInput();
        }
    }

    public function Panel_Pass_Forget()
    {
        return view('general.password_reset', [
            'header_panel' => false,
            'title' => __('admin.lbl_forgot_password'),
        ]);
    }

    public function ForgetPassword(Request $request)
    {
        $user = User::password_reset($request->email, false, 'admin', $this->emailService);
        if ($user['status'] == false || $user === null) {
            $errors['email'] = 'This email does not exist';
        } elseif ($user['status']) {
            $errors['success'] = 'Mail sent successfully';
        } else {
            $errors['email'] = 'Failed to send mail';
        }
        return redirect()->back()
            ->withErrors($errors)
            ->withInput();
    }


    public function totalusers()
    {
        $users = User::select(DB::raw('date(created_at) as userdate'), 'created_at', DB::raw('count(id) as totaluser'))->where('type', 'user')->groupBy('userdate')->get();

        $maindata = [];
        // echo $current_date_time = Carbon::now()->toDateTimeString();

        // die;


        if (count($users) > 0) {
            foreach ($users as $user) {

                $detail =  [];
                $detail[] = strtotime($user->userdate . ' 23:00:00') * 1000;
                $detail[] = $user->totaluser;
                $maindata[] = $detail;
            }
        }
        return $maindata;
    }


    public function Admin_dashboard(Request $request)
    {
        $user_data = $request->user();
        $user_selected_country = $user_data->country;
        return view('admin.general.dashboard', [
            'title' => __('admin.lbl_dashboard'),
            'user_count' => User::where(['type' => 'user'])->count(),
        ]);
    }


    public function get_update_password(Request $request)
    {
        $title = 'Change Password';
        $user_data = $request->user();
        $view = ($user_data->type == "vendor") ? 'vendor.general.update_password' : 'admin.general.update_password';
        return view($view, [
            'title' => $title,
            'breadcrumb' => breadcrumb([
                $title => route('admin.get_update_password'),
            ]),
        ]);
    }

    public function get_site_settings()
    {
        $title = 'Site setting';
        return view('admin.general.site_settings', [
            'title' => $title,
            'fields' => GeneralSettings::where('status', 'active')
                ->where('page', 'site_settings')
                ->orderBy('created_at', 'ASC')->get(),
            'breadcrumb' => breadcrumb([
                $title => route('admin.get_site_settings'),
            ]),
        ]);
    }
    public function get_smtp_settings()
    {
        $title = 'SMTP setting';
        return view('admin.general.smtp_settings', [
            'title' => $title,
            'fields' => GeneralSettings::where('status', 'active')
                ->where('page', 'smtp_settings')
                ->orderBy('order_number', 'DESC')->get(),
            'breadcrumb' => breadcrumb([
                $title => route('admin.get_smtp_settings'),
            ]),
        ]);
    }

    public function site_settings(Request $request)
    {
        $all_req = $request->except('_token');
        foreach ($all_req as $key => $value) {
            $setting = GeneralSettings::find($key);
            if ($request->hasFile($key)) {
                $up = $this->upload_file($key, 'admin_upload');
                if ($up) {
                    un_link_file($setting->value);
                    $setting->update(['value' => $up]);
                }
            } else {
                $setting->update(['value' => $value]);
            }
        }
        success_session(__('admin.site_setting_updated'));
        return redirect()->route('admin.get_site_settings');
    }


    public function smtp_settings(Request $request)
    {
        $all_req = $request->except('_token');
        foreach ($all_req as $key => $value) {
            $setting = GeneralSettings::find($key);
            if ($request->hasFile($key)) {
                $up = $this->upload_file($key, 'admin_upload');
                if ($up) {
                    un_link_file($setting->value);
                    $setting->update(['value' => $up]);
                }
            } else {
                $setting->update(['value' => $value]);
            }
        }
        success_session(__('admin.smtp_setting_updated'));
        return redirect()->route('admin.get_smtp_settings');
    }

    public function get_seo_settings()
    {
        $title = 'SEO setting';
        return view('admin.general.seo_settings', [
            'title' => $title,
            'fields' => GeneralSettings::where('status', 'active')
                ->where('page', 'seo_settings')
                ->orderBy('order_number', 'DESC')->get(),
            'breadcrumb' => breadcrumb([
                $title => route('admin.get_seo_settings'),
            ]),
        ]);
    }
    public function seo_settings(Request $request)
    {
        $all_req = $request->except('_token');
        foreach ($all_req as $key => $value) {
            $setting = GeneralSettings::find($key);
            if ($request->hasFile($key)) {
                $up = $this->upload_file($key, 'admin_upload');
                if ($up) {
                    un_link_file($setting->value);
                    $setting->update(['value' => $up]);
                }
            } else {
                $setting->update(['value' => $value]);
            }
        }
        success_session(__('admin.seo_setting_updated'));
        return redirect()->route('admin.get_seo_settings');
    }


    public function update_password(PasswordUpdateRequest $request)
    {
        $request->update_pass();
        return redirect()->back();
    }

    public function get_profile(Request $request)
    {
        $user_data = $request->user();
        $view = ($user_data->type == "vendor") ? 'vendor.general.profile' : 'general.profile';
        return view($view, [
            'title' => 'Profile',
            'user' => $user_data,
            'breadcrumb' => breadcrumb([
                'Profile' => route('admin.profile'),
            ])
        ]);
    }

    public function logout(Request $request)
    {
        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token to prevent fixation attacks
        $request->session()->regenerateToken();
        $name = getDashboardRouteName();
        Auth::guard('web')->logout();
        return redirect()->route($name);
    }

    public function admin_logout(Request $request)
    {
        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token to prevent fixation attacks
        $request->session()->regenerateToken();
        $name = getDashboardRouteName();
        Auth::guard('admin')->logout();
        return redirect()->route($name);
    }

    public function transporter_logout(Request $request)
    {
        // Check the authenticated user in the web guard
        // $user = Auth::guard('web')->user();

        // if ($user && $user->type == 'transporter') {
        //     // If the web guard user is a transporter, log out
        //     Auth::guard('web')->logout();
        // }
        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token to prevent fixation attacks
        $request->session()->regenerateToken();

        $name = getDashboardRouteName('transporter');
        Auth::guard('transporter')->logout();
        return redirect()->route($name);
    }

    public function availability_checker(Request $request)
    {
        $count = 0;
        $type = $request->type;
        $val = $request->val;
        $user_id = Auth::guard('admin')->id() ?? 0;
        if ($type == "username" || $type == "email") {
            $count = User::where($type, $val)->where('id', '!=', $user_id)->count();
        }
        return $count ? "false" : "true";
    }

    public function user_availability_checker(Request $request)
    {
        $id = $request->id ?? 0;
        $query = User::where('id', '!=', $id);
        if ($request->username) {
            $query = $query->where('username', $request->username);
        } elseif ($request->email) {
            $query = $query->where('email', $request->email);
        } elseif (($request->mobile ?? $request->number)) {
            $query = $query->where(['mobile' => $request->mobile ?? $request->number]);
        } else {
            return 'false';
        }
        // return $query;
        return $query->count() ? "false" : "true";
    }

    public function post_profile(Request $request)
    {
        $user_data = $request->user();
        $rules = [
            'profile_image' => ['file', 'image'],
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255', Rule::unique('users')->ignore($user_data->id)->whereNull('deleted_at')],
            'email' => ['required', 'max:255', Rule::unique('users')->ignore($user_data->id)->whereNull('deleted_at')],
        ];
        $req = $request->validate($rules);
        $user_data->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->npassword,
        ]);
        $profile_image = $user_data->getRawOriginal('profile_image');

        if ($request->hasFile('profile_image')) {
            $up = upload_file('profile_image', 'user_profile_image');
            if ($up) {
                un_link_file($profile_image);
                $profile_image = $up;
                $user_data->update([
                    'profile_image' => $profile_image,
                ]);
            }
        }
        success_session('Profile Updated successfully');
        return redirect()->back();
    }

    public function forgot_password_view($token)
    {
        //        $user = User::where(['status' => 'active', 'reset_token' => $token])->first();
        //        if ($user) {
        return view('general.reset_password', [
            'token' => $token,
            'header_panel' => false,
            'title' => 'Password reset',
        ]);
        //        }
        //        error_session('Invalid password token');
        //        return redirect()->route('admin.login');
    }

    public function forgot_password_post(Request $request)
    {
        $user = User::password_reset($request->email, false, 'user', $this->emailService);
        if ($user === null) {
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

    public function adminUpdatePassword(Request $request)
    {
        $user = User::where('reset_token', $request->reset_token)->first();
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'Invalid reset token.']);
        }
        $user->password = $request->cnf_password;
        $user->reset_token = null;
        $user->save();
        return response()->json(['status' => true, 'message' => 'Password reset successfully']);
    }


    public function ClearCache()
    {
        Artisan::call('optimize:clear');
        return "Cleared!";
    }

    public function check_old_password(Request $request)
    {
        if ($request['page_type'] == 'admin')
            $user_data = Auth::guard('admin')->user();
        elseif ($request['page_type'] == 'transporter')
            $user_data = Auth::guard('transporter')->user();
        $password = $request->opassword;
        if (Hash::check($password, $user_data->password)) {
            return 'true';
        } else {
            return 'false';
        }
    }

    public function check_new_password(Request $request)
    {
        if ($request['page_type'] == 'admin')
            $user_data = Auth::guard('admin')->user();
        elseif ($request['page_type'] == 'transporter')
            $user_data = Auth::guard('transporter')->user();
        $password = $request->npassword;
        if (!Hash::check($password, $user_data->password)) {
            return 'true';
        } else {
            return 'false';
        }
    }

    public function get_email_template()
    {
        $title = 'Email template';
        return view('admin.general.email_template', [
            'title' => $title,
            'fields' => GeneralSettings::where('status', 'active')
                ->where('page', 'email_template')
                ->orderBy('order_number', 'DESC')->get(),
            'breadcrumb' => breadcrumb([
                $title => route('admin.get_email_template'),
            ]),
        ]);
    }

    public function email_template(Request $request)
    {
        $all_req = $request->except('_token');
        foreach ($all_req as $key => $value) {
            $setting = GeneralSettings::find($key);
            if ($request->hasFile($key)) {
                $up = $this->upload_file($key, 'admin_upload');
                if ($up) {
                    un_link_file($setting->value);
                    $setting->update(['value' => $up]);
                }
            } else {
                $setting->update(['value' => $value]);
            }
        }
        success_session(__('admin.email_template_updated'));
        return redirect()->route('admin.get_email_template');
    }
}
