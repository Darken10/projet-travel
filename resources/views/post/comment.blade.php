<x-layout>
   
    <div class="pb-5">
        <x-post-item :post="$comment->post" />
        <div class="pt-2">
            <div class=" px-4 ">
                <x-comment-item :$comment reponse/>
            </div>
        </div>
        <div class="p-2">
            @forelse ($comment->reponses as $reponse)
                <x-reponse-comment-item :$reponse />
            @empty
                <div class="py-4 text-center text-4xl uppercase text-gray-400">
                    Aucune Reponse
                </div>
            @endforelse
        </div>
    </div>

    <div>
        <form action="{{ route('post.storeReponse',$comment) }}" method="post">
            @csrf
            <x-input-comment name="reponse" />
        </form>
    </div>


</x-layout>