<x-layout>
   
    <div class=" flex colums-2">
        <div class="">
            <div class=" px-4">
                <h3 class="text-xl font-bold ">Admin  ({{ Auth::user()->name }}) </h3>
                <x-chat.chat-compagnies :$compagnies  />
            </div>
        </div>
    
        
    </div>

</x-layout>