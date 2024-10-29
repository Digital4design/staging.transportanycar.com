<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileVerification extends Model
{
    use HasFactory;

    protected $fillable = [
        "mobile_number",
        "otp_code",
        "otp_expires_at"
        // Add other fields as needed
    ];
}
