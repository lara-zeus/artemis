<div class="mx-4">
    <x-slot name="header">
        <h2>{{ __('Ticket System') }}</h2>
    </x-slot>

    <x-slot name="breadcrumbs"></x-slot>

    <x-filament::section>
        <h2 class="text-lg text-primary-600">{{ $office->name }}</h2>
        <cite>{!! $office->description !!}</cite>
        <ul>
            @foreach($forms as $form)
                <li class="flex flex-col gap-1 my-2">
                    <a href="{{ route('bolt.form.show',[$form,$office->slug]) }}" class="text-custom-600">
                        {{ $form->name }}
                    </a>
                    <cite class="ltr:ml-2 rtl:mr-2">{!! $form->desc !!}</cite>
                </li>
            @endforeach
        </ul>
    </x-filament::section>
</div>
