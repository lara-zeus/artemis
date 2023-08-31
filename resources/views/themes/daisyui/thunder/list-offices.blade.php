<div class="mx-4">
    <x-slot name="header">
        <h2>{{ __('welcome to our support tickets system') }}</h2>
    </x-slot>

    <x-slot name="breadcrumbs"></x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-2">
        @foreach($offices as $office)
            <x-filament::section>
                <a href="{{ route('thunder.office.show',$office) }}" class="text-lg text-primary-600">
                    {{ $office->name }}
                </a>
                <cite>{!! $office->description !!}</cite>

                @if(!empty($office->form_ids))
                    <div class="ltr:ml-2 rtl:mr-2 mt-2">
                        <p>{{ __('Forms') }}:</p>
                        @foreach(\LaraZeus\Bolt\BoltPlugin::getModel('Form')::whereIn('id',$office->form_ids)->get() as $form)
                            <div>
                                <a href="{{ route('bolt.form.show',[$form,$office->slug]) }}"
                                   class="text-custom-600">
                                    {{ $form->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if(!empty($office->faq_ids))
                    <div class="ltr:ml-2 rtl:mr-2 mt-2">
                        <p>{{ __('Faq') }}:</p>
                        @foreach(\LaraZeus\Sky\SkyPlugin::get()->getTagModel()::whereIn('id',$office->faq_ids)->get() as $tag)
                            @foreach($tag->faq as $faq)
                                <div>
                                    <a href="{{ route('bolt.form.show',$form) }}/{{ $office->slug }}" class="text-custom-600">
                                        {{ $faq->question }}
                                    </a>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                @endif
            </x-filament::section>
        @endforeach
    </div>
</div>
