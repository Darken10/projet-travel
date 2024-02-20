<x-admin.layout>
    <div class="jumbotron">
        <h1 class="display-3">Les Commentaites</h1>
    </div>
    
    <x-post-item :$post admin/>

    @forelse ($post->comments as $comment)
        <x-admin.comment :$comment/>
    @empty
        <div class="p-4 text-center text-4xl uppercase text-gray-500">
            Aucun Commentaire 
        </div>
    @endforelse



</x-admin.layout>
