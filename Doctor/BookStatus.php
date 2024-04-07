<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../logo.png" type="image/icon">

    <title>
        BookingStatus
    </title>
</head>
<style>
        .body {
            display: block;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
        }

        .container {
            display: grid;
            width: 100%;
            justify-content: center;
            flex-wrap: nowrap;
        }

        .header {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .header a {
            text-decoration: none;
            color: #3fbbc0;

        }

        .form {
            display: flex;
            align-items: center;
            text-align: center;
        }

        .form #date,
        #time,
        #comment,
        #Reschedulesub,
        #rejectsub {
            position: relative;
            padding: 15px 0 0;
            margin-top: 10px;
            width: 100%;
        }

        .resc,
        .rej {
            font-family: inherit;
            width: 100%;
            border: 0;
            border-bottom: 2px solid #9b9b9b;
            outline: 0;
            font-size: 1.3rem;
            color: black;
            padding: 7px 0;
            background: transparent;
            transition: border-color 0.2s;
        }

        .form input[type="submit"] {
            font-size: 15px;
            width: 150px;
            height: 40px;
            margin-top: 20px;
            padding: 5px 10px;
            border-radius: 20px;
            background-color: white;
        }

        .form input[type="submit"]:hover {
            background-image: linear-gradient(to right, aqua, #11998e);
        }

        .form__label {
            position: absolute;
            top: 0;
            display: block;
            transition: 0.2s;
            font-size: 1rem;
            color: #9b9b9b;
        }
    </style>
<body>
    




<div class="container">
        <div class="header">
            <h3><a href="" id="Reject">Reject</a> / <a class="" href="" id="Reschedule">Reschedule</a></h3>
        </div>


        <div class="form">
            <form action="" method="POST">
                <div id="comment" style="display:none;">
                    <textarea name="comment" class="rej" cols="20" rows="3"> </textarea>
                    <label for="name" class="form__label">Comment</label>

                </div>

                <div id="date" style="display: none;">
                    <input type="date" class="resc" name="date">
                    <label for="name" class="form__label">Date</label>

                </div>
                <div id="time" style="display: none;">
                    <input type="time" class="resc" name="time">
                    <label for="name" class="form__label">Time</label>

                </div>
                <div id="Reschedulesub" style="display: none;">
                    <input type="submit" name="Reschedule" value="Reschedule">

                </div>
                <div id="rejectsub" style="display: none;">
                    <input type="submit" name="reject" value="Reject">

                </div>
        </div>
    </div>
    <script>
        var reject = document.getElementById("Reject");

        var Reschedule = document.getElementById("Reschedule");
        var comment = document.getElementById("comment");
        var date = document.getElementById("date");
        var time = document.getElementById("time");
        var subresc = document.getElementById("Reschedulesub")
        var Rejectsub = document.getElementById("rejectsub")

        reject.onclick = function (event) {
            event.preventDefault();
            reject.style.borderBottom = "2px solid #3fbbc0";
            Reschedule.style.borderBottom = "none";
            date.style.display = "none";
            time.style.display = "none";
            subresc.style.display = "none";

            comment.style.display = "block";
            Rejectsub.style.display = "block";
        }
        Reschedule.onclick = function (event) {
            event.preventDefault();
            Reschedule.style.borderBottom = "2px solid #3fbbc0";
            reject.style.borderBottom = "none";
            comment.style.display = "none";
            Rejectsub.style.display = "none";
            date.style.display = "block";
            time.style.display = "block";
            subresc.style.display = "block";
        }
    </script>

<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include "../connection.php";

require '..\phpMailer\Exception.php';
require '..\phpMailer\PHPMailer.php';
require '..\phpMailer\SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'health.link987@gmail.com';                     //SMTP username
    $mail->Password   = 'kzxc rflc dwma jngh';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


    if(isset($_GET['id'] , $_GET['docm'] , $_GET['btn'])){
        $id = $_GET['id'];
        $docm = $_GET['docm'];
        $btn = $_GET['btn'];
        include '../connection.php';
        
        $que = "select * from registration where email='$docm'";
        $res = mysqli_query($con , $que);
        $arr = mysqli_fetch_array($res);
        $docname = $arr['name'];

        $tableName = 'user_' . preg_replace("/[^a-zA-Z0-9]+/", "", $docm); 
        $que2 = "select * from $tableName where id='$id'";
        $res2 = mysqli_query($con , $que2);
        $arr2 = mysqli_fetch_array($res2);
        if(empty($arr2)){
            ?>
            <script>
                alert("Invalid link or you rejected the patient")
                location.replace("doctor.php")
            </script>
            <?php

        }
        $peName = $arr2['PeName'];
        $PeEmail = $arr2['PeEmail'];
        $date = $arr2['date'];
        $iss = $arr2['PeIssue'];

        
    //Recipients to mail 
    $mail->addAddress($PeEmail, $PeEmail);     //Add a recipient
    
        if($btn == 'y'){
            $subject= "Appointment Confirmed at $docname";
            $body = "Hey $peName,<br> Your appointment for Dr. $docname is confirmed on $date at specefied time for $iss.  ";
            //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "$subject";
    $mail->Body    = "$body";

    $mail->send();
    ?>
    <script>
    location.replace("doctor.php");
    
        </script>
<?php
        }

        else{
            ?>
<script>
    Reschedule.style.borderBottom = "2px solid #3fbbc0";
            reject.style.borderBottom = "none";
            comment.style.display = "none";
            Rejectsub.style.display = "none";
            date.style.display = "block";
            time.style.display = "block";
            subresc.style.display = "block";
    </script>
<?php
            
        }
    }
    if(isset($_POST["Reschedule"])){
        $newdate = $_POST["date"];
        $time = $_POST["time"];
        $que = "update $tableName set date='$newdate' where id='$id'";
        $res = mysqli_query($con , $que);
        $subject= "Appointment Reschdule on at $docname";
        $body = "Hey $peName,<br> Your appointment for Dr. $docname is reschedule on $newdate at $time for $iss.";
        //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "$subject";
    $mail->Body    = "$body";

    $mail->send();
    ?>
    <script>
    location.replace("doctor.php");
    
        </script>
<?php
    }
    if(isset($_POST["reject"])){
        $comment = $_POST["comment"];
        $que = "delete from $tableName where id='$id'";
        $res = mysqli_query($con , $que);
        $subject ="Appointment Request is Declined";
        $body = "Hey $peName,<br> Your appointment for Dr. $docname is rejected. Doctor gives you special message $comment";
        //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "$subject";
    $mail->Body    = "$body";

    $mail->send();
    ?>
    <script>
    location.replace("doctor.php");
    
        </script>
<?php      
}

?>
    



</body>
</html>