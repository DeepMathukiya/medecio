<!doctype html>
<html lang="en">
  <head>
  <link rel="icon" href="logo.png" type="image/icon">

    <title>Forget Pass</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
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
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <form method="POST" id="" action="">
        <div class="form_input">
            <!-- <i class="fas fa-key fa-lg me-3 fa-fw"></i> -->
            <div class="form-outline  mt-5">
                <label class="form-label text-center" for="OTPverify">
                   Enter your Email</label>
                <input type="email" name="email"  class="form-control"/>
            </div>
        </div>
        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4 ">
            <input type="submit" value="Send mail" id="insert" class="btn btn-primary btn-lg" name="submit">
        </div>
    </form>


    <?php
    include "connection.php";
   
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    if (isset($_POST["submit"])){
        $email = $_POST["email"];

        $query = "select * from registration where email = '$email'";
        $res = mysqli_query($con , $query);
        $noOfRow = mysqli_num_rows($res);
        $arr = mysqli_fetch_array($res);
        if($noOfRow){
            require 'phpMailer\Exception.php';
            require 'phpMailer\PHPMailer.php';
            require 'phpMailer\SMTP.php';

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
    $mail->addAddress($email, $email);     //Add a recipient
    
    $pass = $arr['pass'];
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Reset Passwordlink";
    $mail->Body    = "Please reffer to below link <a href='http://localhost/medecio/resetpsw.php?pass=$pass'>link</a> ";

    $mail->send();

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
           
        }else{
            ?>
<script>alert("please Signup through this email");
location.replace("doctor_signup.php");
</script>
            <?php
        }
        
    }
    
    
    ?>
</body>
</html>