<div>
    @php
        $sections = $menu->sections->where('is_active',1)->sortBy('order');
    @endphp

    @include($hermesTheme.'.partial.menu-info')

   {{-- @if(tenant()->branches->count() > 1 && isset($branch))
        <div class="py-4 container mx-auto px-4 sm:px-6 lg:px-8 my-4">
            <span class="text-gray-500">Branch:</span>
            <span class="text-gray-500 text-lg">{{ $branch->name }}</span>
        </div>
    @endif--}}

    <div class="mt-10">
        <div role="list" class="divide-y divide-gray-300 space-y-14">
            @foreach($sections as $section)
                @include($hermesTheme.'.sections')
            @endforeach
        </div>
    </div>
</div>
