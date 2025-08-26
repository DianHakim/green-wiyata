<x-layouts.main title="Tambah Lokasi">
<div class="container my-4">
    <h2 class="mb-4">Tambah Lokasi Tanaman</h2>

    <form action="{{ route('locationplant.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Lokasi</label>
            <input type="text" name="lcn_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Block</label>
            <input type="text" name="lcn_block" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Koordinat</label>
            <input type="text" name="lcn_latitude" id="latitude" class="form-control mb-2" placeholder="Latitude" readonly>
            <input type="text" name="lcn_longitude" id="longitude" class="form-control" placeholder="Longitude" readonly>
        </div>

        <div id="map" style="height: 400px;" class="mb-4"></div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('locationplant.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    var map = L.map('map').setView([-6.997991, 107.579410], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    var marker;
    map.on('click', function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;

        if (marker) {
            map.removeLayer(marker);
        }

        marker = L.marker([lat, lng]).addTo(map);
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
    });
</script>
</x-layouts.main>
