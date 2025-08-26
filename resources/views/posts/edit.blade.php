<x-layouts.main title="Edit Post">
    <h1 class="mt-4 text-center">Edit Post</h1>

    <div class="app-content">
        <div class="container d-flex justify-content-center">
            <div class="col-md-9">
                <div class="card mb-4 shadow">
                    <div class="card-header text-center">
                        <h3 class="card-title">Form Edit Post</h3>
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

                        <form action="{{ route('posts.update', $post->pst_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <table class="table table-borderless align-middle">
                                <tbody>
                                    {{-- Content --}}
                                    <tr>
                                        <td style="width: 25%"><label for="pst_content" class="form-label">Content</label></td>
                                        <td><input type="text" name="pst_content" id="pst_content" 
                                                   class="form-control" 
                                                   value="{{ old('pst_content', $post->pst_content) }}" required></td>
                                    </tr>

                                    {{-- Description --}}
                                    <tr>
                                        <td><label for="pst_description" class="form-label">Description</label></td>
                                        <td><textarea name="pst_description" id="pst_description" 
                                                      class="form-control" rows="3">{{ old('pst_description', $post->pst_description) }}</textarea></td>
                                    </tr>

                                    {{-- Date --}}
                                    <tr>
                                        <td><label for="pst_date" class="form-label">Date</label></td>
                                        <td><input type="date" name="pst_date" id="pst_date" 
                                                   class="form-control" 
                                                   value="{{ old('pst_date', \Carbon\Carbon::parse($post->pst_date)->format('Y-m-d')) }}" required></td>
                                    </tr>

                                    {{-- Type Plant (tps_id) --}}
                                    <tr>
                                        <td><label for="tps_id" class="form-label">Type Plant</label></td>
                                        <td>
                                            <select name="tps_id" id="tps_id" class="form-select" required>
                                                <option value="">-- Select Type --</option>
                                                @foreach($typeplants as $type)
                                                    <option value="{{ $type->tps_id }}" 
                                                        {{ old('tps_id', $post->tps_id) == $type->tps_id ? 'selected' : '' }}>
                                                        {{ $type->tps_type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>

                                    {{-- Plant (pts_id) --}}
                                    <tr>
                                        <td><label for="pts_id" class="form-label">Plant</label></td>
                                        <td>
                                            <select name="pts_id" id="pts_id" class="form-select" required>
                                                <option value="">-- Select Plant --</option>
                                                @foreach($plants as $plant)
                                                    <option value="{{ $plant->pts_id }}" 
                                                        {{ old('pts_id', $post->pts_id) == $plant->pts_id ? 'selected' : '' }}>
                                                        {{ $plant->pts_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>

                                    {{-- Image --}}
                                    <tr>
                                        <td><label for="pst_img_path" class="form-label">Image</label></td>
                                        <td>
                                            <input type="file" name="pst_img_path" id="pst_img_path" class="form-control">
                                            @if($post->pst_img_path)
                                                <img src="{{ asset('storage/' . $post->pst_img_path) }}" 
                                                     alt="Post Image" class="mt-2" style="max-height: 150px;">
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-between mt-3">
                                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
