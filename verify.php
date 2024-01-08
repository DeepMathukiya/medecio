<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

  <form method="POST" id="OTP1" action="">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="Text" name="OTPVerify" id="OTPverify" class="form-control"/>
                                                <label class="form-label" for="form3Example4cd" style="display:none;">
                                                    OTP</label>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <input type="submit" value="Register" id="insert" class="btn btn-primary btn-lg" name="Register">
                                        </div>
                                    </form>
  </div>

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