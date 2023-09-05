<div class="absolute top-3 right-3 flex items-center justify-center rounded-3xl bg-white/50 p-2 text-primary-500">
    <div class="flex h-full w-full items-center justify-center rounded-3xl px-1 gap-2">
        <x-filament::modal width="5xl" icon-color="primary">
            <x-slot name="trigger">
                @svg('heroicon-o-information-circle','hover:text-secondary-700 cursor-pointer text-secondary-500 text-md h-8 w-8')
            </x-slot>
            <x-slot name="heading">
                {{ $branch->name }}
            </x-slot>
            @if($branch->description !== null)
            <x-slot name="description">
                {!! $branch->description !!}
            </x-slot>
            @endif

            <x-curator-glider class="w-full mx-auto" :media="$branch->imagePath"/>

            <div class="flex flex-col gap-6">
                <div>
                    <h5 class="font-semibold text-secondary-500">{{ __('Address') }}</h5>

                    <div class="grid grid-cols-2 gap-2 text-gray-800 py-4">
                        <div>
                            @if($branch->address['country'] !== null)
                                {{ \LaraZeus\Hermes\Models\Countries::find($branch->address['country'])->label }}
                                -
                            @endif
                            @if($branch->address['state'] !== null)
                                {{ \LaraZeus\Hermes\Models\States::find($branch->address['state'])->label }}
                                -
                            @endif

                            @if($branch->address['city'] !== null)
                                {{ \LaraZeus\Hermes\Models\Cities::find($branch->address['city'])->label }}
                                -
                            @endif

                            @if($branch->address['city'] !== null)
                                {{ $branch->address['city'] ?? '' }}
                                <br><br>
                            @endif

                            <x-filament::button outlined size="xs" target="_blank" href="{{ $branch->address['map'] }}" tag="a">
                                Google Map
                            </x-filament::button>
                        </div>
                        <div>
                            {{ __('phone number') }}:
                            {{ $branch->address['phone_number'] }}<br>
                            {{ __('mobile') }}:
                            {{ $branch->address['mobile'] }}<br>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <h5 class="font-semibold text-secondary-500">{{ __('Working Hours') }}</h5>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2">
                        @foreach($branch->hours as $hours)
                            <div>
                                <span class="font-semibold text-xl">{{ __($hours['day']) }}:</span>
                                <span class="text-gray-800">
                                    @if($hours['closed'])
                                        {{ __('Closed') }}
                                    @else
                                        {{ \Illuminate\Support\Carbon::createFromTimeString($hours['from'])->format('h:i') }} - {{ \Illuminate\Support\Carbon::createFromTimeString($hours['to'])->format('h:i') }}
                                    @endif
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>

                @if(filled(array_filter($branch->social)))
                    <hr>
                    <div>
                        <h5 class="font-semibold text-secondary-500">{{ __('On the Web') }}</h5>
                        <div class="m-1 my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 lg:gap-6 justify-start items-start">
                            @foreach($branch->social as $icon => $link)
                                @if($link !== null)
                                    @if(!filter_var($link, FILTER_VALIDATE_URL))
                                        @php $linkPrefix = config('nadel.social')[$icon] ?? ''; @endphp
                                    @endif
                                    <a href="{{ $linkPrefix ?? '' }}{{ $link }}" target="_blank" rel="noopener"
                                       class="gap-2 flex items-start justify-start text-gray-500 hover:text-primary-700 transition ease-in-out duration-300">
                                        @if($icon === 'website')
                                            @svg('fas-globe', 'h-6 w-6 text-primary-500')
                                        @else
                                            @svg('fab-'.$icon, 'h-6 w-6 text-primary-500')
                                        @endif
                                        <span>{{ __($icon) }}</span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </x-filament::modal>
    </div>
</div>
