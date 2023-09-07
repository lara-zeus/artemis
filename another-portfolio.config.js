const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        './resources/views/themes/another-portfolio/**/*.blade.php',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            /*fontFamily: {
                karla: ['Karla', ...defaultTheme.fontFamily.sans],
            },*/
            colors: {
                danger: colors.red,
                success: colors.green,
                warning: colors.yellow,
                info: colors.blue,

                primary: {
                    '50': '#fdf4f3',
                    '100': '#fce6e4',
                    '200': '#fbd1cd',
                    '300': '#f6b2ab',
                    '400': '#f1948a',
                    '500': '#e45d4f',
                    '600': '#d04132',
                    '700': '#af3326',
                    '800': '#912e23',
                    '900': '#792b23',
                    '950': '#41130e',
                },
                secondary: {
                    '50': '#F6FBF9',
                    '100': '#d4f3eb',
                    '200': '#a8e7d6',
                    '300': '#75d3bd',
                    '400': '#45b39d',
                    '500': '#2f9d89',
                    '600': '#237e6f',
                    '700': '#20655b',
                    '800': '#1e514a',
                    '900': '#1d443f',
                    '950': '#0b2825',
                },
                gray: {
                    '50': '#F6FBF9',
                    '100': '#d4f3eb',
                    '200': '#a8e7d6',
                    '300': '#75d3bd',
                    '400': '#45b39d',
                    '500': '#2f9d89',
                    '600': '#237e6f',
                    '700': '#20655b',
                    '800': '#1e514a',
                    '900': '#1d443f',
                    '950': '#0b2825',
                },
            }
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
    ],
}
