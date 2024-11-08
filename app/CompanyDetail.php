<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDetail extends Model
{
    use HasFactory;

    // Define the table if the name doesn't follow Laravel's convention
    protected $table = 'company_details';

    // Specify which attributes can be mass assigned
    protected $fillable = [
        'user_id',
        'git_insurance_cover',
        'years_established',
        'no_of_tow_trucks',
        'no_of_drivers',
    ];
    
    // Optional: Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getGitInsuranceCoverFormattedAttribute()
{
    return '£' . number_format($this->git_insurance_cover);
}
}
