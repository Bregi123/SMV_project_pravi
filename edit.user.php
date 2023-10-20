<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<?php
session_start(); 
// Start the session (this should be at the top of your PHP script)
include 'database.php';
include 'header.php';
echo '<div class = "h2" >USER EDIT </div>';
//session_start();

if (isset($_SESSION['logged_in']) || !$_SESSION['logged_in']){
    if($_SESSION['user_type'] != 'Admin')
    {
        header("location: login.php");
    exit();
    }
    
}

$sql = "SELECT * FROM login";
$result = mysqli_query($link, $sql);




if (count($_POST) > 0) {
    if ($_POST['id_login'] != ''){

        mysqli_query($link, "UPDATE login SET name='" . $_POST['name'] . "', surname='" . $_POST['surname'] . "', user_type='" . $_POST['user_type'] . "', username='" . $_POST['username'] . "', email='" . $_POST['email'] . "' WHERE id_login='" . $_POST['id_login'] . "'");
    } 
    else {
        mysqli_query($link, "INSERT INTO login ( name, surname , user_type, username, password ,email ) VALUES ('" . $_POST['name'] . "', '" . $_POST['surname'] . "', '" . $_POST['user_type'] . "', '" . $_POST['username'] . "', '12345', '" . $_POST['email'] . "')");
    }
    header("Location: User_management.php");
    exit;
}

if (isset($_GET['user_id'])) {
    $result = mysqli_query($link, "SELECT * FROM login WHERE id_login='" . $_GET['user_id'] . "'");
    $row = mysqli_fetch_array($result);

    if (!empty($row)) {
        $id_login = $row['id_login'];
        $username = $row['username'];
        $name = $row['name'];
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
    <title>Your Page</title>
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
    <div class="sidebar" id="sidebar">


        <!-- Sidebar content goes here -->
        <ul>
            
            <li></li>
            <li></li>
            <li><button  onclick="location.href = 'admin.php'" ; id="Button">Home</button></li>
            <li><button  onclick="location.href = 'User_management.php'" ; id="Button">Manage Users</button></li>
            <li>Subject management </li>
            <li>Account</li>
            
        </ul>
        <button  onclick="location.href = 'logout.php'" ; id="logoutButton">Logout</button>

       
</div>

        <div class="sidebar-image">
            <a style= "position: absolute; bottom: 40px; left: 10px; width: 50px; height: 50px;">ADMIN</a>
        <img src="pfp.jpg" alt="Image Description" style="position: absolute; bottom: 20px; left: 10px; width: 50px; height: 50px;">
    </div>
    </div>
    
    <button id="toggleButton">Toggle Navigation Bar</button>
    
    <form name="frmUser" method="post" action="">
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
      <td>User Type:</td>
      <td>
        <select name="user_type" class="txtField">
            <option value="Professor" <?php if ($user_type == "Professor") {echo 'selected=true';} ?>>Professor</option>
            <option value="Student" <?php if ($user_type == "Student") {echo 'selected=true';} ?>>Student</option>
            <option value="Admin" <?php if ($user_type == "Admin") {echo 'selected=true';} ?>>Admin</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Email:</td>
      <td><input type="text" name="email" class="txtField" value="<?php echo $email; ?>"></td>
    </tr>

  </tbody>
</table>

    







<input  type="submit" name="submit" value="Submit" class="btn btn-primary" >

</div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        const sidebar = document.getElementById("sidebar");
        const toggleButton = document.getElementById("toggleButton");
        const logoutButton = document.getElementById("logoutButton");

        // Function to open/close the sidebar
        function toggleSidebar() {
            if (sidebar.style.left === "0px" || sidebar.style.left === "") {
                sidebar.style.left = "-250px";
            } else {
                sidebar.style.left = "0px";
            }
        }

        // Add click event listener to the button
        toggleButton.addEventListener("click", toggleSidebar);
    </script>
</body>
</html>