<x-admin.layout>
    <div class="jumbotron">
        <h1 class="display-3">Les Commentaites</h1>
    </div>


    <form class="mb-5 " action="{{  }}" method="post">
        @csrf
        <div class="row">
            <x-admin.input type="textarea" label="Contenu de l'article" name="content" placeholder="contenu de l'article " :value="$post->content"  />
        </div>

        <div class="mt-5">
            <button type="submit" class="btn btn-primary">{{ $post->exists ? 'Modifier' : 'Créer' }}</button>
        </div>
    </form>



</x-admin.layout>
