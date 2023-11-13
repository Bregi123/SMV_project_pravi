<?php

include 'database.php';

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'])
{
  if ($_SESSION['user_type'] == "Admin") {
    header("Location: admin.php");
    exit();
} elseif ($_SESSION['user_type']  == "Professor") {
    header("Location: professor.php");
    exit();
} elseif ($_SESSION['user_type'] == "Student") {
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

        $sql = "SELECT * FROM login WHERE email = '$email' AND mypassword = '$password'";
        $result = mysqli_query($link, $sql);
        $_SESSION['logged_in'] = true;
        
        if ($result) {
            $count = mysqli_num_rows($result);
            if ($count == 1) {
                $row = mysqli_fetch_assoc($result);
                $user_type = $row["user_type"];
                $_SESSION['user_type'] = $row["user_type"];
                $_SESSION['user_id'] = $row['id_login'];
                if ($user_type == "Admin") {
                    header("Location: admin.php");
                    exit();
                } elseif ($user_type == "Professor") {
                    header("Location: professor.php");
                    exit();
                } elseif ($user_type == "Student") {
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
<style>
  @import url("https://fonts.googleapis.com/css?family=Lato:400,700");
#bg {
  
  margin: auto;
  width: 30%;
  border: 3px solid grey;
  padding-left:100px;
  padding-bottom: 50px;

  left: 0;
  top: 0;
 text-align: center;
  height: 40%;
  background-size: cover;
  align: center;
  
 
}
.bg_immage{

}
body {
 
  background-image: url('ozadje2.png');
  background-repeat: no-repeat;
  background-size: cover ;
  
  font-family: 'Lato', sans-serif;
  color: #4A4A4A;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  overflow: hidden;
  margin: 0;
  padding: 0;
  
  ;
}

form {
  width: 350px;
  position: relative;
}
form .form-field::before {
  font-size: 20px;
  position: absolute;
  left: 15px;
  top: 17px;
  color: #888888;
  content: " ";
  display: block;
  background-size: cover;
  background-repeat: no-repeat;
}
form .form-field:nth-child(1)::before {
  background-image: url(img/user-icon.png);
  width: 20px;
  height: 20px;
  top: 15px;
}
form .form-field:nth-child(2)::before {
  background-image: url(img/lock-icon.png);
  width: 16px;
  height: 16px;
}
form .form-field {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  margin-bottom: 1rem;
  position: relative;
}
form input {
  font-family: inherit;
  width: 100%;
  outline: none;
  background-color: #fff;
  border-radius: 4px;
  border: none;
  display: block;
  padding: 0.9rem 0.7rem;
  box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
  font-size: 17px;
  color: #4A4A4A;
  text-indent: 40px;
}
.text_login{
color:white;
}
form .btn {
  outline: none;
  border: none;
  cursor: pointer;
  display: inline-block;
  margin: 0 auto;
  padding: 0.9rem 2.5rem;
  text-align: center;
  background-color: 	#A0A0A0;
  color: #fff;
  border-radius: 4px;
  box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
  font-size: 17px;

}
form .btn:hover{
  background-color: #003366;
  color: white;
  border: 1px solid white;
}
</style>
<head>
<meta charset="UTF-8">
</head>
<body>
  <div id="bg">
    
    
    <div style="margin-top: 100px; text-align: center; self-allign:">
      <form method="POST">
      <div class="form-field">
          <label for="inputEmail3" class="text_login">Email:</label>
          <div class="form-field">
            <input type="email" name="email" class="form-control" id="inputEmail3">
          </div>
        </div>
        <div class="form-field">
          <label for="inputPassword3" class="text_login">Password:</label>
          <div class="form-field">
            <input type="password" name="password" class="form-control" id="inputPassword3">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Log in</button>
        <a href="Register.php" class="btn btn-primary">Register</a>
      </form>
    </div>
  </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>
