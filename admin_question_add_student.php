<?php
    include 'connection.php';
    session_start();
    $admin_id = $_SESSION['admin_name'];

    if (!isset($admin_id)){
        header('location:index.php');
    }

    if (isset($_POST['logout'])){
        session_destroy();
        header('location:index.php');
    }
    if(isset($_POST['add_question'])){
        $type = mysqli_real_escape_string($conn, $_POST['type']);
        $dept = mysqli_real_escape_string($conn, $_POST['dept']);
        $criteria = mysqli_real_escape_string($conn, $_POST['criteria']);
        $question = mysqli_real_escape_string($conn, $_POST['question']);
        $rate1 = mysqli_real_escape_string($conn, $_POST['rate1']);
        $rate2 = mysqli_real_escape_string($conn, $_POST['rate2']);
        $rate3 = mysqli_real_escape_string($conn, $_POST['rate3']);
        $rate4 = mysqli_real_escape_string($conn, $_POST['rate4']);
        $rate5 = mysqli_real_escape_string($conn, $_POST['rate5']);
        $insert_product = mysqli_query($conn, "INSERT INTO `evaluation` (`type`, `criteria`, `question`, `department`, `rate1`, `rate2`, `rate3` ,`rate4` ,`rate5`)
        VALUES ('$type', ' $criteria', '$question', '$dept', '$rate1', '$rate2', '$rate3', '$rate4', '$rate5')") or die ('query failed');
        header('location:admin_question_display.php');
    }
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="Resources/NULOGO.webp" type="image/x-icon" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NU | Evaluation</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="Src/style.css" />
  </head>
  <body>
    <div class="containers">
      <div class="navigation">
        <ul>
          <li>
            <a href="admin_home.php" class="icon">
              <img
                src="Resources/NULOGO.webp"
                width="60px"
                style="padding-top: 10px"
              />
              <span class="title"><?php echo $_SESSION['admin_name']; ?></span>
            </a>
          </li>
          <li>
            <a href="admin_home.php">
              <span class="icon">
                <ion-icon name="home-outline"></ion-icon>
              </span>
              <span class="title">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="admin_students.php">
              <span class="icon">
                <ion-icon name="people-outline"
                  ></ion-icon
                >
              </span>
              <span class="title">Students</span>
            </a>
          </li>
          <li>
            <a href="admin_participant.php">
              <span class="icon">
                <ion-icon name="person-outline"></ion-icon> 
                  </ion-icon
                >
              </span>
              <span class="title">Participant</span>
            </a>
          </li>
          <li>
            <a href="admin_questions.php">
              <span class="icon">
                <ion-icon name="chatbubble-outline"></ion-icon>
              </span>
              <span class="title">Questions</span>
            </a>
          </li>
          <li>
            <a href="admin_summary.php">
              <span class="icon">
                <ion-icon name="school-outline"></ion-icon>
              </span>
              <span class="title">Summary</span>
            </a>
          </li>
          <li>
            <a href="admin_setting.php">
              <span class="icon">
                <ion-icon name="lock-closed-outline"></ion-icon>
              </span>
              <span class="title">Admin</span>
            </a>
          </li>
          <li>
            <form method="post">
              <button href="index.php" name="logout" type="submit">
                <span class="icon">
                  <ion-icon name="log-out-outline"></ion-icon>
                </span>
                <span class="title">Logout</span>
              </button>
            </form>
          </li>
        </ul>
      </div>
      <div class="main">
        <div class="topbar">
          <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
          </div>
        </div>
        <div class="div-container student-div d-flex">
          <button class="btn" onclick="history.back()">
            <ion-icon name="caret-back-outline"></ion-icon>
          </button>
          <h3>Student Evaluation</h3>
        </div>
        <div class="div-container add-user-div">
          <form method="post">
            <input name="type" value="student" hidden>
            <div class="row">
                <div class="col-lg-6 col-sm-12 ">
                    <label for="type">Department: </label>
                    <select class="form-control" name="dept" id="dept" required>
                        <option value="SCS">SCS</option>
                        <option value="SABM">SABM</option>
                        <option value="SCS">SCS</option>
                        <option value="SAS">SAS</option>
                    </select>
                </div>
                <div class="col-lg-6 col-sm-12 ">
                    <label for="criteria">Criteria:</label>
                    <select class="form-control" name="criteria" id="dept" required>
                        <option value="mastery">Knowledge Mastery</option>
                        <option value="thinking">Critical Thinking</option>
                        <option value="collab">Collaboration</option>
                    </select>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <label for="question">Question: </label>
                    <textarea class="form-control" name="question" id="question" cols="30" rows="4" required></textarea>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <br>
                    <h5 >Rating Scale</h5>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <label for="pass">To a very great extent: </label>
                    <input
                    class="form-control"
                    type="number"
                    name="rate1"
                    id="rate1"
                    required
                    />
                </div>
                <div class="col-lg-12 col-sm-12">
                    <label for="pass">To a great extent: </label>
                    <input
                    class="form-control"
                    type="number"
                    name="rate2"
                    id="rate2"
                    required
                    />
                </div>
                <div class="col-lg-12 col-sm-12 ">
                    <label for="pass">To a satisfactory extent: </label>
                    <input
                    class="form-control"
                    type="number"
                    name="rate3"
                    id="rate3"
                    required
                    />
                </div>
                <div class="col-lg-12 col-sm-12">
                    <label for="pass">To a small extent: </label>
                    <input
                    class="form-control"
                    type="number"
                    name="rate4"
                    id="rate4"
                    required
                    />
                </div>
                <div class="col-lg-12 col-sm-12">
                    <label for="pass">Not at all: </label>
                    <input
                    class="form-control"
                    type="number"
                    name="rate5"
                    id="rate5"
                    required
                    />
                </div>
                <?php
                        if(isset($message)){
                        foreach ($message as $message) {
                        echo'
                            <div class="alert alert-danger" role="alert text-center  "  style=" margin-top: 20px" >
                            '.$message.'
                            </div>
                            ';
                        }
                        }
                    ?>
              <div class="text-center addstudent-btn">
                <button class="btn btn-outline-success" name="add_question">ADD QUESTION</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="Src/main.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>
