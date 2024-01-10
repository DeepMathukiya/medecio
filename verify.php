<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        *{
            background-color: #f8f9fa;
        }
        .form_input{
            display: flex;
            justify-content: center;
            margin:20px;
        }
        .form-outline input{
            width: 400px;
            max-width:500px;
        }
        .text-center{
            margin:0 40%;
        }
    </style>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

  <!-- Frontend of this form  -->

  <form method="POST" id="OTP1" action="">
        <div class="form_input">
            <!-- <i class="fas fa-key fa-lg me-3 fa-fw"></i> -->
            <div class="form-outline  mt-5">
                <label class="form-label text-center" for="OTPverify">
                   Enter OTP</label>
                <input type="Text" name="OTPVerify" id="OTPverify" class="form-control"/>
            </div>
        </div>
        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4 ">
            <input type="submit" value="Register" id="insert" class="btn btn-primary btn-lg" name="Register">
        </div>
    </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

  <?php
  include 'connection.php';
  $email = $_GET['email'];
  $selemail = "select * from registration where email ='$email'";
  $emailres = mysqli_query($con, $selemail);
  $arr = mysqli_fetch_array($emailres);
    $otp = $arr['OTP'];
    if(isset($_POST['Register'])){
        $mainotp = $_POST['OTPVerify'];
        if($otp == $mainotp){
            $que ="Update registration set Status='Active' where email='$email'";
            mysqli_query($con,$que);
            ?>
<script>
    location.replace("doctor_login.php");
</script>

<?php
        }else{
            ?>
<script>
    alert("Wrong OTP");
</script>
            <?php
        }

    }
 
  
  
  
  
  ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     </body>
</html>