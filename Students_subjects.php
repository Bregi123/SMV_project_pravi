<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<?php

include 'header.php';
echo '<div class = "h2" >SUBJECTS</div>';
include 'database.php';
// Start the session (this should be at the top of your PHP script)

  
    //exit();
    if (isset($_SESSION['logged_in']) || !$_SESSION['logged_in']){
        if($_SESSION['user_type'] != 'Student')
        {
            header("location: login.php");
        exit();
        }
        
    }
   
    if (count($_POST) > 0) {
       
            
            $sql = "SELECT * FROM subjects ";
            $subjects = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_assoc($subjects)) {
                $idSubject=$row["id_subject"];
                if (isset($_POST["subject".$idSubject])) {
                    $result = mysqli_query($link, "SELECT * FROM students WHERE id_student=".$_SESSION['user_id']." and id_subject=".$idSubject);
                    $row = mysqli_fetch_array($result);
                    if (empty($row)) {
                        
                        mysqli_query($link, "INSERT INTO students ( id_student, id_subject ) VALUES (" . $_SESSION['user_id'] . ", " . $idSubject . ")");
                    }
                }
            }
        } 
        
     
        
    
//conncet the professor-subjects table
// Get a list of subjects for the logged-in professor
$sql = "SELECT st.id ,s.id_subject, s.subject_name FROM subjects s JOIN students st ON s.id_subject = st.id_subject WHERE st.id_student = " . $_SESSION["user_id"];
$subjects = mysqli_query($link, $sql);

$sql = "SELECT subject_name FROM subjects";
$all_subjects = mysqli_query($link, $sql);
?>
<html>
<head>
    <title> Student</title>
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
        body {
  background: linear-gradient(to bottom, whitesmoke 0%, grey 100%);
  padding-top: 65px;
  padding-left: 20px;
  padding-right: 40px;
  
}
       
    </style>
</head>
<body >
<?php
include 'navigation_bar_s.php';

//id_login != {$_SESSION['id_login']}
echo '<div style = "width : 100%; display: flex;">';
echo '<div style = "width : 30%; padding:15px;">';
echo '<table class="table table-striped">';
echo '<tbody>';

echo 'My subjects ';
while ($row = mysqli_fetch_assoc($subjects )) {
    
    echo '<tr>';
   
    echo '<td>' . $row["subject_name"] . '</td>';
    echo '<form method="POST" action="delete_student.php">';
    
    echo '<td><input name="deleteID" value="'. $row["id"] .'" hidden></input><button type="submit" name="delete-button" id="deleteBtn-' . $row["id"] . '" class="btn btn-danger">Delete</button></td>';


    echo '</form>';
    echo '</tr>';
    
}

echo '</tbody>';
echo '</table>';
echo '</div>';

$sql = "SELECT * FROM subjects ";
$subjects = mysqli_query($link, $sql);

echo '<div style = "width : 30%; padding:15px;">';
echo '<form method="POST">';

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
