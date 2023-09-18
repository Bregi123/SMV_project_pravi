<?php
include 'database.php';

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
}
?>

<html>

<head>
    <link rel="stylesheet" href="Css.css">

</head>

<body>
    <div class="container1">

        <div class="dropdown">
            <button class="dropbtn">Menu</button>
            <div class="dropdown-content">
                <a href="Home_page.html">Home</a>
                <a href="info.html">Info</a>
            </div>

        </div>
    </div>
    <h1>Login</h1>


</body>

</html>