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
            <div class="bord flex justify-between p-10">
                <span class="font-light text-gray-600 dark:text-gray-100">{{ optional($post->published_at)->diffForHumans() ?? '' }}</span>
                <div class="bord">
                    @unless ($post->tags->isEmpty())
                        @each($skyTheme.'.partial.category', $post->tags->where('type','category'), 'tag')
                    @endunless
                </div>
                <div class="bord">
                    @unless ($post->tags->isEmpty())
                        @each($skyTheme.'.partial.tag', $post->tags->where('type','tag'), 'tag')
                    @endunless
                </div>
            </div>
            <p>
                {{ $post->description ?? '' }}
            </p>
            <a href="#" class="flex items-center gap-2">
                <img src="{{ \Filament\Facades\Filament::getUserAvatarUrl($post->author) }}" alt="avatar" class="object-cover w-10 h-10 rounded-full sm:block">
                <h1 class="font-bold text-gray-700 dark:text-gray-100 hover:underline">{{ $post->author->name ?? '' }}</h1>
            </a>


            <div class="flex gap-3">
                @unless ($post->tags->isEmpty())
                    @each($skyTheme.'.partial.tag', $post->tags->where('type','tag'), 'tag')
                @endunless
            </div>

            <div class="mt-6 lg:mt-12 prose dark:prose-invert max-w-none">
                {!! html_entity_decode($post->content) !!}
            </div>




        </div>
    </div>





    <div>
        <div class="container px-8 mx-auto xl:px-5  max-w-screen-lg py-5 lg:py-8 !pt-0">
            <div class="mx-auto max-w-screen-md ">
                <div class="flex justify-center">
                    <div class="flex gap-3">
                        @unless ($post->tags->isEmpty())
                            @each($skyTheme.'.partial.tag', $post->tags->where('type','category'), 'tag')
                        @endunless
                    </div>
                </div>
                <h1 class="text-brand-primary mb-3 mt-2 text-center text-3xl font-semibold tracking-tight dark:text-white lg:text-4xl lg:leading-snug">
                    {{ $post->title }}
                </h1>
                <div class="mt-3 flex justify-center space-x-3 text-gray-500 ">
                    <div class="flex items-center gap-3">
                        <div class="relative h-10 w-10 flex-shrink-0">
                            <a href="#">
                                <img src="{{ \Filament\Facades\Filament::getUserAvatarUrl($post->author) }}" alt="avatar" class="rounded-full object-cover">
                            </a>
                        </div>
                        <div>
                            <p class="text-gray-800 dark:text-gray-400">
                                <a href="#">{{ $post->author->name ?? '' }}</a>
                            </p>
                            <div class="flex items-center space-x-2 text-sm">
                                <time class="text-gray-500 dark:text-gray-400" datetime="">
                                    {{ optional($post->published_at)->diffForHumans() ?? '' }}
                                </time>
                                <span>· {{ \LaraZeus\Artemis\Classes\ReadingTime::readingTime($post->content, true) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative z-0 mx-auto aspect-video max-w-screen-lg overflow-hidden lg:rounded-2xl">
            <img src="{{ $post->image() }}" alt="Thumbnail" class="absolute w-full h-full object-cover">
        </div>
        <div class="flex justify-center">
            <div class="flex gap-3">
                @unless ($post->tags->isEmpty())
                    @each($skyTheme.'.partial.tag', $post->tags->where('type','tag'), 'tag')
                @endunless
            </div>
        </div>
        <div class="container px-8 mx-auto xl:px-5  max-w-screen-lg py-5 lg:py-8">
            <article class="mx-auto max-w-screen-md ">
                <div class="prose mx-auto my-3 dark:prose-invert prose-a:text-primary-600">
                    {{ $post->description ?? '' }}
                    <br><hr>
                    {!! html_entity_decode($post->content) !!}
                </div>
            </article>
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
