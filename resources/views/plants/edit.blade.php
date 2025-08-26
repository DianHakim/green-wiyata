<x-layouts.main title="Edit Tanaman">
    <h1 class="mt-4 text-center">Edit Data Tanaman</h1>

    <div class="app-content">
        <div class="container d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header text-center">
                        <h3 class="card-title">Form Edit Tanaman</h3>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger mb-3">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('plants.update', $plant->pts_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="pts_name" class="form-label">Nama Tanaman</label>
                                <input type="text" name="pts_name" id="pts_name"
                                    class="form-control"
                                    value="{{ old('pts_name', $plant->pts_name) }}" required>
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
                                    class="form-control"
                                    value="{{ old('pts_stok', $plant->pts_stok) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="pts_date" class="form-label">Tanggal Tanam</label>
                                <input type="date" name="pts_date" id="pts_date"
                                    class="form-control"
                                    value="{{ old('pts_date', \Carbon\Carbon::parse($plant->pts_date)->format('Y-m-d')) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="lcn_id" class="form-label">Lokasi</label>
                                <select name="lcn_id" id="lcn_id" class="form-select" required>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->lcn_id }}"
                                            {{ old('lcn_id', $plant->lcn_id) == $location->lcn_id ? 'selected' : '' }}>
                                            {{ $location->lcn_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="pts_description" class="form-label">Deskripsi</label>
                                <textarea name="pts_description" id="pts_description" rows="4"
                                    class="form-control">{{ old('pts_description', $plant->pts_description) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="pts_img_path" class="form-label">Gambar</label>
                                @if($plant->pts_img_path)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $plant->pts_img_path) }}"
                                            alt="{{ $plant->pts_name }}"
                                            class="img-thumbnail" style="max-height: 150px;">
                                    </div>
                                @endif
                                <input type="file" name="pts_img_path" id="pts_img_path"
                                    class="form-control" accept="image/*">
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('plants.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
