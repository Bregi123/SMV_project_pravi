<?php
/*include 'database.php';

echo("serbus");

if (isset($_SESSION['email'])) {
  header('Location: Home_page.php');
  echo("ste že vpisani");
  exit();
}
if (isset($_POST['submit'])) {
  $email = $_POST['email'];

  $password = $_POST['password'];

  $hashed_password = password_hash($geslo, PASSWORD_DEFAULT);


  $stmt = $link->prepare("SELECT * FROM login WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($name_d, $surname_d, $user_d, $email_d, $geslo_d, $id);

  if ($stmt->fetch()) {
    if (password_verify($geslo, $geslo_d)) {
      header('Location: Home_page.php');
      $_SESSION["name"] = $name_d;
      $_SESSION["surname"] = $surname_d;
      $_SESSION["username"] = $username_d;
      $_SESSION["email"] = $email_d;
    }
  }

  $stmt->close();
}*/

include 'database.php';
/*
if (isset($SESSION['user'])) {
  header('location:Home_page.php');
  exit();
}

if (isset($SESSION['email'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $hashed_password = password_hash($passwrod, PASSWORD_DEFAULT);

  $stmt = $link->prepare("SELECT * FROM login WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($name_d, $surname_d, $user_d, $user_type_d,  $email_d, $password_d, $id);

  if ($stmt->fetch()) {
    if (password_verify($password, $password_d)) {
      header('Location: HOME.php');
      $_SESSION['email'] = $email_d;
      $_SESSION['user'] = $user_d;
      $_SESSION['surname'] = $surname_d;
    }
  }

  $stmt->close();
} 
else {
  var_dump("nisi vpisan");
}
*/
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
      <form>
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail3">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10" style="align-self: center;">
            <input type="password" class="form-control" id="inputPassword3">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
      </form>
    </div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>