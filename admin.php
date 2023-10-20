<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<?php
include 'header.php';
// Start the session (this should be at the top of your PHP script)
session_start();
  
    //exit();
    if (isset($_SESSION['logged_in']) || !$_SESSION['logged_in']){
        if($_SESSION['user_type'] != 'Admin')
        {
            header("location: login.php");
        exit();
        }
        
    }
?>
<html>
<head>
    <title>Your Page</title>
    <style>
              body {
  background-color:#d3d3d3;
}
        #logoutButton {
            background-color: #007BFF; /* Change the background color as desired */
            color: #fff; /* Change the text color as desired */
            border: none;
            border-radius: 5px; /* Rounded corners */
            padding: 10px 20px; /* Adjust padding as needed */
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
            <li style="margin-top: 20px;"><button  onclick="location.href = 'admin.php'" ; ; id="button">Home</li>
            <li><button  onclick="location.href = 'User_management.php'" ; id="button">Manage Users</button></li>
            <li>Subject management </li>
            <li>Account</li>
        </ul>
        <button  onclick="location.href = 'logout.php'" ; id="logoutButton">Logout</button>
        <div class="sidebar-image">
            <a style= "position: absolute; bottom: 40px; left: 10px; width: 50px; height: 50px;">ADMIN</a>
        <img src="pfp.jpg" alt="Image Description" style="position: absolute; bottom: 20px; left: 10px; width: 50px; height: 50px;">
    </div>
    </div>
    
    <button id="toggleButton">Toggle Navigation Bar</button>

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

