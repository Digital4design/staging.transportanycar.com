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
        // \App\Console\Commands\Quote_email_send::class,
        \App\Console\Commands\SendDepositReminder::class,
        \App\Console\Commands\SendCollectionDeliveryReminder::class,
        \App\Console\Commands\SendQuotesSummaryEmail::class,
        \App\Console\Commands\CheckJobStatus::class,
        \App\Console\Commands\SendFeedbackReminder::class,
        \App\Console\Commands\SendTransporterEmail::class,
        \App\Console\Commands\MyCustomTest::class

    ];


    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */


    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('send:quote_email_sent')->everyMinute();
        $schedule->command('send:deposit-reminder')->hourly();
        $schedule->command('send:collection-delivery-reminder')->everyThirtyMinutes();
        $schedule->command('send:quotes-summary-email')->dailyAt('19:00');
        $schedule->command('check:job-status')->dailyAt('19:00');
        // at 7 pm
        // $schedule->command('send:save-search-mail')->dailyAt('19:00');
        // // at 7 am
        // $schedule->command('send:save-search-mail')->dailyAt('07:00');
        // // at 1 pm
        // $schedule->command('send:save-search-mail')->dailyAt('13:00');
        $schedule->command('command:test')->everyMinute();
        $schedule->command('send:feedback-reminder')->dailyAt('19:00');

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
