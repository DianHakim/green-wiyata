<x-layouts.main title="Edit Plant">
    <h1 class="mt-4 text-center">Edit Plant</h1>

    <div class="app-content">
        <div class="container d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4 shadow">
                    <div class="card-header text-center">
                        <h3 class="card-title">Form Edit Plant</h3>
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

                        <form action="{{ route('plants.update', $plant->pts_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <table class="table table-borderless align-middle">
                                <tbody>
                                    <tr>
                                        <td style="width: 30%"><label for="pts_name" class="form-label">Name Plant</label></td>
                                        <td><input type="text" name="pts_name" id="pts_name" class="form-control" value="{{ old('pts_name', $plant->pts_name) }}" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="pts_date" class="form-label">Date</label></td>
                                        <td><input type="date" name="pts_date" id="pts_date" class="form-control" value="{{ old('pts_date', $plant->pts_date) }}" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="pts_description" class="form-label">Description</label></td>
                                        <td><textarea name="pts_description" id="pts_description" class="form-control" rows="3">{{ old('pts_description', $plant->pts_description) }}</textarea></td>
                                    </tr>
                                    <tr>
                                        <td><label for="pts_stok" class="form-label">Stock</label></td>
                                        <td><input type="number" name="pts_stok" id="pts_stok" class="form-control" min="0" value="{{ old('pts_stok', $plant->pts_stok) }}"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="location_id" class="form-label">Location</label></td>
                                        <td>
                                            <select name="location_id" id="location_id" class="form-select" required>
                                                <option value="">-- Select Location --</option>
                                                @foreach($locations as $location)
                                                    <option value="{{ $location->lcn_id }}" {{ old('location_id', $plant->location_id) == $location->lcn_id ? 'selected' : '' }}>
                                                        {{ $location->lcn_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="tps_id" class="form-label">Type Plant</label></td>
                                        <td>
                                            <select name="tps_id" id="tps_id" class="form-select" required>
                                                <option value="">-- Select Type --</option>
                                                @foreach($typeplants as $type)
                                                    <option value="{{ $type->tps_id }}" {{ old('tps_id', $plant->tps_id) == $type->tps_id ? 'selected' : '' }}>
                                                        {{ $type->tps_type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="pts_img_path" class="form-label">Image</label></td>
                                        <td>
                                            @if($plant->pts_img_path)
                                                <div class="mb-2">
                                                    <img src="{{ asset('storage/' . $plant->pts_img_path) }}" 
                                                         alt="{{ $plant->pts_name }}" 
                                                         class="img-thumbnail" 
                                                         style="max-width: 150px;">
                                                </div>
                                            @endif
                                            <input type="file" name="pts_img_path" id="pts_img_path" class="form-control">
                                            <small class="text-muted">Leave empty if you don't want to change the image.</small>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-between mt-3">
                                <a href="{{ route('plants.index') }}" class="btn btn-secondary btn-lg px-4">Back</a>
                                <button type="submit" class="btn btn-primary btn-lg px-4">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
