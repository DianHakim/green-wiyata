<x-layouts.main title="Detail Post">
    <h1 class="mt-4">Detail Post</h1>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm p-3 text-center">
                        @if($post->pst_img_path)
                            <img src="{{ asset('storage/' . $post->pst_img_path) }}" 
                                 alt="Post Image" 
                                 class="img-fluid rounded shadow-sm" 
                                 style="width: 100%; max-height: 350px; object-fit: cover;">
                        @else
                            <p class="text-muted">No Image Available</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card shadow-sm p-4">
                        <h3 class="mb-4">{{ $post->pst_content ?? 'Tanpa Judul' }}</h3>
                        <p><strong>Tanggal:</strong> {{ $post->pst_date }}</p>
                        <p><strong>Tanaman:</strong> {{ $post->plant->pts_name ?? '-' }}</p>
                        <p><strong>Jenis Tanaman:</strong> {{ $post->plant->typePlant->tps_type ?? '-' }}</p>
                        <p><strong>Deskripsi:</strong></p>
                        <p class="text-muted">{{ $post->pst_description ?? '-' }}</p>

                        <div class="text-center mt-4">
                            <a href="{{ route('posts.index') }}" 
                               class="btn btn-secondary btn-lg px-5 py-3" 
                               style="font-size: 18px; font-weight: 600;">
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
