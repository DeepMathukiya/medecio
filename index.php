<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Medecio</title>
  <link rel="icon" href="logo.png" type="image/icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="../icon/css/all.css" />
  <link rel="stylesheet" href="../Hover-master/css/hover.css" />
  <link rel="stylesheet" href="bootstrap-icons-1.10.5/font/bootstrap-icons.css" />
  <script src="https://kit.fontawesome.com/50c045cb63.js" crossorigin="anonymous"></script>
</head>

<body>
  <nav>
    <div class="logo"><img src="logo.png" alt=""></div>
    <div class="navbar">
      <div class="nav_left">
        <a href="#index.html">Home</a>
        <a href="#doctor">Doctor</a>
        <a href="#services">Services</a>
        <a href="patient/appointment.php">Appointment</a>
        <a href="#contact">Contact</a>
      </div>
      <div class="nav_right">
        <div class="doctor btn" onclick="doctor_signup()">
          <p>Doctor Login</p>
        </div>
        <div class="doctor btn" onclick="patient_signup()">
          <p>Patient Login</p>
        </div>
      </div>
    </div>
    <div class="menu">
      <i class="fas fa-bars" onclick="openmenu()"></i>
    </div>
    <div class="sidemenu" id="sidemenu">
      <i class="fas fa-times" onclick="closemenu()"></i>
      <div class="hamburg">
        <a href="#index.html">Home</a>
        <a href="#doctor">Doctor</a>
        <a href="#services">Services</a>
        <a href="#Appointment">Appointment</a>
        <a href="#contact">Contact</a>
      </div>
    </div>
  </nav>
  <div class="container-fluid p-3">
    <!-- ////////// first section -->
    <div class="container p-3">
      <div class="row mt-5 my-row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4 g-0 g-1 g-sm-1 g-md-2 g-lg-3">
        <div class="col">
          <div class="my-box" style="max-height : 370px">
            <i class="fa-solid fa-heart-pulse"></i>
            <h2>Receptionist</h2>
            <p style="height:140px">
              The receptionist can enter the patient's details, and the doctor can access this information using the patient's name or email.
            </p>
          </div>
        </div>
        <div class="col">
          <div class="my-box" style="max-height : 370px">
            <i class="fa-solid fa-pills"></i>
            <h2>Doctor</h2>
            <p style="height:140px">
              Doctors can add patient descriptions and prescriptions using text-to-speech, update patient details, and view patient histories.
            </p>
          </div>
        </div>
        <div class="col">
          <div class="my-box" style="max-height : 370px">
            <i class="fa-solid fa-thermometer"></i>
            <h2>Patient</h2>
            <p style="height:140px">
              Patients can track their previous illnesses and prescriptions, and also view details about their doctors.
            </p>
          </div>
        </div>
        <div class="col">
          <div class="my-box" style="max-height : 370px">
            <i class="fa-solid fa-dna"></i>
            <h2>Advanced Diagnostics</h2>
            <p>
              Our advanced diagnostic tools help in early detection and treatment of diseases, ensuring better health outcomes.
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- //////////////////second section -->
    <div class="container text-center p-5 mt-5" id="doctor">
      <h1 class="my-h1-und">DOCTORS</h1>
      <p class="lead p-3">
        Our team of experienced doctors are dedicated to providing the highest quality care. They are here to support you with all your medical needs.
      </p>
    </div>
    <div class="container">
      <div class="row pb-5 g-0 g-1 g-sm-3 row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4">
        <div class="col hover-all">
          <div class="dr-img-main">
            <img
              src="https://img.freepik.com/free-photo/pleased-young-female-doctor-wearing-medical-robe-stethoscope-around-neck-standing-with-closed-posture_409827-254.jpg?w=2000"
              alt="" class="my-dr-img img-fluid" />
            <div class="border my-dr-hover">
              <i class="fa-brands fa-twitter"></i><i class="fa-brands fa-facebook"></i><i
                class="fa-brands fa-instagram"></i><i class="fa-brands fa-linkedin-in"></i>
            </div>
          </div>
          <div class="border text-center p-2 my-dr-info">
            <h5>Walter White</h5>
            <p class="lead">Chief Medical Officer</p>
          </div>
        </div>
        <div class="col hover-all">
          <div class="dr-img-main">
            <img src="https://t4.ftcdn.net/jpg/02/60/04/09/360_F_260040900_oO6YW1sHTnKxby4GcjCvtypUCWjnQRg5.jpg" alt=""
              class="my-dr-img img-fluid" />
            <div class="border my-dr-hover">
              <i class="fa-brands fa-twitter"></i><i class="fa-brands fa-facebook"></i><i
                class="fa-brands fa-instagram"></i><i class="fa-brands fa-linkedin-in"></i>
            </div>
          </div>
          <div class="border text-center p-2 my-dr-info">
            <h5>Sarah Johnson</h5>
            <p class="lead">Chief Medical Officer</p>
          </div>
        </div>
        <div class="col hover-all">
          <div class="dr-img-main">
            <img src="https://img.freepik.com/free-photo/smiling-touching-arms-crossed-room-hospital_1134-799.jpg"
              alt="" class="my-dr-img img-fluid" />
            <div class="border my-dr-hover">
              <i class="fa-brands fa-twitter"></i><i class="fa-brands fa-facebook"></i><i
                class="fa-brands fa-instagram"></i><i class="fa-brands fa-linkedin-in"></i>
            </div>
          </div>
          <div class="border text-center p-2 my-dr-info">
            <h5>Amanda Jepson</h5>
            <p class="lead">Neurosurgeon</p>
          </div>
        </div>
        <div class="col hover-all">
          <div class="dr-img-main">
            <img
              src="https://img.freepik.com/free-photo/woman-doctor-wearing-lab-coat-with-stethoscope-isolated_1303-29791.jpg"
              alt="" class="my-dr-img img-fluid" />
            <div class="border my-dr-hover">
              <i class="fa-brands fa-twitter"></i><i class="fa-brands fa-facebook"></i><i
                class="fa-brands fa-instagram"></i><i class="fa-brands fa-linkedin-in"></i>
            </div>
          </div>
          <div class="border text-center p-2 my-dr-info">
            <h5>William Anderson</h5>
            <p class="lead">Cardiologist</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container text-center mt-5" id="services">
      <h1 class="my-h1-und">SERVICES</h1>
      <p class="lead p-3">
        We offer a wide range of medical services to meet your health care needs, from routine checkups to advanced diagnostics and treatments.
      </p>
    </div>
    <div class="container mt-5">
      <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 gy-5">
        <div class="col">
          <div class="my-main-icon-part">
            <div class="my-center-icon w-100 d-flex justify-content-center pb-3 p-1">
              <span class="my-icon-main">
                <i class="bi bi-heart-pulse-fill"></i>
              </span>
            </div>
            <div class=" text-center my-icon-h4">
              <h4 class="my-h1-und">Cardiology</h4>
            </div>
            <p class="text-center mt-4">
              Our cardiology department offers state-of-the-art care for heart conditions, including diagnostics, treatment, and rehabilitation.
            </p>
          </div>
        </div>
        <div class="col">
          <div class="my-main-icon-part ">
            <div class="my-center-icon w-100 d-flex justify-content-center pb-3 p-1">
              <span class="my-icon-main">
                <i class="fa-solid fa-pills"></i>
              </span>
            </div>
            <div class=" text-center my-icon-h4">
              <h4 class="my-h1-und">Pharmacy</h4>
            </div>
            <p class="text-center mt-4">
              Our on-site pharmacy provides a convenient way to get your medications promptly and accurately, with professional advice on hand.
            </p>
          </div>
        </div>
        <div class="col">
          <div class="my-main-icon-part ">
            <div class="my-center-icon w-100 d-flex justify-content-center pb-3 p-1">
              <span class="my-icon-main">
                <i class="fa-solid fa-hospital-user"></i>
              </span>
            </div>
            <div class=" text-center my-icon-h4">
              <h4 class="my-h1-und">Patient Care</h4>
            </div>
            <p class="text-center mt-4">
              We provide comprehensive patient care services to ensure your health and well-being, from preventive care to specialized treatments.
            </p>
          </div>
        </div>
        <div class="col">
          <div class="my-main-icon-part ">
            <div class="my-center-icon w-100 d-flex justify-content-center pb-3 p-1">
              <span class="my-icon-main">
                <i class="fa-solid fa-dna"></i>
              </span>
            </div>
            <div class=" text-center my-icon-h4">
              <h4 class="my-h1-und">Genetic Testing</h4>
            </div>
            <p class="text-center mt-4">
              Our genetic testing services provide insights into your genetic makeup, helping you make informed decisions about your health.
            </p>
          </div>
        </div>
        <div class="col">
          <div class="my-main-icon-part ">
            <div class="my-center-icon w-100 d-flex justify-content-center pb-3 p-1">
              <span class="my-icon-main">
                <i class="fa-solid fa-wheelchair"></i>
              </span>
            </div>
            <div class=" text-center my-icon-h4">
              <h4 class="my-h1-und">Rehabilitation</h4>
            </div>
            <p class="text-center mt-4">
              Our rehabilitation services help patients recover from injuries and surgeries, improving mobility and quality of life.
            </p>
          </div>
        </div>
        <div class="col">
          <div class="my-main-icon-part ">
            <div class="my-center-icon w-100 d-flex justify-content-center pb-3 p-1">
              <span class="my-icon-main">
                <i class="fa-solid fa-notes-medical"></i>
              </span>
            </div>
            <div class=" text-center my-icon-h4">
              <h4 class="my-h1-und">Medical Records</h4>
            </div>
            <p class="text-center mt-4">
              We maintain comprehensive and secure medical records for our patients, ensuring continuity of care and easy access to your health information.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container text-center mt-5" id="contact">
    <h2 class="my-h1-und">CONTACT</h2>
    <p class="lead p-3">
      We're here to help you with any questions or concerns. Reach out to us via phone, email, or visit our office for more information.
    </p>
  </div>

  <?php
  include "connection.php";
  $createTable = "create table IF NOT EXISTS registration(
    id INT(255) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255), 
    cname VARCHAR(255), 
    number VARCHAR(255), 
    email VARCHAR(255),
    pass VARCHAR(255), 
    location VARCHAR(255), 
    spciality VARCHAR(255),
    OTP VARCHAR(255),
    status ENUM('Active', 'DeActivate') DEFAULT 'DeActivate' 
);";
$result = mysqli_query($con, $createTable);

$createTable2 = "create table IF NOT EXISTS registration_patient(
  id INT(255) AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255), 
  DOB DATE,
  Gender VARCHAR(10), 
  email VARCHAR(255),
  pass VARCHAR(255), 
  Phone VARCHAR(255), 
  OTP VARCHAR(255),
  status ENUM('Active', 'DeActivate') DEFAULT 'DeActivate' 
);";
$result2 = mysqli_query($con, $createTable2);

  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <script>
    <?php include 'script.js'?>
  </script>
</body>

</html>
