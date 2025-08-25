{{-- resources/views/plants/index.blade.php --}}
<x-layouts.main title="Plants">
    <h1 class="mt-4">Plants</h1>

    <div class="app-content">
        <div class="container-fluid">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    {{-- contoh filter kategori bila diperlukan --}}
                    {{-- <form method="GET">
                        <select name="tps_id" class="form-select" style="width:220px" onchange="this.form.submit()">
                            <option value="">All Types</option>
                            @foreach($typeplants as $cat)
                                <option value="{{ $cat->tps_id }}" {{ request('tps_id') == $cat->tps_id ? 'selected' : '' }}>
                                    {{ $cat->tps_type }}
                                </option>
                            @endforeach
                        </select>
                    </form> --}}
                </div>
                <a href="{{ route('plants.create') }}" class="btn btn-primary btn-sm">+ Add Plant</a>
            </div>

            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th style="width:60px">#</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Location</th>
                                <th>Stock</th>
                                <th>Date</th>
                                <th style="width:150px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($plants as $index => $plant)
                                <tr>
                                    <td>{{ ($plants->firstItem() ?? 1) + $index }}</td>
                                    <td>{{ $plant->pts_name }}</td>
                                    <td>{{ $plant->typePlant->tps_type ?? '-' }}</td>
                                    <td>{{ $plant->location->lcn_name ?? '-' }}</td>
                                    <td>{{ $plant->pts_stok }}</td>
                                    <td>{{ \Illuminate\Support\Carbon::parse($plant->pts_date)->format('Y-m-d') }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('plants.show', $plant->pts_id) }}" class="btn btn-info">Detail</a>
                                            <a href="{{ route('plants.edit', $plant->pts_id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('plants.destroy', $plant->pts_id) }}" method="POST" onsubmit="return confirm('Hapus plant ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="7" class="text-center">Belum ada plant.</td></tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- tampilkan pagination kalau pakai paginate() --}}
                    <div class="mt-3 d-flex justify-content-center">
                        {{ $plants->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layouts.main>
