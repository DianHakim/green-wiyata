<x-layouts.main title="Tambah Tanaman">
    <h1 class="mt-4 text-center">Tambah Data Tanaman</h1>

    <div class="app-content">
        <div class="container d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4 shadow">
                    <div class="card-header text-center">
                        <h3 class="card-title">Form Tambah Tanaman</h3>
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

                        <form action="{{ route('plants.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="pts_name" class="form-label">Nama Tanaman</label>
                                <input type="text" name="pts_name" id="pts_name" 
                                       class="form-control" value="{{ old('pts_name') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="tps_id" class="form-label">Jenis Tanaman</label>
                                <select name="tps_id" id="tps_id" class="form-select" required>
                                    <option value="">-- Pilih Jenis --</option>
                                    @foreach($typeplants as $typeplant)
                                        <option value="{{ $typeplant->tps_id }}" 
                                            {{ old('tps_id') == $typeplant->tps_id ? 'selected' : '' }}>
                                            {{ $typeplant->tps_type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="pts_stok" class="form-label">Stok</label>
                                <input type="number" name="pts_stok" id="pts_stok" 
                                       class="form-control" value="{{ old('pts_stok') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="pts_date" class="form-label">Tanggal Tanam</label>
                                <input type="date" name="pts_date" id="pts_date" 
                                       class="form-control" value="{{ old('pts_date') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="lcn_id" class="form-label">Lokasi</label>
                                <select name="lcn_id" id="lcn_id" class="form-select" required>
                                    <option value="">-- Pilih Lokasi --</option>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->lcn_id }}" 
                                            {{ old('lcn_id') == $location->lcn_id ? 'selected' : '' }}>
                                            {{ $location->lcn_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="pts_description" class="form-label">Deskripsi</label>
                                <textarea name="pts_description" id="pts_description" rows="4" 
                                          class="form-control">{{ old('pts_description') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="pts_img_path" class="form-label">Gambar</label>
                                <input type="file" name="pts_img_path" id="pts_img_path" 
                                       class="form-control" accept="image/*">
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('plants.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
