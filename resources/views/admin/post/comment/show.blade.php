<x-admin.layout>
    <div class="jumbotron">
        <h1 class="display-3">Les Commentaites</h1>
    </div>

    

    <x-post-item :post='$comment->post' />

    
    <x-admin.comment :$comment reponse/>
        
    <div class="">
        @forelse ($comment->reponses as $reponse)
            <x-admin.comment-reponse  :$reponse />
        @empty
            <div class="text-gray-400 text-4xl uppercase text-center ">
                Aucune reponse
            </div>
        @endforelse
    </div>
   
    <form class="mb-5 " action="{{ route('admin.comment.storeReponse',$comment) }}" method="post">
        @csrf
        <x-admin.input-reponse name="reponse" />
    </form>
    



</x-admin.layout>


