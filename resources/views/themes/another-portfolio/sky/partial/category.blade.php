<a href="{{ route('tags',[$category->type,$category->slug]) }}"
   class="px-4 py-1 bg-primary-600 text-gray-50 inline-flex items-center justify-center mb-2 shadow-sm rounded-lg">
    {{ $category->name ?? '' }}
</a>
