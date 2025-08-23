<x-layouts.main>
@section('content')
<div class="container py-4">
    <h1 class="fw-bold">{{ $post->pst_content }}</h1>
    <p class="text-muted">{{ $post->pst_date }}</p>

    @if($post->pst_img_path)
        <img src="{{ asset('storage/'.$post->pst_img_path) }}" class="img-fluid rounded mb-3" alt="Post Image">
    @endif

    <p>{{ $post->pst_description }}</p>
    <p><small>Author: {{ $post->creator->usr_name ?? 'Unknown' }}</small></p>

    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
</x-layouts.main>
