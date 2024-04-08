
<?php

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include '../connection.php';

$mails = $_GET['mail'];
$id = $_GET['id'];
$email = $_SESSION['emailid'];
$tableName = 'user_' . preg_replace("/[^a-zA-Z0-9]+/", "", $email);
$showqu = "select * from $tableName where id={$id}";
$showdat = mysqli_query($con, $showqu);
$arr = mysqli_fetch_array($showdat);
$PeName = $arr['PeName'];
$PeDES = $arr['PeDES'];
$bodyt = "<p>
<b>hey $mails,</b>
<br>
<br>
This is a prescription of patient $PeName,<br>
Here it is <br><b> $PeDES</b> </p>
";

//Load Composer's autoloader
require '..\phpMailer\Exception.php';
require '..\phpMailer\PHPMailer.php';
require '..\phpMailer\SMTP.php';

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
    $mail->addAddress($mails, $mails);     //Add a recipient
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Presription of the patient ". $PeName;
    $mail->Body    = "$bodyt";

    $mail->send();
    header("Location: doctor.php");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



?>