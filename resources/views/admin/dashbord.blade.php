<x-admin.layout>

@foreach ($tickets as $voyage_id => $ticket)
    
    <div class="py-4">
        <x-admin.table-ticket   :$voyage_id :$ticket  />
    </div>

@endforeach

</x-admin.layout>