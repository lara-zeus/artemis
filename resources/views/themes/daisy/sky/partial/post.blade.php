<div class="card bg-base-100 shadow-xl">
    @if($post->image() !== null)
        <figure class=" md:h-72">
            <a href="{{ route('post',$post->slug) }}">
                <img class=" object-cover transition-all hover:scale-105" src="{{ $post->image() }}" alt="{{ $post->title }}" />
            </a>
        </figure>
    @endif
    <div class="card-body">
        <h2 class="card-title">
            <a href="{{ route('post',$post->slug) }}">{{ $post->title }}</a>
        </h2>
        @if($post->description !== null)
            <p class="py-4">
                <a href="{{ route('post',$post->slug) }}">
                    {!! $post->description !!}
                </a>
            </p>
        @endif
        <div class="py-2 card-actions justify-end">
            @unless ($post->tags->isEmpty())
                @each($skyTheme.'.partial.category', $post->tags->where('type','category'), 'tag')
            @endunless
            @unless ($post->tags->isEmpty())
                @each($skyTheme.'.partial.tag', $post->tags->where('type','tag'), 'tag')
            @endunless
        </div>

        <div class="hidden mt-3 flex items-center space-x-3 text-gray-500 dark:text-gray-400">
            <div class="flex items-center gap-3">
                <div class="relative h-5 w-5 flex-shrink-0">
                    <img src="{{ \Filament\Facades\Filament::getUserAvatarUrl($post->author) }}" alt="avatar" class="rounded-full object-cover">
                </div>
                <span class="truncate text-sm">
            {{ $post->author->name ?? '' }}
        </span>
            </div>
            <span class="text-xs text-gray-300 dark:text-gray-600">•</span>
            <time class="truncate text-sm" datetime="2022-10-21T06:05:00.000Z">
                {{ optional($post->published_at)->diffForHumans() ?? '' }}
            </time>
        </div>
    </div>
</div>
