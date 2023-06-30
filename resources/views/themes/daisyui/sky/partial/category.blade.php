<a href="{{ route('tags',[$tag->type,$tag->slug]) }}" class="badge badge-primary">
    {{ $tag->name ?? '' }}
</a>
