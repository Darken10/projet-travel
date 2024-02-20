<x-admin.layout>


<!-- Table -->
<div class="w-full mx-auto bg-white shadow-lg rounded-md border border-gray-200 py-4">
    <header class="px-5 py-4 border-b border-gray-100 flex justify-between">
        <h2 class="font-semibold text-gray-800 capitalize flex justify-between items-center">Les Publiciter</span> </h2>
        <a href="{{ route('admin.post.create') }}" class=" bg-green-500 text-white font-semibold mx-2  px-2  flex no-underline text-center rounded-lg">
            <span class=" flex text-white text-5xl pl-2">+</span>
            <span class=" flex justify-center align-middle content-center items-center ml-1 pr-2">Ajouter</span>
        </a>
    </header>

    @if (! $posts->isEmpty())
    <div class="p-3">
        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                    <tr>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Titre</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Statistiques</div>
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
                    @foreach ($posts as $post)
                        <tr @class([' bg-gray-200'=>$i % 2 == 1 ])>
                            <td class="p-2 whitespace-nowrap">
                                <div class="flex items-center ">
                                    @if (! $post->images->isEmpty())
                                        <div class="w-24  flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-lg w-full" src="{{ asset($post->images[0]->url) }}" width="40" height="40" alt="Alex Shatov"></div>
                                    @endif

                                    <div class="block">
                                        <div class="font-semibold text-gray-800 ml-4 flex ">{{ Str::limit($post->title, 30, '...') }}</div>
                                        <div class=" text-gray-500 text-xs">{{ Str::limit($post->content, 50, '...') }}</div>
                                        <div class="flex">
                                            @foreach ($post->tags as $tag)
                                                <div class=" text-xs m-1 px-2 text-center bg-violet-600 rounded-md text-white">{{ $tag->name }}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="block">
                                    <div class="flex">
                                        <div class="mr-2 ">
                                            Likes : <span class="font-semibold">{{ count($post->likes) }}</span>
                                        </div>
                                        <svg class="fill-rose-600 dark:fill-rose-400" style="width: 22px; height: 22px;"
                                            viewBox="0 0 24 24">
                                            <path d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z"></path>
                                        </svg>
                                                                        
                                    </div>
                                    <div>
                                        <div class="flex ">
                                            <div class="mr-2">commentaire : 
                                                <span class=" font-semibold">{{ count($post->comments) }}</span>
                                            </div>
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5"><path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            
                            <td class="p-2 whitespace-nowrap ">
                                <div class="text-left flex justify-end">

                                    <div class="inline-flex items-center rounded-md shadow-sm">
                                        <a href="{{ route('admin.post.edit',$post) }}">
                                            <button class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-l-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                  </svg>
                                                  </span>
                                            </button>
                                        </a>
                                        <button class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border-y border-slate-200 font-medium px-4 py-2 inline-flex space-x-1 items-center">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                  </svg>                      
                                            </span>
                                        </button>

                                        <form action="{{ route('admin.post.destroy',$post) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-slate-800 hover:text-red-700 hover:bg-red-500 text-sm bg-white  border border-slate-200 rounded-r-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                                                <span >
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500 hover:text-red-900">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                  </svg>
                                                  </span>
                                            </button>
                                        </form>

                                        
                                    </div>

                                </div>
                            </td>
                            
                            
                        </tr>

                        @php
                            $i++;
                            $nbLikes = count($post->likes) + $nbLikes;
                            $nbComments =+ count($post->comments) + $nbComments;
                        @endphp
                    @endforeach
                    
                </tbody>
                <tfoot class="text-lg divide-y divide-gray-100  ">
                    <tr class=" border-t border-gray-400 ">
                        <td colspan="3" class=" px-4 col-span-3 py-2">
                            Nombres :
                        </td>
                        <td class="py-2">
                            <span class=" font-semibold">{{ count($posts) }}</span> Passagers
                        </td>
                    </tr>
                    <tr >
                        <td colspan="3" class=" px-4 col-span-3 py-2">
                            Total Likes:
                        </td>
                        <td class="py-2">
                            <div class="flex">
                                <span class="font-semibold mr-2 ">{{ count($post->likes) }}</span>
                                <svg class="fill-rose-600 dark:fill-rose-400" style="width: 22px; height: 22px;" viewBox="0 0 24 24">
                                    <path d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z"></path>
                                </svg>
                                                                
                            </div>
                        </td>
                    </tr>
                    <tr >
                        <td colspan="3" class=" px-4 col-span-3 py-2">
                            Total Commentaires:
                        </td>
                        <td class="py-2">
                            <div class="flex"> 
                                <span class=" font-semibold mr-2">{{ count($post->comments) }}</span>
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                            </div>
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





<script>

</script>

</x-admin.layout>