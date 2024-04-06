<html>

<head>
  <link rel="icon" href="../logo.png" type="image/icon">

  <title>Booking Appointment</title>
  <style>
    .header {
      display: flex;
      width: 50vw;
      justify-content: center;
    }

    .header a {
      text-decoration: none;
      color: #3fbbc0;

    }

    .nurse {
      border-bottom: 3px solid #3fbbc0;
    }

    .form__group {
      position: relative;
      padding: 15px 0 0;
      margin-top: 10px;
      width: 100%;
    }

    .form__field {
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

    .form__field::placeholder {
      color: transparent;
    }

    .form__field:placeholder-shown~.form__label {
      font-size: 1.3rem;
      cursor: text;
      top: 20px;
    }

    .form__label {
      position: absolute;
      top: 0;
      display: block;
      transition: 0.2s;
      font-size: 1rem;
      color: #9b9b9b;
    }

    .form__field:focus {
      padding-bottom: 6px;
      font-weight: 700;
      border-width: 3px;
      border-image: linear-gradient(to right, #11998e, #38ef7d);
      border-image-slice: 1;
    }

    .form__field:focus~.form__label {
      position: absolute;
      top: 0;
      display: block;
      transition: 0.2s;
      font-size: 1rem;
      color: #11998e;
      font-weight: 700;
    }

    /* reset input */
    .form__field:required,
    .form__field:invalid {
      box-shadow: none;
    }

    /* demo */
    body {
      font-family: "Poppins", sans-serif;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      font-size: 1.5rem;
      overflow: hidden;
    }


    .wrapper {
      position: relative;
      width: 100%;
      height: 100%;
    }

    button {
      font-family: 'Ubuntu', sans-serif;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);

      width: 170px;
      height: 40px;
      line-height: 1;
      font-size: 18px;
      font-weight: bold;
      letter-spacing: 1px;
      border: 3px solid #3fbbc0;
      background: #fff;
      color: black;
      border-radius: 40px;
      cursor: pointer;
      overflow: hidden;
      transition: all .35s;
    }

    button:hover {
      background: #3fbbc0;
      color: black;
    }

    button span {
      opacity: 1;
      visibility: visible;
      transition: all .35s;
    }

    .success {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: black;
      border-radius: 50%;
      z-index: 1;
      opacity: 0;
      visibility: hidden;
      transition: all .35s;
    }

    .success svg {
      width: 20px;
      height: 20px;
      fill: yellowgreen;
      transform-origin: 50% 50%;
      transform: translateY(-50%) rotate(0deg) scale(0);
      transition: all .35s;
    }

    button.is_active {
      width: 40px;
      height: 40px;
    }

    button.is_active .success {
      opacity: 1;
      visibility: visible;
    }

    button.is_active .success svg {
      margin-top: 50%;
      transform: translateY(-50%) rotate(720deg) scale(1);
    }

    button.is_active span {
      opacity: 0;
      visibility: hidden;
    }

    .rec_submit_div {
      display: flex;
      justify-content: center;
    }

    .rec_submit {
      font-size: 15px;
      width: 150px;
      height: 40px;
      margin-top: 50px;
      padding: 5px 10px;
      border-radius: 20px;
      background-color: white;
    }

    .rec_submit:hover {
      background-image: linear-gradient(to right, aqua, #11998e);
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="header">
    </div>

    <div class="form" style="margin-top:50px;">
      <form action="" method="POST">
        <div class="form__group field">
          <input type="text" class="form__field" placeholder="Name" name="PeName" id='name' required />
          <label for="name" class="form__label">Name</label>
        </div>
        <div class="form__group field">
          <input type="number" class="form__field" placeholder="Name" name="PeAge" id='name' required />
          <label for="name" class="form__label">Age</label>
        </div>
        <div class="form__group field">
          <input type="radio" class="form__field" placeholder="Name" value="Male" name="Gender" id='name' checked />
          <label for="name" class="form__label">Male</label>
        </div>
        <div class="form__group field">
          <input type="radio" class="form__field" placeholder="Name" value="FeMale" name="Gender" id='name' />
          <label for="name" class="form__label">Female</label>
        </div>
        <div class="form__group field">
          <input type="text" class="form__field" placeholder="Name" name="PeNumber" id='name' required />
          <label for="name" class="form__label">Number</label>
        </div>
        <div class="form__group field">
          <input type="email" class="form__field" placeholder="Name" name="PeEmail" id='name' required />
          <label for="name" class="form__label">Email</label>
        </div>
        <div class="form__group field">
          <input type="text" class="form__field" placeholder="Name" name="PeIssue" id='name' required />
          <label for="name" class="form__label">Issue</label>
        </div>

        <div class="form__group field">
          <input type="date" class="form__field" placeholder="Name" name="date" id='name' required />
          <label for="name" class="form__label">Date</label>
        </div>
        <div class="form__group field">
          <input type="time" class="form__field" placeholder="Name" name="time" id='name' required />
          <label for="name" class="form__label">Time</label>
        </div>
        <div class="rec_submit_div">
          <input class="rec_submit" type="submit" name="submit" value="submit">
        </div>
        <script>
          let btn = document.querySelector("button");

          btn.addEventListener("click", active);

          function active() {
            btn.classList.toggle("is_active");
          }
        </script>


        <!-- <input type="text" name="PeName">
                <input type="number" name="PeAge" >
                <input type="radio" name="Gender" value="male">
                <input type="radio" name="Gender" value="Female">
                <input type="text" name="PeEmail">
                <input type="text" name="PeIssue">
                <input type="submit" name= "submit" value="submit"> -->

      </form>
    </div>
    <?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '..\phpMailer\Exception.php';
    require '..\phpMailer\PHPMailer.php';
    require '..\phpMailer\SMTP.php';


    include "../connection.php";
    if (isset($_POST['submit'])) {
      $docid = $_GET['docid'];
      $PeName = $_POST['PeName'];
      $PeAge = $_POST['PeAge'];
      $Gender = $_POST['Gender'];
      $PeEmail = $_POST['PeEmail'];
      $PeIssue = $_POST['PeIssue'];
      $PeNumber = $_POST['PeNumber'];
      $date = $_POST['date'];
      $time = $_POST['time'];


      $tableName = 'patient_' . preg_replace("/[^a-zA-Z0-9]+/", "", $PeEmail);
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
      
      $que2 = "select * from registration where id=$docid";
      $res2 = mysqli_query($con, $que2);
      $row = mysqli_fetch_assoc($res2);
      $DoName = $row['name'];
      $email = $row['email'];
      $DoNumber = $row['number'];

      $insert = "insert into $tableName (DoName,DoEmail,DoNumber,Issue,date) values('$DoName','$email','$DoNumber', '$PeIssue','$date')";
      $result3 = mysqli_query($con, $insert);
   
      $tableName2 = 'user_' . preg_replace("/[^a-zA-Z0-9]+/", "", $email);                  
      
      $insertQue = "insert into $tableName2 (PeName,PeAge,PeGender,PeEmail,PeIssue,PeNumber,date) values ('$PeName','$PeAge','$Gender','$PeEmail','$PeIssue','$PeNumber','$date')";
    $res = mysqli_query($con,$insertQue);

      $id =  "Select * from $tableName2 where PeEmail='$PeEmail' and date='$date'";
      $res3= mysqli_query($con,$id);
    $row2 = mysqli_fetch_assoc($res3);
    $res5 = $row2['id'];
      $bodyt="Hey Doctor,<br>$DoName

      <p> Here is a request for an appointment from <b>$PeName</b> , on <b>$date</b> at <b>$time</b> for <b>$PeIssue</b>.
      <br>
             <a href='http://localhost/medecio/Doctor/BookStatus.php?id=$res5&tbl=$tableName2&btn=y'>
            <button style='color: green; background-color: white; border: 2px solid black;'>  &#10004; Accept</Button></a>
                <a href='http://localhost/medecio/Doctor/BookStatus.php?id=$res5&tbl=$tableName2&btn=n'>
<Button style='color: red; background-color: white; border: 2px solid black;'>&#10060; Reject</Button></a>";
    
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
            
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "Book Appointment on ". $date . " at " . $time ."by " . $PeName;
            $mail->Body    = "$bodyt";
        
            $mail->send();

          } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        
      }
      ?>
<script>
alert("You will get a mail fot the status of a Appointement");
location.replace("../index.php");
</script><?php
    }
    ?>
</body>

</html>