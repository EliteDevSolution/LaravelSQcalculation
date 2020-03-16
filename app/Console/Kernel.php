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
        //Commands\Inspire::class,
        
        Commands\StartQuiz::class,
        Commands\ProcessQuiz::class,
        Commands\ResQuiz::class,
        Commands\StartCounselor::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //$schedule->command('inspire')->hourly();
        $schedule->command('startquiz')->daily();
        $schedule->command('processquiz')->daily();
        $schedule->command('startcounselor')->daily();
        $schedule->command('resquiz')->daily();
    }
}
