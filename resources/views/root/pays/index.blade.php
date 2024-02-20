<x-admin.layout>


    <div class="d-flex justify-content-between align-items-center">
        <h1>Les pays</h1>
        <a href="{{ route('root.pays.create') }}" class="btn btn-success">Ajouter</a>
    </div>

    <div class="bd-example-snippet bd-code-snippet">
        <div class="bd-example">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Pays</th>
                    
                    <th scope="col">Numero identifiant</th>
                    <th scope="col" class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($pays as $p)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->numero_identifiant }}</td>
                            

                            <td class="d-flex gap-2 justify-content-end">
                                <form action="{{ route('root.pays.destroy',$p) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    
                                    <button type="submit" class="btn btn-danger"> Supprimer</button>
                                </form>

                                <a href="{{ route('root.pays.edit',$p) }}" class="btn btn-primary">Modifier</a>
                            </td>
                        </tr>
                        @php
                            $i = $i + 1;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $pays->links() }}
    </div>


</x-admin.layout>