<html>
    <head>
    <link rel="icon" href="../logo.png" type="image/icon">

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
        .header{
            display: flex;
  justify-content: center;
        }
        .header a{
            text-decoration:none;
            color:#3fbbc0;
            
        }
        .nurse{
            border-bottom:3px solid #3fbbc0;
        }
        .table{
            margin-top:50px;
            
        }


        .search{
  position: relative;
  
}
.searchbox:focus{
  border-color: #66afe9;
  outline: 0;
  width: 300px;
  -webkit-transition: width 0.2s ease-in 0.2s;
          transition: width 0.2s ease-in 0.2s;
}
.searchbox{
  -webkit-transition: width 0.2s ease-in 0.2s;
          transition: width 0.2s ease-in 0.2s;
  position: relative;
  width: 200px;
  height: 30px;
  float: right;
  margin:0;
  padding: 0 35px 0 20px;
  border-radius: 20px;
  border: 1px solid #3fbbc0;
  background-color: #fff;
  background-image: none;
 margin-right: 82px;
  color: #555;
}
.search-btn-wrap{

  position: absolute;
  right: 0;
}

.search-btn{
  cursor: pointer;
  font-size: 16px;
  margin-top: 2px;
  margin-right: 2px;
  z-index: 3;
  height: 26px;
  width: 30px;
  border: 0;
  margin-bottom: 0;
  color: #3fbbc0;
  background: transparent;
}
.search_icon:hover{
cursor: pointer;
}
.table-c{

}
</style>
    </head>
    <body>
    <?php
    session_start();
    ?>
        <div class="container">
        <div class="header"> <h3><a class="nurse" href="doctor.php">Doctor</a> / <a  href="receipnist.php">Receptionist</a></h3>
        </div>
        </div>
        <div class="searchbar">
            <form action="" method="POST">
            <div class="search">

    <input type="text" class="searchbox" name="PeEmail" placeholder="Search..">
    <span class="search-btn-wrap">
    <span class="material-symbols-outlined search_icon" id="search_icon" style="
    margin-top: 2px;
    margin-right: 5px;
">search</span>
    <input class="search-btn fas fa-search" id="search_submit" type="submit" name="submit">
      </span>
  </form>
  <br>
  <script>
    let search_icon=document.getElementById("search_icon") 
    let search_submit=document.getElementById("search_submit") 
    search_submit.style.display="none"
    search_icon.addEventListener("click",()=>{
      search_submit.click()
    })
    
    </script>
</div>
            <!-- <table class="table">
                <tr>
                    <th class="pname">Patient Name</th>
                    <th class="pissue">Patient Issue</th>
                    <th class="pissue">Patient Issue</th>
                </tr>
                  -->
            <?php
            include '../connection.php';
            session_start(); 
            if (!isset($_SESSION['emailid'])){
              ?>
<script>
  alert("Please login first");
  location.replace("../doctor_login.php")
</script>
<?php
            }
            if(isset($_POST['submit'])){
            $PeEmail =$_POST['PeEmail'];
            $email = $_SESSION['emailid'];      
            $tableName = 'user_' . preg_replace("/[^a-zA-Z0-9]+/", "", $email);
            $que = "select * from $tableName where PeEmail LIKE '%".$PeEmail."%' or PeName LIKE '%".$PeEmail."% '";
            // $que = "select * from $tableName where PeEmail = '$PeEmail'";
            $query = mysqli_query($con , $que);
            $query2 = mysqli_query($con , $que);
            if($res = mysqli_fetch_array($query2)){
              ?>
              <div class="table-c">
              <table class="table">
                              <tr>
                                  <th class="pname">Patient Name</th>
                                  <th class="pissue">Patient Issue</th>
                                  <th class="pissue">Date</th>

                                  <th> </th>
                              </tr>
                        
                            <?php
           while( $res = mysqli_fetch_array($query)){
            ?> 
    <tr>
    <td><?php echo $res['PeName'];?> </td>
    <td><?php echo $res['PeIssue'];?></td>    
    <td><?php   $date = $res['date']; 
                echo date("d M y" , strtotime($date));
    ?></td>    
    <td style="height: 100px;"><a href="form.php?id=<?php echo $res['id'];?>" data-toggle="tooltip" data-placement="Bottom" title="Update">
<svg xmlns="http://www.w3.org/2000/svg" style ="height:20px ; width :20px;"viewBox="0 0 576 512"><path d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"/>
</svg></a></td>
</tr> 
                       


            <?php
           }
           ?>
              </table>
           <?php
          }
          else{
            ?>
          
            <script>
              alert("please insert this email Patient First");
            </script>
            <?php

          }
            }
            ?>

        </div>
        </div>
    </body>

</html>