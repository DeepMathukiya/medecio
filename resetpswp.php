<!doctype html>
<html lang="en">
  <head>
  <link rel="icon" href="logo.png" type="image/icon">

    <title>Reset Password</title>
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
    <form action="" method="post">
      <div class="form_input">
        <div class="form-outline  mt-5">
          <input type="password" name="pass" id="" class="form-control" placeholder="new password" aria-describedby="helpId">
        </div></div>
        <div class="form_input">

        <div class="form-outline  mt-3">
          <input type="password" name="conpass" id="" class="form-control" placeholder="new password" aria-describedby="helpId">
        </div></div>
        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4 mt-5">
        <input type="submit"class="btn btn-primary btn-lg" value="ResetPassword" name = "submit">
        </div>
      </div>
    </form>   

<?php
include "connection.php";
$pass1 = $_GET['pass'];
  

if(isset($_POST['submit'])){
  $pass = $_POST['pass'];
  $conpass = $_POST['conpass'];
  $pass2 = mysqli_real_escape_string($con, $_POST['pass']);
  $cpass = password_hash($pass2, PASSWORD_BCRYPT);
  $que = "select * from registration_patient where pass = '$pass1'";
  $res = mysqli_query($con , $que);
  $noOfRow = mysqli_num_rows($res);
  if($noOfRow){
    if($pass = $conpass){
    $que1 = "update registration_patient set pass = '$cpass' where pass='$pass1'";
    $res2  = mysqli_query($con , $que1);
    ?>
    <script>
      alert("password reset successfully");
      location.replace("patient_login.php");
      </script>
    <?php
  }
  
    else{
?>

<script>alert("confirm password should be matched")
</script>
<?php
    }
  }
  else{
    ?>
<script>
  alert("don`t try to oversmart");
    location.replace("/");
</script>

<?php
  }
}




?>
</body>
</html>