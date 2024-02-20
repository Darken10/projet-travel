@props(['voyages'])
<!-- Table -->
<div class="my-4 w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200 ">
    <header class="px-5 py-4 border-b border-gray-100">
        <h2 class="font-semibold text-gray-800 capitalize">liste des Voyages</h2>
    </header>
    <div class="p-3">
        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                    <tr>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Compagnie</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Depart</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Destination</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Distance</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Heure Depart</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Prix</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Action</div>
                        </th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    @php
                        $a = 0
                    @endphp
                    
                    @foreach ($voyages as $voyage)
                        <tr class=" {{ ($a%2 != 0) ? 'bg-slate-100' :'' }} ">
                            <td class="p-2 whitespace-nowrap text-center">
                                <div class="text-center font-semibold">{{ $voyage->compagnie->sigle }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-center">{{ $voyage->depart()->name }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-center">{{ $voyage->destination()->name }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-center">{{ $voyage->distance() ?? '0' }} Km</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-center">{{ $voyage->heureDepart() }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-center">0 f cfa</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-center font-medium text-green-500">
                                    <a href="{{ route('voyage.show',$voyage) }}" class=" bg-blue-500 text-white font-semibold rounded-md px-4 py-1 capitalize "  >voir</a>
                                </div>
                            </td>
                        </tr>
                        @php
                            $a++
                        @endphp
                    @endforeach
                    
                </tbody>
            </table>
        </div>

        <div>
            {{ $voyages->links() }}
        </div>
    </div>
</div>

