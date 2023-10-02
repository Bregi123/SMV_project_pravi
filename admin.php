<!DOCTYPE html>
<?php
// Start the session (this should be at the top of your PHP script)
session_start();
var_dump($_SESSION);

// Check if the user is logged in
if (isset($_SESSION['id_login'])) {
    // Check if the user is an admin+
    
    if ($_SESSION['user_type'] === 'admin') {
        // The user is an admin, you can perform admin-specific actions here
        header("Location: admin.php");
    } else if ($_SESSION['user_type'] === 'teacher') {
        // The user is not an admin
        header("Location: teacher.php");
    }
} else {
    // The user is not logged in
    // You can redirect them to a login page or show a message
    echo "Please log in to access this page.";
}
?>
<html>
<head>
    <title>Your Page</title>
    <style>
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
            <li>Users management</li>
            <li>Subject management </li>
            <li>Account</li>
        </ul>
        <button id="logoutButton">Logout</button>
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
