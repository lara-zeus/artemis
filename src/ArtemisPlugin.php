<?php

namespace LaraZeus\Artemis;

use Filament\Contracts\Plugin;
use Filament\Panel;

class ArtemisPlugin implements Plugin
{
    public function getId(): string
    {
        return 'zeus-artemis';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([

            ]);
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
