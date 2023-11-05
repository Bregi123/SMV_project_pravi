<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrp.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<?php
include 'header.php';
echo '<div class = "h2" >Student Subject Assign</div>';
// Start the session (this should be at the top of your PHP script)

include 'database.php';
//session_start();

if (isset($_SESSION['logged_in']) || !$_SESSION['logged_in']){
    if($_SESSION['user_type'] != 'Admin')
    {
        header("location: login.php");
    exit();
    }
    
}
$message_right='';
if (count($_POST) > 0) {
    if (isset($_POST['student']) && $_POST['student'] != '') {
        
        $sql = "SELECT * FROM subjects ";
        $subjects = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_assoc($subjects)) {
            $idSubject=$row["id_subject"];
            if (isset($_POST["subject".$idSubject])) {
                $result = mysqli_query($link, "SELECT * FROM students WHERE id_student=".$_POST['student']." and id_subject=".$idSubject);
                $row = mysqli_fetch_array($result);
                if (empty($row)) {
                    mysqli_query($link, "INSERT INTO students ( id_student, id_subject ) VALUES (" . $_POST['student'] . ", " . $idSubject . ")");
                }
            }
        }
    } 
    
    else {
        $message_right = "Please select student!";
    }
    
}


//id_login != {$_SESSION['id_login']}
$sql = "SELECT * FROM login WHERE user_type = 'Student'";
$students = mysqli_query($link, $sql);

$sql = "SELECT * FROM subjects ";
$subjects = mysqli_query($link, $sql);

$sql = "SELECT st.id, u.firstname, u.surname, s.subject_name FROM login u, subjects s, students st WHERE u.user_type = 'Student' AND u.id_login =st.id_student AND st.id_subject =  s.id_subject";

if (isset($_POST['srchStudent']) && $_POST['srchStudent'] != "") {

    $sql = $sql . " AND u.firstname LIKE '" .  $_POST['srchStudent'] . "%'";
}
if (isset($_POST['srchSubject']) && $_POST['srchSubject'] != "") {
  
    $sql = $sql . " AND s.subject_name LIKE '" .  $_POST['srchSubject'] . "%'";
}

$subject_assignments = mysqli_query($link, $sql);
echo '<div style = "width : 100%; display: flex;">';
echo '<div style = "width : 70%;">';

echo '<table class="table table-striped">';
echo '<thead>';
echo '<tr>';
echo '<th>Student Name </th>';
echo '<th>Subject </th>';

echo '<th></th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
echo '<tr>';
echo '<form method ="post">';

echo '<td><input type="text" name="srchStudent" class="txtField"> </td>';
echo '<td><input type="text" name="srchSubject" class="txtField"> </td>';
echo '<td><button type="submit" name="SearchBtn" id="SearchBtn" class="btn btn-primary">Search</button></td>';

echo '</form>';
echo '</tr>';
if (mysqli_num_rows($subject_assignments) > 0) {
    // Loop through the result set
while ($row = mysqli_fetch_assoc($subject_assignments)) {
    echo '<tr>';
    echo '<td>' . $row["firstname"] . '&nbsp;' . $row["surname"] . '</td>';
    echo '<td>' . $row["subject_name"] . '</td>';


   
    
    echo '<form method="POST" action="Delete_student_assign.php">';
    echo '<input name="deleteID" value="'. $row["id"] .'" hidden></input>';
    echo '<td><button type="submit" name="delete-button" id="deleteBtn-' . $row["id"] . '" class="btn btn-danger">Delete</button></td>';


    echo '</form>';
    echo '</tr>';
}
} else {
    echo "No records found";
}
echo '</tbody>';
echo '</table>';
echo '</div>';
echo '<div style = "width : 30%; padding:15px;">';
echo '<form method="POST">';
echo $message_right.'<BR>';
echo 'Select student:&nbsp;';
echo '<select name="student" id="student" class="txtField">';
echo '<option value="" selected="true"> </option>';
while ($row = mysqli_fetch_assoc($students)){
echo '<option value="'. $row["id_login"] .'" >'. $row["firstname"] .'&nbsp; '. $row["surname"] .'</option>';
}
echo '</select>';
echo '<p> </p>';
echo '<table class="table table-striped">';
echo '<tbody>';
while ($row = mysqli_fetch_assoc($subjects)) {
    echo '<tr>';
    echo '<td> <input type="checkbox" id="subject' . $row["id_subject"] . '" name="subject' . $row["id_subject"] . '" value="' . $row["id_subject"] . '">&nbsp<label for="' . $row["id_subject"] . '"> ' . $row["subject_name"] . '</label><br></td>';
    echo '</tr>';

}
echo '</tbody>';
echo '</table>';
echo '<td><button type="submit" name="add-button"  class="btn btn-primary">Add</button></td>';
echo '</form>';
echo '</div>';
echo '</div>';


?>
<html>

    <title>Student Subject Assignments</title>


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


