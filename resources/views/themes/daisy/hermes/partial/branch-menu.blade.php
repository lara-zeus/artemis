<li
    @if(!$menu->available_now) x-tooltip='"{{ __('available').' ' . $menu->available_time }}"' @endif
    class="py-4 group flex items-center gap-2 cursor-pointer transition-all ease-in-out duration-300"
>
    @svg('bx-dish', 'w-6 h-6 group-hover:text-secondary-600 transition-all ease-in-out duration-300')

    <a @if($menu->available_now) href="{{ route('hermes.menu',$menu->id) }}" @endif
        class='group-hover:text-gray-600 @if(!$menu->available_now) line-through @endif transition-all ease-in-out duration-300'>
        {{ $menu->name }}
    </a>
</li>
