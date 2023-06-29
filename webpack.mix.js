const mix = require('laravel-mix');

mix.postCss("resources/css/app.css", "resources/dist/css", [
       require("tailwindcss"),
   ]);

if (mix.inProduction()) {
    mix.version();
} else {
    mix.copy('resources/dist', '../demo/public/vendor/zeus-artemis')
}
