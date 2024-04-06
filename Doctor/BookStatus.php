<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    if(isset($_GET['id'] , $_GET['docm'] , $_GET['btn'])){
        $id = $_GET['id'];
        $docm = $_GET['docm'];
        $btn = $_GET['btn'];
        include 'connection.php';
        $tableName = 'user_' . preg_replace("/[^a-zA-Z0-9]+/", "", $docm);                  

        $que = "select * from registration where email='$docm'";
        $res = mysqli_query($con , $que);
        $arr = mysqli_fetch_array($res);
        $docname = $arr['name'];
        
        $que2 = "select * from $tableName where id='$id'";
        $res2 = mysqli_query($con , $que2);
        $arr2 = mysqli_fetch_array($res2);
        $peName = $arr2['PeName'];
        $date = $arr2['date'];
        $iss = $arr2['$PeIssue'];
        if($btn == 'y'){
            $subject= "Appointment Confirmed at $docname";
            $body = "Hey $peName,<br> Your appointment for Dr. $docname is confirmed on $date at specefied time for $iss.  ";
        }

        else{
            
        }




        $query = "UPDATE $tbl SET status = '$btn' WHERE id = $id";
        $data = mysqli_query($con , $query);
       

    }
    
    ?>




</body>
</html>