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

  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="Resources/silakbologo.png" type="image/x-icon" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <script
      src="https://kit.fontawesome.com/8a364c3095.js"
      crossorigin="anonymous"
    ></script>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Arsenal&family=Poiret+One&family=Rajdhani:wght@300&display=swap");
    </style>
    <link rel="stylesheet" type="text/css" href="Src/style.css" />
    <title>Login</title>
  </head>
  <body>
    <div
      class="container d-flex justify-content-center align-items-center min-vh-100"
    >
      <div class="row border rounded-5 p-3 bg-white shadow box-area">
        <div
          class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
          style="background: #35408e"
        >
          <div class="featured-image mb-3">
            <img
              src="Resources/NULOGO.webp"
              class="img-fluid"
              style="width: 250px"
            />
          </div>
        </div>
        <div class="col-md-6 right-box">
          <form method="post">
            <div class="row align-items-center">
              <div class="header-text mb-3">
                <h2>Sign Up</h2>
                <p>Weclome to Evaluation System</p>
              </div>
              <div class="input-group mb-3">
                <input
                  name="name"
                  type="text"
                  class="form-control form-control-lg bg-light fs-6"
                  placeholder="Full Name"
                  required
                />
              </div>
              <div class="input-group mb-3">
                <input
                  name="email"
                  type="text"
                  class="form-control form-control-lg bg-light fs-6"
                  placeholder="Email address"
                  required
                />
              </div>
              <div class="input-group mb-3">
                <input
                  name="password"
                  type="password"
                  class="form-control form-control-lg bg-light fs-6"
                  placeholder="Password"
                  required
                />
              </div>
              <div class="input-group mb-3">
                <input
                  name="cpassword"
                  type="password"
                  class="form-control form-control-lg bg-light fs-6"
                  placeholder="Confrirm Password"
                  required
                />
              </div>

              <div class="input-group mb-2 d-flex justify-content-between">
                <div class="form-check">
                  <input
                    type="checkbox"
                    class="form-check-input"
                    id="formCheck"
                  />
                  <label for="formCheck" class="form-check-label text-secondary"
                    ><small>Remember Me</small></label
                  >
                </div>
                <div class="forgot">
                  <small><a href="#">Forgot Password?</a></small>
                </div>
              </div>
              <div class="input-groups text-center">
              <?php
                    if(isset($message)){
                      foreach ($message as $message) {
                      echo'
                          <div class="alert alert-danger" role="alert text-center "  >
                          '.$message.'
                          </div>
                        ';
                      }
                    }
                ?>
              </div>
              <div class="input-group mb-3">
                <button
                  type="submit"
                  name="signup-btn"
                  class="btn btn-lg btn-primary w-100 fs-6"
                >
                  Login
                </button>
              </div>
              <div class="input-group mb-3"></div>
              <div class="row">
                <small
                  >Already have account? <a href="index.php">Sign In</a></small
                >
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="Src/main.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
