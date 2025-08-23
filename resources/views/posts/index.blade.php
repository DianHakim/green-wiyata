<x-layouts.main>
@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="fw-bold">Posts</h1>
                <p class="text-muted">Kelola semua postingan</p>
            </div>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">+ New Post</a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <table class="table table-bordered table-striped align-middle mb-0">
                    <thead class="table-light">
                        <tbody>
    @foreach($posts as $key => $post)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $post->pst_content }}</td>
            <td>{{ Auth::user()->name ?? 'Guest' }}</td>
            <td>{{ $post->pst_date }}</td>
            <td>
                <a href="{{ route('posts.show', $post->pst_id) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('posts.edit', $post->pst_id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('posts.delete', $post->pst_id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>

                </table>
            </div>
        </div>
    </div>

    <footer class="bg-white border-top py-3 mt-auto">
        <div class="container text-center">
            <small class="text-muted">&copy; 2025 Dashboard by Nabil. All rights reserved.</small>
        </div>
    </footer>

</x-layouts.main>