`<?php
    session_start();
    ?>
<!DOCTYPE html>
<html>

<head>
    <!-- <link rel="stylesheet" href="CSS/signup.css"> -->
    <link rel="font-family: sans-serif;">
</head>



<body>
    <style>
        .signup-box {

            width: 400px;
            height: 600px;
            margin: auto;
            background-color: gray;
            color: rgb(23, 20, 20);
            color: white;
            border-radius: 5px;
            border-radius: 20px;

        }

        .signup-box text {
            padding-right: 100px;
            text-align: center;
        }

        body {
            background: url("CSS/images/kra1.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-color: black;

        }

        .head {
            text-align: center;
            padding-top: 6px;
            margin-bottom: 5px;
        }

        form {
            width: 350px;
            margin-left: 30px;
        }

        form label {
            display: flex;
            margin-top: 10px;
            font-size: 18PX;
        }

        Form input {
            width: 100%;
            padding: 7px;
            border: 2px solid black;
            border: none;
            border-radius: 6PX;
            outline: none;
        }

        button {
            width: 150px;
            border-radius: 10px;
            height: 35px;
            margin: 14px 0 0 100px;
            border: none;
            background-color: rgb(102, 92, 145);
            color: white;
            font-size: 18px;

        }

        p {
            text-align: center;
            padding-top: 5px;
            font-size: 18px;

        }

        .para-2 {
            text-align: center;
            color: black;
            font-size: 13px;
            margin-top: -10px;
            padding: 10px;
        }

        .para-2 a {
            color: #941073;
        }

        .log {
            margin-top: -5px;
            color: black;
        }

        .log a {
            color: #941073;
        }

        h3 {

            letter-spacing: 0.1em;
            text-decoration: underline;
        }
    </style>
    <?php

    $server = "localhost";
    $username = "Lakpa";
    $password = "Sherpa@1123";
    $database = "signup";


    $connection = mysqli_connect("$server", "$username", "$password", "$database");



    if (!$connection) {
        die(mysqli_connect_error());
    }

    if (isset($_POST['submit'])) {
        $firstname = mysqli_real_escape_string($connection, $_POST['fname']);
        $lastname = mysqli_real_escape_string($connection, $_POST['lname']);
        $dateofbirth = mysqli_real_escape_string($connection, $_POST['DOB']);
        $Email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['Password']);

        $password = $_POST['Password'];
        $confirmPassword = $_POST['cpwd'];

        $enc_password = password_hash($password, PASSWORD_BCRYPT);
        $enc_cnfPassword = password_hash($confirmPassword, PASSWORD_BCRYPT);

        $emailquery = "SELECT * FROM registration WHERE email='$Email'";
        $query = mysqli_query($connection, $emailquery);

        $email_count = mysqli_num_rows($query);


        if ($email_count > 0) {

    ?>
            <script>
                alert("Email Already Exist");
            </script>
            <?php
        } else {
            if ($password === $confirmPassword) {

                $insertQuery = "INSERT INTO registration(`firstname`, `lastname`, `dob`, `email`, `password`, `confirmPassword`)VALUES('$firstname','$lastname','$dateofbirth','$Email','$enc_password','$enc_cnfPassword')";

                $iquery = mysqli_query($connection, $insertQuery);

                if ($iquery) {

            ?>
                    <script>
                        alert("Account Created Successfully");
                        location.replace("login.php");
                    </script>

                <?php

                }
            } else {
                ?>
                <script>
                    alert("Password Are not Matching");
                </script>
    <?php
            }
        }
    }

    ?>

    <div class="signup-box">
        <form action="Signup.php" method="POST" name="myForm" id="form">
            <h3 class="head">Sign Up</h3>
            <p>It's free and only takes a minute.</p>
            <label>First Name</label>
            <input type="text" name="fname" id='fname' placeholder="First name" required>
            <label>Last Name</label>
            <input type="text" name="lname" id="lname" placeholder="Last name" required>
            <label>Date of Birth</label>
            <input type="date" id="dob" name="DOB" required>
            <label onsubmit="">E-mail</label>
            <input type="E-mail" name="email" placeholder="E-mail" id="mail" required>
            <label>Password</label>
            <input type="Password" name="Password" id="pwd" placeholder="password" required>
            <label>Confirm Password</label>
            <input type="Password" name="cpwd" id="c_pwd" placeholder="Re-type password" required>
            <button type="submit" value="submit" name="submit">submit</button>
        </form>
        <p class="para-2">By clicking the sign Up button you agree to your <a href="">Terms and condition </a>and <a href="#">Policy.</a>
        <p class="log"> Already have an account? <a href="login.php">Login here</a></p>
    </div>
    <script>
        const form = document.getElementById('form');
        const email = document.getElementById('mail');
        const f_name = document.getElementById('fname')
        const l_name = document.getElementById('lname');
        const dob = document.getElementById('dob');
        const password = document.getElementById('pwd');
        const c_password = document.getElementById('c_pwd');
   
        function isValidUsername(email) {
            return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
        }

        function isValidName(name) {
            return /^([a-zA-Z' ]+)$/.test(name);
        }

        function CheckPassword(password) {
            return /^(?=.*?[0-9])(?=.*?[a-zA-Z]).{3,30}$/.test(password);
            // return /^[A-Za-z]\w{7,14}$/.test(password);
            
        }

        form.addEventListener('submit', function(event) {

            // event.preventDefault();
  
            const f_namevalue = f_name.value;
            const l_namevalue = l_name.value;
            const dobvalue = dob.value;
            const passwordvalue = password.value;
            const c_passwordvalue = c_password.value;
            const emailvalue = email.value;
            const dobvalue_in_string = dobvalue + " ";


            const date_obj = {
                Month: dobvalue.slice(5, 7),
                Day: dobvalue.slice(8, 10),
                Year: dobvalue.slice(0, 4)
            }

            const d = new Date();
            const year = d.getFullYear()
            const month = (d.getMonth() + 1);
            const day = d.getDate();

            let diff_month = date_obj.Month - month;
            let diff_day = date_obj.Day - day;
            let diff_year = year - date_obj.Year;

            if (!isValidName(f_namevalue)) {
                alert("Please enter a proper Name");
                event.preventDefault();
            }
            if (!isValidName(l_namevalue)) {
                alert("Please enter a proper Name");
                event.preventDefault();
            }
            if (!isValidUsername(emailvalue)) {
                alert("Not a valid Email Address");
                event.preventDefault();
            }

            if (year < date_obj.Year) {
                alert("Enter valid date.");
                event.preventDefault();
            } else if (year == date_obj.Year) {
                if (diff_month > 0) {
                    alert("Plz enter the month properly");
                    event.preventDefault();
                } else if (diff_month == 0) {
                    if (diff_day > 0) {
                        alert("Enter the day properly");
                        event.preventDefault();
                    }
                }
            } else if (year > date_obj.Year) {

                if (diff_year < 16) {
                    alert("Must be greater than 15");
                    event.preventDefault();
                }
            }

                if(!CheckPassword(passwordvalue)){
                    alert("Enter the strong password");
                    event.preventDefault();
                }
                
            });
    </script>
</body>

</html>