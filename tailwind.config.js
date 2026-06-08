import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './app/Livewire/**/*.php',
        './resources/**/*.js',
    ],

    safelist: [
        {
            pattern:
                /(bg|text|border)-(orange|yellow|blue|purple|green|emerald|red|indigo|gray|slate|violet|sky|cyan|stone|lime|pink|amber|rose)-(100|200|300|400|500|600|700|800|900|950)/,
        },

        /*
        |--------------------------------------------------------------------------
        | Utilidades adicionales
        |--------------------------------------------------------------------------
        */

        'text-white',
        'text-black',

        'border-t-4',

        'border-white',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};