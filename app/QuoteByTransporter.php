<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuoteByTransporter extends Model
{
    protected $table = "quote_by_transpoters";
    protected $guarded = [];

    public function getTransporters()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function quote()
    {
        return $this->hasOne(UserQuote::class, 'id', 'user_quote_id');
    }
    public function feedback()
    {
        return $this->hasOne(Feedback::class, 'id', 'quote_by_transporter_id');
    }

    public function thread()
    {
        return $this->hasOne(Feedback::class, 'id', 'quote_by_transporter_id');
    }
    public function transporter_quote()
    {
        return $this->hasOne(UserQuote::class, 'id', 'user_quote_id')->where('status', 'completed');
    }
}
