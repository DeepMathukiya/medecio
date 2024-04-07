<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png" type="image/icon">

    <title>Patient</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    </style>
</head>

<body>
    <!-- clinic name
    doctor name
    email
    password
    number -->
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4"> <a
                                            href="patient_signup.php">Sign Up </a> / <a href="doctor_login.php"
                                            class="active">Login</a></p>

                                    <form class="mx-1 mx-md-4" method="POST" action="">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" name="email" id="form3Example3c"
                                                    class="form-control"
                                                    value="<?php if (isset($_COOKIE['emailidp'])) {
                                                        echo $_COOKIE['emailidp'];
                                                    } ?>" />
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4cd" name="pass"
                                                    class="form-control"
                                                    value="<?php if (isset($_COOKIE['passp'])) {
                                                        echo $_COOKIE['passp'];
                                                    } ?>" />
                                                <label class="form-label" for="form3Example4cd">
                                                    password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <input type="submit" value="Login" class="btn btn-primary btn-lg"
                                                name="submit1">
                                        </div>


                                    </form>
                                    <a href="forgetpassp.php">forget password</a>
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
    include 'connection.php';
    if (isset($_POST['submit1'])) {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $que = "select * from registration_patient where email ='$email'";
        $resQue = mysqli_query($con, $que);
        $noOfRow = mysqli_num_rows($resQue);
        if ($noOfRow) {
            $row = mysqli_fetch_assoc($resQue);
            if ($row['Status'] != "Active") {
                ?>
                <script>
                    alert("Please verify your email first");
                    location.replace("verifyp.php?email=<?php echo $email; ?>");
                </script>
                <?php
            } else {
                $get_pass = $row['pass'];
                if (password_verify($pass, $get_pass)) {
                    setcookie('emailidp', $email, time() + 86400);
                    setcookie('passp', $pass, time() + 86400);

                    $tableName = 'patient_' . preg_replace("/[^a-zA-Z0-9]+/", "", $email);
                    $createTable = "create table IF NOT EXISTS $tableName(
                            id INT(255) AUTO_INCREMENT PRIMARY KEY,
                                DoName varchar(255),
                                DoEmail varchar(255),
                                DONumber varchar(255),
                                Issue varchar(255),
                                DES varchar(255),
                                care varchar(255),
                                date DATE
                    
                        );";
                    $result = mysqli_query($con, $createTable);
                    if ($result) {
                        ?>
                        <script>
                            location.replace("patient/patient.php");
                        </script>
                        <?php
                    } else { ?>
                        <script>
                            alert("Unable to create table");
                        </script>
                        <?php
                    }

                } else {
                    ?>
                    <script>
                        alert(" Incorrect Password");
                    </script>
                    <?php
                }
            }
        } else {
            ?>
            <script>
                alert("Invalid Email Please Signup first");
            </script>
            <?php
        }



    }
    ?>
</body>
<script src="script.js"></script>

</html>