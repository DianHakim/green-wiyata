<x-layouts.main title="Tambah Plant">
    <h1 class="mt-4 text-center">Add New Plant</h1>

    <div class="app-content">
        <div class="container d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4 shadow">
                    <div class="card-header text-center">
                        <h3 class="card-title">Form Plant</h3>
                    </div>
                    <div class="card-body">

                        {{-- Tampilkan error validasi --}}
                        @if($errors->any())
                            <div class="alert alert-danger mb-3">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                            <form action="{{ route('plants.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="pts_name" class="form-label">Nama Tanaman</label>
                                <input type="text" name="pts_name" id="pts_name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="tps_type" class="form-label">Jenis Tanaman</label>
                                <input type="text" name="tps_type" id="tps_type" class="form-control" placeholder="Masukkan jenis tanaman baru" required>
                            </div>

                            <div class="mb-3">
                                <label for="pts_stok" class="form-label">Stok</label>
                                <input type="number" name="pts_stok" id="pts_stok" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="pts_date" class="form-label">Tanggal Tanam</label>
                                <input type="date" name="pts_date" id="pts_date" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="lcn_name" class="form-label">Lokasi</label>
                                <input type="text" name="lcn_name" id="lcn_name" class="form-control" placeholder="Masukkan lokasi baru" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>