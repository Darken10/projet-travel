<x-admin.layout>


    <div class="d-flex justify-content-between align-items-center">
        <h1>Les regions</h1>
        <a href="{{ route('root.region.create') }}" class="btn btn-success">Ajouter</a>
    </div>

    <div class="bd-example-snippet bd-code-snippet">
        <div class="bd-example">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Region</th>
                    <th scope="col">Pays</th>                    
                    <th scope="col" class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($regions as $region)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $region->name }}</td>
                            <td>{{ $region->pays->name }}</td>
                            
                          

                            <td class="d-flex gap-2 justify-content-end">
                                <form action="{{ route('root.region.destroy',$region) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"> Supprimer</button>
                                </form>
                                <a href="{{ route('root.region.edit',$region)}}" class="btn btn-primary">Modifier</a>
                            </td>
                        </tr>
                        @php
                            $i = $i + 1;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $regions->links() }}
    </div>


</x-admin.layout>