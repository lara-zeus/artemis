<?php

namespace LaraZeus\Artemis\Artemis;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class ArtemisServiceProvider extends PluginServiceProvider
{
    public static string $name = 'artemis';

    protected array $resources = [
        // CustomResource::class,
    ];

    protected array $pages = [
        // CustomPage::class,
    ];

    protected array $widgets = [
        // CustomWidget::class,
    ];

    protected array $styles = [
        'plugin-artemis' => __DIR__ . '/../resources/dist/artemis.css',
    ];

    protected array $scripts = [
        'plugin-artemis' => __DIR__ . '/../resources/dist/artemis.js',
    ];

    // protected array $beforeCoreScripts = [
    //     'plugin-artemis' => __DIR__ . '/../resources/dist/artemis.js',
    // ];

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name);
    }
}
