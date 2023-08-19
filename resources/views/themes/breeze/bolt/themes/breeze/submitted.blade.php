<div>
    <x-slot name="header">
        <h2>{{ __('form submitted successfully') }}</h2>
    </x-slot>

    <x-slot name="breadcrumbs"></x-slot>

    <div class="max-w-4xl mx-auto px-4">
        <x-filament::section>
            @if(isset($form->options['confirmation_message']) && !empty($form->options['confirmation_message']))
                <span class="text-xs text-gray-400">
                    {!! $form->options['confirmation_message'] !!}
                </span>
            @else
                <span class="text-xs text-gray-400">
                    {{ __('the form') }} {{ $form->name ?? '' }} {{ __('submitted successfully') }}.
                </span>
            @endif
        </x-filament::section>
    </div>
</div>
