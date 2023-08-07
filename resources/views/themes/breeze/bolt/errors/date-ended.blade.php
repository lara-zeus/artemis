<div>
    <x-slot name="header">
        <h2>{{ __('Date Ended') }}</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto px-4">
        <x-filament::section>
            <x-slot name="heading">
                <div class="flex items-center justify-center gap-2">
                    @svg('heroicon-o-exclamation','w-5 h-5 text-custom-600')
                    <span class="text-md">
                        {{ __('Date Ended') }}
                    </span>
                </div>
            </x-slot>
            {{ __('the submission period is ended for the form') }}
            <span class="font-semibold">{{ $zeusForm->name ?? '' }}</span>.

            <x-slot name="actions">
                <span class="text-sm text-gray-500">{{ __('Start date') }}</span>:
                <span class="text-sm">{{ $zeusForm->start_date->format(\Filament\Tables\Table::$defaultDateTimeDisplayFormat) }}</span>,
                <span class="text-sm text-gray-500">{{ __('End date') }}</span>:
                <span class="text-sm">{{ $zeusForm->end_date->format(\Filament\Tables\Table::$defaultDateTimeDisplayFormat) }}</span>
            </x-slot>
        </x-filament::section>
    </div>
</div>
