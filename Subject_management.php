<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<?php
include 'header.php';
echo '<div class = "h2" >Subject Management </div>';
// Start the session (this should be at the top of your PHP script)
echo '<div style = " text-align: right;">';
echo '<button type="button" class="btn btn-primary" onclick="location.href = \'edit.subject.php\'">Add</button>';
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
if (isset($_GET['message'])){
    echo $_GET['message'];
}

//id_login != {$_SESSION['id_login']}
$sql = "SELECT * FROM subjects";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    // Loop through the result set
    echo '<table class="table table-striped">';
echo '<thead>';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>Subject Name</th>';
echo '<th></th>';
echo '<th></th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row["id_subject"] . '</td>';
    echo '<td>' . $row["subject_name"] . '</td>';
   

   
    
    echo '<form method="POST" action="Delete_subject.php">';
    echo '<input name="deleteID" value="'. $row["id_subject"] .'" hidden></input>';
    echo '<td><button type="submit" name="delete-button" id="deleteBtn-' . $row["id_subject"] . '" class="btn btn-danger">Delete</button></td>';
    echo '<td><button type="button" class="btn btn-primary" onclick="location.href = \'edit.subject.php?subject_id=' . $row["id_subject"] . '\'">Edit</button></td>';

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

    <title>Subject Management</title>
    <style>
    body {
  background: linear-gradient(to bottom, whitesmoke 0%, grey 100%);
  padding-top: 65px;
  padding-left: 20px;
  padding-right: 40px;
  
}
<?php 
echo '<div class = "h1" >PIBERNET E-CLASSROOM </div>';
?>
    </style>


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


