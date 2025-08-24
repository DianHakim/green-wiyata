{{-- resources/views/plants/create.blade.php --}}
<x-layouts.main title="Tambah Plant">
    <h1 class="mt-4 text-center">Tambah Plant Baru</h1>

    <div class="app-content">
        <div class="container d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4 shadow">
                    <div class="card-header text-center">
                        <h3 class="card-title">Form Plant</h3>
                    </div>
                    <div class="card-body">

                        {{-- Tampilkan error jika validasi gagal --}}
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
                            <table class="table table-borderless align-middle">
                                <tbody>
                                    <tr>
                                        <td style="width: 30%"><label for="pts_name" class="form-label">Nama Plant</label></td>
                                        <td><input type="text" name="pts_name" id="pts_name" class="form-control" value="{{ old('pts_name') }}" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="pts_date" class="form-label">Tanggal</label></td>
                                        <td><input type="date" name="pts_date" id="pts_date" class="form-control" value="{{ old('pts_date') }}" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="pts_description" class="form-label">Deskripsi</label></td>
                                        <td><textarea name="pts_description" id="pts_description" class="form-control" rows="3">{{ old('pts_description') }}</textarea></td>
                                    </tr>
                                    <tr>
                                        <td><label for="pts_stok" class="form-label">Stok</label></td>
                                        <td><input type="number" name="pts_stok" id="pts_stok" class="form-control" min="0" value="{{ old('pts_stok', 0) }}"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="location_id" class="form-label">Lokasi</label></td>
                                        <td>
                                            <select name="location_id" id="location_id" class="form-select" required>
                                                <option value="">-- Pilih Lokasi --</option>
                                                @foreach($locations as $location)
                                                    <option value="{{ $location->lcn_id }}" {{ old('location_id') == $location->lcn_id ? 'selected' : '' }}>
                                                        {{ $location->lcn_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="tps_id" class="form-label">Tipe Plant</label></td>
                                        <td>
                                            <select name="tps_id" id="tps_id" class="form-select" required>
                                                <option value="">-- Pilih Tipe --</option>
                                                @foreach($typeplants as $type)
                                                    <option value="{{ $type->tps_id }}" {{ old('tps_id') == $type->tps_id ? 'selected' : '' }}>
                                                        {{ $type->tps_type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="pts_img_path" class="form-label">Gambar</label></td>
                                        <td><input type="file" name="pts_img_path" id="pts_img_path" class="form-control"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-between mt-3">
                                <a href="{{ route('plants.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
