<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Los comandos Artisan de tu aplicación.
     */
    protected $commands = [
        \App\Console\Commands\MigratePantallas::class,
        \App\Console\Commands\ImportDbfCommand::class,
    ];

    /**
     * Define el schedule de comandos.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Ejemplo:
        // $schedule->command('dbf:import')->daily();
    }

    /**
     * Registra los comandos.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}