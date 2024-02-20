<x-admin.layout>


    <div class="d-flex justify-content-between align-items-center">
        <h1>Les provinces</h1>
        <a href="{{ route('root.province.create') }}" class="btn btn-success">Ajouter</a>
    </div>

    <div class="bd-example-snippet bd-code-snippet">
        <div class="bd-example">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Province</th>
                    <th scope="col">Region (Pays)</th>
                    <th scope="col" class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($provinces as $province)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $province->name }}</td>
                            <td>{{ $province->region->name  }} ( {{ $province->region->Pays->name }} )</td>

                            <td class="d-flex gap-2 justify-content-end">
                                <form action="{{ route('root.province.destroy',$province) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"> Supprimer</button>
                                </form>
                                <a href="{{ route('root.province.edit',$province)}}" class="btn btn-primary">Modifier</a>
                            </td>
                        </tr>
                        @php
                            $i = $i + 1;
                        @endphp
                        
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $provinces->links() }}
    </div>


</x-admin.layout>