<x-admin.layout>

    @error('numero')
        <x-alert type='error'>{{ $message }}</x-alert>
    @enderror
    @error('code')
        <x-alert type='error'>{{ $message }}</x-alert>
    @enderror

@foreach ($tickets as $voyage_id => $ticket)
    <div class="py-4">
        <x-admin.table-ticket   :$voyage_id :$ticket  />
    </div>
@endforeach

</x-admin.layout>