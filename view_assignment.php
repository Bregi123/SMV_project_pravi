<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<?php

include 'header.php';
echo '<div class = "h2" >ASSIGNMENTS </div>';
include 'database.php';
// Start the session (this should be at the top of your PHP script)

  
    //exit();
    if (isset($_SESSION['logged_in']) || !$_SESSION['logged_in']){
        if($_SESSION['user_type'] != 'Professor')
        {
            header("location: login.php");
        exit();
        }
        
    }


//conncet the professor-subjects table

?>
<html>
<head>
    <title> Professor</title>
    <style>
              body {
  background: linear-gradient(to bottom, whitesmoke 0%, grey 100%);
  padding-top: 65px;
  padding-left: 20px;
  padding-right: 40px;
  
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
<?php
include 'navigation_bar_prof.php';

//id_login != {$_SESSION['id_login']}


$sql = "SELECT s.id_subject , s.subject_name FROM subjects s JOIN professors_subjects p ON s.id_subject = p.id_subject WHERE p.id_professor = " . $_SESSION["user_id"]   ;
$subjects = mysqli_query($link, $sql);

echo '<div style = "width : 100%; display: flex;">';
echo '<div style = "width : 30%;">';


echo '<table class="table table-striped">';
echo '<tbody>';
while ($row = mysqli_fetch_assoc($subjects)) {
    echo '<tr>';
    echo '<td> <a href ="view_assignment.php?idsubject='. $row["id_subject"] . '" > ' . $row["subject_name"] . '</a><br></td>';
    echo '</tr>';

}
echo '</tbody>';
echo '</table>';


echo '</div>';
echo '<div style = "width : 30%; padding:15px;">';
if (isset($_GET['idsubject'])) {
    $sql = "SELECT * FROM assignments WHERE id_subject=" . $_GET['idsubject'] ;
    $assignments1 = mysqli_query($link, $sql );


    echo '<table class="table table-striped">';
    echo '<tbody>';
    while ($row = mysqli_fetch_assoc($assignments1)) {
        echo '<tr>';
    
        echo '<td> <a href ="downloads/'. $row["assignment_file"] . '" target="_blank"> ' . $row["assignment_file"] . '</a></td>';
        echo '</tr>';

    }   
    echo '</tbody>';
    echo '</table>';
}

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
