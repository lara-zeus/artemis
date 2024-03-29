<div class="container mx-auto my-10">
    <div class="overflow-hidden">
        @unless($stickies->isEmpty())
            <div class="carousel w-full md:h-96">
                @foreach($stickies as $index => $post)
                    @include($skyTheme.'.partial.sticky')
                @endforeach
            </div>
            <div class="flex justify-center w-full py-2 gap-2">
                @foreach($stickies as $index => $post)
                    <a href="#slide{{ $loop->iteration }}" class="btn btn-xs">1</a>
                @endforeach
            </div>
        @endunless
    </div>

    <div class="my-10">
        @unless ($posts->isEmpty())
            <h1 class="text-xl font-bold text-gray-700 dark:text-gray-100 md:text-2xl">
                {{ __('Posts') }}
            </h1>

            @if(request()->filled('search'))
                {{ __('Showing Search result of') }}: <span class="highlight">{{ request('search') }}</span>
                <a title="{{ __('clear') }}" href="{{ route('blogs') }}">
                    @svg('heroicon-o-backspace','text-primary-500 dark:text-primary-100 w-4 h-4 inline-flex align-middle')
                </a>
            @endif

            <section class="mt-10 mx-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
                @each($skyTheme.'.partial.post', $posts, 'post')
            </section>
        @else
            @include($skyTheme.'.partial.empty')
        @endunless
    </div>
</div>
