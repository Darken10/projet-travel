<x-admin.layout>
    <div class="jumbotron">
        <h1 class="display-3">{{$province->exists ? 'Modifier Une Ville' : 'Créer Une Ville'}}</h1>
    </div>


    <form class="mb-8 " action="{{ $province->exists ? route('root.province.update',$province) : route('root.province.store') }}" method="post">
        @csrf
        @method($province->exists ? 'PUT' : 'POST')

        <div class="row">
            <x-admin.input label="Nom de la province : "  name="name" placeholder="Nom de la province " :value="$province->name" required />
        </div>
        
        <div class="row">
            <x-admin.select label="Region" name="region_id" :options="App\Models\Root\Region::pluck('name','id')" :value="$province->region_id" />
        </div>


{{--  

        <x-admin.select label="Etiquettes " name="tag" :options="App\Models\Tag::pluck('name','id')" :value="$post->tags->pluck('id')" multiple />

--}}



        <div class="mt-5">
            <button type="submit" class="btn btn-primary">{{ $province->exists ? 'Modifier' : 'Créer' }}</button>
        </div>
    </form>



</x-admin.layout>
