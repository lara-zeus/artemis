<div x-data>
    @php
        $tag = $item->tags->first();
    @endphp

    <x-slot name="header">
        <h2>{{ $item->title }}</h2>
    </x-slot>

    <x-slot name="breadcrumbs">
        <li class="flex items-center">
            <a href="{{ route('library.tag',$tag->slug) }}">{{ $tag->name }}</a>
            @svg('iconpark-rightsmall-o','fill-current w-4 h-4 mx-3')
        </li>

        <li class="flex items-center">
            {{ __('Viewing') }} {{ $item->title }}
        </li>
    </x-slot>

    <h1 class="text-center text-xl my-4 py-4 text-primary-500">{{ $item->title }}</h1>
    <h3 class="text-center my-4 text-gray-600">{{ $item->description }}</h3>

    <x-zeus::another-card>
        @if($item->file_path !== null)
            <a href="{{ $item->file_path }}" target="_blank">
                <img class="mx-auto" src="{{ $item->file_path }}"/>
            </a>
        @else
            <div id="library-images-gallery" class="mas-grdi">
                @foreach($item->getFiles() as $file)
                    @include($skyTheme.'.addons.library-types.'.strtolower($item->type))
                @endforeach
            </div>
        @endif
    </x-zeus::another-card>
</div>
