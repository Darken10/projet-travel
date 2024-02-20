<x-admin.layout>

    <div class="d-flex justify-content-between align-items-center">
        <h1>Les compagnies</h1>
        <a href="{{ route('root.compagnie.create') }}" class="btn btn-success">Ajouter</a>
    </div>

    <div class="bd-example-snippet bd-code-snippet">
        <div class="bd-example">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Sigle</th>
                    <th scope="col" class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($compagnies as $compagnie)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $compagnie->name }}</td>
                            <td>{{ $compagnie->sigle }}</td>
<<<<<<< HEAD
=======
                            <td>{{ Str::limit($compagnie->slogant,50) }}</td>
>>>>>>> bb8a5a9 (    => la mise a nivau)

                            <td class="d-flex gap-2 justify-content-end">
                                <form action="{{ route('root.compagnie.destroy',$compagnie) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"> Supprimer</button>
                                </form>
                                <a href="{{ route('root.compagnie.edit',$compagnie)}}" class="btn btn-primary">Modifier</a>
                            </td>
                        </tr>
                        @php
                            $i = $i + 1;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $compagnies->links() }}
    </div>


</x-admin.layout>