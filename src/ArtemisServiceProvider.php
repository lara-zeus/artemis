<?php

namespace LaraZeus\Artemis;

use Filament\PluginServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use LaraZeus\Core\CoreServiceProvider;
use Spatie\LaravelPackageTools\Package;

class ArtemisServiceProvider extends PluginServiceProvider
{
    public static string $name = 'zeus-artemis';

    public function bootingPackage(): void
    {
        //CoreServiceProvider::setThemePath('artemis');

        $viewPath = 'zeus::themes.artemis';
        View::share('artemis'.'Theme', $viewPath);
        App::singleton('artemis'.'Theme', function () use ($viewPath) {
            return $viewPath;
        });
    }

    public function packageConfigured(Package $package): void
    {
        $package
            ->hasAssets()
            ->hasViews('zeus')
            ->hasTranslations();
    }
}
