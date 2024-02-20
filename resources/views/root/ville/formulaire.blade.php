<x-admin.layout>
    <div class="jumbotron">
        <h1 class="display-3">{{$ville->exists ? 'Modifier Une Ville' : 'Créer Une Ville'}}</h1>
    </div>


    <form class="mb-8 " action="{{ $ville->exists ? route('root.ville.update',$ville) : route('root.ville.store') }}" method="post">
        @csrf
        @method($ville->exists ? 'PUT' : 'POST')

        <div class="row">
            <x-admin.input label="Nom de la ville : "  name="name" placeholder="Nom de la ville " :value="$ville->name" required />
        </div>
        
        
        
        <div class="row">
            <x-admin.select label="Province" name="province_id" :options="App\Models\Root\Province::pluck('name','id')" :value="$ville->province_id" />
        </div>
        


{{--  

        <x-admin.select label="Categorie" name="category" :options="App\Models\Category::pluck('name','id')" :value="$post->category_id" />
        <x-admin.select label="Etiquettes " name="tag" :options="App\Models\Tag::pluck('name','id')" :value="$post->tags->pluck('id')" multiple />

--}}
        <div class="mt-5">
            <button type="submit" class="btn btn-primary">{{ $ville->exists ? 'Modifier' : 'Créer' }}</button>
        </div>
    </form>



</x-admin.layout>
