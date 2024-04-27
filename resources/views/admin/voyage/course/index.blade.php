<x-admin.layout>


<!-- Table -->
<div class="w-full mx-auto bg-white shadow-lg rounded-md border border-gray-200 py-4">
    <header class="px-5 py-4 border-b border-gray-100 flex justify-between">
        <h2 class="font-semibold text-2xl text-gray-800 capitalize flex justify-between items-center">Les Courses</span> </h2>
        <a href="{{ route('admin.voyage.course.create') }}" class=" bg-green-500 text-white font-semibold mx-2  px-2  flex no-underline text-center rounded-lg">
            <span class=" flex text-white text-5xl pl-2">+</span>
            <span class=" flex justify-center align-middle content-center items-center ml-1 pr-2">Ajouter</span>
        </a>
    </header>

    @if (! $courses->isEmpty())
    <div class="p-3">
        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                    <tr>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">N°</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Depart</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Destination</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Statut</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Heure Depart</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Heure Arriver</div>
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
                    @foreach ($courses as $course)
                        <tr @class([' bg-gray-200'=>$i % 2 == 1 ])>
                            <td class="p-2 whitespace-nowrap" >
                                {{ $i+1 }}
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div>{{ $course->ligne->depart->name }} ({{ $course->ligne->depart->pays->name }})</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div>{{ $course->ligne->destination->name }} ({{ $course->ligne->destination->pays->name }})</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">

                                <div @class(['text-green-500' => $course->statut_id == 1,'text-red-500'=>$course->statut_id == 2, 'text-yellow-500'=>$course->statut_id == 3 ]) >{{ $course?->statutName() }} </div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div>{{ $course->heure_depart }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div>{{ $course->heure_arriver }} </div>
                            </td>
                            
                            <td class="p-2 whitespace-nowrap ">

                                <div class="text-left flex justify-end">

                                    <div class="inline-flex items-center rounded-md shadow-sm">
                                        <a href="{{ route('admin.voyage.course.edit',$course) }}">
                                            <button class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-l-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                  </svg>
                                                  </span>
                                            </button>
                                        </a>

                                        {{-- le btn vue --}}
                                        <button data-modal-target="medium-modal{{ $course->id }}" data-modal-toggle="medium-modal{{ $course->id }}" class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border-y border-slate-200 font-medium px-4 py-2 inline-flex space-x-1 items-center" type="button" >
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>                      
                                            </span>
                                        </button>
                                        <!-- Default Modal -->
                                        <div id="medium-modal{{ $course->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-lg max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <!-- Modal header -->
                                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t-lg bg-emerald-500 dark:bg-emerald-800 dark:border-gray-600">
                                                        <h3 class="text-xl font-bold text-gray-100 dark:text-white whitespace-normal">
                                                            {{ $course->ligne->depart->name }} - {{ $course->ligne->destination->name }}
                                                        </h3>
                                                        <button type="button" class="text-gray-100 font-bold bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="medium-modal{{ $course->id }}">
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
                                                                    <td class=" justify-start px-4 font-semibold">{{ $course->ligne->depart->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class=" flex justify-end ">Destination : </td>
                                                                    <td class=" justify-start px-4 font-semibold">{{ $course->ligne->destination->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class=" flex justify-end ">Heure Depart: </td>
                                                                    <td class=" justify-start px-4 font-semibold">{{ $course->heure_depart }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class=" flex justify-end ">Heure Arriver : </td>
                                                                    <td class=" justify-start px-4 font-semibold">{{ $course->heure_arriver }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class=" flex justify-end ">Distance : </td>
                                                                    <td class=" justify-start px-4 font-semibold">{{ $course->ligne->distance ?? 0 }} km</td>
                                                                </tr>
                                                                
                                                            </table>
                                                        </p>
                                                        
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div class="flex justify-between items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                        <a href="{{ route('admin.voyage.course.edit',$course) }}" data-modal-hide="medium-modal{{ $course->id }}" type="button" class=" no-underline text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Modifier</a>
                                                        <button data-modal-hide="medium-modal{{ $course->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-300 hover:text-blue-900 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 focus:bg-slate-400 focus:text-gray-100 ">Anuller</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        {{-- le btn Delete --}}
                                        <form action="{{ route('admin.voyage.course.destroy',$course) }}" method="post">
                                            @csrf
                                            @method('DELETE')



                                                <button data-modal-target="popup-modal-{{ $course->id }}" data-modal-toggle="popup-modal-{{ $course->id }}" type="button" class="text-slate-800 hover:text-red-700 hover:bg-red-500 text-sm bg-white  border border-slate-200 rounded-r-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                                                    <span >
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500 hover:text-red-900">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                      </svg>
                                                      </span>
                                                </button>
                                                
                                                <div id="popup-modal-{{ $course->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{ $course->id }}">
                                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                            <div class="p-4 md:p-5 text-center">
                                                                <svg class="mx-auto mb-4 text-red-600 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                                </svg>
                                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Etes-vous sûr de supprimer <br> cette article définitivement ?</h3>
                                                                <button data-modal-hide="popup-modal-{{ $course->id }}" type="submit" class= "  text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                    Oui
                                                                </button>
                                                                <button data-modal-hide="popup-modal-{{ $course->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Non</button>
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
                            <span class=" font-semibold">{{ count($courses) }}</span> Courses
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

<div class=" mt-4">
    {{ $courses->links() }}
</div>




</x-admin.layout>