<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SmsService
{
    protected $twilioSid;
    protected $twilioAuthToken;
    protected $twilioFrom;

    public function __construct()
    {
        $this->twilioSid = env('TWILIO_SID');
        $this->twilioAuthToken =env('TWILIO_AUTH_TOKEN');
        $this->twilioFrom = env('TWILIO_FORM');
    }

    /**
     * Send SMS to a given phone number
     *
     * @param string $to
     * @param string $message
     * @return mixed
     */
    public function sendSms($to, $message)
    {
        $response = Http::withBasicAuth($this->twilioSid, $this->twilioAuthToken)->asForm()
            ->post("https://api.twilio.com/2010-04-01/Accounts/{$this->twilioSid}/Messages.json", [
                'From' => $this->twilioFrom,
                'To' => "+44".$to,
                'Body' => $message,
            ]);

        // Return the response or handle error
        if ($response->successful()) {
            return $response->json(); // Successful response
        } else {
            // Log or throw error
            return $response->json(); // Handle errors here
        }
    }
}
