<x-layouts.main title="Detail Lokasi">
    <h1 class="mt-4 text-center">Detail Lokasi</h1>

    {{-- Leaflet CSS & JS --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <div class="container mt-4">
        <table class="table table-bordered">
            <tr><th>ID</th><td>{{ $location->lcn_id }}</td></tr>
            <tr><th>Name</th><td>{{ $location->lcn_name }}</td></tr>
            <tr><th>Block</th><td>{{ $location->lcn_block }}</td></tr>
            <tr><th>Latitude</th><td>{{ $location->lcn_latitude }}</td></tr>
            <tr><th>Longitude</th><td>{{ $location->lcn_longitude }}</td></tr>
        </table>

        {{-- Map container --}}
        <div id="map"
        data-name="{{ $location['lcn_name'] }}"
        data-latitude="{{ $location->lcn_latitude }}"
        data-longitude="{{ $location->lcn_longitude }}"
        style="height: 400px; margin-top:20px;"></div>
    </div>

<script>
        const mapDiv = document.getElementById('map');
        const name = mapDiv.dataset.name;
        const lat = parseFloat(mapDiv.dataset.latitude);
        const lng = parseFloat(mapDiv.dataset.longitude);
        console.log(name, lat, lng);

        var map = L.map('map').setView([lat, lng], 17);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: 'UNI-INVT'
        }).addTo(map);

        var alamatMarker = L.marker([lat, lng]).addTo(map);
        alamatMarker.bindPopup("<b>Location</b><br>" + name + "<br>").openPopup();
    </script>
</x-layouts.main>
