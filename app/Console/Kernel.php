<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Quote_email_send::class,
        \App\Console\Commands\SendDepositReminder::class,
        \App\Console\Commands\SendCollectionDeliveryReminder::class,
        \App\Console\Commands\SendQuotesSummaryEmail::class,
        \App\Console\Commands\CheckJobStatus::class,
        \App\Console\Commands\SendFeedbackReminder::class,

    ];


    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
 
    
     protected function schedule(Schedule $schedule)
    {
        $schedule->command('send:quote_email_sent')->everyMinute();
        $schedule->command('send:deposit-reminder')->hourly();
        $schedule->command('send:collection-delivery-reminder')->everyThirtyMinutes();
        $schedule->command('send:quotes-summary-email')->daily();
        $schedule->command('check:job-status')->daily();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
