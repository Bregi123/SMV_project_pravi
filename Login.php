<?php

include 'database.php';

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'])
{
  if ($_SESSION['user_type'] == "admin") {
    header("Location: admin.php");
    exit();
} elseif ($_SESSION['user_type']  == "teacher") {
    header("Location: teacher.php");
    exit();
} elseif ($_SESSION['user_type'] == "student") {
  header("Location: student.php");
  exit();
}
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email = stripcslashes($email);
        $password = stripcslashes($password);
        $email = mysqli_real_escape_string($link, $email);
        $password = mysqli_real_escape_string($link, $password);

        $sql = "SELECT * FROM login WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($link, $sql);
        $_SESSION['logged_in'] = true;
        
        if ($result) {
            $count = mysqli_num_rows($result);
            if ($count == 1) {
                $row = mysqli_fetch_assoc($result);
                $user_type = $row["user_type"];
                $_SESSION['user_type'] = $row["user_type"];
                $_SESSION['user_id'] = $row['id_login'];
                if ($user_type == "admin") {
                    header("Location: admin.php");
                    exit();
                } elseif ($user_type == "teacher") {
                    header("Location: teacher.php");
                    exit();
                } elseif ($user_type == "student") {
                  header("Location: student.php");
                  exit();
              }
                
            } else {
                // The user is not logged in
                // You can redirect them to a login page or show a message
                echo "Please log in to access this page.";
            }
        } else {
            echo "Query failed: " . mysqli_error($link);
        }
    } else {
        echo "Email and password not provided.";
    }
}

?>

<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

<head>
  <link rel="stylesheet" href="Css.css">
</head>

<body>
  <div class="container1">
    <div class="dropdown">
      <button class="dropbtn">Menu</button>
      <div class="dropdown-content">
        <a href="Home_page.php">Home</a>
        <a href="info.html">Info</a>
      </div>
    </div>
    <div style="margin-top: 100px; text-align: center;">
      <form method="POST">
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
            <input type="email" name="email" class="form-control" id="inputEmail3">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10" style="align-self: center;">
            <input type="password" name="password" class="form-control" id="inputPassword3">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Log in</button>
      </form>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>
