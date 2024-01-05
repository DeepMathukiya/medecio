<?php  
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mails = $_GET['mail'];
$PeDec = $_SESSION['PeDES'];
$PeName = $_SESSION['PeName'];

//Load Composer's autoloader
require 'phpMailer\Exception.php';
require 'phpMailer\PHPMailer.php';
require 'phpMailer\SMTP.php';

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
    $mail->setFrom($mails, $mails);
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Description of the patient $peName";
    $mail->Body    = $PeDec;

    $mail->send();
    header("Location: Doctor/doctor.php");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



?>