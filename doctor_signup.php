<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png" type="image/icon">

    <title>Doctor</title>
    <link rel="stylesheet" href="style.css">
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
                    color: "#110000",
                    draggable: true
                })
                .setLngLat([lng, lat])
                .addTo(map);

            document.getElementById("PeLocation").value = [lng, lat]; // Set the value of the hidden input field to the marker's coordinates (by default to location of user)

            function onDragEnd() {
                let {
                    lng,
                    lat
                } = marker.getLngLat();
                console.log("Now the marker is at: " + lat, lng);
                document.getElementById("PeLocation").value = [lng, lat];
            }

            marker.on('dragend', onDragEnd);
        }





        // Get location of user
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successFunction, errorFunction, {
                enableHighAccuracy: true
            ,timeout : 5000
            ,maximumAge: 0}
            );
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

    <style>
    </style>
</head>

<body>
  
    <!-- clinic name
    doctor name
    email
    password
    number
    location -->
    <section class="%-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4"> <a href="doctor_signup.php" class="active">Sign Up </a> / <a href="doctor_login.php">Login</a></p>

                                    <form class="mx-1 mx-md-4" method="POST" action="" id="form1">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" name="name" class="form-control" required />
                                                <label class="form-label" for="form3Example1c">Your Name</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="cname" id="form3Example1c" class="form-control" required />
                                                <label class="form-label" for="form3Example1c">Clinic Name</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="tel" id="form3Example4c" name="number" class="form-control" required />
                                                <label class="form-label" for="form3Example4c">Phone Number</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" name="email" id="form3Example3c" class="form-control" required />
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                            </div>
                                        </div>



                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" name="pass" id="form3Example4cd" class="form-control" required />
                                                <label class="form-label" for="form3Example4cd">
                                                    password</label>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="PeLocation" class="form__label">Location</label>
                                            <div id='map' style='width: 100%; height: 300px;'></div>
                                            <input type="hidden" id="PeLocation" name="PeLocation">
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label for="spciality">Speciality:</label>
                                                <select name="spciality" id="spciality">
                                                    <option value="family doctor">Family Doctor</option>
                                                    <option value="pulmonologist">Pulmonologist</option>
                                                    <option value="cardiologist">Cardiologist</option>
                                                    <option value="neurologist ">Neurologist</option>
                                                    <option value="oncologist">Oncologist</option>
                                                    <option value="endocrinologist">Endocrinologist</option>
                                                    <option value="rheumatologist">Rheumatologist</option>
                                                    <option value="gastroenterologist">Gastroenterologist</option>
                                                    <option value="psychiatrist,addiction specialist">Psychiatrist, Addiction Specialist</option>
                                                    <option value="allergist">Allergist</option>
                                                    <option value="hematologist ">Hematologist</option>
                                                    <option value="psychologist,psychiatrist">Psychologist, Psychiatrist</option>
                                                    <option value="surgeon ">Surgeon</option>
                                                    <option value="allergist,pulmonologist">Allergist, Pulmonologist</option>
                                                    <option value="neurologist,neurosurgeon">Neurologist, Neurosurgeon</option>
                                                    <option value="urologist">Urologist</option>
                                                    <option value="cardiologist,hematologist">Cardiologist, Hematologist</option>
                                                    <option value="orthopedist">Orthopedist</option>
                                                    <option value="oncologist">Oncologist</option>
                                                    <option value="gynecologist">Gynecologist</option>
                                                    <option value="ophthalmologist">Opthalmologist</option>
                                                    <option value="urologist,gynecologist">Urologist, Gynecologist</option>
                                                    <option value="dermatologist ">Dermatologist</option>
                                                    <option value="vascular surgeon">Vascular Surgeon</option>
                                                    <option value="nephrologist ">Nephrologist</option>
                                                    <option value="gastroenterologist">Gastroenterologist</option>
                                                </select>
                                            </div>
                                        </div>




                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <input type="submit" value="Get OTP" id="OTP" class="btn btn-primary btn-lg" name="submit1">
                                        </div>
                                    </form>


                                </div>

                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="photo.jpeg" class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
   
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
       
    include 'connection.php';
    if (isset($_POST['submit1'])) {
        $name = $_POST['name'];
        $cname = $_POST['cname'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $PeLocation = $_POST['PeLocation'];
        $spciality = $_POST['spciality'];
        $pass = mysqli_real_escape_string($con, $_POST['pass']);
        $cpass = password_hash($pass, PASSWORD_BCRYPT);

        $selemail = "select * from registration where email ='$email'";
        $emailres = mysqli_query($con, $selemail);
        $emailcount = mysqli_num_rows($emailres);
        if ($emailcount > 0) {
    ?>
            <script>
                alert("This email is alredy exist");
                location.replace('doctor_login.php');
            </script>
            <?php
        }
        else{
        require 'phpMailer\Exception.php';
        require 'phpMailer\PHPMailer.php';
        require 'phpMailer\SMTP.php';
       
            $rand = rand(1000 ,9999);
            $insertQue = "insert into registration(name,cname,number,email,pass,location,spciality ,OTP) values ('$name','$cname','$number','$email','$cpass','$PeLocation','$spciality','$rand')";
            $res = mysqli_query($con, $insertQue);
            if ($res) {
            
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'health.link987@gmail.com';                     //SMTP username
    $mail->Password   = 'kzxc rflc dwma jngh';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->addAddress($email, $name);     //Add a recipient
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Presription of the patient ";
    $mail->Body    = "$rand";

    $mail->send();
?>

<script>
    location.replace("verify.php?email=<?php echo $email; ?>");
</script>
<?php
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


            }
        }
    
    }
    ?>
   
</script>
</body>
<script src="script.js"></script>

</html>