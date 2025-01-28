<?php

namespace App;

use App\Mail\General\User_Password_Reset_Mail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use App\Services\EmailService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    protected $guarded = [];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = [
        'last_visited_at' => 'datetime',
    ];
    protected $dates = ['deleted_at'];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (!$user->username) {
                // If the username is not provided, use the part before '@' in the email as the username
                $username = strstr($user->email, '@', true);
            } 
            else {
                // If the username is provided, use it directly
                $username = $user->username;
            }
        
            $unique_username = $username;
            $count = 1;
        
            // Check if the username already exists
            while (static::where('username', $unique_username)->exists()) {
                $unique_username = $username . '_' . $count++;
            }
            $user->username = $unique_username;
        });
    }

    public static function AddTokenToUser()
    {
        $user = Auth::user();
        $token = token_generator();
        $device_id = request('device_id');
        DeviceToken::where('device_id', $device_id)->delete();
        $user->login_tokens()->create([
            'token' => $token,
            'type' => request('device_type'),
            'device_id' => $device_id,
            'push_token' => request('push_token'),
        ]);
        return $token;
    }

    public function login_tokens(){
        return $this->hasMany(DeviceToken::class);
    }

    public static function password_reset($email = "", $flash = true, $str='', EmailService $emailService)
    {
        if($str=='admin') {
            $user = User::where('email', $email)
                    ->where('type', 'admin')
                    ->first();
        } elseif($str=='transporter'){
            $user = User::where('email', $email)
            ->where('type', 'car_transporter')
            ->first();
        } elseif($str=='user'){
            $user = User::where('email', $email)
            ->where('type', 'user')
            ->first();
        } else {
            $user = User::where('email', $email)->first();
        }
        if ($user) {
            if ($user->status == "active") {
                $user->update([
                    'reset_token' => genUniqueStr('',30,'users', 'reset_token', true)
                ]);
                //Mail::to($user->email)->send(new User_Password_Reset_Mail($user));
                try {
                    $email_to = $user->email;
                    $maildata = [
                        'reset_token' => $user->reset_token, // Ensure reset_token is set
                        'page_type' => $str
                    ];
                    $htmlContent = view('mail.General.reset_account_password', ['data' => $maildata])->render();
                    $emailService->sendEmail($email_to, $htmlContent, 'Reset Password');
                } catch (\Exception $ex) {
                    Log::error('Error sending email: ' . $ex->getMessage());
                }
                if ($flash) {
                    success_session('Email sent Successfully');
                } else {
                    return ['status' => true, 'message' => 'Email sent Successfully'];
                }
            } else {
                if ($flash) {
                    error_session('User account disabled by administrator');
                } else {
                    return ['status' => false, 'message' => 'Email sent Successfully'];
                }
            }
        } else {
            if ($flash) {
                error_session(__('api.err_email_not_exits'));
            } else {
                return ['status' => false, 'message' => __('api.err_email_not_exits')];
            }
        }
    }


    public function scopeSimpleDetails($query)
    {
        return $query->select(['id', 'username', 'name', 'profile_image','email']);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getNameAttribute($val)
    {
        return $val??'';
    }

    public function getAddressAttribute($val)
    {
        return $val??'';
    }

    public function getLatitudeAttribute($val)
    {
        return $val??'';
    }

    public function getLongitudeAttribute($val)
    {
        return $val??'';
    }

    public function getProfileImageAttribute($val)
    {
        return checkFileExist($val);
    }

    public function scopeGenerateResetToken($query, Request $request): string
    {
        $reset_token = genUniqueStr("users", "reset_token", "", 50, TRUE);

        $query->whereNull("deleted_at")->where('country_code', $request->country_code)
            ->where('mobile', $request->mobile)->update([
                "reset_token" => $reset_token
            ]);

        return $reset_token;
    }


    public function scopeAdminSearch($query, $search)
    {
        // $query->where('mobile', 'like', "%$search%")
        //     ->orWhere('country_code', 'like', "%$search%")
        //     ->orWhere('email', 'like', "%$search%")
        //     ->orWhere('name', 'like', "%$search%")
        //     ->orWhere('username', 'like', "%$search%");

            $query->Where('email', 'like', "%$search%")
            ->orWhere('name', 'like', "%$search%")
            ->orWhere('mobile', 'like', "%$search%")
            ->orWhere('username', 'like', "%$search%");
    }
    public function saveUser($data=[],$user_id=0,$user=null){
        if(!empty($user)){
            //
        }
        else if($user_id > 0){
            $user = $this->find($user_id);
        }
        else{
            $user = new User();
        }

        $user->fill($data);
        $user->save();
        return $user;
    }

    public function social_logins()
    {
        return $this->hasMany(SocialAccount::class);
    }

    public function merchant_info(){
        return $this->hasOne(MerchantInfo::class,'user_id','id');
    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'user_freinds', 'sender_id', 'receiver_id')->where('user_freinds.status', '=', 'accepted');
    }

    public function pendingFriendRequest()
    {
        return $this->belongsToMany(User::class, 'user_freinds', 'receiver_id', 'sender_id')->where(['user_freinds.status'=>'pending']);
    }

    public function acceptedFriendRequest()
    {
        return $this->hasMany(UserFreind::class,'receiver_id','id')->where('user_freinds.status', '=', 'accepted');
    }
    public function companyDetail()
    {
        return $this->hasOne(CompanyDetail::class); // Assuming one-to-one relationship
    }
    public function user_feedback()
    {
        return $this->hasMany(Feedback::class, 'transporter_id');
    }
}
