<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<?php
session_start(); 
// Start the session (this should be at the top of your PHP script)
include 'database.php';
//session_start();

if (isset($_SESSION['logged_in']) || !$_SESSION['logged_in']){
    if($_SESSION['user_type'] != 'admin')
    {
        header("location: login.php");
    exit();
    }
    
}
include_once 'database.php';
$sql = "SELECT * FROM login";
$result = mysqli_query($link, $sql);

include_once 'database.php';
$result = mysqli_query($link, "SELECT * FROM login");

include_once 'database.php';
if (count($_POST) > 0) {
    mysqli_query($link, "UPDATE login SET id_login='" . $_POST['id_login'] . "', name='" . $_POST['name'] . "', surname='" . $_POST['surname'] . "', user_type='" . $_POST['user_type'] . "', username='" . $_POST['username'] . "', email='" . $_POST['email'] . "' WHERE id_login='" . $_POST['id_login'] . "'");
    $message = "Record Modified Successfully";
}

if (isset($_GET['id_login'])) {
    $result = mysqli_query($link, "SELECT * FROM login WHERE id_login='" . $_GET['id_login'] . "'");
    $row = mysqli_fetch_array($result);
}
if (!empty($row)) {
    // You can access the values in $row safely
} else {
    // Handle the case where the record is not found or $row is null
    $message = "Record not found"; // You can set an appropriate message
}

 
?>
<html>
<head>
    <title>Your Page</title>
    <style>
              body {
  background-color:#d3d3d3;
  padding-top: 65px;
  padding-left: 20px;
  padding-right: 40px;
}
        #Button{
            font-family: 'Trebuchet MS', sans-serif;
            background-color: #d3d3d3; /* Change the background color as desired */
            color: #333; /* Change the text color as desired */
            border: none;
            border-radius: 3px; /* Rounded corners */
            padding: 2px 4px; /* Adjust padding as needed */
            cursor: pointer;
            font-weight: bold;
            
            

        }
        #logoutButton {
            background-color: #007BFF; /* Change the background color as desired */
            color: #fff; /* Change the text color as desired */
            border: none;
            border-radius: 5px; /* Rounded corners */
            padding: 10px 20px; /* Adjust padding as needed */
            cursor: pointer;
        }
        /* Styles for the sidebar */
        .sidebar {
            width: 250px;
            height: 100%;
            position: fixed;
            top: 0;
            left: -250px; /* Initially hidden */
            background-color: #333;
            color: white;
            transition: left 0.3s;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar li {
            padding: 15px;
        }

        /* Styles for the button */
        #toggleButton {
            position: fixed;
            top: 20px;
            left: 20px;
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
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
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<a href="retrieve.php">Employee List</a>
</div>
Username: <br>
<input type="hidden" name="id_login" class="txtField" value="<?php echo $row['id_login']; ?>">
<input type="text" name="userid"  value="<?php echo $row['userid']; ?>">
<br>
First Name: <br>
<input type="text" name="name" class="txtField" value="<?php echo $row['name']; ?>">
<br>
Last Name :<br>
<input type="text" name="surname" class="txtField" value="<?php echo $row['surname']; ?>">
<br>
City:<br>
<input type="text" name="username" class="txtField" value="<?php echo $row['username']; ?>">
User Type:<br>
<input type="text" name="user_type" class="txtField" value="<?php echo $row['user_type']; ?>">
<br>
<br>
Email:<br>
<input type="text" name="email" class="txtField" value="<?php echo $row['email']; ?>">

<br>
<input type="submit" name="submit" value="Submit" class="buttom">


    
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


