<?php

if (!function_exists('formatoNumericoToHora')) {
    function formatoNumericoToHora($valor)
    {
        // Asegúrate de que sea un string de 8 dígitos
        $str = str_pad($valor, 8, '0', STR_PAD_LEFT);

        $hh = substr($str, 0, 2);
        $mm = substr($str, 2, 2);

        return "$hh:$mm";
    }
}
if (!function_exists('horaToFormatoNumerico')) {
    function horaToFormatoNumerico($hora)
    {
        $parts = explode(':', $hora);

        $hh = str_pad($parts[0], 2, '0', STR_PAD_LEFT);
        $mm = str_pad($parts[1], 2, '0', STR_PAD_LEFT);

        return intval($hh . $mm . '0000'); // Completa con ceros
    }
}
