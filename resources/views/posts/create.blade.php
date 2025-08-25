<x-layouts.main title="Tambah Post">
    <h1 class="mt-4 text-center">Add New Post</h1>

    <div class="app-content">
        <div class="container d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4 shadow">
                    <div class="card-header text-center">
                        <h3 class="card-title">Form Post</h3>
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

                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Content --}}
                        <div class="mb-3">
                            <label for="pst_content" class="form-label">Content</label>
                            <textarea name="pst_content" id="pst_content" class="form-control">{{ old('pst_content') }}</textarea>
                            @error('pst_content')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        {{-- Description --}}
                        <div class="mb-3">
                            <label for="pst_description" class="form-label">Description</label>
                           <textarea name="pst_description" id="pst_description" class="form-control">{{ old('pst_description') }}</textarea>
                        </div>

                        {{-- Date --}}
                        <div class="mb-3">
                            <label for="pst_date" class="form-label">Post Date</label>
                            <input type="date" name="pst_date" id="pst_date" class="form-control" value="{{ old('pst_date') }}">
                            @error('pst_date')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        {{-- Category (tps_id) --}}
                        <div class="mb-3">
                            <label for="tps_id" class="form-label">Category</label>
                            <select name="tps_id" id="tps_id" class="form-select">
                                <option value="">-- Select Category --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->tps_id }}" {{ old('tps_id') == $category->tps_id ? 'selected' : '' }}>
                                        {{ $category->tps_name }}
                                    </option>
                               @endforeach
                            </select>
                            @error('tps_id')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        {{-- Image --}}
                        <div class="mb-3">
                            <label for="pst_img_path" class="form-label">Image (optional)</label>
                            <input type="file" name="pst_img_path" id="pst_img_path" class="form-control">
                            @error('pst_img_path')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Save Post</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
