@props(['voyage_id','ticket'])

@php
    $voyage = App\Models\Voyage\Voyage::find($voyage_id)
@endphp

<!-- Table -->
<div class="w-full mx-auto bg-white shadow-lg rounded-md border border-gray-200 py-4">
    <header class="px-5 py-4 border-b border-gray-100">
        <h2 class="font-semibold text-gray-800 capitalize flex justify-between">{{ $voyage->depart()->name.' - '.$voyage->destination()->name }}  <span class=" text-2xl">{{ $voyage->heureDepart() }}</span> </h2>
    </header>

    @if (! $ticket->isEmpty())
    <div class="p-3">
        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                    <tr>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Ticket</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Nom Prenom</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Email</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Statut</div>
                        </th>
                        
                        
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    
                    @foreach ($ticket as $tk)
                        <tr>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-lg text-center">{{ $tk->code }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src="{{ $tk->user->profileUrl }}" width="40" height="40" alt="Alex Shatov"></div>
                                    <div class="font-medium text-gray-800">{{ $tk->user->name }}</div>
                                </div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-left">{{ $tk->user->email }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-left font-medium text-green-500">{{ $tk->statut->name }}</div>
                            </td>
                            
                        </tr>
                    @endforeach
                    
                </tbody>
                <tfoot class="text-lg divide-y divide-gray-100  ">
                    <tr class=" border-t border-gray-400 ">
                        <td colspan="3" class=" px-4 col-span-3 py-2">
                            Nombres :
                        </td>
                        <td class="py-2">
                            <span class=" font-semibold">{{ count($ticket) }}</span> Passagers
                        </td>
                    </tr>
                    <tr >
                        <td colspan="3" class=" px-4 col-span-3 py-2">
                            Total :
                        </td>
                        <td class="py-2">
                            <span class=" font-semibold">1000</span> F CFA
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @else
        <span class=" text-4xl font-bold uppercase text-gray-500 flex justify-center align-middle" >
            Aucun passager
        </span>
    @endif
    
</div>
