<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\UserQuote;
use App\SaveSearch;
use DB;
use App\Services\EmailService;


class SendTransporterEmail extends Command
{
    protected $signature = 'send:quotes-summary-email';
    protected $description = 'Send quotes summary emails after 2 and 4 days of job creation';
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        parent::__construct();
        $this->emailService = $emailService;
    }

    public function handle()
    {

        $user_quotes = UserQuote::where('created_at', '>=', Carbon::now()->subDay())->get();

        
            $transporter = DB::table('save_searches')
            ->join('users', function ($join) {
                $join->on('users.id', '=', 'save_searches.user_id')
                    ->where('users.status', 'active')
                    ->where('users.type', 'car_transporter')
                    ->where('users.is_status', 'approved');
                // ->where('users.job_email_preference', 1);
            })
            ->where(function ($query) use ($user_quotes) {
                foreach ($user_quotes as $word) {
                    $query->orWhere(DB::raw('LOWER(save_searches.pick_area)'), 'LIKE', '%' . $word->pickup_postcode . '%');
                }
            })
            // Match if any of the words in the drop_postcode input match the drop_area
            ->where(function ($query) use ($user_quotes) {
                $query->orWhere(function ($innerQuery) use ($user_quotes) {
                    foreach ($user_quotes as $word) {
                        $innerQuery->orWhere(DB::raw('LOWER(save_searches.drop_area)'), 'LIKE', '%' . $word->drop_postcode . '%');
                    }
                })
                    ->orWhereNull('save_searches.drop_area') // Match if drop_area is NULL
                    ->orWhere('save_searches.drop_area', 'anywhere'); // Match if drop_area is 'anywhere'
            })
            ->where('save_searches.email_notification', 'true')
            ->groupBy('users.id')
            ->get();
            
            $last24HoursCount = UserQuote::where('created_at', '>=', Carbon::now()->subDay())->count();
             
            foreach($transporter as $transport)
            {
            $mailData = [
                'last24HoursCount' =>$last24HoursCount,
               'name'=>$transport->first_name,
            ]; 
         
            $htmlContent = view('mail.General.today-transporter-leads', ['quote' => $mailData])->render();
            $subject='Todays Transport Leads';


          
              $this->emailService->sendEmail($transport->email, $htmlContent, $subject);
           }
        }
    }

