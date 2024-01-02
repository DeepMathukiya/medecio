<html>
    <head><title>For Receptientist</title>
    <style>
        .header{
            display: flex;
            width:50vw;
  justify-content: center;
        }
        .header a{
            text-decoration:none;
            color:#3fbbc0;
            
        }
        .nurse{
            border-bottom:3px solid #3fbbc0;
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
.form__field:placeholder-shown ~ .form__label {
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
.form__field:focus ~ .form__label {
  position: absolute;
  top: 0;
  display: block;
  transition: 0.2s;
  font-size: 1rem;
  color: #11998e;
  font-weight: 700;
}

/* reset input */
.form__field:required, .form__field:invalid {
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
  overflow:hidden;
}


.wrapper{
  position: relative;
  width: 100%;
  height: 100%;
}

button{
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

button:hover{
  background: #3fbbc0;
  color: black;
}

button span{
  opacity: 1;
  visibility: visible;
  transition: all .35s;
}

.success{
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

.success svg{
  width: 20px;
  height: 20px;
  fill: yellowgreen;
  transform-origin: 50% 50%;
  transform: translateY(-50%) rotate(0deg) scale(0);
  transition: all .35s;
}

button.is_active{
  width: 40px;
  height: 40px;
}

button.is_active .success{
  opacity: 1;
  visibility: visible;
}

button.is_active .success svg{
  margin-top: 50%;
  transform: translateY(-50%) rotate(720deg) scale(1);
}

button.is_active span{
  opacity: 0;
  visibility: hidden;
}
.rec_submit_div{
  display:flex;
  justify-content:center;
}
.rec_submit{
  font-size:15px;
  width:150px;
  height:40px;
  margin-top: 50px;
  padding:5px 10px;
  border-radius:20px;
  background-color:white;
}
.rec_submit:hover{
background-image: linear-gradient(to right, aqua, #11998e);
}

    </style>
</head>
<body>
<div class="container">
        <div class="header"> <h3><a href="doctor.php">Doctor</a> / <a class="nurse" href="receipnist.php">Receptionist</a></h3>
        </div>
        
        <div class="form">
            <form action="" method ="POST">
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
  <input type="radio" class="form__field" placeholder="Name" value="FeMale" name="Gender" id='name'/>
  <label for="name" class="form__label">Female</label>
</div>
<div class="form__group field">
  <input type="text" class="form__field" placeholder="Name" name="PeNumber" id='name' required />
  <label for="name" class="form__label">Number</label>
</div>
            <div class="form__group field">
  <input type="text" class="form__field" placeholder="Name" name="PeEmail" id='name' required />
  <label for="name" class="form__label">Email</label>
</div>
            <div class="form__group field">
  <input type="text" class="form__field" placeholder="Name" name="PeIssue" id='name' required />
  <label for="name" class="form__label">Issue</label>
</div>
<div class="rec_submit_div">
<input class="rec_submit" type="submit" name= "submit" value="submit">
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
include "../connection.php";
if(isset($_POST['submit'])){
    $PeName =$_POST['PeName'];
    $PeAge = $_POST['PeAge'];
    $Gender = $_POST['Gender'];
    $PeEmail = $_POST['PeEmail'];
    $PeIssue = $_POST['PeIssue'];
    $PeNumber = $_POST['PeNumber'];
    $email = $_COOKIE['emailid'];
    
    $tableName = 'user_' . preg_replace("/[^a-zA-Z0-9]+/", "", $email);                  
    $insertQue = "insert into $tableName (PeName,PeAge,PeGender,PeEmail,PeIssue) values ('$PeName','$PeAge','$Gender','$PeEmail','$PeIssue')";
    $res = mysqli_query($con,$insertQue);
    if($res){
        ?>
        <script>
            location.replace("receipnist.php");
        </script>
        <?php
    }
}
?>
</body>

    </html>
