<center>
<!DOCTYPE html>
<html>
<head>
    <title>Leaflet Map</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <style>
        #map {
            height: 350px;
            width: 90%;
        }
    </style>
</head>
<body>
<div id="map"></div>

<script>
    // Koordinat awal (misalnya Jakarta)
    var map = L.map('map').setView([-6.997991, 107.579410], 13);

    // Tambahkan layer peta
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Tambahkan marker
    L.marker([-6.997991, 107.579410])
        .addTo(map)
        .bindPopup("<b>Halo!</b><br />Ini Jawa.")
        .openPopup();
</script>

</body>
</html>
</center>