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
          <h3>Questions</h3>
        </div>

        <div class="view-student-div div-containers ">
            <h3>Professor Evalutaion</h3>
          <table class=" table-bordered table">
            <thead >
              <tr >
                <th>Category 1</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $select_question = mysqli_query($conn, "SELECT * FROM `evaluation` WHERE type = 'professor' AND criteria = ' LEARNING PROCESS'") or die ('query failed');
              if(mysqli_num_rows($select_question)>0){
                while($fetch_question = mysqli_fetch_assoc($select_question)){
            ?>
            <tr>
                <td><?php echo $fetch_question['question'] ?></td>
                
              </tr>
            <?php 
              }
                  }else{
                      echo '
                          <td>No Question Added</td>
                      ';  
                  }
              ?> 
            </tbody>
            <thead>
                <tr>
                    <th>Category 2</th>
                </tr>
            </thead>
            <tbody>
            <?php 
              $select_question = mysqli_query($conn, "SELECT * FROM `evaluation` WHERE type = 'professor' AND criteria = 'ASSESSMENT'") or die ('query failed');
              if(mysqli_num_rows($select_question)>0){
                while($fetch_question = mysqli_fetch_assoc($select_question)){
            ?>
            <tr>
                <td><?php echo $fetch_question['question'] ?></td>
                
              </tr>
            <?php 
              }
                  }else{
                      echo '
                          <td>No Question Added</td>
                      ';  
                  }
              ?> 
            </tbody>
            <thead>
                <tr>
                    <th>Category 3</th>
                </tr>
            </thead>
            <tbody>
            <?php 
              $select_question = mysqli_query($conn, "SELECT * FROM `evaluation` WHERE type = 'professor' AND criteria = 'TEACHER QUALITIES'") or die ('query failed');
              if(mysqli_num_rows($select_question)>0){
                while($fetch_question = mysqli_fetch_assoc($select_question)){
            ?>
            <tr>
                <td><?php echo $fetch_question['question'] ?></td>
                
              </tr>
            <?php 
              }
                  }else{
                      echo '
                          <td>No Question Added</td>
                      ';  
                  }
              ?> 
            </tbody>
          </table>
        </div>


        <div class="view-student-div div-containers ">
            <h3>Program Evaluation</h3>
          <table class=" table-bordered table">
            <thead >
              <tr >
                <th>Learning Process</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $select_question = mysqli_query($conn, "SELECT * FROM `evaluation` WHERE type = 'program' AND criteria = ' LEARNING PROCESS'") or die ('query failed');
              if(mysqli_num_rows($select_question)>0){
                while($fetch_question = mysqli_fetch_assoc($select_question)){
            ?>
            <tr>
                <td><?php echo $fetch_question['question'] ?></td>
                
              </tr>
            <?php 
              }
                  }else{
                      echo '
                          <td>No Question Added</td>
                      ';  
                  }
              ?> 
            </tbody>
            <thead>
                <tr>
                    <th>Student Assessment</th>
                </tr>
            </thead>
            <tbody>
            <?php 
              $select_question = mysqli_query($conn, "SELECT * FROM `evaluation` WHERE type = 'program' AND criteria = 'ASSESSMENT'") or die ('query failed');
              if(mysqli_num_rows($select_question)>0){
                while($fetch_question = mysqli_fetch_assoc($select_question)){
            ?>
            <tr>
                <td><?php echo $fetch_question['question'] ?></td>
                
              </tr>
            <?php 
              }
                  }else{
                      echo '
                          <td>No Question Added</td>
                      ';  
                  }
              ?> 
            </tbody>
            <thead>
                <tr>
                    <th>Teacher Qualities</th>
                </tr>
            </thead>
            <tbody>
            <?php 
              $select_question = mysqli_query($conn, "SELECT * FROM `evaluation` WHERE type = 'program' AND criteria = 'TEACHER QUALITIES'") or die ('query failed');
              if(mysqli_num_rows($select_question)>0){
                while($fetch_question = mysqli_fetch_assoc($select_question)){
            ?>
            <tr>
                <td><?php echo $fetch_question['question'] ?></td>
                
              </tr>
            <?php 
              }
                  }else{
                      echo '
                          <td>No Question Added</td>
                      ';  
                  }
              ?> 
            </tbody>
          </table>
        </div>

        <div class="view-student-div div-containers ">
            <h3>Facility Evalutaion</h3>
          <table class=" table-bordered table">
            <thead >
              <tr >
                <th>Category 1</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $select_question = mysqli_query($conn, "SELECT * FROM `evaluation` WHERE type = 'facility' AND criteria = ' LEARNING PROCESS'") or die ('query failed');
              if(mysqli_num_rows($select_question)>0){
                while($fetch_question = mysqli_fetch_assoc($select_question)){
            ?>
            <tr>
                <td><?php echo $fetch_question['question'] ?></td>
                
              </tr>
            <?php 
              }
                  }else{
                      echo '
                          <td>No Question Added</td>
                      ';  
                  }
              ?> 
            </tbody>
            <thead>
                <tr>
                    <th>Category 2</th>
                </tr>
            </thead>
            <tbody>
            <?php 
              $select_question = mysqli_query($conn, "SELECT * FROM `evaluation` WHERE type = 'facility' AND criteria = 'ASSESSMENT'") or die ('query failed');
              if(mysqli_num_rows($select_question)>0){
                while($fetch_question = mysqli_fetch_assoc($select_question)){
            ?>
            <tr>
                <td><?php echo $fetch_question['question'] ?></td>
                
              </tr>
            <?php 
              }
                  }else{
                      echo '
                          <td>No Question Added</td>
                      ';  
                  }
              ?> 
            </tbody>
            <thead>
                <tr>
                    <th>Category 3</th>
                </tr>
            </thead>
            <tbody>
            <?php 
              $select_question = mysqli_query($conn, "SELECT * FROM `evaluation` WHERE type = 'facility' AND criteria = 'TEACHER QUALITIES'") or die ('query failed');
              if(mysqli_num_rows($select_question)>0){
                while($fetch_question = mysqli_fetch_assoc($select_question)){
            ?>
            <tr>
                <td><?php echo $fetch_question['question'] ?></td>
                
              </tr>
            <?php 
              }
                  }else{
                      echo '
                          <td>No Question Added</td>
                      ';  
                  }
              ?> 
            </tbody>
          </table>
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
