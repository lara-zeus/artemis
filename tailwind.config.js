const colors = require('tailwindcss/colors')
module.exports = {
    content: [
        "./resources/**/*.blade.php",
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                gray: colors.stone,
            }
        },
    },
    daisyui: {
        styled: true,
        themes: true,
        base: true,
        utils: true,
        logs: false,
        rtl: true,
        prefix: "",
        darkTheme: "dark",
    },
    plugins: [
        require("daisyui"),
        require('tailwindcss-debug-screens'),
        require('@tailwindcss/typography'),
    ],
}
