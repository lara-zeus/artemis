<div x-data>
    <x-slot name="header">
        <span class="capitalize">{{ $post->title }}</span>
    </x-slot>

    <x-slot name="breadcrumbs">
        <li class="flex items-center">
            <a href="{{ route('blogs') }}">{{ __('Posts') }}</a>
            @svg('iconpark-rightsmall-o','fill-current w-4 h-4 mx-3 rtl:rotate-180')
        </li>
        <li class="flex items-center">
            {{ $post->title }}
        </li>
    </x-slot>

    <div class="my-10">
        @if($post->image() !== null)
            <img alt="{{ $post->title }}" src="{{ $post->image() }}" class=" w-full h-full shadow-md rounded-lg z-0 object-cover"/>
        @endif

        <x-zeus::card>
            <div class="flex items-center justify-between">
                <span class="font-light text-gray-600 dark:text-gray-200">{{ optional($post->published_at)->diffForHumans() ?? '' }}</span>
                <div>
                    @unless ($post->tags->isEmpty())
                        @each($skyTheme.'.partial.category', $post->tags->where('type','category'), 'category')
                    @endunless
                    @unless ($post->tags->isEmpty())
                        @foreach($post->tags->where('type','tag') as $tag)
                            @include($skyTheme.'.partial.tag')
                        @endforeach
                    @endunless
                </div>
            </div>

            <div class="flex flex-col items-start justify-start gap-4">
                <div>
                    <a href="#" class="text-2xl font-bold text-gray-700 dark:text-gray-100 hover:underline">
                        {{ $post->title ?? '' }}
                    </a>
                    <p class="mt-2 text-gray-600 dark:text-gray-200">
                        {{ $post->description ?? '' }}
                    </p>
                </div>
            </div>

            <div class="mt-6 lg:mt-12 prose dark:prose-invert max-w-none">
                {!! $post->getContent() !!}
            </div>
        </x-zeus::card>
    </div>

    @if($related->isNotEmpty())
        <div class="py-6 flex flex-col mt-4 gap-4">
            <h1 class="text-xl font-bold text-gray-700 dark:text-gray-100 md:text-2xl">{{ __('Related Posts') }}</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($related as $post)
                    @include($skyTheme.'.partial.related')
                @endforeach
            </div>
        </div>
    @endif
</div>
