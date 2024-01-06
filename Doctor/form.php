<html>

<head>
    <title>For Receptientist</title>
    <script src="https://kit.fontawesome.com/50c045cb63.js" crossorigin="anonymous"></script>
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
        }


        .wrapper {
            position: relative;
            margin-top: 100px;
            margin-bottom: 200px;
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

        .vcbtn {
            display: flex;
            justify-content: center;
            transition: display 0.5s linear;
            margin-top: 10px;

        }

        .done {
            display: flex;
            border: 3px solid #3fbbc0;
            width: fit-content;
            padding: 10px 30px;
            border-radius: 20px;
            transition: background-color 0.3s linear;
        }

        .done:hover {
            cursor: pointer;
            background-color: #3fbbc0;
        }

        #stop1,
        #stop2 {
            display: none;
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

        .vcbtn {
            display: flex;
            justify-content: center;
            transition: display 0.5s linear;
            margin-top: 10px;
            position: absolute;
            margin-left: 100px;
            margin-top: -30px;

        }

        .done {
            display: flex;
            border: 3px solid #3fbbc0;
            width: fit-content;
            padding: 10px 30px;
            border-radius: 20px;
            transition: background-color 0.3s linear;
        }

        .done:hover {
            cursor: pointer;
            background-color: #3fbbc0;
        }

        #stop1,
        #stop2 {
            display: none;
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

        .extra {
            height: 50px;
        }

        .change {
            top: -30;
        }

        #popupBox {
            position: fixed;
            top: 0;
            left: center;
            width: 25vw;
            height: 25vw;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 2em;
            background-color: #3fbbc0;
        }
    </style>
</head>

<body>


    <?php



    include '../connection.php';
    $ids = $_GET['id'];
    $email = $_COOKIE['emailid'];
    $tableName = 'user_' . preg_replace("/[^a-zA-Z0-9]+/", "", $email);
    $showqu = "select * from $tableName where id={$ids}";
    $showdat = mysqli_query($con, $showqu);
    $arr = mysqli_fetch_array($showdat);



    ?>
    <div class="container">
        <div class="header">
            <h3><a href="doctor.php">Patient Update</a></h3>
        </div>

        <div class="form">
            <form action="" method="POST">
                <div class="form__group field">
                    <input type="text" class="form__field" placeholder="Name" name="PeName" id='name' value="<?php echo $arr['PeName']; ?>" required />
                    <label for="name" class="form__label">Name</label>
                </div>
                <div class="form__group field">
                    <input type="number" class="form__field" placeholder="Name" name="PeAge" id='name' value="<?php echo $arr['PeAge']; ?>" required />
                    <label for="name" class="form__label">Age</label>
                </div>
                <div class="form__group field">
                    <input type="text" class="form__field" placeholder="Name" name="PeEmail" id='name' value="<?php echo $arr['PeEmail']; ?>" required />
                    <label for="name" class="form__label">Email</label>
                </div>
                <div class="form__group field">
                    <input type="text" class="form__field" placeholder="Name" name="PeIssue" id='name' value="<?php echo $arr['PeIssue']; ?>" required />
                    <label for="name" class="form__label">Issue</label>
                </div>
                <div class="extra"></div>
                <!-------------- This section ------------>
                <div class="vcbtn">
                    <div title="click to start recording" class="done" id="start1"><i class="fa-solid fa-play" style="color: #000000;"></i></div>
                    <div title="click to stop recording" class="done" id="stop1"><i class="fa-solid fa-stop" style="color: #000000;"></i></div>
                </div>
                <!-- ---------------------------------- -->
                <div class="form__group field">
                    <textarea class="form__field" name="PeDES" id="Description" cols="30" rows="10"></textarea>
                    <label for="name" class="form__label change">Description</label>

                </div>
                <div class="extra"></div>
                <!------------ This section --------------->
                <div class="vcbtn">
                    <div title="click to start recording" class="done" id="start2"><i class="fa-solid fa-play" style="color: #000000;"></i></div>
                    <div title="click to stop recording" class="done" id="stop2"><i class="fa-solid fa-pause" style="color: #000000;"></i></div>
                </div>
                <!-- ----------------------------------- -->
                <div class="form__group field">
                    <textarea class="form__field" name="Pecare" id="Advice" cols="30" rows="10"></textarea>

                    <label for="name" class="form__label change">Advice</label>


                </div>
                <div class="rec_submit_div">
                    <input class="rec_submit" type="submit" name="submit" value="submit" id="submitbtn">
                </div>
            </form>


            <div id="popupBox" style="display: none;">
                <div class="form-check">
                    <form action="" method="post">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="checkboxpop" id="checkboxpop" value="1">
                            Enter the pharmaciest
                        </label>

                        <div class="form-group" id="emailFieldpopup" style="display: none;">
                            <label for="">Mail of pharmaciest</label>
                            <input type="email" name="pmail" id="mail" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <input type="submit" name="submitBtnpop" id="submitBtnpop" value="Done" class="btn btn-primary">


                    </form>





                    <?php
                    include "../connection.php";

                    if (isset($_POST['submit'])) {
                        $id = $_GET['id'];
                        $PeName = $_POST['PeName'];
                        $PeAge = $_POST['PeAge'];
                        $PeEmail = $_POST['PeEmail'];
                        $PeIssue = $_POST['PeIssue'];
                        $PeDES = $_POST['PeDES'];
                        $Pecare = $_POST['Pecare'];
                        $email = $_COOKIE['emailid'];
                        $tableName = 'user_' . preg_replace("/[^a-zA-Z0-9]+/", "", $email);
                        $updateque = " update $tableName set PeName='$PeName',PeAge='$PeAge',
    PeEmail='$PeEmail',PeIssue='$PeIssue' ,PeDES='$PeDES' ,Pecare='$Pecare' where id = $id ";
                        $res = mysqli_query($con, $updateque);
                        if ($res) {
                    ?>
                            <script>
                                document.getElementById('popupBox').style.display = 'flex';
                            </script>
                        <?php

                        }
                    }

                    if (isset($_POST['submitBtnpop'])) {
                        if ($_POST['checkboxpop'] == "1") {
                            $mails = $_POST['pmail'];
                            ?>
<script>
    location.replace("mail.php?mail=<?php echo $mails;?>&id=<?php echo $ids;?>");
</script>

                            <?php
                            header("Location:mail.php/?mail=$mails/?id=$id");
                        } else {
                        ?>
                            <script>
                                location.replace("doctor.php");
                            </script>
                    <?php
                        }
                    }


                    ?>
                </div>
            </div>

</body>
<script src="speech.js"></script>
<script>
    document.getElementById('checkboxpop').addEventListener('change', function() {
        var emailField = document.getElementById('emailFieldpopup');
        var submit = document.getElementById('submitBtnpop');

        if (this.checked) {
            emailField.style.display = 'block';
            submit.value = 'Mail to Pharmaciest';

        } else {
            emailField.style.display = 'none';
            submit.value = 'Done';

        }
    });
</script>

</html>