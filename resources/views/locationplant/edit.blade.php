<x-layouts.main title="Edit Lokasi">
<div class="container my-4">
    <h2 class="mb-4">Edit Lokasi Tanaman</h2>

    <form action="{{ route('locationplant.update', $location->lcn_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Lokasi</label>
            <input type="text" name="lcn_name" class="form-control" value="{{ $location->lcn_name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Block</label>
            <input type="text" name="lcn_block" class="form-control" value="{{ $location->lcn_block }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Koordinat</label>
            <input type="text" name="lcn_latitude" id="latitude" class="form-control mb-2" value="{{ $location->lcn_latitude }}" placeholder="Latitude" readonly>
            <input type="text" name="lcn_longitude" id="longitude" class="form-control" value="{{ $location->lcn_longitude }}" placeholder="Longitude" readonly>
        </div>

        <div id="map" style="height: 400px;" class="mb-4"></div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('locationplant.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    var lat = {!! json_encode($location->lcn_latitude ?? -6.997991) !!};
    var lng = {!! json_encode($location->lcn_longitude ?? 107.579410) !!};

    var map = L.map('map').setView([lat, lng], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    var marker = L.marker([lat, lng]).addTo(map);

    map.on('click', function(e) {
        var newLat = e.latlng.lat;
        var newLng = e.latlng.lng;

        if (marker) {
            map.removeLayer(marker);
        }

        marker = L.marker([newLat, newLng]).addTo(map);
        document.getElementById('latitude').value = newLat;
        document.getElementById('longitude').value = newLng;
    });
</script>

</x-layouts.main>
