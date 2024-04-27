<x-admin.layout>

    <link rel="stylesheet" href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}">


    <div class=" bg-emerald-600 py-3 px-4 rounded-t-md ">
        <h1 class=" flex ml-6 text-3xl text-white font-bold">{{$course->exists ? 'Modifier Une Course' : 'Créer Une Course'}}</h1>
    </div>

    <div class=" bg-gray-50 p-8 rounded-b-md shadow-xl">

        <form class="mb-8 " action="{{ $course->exists ? route('admin.voyage.course.update',$course) : route('admin.voyage.course.store') }}" method="post">
            @csrf
            @method($course->exists ? 'PUT' : 'POST')

            @if ($course->exists)
                <div class="md:columns-2">
                    <x-admin.input class="py-2" label="Ville de Depart "  :value="$course->ligne->departName()" disabled inputClass="bg-gray-200" />
                    <x-admin.input class="py-2" label="Ville de Destination "  :value="$course->ligne->destinationName()" disabled inputClass="bg-gray-200"/>
                </div>
                <div class="md:columns-2">
                    <x-admin.input hidden name="depart_id" :value="$course?->ligne->depart_id"  />
                    <x-admin.input hidden name="destination_id" :value="$course?->ligne->destination_id"  />
                </div>
            @else
                <div class=" md:columns-2">
                    <x-admin.select class="py-2" label="Ville de Depart" name="depart_id" :options="App\Models\Root\Ville::pluck('name','id')" :value="$course->exists ? $course?->ligne->depart_id : null "  />
                    <x-admin.select class="py-2" label="Vile de Destination " name="destination_id" :options="App\Models\Root\Ville::pluck('name','id')" :value="$course->exists ? $course?->ligne->destination_id : null"  />
                </div>
            @endif

            <div class="md:columns-2">
                <x-admin.input class="py-2" label="Heure Depart " type='time' name="heure_depart"  :value="$course->heure_depart" />
                <x-admin.input class="py-2" label="Heure Arriver " type='time' name="heure_arriver" :value="$course->heure_arriver" />
            </div>

            <x-admin.select class="py-2" label="Statut" name="statut_id" :options="[1 => 'Active',2 => 'Désactiver',3  => 'Suspendre']" :value="$course->exists ? $course->statut_id : 1"  />

            {{--  <x-admin.input type="textarea" label="Contenu de l'article" name="content" placeholder="contenu de l'article " :value="$post->content"  />  --}}
            {{--  <x-admin.select label="Etiquettes " name="tag" :options="App\Models\Tag::pluck('name','id')" :value="$post->tags->pluck('id')" multiple />  --}}

            <x-admin.btn-primary type="submit" class="my-2">{{ $course->exists ? 'Enregistrer' : 'Créer Une Course' }}</x-admin.btn-primary>
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
