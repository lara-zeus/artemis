import defaultTheme from 'tailwindcss/defaultTheme';
import colors from 'tailwindcss/colors'

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',

        // Core
        './resources/views/**/*.blade.php',
        // Wind
        '../wind/resources/views/themes/**/*.blade.php',
        // Sky
        '../sky/resources/views/themes/**/*.blade.php',
        // Bolt
        '../bolt/resources/views/themes/**/*.blade.php',
        '../bolt/src/Models/FormsStatus.php',
        // dynamic-dashboard
        '../dynamic-dashboard/resources/views/themes/**/*.blade.php',
        '../dynamic-dashboard/src/Models/Columns.php',
        // filament
        './vendor/filament/**/*.blade.php',
        './src/CoreServiceProvider.php',
    ],

    theme: {
        extend: {
            colors: {
                gray: colors.stone,
                primary: colors.sky,
                secondary: colors.pink,
                danger: colors.red,
                success: colors.green,
                warning: colors.yellow,
                info: colors.blue,
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
};
