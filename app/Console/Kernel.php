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
        Commands\masscrop::class,
        Commands\delete_photos::class,
        Commands\tinyfy_images::class

//        Commands\Sitemap::class,
//        Commands\ReimportPhotos::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//        $schedule->command('backup:clean')->daily()->at('01:00');
//        $schedule->command('backup:run')->daily()->at('02:00');

//        $schedule->command('sitemap:create')->daily()->at('03:00');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
