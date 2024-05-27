<x-layout>
    @php
        $sommeT = 0;
    @endphp
    <div class=" max-w-2xl m-auto mb-8">
        @forelse ($tickets as $ticket)
            <x-ticket.ticket :$ticket/>
            @php
                $sommeT += $ticket->prix;
            @endphp
        @empty
            <x-shared.empty>Aucun Ticket</x-shared.empty>
        @endforelse
        <div class=" bg-white rounded-md mt-8 p-4 shadow-md">
            <div class=" flex justify-between mt-4 mx-8">
                <span>Nombre de Tickets :</span> 
                <span class=" font-semibold"> {{ count($tickets) }} Tickets</span> 
            </div>
            
            <div class=" flex justify-between mt-4 mx-8">
                <span>Somme Totale :</span> 
                <span class=" font-semibold"> {{ $sommeT }} F CFA</span> 
            </div>
        </div>
    </div>
</x-layout>