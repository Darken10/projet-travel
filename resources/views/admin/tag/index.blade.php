<x-admin.layout>

<!-- Table -->
<div class="w-full mx-auto bg-white shadow-lg rounded-md border border-gray-200 py-4">
    <header class="px-5 py-4 border-b border-gray-100 flex justify-between">
        <h2 class="font-semibold sm:text-xl md:text-4xl text-gray-800 capitalize flex justify-between items-center">Les Etiquettes</span> </h2>
        <a href="{{ route('admin.tag.create') }}" class=" bg-green-500 text-white font-semibold mx-2  px-2  flex no-underline text-center rounded-lg">
            <span class=" flex text-white text-5xl pl-2">+</span>
            <span class=" flex justify-center align-middle content-center items-center ml-1 pr-2">Ajouter</span>
        </a>
    </header>

    @if (! $tags->isEmpty())
    <div class="p-3 m-auto  ">
        <div class="overflow-x-auto ">
            <table class="table-auto w-full">
                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                    <tr>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">N°</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Nom</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Nombre de Posts</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left flex justify-center">Action</div>
                        </th>
                        
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($tags as $tag)
                        <tr @class([' bg-gray-200'=>$i % 2 == 1 ])>
                            <td class="p-2 whitespace-nowrap text-center">
                                {{ $i+1 }}
                            </td>
                            <td class="p-2 whitespace-nowrap text-center">
                                {{ $tag->name }}
                            </td>
                            <td class="p-2 whitespace-nowrap text-center">
                                {{ count($tag->posts) ?? 0 }} posts
                            </td>
                            <td class="p-2 whitespace-nowrap ">
                                <div class="text-left flex justify-end">
                                    <div class="inline-flex items-center rounded-md shadow-sm">
                                        <a href="{{ route('admin.tag.edit',$tag) }}">
                                            <button class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-l-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                  </svg>
                                                  </span>
                                            </button>
                                        </a>

                                        {{-- le btn Delete --}}
                                        <form action="{{ route('admin.tag.destroy',$tag) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                                <button data-modal-target="popup-modal{{ $tag->id }}" data-modal-toggle="popup-modal{{ $tag->id }}" type="button" class="text-slate-800 hover:text-red-700 hover:bg-red-200 text-sm bg-white  border border-slate-200 rounded-r-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                                                    <span >
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600 hover:text-red-800">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                      </svg>
                                                    </span>
                                                </button>
                                                
                                                <div id="popup-modal{{ $tag->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal{{ $tag->id }}">
                                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                            <div class="p-4 md:p-5 text-center">
                                                                <svg class="mx-auto mb-4 text-red-600 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                                </svg>
                                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Etes-vous sûr de supprimer <br> définitivement étiquette  {{ $tag->name }}?</h3>
                                                                <button data-modal-hide="popup-modal{{ $tag->id }}" type="submit" class= "  text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                    Oui
                                                                </button>
                                                                <button data-modal-hide="popup-modal{{ $tag->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Non</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>




                                            
                                        </form>

                                        
                                    </div>
                                </div>
                            </td>
                        </tr>

                        @php
                            $i++;
                        @endphp
                    @endforeach
                    
                </tbody>
                <tfoot class="text-lg divide-y divide-gray-100  ">
                    <tr class=" border-t border-gray-400 ">
                        <td colspan="3" class=" px-4 col-span-3 py-2">
                            Nombres :
                        </td>
                        <td class="py-2">
                            <span class=" font-semibold">{{ count($tags) }}</span> Etiquettes
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @else
        <span class=" text-4xl font-bold uppercase text-gray-500 flex justify-center align-middle" >
            Aucune Etiquette
        </span>
    @endif
    
</div>
<div class="py-5">
    {{ $tags->links() }}
</div>



<script src="{{ asset('node_modules/flowbite/flowbite.js') }}"></script>







</x-admin.layout>

