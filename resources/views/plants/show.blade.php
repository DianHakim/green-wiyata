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
                        @else
                            <img src="https://via.placeholder.com/300x200?text=No+Image" 
                                 alt="No Image" 
                                 class="img-fluid rounded shadow-sm">
                        @endif
                    </div>
                </div>

                {{-- Kolom Detail Plant --}}
                <div class="col-md-8">
                    <div class="card shadow-sm p-4">
                        <h3 class="mb-4">{{ $plant->pts_name }}</h3>
                        <p><strong>Lokasi:</strong> {{ $plant->location->lcn_name ?? '-' }}</p>
                        <p><strong>Tipe:</strong> {{ $plant->typePlant->tps_type ?? '-' }}</p>
                        <p><strong>Stok:</strong> {{ $plant->pts_stok }}</p>
                        <p><strong>Tanggal:</strong> {{ $plant->pts_date }}</p>
                        <p><strong>Deskripsi:</strong></p>
                        <p class="text-muted">{{ $plant->pts_description ?? '-' }}</p>

                        {{-- Tombol kembali kecil dan di tengah --}}
                        <div class="text-center mt-4">
                            <a href="{{ route('plants.index') }}" class="btn btn-sm btn-secondary">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
