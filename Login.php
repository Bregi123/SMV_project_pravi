<?php

include 'database.php';

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
      $count = mysqli_num_rows($result);

      if ($count == 1) {
          echo "Login successful!";
      } else {
          echo "Login failed. Check your credentials.";
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
      <form method ="POST">
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" name ="email" class="form-control" id="inputEmail3">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10" style="align-self: center;">
            <input type="password" name = "password" class="form-control" id="inputPassword3">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
      </form>
    </div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>