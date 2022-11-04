<!DOCTYPE html>
<html>
<head>
    <title>Date Free</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="https://www.globallove.online/images/GlobalLoveLogo2.png">
	<link type="text/css" rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>
<body style="height: 100vh;">

    <div id="map" style="width: 100%; height: 100%;"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet-src.js"></script>

    <script>

	

        var map = L.map('map').setView([-33.865143, 151.209900], 8);
        mapLink = 
            '<a href="https://openstreetmap.org">OpenStreetMap</a>';
        L.tileLayer(
            'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; ' + mapLink + ' Contributors',
            maxZoom: 18,
            }).addTo(map);
            $.ajax({
        type: "get",
        url: '/map/view/ajax', 
        }).done(function( res ) {
            console.log (res)
            for (var i = 0; i < res.length; i++) {
                var century21icon = L.icon({
                iconUrl: res[i][3],
                iconSize: [40, 40]
                });
			marker = new L.marker([res[i][0],res[i][1]],{icon: century21icon})
				.bindPopup(res[i][2])
				.addTo(map);
		}
          
        });
		
               
    </script>
</body>
</html>