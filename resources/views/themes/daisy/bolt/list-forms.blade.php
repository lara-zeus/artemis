<div class="mx-4">

    <x-slot name="header">
        <h2>{{ __('List All Forms') }}</h2>
    </x-slot>

    <x-slot name="breadcrumbs">
        <li class="flex items-center">
            {{ __('Forms') }}
        </li>
    </x-slot>

    {{ \LaraZeus\Bolt\Facades\Bolt::renderHookBlade('zeus-forms.before') }}

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-2">
        @foreach($categories as $category)


            <div class="my-10 card card-compact w-full bg-base-100 shadow-lg">

                @if($category->logo !== null)
                    <figure>
                        <img alt="{{ $category->name }} {{ __('Logo') }}" class="w-full h-32 object-center object-cover mb-4" src="{{ $category->logo_url }}"/>
                    </figure>
                @endif

                <div class="card-body">
                    <h2 class="card-title">{{ $category->name }}</h2>
                    <p class="block">{{ $category->description }}</p>

                    <ul class="menu menu-sm bg-base-200 w-56 rounded-box">
                        @foreach($category->forms as $form)
                            <li>
                                <a href="{{ route('bolt.form.show', ['slug' => $form->slug]) }}" >
                                    <span class="text-left text-primary-600 dark:text-primary-500 hover:dark:text-primary-300">
                                        {{ $form->name ?? '' }}
                                        <br>
                                        <cite>{{ $form->description }}</cite>
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        @endforeach
    </div>

    {{ \LaraZeus\Bolt\Facades\Bolt::renderHookBlade('zeus-forms.before') }}

</div>
