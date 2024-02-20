<x-admin.layout>
    <div class="jumbotron">
        <h1 class="display-3">{{$region->exists ? 'Modifier Une Ville' : 'Créer Une Ville'}}</h1>
    </div>


    <form class="mb-8 " action="{{ $region->exists ? route('root.region.update',$region) : route('root.region.store') }}" method="post">
        @csrf
        @method($region->exists ? 'PUT' : 'POST')

        <div class="row">
            <x-admin.input label="Nom de la region : "  name="name" placeholder="Nom de la region " :value="$region->name" required />
        </div>
        <div class="row">
            <x-admin.select label="Pays" name="pays_id" :options="App\Models\Root\Pays::pluck('name','id')" :value="$region->pays_id" />
        </div>
        
        
        {{--
            <div class="row">
            <x-admin.input type="textarea" label="Contenu de l'article" name="content" placeholder="contenu de l'article " :value="$post->content"  />
        </div>
        --}}


{{--  

        <x-admin.select label="Etiquettes " name="tag" :options="App\Models\Tag::pluck('name','id')" :value="$post->tags->pluck('id')" multiple />

--}}
        <div class="mt-5">
            <button type="submit" class="btn btn-primary">{{ $region->exists ? 'Modifier' : 'Créer' }}</button>
        </div>
    </form>



</x-admin.layout>
