<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<?php
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
include 'database.php';
//id_login != {$_SESSION['id_login']}
$sql = "SELECT* FROM login";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    // Loop through the result set
    echo '<table class="table table-striped">';
echo '<thead>';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>Name</th>';
echo '<th>Surname</th>';
echo '<th>Username</th>';
echo '<th>User Type</th>';
echo '<th>Email</th>';
echo '<th></th>';
echo '<th></th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row["id_login"] . '</td>';
    echo '<td>' . $row["name"] . '</td>';
    echo '<td>' . $row["surname"] . '</td>';
    echo '<td>' . $row["username"] . '</td>';
    echo '<td>' . $row["user_type"] . '</td>';
    echo '<td>' . $row["email"] . '</td>';
    echo '<form method="POST" action="odjava.php">';
    echo '<input name="deleteID" value="'. $row["id_login"] .'" hidden></input>';
    echo '<td><button type="submit" name="delete-button" id="deleteBtn-' . $row["id_login"] . '" class="btn btn-danger">Delete</button></td>';
    echo '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Edit</button></td>';

    echo '</form>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';
} else {
    echo "No records found";
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


