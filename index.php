<?php
  include  'connection.php';
  session_start();
  if(isset($_POST['signup-btn'])){
    $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $name = mysqli_real_escape_string($conn, $filter_name);

    $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $email = mysqli_real_escape_string($conn, $filter_email);

    $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $password = mysqli_real_escape_string($conn, $filter_password);

    $filter_cpassword = filter_var($_POST['cpassword'], FILTER_SANITIZE_STRING);
    $cpassword = mysqli_real_escape_string($conn, $filter_cpassword);

    $select_user = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'") or die ('query failed');

    if(mysqli_num_rows($select_user)>0){
      $message[] = 'User Already Exist';

    }else{
      if ($password != $cpassword){
        $message[] = 'Wrong Password';
      }else{
        mysqli_query($conn, "INSERT INTO `user` (`name`, `email` , `password`) VALUES ('$name', '$email', '$password')") or die ('query failed');
        $message[] = 'Register Successfully';
      }
    }
  }

  if(isset($_POST['login-btn'])){
    
    $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $email = mysqli_real_escape_string($conn, $filter_email);

    $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $password = mysqli_real_escape_string($conn, $filter_password);

    $select_user = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email' AND password = '$password'") or die ('query failed');

    if(mysqli_num_rows($select_user)>0){
      $row = mysqli_fetch_assoc($select_user);
      if($row['user_type'] == 'admin') {
        $_SESSION['admin_name'] = $row['name'];
        $_SESSION['admin_email'] = $row['email'];
        $_SESSION['admin_id'] = $row['id'];
        $id = $_SESSION['id'];
        header('location:admin_pannel.php');

      }else if($row['user_type'] == 'user') {
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_id'] = $row['id'];
        header('location:student_home.php');
        
      }
    }
    else{
      $message[]= 'Incorrect email or password';
    }   
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
  </head>
  <body>
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script
          src="https://kit.fontawesome.com/64d58efce2.js"
          crossorigin="anonymous"
        ></script>
        <link rel="stylesheet" href="style.css" />
        <title>Sign in & Sign up Form</title>
      </head>
      <body class="login-body">
        <div class="container">
          <div class="forms-container">
            <div class="signin-signup">
              <form class="sign-in-form" method="post">
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                  <i class="fas fa-user"></i>
                  <input name="email" type="email" placeholder="Email" required />
                </div>
                <div class="input-field">
                  <i class="fas fa-lock"></i>
                  <input name="password" type="password" placeholder="Password" />
                </div>
                <input type="submit" value="Login" name="login-btn" class="btn solid" />
                <p class="social-text">Or Sign in with social platforms</p>
                <div class="social-media">
                  <a href="#" class="social-icon">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                  <a href="#" class="social-icon">
                    <i class="fab fa-google"></i>
                  </a>
                  <a href="#" class="social-icon">
                    <i class="fa fa-phone"></i>
                  </a>
                </div>
              </form>
              <form class="sign-up-form" method="post">
                <h2 class="title">Sign up</h2>
                <div class="input-field">
                  <i class="fas fa-user"></i>
                  <input type="text" name="name" placeholder="Name" />
                </div>
                <div class="input-field">
                  <i class="fas fa-envelope"></i>
                  <input type="email" name="email" placeholder="Email" />
                </div>
                <div class="input-field">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="password" placeholder="Password" />
                </div>
                <div class="input-field">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="cpassword" placeholder="Confirm Password" />
                </div>
                
                <input type="submit" class="btn" name="signup-btn" value="Sign up" />
                <p class="social-text">Or Sign up with social platforms</p>
                <div class="social-media">
                  <a href="#" class="social-icon">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                  <a href="#" class="social-icon">
                    <i class="fab fa-twitter"></i>
                  </a>
                  <a href="#" class="social-icon">
                    <i class="fa fa-phone"></i>
                  </a>
                </div>
              </form>
            </div>
          </div>

          <div class="panels-container">
            <div class="panel left-panel">
              <div class="content">
                <h3>New here ?</h3>
                <p>
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                  Debitis, ex ratione. Aliquid!
                </p>
                <button class="btn transparent" id="sign-up-btn">
                  Sign up
                </button>
              </div>
              <img src="img/log.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
              <div class="content">
                <h3>One of us ?</h3>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Nostrum laboriosam ad deleniti.
                </p>
                <button class="btn transparent" id="sign-in-btn">
                  Sign in
                </button>
              </div>
              <img src="img/register.svg" class="image" alt="" />
            </div>
          </div>
        </div>
        <script src="main.js"></script>
      </body>
    </html>
  </body>
</html>
