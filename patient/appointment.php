<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Mapbox API Imports -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />

    <script>
        // Mapbox GL JS

        function makemap(lat, lng) {
            mapboxgl.accessToken = 'pk.eyJ1IjoiYXl1c2gxODEwIiwiYSI6ImNrZzFydzhrczJ1ODMycnM4M3NzYnl0bGsifQ.3HfP_urTjjDz4_s7OtD-LA';
            var map = new mapboxgl.Map({
                container: 'map', // container ID
                style: 'mapbox://styles/mapbox/streets-v11', // style URL
                center: [lng, lat], // starting position [lng, lat]
                zoom: 9 // starting zoom
            });

            map.addControl(new mapboxgl.NavigationControl());
            // Set marker options.
            const marker = new mapboxgl.Marker({
                    color: "#110000"
                })
                .setLngLat([lng, lat])
                .addTo(map);
            locations.forEach(function(location) {
                var el = document.createElement('img');
        el.src = "p1.png";
        el.width = '50'; // Replace with the desired width
        el.height = '50';
                var marker2 = new mapboxgl.Marker({
                        element: el,
                        color: "#0000FF"
                    })
                    .setLngLat([location['lng'], location['lat']])
                    .addTo(map);
       
                    marker2.getElement().addEventListener('click', function() {
        alert('Marker clicked!'+ location['id']);
    });
            });
            document.getElementById("PeLocation").value = [lng, lat]; // Set the value of the hidden input field to the marker's coordinates (by default to location of user)           
        }





        // Get location of user
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successFunction, errorFunction, {
                enableHighAccuracy: true
            ,timeout : 5000
            ,maximumAge: 0
            });
        } else {
            alert('It seems like Geolocation, which is required for this page, is not enabled in your browser.');
        }

        function successFunction(position) {
            let lat = position.coords.latitude;
            let lng = position.coords.longitude;
            console.log("Location is: " + lat, lng);
            makemap(lat, lng);
        }

        function errorFunction(position) {
            console.error("An error has occured while retrieving location");
        }
    </script>
</head>

<body>
    <script>
        let locations = [];
    </script>
    <?php
    include "../connection.php";

    $que = "Select * from registration where 1= 1";
    $res = mysqli_query($con, $que);
    while ($arr = mysqli_fetch_array($res)) {
        if($arr['Status'] == "Active"){
        $location = explode(",", $arr['location']);

    ?><script>
            locations.push({
                id: <?php echo $arr['id'] ?>,
                lng: <?php echo $location[0] ?>,
                lat: <?php echo $location[1] ?>
            });
        </script>
    <?php
    }
}


    ?>

    <script>
        console.log(locations);
    </script>


    <div class="mb-4">
        <label for="PeLocation" class="form__label">Location</label>
        <div id='map' style='width: 100%; height: 300px;'></div>
        <input type="hidden" id="PeLocation" name="PeLocation">
    </div>


</body>

</html>