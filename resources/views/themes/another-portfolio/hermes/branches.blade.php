<div>
    <h2 class="py-4 text-gray-500 text-xl font-medium tracking-wide">
        {{ __('Our Branches') }}
    </h2>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @foreach($branches as $branch)
            <div x-data class="shadow-lg rounded-3xl max-w-3xl mx-auto bg-clip-border flex flex-col w-full p-4">
                <div class="relative w-full flex content-stretch">
                    @if($branch->imagePath !== null)
                        @php
                            $preset = new \LaraZeus\Hermes\Concerns\BranchThumbnailPreset();
                        @endphp
                        @if ($branch->imagePath->hasCuration('branch-thumbnail'))
                            <x-curator-curation
                                    class="h-full w-full rounded-3xl rounded-b-none aspect-video"
                                    :media="$branch->imagePath" curation="branch-thumbnail"/>
                        @else
                            <x-curator-glider
                                    class="h-full w-full rounded-3xl rounded-b-none aspect-video"
                                    :media="$branch->imagePath"
                                    :width="$preset->getWidth()"
                                    :height="$preset->getHeight()"
                            />
                        @endif
                    @endif
                    @include($hermesTheme.'.partial.branch-info')
                </div>

                <div class="h-full flex content-stretch relative rounded-3xl rounded-t-none border border-gray-300 bg-white px-2 py-5 shadow-sm items-start space-x-3 hover:border-secondary-400">
                    <div class="flex-1 px-1 text-center">
                        <p class="text-lg font-medium text-gray-900">{{ $branch->name }}</p>
                        @if($branch->description !== null)
                            <p class="my-2 text-sm text-gray-500">{!! $branch->description !!}</p>
                        @endif

                        @if($branch->menu->isNotEmpty())
                            <h4 class='ltr:text-left rtl:text-right text-primary-600'>{{ __('Available Menus') }}:</h4>
                            <ul class="ltr:text-left rtl:text-right">
                                @foreach($branch->menu as $menu)
                                    @include($hermesTheme.'.partial.branch-menu')
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
