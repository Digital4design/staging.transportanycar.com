<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $guarded = [];
    protected $fillable = ['transporter_id', 'rating', 'comment', 'quote_by_transporter_id','first_name','user_id'];


    public function quote_by_transporter()
    {
        return $this->hasOne(QuoteByTransporter::class, 'id', 'quote_by_transporter_id');
    }
}
