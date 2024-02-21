<x-admin.layout>

    <link rel="stylesheet" href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}">


    <div class="jumbotron">
        <h1 class="display-3">{{$voyage->exists ? 'Modifier Un Voyage' : 'Créer Une Voyage'}}</h1>
    </div>


    <form class="mb-8 " action="{{ $voyage->exists ? route('admin.voyage.voyage.update',$voyage) : route('admin.voyage.voyage.store') }}" method="post">
        @csrf
        @method($voyage->exists ? 'PUT' : 'POST')
        
        
        <div class="row">
            <div class="col-sm-4">
                <x-admin.select label="Ville de Depart" name="depart_id" :options="App\Models\Root\Ville::pluck('name','id')" :value="($voyage->exists && $voyage->course) ? $voyage->course->ligne->depart_id : null " />
            </div>
            <div class="col-sm-4">
                <x-admin.select label="Destination " name="destination_id" :options="App\Models\Root\Ville::pluck('name','id')" :value="$voyage->exists ? $voyage->course->ligne->destination_id : null" />
            </div>
            <div class="col-sm-4">
                <x-admin.input label="Prix " type='number' name="prix" :value="$voyage->prix" />
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-6">
                <x-admin.input label="Heure Depart " type='time' name="heure_depart"  :value="($voyage->exists && $voyage->course) ? $voyage->course->heure_depart : null" />
            </div>
            <div class="col-sm-6">
                <x-admin.input label="Heure Arriver " type='time' name="heure_arriver" :value="($voyage->exists && $voyage->course) ? $voyage->course->heure_arriver : null" />
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
            <button type="submit" class="btn btn-primary">{{ $voyage->exists ? 'Modifier Une Course' : 'Créer Une Course' }}</button>
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
