@unless($section->items->isEmpty())
    <div class="bg-white shadow-2xl rounded-3xl">
        <a id="section{{ $section->id }}"></a>
        <div class="relative pb-32">
            <div class="absolute inset-0 rounded-3xl">
                <img style="object-position: {{ $section->cover_focal_point }}"
                     class="w-full h-full object-cover rounded-3xl" src="{{ $section->coverUrl }}" alt="">
                <div class="absolute rounded-3xl inset-0 bg-gray-500 mix-blend-multiply" aria-hidden="true"></div>
            </div>
            <div class="rounded-3xl relative container mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
                <h2 class="text-4xl font-extrabold tracking-tight text-white md:text-5xl lg:text-6xl">
                    {{ $section->name }}
                </h2>
                @if($section->description !== null)
                    <p class="mt-6 max-w-3xl text-xl text-gray-300">
                        {{ $section->description }}
                    </p>
                @endif
            </div>
        </div>

        <section class="-mt-32 container mx-auto relative pb-32 px-4 sm:px-6 lg:px-8" aria-labelledby="contact-heading">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-20">
                @include($hermesTheme.'.items', ['pinned' => 1])
            </div>
            <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-20">
                @include($hermesTheme.'.items', ['pinned' => 0])
            </div>
        </section>
    </div>
@endunless
