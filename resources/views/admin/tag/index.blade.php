<x-admin.layout>

<div class=" d-flex justify-content-between align-items-center">
    <h3>Les Publicites</h3>
    <a href="{{ route('admin.tag.create') }}" class="btn btn-success">Ajouter</a>
</div>

<div class="table-responsive-md" >
    <table class="table table-striped table-hover table-borderless  align-middle" >

        <thead class="">
            <tr>
                <th>Titre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">

            @foreach ($tags as $tag)
                <tr class=""  >
                    <td scope="row">{{ $tag->name }}</td>
                    <td class="d-flex gap-2 justify-content-end">
                        <a class="btn btn-primary" href="{{ route('admin.tag.edit',$tag) }}" role="button" >Modifier</a>
                        <form action="{{ route('admin.tag.destroy',$tag) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>

<div class="py-5">
    {{ $tags->links() }}
</div>



</x-admin.layout>

