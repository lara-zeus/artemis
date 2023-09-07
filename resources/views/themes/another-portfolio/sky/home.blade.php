<div x-data>
    @unless($stickies->isEmpty())
        <section class="mt-10 grid @if($stickies->count() > 1) grid-cols-3 @endif gap-4">
            @foreach($stickies as $post)
                @include($skyTheme.'.partial.sticky')
            @endforeach
        </section>
    @endunless

    <main class="flex flex-col sm:flex-row justify-between mx-auto gap-3 md:gap-6 px-3 md:px-6 py-4 md:py-8">
        <section class="w-full space-y-4">
            @unless ($posts->isEmpty())
                <h1 class="text-xl font-bold text-gray-700 dark:text-gray-100 md:text-2xl">{{ __('Posts') }}</h1>
                <div class="space-y-4">
                    @each($skyTheme.'.partial.post', $posts, 'post')
                </div>
            @else
                @include($skyTheme.'.partial.empty')
            @endunless
        </section>
    </main>
</div>
