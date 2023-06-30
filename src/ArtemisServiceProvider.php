<?php

namespace LaraZeus\Artemis;

use Filament\PluginServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Spatie\LaravelPackageTools\Package;

class ArtemisServiceProvider extends PluginServiceProvider
{
    public static string $name = 'zeus-artemis';

    public function bootingPackage(): void
    {
        $themePath = 'zeus::themes.' . config('zeus.theme');
        View::share('artemisTheme', $themePath);
        App::singleton('artemisTheme', function () use ($themePath) {
            return $themePath;
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
