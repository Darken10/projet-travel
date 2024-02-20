<x-layout>
    <div >
        @forelse ($tickets as $ticket)
            <x-ticket.ticket :$ticket/>
        @empty
            <x-shared.empty>Aucun Ticket</x-shared.empty>
        @endforelse
    </div>
</x-layout>