<x-layouts.main>
@section('content')
<div class="container mt-4">
    <h1>{{ $post->plant_name }}</h1>
    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="">
    <p>Category: {{ $post->category }}</p>
    <p>Location: {{ $post->location }}</p>
</div>
@endsection
</x-layouts.main>
