<x-layouts.main title="Edit Plant">
    <h1 class="mt-4">Edit Plant</h1>
    <form action="{{ route('plants.update', $plant->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('plants.partials.form', ['plant' => $plant])
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</x-layouts.main>
