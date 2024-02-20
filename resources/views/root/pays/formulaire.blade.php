<x-admin.layout>
    <div class="jumbotron">
        <h1 class="display-3">{{$pays->exists ? 'Modifier Une Ville' : 'Créer Une Ville'}}</h1>
    </div>


    <form class="mb-8 " action="{{ $pays->exists ? route('root.pays.update',$pays) : route('root.pays.store') }}" method="post">
        @csrf
        @method($pays->exists ? 'PUT' : 'POST')

        <div class="row">
            <x-admin.input label="Nom du pays : "  name="name" placeholder="Nom de la pays " :value="$pays->name" required />
        </div>
        <div class="row">
            <x-admin.input label="Identifiant du numero : "  name="numero_identifiant" placeholder="exemple: +226 " :value="$pays->numero_identifiant" required />
        </div>
        
        
        {{--
            <div class="row">
            <x-admin.input type="textarea" label="Contenu de l'article" name="content" placeholder="contenu de l'article " :value="$post->content"  />
        </div>
        --}}


{{--  

        <x-admin.select label="Categorie" name="category" :options="App\Models\Category::pluck('name','id')" :value="$post->category_id" />
        <x-admin.select label="Etiquettes " name="tag" :options="App\Models\Tag::pluck('name','id')" :value="$post->tags->pluck('id')" multiple />

--}}
        <div class="mt-5">
            <button type="submit" class="btn btn-primary">{{ $pays->exists ? 'Modifier' : 'Créer' }}</button>
        </div>
    </form>



</x-admin.layout>
