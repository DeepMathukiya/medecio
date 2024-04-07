<html>
    <head>
    <link rel="icon" href="../logo.png" type="image/icon">

        <title>Patient</title>
        <script src="https://kit.fontawesome.com/50c045cb63.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
    body {
  font-family: "Poppins", sans-serif;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  font-size: 1.5rem;
  overflow:hidden;
    }
    table{
        margin:40px ;
        align-self: center;
    }
    th{
        width: 100px;
        overflow: auto;
        
    }
    td{
        width: 100px;
        max-width: 200px;
        overflow: auto;
    }
    </style>
    </head>
    <body>
        <div class="mt-5 "><a href="appointment.php"><button type="button" class="btn btn-primary">Book Appointement</button></a></div>
    <?php
     if (!isset($_COOKIE['emailidp'])){
        ?>
<script>
    alert("Please Login First")
    location.replace("../patient_login.php");
</script>
        <?php
     }
    include "../connection.php";
    $email = $_COOKIE['emailidp'];
    $tableName = 'patient_' . preg_replace("/[^a-zA-Z0-9]+/", "", $email);
    $que = "select * from $tableName";
    $result = mysqli_query($con , $que);
    if($result->num_rows > 0 ){
        ?>
        <table>
    <th>Issue</th>
    <th>date</th>
    <th>DES</th>
    <th>Doctor Name</th>

<?php
while($arr = mysqli_fetch_array($result))
{
?>
<tr>
<td><?php echo $arr['Issue']?></td>
<td><?php echo $arr['date']?></td>
<td><?php echo $arr['DES']?></td>
<td><?php echo $arr['DoName']?></td>
</tr>
<?php
}
?>
        </table>
<?php
    }else{
        ?>
        <p> There is no data to show</p>
        
        <?php
    }




?>
    </body>