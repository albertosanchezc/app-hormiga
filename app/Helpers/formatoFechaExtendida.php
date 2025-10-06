<?php

use Carbon\Carbon;

if (!function_exists('formatoFechaExtendida')) {
    function formatoFechaExtendida($fecha)
    {
        // Establece el locale en español
        Carbon::setLocale('es');

        // Crea instancia de fecha
        $carbon = Carbon::parse($fecha);

        // Retorna en formato: Jueves 12 de Junio de 2025
        return ucfirst($carbon->translatedFormat('l d \d\e F \d\e Y'));
    }
}