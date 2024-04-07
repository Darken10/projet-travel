<x-admin.layout>

    <link rel="stylesheet" href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}">

    <div class=" bg-emerald-600 py-3 px-4 rounded-t-md ">
        <h1 class=" flex ml-6 text-3xl text-white font-bold">{{$post->exists ? 'Modifier le Post' : 'Créer un Post'}}</h1>
    </div>

    <div class=" bg-gray-50 p-8 rounded-b-md shadow-xl">
        <form class="mb-5 " action="{{ $post->exists ? route('admin.post.update',$post) : route('admin.post.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            @method($post->exists ? 'PUT' : 'POST')

            <x-admin.input label="Titre : " class="mt-4"  name="title" placeholder="Un Titre " :value="$post->title" required />
            <x-admin.input type="textarea" class="mt-4" label="Contenu de l'article" name="content" placeholder="contenu de l'article " :value="$post->content"  />
            <x-admin.select label="Etiquettes " class="mt-4"  name="tags" :options="App\Models\Post\Tag::pluck('name','id')" :value="$post->tags->pluck('id')" multiple  />

            <x-admin.input label="Ajouter des Images : " name="images[]" type="file" multiple accept="image/*" />
           
            @if (! $post->images->isEmpty())

            <div class=" columns-6 md:columns-3 sm:columns-2 col-auto  ">
                @foreach ($post->images as $image)
                    <div class="w-40 my-4  mr-2 sm:mr-3">
                        <img class="rounded-lg w-full " src="{{ asset($image->url) }}" width="40" height="40" alt="{{ $post->title }}">
                        <div class=" relative  -top-6 w-full">
                            <a href="{{ route('admin.post.deleteImages',[$post,$image->id]) }}" class="bg-red-500 w-full text-red-50 font-bold rounded-b-lg relative justify-center text-center" type="submit" value="{{ $image->id }}">Supprimer</a>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif


            <div class="mt-5 flex justify-end">
                <x-admin.btn-primary type="submit" >{{ $post->exists ? 'Enregritre' : 'Creer le post' }}</x-admin.btn-primary>
            </div>
        </form>
    </div>


    <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('node_modules/select2/dist/js/select2.min.js') }}"></script>
    <script>
        $(function (){
            $('.select-multiple').select2({
                tags:true,
                tokenSeparators : [","," "],
            }).on('change',function(){
                let opt = $(this).find('[data-select2-tag="true"]:last-of-type')
                let data = {
                        _token:"{{ csrf_token() }}",
                        name:opt.val(),
                        user_id:"{{ Auth::user()->id }}"
                    }
                
                $.ajax({
                    url:"{{ route('api.admin.post.tag.create') }}",
                    type:'POST',
                    data:data,
                    
                    success: function (code,status){

                        console.log("tout cest tres bien passe")
                        opt.attr('value',code.tag.id)
                        console.log(opt.attr('value'));
                    },
                    error :function (resultat,status,erreur){
                        console.log('une erreur arriver')
                        console.log(erreur)
                    }
                })
            })
        })
    </script>
    

</x-admin.layout>
