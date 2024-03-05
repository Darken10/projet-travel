<x-layout>
   
    <div class=" flex colums-2">
        <div class="">
            <h3 class="text-xl font-bold ">Conversation  ({{ Auth::user()->name }}) </h3>
            <ul>
                @forelse ($users as $user)
                    <li><a href="{{ route('chat.show',$user) }}">{{ $user->name }}</a></li>
                @empty
                    <div>Aucun Utilisateur</div>
                @endforelse
            </ul>
        </div>
    
        
    </div>

</x-layout>