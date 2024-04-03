<x-admin.layout>

    <div class=" bg-emerald-600 py-3 px-4 rounded-t-md ">
        <h1 class=" flex ml-6 text-3xl text-white font-bold">{{$tag->exists ? 'Modifier Une Etiquette' : 'Créer une Etiquete'}}</h1>
    </div>

    <div class=" bg-gray-50 p-8 rounded-b-md shadow-xl">
        <form class="mb-5 " action="{{ $tag->exists ? route('admin.tag.update',$tag) : route('admin.tag.store') }}" method="POST">
            @csrf
            @method($tag->exists ? 'PUT' : 'POST')
            <x-admin.input class="py-4" label="Nom : "  name="name" placeholder="Etiquette " :value="$tag->name" required />
            <x-admin.btn-primary class="py-4" type="submit">{{ $tag->exists ? 'Sauvegarder' : 'Créer l\'Ediquette' }}</x-admin.btn-primary>
        
        </form>
    </div>



</x-admin.layout>
