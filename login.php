  <?php
    session_start();
    ?>

  <!DOCTYPE html>
  <html>

  <head>
      <title>Login</title>
      <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
      <link rel="stylesheet" href="CSS/login.css">

  <body>

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
            $username = $_POST['uname'];
            $password = $_POST['password'];

            $email_search = "SELECT *FROM registration WHERE Email='$username' ";
            $query = mysqli_query($connection, $email_search);




            $email_count = mysqli_num_rows($query);


            if ($email_count >= 1) {

                $email_pass = mysqli_fetch_assoc($query);

                $dyc_pwd = $email_pass['Password'];

                $_SESSION['user'] = $email_pass['Firstname'];

                $password_check = password_verify($password, $dyc_pwd);

                if ($password_check == true) {

                    header("location:homepage.php");
                } else {
                    echo "<script>alert('Password Incorrect')</script>";
                }
            } else {
                echo "<script>alert('Invalid Email')</script>";
            }
        }

        ?>
      <div>


          <div class="container">
          <div class="nav">
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                  
              <h3>Login-form</h3>
                  <label for="uname"><b>Enter your Email</b></label>

                  <input type="text" placeholder="Enter your Email" name="uname" required>

                  <label for="psw"><b>Password</b></label>
                  <input type="password" placeholder="Enter Password" name="password" required>

                  <button type="submit" name="submit">Submit</button>
              </form>
              <div>
                  <div class="remember">
                      <input type="checkbox" id="check" name="remember"> Remember me
                  </div>
              </div><br>
              I don't have an account?<a href="signup.php">signup</a>
          </div>
  </body>

  </html>