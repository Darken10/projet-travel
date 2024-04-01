<x-admin.layout>
    <div class=" bg-emerald-600 py-3 px-4 rounded-t-md ">
        <h1 class=" flex ml-6 text-3xl text-white font-bold">{{$tag->exists ? 'Modifier Une Etiquette' : 'Créer une Etiquete'}}</h1>
    </div>



    <form class="mb-5 " action="{{ $tag->exists ? route('admin.tag.update',$tag) : route('admin.tag.store') }}" method="POST">
        @csrf
        @method($tag->exists ? 'PUT' : 'POST')

        <div class="row">
            <x-admin.input label="Nom : "  name="name" placeholder="Etiquette " :value="$tag->name" required />
        </div>

        <div class="mt-5">
            <x-admin.btn-primary type="submit">{{ $tag->exists ? 'Sauvegarder' : 'Créer l\'Ediquette' }}</x-admin.btn-primary>
        </div>
    </form>



</x-admin.layout>
