<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <?php
session_start(); 
// Start the session (this should be at the top of your PHP script)
include 'database.php';
include 'header.php';
echo '<div class = "h2" >REGISTER </div>';
//session_start();






if (count($_POST) > 0) {
  
    if ($_POST['id_login'] != ''){
      
        if ( $_POST['password']!="")
        {
            if ( $_POST['password'] ==  $_POST['password2'] )
            {
                mysqli_query($link, "UPDATE login SET firstname='" . $_POST['name'] . "', surname='" . $_POST['surname'] . "', username='" . $_POST['username'] . "', mypassword = '" . $_POST['password'] . "' WHERE id_login='" . $_POST['id_login'] . "'");
                header("Location: student.php");
                exit;
            }
            else
            {
                $message = "Paswords don't match";
            }
        }
        else
        {
            mysqli_query($link, "UPDATE login SET firstname='" . $_POST['name'] . "', surname='" . $_POST['surname'] . "', username='" . $_POST['username'] . "' WHERE id_login='" . $_POST['id_login'] . "'");
                header("Location: student.php");
                exit;
        }
    } 
    
    else {
     
        $result = mysqli_query($link, "SELECT * FROM login WHERE email='" . $_POST['email'] . "'");
   
        $row = mysqli_fetch_array($result);
 

        if (empty($row))
         {
        
            if ( $_POST['password']!="")
            {
              
                if ( $_POST['password'] ==  $_POST['password2'] )
                {
               
                    $sql =  "INSERT INTO login ( firstname, surname , user_type, username, mypassword ,email ) VALUES ('" . $_POST['name'] . "', '" . $_POST['surname'] . "', 'Student', '" . $_POST['username'] . "', '" . $_POST['password'] . "', '" . $_POST['email'] . "')";
                    echo $sql;
                    mysqli_query($link,$sql);
                  
                    header("Location: login.php");
                   
                    exit;
                
                }
                else
                {
                    $message = "Paswords don't match";
                }
            }
            else
            {
                $message = "Enter password";
            }
        }
        else {
            $message = "User already exists!";
            
        }
    }
    
}

if (isset($_SESSION["user_id"] )) {
    $result = mysqli_query($link, "SELECT * FROM login WHERE id_login='" . $_SESSION['user_id'] . "'");
    $row = mysqli_fetch_array($result);

    if (!empty($row)) {
        $id_login = $row['id_login'];
        $username = $row['username'];
        $name = $row['firstname'];
        $surname = $row['surname'];
        $user_type = $row['user_type'];
        $email = $row['email'];
    } else {
        // Handle the case where the record is not found or $row is null
        $message = "Record not found"; // You can set an appropriate message
    }
}

else {
    $id_login = '';
    $username = '';
    $name = '';
    $surname = '';
    $user_type = '';
    $email = '';
}


?>

<html>
<head>
    <title>Register</title>
    <style>

        .table_size{
            width: 50%;
        }

        .center_content{
            padding-left : 300px;
            font-family: "Arial", Gadget, sans-serif;
            font-weight : bold;
            letter-spacing: -0.8px;
            word-spacing: 2px;
            color: #0000FF;
           
           
            font-style: normal;
           
           

        }
        
    </style>
</head>

<body >

    <form name="frmUser" method="post" >
<div class = "center_content"><?php if(isset($message)) { echo $message; } ?>

<table class="table table_size"  >
  <tbody>
  <tr>
      <td>Username:</td>
      <td><input type="hidden" name="id_login" class="txtField" value="<?php echo $id_login; ?>">
            <input type="text" name="username"  value="<?php echo $username; ?>">
        </td>
    </tr>
    <tr>
      <td>First Name:</td>
      <td><input type="text" name="name" class="txtField" value="<?php echo $name; ?>">
        </td>
    </tr>
    <tr>  
      <td>Last Name :</td>
      <td><input type="text" name="surname" class="txtField" value="<?php echo $surname; ?>"></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td><input type="text" name="email" class="txtField" <?php if (isset($_GET['user_id'])) {echo "disabled";} ?> value="<?php echo $email; ?>"></td>
    </tr>
    <tr>  
      <td>Password:</td>
      <td><input type="password" name="password" class="txtField" ></td>
    </tr>
    <tr>  
      <td>Repeat password:</td>
      <td><input type="password" name="password2" class="txtField"></td>
    </tr>

   

  </tbody>
</table>

    







<input  type="submit" name="submit" value="Submit" class="btn btn-primary" > 

<button type="reset" onclick="location.href = 'login.php'"  class="btn btn-danger" >Cancel</button>
   
</div>
</form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>