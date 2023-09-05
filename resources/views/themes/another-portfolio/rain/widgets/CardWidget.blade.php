<div x-cloak x-show="show"
     x-transition.duration.500ms.opacity.scale x-init="$nextTick(() => show = true)" data-aos="fade-right"
     class="grid grid-cols-2 gap-4 justify-around items-center">

    <div class="col-span-2 @if($data['image_position'] === 'left') order-2 @endif md:col-span-1">
        <h2 class="text-primary-500 text-lg my-4">{{ $data['card_title'] }}</h2>
        <p class="text-secondary-500 font-light font-karla">{{ $data['content'] }}</p>
    </div>

    <div class="col-span-2 md:col-span-1 flex">
        <div class="relative w-3/4">
            <div class="bg-white dark:bg-gray-900 p-5 pb-20 m-6 md:m-12 shadow-lg border border-gray-100 dark:border-gray-800 transition duration-500 @if($data['image_position'] === 'left') -rotate-6 hover:rotate-1 @else rotate-6 hover:-rotate-1 @endif relative">
                <img src="{{ \Illuminate\Support\Facades\Storage::url($data['image']) }}" alt="{{ $data['title'] }}"
                     class="flex flex-col aspect-square w-full object-cover h-auto max-h-full opacity-100">
            </div>
        </div>
    </div>

</div>