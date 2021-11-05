<?php

namespace App\Console;

use App\Console\Commands\DeleteOldUsers;
use App\Models\User;
use Carbon\Carbon;
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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->command(DeleteOldUsers::class)->daily();

//        $schedule->call(function (){
//            User::where('created_at', '<=', Carbon::now()->subYear())->delete();
//        })->everyMinute();

        //php artisan schedule:run     verevi grac@ ashxatacnelu hamar
        //php artisan make:command DeleteOldUsers

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
