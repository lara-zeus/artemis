@php
    $allItems = $section->items->where('is_pinned',$pinned)->sortBy('sort');
@endphp
@if($allItems->isNotEmpty())
    @foreach($allItems as $item)
        <div class="my-10 flex flex-col bg-gray-50 rounded-3xl shadow-xl">
            <div class="flex-1 relative pt-16 px-6 pb-8 md:px-8">
                <div class="absolute w-32 h-32 top-0 inline-block rounded-3xl shadow-lg -mt-20">
                    @if($pinned === 1)
                        <div x-data class="absolute w-16 h-16 -top-8 inline-block ltr:-left-4 rtl:-right-4 pt-4">
                            @svg('tni-thumbtack','w-6 h-6 text-amber-500 absolute ltr:-rotate-90',['x-tooltip'=>'"pinned"'])
                        </div>
                    @endif
                    <x-filament::modal width="4xl" id="item_img_{{ $item->id }}">
                        <x-slot name="trigger">
                            <img x-on:click="$dispatch('open-modal', {id: 'item_img_{{ $item->id }}'})"
                                loading="lazy" class="cursor-pointer object-cover w-32 h-32 rounded-3xl" alt="{{ $item->description }}" src="{{ $item->image_url }}">
                        </x-slot>
                        <div class="p-2">
                            <img class="h-full w-full text-white" alt="{{ $item->description ?? $item->name }}" src="{{ $item->image_url }}">
                        </div>
                    </x-filament::modal>
                </div>
                <div x-data class="flex items-center justify-start gap-2">
                    @if($item->labels !== null)
                        @php
                            $getLabels = $labels->whereIn('id',$item->labels);
                        @endphp
                        @foreach($getLabels as $label)
                            <p x-tooltip='"{{ $label->name }}"' >
                                {!! $label->IconColor() !!}
                            </p>
                        @endforeach
                    @endif
                    <h3 wire:click="$dispatch('openModal', {component: 'bolt.item-details', arguments: {itemID: {{ $item->id }}}})"
                        class="underline cursor-pointer text-xl font-medium text-primary-900">
                        {{ $item->name }}
                    </h3>
                </div>
            </div>
            @if($item->price !== null)
                <div class="py-2 px-4 bg-gray-100 rounded-3xl grid @if(count($item->price) === 1) grid-cols-2 @elseif(count($item->price) === 2) grid-cols-2 @else grid-cols-2 md:grid-cols-3 @endif gap-2">
                    @foreach($item->price as $price)
                        <div class="px-3 py-2 my-2 text-xs rounded-3xl bg-primary-100">
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
        </div>
    @endforeach
@endif
