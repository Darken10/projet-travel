<x-admin.layout>
    <link rel="stylesheet" href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}">

    <div class=" bg-emerald-600 py-3 px-4 rounded-t-md ">
        <h1 class=" flex ml-6 text-3xl text-white font-bold">{{$ligne->exists ? 'Modifier Une Ligne' : 'Créer Une Ligne'}}</h1>
    </div>

    <div class=" bg-gray-50 p-8 rounded-b-md shadow-xl">

        <form class="mb-8 " action="{{ $ligne->exists ? route('admin.voyage.ligne.update',$ligne) : route('admin.voyage.ligne.store') }}" method="post">
            @csrf
            @method($ligne->exists ? 'PUT' : 'POST')

            <div class=" md:columns-2 py-2">
                <x-admin.select label="Ville de Depart" name="depart_id" :options="App\Models\Root\Ville::pluck('name','id')" :value="$ligne->depart_id" />
                <x-admin.select label="Ville de Destination " name="destination_id" :options="App\Models\Root\Ville::pluck('name','id')" :value="$ligne->destination_id" />
            </div>
            
            <x-admin.input type="number" class="py-2" label="Distance en Kilomètre (Km) " name="distance"  :value="$ligne->distance" min="0"/>
            
            {{-- <x-admin.input type="textarea" label="Contenu de l'article" name="content" placeholder="contenu de l'article " :value="$post->content"  /> --}}
            {{-- <x-admin.select label="Etiquettes " name="tag" :options="App\Models\Tag::pluck('name','id')" :value="$post->tags->pluck('id')" multiple /> --}}
            <div class="mt-5">
                <x-admin.btn-primary type="submit" class="py-2">{{ $ligne->exists ? 'Enregistrer' : 'Créer Une Ligne' }}</x-admin.btn-primary>
            </div>
        </form>
    </div>

    <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('node_modules/select2/dist/js/select2.min.js') }}"></script>

    <script>
        $(function (){
            $('.select2').select2()
        })
    </script>



</x-admin.layout>
