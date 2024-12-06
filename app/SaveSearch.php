<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveSearch extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','search_name','pick_area','drop_area','pick_lat','drop_lat','email_notification'];
}
