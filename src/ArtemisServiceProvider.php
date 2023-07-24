<?php

namespace LaraZeus\Artemis;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ArtemisServiceProvider extends PackageServiceProvider
{
    public static string $name = 'zeus-artemis';

    public function packageBooted(): void
    {
        $themePath = 'zeus::themes.' . config('zeus.theme');
        View::share('artemisTheme', $themePath);
        // not needed in app level
        /*App::singleton('artemisTheme', function () use ($themePath) {
            return $themePath;
        });*/
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasAssets()
            ->hasConfigFile()
            ->hasViews('zeus')
            ->hasTranslations();
    }
}
