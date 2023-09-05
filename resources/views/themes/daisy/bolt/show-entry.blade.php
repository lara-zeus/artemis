<div x-data class="space-y-4 my-6 mx-4 w-full">

    <x-slot name="header">
        <h2>{{ __('Show Entry Details') }}</h2>
    </x-slot>

    <x-slot name="breadcrumbs">
        <li class="flex items-center">
            <a href="{{ route('bolt.entries.list') }}">{{ __('My Entries') }}</a>
            @svg('iconpark-rightsmall-o','fill-current w-4 h-4 mx-3')
        </li>

        <li class="flex items-center">
            {{ __('Show entry') }} # {{ $response->id }}
        </li>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="md:col-span-2 space-y-4">
            <div class="my-10 card card-compact w-full bg-base-100 shadow-lg">
                <div class="card-body">
                    <div class="grid grid-cols-1">
                        @foreach($response->fieldsResponses as $resp)
                            <div class="py-2 text-ellipsis overflow-auto">
                                <p>{{ $resp->field->name }}</p>
                                <p class="font-semibold mb-2">{!! ( new $resp->field->type )->getResponse($resp->field, $resp) !!}</p>
                                <hr/>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
        <div class="md:col-span-1 space-y-4">
            <div class="my-10 card card-compact w-full bg-base-100 shadow-lg">
                <div class="card-body">
                    <div class="card-title">
                        {{ __('User Details') }}
                    </div>
                    <p>
                        <span class="text-base font-light">{{ __('By') }}</span>:
                        @if($response->user_id === null)
                            {{ __('Visitor') }}
                        @else
                            {{ ($response->user->name) ?? '' }}
                        @endif
                    </p>
                    <p class="flex flex-col">
                        <span class="text-base font-light">{{ __('created at') }}:</span>
                        <span class="font-semibold">{{ $response->created_at->format('Y.m/d') }}-{{ $response->created_at->format('h:i a') }}</span>
                    </p>
                </div>
            </div>


            <div>
                <div class="space-y-2">
                    <div class="my-10 card card-compact w-full bg-base-100 shadow-lg">
                        <div class="card-body">
                            <div class="card-title">
                                {{ __('Entry Details') }}
                            </div>
                            <div class="flex flex-col">
                                <span class="text-gray-600">{{ __('Form') }}:</span>
                                {{ $response->form->name ?? '' }}
                            </div>
                            <div>
                                <span>{{ __('status') }}</span>
                                @php $getStatues = $response->statusDetails() @endphp
                                <span class="{{ $getStatues['class']}}" x-tooltip.raw="{{ __('status') }}">
                                @svg($getStatues['icon'],'w-4 h-4 inline')
                                    {{ $getStatues['label'] }}
                            </span>
                            </div>
                            <div class="flex flex-col">
                                <span>{{ __('Notes') }}:</span>
                                {!! nl2br($response->notes) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
