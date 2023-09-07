<a href="{{ route('tags',[$tag->type,$tag->slug]) }}"
   class="px-4 py-1 bg-primary-600 text-gray-50 inline-flex items-center justify-center mb-2 shadow-sm rounded-lg">
    {{ $tag->name ?? '' }}
    @if(!$loop->last) - @endif
</a>
