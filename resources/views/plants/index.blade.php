{{-- resources/views/plants/index.blade.php --}}
<x-layouts.main title="Dashboard Plants">
    <h1 class="mt-4">Dashboard Plants</h1>

    <div class="app-content">
        <div class="container-fluid">
            <div class="card mb-4 shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title m-0">Daftar Tanaman</h3>
                    <a href="{{ route('plants.create') }}" class="btn btn-primary btn-sm">
                        + Tambah Plant
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 50px">#</th>
                                <th>Nama</th>
                                <th>Lokasi</th>
                                <th>Tipe</th>
                                <th>Stok</th>
                                <th style="width: 120px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($plants as $index => $plant)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $plant->pts_name }}</td>
                                    <td>{{ $plant->location->lcn_name ?? '-' }}</td>
                                    <td>{{ $plant->typeplant->tps_type ?? '-' }}</td>
                                    <td>{{ $plant->pts_stok }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                Opsi
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('plants.show', $plant->pts_id) }}">Detail</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('plants.edit', $plant->pts_id) }}">Edit</a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('plants.destroy', $plant->pts_id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus plant ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada data plant</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
