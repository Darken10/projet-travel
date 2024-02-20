<x-admin.layout>
    <link rel="stylesheet" href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}">

    <div class="jumbotron">
        <h1 class="display-3">{{$ligne->exists ? 'Modifier Une Ville' : 'Créer Une Ville'}}</h1>
    </div>


    <form class="mb-8 " action="{{ $ligne->exists ? route('admin.voyage.ligne.update',$ligne) : route('admin.voyage.ligne.store') }}" method="post">
        @csrf
        @method($ligne->exists ? 'PUT' : 'POST')

        <div class="row">
            <div class="col-sm-6">
                <x-admin.select label="Ville de Depart" name="depart_id" :options="App\Models\Root\Ville::pluck('name','id')" :value="$ligne->depart_id" />
            </div>
            <div class="col-sm-6">
                <x-admin.select label="Destination " name="destination_id" :options="App\Models\Root\Ville::pluck('name','id')" :value="$ligne->destination_id" />
            </div>
            <div class="col-sm-6 mt-4">
                <x-admin.input label="distance " name="distance"  :value="$ligne->distance" />
            </div>
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
            <button type="submit" class="btn btn-primary">{{ $ligne->exists ? 'Modifier Une Ligne' : 'Créer Une Ligne' }}</button>
        </div>
    </form>

    <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('node_modules/select2/dist/js/select2.min.js') }}"></script>

    <script>
        $(function (){
            $('.select2').select2()
        })
    </script>



</x-admin.layout>
