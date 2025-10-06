<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        // Aquí registra tus comandos
        \App\Console\Commands\MigratePantallas::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        // Aquí puedes programar comandos si quieres
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
