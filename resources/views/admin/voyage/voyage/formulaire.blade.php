<x-admin.layout>

    <link rel="stylesheet" href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}">


    <div class=" bg-emerald-600 py-6 px-4 rounded-t-md ">
        <h1 class=" flex ml-6 text-3xl text-white font-bold">{{$voyage->exists ? 'Modifier Un Le Voyage' : 'Créer un Voyage'}}</h1>
    </div>

    <div class=" bg-gray-50 p-8 rounded-b-md shadow-xl">
        <form class="mb-5 " action="{{ $voyage->exists ? route('admin.voyage.voyage.update',$voyage) : route('admin.voyage.voyage.store') }}" method="POST">
            @csrf
            @method($voyage->exists ? 'PUT' : 'POST')
            
            <div class=" columns-2 gap-4 py-4">
                <x-admin.select  label="Ville de Depart" name="depart_id" :options="App\Models\Root\Ville::pluck('name','id')" :value="($voyage->exists && $voyage->course) ? $voyage->course->ligne->depart_id : null " />
                <x-admin.select  label="Destination " name="destination_id" :options="App\Models\Root\Ville::pluck('name','id')" :value="$voyage->exists ? $voyage->course->ligne->destination_id : null" />
            </div>

            <div class="columns-2 gap-4 py-4">
                <x-admin.input label="Prix " type='number' name="prix" :value="$voyage->prix" />
                <x-admin.input label="Nombre de Place " type='number' name="nombre_place" :value="$voyage->nombre_place" />
            </div>

            <div class="columns-2 gap-4 py-4">
                <x-admin.input label="Heure Depart " type='time' name="heure_depart"  :value="($voyage->exists && $voyage->course) ? $voyage->course->heure_depart : null" />
                <x-admin.input label="Heure Arriver " type='time' name="heure_arriver" :value="($voyage->exists && $voyage->course) ? $voyage->course->heure_arriver : null" />
            </div>

            <x-admin.select  label="Statut " name="statut_id" :options="App\Models\Statut::pluck('name','id')" :value="$voyage->exists ? $voyage->statut_id : null" />
            
            <x-admin.btn-primary class="py-4 flex justify-end" type="submit">{{ $voyage->exists ? 'Sauvegarder' : 'Créer le Voyage' }}</x-admin.btn-primary>
            </form>
        </div>



{{--  

        <x-admin.select label="Etiquettes " name="voyage" :options="App\Models\voyage::pluck('name','id')" :value="$post->voyages->pluck('id')" multiple />

--}}
        
    </form>



    <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('node_modules/select2/dist/js/select2.min.js') }}"></script>
    <script>
        $(function (){
            $('.select2').select2()
        })
    </script>
</x-admin.layout>
