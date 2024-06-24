<!doctype html>
<html lang="en">
  <head>
  <link rel="icon" href="logo.png" type="image/icon">
  
  <title>Verify Patient</title>
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

    <form action="" method="POST">
    <div id="resendOtp" style="width:100% ; align-items: center; text-align: center;">
        <input type="submit" value="Resend OTP" name="resendOtp" style="color: blue; border: 0px;">
    </div>
</form>

      <?php
   
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;
   include 'connection.php';
   require 'phpMailer/Exception.php';
   require 'phpMailer/PHPMailer.php';
   require 'phpMailer/SMTP.php';
   if (isset($_POST["resendOtp"])){
   
   $rand1 = rand(1000 ,9999);
   $email = $_GET['email'];
   $que ="Update registration_patient set OTP='$rand1' where email='$email'";
   $res = mysqli_query($con,$que);
if($res){
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
    $mail->addAddress($email, " name ");     //Add a recipient
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "OTP for Registration";
    $mail->Body    = "$rand1";

    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
      }

?>
 

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

  <?php
  include 'connection.php';
  $email = $_GET['email'];
  $selemail = "select * from registration_patient where email ='$email'";
  $emailres = mysqli_query($con, $selemail);
  $arr = mysqli_fetch_array($emailres);
    $otp = $arr['OTP'];
    if(isset($_POST['Register'])){
        $mainotp = $_POST['OTPVerify'];
        if($otp == $mainotp){
            $que ="Update registration_patient set Status='Active' where email='$email'";
            mysqli_query($con,$que);
            ?>
<script>
    location.replace("patient_login.php");
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