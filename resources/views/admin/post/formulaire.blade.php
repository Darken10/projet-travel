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

            <img src="{{ $post->image }}">
            <br>
            <x-admin.input label="Changer de photo : " name="image" type="file"  />

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
