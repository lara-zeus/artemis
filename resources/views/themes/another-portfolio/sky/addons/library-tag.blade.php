<div x-data>

    <x-slot name="header">
        <h2>{{ $libraryTag->name }} </h2>
    </x-slot>

    <x-slot name="breadcrumbs">
        <li class="flex items-center">
            {{ __('Viewing') }} {{ $libraryTag->name }}
        </li>
    </x-slot>

    <h1 class="text-primary-500 text-3xl font-bold text-center my-10">{{ $libraryTag->name }}</h1>

    <div class="my-2 grid grid-cols-1 md:grid-cols-2 gap-2">
        @foreach($libraryTag->library as $item)
            <x-zeus::another-card>
                <div>
                    <h2 class="text-secondary-500 text-xl font-semibold">
                        <a href="{{ route('library.item', $item->slug) }}">
                            {{ $item->title ?? '' }}
                        </a>
                    </h2>

                    <div class="w-full relative h-96">
                        @foreach($item->getFiles() as $file)
                            @php
                                $sign = ($loop->even) ? '+' : '-' ;
                                $angle1 = \LaraZeus\Artemis\Classes\RandomNumber::get($loop->iteration,$item->getFiles()->count()+abs(fmod($item->getFiles()->count(),5)-30));
                                $x = \LaraZeus\Artemis\Classes\RandomNumber::get($loop->iteration,$item->getFiles()->count()+abs(fmod($item->getFiles()->count(),5)-10));
                                $y = \LaraZeus\Artemis\Classes\RandomNumber::get($loop->iteration,$item->getFiles()->count()+abs(fmod($item->getFiles()->count(),5)-10));
                            @endphp
                            <a href="{{ $file->getFullUrl() }}" target="_blank">
                                <div class="lib-item-card" style="--image: url('{{ $file->getFullUrl() }}'); --angle: {{ $sign }}{{ $angle1 }}deg; --x: {{ $sign }}{{ $x }}%; --y: {{ $sign }}{{ $y }}%; --caption: '{{ $item->title }}'"></div>
                            </a>
                        @endforeach
                    </div>
                    <p class="text-center">
                        <a class="text-primary-500" href="{{ route('library.item', $item->slug) }}">show all</a>
                    </p>
                </div>
            </x-zeus::another-card>
        @endforeach
    </div>
</div>
