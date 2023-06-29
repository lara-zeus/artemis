<a href="{{ route('tags',[$tag->type,$tag->slug]) }}" class="badge badge-outline">
    {{ $tag->name ?? '' }}
</a>
