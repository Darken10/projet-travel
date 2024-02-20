<x-admin.layout>

    <link rel="stylesheet" href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}">

    <div class="jumbotron">
        <h1 class="display-3">{{$post->exists ? 'Modifier le Pub' : 'Créer un Pub'}}</h1>
    </div>


    <form class="mb-5 " action="{{ $post->exists ? route('admin.post.update',$post) : route('admin.post.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        @method($post->exists ? 'PUT' : 'POST')

        <div class="row">
            <x-admin.input label="Titre : "  name="title" placeholder="Un Titre " :value="$post->title" required />
        </div>
        <div class="row">
            <x-admin.input type="textarea" label="Contenu de l'article" name="content" placeholder="contenu de l'article " :value="$post->content"  />
        </div>

        
        <x-admin.select label="Etiquettes "  name="tags" :options="App\Models\Post\Tag::pluck('name','id')" :value="$post->tags->pluck('id')" multiple />
    

        <img src="{{ $post->image }}">
        <br>
        <x-admin.input label="Changer de photo : " name="image" type="file"  />
 

        

        <div class="mt-5">
            <button type="submit" class="btn btn-primary">{{ $post->exists ? 'Modifier' : 'Créer' }}</button>
        </div>
    </form>


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
