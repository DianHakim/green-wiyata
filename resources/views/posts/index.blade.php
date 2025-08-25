    {{-- resources/views/posts/index.blade.php --}}
    <x-layouts.main title="Posts">
        @section('content')
            <div class="container mt-4">

                {{-- Header --}}
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="h3">Daftar Post</h1>
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">+ Tambah Post</a>
                </div>

                {{-- Alert Success --}}
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                {{-- Daftar Post --}}
                @if($posts->count())
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-md-4 mb-3">
                                <div class="card h-100">
                                    {{-- Gambar Post --}}
                                    @if($post->pst_img_path)
                                        <img src="{{ asset('storage/'.$post->pst_img_path) }}" class="card-img-top" alt="Post Image" style="height:200px; object-fit:cover;">
                                    @else
                                        <img src="https://via.placeholder.com/400x200?text=No+Image" class="card-img-top" alt="No Image">
                                    @endif

                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->pst_content ?? 'Tanpa Judul' }}</h5>
                                        <p class="card-text text-muted">{{ $post->pst_description ?? '-' }}</p>
                                        <h5>{{ $post->plant->pts_name ?? 'Tanaman tidak ditemukan' }}</h5>
                                        <p>Jenis: {{ $post->plant->typePlant->tps_name ?? '-' }}</p>
                                    </div>

                                    <div class="card-footer d-flex justify-content-between">
                                        @php
                                            $postId = $post->pst_id ?? $post->id;
                                        @endphp
                                        <a href="{{ route('posts.show', ['id' => $postId]) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('posts.edit', ['id' => $postId]) }}" class="btn btn-warning btn-sm">Edit</a>

                                        <form action="{{ route('posts.delete', ['id' => $postId]) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus post ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-4 d-flex justify-content-center">
                        {{ $posts->links() }}
                    </div>
                @else
                    <div class="alert alert-warning text-center">Tidak ada post untuk ditampilkan.</div>
                @endif
            </div>
        @endsection
    </x-layouts.main>