<html>
    <head>
        <title>For Doctor</title>
        <script src="https://kit.fontawesome.com/50c045cb63.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
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
    </style>
    </head>
    <body>
    <?php
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