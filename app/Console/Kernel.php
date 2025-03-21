<?php

namespace App\Console;

use Illuminate\Support\Facades\Log;
use \App\Console\Commands\GenerateExcelFileCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
    //   $schedule->command('queue:work --timeout=600')->dailyAt('19:39')->withoutOverlapping();
      
    //   $schedule->command('queue:work --max-time=3600')
    //          ->dailyAt('19:48')
    //          ->runInBackground();
      
    //   $schedule->command('generate:excel')->dailyAt('19:50');



        // $schedule->job(new \App\Jobs\LeftTransactionCatcher)->dailyAt('23:59');
        // $schedule->job(new \App\Jobs\ApiHealthMonitor)->everyMinute()->withoutOverlapping();
        
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
