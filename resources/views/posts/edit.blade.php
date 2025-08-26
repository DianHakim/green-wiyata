<x-layouts.main title="Edit Post">
    <h1 class="mt-4 text-center">Edit Data Post</h1>

    <div class="app-content">
        <div class="container d-flex justify-content-center">
            <div class="col-md-9">
                <div class="card shadow mb-4">
                    <div class="card-header text-center">
                        <h3 class="card-title">Form Edit Post</h3>
                    </div>
                    <div class="card-body">
                        {{-- tampilkan error --}}
                        @if($errors->any())
                            <div class="alert alert-danger mb-3">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('posts.update', $post->pst_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Content --}}
                            <div class="mb-3">
                                <label for="pst_content" class="form-label">Content</label>
                                <input type="text" name="pst_content" id="pst_content"
                                    class="form-control"
                                    value="{{ old('pst_content', $post->pst_content) }}" required>
                            </div>

                            {{-- Description --}}
                            <div class="mb-3">
                                <label for="pst_description" class="form-label">Description</label>
                                <textarea name="pst_description" id="pst_description" rows="3"
                                    class="form-control">{{ old('pst_description', $post->pst_description) }}</textarea>
                            </div>

                            {{-- Date --}}
                            <div class="mb-3">
                                <label for="pst_date" class="form-label">Date</label>
                                <input type="date" name="pst_date" id="pst_date"
                                    class="form-control"
                                    value="{{ old('pst_date', \Carbon\Carbon::parse($post->pst_date)->format('Y-m-d')) }}" required>
                            </div>

                            {{-- Lokasi --}}
                            <div class="mb-3">
                                <label for="location_id" class="form-label">Location</label>
                                <select name="location_id" id="location_id" class="form-select" required>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->lcn_id }}"
                                            {{ old('location_id', $post->location_id) == $location->lcn_id ? 'selected' : '' }}>
                                            {{ $location->lcn_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Plant --}}
                            <div class="mb-3">
                                <label for="pts_id" class="form-label">Plant</label>
                                <select name="pts_id" id="pts_id" class="form-select" required>
                                    @foreach($plants as $plant)
                                        <option value="{{ $plant->pts_id }}"
                                            {{ old('pts_id', $post->pts_id) == $plant->pts_id ? 'selected' : '' }}>
                                            {{ $plant->pts_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Image --}}
                            <div class="mb-3">
                                <label for="pst_img_path" class="form-label">Image</label>
                                @if($post->pst_img_path)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $post->pst_img_path) }}"
                                            alt="Post Image"
                                            class="img-thumbnail" style="max-height: 150px;">
                                    </div>
                                @endif
                                <input type="file" name="pst_img_path" id="pst_img_path"
                                    class="form-control" accept="image/*">
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                            </div>

                            <div class="d-flex justify-content-between mt-3">
                                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
