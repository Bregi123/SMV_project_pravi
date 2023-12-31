<?php
session_start();
include 'database.php';
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if (isset($_POST['deleteID'])) {
        // Check if the "deleteID" input field exists in the POST data
        $deleteID = $_POST['deleteID'];
      
        $res = mysqli_query($link, "SELECT * FROM materials WHERE id_subject=" . $deleteID);
        $row = mysqli_fetch_array($res);
        if (!empty($row)){            
            $message = "Cannot delete subject! Materials for subject are assigned ";
            header("Location: Subject_management.php?message=" . $message);
            exit();
   
        }

        $res = mysqli_query($link, "SELECT * FROM professors_subjects WHERE id_subject=" . $deleteID);
        $row = mysqli_fetch_array($res);
        if (!empty($row)){          
            
            $message = "Cannot delete subject! Professors for  subject are already assigned ";
            header("Location: Subject_management.php?message=" . $message);
            exit();
          
        }
        $res = mysqli_query($link, "SELECT * FROM students WHERE id_subject="   . $deleteID);
        $row = mysqli_fetch_array($res);
        if (!empty($row)){          
            
            $message = "Cannot delete subject! Students for  subject are already assigned ";
            header("Location: Subject_management.php?message=" . $message);
            exit();
          
        }
        $res = mysqli_query($link, "SELECT * FROM assignments WHERE id_subject=" . $deleteID);
        $row = mysqli_fetch_array($res);
        if (!empty($row)){          
            
            $message = "Cannot delete subject! Assignments for subject are already  ";
            header("Location: Subject_management.php?message=" . $message);
            exit();
         
        }
     
            $query = "DELETE FROM subjects WHERE id_subject={$deleteID} LIMIT 1";
            mysqli_query($link, $query);
        
    }
}

    header("Location: Subject_management.php?message=" . $message);
    exit();

    ?>