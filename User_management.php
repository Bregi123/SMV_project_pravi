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
        header("location: login.php");
    exit();
    }
    
}

//id_login != {$_SESSION['id_login']}
$emptyCriteria = true;
$sql = "SELECT * FROM login";
if (isset($_POST['srchName']) && $_POST['srchName'] != "") {
    if ($emptyCriteria) {
        $emptyCriteria = false;
        $sql = $sql . " WHERE ";
    } else {
        $sql = $sql . " AND ";
    }
    $sql = $sql . "firstname LIKE '" .  $_POST['srchName'] . "%'";
}
if (isset($_POST['srchSurname']) && $_POST['srchSurname'] != "") {
    if ($emptyCriteria) {
        $emptyCriteria = false;
        $sql = $sql . " WHERE ";
    } else {
        $sql = $sql . " AND ";
    }
    $sql = $sql . "surname LIKE '" .  $_POST['srchSurname'] . "%'";
}
if (isset($_POST['srchUsername']) && $_POST['srchUsername'] != "") {
    if ($emptyCriteria) {
        $emptyCriteria = false;
        $sql = $sql . " WHERE ";
    } else {
        $sql = $sql . " AND ";
    }
    $sql = $sql . "username LIKE '" .  $_POST['srchUsername'] . "%'";
}
if (isset($_POST['srchUserType']) && $_POST['srchUserType'] != "") {
    if ($emptyCriteria) {
        $emptyCriteria = false;
        $sql = $sql . " WHERE ";
    } else {
        $sql = $sql . " AND ";
    }
    $sql = $sql . "User_Type ='" .  $_POST['srchUserType'] . "'";
}

$result = mysqli_query($link, $sql);


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
echo '<tr>';
echo '<form method ="post">';
echo '<td></td>';
echo '<td><input type="text" name="srchName" class="txtField"> </td>';
echo '<td><input type="text" name="srchSurname" class="txtField"> </td>';
echo '<td><input type="text" name="srchUsername" class="txtField"> </td>';
echo '<td> '; 
echo '<select name="srchUserType" class="txtField">';
echo '<option value="" ></option>';
echo '<option value="Professor" >Professor</option>';
echo '<option value="Student" >Student</option>';
echo '<option value="Admin" >Admin</option>';
echo '</select>';
echo '</td>';
echo '<td></td>';
echo '<td><button type="submit" name="SearchBtn" id="SearchBtn" class="btn btn-primary">Search</button></td>';
echo '<td></td>';
echo '</form>';
echo '</tr>';
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row["id_login"] . '</td>';
    echo '<td>' . $row["firstname"] . '</td>';
    echo '<td>' . $row["surname"] . '</td>';
    echo '<td>' . $row["username"] . '</td>';
    echo '<td>' . $row["user_type"] . '</td>';
    echo '<td>' . $row["email"] . '</td>';

   
    
    echo '<form method="POST" action="Delete_user.php">';
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

    <title>User Management</title>


<body >
<?php
include 'navigation_bar.php';
?>

    
    

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


