<div x-data class="my-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="md:col-span-2">

            <x-filament::section :compact="true">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        @if($ticket->user_id === auth()->user()->id)
                            <div class="relative">
                                <img src="{{ \Filament\Facades\Filament::getUserAvatarUrl($ticket->user) }}" alt="" class="w-10 h-10 rounded-full">
                            </div>
                            <div class="flex flex-col leading-tight">
                                <div class="text-2xl mt-1 flex items-center">
                                    <span class="text-gray-600 dark:text-gray-100 mr-3">{{ $ticket->user->name }}</span>
                                </div>
                                <span class="text-sm text-gray-600 dark:text-gray-100">
                                {{ __('On') }}: {{ $ticket->created_at->format('Y.m/d') }}-{{ $ticket->created_at->format('h:i a') }}
                            </span>
                            </div>
                        @elseif($ticket->assignee_id === auth()->user()->id)
                            <div class="relative">
                                <img src="{{ \Filament\Facades\Filament::getUserAvatarUrl($ticket->assignee) }}" alt="" class="w-10 sm:w-16 h-10 sm:h-16 rounded-full">
                            </div>
                            <div class="flex flex-col leading-tight">
                                <div class="text-2xl mt-1 flex items-center">
                                    <span class="text-gray-700 mr-3">{{ $ticket->assignee->name }}</span>
                                </div>
                                <span class="text-lg text-gray-600">xxxxxxxx</span>
                            </div>
                        @endif
                    </div>
                    <div class="flex items-center space-x-2">

                        <x-filament::icon-button
                            icon="heroicon-o-flag"
                            :color="($ticket->is_escalated) ? 'danger' : 'success'"
                            siz="sm"
                            :tooltip="__('Escalated')" />

                        @php $getStatues = $ticket->statusDetails() @endphp
                        <span class="gap-2 text-sm flex items-center justify-center">
                            <x-filament::icon-button
                                class="h-4 w-4"
                                :color="$getStatues['color']"
                                :icon="$getStatues['icon']"
                                siz="sm"
                                :tooltip="__('Status')"
                            />

                            <span class="text-sm">{{ __('Status') }}:</span>
                            <span class="text-sm">{{ $getStatues['label'] }}</span>
                        </span>

                        <span class="gap-2 text-sm flex items-center justify-center">
                            <x-filament::icon-button
                                class="h-4 w-4"
                                color="secondary"
                                icon="heroicon-o-flag"
                                siz="sm"
                                :tooltip="__('Priority')"
                            />
                            <span class="text-sm">{{ __('Priority') }}:</span>
                            <span class="text-sm" x-tooltip.raw="{{ __('Priority') }}">{{ str($ticket->priority)->title() }}</span>
                        </span>

                    </div>
                </div>
            </x-filament::section>

            <livewire:thunder.comments :ticketId="$ticket->id"/>
        </div>
        <div class="md:col-span-1 space-y-4">
            <div>
                <div class="space-y-2">
                    <x-filament::section :compact="true">
                        <x-slot name="heading">
                            <p class="text-custom-600">{{ __('Ticket Details') }}</p>
                        </x-slot>

                        <div class="flex flex-col">
                            <span class="text-gray-600 dark:text-gray-100">{{ __('Office') }}:</span>
                            <span class="text-primary-600">{{ $ticket->office->name ?? '' }}</span>
                        </div>

                        <div class="flex flex-col">
                            <span class="text-gray-600 dark:text-gray-100">{{ __('Form') }}:</span>
                            <span class="text-primary-600">{{ $ticket->form->name ?? '' }}</span>
                        </div>
                    </x-filament::section>
                </div>
            </div>

            <x-filament::section :compact="true">
                <x-slot name="heading">
                    {{ __('Entry Details') }}
                </x-slot>
                <div class="grid grid-cols-1 gap-2">
                    @foreach($ticket->response->fieldsResponses as $resp)
                        <div class="text-ellipsis overflow-auto">
                            <p>{{ $resp->field->name }}</p>
                            <p class="font-semibold mb-2">{!! ( new $resp->field->type )->getResponse($resp->field, $resp) !!}</p>
                            <hr/>
                        </div>
                    @endforeach
                </div>
            </x-filament::section>
        </div>
    </div>
</div>
