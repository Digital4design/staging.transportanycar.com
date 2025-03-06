<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQuote extends Model
{
    protected $table = "user_quotes";
    protected $guarded = [];

    public function getUser()
    {
        return $this->belongsTo(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // d4d developer - k
    public function watchlist()
    {
        return $this->belongsTo(Watchlist::class, 'id', 'user_quote_id')->where('user_id', auth()->id());
    }
    public function watchlists()
    {
        return $this->hasMany(Watchlist::class, 'user_quote_id'); // Adjust the foreign key if necessary
    }
    // end d4d developer - k
    public function getDistanceAttribute($value)
    {
        return (float) filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    }

    public function quoteByTransporter()
    {
        return $this->hasOne(QuoteByTransporter::class);
    }

    public function quoteByTransporterCheck()
    {
        return $this->hasOne(QuoteByTransporter::class)->where('user_id', auth()->id());
    }

    public function quotationDetail()
    {
        return $this->hasOne(QuotationDetail::class, 'user_quote_id');
    }

    public function getImageAttribute($val)
    {
        return checkCarFileExist($val);
    }

    public function getMapImageAttribute($val)
    {
        return checkFileExist($val);
    }
    public function notification_thread()
    {
        return $this->hasOne(Thread::class, 'user_quote_id');
    }
    public function thread_jobinfo()
    {
        return $this->hasOne(Thread::class, 'user_quote_id')->where('user_id', auth()->id());
    }
}
