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
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <form action="" method="post">
        <div class="form-group">
          <input type="text" name="pass" id="" class="form-control" placeholder="new password" aria-describedby="helpId">
        </div>
        <div class="form-group">
          <input type="text" name="conpass" id="" class="form-control" placeholder="new password" aria-describedby="helpId">
        </div>
        <input type="submit" value="ResetPassword" name = "submit">
    </form>   

<?php
include "connection.php";
$pass1 = $_GET['pass'];
if ($pass1 =null){
?>
<script>
  alert("don`t try to oversmart");
    location.replace("/");
</script>

<?php
}
else{
if(isset($_POST['submit'])){
  $pass = $_POST['pass'];
  $conpass = $_POST['conpass'];
  $que = "select * from registration where pass = $pass1";
  $res = mysqli_query($con , $que);
  $noOfRow = mysqli_num_rows($res);
  if($noOfRow){
    if($pass = $conpass){
    $que1 = "update registration set pass = $pass where pass = $pass1";
    $res2  = mysqli_query($con , $que1);
    }
    else{
?>
<script>alert();</script>
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



}
?>
</body>
</html>