<x-admin.layout>
    <div class="jumbotron">
        <h1 class="display-3">{{$compagnie->exists ? 'Modifier Une Ville' : 'Créer Une Ville'}}</h1>
    </div>


    <form class="mb-8 " action="{{ $compagnie->exists ? route('root.compagnie.update',$compagnie) : route('root.compagnie.store') }}" method="post">
        @csrf
        @method($compagnie->exists ? 'PUT' : 'POST')

        <div class="row">
            <div class="col-8">
                <x-admin.input label="Nom de la compagnie : "  name="name" placeholder="Nom de la compagnie " :value="$compagnie->name" required />
            </div>
            <div class="col-4">
                <x-admin.input label="Sigle : "  name="sigle" placeholder="Sigle " :value="$compagnie->sigle" required />
            </div>
        </div>
        <div class="row">
            <x-admin.input label="Slogant : "  name="slogant" placeholder="Slogant " :value="$compagnie->slogant" required />
        </div>

        <div class="row">
            <x-admin.input label="Description : "  type="textarea" name="description" placeholder="Une petite description ... " :value="$compagnie->description" required />
        </div>
                 
        <div class="row">
            <x-admin.select label="Patron " name="patron_id" :options="App\Models\User::pluck('name','id')" :value="$compagnie->patron_id" />
        </div>
        
        


        {{--  

        <x-admin.select label="Categorie" name="category" :options="App\Models\Category::pluck('name','id')" :value="$post->category_id" />
        <x-admin.select label="Etiquettes " name="tag" :options="App\Models\Tag::pluck('name','id')" :value="$post->tags->pluck('id')" multiple />

        --}}
        <div class="mt-5">
            <button type="submit" class="btn btn-primary">{{ $compagnie->exists ? 'Modifier' : 'Créer' }}</button>
        </div>
    </form>



</x-admin.layout>
