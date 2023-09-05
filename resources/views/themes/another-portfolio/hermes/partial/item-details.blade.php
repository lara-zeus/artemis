<div x-data
     class="rtl:text-right bg-white rounded-3xl mx-auto bg-clip-border shadow-3xl shadow-shadow-500 flex flex-col w-full !p-4 3xl:p-![18px]">
    <div class="relative w-full">
        <img src="{{ $item->image_url }}" class="mb-3 h-auto w-full mx-auto rounded-3xl" alt="{{ $item->name }}">
        <div class="absolute top-3 ltr:right-3 rtl:right-auto rtl:left-3 flex items-center justify-center rounded-3xl bg-white/50 p-2 text-primary-500">
            <div class="flex h-full w-full items-center justify-center rounded-3xl px-1 gap-2">
                @if(auth()->check())
                    {{--@if(\Maize\Markable\Models\Like::has($item, auth()->user()))
                        <x-heroicon-s-heart x-tooltip="'like it'" wire:click="likeIt" class="hover:text-red-700 cursor-pointer text-red-500 text-md h-8 w-8" />
                    @else
                        <x-heroicon-o-heart x-tooltip="'like it'" wire:click="likeIt" class="hover:text-red-700 cursor-pointer text-red-500 text-md h-8 w-8" />
                    @endif--}}
                @else
                    {{--<x-heroicon-o-heart x-tooltip="'like it'" class="text-red-500 text-md h-8 w-8" />--}}
                @endif

                {{--@if(auth()->check())
                    @if(\Maize\Markable\Models\Favorite::has($item, auth()->user()))
                        <x-heroicon-s-star x-tooltip="'favorite'" wire:click="favIt" class="hover:text-yellow-700 cursor-pointer text-yellow-500 text-md h-8 w-8" />
                    @else
                        <x-heroicon-o-star x-tooltip="'favorite'" wire:click="favIt" class="hover:text-yellow-700 cursor-pointer text-yellow-500 text-md h-8 w-8" />
                    @endif
                @endif--}}

            </div>
        </div>
    </div>

    <div class="space-y-4">
        <p class="text-lg font-bold text-primary-700">
            {{ $item->name }}
        </p>

        <p class="text-sm font-medium text-gray-600">
            {{ $item->description ?? $item->name }}
        </p>

        @if($item->labels !== null)
            <div class="flex items-start justify-start gap-2">
                @php
                    $getLabels = \LaraZeus\Hermes\Models\MenuItemLabels::whereIn('id',$item->labels)->get();
                @endphp
                @foreach($getLabels as $label)
                    <a class="flex items-start justify-start gap-1" x-tooltip='"{{ $label->name }}"' >
                        {!! $label->IconColor() !!}
                        <span class="text-sm">{{ $label->name }}</span>
                    </a>
                @endforeach
            </div>
        @endif

        @if($item->calories !== null)
            <p class="text-base text-gray-500 flex items-start justify-start gap-1">
                @svg('heroicon-o-fire','w-5 h-5 text-red-400')
                {{ $item->calories }}
                {{__('Calories')}}
            </p>
        @endif

        @if($item->prep_time !== null)
            <p class="text-base text-gray-500 flex items-start justify-start gap-1">
                @svg('heroicon-o-clock','w-5 h-5 text-blue-400')
                <span>{{__('Prepping Time:')}}</span>
                <span class="font-semibold">{{ $item->prep_time }}</span>
                <span>{{__('Minutes')}}</span>
            </p>
        @endif

        @if($item->price !== null)
            <div class="px-2 rounded-3xl flex items-start justify-start gap-2">
                @foreach($item->price as $price)
                    <div class="px-8 py-3 my-2 text-xs rounded-3xl bg-primary-100">
                        @if(!empty($price['type']))
                            <span class="text-gray-900 text-xs">{{ $price['type'] }}</span>
                            <br>
                        @endif
                        <span class="text-gray-800 font-bold text-sm">
                            {{ $price['price'] }}{{ \LaraZeus\Hermes\HermesPlugin::get()->getCurrency() }}
                        </span>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="text-center mx-auto">
            <x-filament::button outlined="true" color="secondary" type="button" wire:click="$dispatch('closeModal')">
                {{ __('Close') }}
            </x-filament::button>
        </div>

    </div>
</div>
