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
    <!-- Mapbox API Imports -->
 
</head>

<body>
<section class="%-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4"> <a href="patient_signup.php" >Sign Up </a> / <a href="patient_login.php" class="active">Login</a></p>

      <form class="mx-1 mx-md-4" method="POST" action="" id="form1">
        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" name="PeName" class="form-control" required />
                                                <label class="form-label" for="form3Example1c">Your Name</label>
                                            </div>
                                            </div>

        <!-- <div class="form__group field">
          <input type="date" class="form__field" placeholder="Name" name="PeAge" id='name' required />
          <label for="name" class="form__label">Date of birth</label>
        </div> -->
        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="date" name="PeAge" id="form3Example1c" class="form-control" required />
                                                <label class="form-label" for="form3Example1c">Date of birth</label>
                                            </div>
                                        </div>

        <div class="d-flex flex-row align-items-center mb-4" style="margin-left : 15px;">
        <div class="form__group field">
          <input type="radio" class="form__field mb-0"  placeholder="Name" name="Gender" id='name' required />
          <label for="name" class="form-label">Male</label>
        </div>
        <div class="form__group field">
          <input type="radio" class="form__field mb-0" style="margin-left : 15px;" placeholder="Name" name="Gender" id='name' required />
          <label for="name" class="form-label">Female</label>
        </div>
        </div>

        <!-- <div class="form__group field">
          <input type="number" class="form__field" placeholder="Name" name="Phone" id='name' required />
          <label for="name" class="form__label">Mobile Number</label>
        </div> -->
        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="tel" name="Phone" id="form3Example1c" class="form-control" required />
                                                <label class="form-label" for="form3Example1c">Mobile Number</label>
                                            </div>
                                        </div>
<!-- 
        <div class="form__group field">
          <input type="email" class="form__field" placeholder="Name" name="PeEmail" id='name' required />
          <label for="name" class="form__label">Email</label>
        </div> -->
        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" name="PeEmail" id="form3Example3c" class="form-control" required />
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                            </div>
                                        </div>
        <!-- <div class="form__group field">
          <input type="Password" class="form__field" placeholder="Name" name="pass" id='name' required />
          <label for="name" class="form__label">Password</label>
        </div> -->
        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" name="pass" id="form3Example4cd" class="form-control" required />
                                                <label class="form-label" for="form3Example4cd">
                                                    password</label>
                                            </div>
                                        </div>
        
        <!-- <div class="rec_submit_div">
          <input class="rec_submit" type="submit" name="submit" value="submit">
        </div> -->

        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <input type="submit" value="Get OTP" id="OTP" class="btn btn-primary btn-lg" name="submit">
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
if(isset($_POST['submit'])){
$PeName =$_POST['PeName'];
$PeAge = $_POST['PeAge'];
$Gender = $_POST['Gender'];
$email = $_POST['PeEmail'];
$Phone = $_POST['Phone'];

$pass = mysqli_real_escape_string($con,$_POST['pass']);
$cpass =password_hash($pass,PASSWORD_BCRYPT);  

$selemail = "select * from registration_patient where email ='$email'";
$emailres = mysqli_query($con,$selemail);
$emailcount= mysqli_num_rows($emailres);
if($emailcount>0){
    ?>
    <script>
        alert("This email is alredy exist");
        location.replace('doctor_login.php');

        </script>
        <?php
}
else {
  require 'phpMailer/Exception.php';
  require 'phpMailer/PHPMailer.php';
  require 'phpMailer/SMTP.php';
 
      $rand = rand(1000 ,9999);
        $insertQue = "insert into registration_patient(name,DOB,Gender,email,pass,Phone,OTP) values ('$PeName','$PeAge','$Gender','$email','$cpass','$Phone','$rand')";
        $res = mysqli_query($con,$insertQue);
        if($res){
                
//Create an instance; passing `true` enables excep+tions
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
    $mail->addAddress($email, $PeName);     //Add a recipient
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "OTP for registration ";
    $mail->Body    = "$rand";

    $mail->send();
            ?>
            <script>
                    location.replace("verifyp.php?email=<?php echo $email; ?>");
            </script>
            <?php
            } catch (Exception $e) {
              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          } 
             }

}
}

?>
</body>

</html>