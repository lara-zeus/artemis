const mix = require('laravel-mix');

mix
    .js("resources/js/another-portfolio.js","resources/dist/js")

    .postCss("resources/css/another-portfolio.css", "resources/dist/css", [
       require("tailwindcss"),
   ])

    .postCss("resources/css/daisy.css", "resources/dist/css", [
        require("tailwindcss"),
    ])

    .postCss("resources/css/breeze.css", "resources/dist/css", [
       require("tailwindcss"),
   ]);