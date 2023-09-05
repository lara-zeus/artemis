<div class="mx-4">
    <x-slot name="header">
        <h2>{{ __('browse your tickets') }}</h2>
    </x-slot>

    <x-slot name="breadcrumbs"></x-slot>

    <div class="my-6">
        {{ $this->table }}
    </div>
</div>
