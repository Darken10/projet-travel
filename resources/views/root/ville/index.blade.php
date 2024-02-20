<x-admin.layout>

    <div class="d-flex justify-content-between align-items-center">
        <h1>Les villes</h1>
        <a href="{{ route('root.ville.create') }}" class="btn btn-success">Ajouter</a>
    </div>

    <div class="bd-example-snippet bd-code-snippet">
        <div class="bd-example">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Pays</th>
                    <th scope="col">Region</th>
                    <th scope="col">Province</th>
                    <th scope="col">Ville</th>
                    <th scope="col" class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($villes as $ville)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $ville->province->region->pays->name }}</td>
                            <td>{{ $ville->province->region->name }}</td>
                            <td>{{ $ville->province->name }}</td>
                            <td>{{ $ville->name }}</td>

                            <td class="d-flex gap-2 justify-content-end">
                                <form action="{{ route('root.ville.destroy',$ville) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"> Supprimer</button>
                                </form>
                                <a href="{{ route('root.ville.edit',$ville)}}" class="btn btn-primary">Modifier</a>
                            </td>
                        </tr>
                        @php
                            $i = $i + 1;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $villes->links() }}
    </div>


</x-admin.layout>