<a href="{{ route('post',$post->slug) }}"
   id="slide{{ $loop->iteration }}" class="carousel-item w-full">
    <img alt="{{ $post->title ?? '' }}" src="{{ $post->image() }}" class="w-full object-cover aspect-video rounded-2xl" />
</a>