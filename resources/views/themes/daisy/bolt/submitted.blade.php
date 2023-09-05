<div>
    <div class="my-10 card card-compact w-full bg-base-100 shadow-lg">
            <div class="card-body">
                @if(!empty($zeusForm->options['confirmation_message']))
                    <span class="text-md text-gray-600">
                    {!! $zeusForm->options['confirmation_message'] !!}
                </span>
                @else
                    <span class="text-md text-gray-600">
                    {{ __('the form') }}
                    <span class="font-semibold">{{ $zeusForm->name ?? '' }}</span>
                    {{ __('submitted successfully') }}.
                </span>
                @endif

                {!! \LaraZeus\Bolt\Facades\Extensions::init($zeusForm, 'SubmittedRender', ['extensionData' => $extensionData['extInfo']['itemId'] ?? 0]) !!}

            </div>
        </div>
</div>
