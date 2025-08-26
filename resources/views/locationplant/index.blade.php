<x-layouts.main title="Daftar Lokasi">
    <div class="container my-4">

        {{-- Judul + tombol tambah --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Daftar Lokasi Tanaman</h2>
            <a href="{{ route('locationplant.add') }}" class="btn btn-success">+ Tambah Lokasi</a>
        </div>

        {{-- Peta --}}
        <div id="map" style="height:400px; width:100%;" class="mb-4"></div>

        {{-- Tabel daftar lokasi --}}
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered table-striped align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama Lokasi</th>
                            <th>Block</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($locations as $index => $location)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $location->lcn_name }}</td>
                                <td>{{ $location->lcn_block ?? '-' }}</td>
                                <td>
                                    @if($location->lcn_img_path)
                                        <img src="{{ asset('storage/' . $location->lcn_img_path) }}" 
                                             alt="Gambar Lokasi" style="max-height:60px;">
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('locationplant.show', $location->lcn_id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('locationplant.edit', $location->lcn_id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('locationplant.delete', $location->lcn_id) }}" 
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin hapus lokasi ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada data lokasi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    {{-- Script Leaflet --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([-6.997991, 107.579410], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Tambahkan marker untuk setiap lokasi dari database
        @foreach($locations as $loc)
            L.marker([{{ $loc->latitude ?? -6.997991 }}, {{ $loc->longitude ?? 107.579410 }}])
                .addTo(map)
                .bindPopup("<b>{{ $loc->lcn_name }}</b><br/>Block: {{ $loc->lcn_block ?? '-' }}");
        @endforeach
    </script>
</x-layouts.main>
