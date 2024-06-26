<!doctype html>
<html lang="en">

<head>
<link rel="icon" href="../logo.png" type="image/icon">

    <title>Appointment</title>
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
    <style>
        .Appointment{
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            background-color: ;
            width: auto;
            max-height: 400px;
            border-radius: 10px;
        }
        .Appointment button{
            background-color: white;
            border-radius: 10px;
        }
        .Appointment button:hover{
  background: #3fbbc0;
  color: black;
}

        </style>
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
                  var x =document.getElementById("Appointment");
                  
                  x.style.marginTop = "100px";
                  x.style.marginLeft = "20px";
                  x.style.display = "flex";

                  var det = document.getElementById("details");
                    det.innerHTML = "Name : "+location['name'] + "<br> Email : "+location['email'] + "<br> Speciality : "+location['speciality'];

                    var book = document.getElementById("Book");
                    book.style.marginTop = "20px";
                    book.addEventListener('click', function(){
                        window.location.href = "book_appointment.php?docid="+location['id'];
                    });
                
        // alert('Marker clicked!'+ location['id']);
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
        } else{
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
    while ($arr = mysqli_fetch_assoc($res)) {
        if($arr['status'] == "Active"){
        $location = explode(",", $arr['location']);

    ?><script>
            locations.push({
                id: <?php echo $arr['id']; ?>,
                lng: <?php echo $location[0]; ?>,
                lat: <?php echo $location[1]; ?>,
                name: <?php echo json_encode($arr['name']); ?>,
                email:<?php echo json_encode($arr['email']); ?>,
                speciality: <?php echo json_encode($arr['spciality']); ?>,
             
            });
        </script>
    <?php
    }
}


    ?>

    <script>
        console.log(locations);
    </script>
    <div class="mb-4" style="positon:relative"> 
    <!-- <label for="PeLocation" class="form__label">Location</label> -->
        <div id='map' style='width: 100%; height: 1000px;'></div>
        <div class = "Appointment" id="Appointment" style="position:absolute ; top: 0; left: 0; background:white; display :flex;flex-direction:column;display:none;">
        Details of Doctor 
        <div id="details"></div>
        <button id="Book">Book Appointment</button>
        
        
    </div> 
        <input type="hidden" id="PeLocation" name="PeLocation">
    </div>



</body>

</html>