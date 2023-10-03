<?php
// Start the session (this should be at the top of your PHP script)
session_start();
  
    //exit();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']){
    header("location: login.php");
    exit();
}
?>
<html>
<head>
    <title>Your Page</title>
    <style>
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
            padding: 10px;
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
<body>
    <div class="sidebar" id="sidebar">
        <!-- Sidebar content goes here -->
        <ul>
            <li></li>
            <li></li>
            <li>Home</li>
            <li>Subjects</li>
            <li>classes</li>
            <li>Account</li>
        </ul>
        <button  onclick="location.href = 'login.php'" ; id="logoutButton">Logout</button>
        <div class="sidebar-image">
            <a style= "position: absolute; bottom: 40px; left: 10px; width: 50px; height: 50px;">TEACHER</a>
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
