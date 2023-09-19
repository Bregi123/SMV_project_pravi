<?php
/*include 'database.php';

if (isset($_SESSION['ime'])) {
    header('Location: HOME.php');
    exit();
}
if (isset($_POST['submit'])) {
    $uporabnik = $_POST['username'];

    $geslo = $_POST['password'];

    $hashed_geslo = password_hash($geslo, PASSWORD_DEFAULT);


    $stmt = $link->prepare("SELECT * FROM login WHERE username = ?");
    $stmt->bind_param("s", $uporabnik);
    $stmt->execute();
    $stmt->bind_result($ime_d, $priimek_d, $uporabnik_d, $enaslov_d, $geslo_d, $id);

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


        <div style="margin-top: 100px; text-align: center;" >
    <form>
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
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
        <button type="submit" class="btn btn-primary">Log in</button>
      </form>
</div>


    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>
