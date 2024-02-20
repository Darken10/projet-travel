<x-admin.layout>
    <div class="jumbotron">
        <h1 class="display-3">{{$tag->exists ? 'Modifier Une Etiquette' : 'Créer une Etiquete'}}</h1>
    </div>


    <form class="mb-5 " action="{{ $tag->exists ? route('admin.tag.update',$tag) : route('admin.tag.store') }}" method="POST">
        @csrf
        @method($tag->exists ? 'PUT' : 'POST')

        <div class="row">
            <x-admin.input label="Nom : "  name="name" placeholder="Etiquette " :value="$tag->name" required />
        </div>

        <div class="mt-5">
            <button type="submit" class="btn btn-primary">{{ $tag->exists ? 'Modifier' : 'Créer' }}</button>
        </div>
    </form>



</x-admin.layout>
