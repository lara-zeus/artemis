<div class="gap-2 flex flex-col space-y-4">
    <span>
        {{ __('your ticket number is') }}
        <span class="font-semibold">{{ $ticket->ticket_no }}</span>
    </span>
    <div>
        <x-filament::button icon="heroicon-o-eye" tag="a" href="{{ route('thunder.ticket.show',['ticketNo'=>$ticket->ticket_no]) }}">
            {{ __('Show Ticket') }}
        </x-filament::button>
    </div>
</div>