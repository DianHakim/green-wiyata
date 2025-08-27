<x-layouts.main title="Locations">
    <h1 class="mt-4 text-center">Daftar Lokasi Tanaman</h1>

    <div class="container mt-4">
        <a href="{{ route('locationplant.create') }}" class="btn btn-primary mb-3">+ Add Location</a>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Block</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($locations as $location)
                <tr>
                    <td>{{ $location->lcn_id }}</td>
                    <td>{{ $location->lcn_name }}</td>
                    <td>{{ $location->lcn_block }}</td>
                    <td>{{ $location->lcn_latitude }}</td>
                    <td>{{ $location->lcn_longitude }}</td>
                    <td>
                        <a href="{{ route('locationplant.show', $location->lcn_id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('locationplant.edit', $location->lcn_id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('locationplant.destroy', $location->lcn_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.main>