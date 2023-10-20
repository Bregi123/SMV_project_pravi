<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<?php
include 'header.php';
echo '<div class = "h2" >USER MANAGEMENT </div>';
// Start the session (this should be at the top of your PHP script)
echo '<div style = " text-align: right;">';
echo '<button type="button" class="btn btn-primary" onclick="location.href = \'edit.user.php\'">Add</button>';
echo '</div>';
include 'database.php';
//session_start();

if (isset($_SESSION['logged_in']) || !$_SESSION['logged_in']){
    if($_SESSION['user_type'] != 'Admin')
    {
        header("location: Login.php");
    exit();
    }
    
}

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
echo '<th>Professor</th>';
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

    if ($row["professor"] == 0)
    {
        echo '<td></td>';
    }

    else{
        echo '<td> <i class="fa fa-check-square" style= "color:#0a9707"></i> </td>';
    }
    
    echo '<form method="POST" action="odjava.php">';
    echo '<input name="deleteID" value="'. $row["id_login"] .'" hidden></input>';
    echo '<td><button type="submit" name="delete-button" id="deleteBtn-' . $row["id_login"] . '" class="btn btn-danger">Delete</button></td>';
    echo '<td><button type="button" class="btn btn-primary" onclick="location.href = \'edit.user.php?user_id=' . $row["id_login"] . '\'">Edit</button></td>';

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

    <title>Your Page</title>


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

    
    

<!-- The Modal -->


    
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


