<x-layout>
   
    <div>
        @foreach ($posts as $post)
            <x-post-item :$post />
        @endforeach
    </div>
    <div class="pb-8">
        {{ $posts->links() }}
    </div>

</x-layout>
