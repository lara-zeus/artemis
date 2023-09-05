@php
    $image = Spatie\MediaLibrary\Support\ImageFactory::load($file->getFullUrl());
@endphp
<figure>
    <a data-pswp-width="{{ $image->getWidth() }}" data-pswp-height="{{ $image->getHeight() }}"
       href="{{ $file->getFullUrl() }}" class="overflow-hidden" target="_blank">
    <img alt="{{ $item->title }}-{{ $file->name }}"
         class="object-cover transition-all ease-in-out duration-300 hover:scale-110" src="{{ $file->getFullUrl() }}">
    </a>
</figure>



