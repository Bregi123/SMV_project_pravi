<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<?php

include 'header.php';
echo '<div class = "h2" >EDUCATIONAL MATERIALS </div>';
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
if (isset($_POST['idsubject'])) {

    if ( $_POST['material_name'] != "") {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
            $uploadsDirectory = 'downloads/';

            // Create the 'downloads' directory if it doesn't exist
            if (!file_exists($uploadsDirectory)) {
                mkdir($uploadsDirectory, 0755, true);
            }

            $targetFile = $uploadsDirectory . basename($_POST['idsubject'] . "_" . $_FILES['file']['name']);

            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
                $result = mysqli_query($link, "SELECT * FROM materials WHERE id_subject=" . $_POST['idsubject'] . " AND material_file ='" . $_POST['idsubject'] . "_" . $_FILES['file']['name'] . "' ");
                $row = mysqli_fetch_array($result);

                if (empty($row)) {
                    mysqli_query($link, "INSERT INTO materials ( id_subject, material_name, material_file) VALUES ('" . $_POST['idsubject'] . "', '" . $_POST['material_name'] . "', '" . $_POST['idsubject'] . "_" . $_FILES['file']['name'] . "')");
                    header("Location: materials.php?idsubject=". $_POST['idsubject']);
                  
                    exit;
                }
                else {
                    mysqli_query($link, "UPDATE materials SET material_name='" . $_POST['material_name'] . "' WHERE id_subject=" . $_POST['idsubject'] . " AND material_file ='" . $_POST['idsubject'] . "_" . $_FILES['file']['name'] . "' ");
                    header("Location: materials.php?idsubject=". $_POST['idsubject']);
                    
                    exit;
                    
                }

            
                
            } else {
                echo '<div class="alert alert-danger">Error uploading file.</div>';
            }
        }
    } else {
        echo '<div class="alert alert-danger">Enter material name </div>';
    }
}
?>
<html>
<head>
    <title> Professor</title>
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
    echo '<td> <a href ="materials.php?idsubject='. $row["id_subject"] . '" > ' . $row["subject_name"] . '</a><br></td>';
    echo '</tr>';

}
echo '</tbody>';
echo '</table>';


echo '</div>';
echo '<div style = "width : 30%; padding:15px;">';
if (isset($_GET['idsubject'])) {
    $result = mysqli_query($link, "SELECT * FROM materials WHERE id_subject=" . $_GET['idsubject'] );


    echo '<table class="table table-striped">';
    echo '<tbody>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td> <a href ="downloads/'. $row["material_file"] . '" target="_blank"> ' . $row["material_name"] . '</a></td>';
        echo '</tr>';

    }
    echo '</tbody>';
    echo '</table>';
}

echo '</div>';
echo '<div style = "width : 30%; padding:15px;">';
if (isset($_GET['idsubject'])) {

    echo '<form action="#" method="post" enctype="multipart/form-data" class="mb-4">';
    echo '<table class="table table-striped">';
    echo '<tbody>';

    echo '<tr>';
    echo '<td>Material name:</td>';
    echo '<td><input size="45" type="text" name="material_name" class="txtField"></td>';
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
