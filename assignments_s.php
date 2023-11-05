<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<?php

include 'header.php';
echo '<div class = "h2" >ASSIGNMENTS </div>';
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


//conncet the professor-subjects table
if (isset($_POST['idsubject'])) {

    if ( $_POST['assignment_name'] != "") {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
            $uploadsDirectory = 'downloads/';

            // Create the 'downloads' directory if it doesn't exist
            if (!file_exists($uploadsDirectory)) {
                mkdir($uploadsDirectory, 0755, true);
            }
            $file_type = substr($_FILES['file']['name'], strripos($_FILES['file']['name'], ".")) ;
            
            $user = mysqli_query($link, "SELECT * FROM login WHERE id_login=" . $_SESSION['user_id']);
            $userrow = mysqli_fetch_array($user);

            $targetFile = $uploadsDirectory . basename( $userrow['surname'] . " " .  $userrow['name'] .  " - " . $_POST['assignment_name'] . $file_type );

            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
                $result = mysqli_query($link, "SELECT * FROM assignments WHERE id_subject=" . $_POST['idsubject'] . " AND id_student = " . $_SESSION['user_id'] . " AND assignment_file = '" . $userrow['surname'] . " " .  $userrow['name'] .  " - " . $_POST['assignment_name'] . $file_type . "' ");
                $row = mysqli_fetch_array($result);

                
              
                 
            
                if (empty($row)) {

                    mysqli_query($link, "INSERT INTO assignments ( id_subject,id_student, assignment_name, assignment_file) VALUES (" . $_POST['idsubject'] . ", " . $_SESSION['user_id'] . ", '" . $_POST['assignment_name'] . "', '" . $userrow['surname'] . " " .  $userrow['name'] .  " - " . $_POST['assignment_name'] . $file_type . "')");
                    header("Location: assignments_s.php?idsubject=". $_POST['idsubject']);
                  
                    exit;
                }
                else {
                   header("Location: assignments_s.php?idsubject=". $_POST['idsubject']);
                    
                    exit;
                    
                }

            
                
            } else {
                echo '<div class="alert alert-danger">Error uploading file.</div>';
            }
        }
    } else {
        echo '<div class="alert alert-danger">Enter assignment name </div>';
    }
}
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

       
    </style>
</head>
<body >
<?php
include 'navigation_bar_s.php';

//id_login != {$_SESSION['id_login']}


$sql = "SELECT s.id_subject , s.subject_name FROM subjects s JOIN students st ON s.id_subject = st.id_subject WHERE st.id_student = " . $_SESSION["user_id"]   ;
$subjects = mysqli_query($link, $sql);

echo '<div style = "width : 100%; display: flex;">';
echo '<div style = "width : 30%;">';


echo '<table class="table table-striped">';
echo '<tbody>';
while ($row = mysqli_fetch_assoc($subjects)) {
    echo '<tr>';
    echo '<td> <a href ="assignments_s.php?idsubject='. $row["id_subject"] . '" > ' . $row["subject_name"] . '</a><br></td>';
    echo '</tr>';

}
echo '</tbody>';
echo '</table>';


echo '</div>';
echo '<div style = "width : 30%; padding:15px;">';
if (isset($_GET['idsubject'])) {
    $sql = "SELECT * FROM assignments WHERE id_subject=" . $_GET['idsubject'] . " AND id_student=" . $_SESSION["user_id"] ;
    $assignments1 = mysqli_query($link, $sql );


    echo '<table class="table table-striped">';
    echo '<tbody>';
    while ($row = mysqli_fetch_assoc($assignments1)) {
        echo '<tr>';
    
        echo '<td> <a href ="downloads/'. $row["assignment_file"] . '" target="_blank"> ' . $row["assignment_name"] . '</a></td>';
        echo '</tr>';

    }   
    echo '</tbody>';
    echo '</table>';
}

echo '</div>';
echo '<div style = "width : 40%; padding:15px;">';
if (isset($_GET['idsubject'])) {

    echo '<form action="#" method="post" enctype="multipart/form-data" class="mb-4">';
    echo '<table class="table table-striped">';
    echo '<tbody>';

    echo '<tr>';
    echo '<td>Assignment name:</td>';
    echo '<td><input size="45" type="text" name="assignment_name" class="txtField"></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>File:</td>';
    echo '<td> <input type="file" name="file" id="file" class="form-control" required></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td><input type="hidden" name="idsubject" value= "' . $_GET['idsubject'] . '"></td>';
    echo '<td><button type="submit" class="btn btn-primary">Upload</button></td>';
    echo '</tr>';

    echo '</tbody>';
    echo '</table>';
    echo '</form>';
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
