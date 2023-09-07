<x-zeus::card>
    <div class="space-y-2">
        <div class="flex items-center justify-between">
        <span class="font-light text-sm text-gray-600 dark:text-gray-200">
            {{ optional($post->published_at)->diffForHumans() ?? '' }}
        </span>
            <div>
                @unless ($post->tags->isEmpty())
                    @each($skyTheme.'.partial.category', $post->tags->where('type','category'), 'category')
                @endunless
            </div>
        </div>
        <aside>
            <a href="{{ route('post',$post->slug) }}" class="text-2xl md:text-3xl font-bold text-gray-700 dark:text-gray-200 hover:underline">
                {!! $post->title !!}
            </a>
            @if($post->description !== null)
                <p class="text-gray-600 dark:text-gray-200">
                    {!! $post->description !!}
                </p>
            @endif
        </aside>
    </div>
</x-zeus::card>
