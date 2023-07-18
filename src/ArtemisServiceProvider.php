<?php

namespace LaraZeus\Artemis;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use LaraZeus\Core\CoreServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ArtemisServiceProvider extends PackageServiceProvider
{
    public function packageBooted(): void
    {
        //$this->package->hasViews('zeus');
        //CoreServiceProvider::setThemePath('artemis');

        $themePath = 'zeus::themes.' . config('zeus.theme');
        View::share('artemisTheme', $themePath);
        App::singleton('artemisTheme', function () use ($themePath) {
            return $themePath;
        });
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('zeus-artemis')
            ->hasAssets()
            ->hasConfigFile()
            ->hasViews('zeus')
            ->hasTranslations();
    }
}
