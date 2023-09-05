<div class="container mx-auto my-4 flex bg-white p-4 rounded-2xl shadow-lg">
    <div class="grow px-2 gap-4 flex flex-col">
        <h3 class="text-secondary-500 font-semibold text-xl">
            {{ $menu->name }}
        </h3>
        <div class="">
            {!! $menu->description !!}
        </div>
        @if($menu->start_time !== null && $menu->end_time !== null)
            <div class="">
                <x-filament::badge class="inline-flex" icon="heroicon-m-clock">
                    Availability:
                </x-filament::badge>
                <span class="text-sm">from:</span>
                <span class="font-semibold">{{ $menu->start_time->format('H:i') }}</span>
                <span class="text-sm">to:</span>
                <span class="font-semibold">{{ $menu->end_time->format('H:i') }}</span>
            </div>
        @endif
    </div>
    {{--<div class="p-2 text-left">
        <div>
            <x-filament::input.wrapper prefix-icon="heroicon-m-magnifying-glass" inline-prefix="true">
                <x-filament::input
                    :placeholder="__('Search for Items')"
                    type="text"
                    wire:model="search"
                />
            </x-filament::input.wrapper>
        </div>
    </div>--}}
</div>
