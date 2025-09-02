<x-layouts.main title="Tanaman">
    <h1 class="mt-4 mb-3 fw-bold text-success">🌱 Daftar Tanaman</h1>

    <div class="app-content">
        <div class="container-fluid">

            @if(session('success'))
                <div class="alert alert-success shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0 text-muted">Kelola data tanaman dengan mudah</h5>
                <div class="d-flex gap-2">
                    <a href="{{ route('plants.create') }}" class="btn btn-success btn-sm">
                        <i class="bi bi-plus-circle"></i> Tambah Tanaman
                    </a>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addTypePlantModal">
                        <i class="bi bi-tags-fill"></i> Tambah Tipe Tanaman
                    </button>
                </div>
            </div>

            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body p-4">
                    <table class="table table-hover table-striped align-middle text-center">
                        <thead class="table-success">
                            <tr>
                                <th style="width:60px">#</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Lokasi</th>
                                <th>Stok</th>
                                <th>Tanggal Tanam</th>
                                <th style="width:180px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($plants as $index => $plant)
                                <tr>
                                    <td>{{ ($plants->firstItem() ?? 1) + $index }}</td>
                                    <td class="fw-semibold">{{ $plant->pts_name }}</td>
                                    <td>
                                        <span class="badge bg-primary">
                                            {{ $plant->typePlant->tps_type ?? '-' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-info text-dark">
                                            {{ $plant->location->lcn_name ?? '-' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-success">{{ $plant->pts_stok }}</span>
                                    </td>
                                    <td>{{ \Illuminate\Support\Carbon::parse($plant->pts_date)->translatedFormat('d F Y') }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('plants.show', $plant->pts_id) }}" class="btn btn-info btn-sm">
                                                <i class="bi bi-eye"></i> Detail
                                            </a>
                                            <a href="{{ route('plants.edit', $plant->pts_id) }}" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                            <form action="{{ route('plants.destroy', $plant->pts_id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus tanaman ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">
                                        Belum ada data tanaman 🌿
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-3 d-flex justify-content-center">
                        {{ $plants->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addTypePlantModal" tabindex="-1" aria-labelledby="addTypePlantLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content shadow-lg">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addTypePlantLabel"><i class="bi bi-tags-fill"></i> Tambah Tipe Tanaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('typeplants.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tps_type" class="form-label">Nama Tipe Tanaman</label>
                            <input type="text" name="tps_type" id="tps_type" class="form-control" placeholder="Contoh: Buah, Hias, Sayuran..." required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.main>
