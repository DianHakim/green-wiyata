<x-layouts.main>
  <x-layouts.map>
<html lang="en">
<head>
</head>
<body>
</x-layouts.map>

<div class="container py-4">

    {{-- Statistik ringkas --}}
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Total Locations</h6>
                    <h3 class="fw-bold">{{ $locationsCount ?? 0 }}</h3>
                    <a href="{{ route('locationplant.index') }}" class="btn btn-sm btn-outline-primary mt-2">View</a>
                </div>
            </div>
        </div>  

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Total Plants</h6>
                    <h3 class="fw-bold">{{ $plantsCount ?? 0 }}</h3>
                    <a href="{{ route('plants.index') }}" class="btn btn-sm btn-outline-success mt-2">View</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Total Posts</h6>
                    <h3 class="fw-bold">{{ $postsCount ?? 0 }}</h3>
                    <a href="{{ route('posts.index') }}" class="btn btn-sm btn-outline-info mt-2">View</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Aktivitas Terbaru --}}
    <div class="card shadow-sm border-0 mb-5">
        <div class="card-body">
            <h5 class="card-title mb-3">Latest Posts</h5>
            <table class="table table-striped table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Created By</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($latestPosts ?? [] as $index => $post)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $post->pst_title }}</td>
                            <td>{{ $post->createdBy->name ?? 'Unknown' }}</td>
                            <td>{{ optional($post->pst_created_at)->format('Y-m-d') ?? '-' }}</td>
                            <td>
                                <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-primary">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No posts yet</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

{{-- Footer --}}
<footer class="bg-white border-top py-3 mt-auto">
    <div class="container text-center">
        <small class="text-muted">&copy; 2025 GreenWiyata. All rights reserved.</small>
    </div>
</footer>

</body>
</html>
</x-layouts.main>
