<x-admin.layout>



<!-- Table -->
<div class="w-full mx-auto bg-white shadow-lg rounded-md border border-gray-200 py-4">
    <header class="px-5 py-4 border-b border-gray-100 flex justify-between">
        <h2 class="font-semibold text-gray-800 capitalize flex justify-between items-center text-3xl">Les Lignes</span> </h2>
        <a href="{{ route('admin.voyage.ligne.create') }}" class=" bg-green-500 text-white font-semibold mx-2  px-2  flex no-underline text-center rounded-lg">
            <span class=" flex text-white text-5xl pl-2">+</span>
            <span class=" flex justify-center align-middle content-center items-center ml-1 pr-2">Ajouter</span>
        </a>
    </header>

    @if (! $lignes->isEmpty())
    <div class="p-3">
        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                    <tr>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Depart</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Destination</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Distance</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left flex justify-center">Action</div>
                        </th>
                        
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    @php
                        $i = 0;
                        $nbLikes = 0;
                        $nbComments = 0;
                    @endphp
                    @foreach ($lignes as $ligne)
                        <tr @class([' bg-gray-200'=>$i % 2 == 1 ])>
                            
                            <td class="p-2 whitespace-nowrap">
                                <div>{{ $ligne->depart->name }} ({{ $ligne->depart->pays->name }})</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div>{{ $ligne->destination->name }} ({{ $ligne->destination->pays->name }})</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div>{{ $ligne->distance ?? 0 }} km</div>
                            </td>
                            
                            <td class="p-2 whitespace-nowrap ">

                                <div class="text-left flex justify-end">

                                    <div class="inline-flex items-center rounded-md shadow-sm">
                                        <a href="{{ route('admin.voyage.ligne.edit',$ligne) }}">
                                            <button class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-l-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                  </svg>
                                                  </span>
                                            </button>
                                        </a>

                                        {{-- le btn vue --}}
                                        <button data-modal-target="medium-modal{{ $ligne->id }}" data-modal-toggle="medium-modal{{ $ligne->id }}" class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border-y border-slate-200 font-medium px-4 py-2 inline-flex space-x-1 items-center" type="button" >
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>                      
                                            </span>
                                        </button>
                                        <!-- Default Modal -->
                                        <div id="medium-modal{{ $ligne->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-lg max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <!-- Modal header -->
                                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-xl font-medium text-gray-900 dark:text-white whitespace-normal">
                                                            {{ $ligne->depart->name }} - {{ $ligne->destination->name }}
                                                        </h3>
                                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="medium-modal{{ $ligne->id }}">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="p-4 md:p-5 space-y-4">
                                                        
                                                        <p >
                                                            <table class=" flex justify-center text-base leading-relaxed text-gray-500 dark:text-gray-400 whitespace-normal">
                                                                <tr>
                                                                    <td class=" flex justify-end ">Depart : </td>
                                                                    <td class=" justify-start px-4 font-semibold">{{ $ligne->depart->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class=" flex justify-end ">Destination : </td>
                                                                    <td class=" justify-start px-4 font-semibold">{{ $ligne->destination->name }}</td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td class=" flex justify-end ">Distance : </td>
                                                                    <td class=" justify-start px-4 font-semibold">{{ $ligne->distance ?? 0 }} km</td>
                                                                </tr>
                                                                
                                                            </table>
                                                        </p>
                                                        
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                        <a href="{{ route('admin.voyage.ligne.edit',$ligne) }}" data-modal-hide="medium-modal{{ $ligne->id }}" type="button" class=" no-underline text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Modifier</a>
                                                        <button data-modal-hide="medium-modal{{ $ligne->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Anuller</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                  
                                    </div>
                                </div>
                            </td>
                            
                            
                        </tr>

                        @php
                            $i++;
                            $nbLikes = 0;
                            $nbComments =0;
                        @endphp





                    @endforeach
                    
                </tbody>
                <tfoot class="text-lg divide-y divide-gray-100  ">
                    <tr class=" border-t border-gray-400 ">
                        <td colspan="3" class=" px-4 col-span-3 py-2">
                            Nombres :
                        </td>
                        <td class="py-2">
                            <span class=" font-semibold">{{ count($lignes) }}</span> Lignes
                        </td>
                    </tr>
                    
                </tfoot>
            </table>
        </div>
    </div>
    @else
        <span class=" text-4xl font-bold uppercase text-gray-500 flex justify-center align-middle" >
            Aucune Ligne
        </span>
    @endif
    
</div>

<script src="{{ asset('node_modules/flowbite/flowbite.min.js') }}"></script>
<script src="{{ asset('js/functions.js') }}"></script>
<script>
    Asombrire('medium-modal{{ $ligne->id }}')
</script>

</x-admin.layout>