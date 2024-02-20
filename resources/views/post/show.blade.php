<x-layout>
    <div class="pb-5">
        <x-post-item :$post />
        <div class="pt-2">
            @forelse ($post->comments as $comment)
                <div class=" px-4 ">
                    <x-comment-item :$comment />
                </div>
            @empty
                <div class="text-center uppercase text-4xl text-gray-500">
                    Aucun Commentaire
                </div>
            @endforelse
        </div>
        
    </div>
    <form action="{{ route('post.storeComment',$post) }}" method="post">
        @csrf

        <x-input-comment name="comment" />
    </form>


</x-layout>