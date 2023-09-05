<div class="mt-6 container mx-auto px-2 md:px-4">
    <x-slot name="header">
        <span class="capitalize">{{ $post->title }}</span>
    </x-slot>

    <x-slot name="breadcrumbs">
        <li>
            <a class="text-gray-500 dark:text-gray-100 capitalize" aria-current="page">
                {{ $post->title }}
            </a>
        </li>
    </x-slot>

    <div class="card w-full bg-base-100 shadow-xl">
        @if($post->image() !== null)
            <figure class="md:h-1/3">
                <img class="w-full object-cover aspect-video rounded-2xl" alt="{{ $post->title }}" src="{{ $post->image() }}"/>
            </figure>
        @endif

        <div class="card-body">
            <h2 class="card-title">
                {{ $post->title ?? '' }}
            </h2>
            <div class="flex justify-between py-2">
                <span class="font-light text-gray-600 dark:text-gray-100">{{ optional($post->published_at)->diffForHumans() ?? '' }}</span>
                <div>
                    @unless ($post->tags->isEmpty())
                        @each($skyTheme.'.partial.category', $post->tags->where('type','category'), 'tag')
                    @endunless
                </div>
                <div>
                    @unless ($post->tags->isEmpty())
                        @each($skyTheme.'.partial.tag', $post->tags->where('type','tag'), 'tag')
                    @endunless
                </div>
            </div>
            <p>
                {{ $post->description ?? '' }}
            </p>
            <a class="flex items-center gap-2">
                <img src="{{ \Filament\Facades\Filament::getUserAvatarUrl($post->author) }}" alt="avatar" class="object-cover w-10 h-10 rounded-full sm:block">
                <h1 class="font-bold text-gray-700 dark:text-gray-100 hover:underline">{{ $post->author->name ?? '' }}</h1>
            </a>


            <div class="flex gap-3">
                @unless ($post->tags->isEmpty())
                    @each($skyTheme.'.partial.tag', $post->tags->where('type','tag'), 'tag')
                @endunless
            </div>

            <div class="mt-6 lg:mt-12 prose dark:prose-invert max-w-none">
                {!! $post->getContent() !!}
            </div>
        </div>
    </div>

    <div class="py-6 flex flex-col mt-4 gap-4">
        <p class="text-xl font-bold text-gray-700 dark:text-gray-100 md:text-2xl">
            {{ __('Related Posts') }}
        </p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($related as $post)
                @include($skyTheme.'.partial.related')
            @endforeach
        </div>
    </div>
</div>
