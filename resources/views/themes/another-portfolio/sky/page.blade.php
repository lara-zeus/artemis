<div x-data>

    <x-slot name="header">
        <span class="capitalize">{{ $post->title }}</span>
    </x-slot>

    <x-slot name="breadcrumbs">
        @if($post->parent !== null)
            <li class="flex items-center">
                <a href="{{ route('page',[$post->parent->slug]) }}" class="text-gray-400 dark:text-gray-200 capitalize" aria-current="page">{{ $post->parent->title }}</a>
                @svg('iconpark-rightsmall-o','fill-current w-4 h-4 mx-3')
            </li>
        @endif
        <li class="flex items-center">
            {{ $post->title }}
        </li>
    </x-slot>

    <div class="text-center my-6">
        <div>
            <h2 class="text-2xl font-bold text-primary-500 dark:text-gray-100 hover:underline">
                {{ $post->title ?? '' }}
            </h2>
            <h4 class="mt-2 text-gray-600 dark:text-gray-200">
                {{ $post->description ?? '' }}
            </h4>
        </div>
    </div>

    <x-zeus::another-card>
        @if($post->image() !== null)
            <img alt="{{ $post->title }}" src="{{ $post->image() }}" class="my-10 w-full aspect-video shadow-md rounded-[2rem] rounded-bl-none z-0 object-cover"/>
        @endif

        <div class="flex items-center justify-between">
            <div>
                @unless ($post->tags->isEmpty())
                    @each($skyTheme.'.partial.category', $post->tags->where('type','category'), 'category')
                @endunless
            </div>
        </div>

        <div class="prose dark:prose-invert max-w-none">
            {!! $post->getContent() !!}
        </div>

        @if(!$children->isEmpty())
            <div class="py-6 flex flex-col mt-4 gap-4">
                <h1 class="text-xl font-bold text-gray-700 dark:text-gray-100 md:text-2xl">children pages</h1>

                <div class="grid grid-cols-3 gap-4">
                    @foreach($children as $post)
                        @include($skyTheme.'.partial.children-pages')
                    @endforeach
                </div>
            </div>
        @endif
    </x-zeus::another-card>
</div>
