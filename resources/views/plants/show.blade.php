<x-layouts.main title="Detail Plant">
    <h1 class="mt-4">Detail Plant</h1>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                {{-- Kolom Foto Plant --}}
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm p-3 text-center">
                        @if($plant->pts_img_path)
                            <img src="{{ asset('storage/' . $plant->pts_img_path) }}" 
                                 alt="{{ $plant->pts_name }}" 
                                 class="img-fluid rounded shadow-sm" 
                                 style="width: 100%; max-height: 350px; object-fit: cover;">
                        @endif
                    </div>
                </div>

                {{-- Kolom Detail Plant --}}
                <div class="col-md-8">
                    <div class="card shadow-sm p-4">
                        <h3 class="mb-4">{{ $plant->pts_name }}</h3>
                        <p><strong>Location:</strong> {{ $plant->location->lcn_name ?? '-' }}</p>
                        <p><strong>Type:</strong> {{ $plant->typePlant->tps_type ?? '-' }}</p>
                        <p><strong>Stock:</strong> {{ $plant->pts_stok }}</p>
                        <p><strong>Date:</strong> {{ $plant->pts_date }}</p>
                        <p><strong>Description:</strong></p>
                        <p class="text-muted">{{ $plant->pts_description ?? '-' }}</p>

                        {{-- Tombol kembali kecil dan di tengah --}}
                        <div class="text-center mt-4">
                        <a href="{{ route('plants.index') }}" class="btn btn-secondary btn-lg px-5 py-3" style="font-size: 18px; font-weight: 600;">
                        Back
                        </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
